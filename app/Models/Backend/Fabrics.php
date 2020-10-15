<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;

class Fabrics extends Model
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
}
