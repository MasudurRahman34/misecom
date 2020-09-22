<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //

    public function categories() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
      return $this->belongsTo(Brand::class);
    }

    public function images()
    {
      return $this->hasMany(ProductImage::class);
    }
}
