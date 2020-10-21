<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Frontend\Cart;
use App\Models\Frontend\Order;
use App\Models\Region;
use Session;
use Auth;
use App\User;
use App\Traits\ApiResponse;
use DB;
Use Image;
Use File;
use DataTables;

class OrderController extends Controller
{
    use ApiResponse;
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id= Auth::guard('web')->user()->id;

        $user =User::find($user_id);
        //$user->order->latest()->first();
        $regions = Region::all();
        return view('frontend.pages.checkout.index',compact('user','regions'));
    }

    public function region(){
        $region = Region::all();
        return $this->success($region);
    }

    //ajax_table
    public function ajax_checkout_page_productcost(){

        return view('frontend.pages.checkout.partials.ajax_checkout_table');
    }

   
    //
    public function invoice()
    {
        $user_id= Auth::guard('web')->user()->id;

        //$user=User::find($user_id);
        
            $user_order = Order::all()->where('user_id',$user_id)->last();
            $order_id= $user_order->id;
            $order_carts_items = Cart::where('order_id',$order_id)->get();
            //$cart_product->
            //order_details =Order::where('user_id',);
            return view('frontend.pages.invoice.invoice',compact('user_order','order_carts_items'));


        return redirect()->round('shop');
    }


    //order-page

    public function orderindex(){
        $user_id= Auth::guard('web')->user()->id;
        $order= Order::where('user_id',$user_id)->get();
        return view('frontend.pages.order.create',compact('order'));
    }

    public function syncTable()
    {
        $user_id= Auth::guard('web')->user()->id;
        $data= Order::where('user_id',$user_id)->with('cart')->get();
        //$order_carts_items = Cart::whereNotNull('order_id')->get();
        return $data_table_render = DataTables::of($data)
            ->addIndexColumn()
            // ->editColumn('product.name', function($raw){
            //     $name = $raw->product->product_title;
            //     return $name;
            // })
            ->editColumn('is_paid', function($raw){
                
                return (($raw['is_paid']== 0) ? 'NOT Paid' : 'Payment Complete');
            })
            ->editColumn('is_completed', function($raw){
                
                return (($raw['is_completed']== 0) ? 'NOT Complate' : ' Complete');
            })
           
            ->addColumn('OrderDetails',function ($row){
                return view('frontend.pages.order.action-orderDetails',compact('row'));
            }) 
            ->addColumn('action',function ($row){
                return view('frontend.pages.order.action',compact('row'));
            })
            ->rawColumns(['OrderDetails','action'])
            ->make(true);
    }


    public function orderDetails($id)
    {
        //$user_id= Auth::guard('web')->user()->id;

        //$user=User::find($user_id);
        
            $user_order = Order::all()->where('id',$id)->first();
            $order_id= $user_order->id;
            $order_carts_items = Cart::where('order_id',$order_id)->get();
            //$cart_product->
            //order_details =Order::where('user_id',);
            return view('frontend.pages.order.order_details',compact('user_order','order_carts_items'));


        // return redirect()->round('shop');
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
            'delivery_clint_name'  => 'required',
            'delivery_clint_phone_number'  => 'required',
            'delivery_shipping_address_1'  => 'required',
            'delivery_shipping_address_2'  => 'required',
            'delivery_city'  => 'required',
            'payment_option'  => 'required',
            'delivery_region'  => 'required',
            // 'Billing_Details_name'  => 'required',
            'Billing_Details_address'  => 'required',
            'Billing_Details_contact_number'  => 'required',
            'Billing_Details_contact_number'  => 'required',

          ]);
        //
        $user_id= Auth::guard('web')->user()->id;
    
        $order = new Order();
        if (Auth::check()) { $order->user_id = $user_id;}
        $order->ip_address = request()->ip();  
        $order->totalprice = $request->total_amount;

        $order->delivery_clint_name = $request->delivery_clint_name;
        $order->delivery_clint_phone_number = $request->delivery_clint_phone_number;
        $order->delivery_clint_emailAddress = $request->delivery_clint_emailAddress;
        $order->delivery_shipping_address_1 = $request->delivery_shipping_address_1;
        $order->delivery_shipping_address_2 = $request->delivery_shipping_address_2;
        $order->delivery_city = $request->delivery_city;
        $order->delivery_post_code = $request->delivery_post_code;
        $order->delivery_region = $request->delivery_region;
        $order->payment_option = $request->payment_option;

       $order->save();

        if($order){

            foreach (Cart::totalCarts() as $cart) {
                $cart->order_id = $order->id;
                //$cart->user_id =$order->user_id;
                $cart->save();
              }
              $user_billing_details= User::find($order->user_id);
            
              if(!is_null($user_billing_details)){
                //change last name into name
                $user_billing_details->Billing_Details_last_name =$request->Billing_Details_name;
                $user_billing_details->Billing_Details_address =$request->Billing_Details_address;
                $user_billing_details->Billing_Details_contact_number =$request->Billing_Details_contact_number;
                $user_billing_details->Billing_Details_city =$request->Billing_Details_city;
                $user_billing_details->Billing_Details_region =$request->Billing_Details_region;
                $user_billing_details->save();
                }

              session()->flash('success', 'Your order has taken successfully !!! Please wait admin will soon confirm it.');
            return redirect()->back();
        }
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
        $order = Order::find($id);
        return $this->success($order);
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
