<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, DateTime, Config, Helpers, Hash, DB, Session, Auth, Redirect;

use App\Services\{
	ProductService,
    CommonService
};

class ShopController extends Controller
{
    protected $service;
    protected $commonService;
    public function __construct(
        ProductService $service,
        CommonService $commonService
    ) {
        $this->service = $service;
        $this->commonService = $commonService;
    }
    public function shopSingle($slug = null) {
    	if(!$product = $this->service->getWithSlug($slug)) {
            Session::flash ( 'success', "No data found in our system." );
            return redirect()->back();
        }
    	$view = 'Templates.ShopSingle';
    	$breadcrumbs = [
    	  'title' => (isset($product->name) ? $product->name : appName()),
    	  'metaTitle' => (isset($product->meta_title) ? $product->name : appName()),
    	  'metaDescription' => (isset($product->meta_description) ? $product->name : appName()),
    	  'metaKeyword' => (isset($product->meta_keyword) ? $product->name : appName()),
    	  'links' => [
    	    ['url' => url('/'), 'title' => 'Home'],
    	    ['url' => '', 'title' => $product->name]
    	  ]
    	];
    	return view('Front', compact('view', 'breadcrumbs', 'product'));
    }
}
