<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id', 'qty','user_ip','price',
    ];

    public function product(){

        return $this->belongsTo(Product::class,'product_id');

    }
}
