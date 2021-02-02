<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderItem;
use App\Shipping;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrederController extends Controller
{

    public function copleteOrder() {
        return view('pages.completePage');
      }
  public function storeOrder(Request $request){
     $order_id = Order::insertGetId([
        'user_id'=> Auth::id(),
        'invoice_no'=> mt_rand(10000,99999),
        'payment_type' => $request->payment_type,
        'total' => $request->total,
        'sub_total' => $request->sub_total,
        'coupon_discount' => $request->discount,
         'created_at' =>Carbon::now()
        ]);

    $carts = Cart::where('user_ip',request()->ip())->get();
    foreach($carts as $cart ){
      OrderItem::insert([
         'order_id'=>$order_id,
          'product_id'=>$cart->product_id,
          'product_qty'=>$cart->qty,
          'created_at' =>Carbon::now()
      ]);
    }

    Shipping::insert([

      'order_id'=>$order_id,
      'shipping_first_name'=>$request->shipping_first_name,
      'shipping_last_name'=>$request->shipping_last_name,
      'shipping_email'=>$request->shipping_email,
      'shipping_phone'=>$request->shipping_phone,
      'address'=>$request->address,
      'state'=>$request->state,
      'post_code'=>$request->post_code,
      'created_at' =>Carbon::now()

    ]);

    if(Session::has('coupon')){
    session()->forget('coupon');
    }
    Cart::where('user_ip',request()->ip())->delete();
    return redirect()->to('complate/page')->with('order','Your Order completed');
  }

}
