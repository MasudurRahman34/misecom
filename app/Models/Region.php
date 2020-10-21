<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Region extends Model
{
    //

    public static $rules =[

        'region_name'=>'required','string','max:255',
        'shipping_cost'=>'required',
        
    ];
}
