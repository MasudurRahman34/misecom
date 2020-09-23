<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public static $rules =[

      'product_title'=>'required','string',
      // 'description'=>'required',
      // 'stockAmount'=>'required',
      // 'Price'=>'required',
      // 'offerPrice'=>'required',
      
      // 'image'  => 'nullable|image',

      'product_title.required'  => 'Please provide a brand name',
      // 'description.required'  => 'Please provide a description',
      // 'Price.required'  => 'Please provide a description',
      // 'offerPrice.required'  => 'Please provide a description',
      // 'image.image'  => 'Please provide a valid image with .jpg, .png, .gif, .jpeg exrension..',
    

  ];

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
