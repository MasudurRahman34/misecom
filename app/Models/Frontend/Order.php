<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    public function carts() {
        return $this->hasMany(Cart::class);
    }
}
