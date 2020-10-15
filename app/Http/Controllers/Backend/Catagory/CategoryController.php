<?php

namespace App\Http\Controllers\Backend\Catagory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



//use Yajra\DataTables\DataTables;
use DataTables;
use App\Models\Backend\Category;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Traits\ApiResponse;
use App\Traits\imageUpload;
use Illuminate\Support\Facades\URL;
use DB;
use Image;
Use File;
// end-added



class CategoryController extends Controller
{
    use ApiResponse;
    use imageUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::whereNull('category_id')
        ->with('childrenCategories')
        ->get();
        $sections=Section::get();
    // return view('categories', compact('categories'));
     return view('backend.pages.category.create', compact(['categories','sections']));

    

    //return view('backend.pages.classes.manageClass');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

        $validator = Validator::make($request->all(), Category::$rules);
        
        if($validator->fails()) {
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
            $category= new Category();
            $category->name = $request->name;
            //$slugable = $request->name."-".$category->id;
            $category->slug = Str::slug($request->name)."-".rand(1,2000);
            $category->category_id = $request->category_id;
            $category->section_id = $request->section_id;
            $category->status = $request->status;
            $category->description = $request->description;
            if ($image = $request->file('thumbnail_image')) {
                ini_set('memory_limit','256M');
                $img=time().'.'.$image->getClientOriginalExtension();
                $location='img/product/catagory/thumbnail';
                
                $image->move( $location, $img);
    
                $category->thumbnail_image = $img;
            }
            $category->save();
            DB::commit();
            return $this->success($category);
        }catch (\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(),200);
        }
        
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function synctable()
    {
        //

        $catagories= Category::with(['childrenCategories','section'])->get();
            return $data_table_render = DataTables::of($catagories)
                ->addIndexColumn()
                ->editColumn('thumbnail_image', function($raw){
                    if(!empty($raw->thumbnail_image)){
                    $url= URL::to('/img/product/catagory/thumbnail/'.$raw->thumbnail_image);
                     $img='<img src='.$url.' border="0" width="40" class="img-rounded" align="center" />';
                     return $img;
                    }
                })
                ->addColumn('parent_catagories',function($catagories){
                    return view('backend.pages.category.child_category',compact('catagories'));
                })
                ->addColumn('action',function ($row){
                    return view('backend.pages.category.action',compact('row'));
                   
            })
           
            ->rawColumns(['thumbnail_image','action'])
            ->make(true);

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
        $category = Category::find($id);
        return $this->success($category);
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

        $validator = Validator::make($request->all(), Category::$rules);
        if($validator->fails()){
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
            try {
            $category = Category::find($id);
           
            $category->name = $request->name;
            $category->category_id = $request->category_id;
            $category->section_id = $request->section_id;
            $category->status = $request->status;
            $category->description = $request->description;
            if ($image = $request->file('thumbnail_image')) {
                ini_set('memory_limit','256M');
                $thumbnailPath='img/product/catagory/thumbnail';
                $existImage_path=$thumbnailPath.$category->thumbnail_image;
               $category->thumbnail_image = $this->updateSingleImage($image,$existImage_path, $thumbnailPath);
                } 
                $category->save();
                DB::commit();
                return $this->success($category);
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
        $category = Category::find($id);
        
        if(!empty($category->thumbnail_image)){
            $image_path='img/product/catagory/thumbnail/'.$category->thumbnail_image;
            if (File::exists($image_path)) {
                //File::delete($image_path);
                unlink($image_path);
            }
        }
        $category->delete();
        return response()->json($category);
    }
}
