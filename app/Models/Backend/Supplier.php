<?php

namespace App\Models\Backend;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\IdIncreamentable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
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
        'official_name'=>'required', 'string', 'max:255',
        'official_address'=>'string',
    ];
}
