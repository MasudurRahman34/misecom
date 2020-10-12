<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Backend\Category;
class Sections extends Model
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

    public function categories()
    {
        return $this->hasMany(Category::class,);
    }
    public function products() {
        return $this->hasMany(Product::class);
    }
}
