<?php

namespace App\Http\Controllers\Backend\Supplier;
use App\Http\Controllers\Controller;

use App\Models\Backend\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\URL;
use DB;
use DataTables;


class SupplierController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.Supplier.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function syncTable()
    {
        $supplier=Supplier::orderBy('id','DESC')->get();
        

        $data_table_render = DataTables::of($supplier)

            ->addColumn('action',function ($row){
                return view('backend.pages.supplier.action',compact('row'));

            })
        
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(), Supplier::$rules);
        if ($validator->fails()) {
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
                $supplier= new Supplier();
                // $supplier->supplier_gen_id="sup_".time();
                $supplier->official_name=$request->official_name;
                $supplier->country=$request->country;
                $supplier->official_address=$request->official_address;
                $supplier->official_email=$request->official_email;
                $supplier->official_mobile=$request->official_mobile;
                //$supplier->contact_person=json_encode($request->contact);
                $supplier->save();
                
                DB::commit();
                return $this->success($supplier);
            } catch (\Exception $e) {
                DB::rollBack();
                return $this->error($e->getMessage(),200);
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return $this->success($supplier); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return $this->success($supplier); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validator= Validator::make($request->all(), Supplier::$rules);
        if ($validator->fails()) {
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
                $supplier->official_name=$request->official_name;
                $supplier->country=$request->country;
                $supplier->official_address=$request->official_address;
                $supplier->official_email=$request->official_email;
                $supplier->official_mobile=$request->official_mobile;
                //$supplier->contact_person=json_encode($request->contact);
                $supplier->update();
                //
                DB::commit();
                return $this->success($supplier);
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return $this->success($supplier);
    }
}
