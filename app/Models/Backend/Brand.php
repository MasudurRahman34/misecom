<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Brand extends Model
{
    protected $dates=[
        'creadted_at',
        'updated_at',
        'deleted_at'
    ];
    public function serializeDate(DateTimeInterface $date){
      return $date->format('Y-m-d H:i:s');
  }
    //
    public function products()
    {
        return $this->hasMany(Category::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }


    public static $rules =[

        'brand_name'=>'required','string','max:255',
        'description'=>'nullable',
        'image'  => 'nullable|image',

        'name.required'  => 'Please provide a brand name',
        'image.image'  => 'Please provide a valid image with .jpg, .png, .gif, .jpeg exrension..',
      

    ];
        
};