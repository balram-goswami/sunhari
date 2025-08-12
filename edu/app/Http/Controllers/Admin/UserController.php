<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session, DataTables, Redirect, DB, Validator, Form;
use App\Services\{
    UserService
};


class UserController extends Controller
{   
    protected $service;
    public function __construct(UserService $service)
    {
        $this->service = $service;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = $this->service->table()->where('role', 'admin');
            return Datatables::of($user)
                    ->addIndexColumn()
                    ->editColumn('photo', function($row){
                        if ($row->photo) {
                            return '<img src="'.asset($row->photo).'" style="width:70px;" />';
                        }
                    })
                    ->addColumn('action', function($row){
                        return '<div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item btn btn-info" href="'.route('users.edit', $row->user_id).'"
                              ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                            '.Form::open(array('route' => array('users.destroy', $row->user_id), 'method' => 'delete')).'
                                <button type="submit" class="btn btn-danger"><i class="bx bx-trash me-1"></i> Delete</button>
                            </form>
                        </div>';
                    })
                    ->editColumn('created_at', function($row){
                        return dateFormat($row->created_at);
                    })
                    ->rawColumns(['action', 'created_at','photo'])
                    ->make(true);
        }        
        $view = 'Admin.Users.Index';
        return view('Admin', compact('view'));
    }

    public function astrologer(Request $request)
    {
        if ($request->ajax()) {
            $user = $this->service->table()->where('role', 'astrologer');
            return Datatables::of($user)
                    ->addIndexColumn()
                    ->editColumn('photo', function($row){
                        if ($row->photo) {
                            return '<img src="'.asset($row->photo).'" style="width:70px;" />';
                        }
                    })
                    ->addColumn('action', function($row){
                        return '<div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item btn btn-info" href="'.route('users.edit', $row->user_id).'"
                              ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                            '.Form::open(array('route' => array('users.destroy', $row->user_id), 'method' => 'delete')).'
                                <button type="submit" class="btn btn-danger"><i class="bx bx-trash me-1"></i> Delete</button>
                            </form>
                        </div>';
                    })
                    ->editColumn('created_at', function($row){
                        return dateFormat($row->created_at);
                    })
                    ->rawColumns(['action', 'created_at','photo'])
                    ->make(true);
        }        
        $view = 'Admin.Users.Index';
        return view('Admin', compact('view'));
    }
    public function customers(Request $request)
    {
        if ($request->ajax()) {
            $user = $this->service->table()->where('role', 'user');
            return Datatables::of($user)
                    ->addIndexColumn()
                    ->editColumn('photo', function($row){
                        if ($row->photo) {
                            return '<img src="'.asset($row->photo).'" style="width:70px;" />';
                        }
                    })
                    ->addColumn('action', function($row){
                        return '<div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item btn btn-info" href="'.route('users.edit', $row->user_id).'"
                              ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                            '.Form::open(array('route' => array('users.destroy', $row->user_id), 'method' => 'delete')).'
                                <button type="submit" class="btn btn-danger"><i class="bx bx-trash me-1"></i> Delete</button>
                            </form>
                        </div>';
                    })
                    ->editColumn('created_at', function($row){
                        return dateFormat($row->created_at);
                    })
                    ->rawColumns(['action', 'created_at','photo'])
                    ->make(true);
        }        
        $view = 'Admin.Users.Index';
        return view('Admin', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->service->select();
        $view = 'Admin.Users.AddEdit';
        return view('Admin', compact('view', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->service->store($request);
        Session::flash ( 'success', "New User saves successfully." );
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$user = $this->service->get($id)) {
            Session::flash ( 'success', "User not found in our system." );
            return redirect()->route('users.index');
        }
        $view = 'Admin.Users.AddEdit';
        return view('Admin', compact('view', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$user = $this->service->get($id)) {
            Session::flash ( 'success', "User not found in our system." );
            return redirect()->route('users.index');
        }
        $this->service->update($request, $user);
        Session::flash ( 'success', "User Details update successfully." );
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->service->get($id);
        if(!$user) {
            Session::flash ( 'warning', "No Ads found!!!!." );
            return Redirect::back ();
        }
        $this->service->delete($user);
        Session::flash ( 'success', "Ads deleted." );
        return Redirect::route ("users.index");
    }
    
}
