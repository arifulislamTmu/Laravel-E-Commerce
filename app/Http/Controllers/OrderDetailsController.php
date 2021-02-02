<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderDetailsController extends Controller
{
   public function showorder()
   {
       $orders = Order::where('user_id',Auth::id())->latest()->get();
       return view('pages.orderuser.index',compact('orders'));
   }
   public function orderView($order_id){

    $orders = Order::find($order_id);
    $orderItem = OrderItem::with('product')->where('order_id',$order_id)->get();
    $shipping = Shipping::where('order_id',$order_id)->first();

     return view('pages.orderuser.vieworder',compact('orders','orderItem','shipping'));

   }
}
