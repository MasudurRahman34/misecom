<?php

namespace App\Models\Backend;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use App\Traits\IdIncreamentable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Section;
use App\Models\Backend\Brand;
use App\Models\Backend\Supplier;
use App\Models\Backend\Category;
use App\Models\Backend\Fabrics;
use App\Models\Backend\Images;
use App\Models\Backend\ProductVariant;


class Product extends Model
{
  use SoftDeletes, IdIncreamentable;
    //
    protected $dates=[
      'creadted_at',
      'updated_at',
      'deleted_at'
  ];
  public function serializeDate(DateTimeInterface $date){
    return $date->format('Y-m-d H:i:s');
}

  public function IdIncreamentable(){
    return [
        'source'=>'id',
        'prefix'=>'pro-',
        'attribute'=>'sku',
    ];
  }
  public static $rules = [

    'product_title'=>'required','string','max:255',

  ];

    public function categories() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
      return $this->belongsTo(Brand::class);
    }
    public function suppliers()
    {
      return $this->belongsTo(Supplier::class);
    }
    public function fabrics()
    {
      return $this->belongsTo(Fabrics::class);
    }
    public function product_images()
    {
      return $this->hasMany(Images::class,'type_id','id');
    }

    public function section()
    {
      return $this->belongsTo(Section::class);
    }
    public function product_variant()
    {
      return $this->hasMany(ProductVariant::class,'product_id','id');
    }


}
