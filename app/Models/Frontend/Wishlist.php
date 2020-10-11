<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\product;
use App\Models\Frontend\Wishlist;
use App\User;
use Auth;

class Wishlist extends Model
{
    //

    

      public $fillable = [
        'user_id',
        'ip_address',
        'product_id',
      ];


      //relation-ship
      public function product()
      {
        return $this->belongsTo(Product::class);
      }
    
      public function user()
      {
        return $this->belongsTo(User::class);
      }
    
    //   public function order()
    //   {
    //     return $this->belongsTo(Order::class);
    //   }
    
    public static function Wishlists()
    {
        if (Auth::check()) {
        $wishlist = Wishlist::where('user_id', Auth::id())
        ->orWhere('ip_address', request()->ip())
        //->where('order_id', NULL)
        ->get();
        }else {
        $wishlist = Wishlist::where('ip_address', request()->ip())->get();
        }
        return $wishlist;
    }    

    public static function totalWishlist()
    {
        if (Auth::check()) {
        $wishlist = Wishlist::where('user_id', Auth::id())
        ->orWhere('ip_address', request()->ip())
        //->where('order_id', NULL)
        ->count();
        }else {
        $wishlist = Wishlist::where('ip_address', request()->ip())->count();
        }
        return $wishlist;
    }
}
