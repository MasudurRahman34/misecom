<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Product extends Model
{
    //
    protected $dates=[
      'creadted_at',
      'updated_at',
      'deleted_at'
  ];
  public function serializeDate(DateTimeInterface $date){
    return $date->format('Y-m-d H:i:s');
}
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
