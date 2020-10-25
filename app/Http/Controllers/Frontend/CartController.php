<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Frontend\Order;
use App\Models\Frontend\Cart;
use App\Models\Backend\ProductVariant;

use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.cart.index');
    }

    public function ajax_header_cart(){
      return view('frontend.pages.cart.partials.ajax_header_cart');
    }

    //ajax_cart_table
    public function ajax_cart_table(){
      return view('frontend.pages.cart.partials.ajax_cart_table');
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
        
    $this->validate($request, [
        'product_id' => 'required',
         'product_size' => 'required',
        
      ],
      [
        'product_id.required' => 'Please give a product'
      ]);
  
      if (Auth::check()) {
        $cart = Cart::where('user_id', Auth::id())
        ->where('product_id', $request->product_id)
        ->where('order_id', NULL)
        ->first();
      }else {
        $cart = Cart::where('ip_address', request()->ip())
        ->where('product_id', $request->product_id)
        ->where('order_id', NULL)
        ->first();
      }
  
  
      //reduce duplicate entry by add to cart
      if (!is_null($cart)) {
        $product= ProductVariant::where('product_id',$request->product_id);
        $product->decrement('quantity',1);
        //$product->save();

        $cart->increment('product_quantity');
      }else {

        $cart = new Cart();

        if (Auth::check()) {
          $cart->user_id = Auth::id();
        }
        
        $cart->ip_address = request()->ip();
        $cart->product_id = $request->product_id;
        $cart->product_size = $request->product_size;

        if(!is_null($request->product_id)){
          $product= ProductVariant::where('product_id',$request->product_id);
          $product->decrement('quantity',1);
          //$product->save();
        }
        
        $cart->save();
      }
      $totalItems= Cart::totalItems();
      return redirect()->back()
            ->with('success',"Item added to cart",'totalItems', $totalItems);

    // return json_encode(['status' => 'success', 'Message' => 'Item added to cart', 'totalItems' => Cart::totalItems()]);

    }

    public function ProductStore(Request $request)
    {
        
    $this->validate($request, [
        'product_id' => 'required',
        'product_quantity' => 'required'
      ],
      [
        'product_id.required' => 'Please give a product',
        'product_quantity.required' => 'Please give a product'
      ]);
  
      if (Auth::check()) {
        $cart = Cart::where('user_id', Auth::id())
        ->where('product_id', $request->product_id)
        ->where('order_id', NULL)
        ->first();
      }else {
        $cart = Cart::where('ip_address', request()->ip())
        ->where('product_id', $request->product_id)
        ->where('order_id', NULL)
        ->first();
      }
  
  
      //reduce duplicate entry by add to cart
      if (!is_null($cart)) {
        $cart->product_quantity = $request->product_quantity;
        $cart->product_size = $request->product_size;
        $cart->save();
      }else {

          $cart = new Cart();

          if (Auth::check()) {
            $cart->user_id = Auth::id();
          }
          
          $cart->ip_address = request()->ip();
          $cart->product_id = $request->product_id;
          $cart->product_quantity = $request->product_quantity;
          $cart->product_size = $request->product_size;
          $cart->save();
      }
      $totalItems= Cart::totalItems();
      return redirect()->back()
            ->with('success',"Item added to cart",'totalItems', $totalItems);

    // return json_encode(['status' => 'success', 'Message' => 'Item added to cart', 'totalItems' => Cart::totalItems()]);

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
      $id= $request->cart_id;

      //find the cart
      $cart = Cart::find($id);
      if (!is_null($cart)) {
        $cart->product_quantity = $request->product_quantity;
        $cart->product_size = $request->product_size;
        $cart->save();
      }else {
        return redirect()->route('carts');
      }
      session()->flash('success', 'Cart item has updated successfully !!');
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //$id= $request->cart_id;
      $cart = Cart::find($id);
      if (!is_null($cart)) {
        $cart->delete();
      }else {
        return redirect()->route('carts');
      }
      session()->flash('success', 'Cart item has deleted !!');
      return back();
    }
}
