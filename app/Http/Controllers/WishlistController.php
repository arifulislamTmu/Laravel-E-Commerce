<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function add_wishlist($product_id){

        if(Auth::check()){
            Wishlist::insert([
                'user_id'=> Auth::id(),
                'product_id'=> $product_id,

             ]);
             return redirect()->back()->with('successs','Add on Wishlist');
        }else{

            return redirect()->route('login')->with('successs','Please login ');
        }
  }

public function wishlist_page(){

    $wishlist = Wishlist::where('user_id',Auth::id())->latest()->get();
return view('pages.wishlist',compact('wishlist'));

}
public function remove_product($product_id){

    Wishlist::where('user_id',Auth::id())->where('id',$product_id)->delete();

    return redirect()->back()->with('remove','Wishlist product removed !!');

   }
}
