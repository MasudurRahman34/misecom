<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//use-add
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Brand;
use App\Models\Backend\Category;
use App\Models\Backend\Supplier;
use App\Models\Section;
use App\Models\Backend\Product;
use App\Models\Backend\Fabrics;
use App\Models\Backend\Images;
use App\Models\Backend\ProductVariant;
use Illuminate\Support\Str;
use App\Traits\ApiResponse;
use App\Traits\imageUpload;
use DataTables;
use Session;
use DB;

//end-use-add

class ProductController extends Controller
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
         //return view('backend.pages.category.create', compact('categories'));
         $categories = Category::whereNull('category_id')
         ->with('childrenCategories')
         ->get();
         $brands = Brand::get();
         $suppliers = Supplier::get();
         $sections = Section::get();
         $fabrics = Fabrics::get();
         return view('backend.pages.product.create', compact('categories','brands','suppliers','fabrics','sections'));
    }
    

    public function store(Request $request)
    {
       // dd($request);
        $validator = Validator::make($request->all(), Product::$rules);
        if($validator->fails()) {
            return $this->error($validator->errors(),200);
        }else{
            DB::beginTransaction();
                try {
                
                    $product= new Product();
                    $product->product_title = $request->product_title;
                    $product->meta_title =Str::slug( $request->product_title );
                    $product->url =Str::slug( $request->product_title );
                    $product->product_description = $request->product_description;
                    $product->meta_description = $request->meta_description;
                    $product->slug = Str::slug( $request->product_title ).'-'.rand(1,2000);
                    $product->sleeve= $request->sleeve;
                    $product->color= $request->color;

                    $product->buy_price = $request->buy_price;
                    $product->sell_price = $request->sell_price;
                    $product->offer = $request->offer;
                    $product->offer_price =($request->sell_price)-(($request->sell_price * $request->offer)/100);

                    $product->category_id = $request->catagory_id;
                    $product->supplier_id = 1;//$request->supplier_id;
                    $product->fabric_id = 1;//$request->fabric_id;
                    $product->status = $request->status;
                    $product->brand_id = $request->brand_id;
                    $product->save();

                    if(($request->images !=null) && (count($request->images)>0)){
                        $i = 0;
                        foreach($request->images as $image){
                                //$image= $request->file('image');
                            ini_set('memory_limit','256M');
                            $img= time().$i.'.'.$image->getClientOriginalExtension();
                            $thumbnailPath='img/product';
                            $image->move($thumbnailPath,$img);
                
                            $im= new Images;
                            $im->type= 'product';
                            $im->type_id=$product->id;
                            $im->name=$product->product_title;
                            $im->link=$img;
                            $im->status=0;
                            $im->Save();
                            $i++;
                        }
                    }

                    
                    // Session::flash('alert-danger', 'danger');
                    // Session::flash('alert-warning', 'warning');
                    DB::commit();
                    return $this->success($product);

                } catch (Exception $e) {
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
    public function syncTable()
    {
        //product-show
        $data= Product::all();
        return $data_table_render = DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('product_image', function($raw){
                $url= URL::to('/img/product/'.$raw->product_images->link);
                 $img='<img src='.$url.' border="0" width="40" class="img-rounded" align="center" />';
                 return $img;

            })
            ->addColumn('action',function ($row){
                return view('backend.pages.product.action',compact('row'));
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
        $product = Product::find($id);
        return response()->json($product);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productDelete = Product::find($id);
        if($productDelete){
            $productDelete->delete();
            return response()->json(["success"=>'data deleted',201]);
        }
        return response()->json(["error"=>'error',422]);
    }
    
    //quantity

    public function quantity_index()
    {
         //return view('backend.pages.category.create', compact('categories'));
         $products = Product::all();
         return view('backend.pages.product.quantity.create', compact('products'));
    }

    public function quantity_syncTable()
    {
        //product-show
        $data= ProductVariant::with('product')->get();
        return $data_table_render = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function ($row){
                return view('backend.pages.product.quantity.action',compact('row'));
        })
        ->rawColumns(['action'])
        ->make(true);

    }

    public function quantity_store(Request $request)
    {
         //return view('backend.pages.category.create', compact('categories'));
         $validator = Validator::make($request->all(), ProductVariant::$rules);
         if($validator->fails()) {
             return $this->error($validator->errors(),200);
         }else{
             DB::beginTransaction();
                 try {
         $quantity = New ProductVariant();
         $quantity->product_id = $request->product_id;
         $quantity->sku = $request->product_sku.'-'.$request->size;
         $quantity->size = $request->size;
         $quantity->quantity = $request->quantity;
         $quantity->status = $request->status;
         $quantity->save();
         DB::commit();
         return $this->success($quantity);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(),200);
        }
        }
    }
    public function quantity_edit($id)
    {
         //return view('backend.pages.category.create', compact('categories'));
         $product_variant = ProductVariant::with('product')->find($id);
         return $this->success($product_variant);
    }
    public function quantity_update(Request $request, $id)
    {
         //return view('backend.pages.category.create', compact('categories'));
         $validator = Validator::make($request->all(), ProductVariant::$rules);
         if($validator->fails()) {
             return $this->error($validator->errors(),200);
         }else{
             DB::beginTransaction();
                 try {
         $quantity = ProductVariant::find($id);
         $quantity->product_id = $request->product_id;
         $quantity->size = $request->size;
         $quantity->quantity = $request->quantity;
         $quantity->status = $request->status;
         $quantity->update();
         DB::commit();
         return $this->success($quantity);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(),200);
        }
    }
         
    }
    public function quantity_destroy($id)
    {
         //return view('backend.pages.category.create', compact('categories'));
         $quantity = ProductVariant::find($id);
         $quantity->delete();
         return $this->success($quantity);
    }
}
