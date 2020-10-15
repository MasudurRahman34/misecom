<?php

namespace App\Http\Controllers\Backend\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DataTables;
use App\Models\Sections;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
use App\Traits\imageUpload;
use Illuminate\Support\Facades\URL;
use DB;
use Image;
Use File;

class SectionsController extends Controller
{ use ApiResponse;
use imageUpload;
    //
    public function index()
    {
        return view('backend.pages.section.create');
    }

   
    public function syncTable()
    {
        $sections= Sections::get();
        return $data_table_render = DataTables::of($sections)
            ->addIndexColumn()
            ->editColumn('thumbnail_image', function($raw){
                $url= URL::to('/img/product/section/thumbnail/'.$raw->thumbnail_image);
                 $img='<img src='.$url.' border="0" width="40" class="img-rounded" align="center" />';
                 return $img;
            })
            ->addColumn('action',function ($row){
                return view('backend.pages.section.action',compact('row'));

        })
       
        ->rawColumns(['thumbnail_image','action'])
        ->make(true);

    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Sections::$rules);
        
        if($validator->fails()) {
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
            $section= new Sections();
            $section->name = $request->name;
            $section->status = $request->status;
            if ($image = $request->file('thumbnail_image')) {
                $img=time().'.'.$image->getClientOriginalExtension();
                
                $thumbnailPath='img/product/section/thumbnail';
                $image->move($thumbnailPath,$img);
                
                $section->thumbnail_image = $img;
            }
            
            $section->save();
            DB::commit();
            return $this->success($section);
        }catch (\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(),200);
        }
        
     }
    }

    public function show($sections)
    {
        
    }


    public function edit($sections)
    {
        $section = Sections::find($sections);
        return $this->success($section);   
    }

    public function getCatagoryBrand($sections)
    {
        $section = Sections::with(['brands','catagories'])->find($sections);
        return $this->success($section);   
    }

   
    public function update(Request $request, $section)
    {
        $validator = Validator::make($request->all(), Sections::$rules);
        
        if($validator->fails()) {
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
            $section= Sections::find($section);
            $section->name = $request->name;
            $section->status = $request->status;
           
            if ($image = $request->file('thumbnail_image')) {
                $thumbnailPath='img/product/section/thumbnail/';
                 $existImage_path=$thumbnailPath.$section->thumbnail_image;
                // if (File::exists($image_path)) {
                //     //File::delete($image_path);
                //     unlink($image_path);
                // }
 
                // $img=time().'.'.$image->getClientOriginalExtension();
                 
                // $image->move('public/img/product/section/thumnail/',$img);
                $section->thumbnail_image = $this->updateSingleImage($image,$existImage_path, $thumbnailPath);
            }
            
            $section->status = $request->status;
            $section->save();
            DB::commit();
            return $this->success($image);
        }catch (\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(),200);
        }
        
     }
    }

   
    public function destroy($sections)
    {
        $section= Sections::find($sections);
        if(!empty ($section->thumbnail_image)){
            $image_path='img/product/section/thumbnail/'.$section->thumbnail_image;
            if (File::exists($image_path)) {
                //File::delete($image_path);
                unlink($image_path);
            }
        }
       
        $section->delete();
        return $this->success($section);
    }
}
