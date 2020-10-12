<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    //
    protected $dates=[
        'creadted_at',
        'updated_at',
        'deleted_at'
    ];
    public function serializeDate(DateTimeInterface $date){
        return $date->format('Y-m-d H:i:s');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }

    public function subCategory()
    {
        return $this->hasMany(Category::class,'category_id');
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function subproducts()
    {
        return $this->hasManyThrough(Product::class, self::class, 'category_id', 'category_id');
    }

    public static $rules = [

        'name'=>'required','string','max:255',

    ];
    public function sections()
    {
      return $this->belongsTo(Setions::class);
    }

}
