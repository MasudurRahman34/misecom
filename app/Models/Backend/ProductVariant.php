<?php

namespace App\Models\Backend;
use App\Models\Backend\Product;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
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
    public static $rules = [

        'size'=>'required','string','max:255',

        ];
    public function product()
        {
          return $this->belongsTo(Product::class);
        }

}
