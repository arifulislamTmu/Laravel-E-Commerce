<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name','category_id','brand_id','product_code','product_description','product_quantity','product_price','brand_image1','brand_image2','brand_image3','starus',
    ];
    public function categoey(){
        return $this->belongsTo(category::class,'category_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
}


