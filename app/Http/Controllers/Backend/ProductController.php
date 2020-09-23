<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//use-add
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Brand;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use Illuminate\Support\Str;
use DataTables;
use Session;

//end-use-add

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //return view('backend.pages.category.create', compact('categories'));
         $categories = Category::whereNull('category_id')
         ->with('childrenCategories')
         ->get();
         $brands = Brand::all();
         return view('backend.pages.product.create', compact('categories','brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Product::$rules);
        if($validator->fails()) {
            return response()->json(["errors"=>$validator->errors(),400]);
        }else{
                try {
                
                    $product= new Product();
                    $product->product_title = $request->product_title;
                    $product->product_description = $request->product_description;
                    $product->slug = Str::of( $request->product_title )->slug('-');
                    $product->Price = $request->Price;
                    $product->category_id = $request->category_id;
                    $product->brand_id = $request->brand;
                    $product->save();
                    // Session::flash('alert-danger', 'danger');
                    // Session::flash('alert-warning', 'warning');
                    Session::flash('alert-success', 'success');
                    // Session::flash('alert-info', 'info');
                    return response()->json(["success"=>"Data saved", "data"=>$product, 201]);

                } catch (Exception $e) {

                  
                    return response()->json(["errors"=>"somthing Happend wrong!",400]);
                }
            }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //product-show
        $data= Product::latest()->get();
        return $data_table_render = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function ($row){
                $btn = '<button class="btn btn-info btn-sm" onClick="editProduct('.$row['id'].')"><i class="fa fa-edit"></i></button>'.
                        '<button  onClick="deleteProduct('.$row['id'].')" class="btn btn-danger btn-sm delete_section"><i class="fa fa-trash-o"></i></button>';
                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json($product);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productDelete = Product::find($id);
        if($productDelete){
            $productDelete->delete();
            return response()->json(["success"=>'data deleted',201]);
        }
        return response()->json(["error"=>'error',422]);
    }
}
