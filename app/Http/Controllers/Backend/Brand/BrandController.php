<?php

namespace App\Http\Controllers\Backend\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Start-Added
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Brand;
use App\Models\Sections;
use App\Traits\ApiResponse;
use App\Traits\imageUpload;
use DB;
Use Image;
Use File;
use DataTables;
use URL;
// end-added

class BrandController extends Controller
{
    use ApiResponse, imageUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections=Sections::get();
        //return view('backend.pages.category.create', compact('categories'));
        return view('backend.pages.brand.create',  compact('sections'));
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
            $brand->name = $request->name;
            $brand->section_id = $request->section_id;
            $brand->status = $request->status;
            $brand->description = $request->description;
            if ($image = $request->file('thumbnail_image')) {
                $img=time().'.'.$image->getClientOriginalExtension();
              
                $thumbnailPath='img/product/brand/thumbnail';
                $image->move($thumbnailPath,$img);
                // $img=time().'.'.$image->getClientOriginalExtension();
                 
                // $image->move('public/img/product/section/thumnail',$img);
                $brand->thumbnail_image = $img;
            }
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
            ->editColumn('thumbnail_image', function($raw){
                $url= URL::to('/img/product/brand/thumbnail/'.$raw->thumbnail_image);
                 $img='<img src='.$url.' border="0" width="40" class="img-rounded" align="center" />';
                 return $img;
            })
            ->addColumn('action',function ($row){
                return view('backend.pages.brand.action',compact('row'));
        })
        ->rawColumns(['thumbnail_image','action'])
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
            $brand->name = $request->name;
            $brand->status = $request->status;
            $brand->description = $request->description;
            $brand->section_id = $request->section_id;
            if ($image = $request->file('thumbnail_image')) {
                $thumbnailPath='img/product/brand/thumbnail/';
                $existImage_path=$thumbnailPath.$brand->thumbnail_image;
               $brand->thumbnail_image = $this->updateSingleImage($image,$existImage_path, $thumbnailPath);
            }
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
        $brand = Brand::find($id);
        if($brand){
            $brand->delete();
            return $this->success($brand);
        }
        return response()->json(["error"=>'error',422]);
    }
}
