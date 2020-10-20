<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Models\Frontend\Cart;

class Order extends Model
{
    //

    public function cart() {
        return $this->hasMany(Cart::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
