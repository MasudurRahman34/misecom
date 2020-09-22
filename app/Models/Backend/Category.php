<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
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

}
