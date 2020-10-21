<?php

namespace App\Http\Controllers\Backend\Region;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Start-Added
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Brand;
use App\Models\Section;
use App\Models\Region;
use App\Traits\ApiResponse;
use App\Traits\imageUpload;
use DB;
Use Image;
use DataTables;


class RegionCntroller extends Controller
{
    use ApiResponse, imageUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $region =Region::all();
        return view('backend.pages.region.create', compact('region'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Region::$rules);
        if($validator->fails()) {
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
            $region= new Region();
            $region->region_name = $request->region_name;
            $region->shipping_cost = $request->shipping_cost;
            $region->save();
            DB::commit();
            return $this->success($region);
        }catch (\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(),200);
            }

        }
    }


    public function syncTable()
    {
        $data= Region::latest()->get();
        return $data_table_render = DataTables::of($data)
            ->addIndexColumn()
            
            ->addColumn('action',function ($row){
                return view('backend.pages.region.action',compact('row'));
        })
        ->rawColumns(['thumbnail_image','action'])
        ->make(true);
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
        $region= Region::find($id);
        return $this->success($region);
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
        $validator = Validator::make($request->all(), Region::$rules);
        if($validator->fails()) {
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
                $region = Region::find($id);
                $region->region_name = $request->region_name;
                $region->shipping_cost = $request->shipping_cost;
                $region->save();
                DB::commit();
                return $this->success($region);
            }catch (\Exception $e) {
                DB::rollBack();
                return $this->error($e->getMessage(),200);
            }
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
        $region = Region::find($id);
        if($region){
            $region->delete();
            return $this->success($region);
        }
        return response()->json(["error"=>'error',422]);
    }
}
