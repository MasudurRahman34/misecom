<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Frontend\Order;
use App\Models\Frontend\Cart;
use App\Models\Section;
use App\Traits\ApiResponse;
use App\Traits\imageUpload;
use DB;
Use Image;
Use File;
use DataTables;
use URL;
use app\User;

class OrderController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order= Order::get();
        return view('backend.pages.order.create',compact('order'));
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

    public function syncTable()
    {
        
        $data= Order::with('cart')->get();
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
                return view('backend.pages.order.action-orderDetails',compact('row'));
            }) 
            ->addColumn('action',function ($row){
                return view('backend.pages.order.action',compact('row'));
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
            return view('backend.pages.order.order_details',compact('user_order','order_carts_items'));


        // return redirect()->round('shop');
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
        
        DB::beginTransaction();
            try {
            $order= Order::find($id);
            $order->is_paid = $request->is_paid;
            $order->is_completed = $request->is_completed;
           
            $order->save();
            DB::commit();
            return $this->success($order);
        }catch (\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(),200);
        }
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
