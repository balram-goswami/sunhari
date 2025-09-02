<?php

namespace App\Http\Controllers\Auth;

use App\Models\{User, Cart};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session, Redirect, DB, Validator;
use App\Services\{CommunicationService, UserService};

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $communicationService;
    protected $userService;
    public function __construct(CommunicationService $communicationService, UserService $userService)
    {
        $this->communicationService = $communicationService;
        $this->userService = $userService;
    }

    public function index()
    {
        $view = "Templates.Login";

        return view('Front', compact('view'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|max:255',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            Session::flash('warning', $validator->getMessageBag()->first());
            return Redirect::back();
        }
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, true)) {
            Session::flash('success', "Login Successfully");
            $currentUser = getCurrentUser();
            if ($currentUser->role == User::USER) {
                return redirect()->route('customer.index');
            } else {
                return redirect()->route('dashboard.index');
            }
        } else {
            Session::flash('warning', "Invalid Credentials , Please try again.");
            return Redirect::back();
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flash('warning', "Logout Successfully");
        return Redirect()->back();
    }
    public function forgotPassword()
    {
        return view('Auth.ForgotPassword');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function forgotPasswordSend(Request $request)
    {
        if (!filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)) {
            Session::flash('warning', 'The email must be a valid email address.');
            return Redirect::back();
        }
        $user = User::where('email', $request->input('email'))->get()->first();
        if (!$user) {
            Session::flash('warning', 'Account does not exist in our system.');
            return Redirect::back();
        }

        $password = rand(000000000, 999999999);
        $user->password = bcrypt($password);
        $user->save();

        $name = $user->name;
        $email = $user->email;
        $emailSubject = 'Reset Password Request AT ' . appName();
        $emailBody = view('Email.ForgotPasswordEmail', compact('name', 'password', 'email'));

        $this->communicationService->mail($email, $emailSubject, $emailBody);
        Session::flash('success', 'Reset password has been sent to on your email.');
        return Redirect::back();
    }

    public function register()
    {
        $view = 'Templates.Register';
        return view('Front', compact('view'));
    }

    public function createAccount(Request $request)
    {
        $this->userService->store($request);
        $user = $this->userService->getUserByEmail($request->input('email'));
        Auth::login($user);

        Session::flash('success', "New User saves successfully.");
        return redirect()->back()->with('success', 'Registration successful!');
    }
}
