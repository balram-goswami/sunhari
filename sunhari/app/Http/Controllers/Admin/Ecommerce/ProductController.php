<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session, DataTables, Redirect, DB, Validator, Form;
use App\Services\{
    ProductService,
    CommonService
};
use App\Models\{
    ProductVariation
};

class ProductController extends Controller
{
    protected $service;
    protected $commonService;
    protected $routeName;
    protected $serviceName;
    public function __construct(
        ProductService $service,
        CommonService $commonService
    ) {
        $this->service = $service;
        $this->commonService = $commonService;
        $this->serviceName = 'Product';
        $this->routeName = 'products';        
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
        $view = 'Admin.Ecommerce.Product.List';
        return view('Admin', compact('view', 'routeName', 'serviceName'));
    }

    public function fetchList(Request $request) {        
        if ($request->ajax()) {
            $rows = $this->service->table();
            return Datatables::of($rows)
                    ->addIndexColumn()
                    ->addColumn('nameImage', function($row) {
                        return '<div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><img src="'.asset($row->image).'" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="'.route($this->routeName.'.edit', $row->id).'" class="text-truncate"><small class="small-head-title">'.$row->name.'</small></a></div></div>';
                    })
                    ->addColumn('categories', function($row) {
                        $categoryNames = [];
                        if ($row->category) {
                            foreach ($row->category as $category) {
                                if ($category->category && $category->category->name) {
                                    $categoryNames[] = $category->category->name;
                                }
                            }
                        }
                        return implode(', ', $categoryNames);
                    })
                    ->addColumn('tags', function($row) {
                        $tagNames = [];
                        if ($row->tags) {
                            foreach ($row->tags as $tag) {
                                if ($tag->tag && $tag->tag->name) {
                                    $tagNames[] = $tag->tag->name;
                                }
                            }
                        }
                        return implode(', ', $tagNames);
                    })
                    ->addColumn('orders', function($row) {
                        return count($row->orders);
                    })
                    ->addColumn('action', function($row){
                        return '
                        <div class="d-flex gap-4">
                            <a class="btn btn-primary" title="Edit" href="'.route($this->routeName.'.edit', $row->id).'"
                              ><i class="bx bx-edit-alt me-1"></i></a
                              >
                            <a class="btn btn-warning" title="Clone" href="'.route($this->routeName.'.clone', $row->id).'"
                              ><i class="bx bx-copy-alt"></i></a
                              >
                            <a class="btn btn-info" title="View" target="_blank" href="'.route('shop.single', ['slug' => $row->slug]).'"
                              ><i class="bx bx-show me-1"></i></a
                              >
                            '.Form::open(array('route' => array($this->routeName.'.destroy', $row->id), 'method' => 'delete')).'
                                <button type="submit" title="Delete" class="btn btn-danger"><i class="bx bx-trash me-1"></i></button>
                            </form>
                        </div>';
                    })
                    ->editColumn('created_at', function($row){
                        return dateFormat($row->created_at);
                    })
                    ->rawColumns(['action', 'created_at', 'nameImage'])
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
        $view = 'Admin.Ecommerce.Product.AddEdit';
        $routeName = $this->routeName;
        $serviceName = $this->serviceName;
        $categories = $this->commonService->getCategoryWithChild();
        $variations = $this->commonService->getVariationWithChild();
        $tags = $this->commonService->getTags();
        $selectedCats = [];
        $selectedTags = [];
        return view('Admin', compact('view', 'row', 'routeName', 'serviceName', 'categories', 'variations', 'tags', 'selectedCats', 'selectedTags'));
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
        $view = 'Admin.Ecommerce.Product.AddEdit';
        $routeName = $this->routeName;
        $serviceName = $this->serviceName;
        $categories = $this->commonService->getCategoryWithChild();
        $variations = $this->commonService->getVariationWithChild();
        $tags = $this->commonService->getTags();
        $selectedCats = [];
        if ($row->category) {
            foreach ($row->category as $category) {
                $selectedCats[] = $category->category_id;
            }
        }
        $selectedTags = [];
        if ($row->tags) {
            foreach ($row->tags as $tag) {
                $selectedTags[] = $tag->tag_id;
            }
        }
        
        return view('Admin', compact('view', 'row', 'routeName', 'serviceName', 'categories', 'variations', 'tags', 'selectedCats', 'selectedTags'));
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

    public function cloneProduct($id) {
        $row = $this->service->get($id);
        if(!$row) {
            Session::flash ( 'warning', "No data found in our system." );
            return Redirect::back ();
        }
        $this->service->cloneProduct($row);
        Session::flash ( 'success', $this->serviceName." cloned." );
        return Redirect::route ($this->routeName.'.index');
    }

    public function getVariationRow(Request $request) {
        $index = $request->index;
        $product_id = $request->product_id;  
        $variationIds = $request->variationIds;  

        $variations = $this->commonService->getVariationWithChildById($variationIds); 
        $variationRow = new ProductVariation(); 
        return view('Admin.Ecommerce.Product.VariationRow', compact('index', 'product_id', 'variations', 'variationRow', 'variationIds'))->render();
    }
}
