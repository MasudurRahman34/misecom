<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
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
    // public function store(Request $request)
    // {
    //     //
    //     $user_id= Auth::guard('web')->user()->id;
    
    //     $order = new Order();
    //     if (Auth::check()) { $order->user_id = $user_id;}
    //     $order->ip_address = request()->ip();  
    //     $order->totalprice = $request->total_amount;

    //     $order->delivery_clint_name = $request->delivery_clint_name;
    //     $order->delivery_clint_phone_number = $request->delivery_clint_phone_number;
    //     $order->delivery_clint_emailAddress = $request->delivery_clint_emailAddress;
    //     $order->delivery_shipping_address_1 = $request->delivery_shipping_address_1;
    //     $order->delivery_shipping_address_2 = $request->delivery_shipping_address_2;
    //     $order->delivery_city = $request->delivery_city;
    //     $order->delivery_post_code = $request->delivery_post_code;
    //     $order->delivery_region = $request->delivery_region;
    //     $order->payment_option = $request->payment_option;

    //    $order->save();

    //     if($order){

    //         foreach (Cart::totalCarts() as $cart) {
    //             $cart->order_id = $order->id;
    //             //$cart->user_id =$order->user_id;
    //             $cart->save();
    //           }
    //           $user_billing_details= User::find($order->user_id);
            
    //           if(!is_null($user_billing_details)){
    //             //change last name into name
    //             $user_billing_details->Billing_Details_last_name =$request->Billing_Details_name;
    //             $user_billing_details->Billing_Details_address =$request->Billing_Details_address;
    //             $user_billing_details->Billing_Details_contact_number =$request->Billing_Details_contact_number;
    //             $user_billing_details->Billing_Details_city =$request->Billing_Details_city;
    //             $user_billing_details->Billing_Details_region =$request->Billing_Details_region;
    //             $user_billing_details->save();
    //             }

    //           session()->flash('success', 'Your order has taken successfully !!! Please wait admin will soon confirm it.');
    //         return redirect()->back();
    //     }
    // }

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
