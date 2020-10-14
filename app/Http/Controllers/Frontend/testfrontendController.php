<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Product;
use App\Models\Backend\Category;
use DB;

class testfrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        $latest_products = Product::latest()->get();
        $featured_products = Product::latest()->get();
        $bestseller_products = Product::latest()->get();
        $man_products = Product::latest()->get();
        $man_products = Product::latest()->get();
        $all_products = Product::latest()->get();

       // return response()->json($products);
       return view('frontend.pages.myapp.index', compact($products,'products'));
    }
    public function allProduct()
    {
        $products = Product::orderBy('id','desc')->get();
        $latest_products = Product::latest()->get();
        $featured_products = Product::latest()->get();
        $bestseller_products = Product::latest()->get();
        $man_products = Product::latest()->get();
        $man_products = Product::latest()->get();
        $all_products = Product::latest()->get();

       // return response()->json($products);
       return view('frontend.pages.product.partials.all-products', compact($products,'products'));
    }

  
    public function allcategoryProduct($id)
    {
        if(!is_null($id)){

           // $products = Product::where('category_id',$id)->with('categories')->orWhere('categories.id',$id)->get();
           $products = Product::with('categories')->where('id',$id)->orwhere('category_id', $id)->orWhere('id',$id)->get();
           //$products = Product::with('categories')->where('category_id', $id)->orwhere('id',$id)->with('sections')->orWhere('id',$id)->get();
            //$products =Category::Where('id',$ct_id)->get();
                //->leftJoin('categories', 'products.category_id', '=', 'categories.id')->get();
                //->orWhere('categories.id',$id)->get();
                    // return response()->json($products);
                        if(!is_null($products)){
                            return view('frontend.pages.product.partials.all-category-subcategory-product', compact($products,'products'));
                        } return view('frontend\partials\errors');
        }
        return view('frontend\partials\errors');
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productshow($slug)
    {
        $product = Product::where('slug', $slug)->first();

        $categories_id = $product->categories->id;
        if (!is_null($product)) {
            $Product_category = product::where('category_id', $categories_id)->get();
                return view('frontend.pages.product.show', compact('product','Product_category'));
        }else {
            session()->flash('errors', 'Sorry !! There is no product by this URL..');
                return redirect()->route('shop');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
