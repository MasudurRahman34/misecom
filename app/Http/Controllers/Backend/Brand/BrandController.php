<?php

namespace App\Http\Controllers\Backend\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Start-Added
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Brand;
use App\Traits\ApiResponse;
use DB;
use DataTables;
// end-added

class BrandController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('backend.pages.category.create', compact('categories'));
        return view('backend.pages.brand.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Brand::$rules);
        if($validator->fails()) {
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
            $brand= new Brand();
            $brand->brand_name = $request->brand_name;
            $brand->section_id = $request->section_id;
            $brand->status = $request->status;
            $brand->img = $request->img;
            $brand->save();
            DB::commit();
            return $this->success($brand);
        }catch (\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(),200);
            }

        }
    }   

    public function syncTable()
    {
        $data= Brand::latest()->get();
        return $data_table_render = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function ($row){
                return view('backend.pages.brand.action',compact('row'));
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function edit($id)
    {
        //
        $brand = Brand::find($id);
        return $this->success($brand);
    }

    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), Brand::$rules);
        if($validator->fails()) {
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
                $brand = Brand::find($id);
            $brand->brand_name = $request->brand_name;
            $brand->status = $request->status;
            $brand->save();
            DB::commit();
            return $this->success($brand);
        }catch (\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(),200);
            }

        }

    }

   
    public function destroy($id)
    {
        $brandDelete = Brand::find($id);
        if($brandDelete){
            $brandDelete->delete();
            return $this->success($brand);
        }
        return response()->json(["error"=>'error',422]);
    }
}
