<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\Wishlist;
use Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.wishlist.index');
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
            
    $this->validate($request, 
        [
            'product_id' => 'required'
        ],
        [
            'product_id.required' => 'Please give a product'
        ]);
  
      if (Auth::check()) {
        $wishlist = Wishlist::where('user_id', Auth::id())
        ->where('product_id', $request->product_id)
        ->first();
      }else {
        $wishlist = Wishlist::where('ip_address', request()->ip())
        ->where('product_id', $request->product_id)
        ->first();
      }

      //reduce duplicate entry by add to wishlist
      if (!is_null($wishlist)) {
        $wishlist->save();
      }else {

        $wishlist = new Wishlist();

        if (Auth::check()) {
          $wishlist->user_id = Auth::id();
        }
        
        $wishlist->ip_address = request()->ip();
        $wishlist->product_id = $request->product_id;
        $wishlist->save();
      }
      $wishlisttotal= Wishlist::totalWishlist();
      return redirect()->back()
            ->with('success',"Item added to wishlist",'wishlisttotal', $wishlisttotal);


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
        //
        $wishlist = Wishlist::find($id);
        if (!is_null($wishlist)) {
          $wishlist->delete();
        }else {
          return redirect()->route('wishlist');
        }
        session()->flash('success', 'item has deleted !!');
        return back();
    }
}
