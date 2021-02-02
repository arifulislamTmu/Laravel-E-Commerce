<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Cart;
use App\Cuopon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
   public function index(Request $request,$product_id){

    $cahck = Cart::where('product_id',$product_id)->where('user_ip',$request->ip())->first();
    if($cahck){
        Cart::where('product_id',$product_id)->where('user_ip',$request->ip())->increment('qty');

        return redirect()->back()->with('success','Add To Cart Successfull');

    }else{
        Cart::insert([
            'product_id'=>$product_id,
            'price'=>$request->price,
            'qty'=>1,
            'user_ip'=>$request->ip(),
         ]);

         return redirect()->back()->with('success','Add To Cart Successfull');
    }
   }
   public function cart_product(){

    $carts = Cart::where('user_ip',request()->ip())->latest()->get();
    $subtotal = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
        return $t->price * $t->qty;
    });
    return view('pages.cart',compact('carts','subtotal'));

   }
   public function remove_product($product_id){

    Cart::where('user_ip',request()->ip())->where('id',$product_id)->delete();

    return redirect()->back()->with('remove','Cart product removed !!');

   }
   public function updateCart(Request $request,$product_id)   {


    Cart::where('user_ip',request()->ip())->where('id',$product_id)->update([
         'qty'=>$request->qty,
         'updated_at'=>Carbon::now(),
        ]);

    return redirect()->back()->with('successs','Cart product Updated !!');
   }


   public function couponchack(Request $request) {

    $chack = Cuopon::where('coupon_name',$request->coupon_name)->first();
     if( $chack ){

        Session::put('coupon',[
            'coupon_name'=>$chack->coupon_name,
            'discount'=>$chack->discount,
        ]);

        return redirect()->back()->with('successs','Coupon applyed success');

     }else{
        return redirect()->back()->with('remove','Please chack and try again');
     }

   }
   public function couponDesatroy()
   {
      if(Session::has('coupon')){

        session()->forget('coupon');
        return redirect()->back()->with('remove','Coupon removed');
      }
   }
}
