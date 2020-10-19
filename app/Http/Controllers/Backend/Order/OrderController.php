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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.order.create');
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
        // $data= DB::select("SELECT * FROM orders,carts,products,users 
        //                     where  
        //                     orders.id=carts.order_id AND
        //                     carts.product_id=products.id AND
        //                     orders.user_id=users.id and
        //                     carts.order_id IS NOT NUll 
                            
        //                     ");
    
        //$order_carts_items = Cart::whereNotNull('order_id')->get();
        return $data_table_render = DataTables::of($data)
            ->addIndexColumn()
            // ->editColumn('product.name', function($raw){
            //     $name = $raw->product->product_title;
            //     return $name;
            // })
           
            ->addColumn('action',function ($row){
                return view('backend.pages.order.action',compact('row'));
            })
            ->rawColumns(['action'])
            ->make(true);
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
