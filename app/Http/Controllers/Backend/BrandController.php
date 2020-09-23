<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Start-Added
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Brand;
use DataTables;
// end-added

class BrandController extends Controller
{
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
        $validator = Validator::make($request->all(), Brand::$rules);
        if($validator->fails()) {
            return response()->json(["errors"=>$validator->errors(),400]);
        }else{
            
            $brand= new Brand();
            $brand->brand_name = $request->brand_name;
            $brand->save();
            return response()->json(["success"=>"Data saved", "data"=>$brand, 201]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data= Brand::latest()->get();
        return $data_table_render = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function ($row){
                $btn = '<button class="btn btn-info btn-sm" onClick="editBrand('.$row['id'].')"><i class="fa fa-edit"></i></button>'.
                        '<button  onClick="deleteBrand('.$row['id'].')" class="btn btn-danger btn-sm delete_section"><i class="fa fa-trash-o"></i></button>';
                return $btn;
        })
        ->rawColumns(['action'])
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
        $brand = Brand::find($id);
        return response()->json($brand);
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
        $validator = Validator::make($request->all(), Brand::$rules);
        if($validator->fails()){
            return response()->json(["error"=>$validator->erroes(),400]);
        }else{
            $brand = Brand::find($id);
           
            $brand->brand_name=$request->brand_name;
            //$brand->user_id= Auth::user()->id;
            $brand->Save();
            return response()->json(["success"=>'Updated', "data"=>$brand,201]);
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
        $brandDelete = Brand::find($id);
        if($brandDelete){
            $brandDelete->delete();
            return response()->json(["success"=>'data deleted',201]);
        }
        return response()->json(["error"=>'error',422]);
    }
}
