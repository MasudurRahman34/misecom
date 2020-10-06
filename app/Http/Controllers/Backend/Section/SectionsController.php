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
                $url= URL::to('/public/img/product/section/thumnail/'.$raw->thumbnail_image);
                 $img='<img src='.$url.' border="0" width="40" class="img-rounded" align="center" />';
                 return $img;
            })
            ->addColumn('action',function ($row){
                return view('backend.pages.section.action',compact('row'));
                // $btn = '<button class="btn btn-info btn-sm" onClick="editsection('.$row['id'].')"><i class="fa fa-edit"></i></button>'.
                //         '<button  onClick="deleteSections('.$row['id'].')" class="btn btn-danger btn-sm delete_section"><i class="fa fa-trash-o"></i></button>';
                // return $btn;
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
                $image=Image::make($image);
                
                $thumbnailPath='public/img/product/section/thumnail/';
                $image->save($thumbnailPath.$img);
                // $img=time().'.'.$image->getClientOriginalExtension();
                 
                // $image->move('public/img/product/section/thumnail',$img);

            }
            $section->thumbnail_image = $img;
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
                 $savePath='public/img/product/section/thumnail/';
                 $existImage_path='public/img/product/section/thumnail/'.$section->thumbnail_image;
                // if (File::exists($image_path)) {
                //     //File::delete($image_path);
                //     unlink($image_path);
                // }
 
                // $img=time().'.'.$image->getClientOriginalExtension();
                 
                // $image->move('public/img/product/section/thumnail/',$img);
                $section->thumbnail_image = $this->updateSingleImage($image,$existImage_path, $savePath);
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
        $image_path='public/img/product/section/thumnail/'.$section->thumbnail_image;
        if (File::exists($image_path)) {
            //File::delete($image_path);
            unlink($image_path);
        }
        $section->delete();
        return $this->success($section);
    }
}
