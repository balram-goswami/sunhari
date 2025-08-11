<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\{
  communicationService
};
use GuzzleHttp\Client;

use App\Models\{
  Posts,
  Enquiry,
  Links,
  Subscibers,
  ApplyNow,
  Countries,
  User,
  UserDetails,
  Cart,
  Product
};

use Illuminate\Support\Facades\Http;
use Validator, DateTime, Config, Helpers, Hash, DB, Session, Auth, Redirect;

class HomeController extends Controller
{
  protected $communicationService;
  public function __construct(CommunicationService $communicationService)
  {
    $this->communicationService = $communicationService;
  }

  public function homePage()
  {
    $view = "Templates.Home";
    $homePage = getThemeOptions('homePage');
    $headerOption = getThemeOptions('header');

    $breadcrumbs = [
      'title' => '',
      'metaTitle' => '',
      'metaDescription' => '',
      'metaKeyword' => '',
      'links' => [
        ['url' => url('/'), 'title' => 'Home']
      ]
    ];

    return view('Front', compact('view', 'homePage', 'headerOption', 'breadcrumbs'));
  }

  public function singlePage($slug)
  {
    $post = Posts::where('posts.post_name', $slug)
      ->leftJoin('posts as getImage', 'getImage.post_id', 'posts.guid')
      ->leftJoin('users as user', 'user.user_id', 'posts.user_id')
      ->select('posts.*', 'getImage.media as post_image', 'user.name as user_name', 'getImage.post_title as post_image_alt')
      ->where('posts.post_status', 'publish')
      ->get()->first();
    $relatedPosts = [];
    if ($post) {
      $postTypes = getPostType($post->post_type);
      $post->extraFields = getPostMeta($post->post_id);
      $post->posted_date = date('M d, Y', strtotime($post->created_at));
      $post->posted_time = date('h:i A', strtotime($post->created_at));
      $view = 'Templates.' . $post->post_template;
    } else {
      $view = 'errors.404';
      return view('Front', compact('view', 'post'));
    }
    $breadcrumbs = [
      'title' => (isset($post->post_title) ? $post->post_title : appName()),
      'metaTitle' => (isset($post['extraFields']['meta_title']) ? $post['extraFields']['meta_title'] : appName()),
      'metaDescription' => (isset($post['extraFields']['meta_description']) ? $post['extraFields']['meta_description'] : appName()),
      'metaKeyword' => (isset($post['extraFields']['meta_Keywords']) ? $post['extraFields']['meta_Keywords'] : appName()),
      'links' => [
        ['url' => url('/'), 'title' => 'Home'],
        ['url' => '', 'title' => $post->post_title]
      ]
    ];
    $products = Product::get()->all();
    
    return view('Front', compact('view', 'post', 'breadcrumbs', 'products'));
  }

  public function singlePost($post_type, $page)
  {
    $post = Posts::where('posts.post_name', $page)
      ->leftJoin('posts as getImage', 'getImage.post_id', 'posts.guid')
      ->leftJoin('users as user', 'user.user_id', 'posts.user_id')
      ->select('posts.*', 'getImage.media as post_image', 'user.name as user_name', 'getImage.post_title as post_image_alt')
      ->where('posts.post_status', 'publish')
      ->get()->first();
    $relatedPosts = [];
    if ($post) {
      $post->extraFields = getPostMeta($post->post_id);
      $post->posted_date = date('M d, Y', strtotime($post->created_at));
      $post->posted_time = date('h:i A', strtotime($post->created_at));
      $termRelations = \App\Models\TermRelations::where('object_id', $post->post_id)->pluck('term_id')->toArray();

      if (!empty($post_type['taxonomy'])) {
        $termsSelected = [];
        foreach ($post_type['taxonomy'] as $key => $value) {
          $termsSelected[$key] = \App\Models\Terms::whereIn('id', $termRelations)->where('term_group', $key)->get();
        }
        $post->category = $termsSelected;
      }
      $category_name = \App\Models\Terms::where('id', $termRelations)->pluck('name')->first();
      $postedComments = \App\Models\Comment::where('post_id', $post->post_id)->where('comment_approved', 1)->get();
      foreach ($postedComments as &$postedComment) {
        $postedComment->rating = getCommentMeta($postedComment->comment_ID, 'comment_rating');
      }
      $post->postedComments = $postedComments;

      $relatedPosts = getPostsByPostType('post', '6', null, true, false, ['terms' => $termRelations, 'notPostId' => $post->post_id]);
      $view = 'Templates.' . $post->post_template;
    } else {
      $view = 'errors.404';
      return view('Front', compact('view', 'post'));
    }

    $breadcrumbs = [
      'title' => (isset($post->post_title) ? $post->post_title : appName()),
      'metaTitle' => (isset($post['extraFields']['meta_title']) ? $post['extraFields']['meta_title'] : appName()),
      'metaDescription' => (isset($post['extraFields']['meta_description']) ? $post['extraFields']['meta_description'] : appName()),
      'metaKeyword' => (isset($post['extraFields']['meta_Keywords']) ? $post['extraFields']['meta_Keywords'] : appName()),
      'links' => [
        ['url' => url('/'), 'title' => 'Home'],
        ['url' => url($post->post_type), 'title' => $post->post_type],
        ['url' => '', 'title' => $post->post_title]
      ]
    ];

    return view('Front', compact('view', 'post', 'breadcrumbs', 'category_name', 'relatedPosts'));
  }


  public function terms(Request $request, $categoryType, $slug)
  {
    $request->merge(['term' => $slug]);
    $blogs = getPostsByPostType('blog', 0, 'new',  true, true);
    $offices = getPostsByPostType('country', 3, 'new', true);
    $view = 'Templates.TermBlogs';
    return view('Front', compact('view', 'blogs', 'offices'));
  }

  private function mailAddress()
  {
    // $emailTo = 'leads.tpsc@gmail.com';
    // $email_cc = 'dm.tpsc@gmail.com';

    $emailTo = 'balram.theedunetwork@gmail.com';
    $email_cc = 'balram.theedunetwork@gmail.com';

    return ['to' => $emailTo, 'cc' => $email_cc];
  }

  public function contactUsForm(Request $request)
  {
    $validator = Validator::make(
      $request->all(),
      [
        'query_from' => 'nullable|string',
        'fake_entry' => 'nullable',
        'name' => 'nullable|string',
        'email' => 'nullable|email',
        'c_code' => 'nullable|numeric',
        'mobile' => 'nullable|numeric',
        'location' => 'nullable|string',
        'message' => 'nullable|string',

        'otp' => 'nullable|string',
      ]
    );

    if ($request->filled('fake_entry')) {
      return response()->json(['message' => 'You are a Robot'], 422);
    }

    if ($validator->fails()) {
      return Response()->json(['message' => $validator->getMessageBag()->first()], 422);
    }
    $latestUsers = ApplyNow::latest()->take(10)->get();
    $existingUser = $latestUsers->where('email', $request->email)->first();

    if ($existingUser) {
      return response()->json(['message' => 'User Already Exists within last 10 entries'], 422);
    }

    $form  = new ApplyNow;
    $form->query_from = $request->query_from;
    $form->name = $request->name;
    $form->email = $request->email;
    $form->c_code = $request->c_code;
    $form->mobile = $request->mobile;
    $form->location = $request->location;
    $form->message = $request->message;
    $form->save();

    $emailSubject = 'New Request Recive from ' . $request->query_from . '';
    $allMailFields = $form;
    $emailBody = view('Email.OtherMail', compact('allMailFields'));

    $emails = $this->mailAddress();
    $emailTo = $emails['to'];
    $email_cc = $emails['cc'];
    $this->communicationService->mail($emailTo, $emailSubject, $emailBody, [], '', '', $email_cc);
    Session::flash('success', "Mail Sent.");
    return Response()->json(['message' => 'Thanks for connecting', 'action' => 'success'], 200);
  }

  public function subscribeForm(Request $request)
  {
    $validator = Validator::make(
      $request->all(),
      [
        'email' => 'required|email',
        'fake_entry' => 'nullable'
      ]
    );

    if ($validator->fails()) {
      return response()->json(['message' => $validator->errors()->first()], 422);
    }
    if ($request->filled('fake_entry')) {
      return response()->json(['message' => 'You are a Robot'], 422);
    }

    try {
      // Check for existing subscriber
      $existingUser = Subscibers::where('email', $request->email)->first();
      if ($existingUser) {
        return response()->json(['message' => 'This email is already subscribed'], 422);
      }

      // Save new subscriber
      $form = new Subscibers;
      $form->email = $request->email;
      $form->save();

      // Prepare and send email
      $emails = $this->mailAddress();
      $emailTo = $emails['to'];
      $email_cc = $emails['cc'];

      $emailSubject = 'New Subscriber Request Received';
      $emailBody = 'Please note there is a new subscription request.';

      $this->communicationService->mail($emailTo, $emailSubject, $emailBody, [], '', '', $email_cc);

      Session::flash('success', "Mail Sent.");
      return response()->json(['message' => 'Thank you for subscribing!'], 200);
    } catch (\Exception $e) {
      // Log the error if necessary for debugging
      \Log::error('Subscription Error: ' . $e->getMessage());
      return response()->json(['message' => 'An error occurred while processing your request. Please try again later.'], 500);
    }
  }
}
