<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Product;

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
       return view('frontend\pages\myapp\index', compact($products,'products'));
    }
    public function allCategoryProduct()
    {
        $products = Product::latest()->get();
        $latest_products = Product::latest()->get();
        $featured_products = Product::latest()->get();
        $bestseller_products = Product::latest()->get();
        $man_products = Product::latest()->get();
        $man_products = Product::latest()->get();
        $all_products = Product::latest()->get();

       // return response()->json($products);
       return view('frontend.pages.product.all-category-product', compact($products,'products'));
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
        if (!is_null($product)) {
          return view('frontend.pages.product.show', compact('product'));
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
