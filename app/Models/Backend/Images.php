<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //

    public function product()
    {
      return $this->belongsTo(product::class,'type_id');
    }

}
