<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Category;

//use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use DataTables;

class CategoryController extends Controller
{
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
    // return view('categories', compact('categories'));
     return view('backend.pages.category.create', compact('categories'));

    

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
            return response()->json(["errors"=>$validator->errors(),400]);
        }else{
            $category= new Category();
            // $group->classId = $request->classId;
            $category->name = $request->name;
            //$category->bId = Auth::user()->id;
            $category->save();
            return response()->json(["success"=>"Data saved", "data"=>$category, 201]);
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
        //

        $data= Category::latest()->get();
            return $data_table_render = DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function ($row){
                    $btn = '<button class="btn btn-info btn-sm" onClick="editGroup('.$row['id'].')"><i class="fa fa-edit"></i></button>'.
                            '<button  onClick="deleteGroup('.$row['id'].')" class="btn btn-danger btn-sm delete_section"><i class="fa fa-trash-o"></i></button>';
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

        $group = Category::find($id);
        return response()->json($group);
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
            return response()->json(["error"=>$validator->erroes(),400]);
        }else{
            $group = Category::find($id);
            $group->classId = $request->classId;
            $group->group=$request->group;
            $group->bId= Auth::user()->bId;
            $group->Save();
            return response()->json(["success"=>'Updated', "data"=>$group,201]);
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

        $groupDelete = Category::find($id);
        if($groupDelete){
            $groupDelete->delete();
            return response()->json(["success"=>'data deleted',201]);
        }
        return response()->json(["error"=>'error',422]);
    
    }
}
