<?php

namespace App\Http\Controllers\Admin;

use App\Cuopon;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use App\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function addcuopon(){
    $coupons = Cuopon::latest()->get();
    return view('admin.coupon.index',compact('coupons'));
  }
  public function addcuoponid(Request $request) {
    $request-> validate ([
        'coupon_name'=> 'required|unique:cuopons,coupon_name'
    ]);

    Cuopon::insert([
        'coupon_name'=>strtoupper($request->coupon_name) ,
        'discount'=>$request->discount,
         'created_at'=>Carbon::now()
    ]);

    return redirect()->route('add.coupon')->with('success','Coupon Inserted');
  }
  public function editCoupon($coupon_id) {

    $coupons_id = Cuopon::find($coupon_id);

    return view('admin.coupon.edit',compact('coupons_id'));

  }
  public function Updatecuopon(Request $request) {

    $cuop_id = $request->hedden_id;

     Cuopon::find($cuop_id)->update([
        'coupon_name'=>strtoupper($request->coupon_name),
        'discount'=>$request->discount,
        'updated_at'=> Carbon::now()
     ]);
     return redirect()->route('add.coupon')->with('success','Coupon Updated');
  }

  public function deleteCopon($copon_ide){

    Cuopon::find($copon_ide)->delete();

    return redirect()->route('add.coupon')->with('success','Coupon Active ');
  }
  public function activeCopon($copon_ide){

    Cuopon::find($copon_ide)->update(['status'=>0]);
    return redirect()->route('add.coupon')->with('success','Coupon Active ');
  }
  public function dectiveCopon($copon_ide){
    Cuopon::find($copon_ide)->update(['status'=>1]);
    return redirect()->route('add.coupon')->with('success','Coupon Dective ');
  }

  public function orderItamle(){
     $oreders = Order::latest()->get();
    return view('admin.order.index',compact('oreders'));
  }
  public function viewOrder($order_id){
    $orders = Order::find($order_id);
    $orderItem = OrderItem::where('order_id',$order_id)->get();
    $shipping = Shipping::where('order_id',$order_id)->first();

    return view('admin.order.viewpage',compact('orders','orderItem','shipping'));
  }
}
