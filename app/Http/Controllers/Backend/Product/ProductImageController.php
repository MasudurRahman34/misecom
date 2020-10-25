<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Backend\Product;
use App\Models\Backend\Images;

use App\Traits\ApiResponse;
use App\Traits\imageUpload;
use DataTables;
use Session;
use DB;
Use File;
use Illuminate\Support\Facades\URL;

class ProductImageController extends Controller
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
        $products = Product::all();
        return view('backend.pages.product.image.create', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function syncTable()
    {
        $images= Images::with('product')->get();
        return $data_table_render = DataTables::of($images)
            ->addIndexColumn()
            ->editColumn('product_image', function($raw){
                $url= URL::to('/img/product/'.$raw->link);
                 $img='<img src='.$url.' border="0" width="40" class="img-rounded" align="center" />';
                 return $img;
            })
            ->addColumn('action',function ($row){
                return view('backend.pages.product.image.action',compact('row'));

        })
       
        ->rawColumns(['product_image','action'])
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
        // return $request;
        DB::beginTransaction();
        try {
        if(($request->images !=null) && (count($request->images)>0)){
            $i = 0;
            foreach($request->images as $image){
                    //$image= $request->file('image');
                ini_set('memory_limit','256M');
                $img= time().$i.'.'.$image->getClientOriginalExtension();
                $thumbnailPath='img/product';
                $image->move($thumbnailPath,$img);
                $product = Product::find($request->product_id);
                $im= new Images;
                $im->type= 'product';
                $im->type_id=$request->product_id;
                $im->name=$product->product_title;
                $im->link=$img;
                $im->status=0;
                $im->Save();
                DB::commit();
                $i++;
            }
            return $this->success($im);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(),200);
        }
    }

  
    
    public function destroy($id)
    {
        $product_image= Images::find($id);
        if(!empty ($product_image->link)){
            $image_path='img/product/'.$product_image->link;
            if (File::exists($image_path)) {
                //File::delete($image_path);
                unlink($image_path);
            }
        }
       
        $product_image->delete();
        return $this->success($product_image);
    }
}
