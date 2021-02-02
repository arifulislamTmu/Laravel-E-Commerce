<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\category;
use App\Http\Controllers\Controller;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function addproduct(){
       $brands= Brand::latest()->get();
       $categories = category::latest()->get();
        $products = Product::latest()->get();

        return view('admin.product.index',compact('products','brands','categories'));
    }

    public function addBrandpr(Request $request)
    {

      $request->validate([
          'product_name' => 'required|min:4',
          'category_id' => 'required',
          'brand_id' => 'required',
          'product_code' => 'required',
          'product_description' => 'required|min:4',
          'product_quantity' => 'required',
          'product_price' => 'required',
          'brand_image1' => 'required|mimes:jpg,jpeg,png',
          'brand_image2' => 'required|mimes:jpg,jpeg,png',
          'brand_image3' => 'required|mimes:jpg,jpeg,png',
      ]);

      $brand_image1 = $request->file('brand_image1');

      $name_gen =hexdec (uniqid());
      $img_ext = strtolower($brand_image1->getClientOriginalExtension());
      $img_name = $name_gen.'.'.$img_ext;
      $up_locataion='fontend/img/product/uploads/';
      $last_img = $up_locataion.$img_name;
      $brand_image1->move($up_locataion,$img_name);


      $brand_image2 = $request->file('brand_image2');

      $name_gen =hexdec (uniqid());
      $img_ext = strtolower($brand_image2->getClientOriginalExtension());
      $img_name = $name_gen.'.'.$img_ext;
      $up_locataion='fontend/img/product/uploads/';
      $last_img2 = $up_locataion.$img_name;
      $brand_image2->move($up_locataion,$img_name);

      $brand_image3 = $request->file('brand_image3');

      $name_gen =hexdec (uniqid());
      $img_ext = strtolower($brand_image3->getClientOriginalExtension());
      $img_name = $name_gen.'.'.$img_ext;
      $up_locataion='fontend/img/product/uploads/';
      $last_img3 = $up_locataion.$img_name;
      $brand_image3->move($up_locataion,$img_name);

      Product::insert([
         'product_name'=> $request->product_name,
         'category_id'=> $request->category_id,
         'brand_id'=> $request->brand_id,
         'product_code'=> $request->product_code,
         'product_description'=> $request->product_description,
         'product_quantity'=> $request->product_quantity,
         'product_price'=> $request->product_price,

         'brand_image1'=> $last_img,
         'brand_image2'=> $last_img2,
         'brand_image3'=> $last_img3,
         'created_at'=> Carbon::now()
      ]);

      return Redirect()-> back()->with('success','Product  Inserted');

    }
    public function menageProduct() {
        $products = Product::latest()->get();

        return view('admin.product.menageProduct',compact('products'));
    }
    public function EditProduct($product){

        $product_id = Product::find($product);

        $brands= Brand::latest()->get();
        $categories = category::latest()->get();
        return view('admin.product.edit_product',compact('product_id','categories','brands'));
    }

    public function UpdateProduct(Request $request) {
        $pro_id = $request->id;
        Product::find($pro_id)->update([
            'product_name'=> $request->product_name,
            'category_id'=> $request->category_id,
            'brand_id'=> $request->brand_id,
            'product_code'=> $request->product_code,
            'product_description'=> $request->product_description,
            'product_quantity'=> $request->product_quantity,
            'product_price'=> $request->product_price,
            'updated_at'=> Carbon::now()
         ]);
         return Redirect()-> route('menage.product')->with('success','Product  Inserted');
    }

    public function UpdateImage(Request $request) {
        $pro_id = $request->id;
        $old_one = $request->img1;
        $old_two = $request->img2;
        $old_three = $request->img3;

        if($request->has('brand_image1')){

            unlink($old_one);

            $brand_image1 = $request->file('brand_image1');

            $name_gen =hexdec (uniqid());
            $img_ext = strtolower($brand_image1->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_locataion='fontend/img/product/uploads/';
            $last_img = $up_locataion.$img_name;
            $brand_image1->move($up_locataion,$img_name);

            Product::find($pro_id)->update([
            'brand_image1'=> $last_img,
            'updated_at'=> Carbon::now()
         ]);

        }

        if($request->has('brand_image2')){

            unlink($old_two);
              $brand_image2 = $request->file('brand_image2');

                $name_gen =hexdec (uniqid());
                $img_ext = strtolower($brand_image2->getClientOriginalExtension());
                $img_name = $name_gen.'.'.$img_ext;
                $up_locataion='fontend/img/product/uploads/';
                $last_img2 = $up_locataion.$img_name;
                $brand_image2->move($up_locataion,$img_name);

                Product::find($pro_id)->update([
                    'brand_image1'=> $last_img2,
                    'updated_at'=> Carbon::now()
                 ]);


        }
        if($request->has('brand_image3')){

            unlink($old_three);

            $brand_image3 = $request->file('brand_image3');

            $name_gen =hexdec (uniqid());
            $img_ext = strtolower($brand_image3->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_locataion='fontend/img/product/uploads/';
            $last_img3 = $up_locataion.$img_name;
            $brand_image3->move($up_locataion,$img_name);

            Product::find($pro_id)->update([
                'brand_image1'=> $last_img3,
                'updated_at'=> Carbon::now()
             ]);

        }
        return Redirect()-> route('menage.product')->with('success','Product  Inserted');

 }
 public function ProductDelete($prod_id){
     $img = Product::find($prod_id);

     $img_one = $img->brand_image1;
     $img_two = $img->brand_image2;
     $img_three = $img->brand_image3;

     unlink($img_one);
     unlink($img_two);
     unlink($img_three);

    Product::find($prod_id)->delete();
    return Redirect()-> route('menage.product')->with('success','Product Deleted Successfull.');

 }
 public function ProductActive($product_id){

    Product::find($product_id)->update(['starus'=> 0]);

    return Redirect()-> route('menage.product')->with('success','Product Deleted Successfull.');
 }

 public function ProductDctive($product_id){

    Product::find($product_id)->update(['starus'=> 1]);

    return Redirect()-> route('menage.product')->with('success','Product Deleted Successfull.');
 }
}
