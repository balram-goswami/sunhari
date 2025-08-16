<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session, Redirect, DB, Validator;
use App\Services\{
    DashboardService,
    UserService,
    UserDetailsService
};
use App\Models\{
    User,
    UserDetails,
    Countries
};

class CustomerController extends Controller
{
    protected $dashboardService;
    protected $userService;
    protected $userDetailsService;
    public function __construct(DashboardService $dashboardService, UserService $userService, UserDetailsService $userDetailsService)
    {
        $this->dashboardService = $dashboardService;
        $this->userService = $userService;
        $this->userDetailsService = $userDetailsService;
    }
    public function index()
    {
        $view = 'Admin.Customer.Index';
        return view('Admin', compact('view'));
    }

    public function customerProfile()
    {
        $user = getCurrentUser();
        $userDetails = UserDetails::where('user_id', $user->user_id)->get()->first();

        $view = 'Admin.Customer.Profile';
        return view('Admin', compact('view', 'user', 'userDetails'));
    }
    public function customerOrders()
    {
        $view = 'Admin.Customer.MyOrders';
        return view('Admin', compact('view'));
    }

    public function updateUserDetails()
    {
        $user = getCurrentUser();
        $pinCode = Countries::all();
        $userDetails = UserDetails::where('user_id', $user->user_id)->get()->first();

        $view = 'Admin.Customer.ProfileUpdate';
        return view('Admin', compact('view', 'user', 'userDetails', 'pinCode'));
    }

    public function coustomerDetailsUpdate(Request $request, $id)
    {
        if(!$user = $this->userService->get($id)) {
            Session::flash ( 'success', "User not found in our system." );
            return redirect()->route('users.index');
        }
        $detailsService = UserDetails::where('user_id', $id)->get()->first();
        $this->userService->update($request, $user);
        $this->userDetailsService->update($request, $detailsService);
        Session::flash ( 'success', "User Details update successfully." );
        return redirect()->back();
    }
}
