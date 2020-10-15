<?php

namespace App\Models;

use App\Models\Backend\Brand;
use App\Models\Backend\Category;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use Illuminate\Database\Eloquent\SoftDeletes;
class Section extends Model
{
    use SoftDeletes;
    protected $dates=[
        'creadted_at',
        'updated_at',
        'deleted_at'
    ];
    public function serializeDate(DateTimeInterface $date){
        return $date->format('Y-m-d H:i:s');
    }

    public static $rules = [

        'name'=>'required','string','max:100',

    ];

    public function products() {
        return $this->hasMany(Product::class);
    }
    public function catagories()
    {
        return $this->hasMany(Category::class);
    }
    public function brands()
    {
        return $this->hasMany(Brand::class,'section_id','id');
    }

}
