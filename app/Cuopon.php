<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuopon extends Model
{
    protected $fillable = [
        'coupon_name','discount', 'status',
    ];
}
