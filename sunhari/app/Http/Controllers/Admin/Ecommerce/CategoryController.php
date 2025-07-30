<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session, DataTables, Redirect, DB, Validator, Form;
use App\Services\{
    CategoryService,
    CommonService
};

class CategoryController extends Controller
{
    protected $service;
    protected $commonService;
    protected $routeName;
    protected $serviceName;
    public function __construct(
        CategoryService $service,
        CommonService $commonService
    ) {
        $this->service = $service;
        $this->commonService = $commonService;
        $this->serviceName = 'Category';
        $this->routeName = 'category';        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $routeName = $this->routeName;
        $serviceName = $this->serviceName;
        $view = 'Admin.Ecommerce.Category.List';
        return view('Admin', compact('view', 'routeName', 'serviceName'));
    }

    public function fetchList(Request $request) {        
        if ($request->ajax()) {
            $rows = $this->service->table();
            return Datatables::of($rows)
                    ->addIndexColumn()
                    ->addColumn('parent_name', function($row) {
                        return $row->parent?$row->parent->name:'';
                    })
                    ->addColumn('action', function($row){
                        return '
                        <div class="d-flex gap-4">
                           <a class="btn btn-info" href="'.route($this->routeName.'.edit', $row->id).'"
                              ><i class="bx bx-edit-alt me-1"></i></a
                              >
                            '.Form::open(array('route' => array($this->routeName.'.destroy', $row->id), 'method' => 'delete')).'
                                <button type="submit" class="btn btn-danger"><i class="bx bx-trash me-1"></i></button>
                            </form>
                        </div>';
                    })
                    ->editColumn('created_at', function($row){
                        return dateFormat($row->created_at);
                    })
                    ->rawColumns(['action', 'created_at','parent_name'])
                    ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $row = $this->service->select();
        $view = 'Admin.Ecommerce.Category.AddEdit';
        $routeName = $this->routeName;
        $serviceName = $this->serviceName;
        $categories = $this->commonService->getParentCategory();
        return view('Admin', compact('view', 'row', 'routeName', 'serviceName', 'categories'));
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
        Session::flash ( 'success', $this->serviceName." created successfully." );
        return redirect()->route($this->routeName.'.index');
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
        if(!$row = $this->service->get($id)) {
            Session::flash ( 'success', "No data found in our system." );
            return redirect()->route($this->routeName.'.index');
        }
        $view = 'Admin.Ecommerce.Category.AddEdit';
        $routeName = $this->routeName;
        $serviceName = $this->serviceName;
        $categories = $this->commonService->getParentCategory();
        return view('Admin', compact('view', 'row', 'routeName', 'serviceName', 'categories'));
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
        if(!$row = $this->service->get($id)) {
            Session::flash ( 'success', "No data found in our system." );
            return redirect()->route($this->routeName.'.index');
        }
        $this->service->update($request, $row);
        Session::flash ( 'success', $this->serviceName." updated successfully." );
        return redirect()->route($this->routeName.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = $this->service->get($id);
        if(!$row) {
            Session::flash ( 'warning', "No data found in our system." );
            return Redirect::back ();
        }
        $this->service->delete($row);
        Session::flash ( 'success', $this->serviceName." deleted." );
        return Redirect::route ($this->routeName.'.index');
    }
}
