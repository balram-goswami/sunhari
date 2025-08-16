<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator, DateTime, Config, Helpers, Hash, DB, Session, Auth, Redirect;
use JWTAuth;

use App\Services\{
    CommonService
};

class CommonController extends Controller
{
    protected $commonService;
    public function __construct(
        CommonService $commonService
    ) {
        $this->commonService = $commonService;
    }
    public function getStates(Request $request) {
        $states = $this->commonService->getStates($request->country);
        if(request()->is('api/*')){
            return response()->json(['response' => ['data' => $states]], 200);
        }
        return Response()->json(compact('states'));
    }
    public function getCities(Request $request) {
        $cities = $this->commonService->getCities($request->state, $request->country);
        if(request()->is('api/*')){
            return response()->json(['response' => ['data' => $cities]], 200);
        }
        return Response()->json(compact('cities'));
    }
}
