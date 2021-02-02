<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $brands = Brand::latest()->get();
        return view('admin.brand.index',compact('brands'));
    }

    public function brandStore(Request $request){
        $request-> validate ([
            'brand_name'=> 'required|unique:brands,brand_name'
        ]);
        Brand::insert([
           'brand_name' =>$request->brand_name,
           'created_at' =>Carbon::now()
        ]);
        return redirect()->back()->with('success','Brand  added');

    }

    public function Brandedit($brand_id){
        $brand = Brand::find($brand_id);
        return view('admin.brand.edit_brand',compact('brand'));
     }
     public function Brandupdate(Request $request){

        $brnd_id = $request->hedden_id;
        Brand::find($brnd_id)->update([
            'brand_name' =>$request->brand_name,
            'updated_at' =>Carbon::now()
         ]);
         return redirect()->route('brand.admin')->with('success','Brand  added');

     }

     public function BrandDelete($id){
        Brand::find($id)->delete();
        return redirect()->route('brand.admin')->with('success','Brand  Deleted');

     }
}
