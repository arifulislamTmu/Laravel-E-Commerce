<?php

namespace App\Http\Controllers;

use App\category;
use App\Product;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function index(){

         $categorys = category::where('ststus',1)->latest()->get();
         $products = Product::latest()->get();
         $products_pagi = Product::latest()->paginate(3);
        return view('pages.shop.shopPage',compact('categorys','products','products_pagi'));
    }
    public function category_pro($cate_id){
        $categorys = category::where('ststus',1)->latest()->get();
        $products_pagi = Product::where('category_id',$cate_id)->latest()->paginate(3);
        return view('pages.showcategory',compact('categorys','products_pagi'));
    }
}
