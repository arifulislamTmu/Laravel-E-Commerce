<?php

namespace App\Http\Controllers;

use App\category;
use App\Product;
use Illuminate\Http\Request;

class FontendController extends Controller
{
 public function index(){
     $products = Product::where('starus',1)->get();
     $categories = category::where('ststus',1)->get();
    return view('pages.index',compact('products','categories'));
 }

 public function product_details($product_id) {
    $products = Product::find($product_id);
    $category_id =  $products->category_id;
    $rltd_id = Product::where('category_id', $category_id)->where('id','!=',$product_id)->latest()->get();
    return view('pages.product_details',compact('products','rltd_id'));
 }
}
