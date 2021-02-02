<?php

namespace App\Http\Controllers\Admin;

use App\category;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
   public function index()
   {
      $categories = category::latest()->get();
    return view('admin.category.index', compact('categories'));
   }

//    store category=======================
   public function categoryStore(Request $request) {
     $request-> validate ([
         'category_name'=> 'required|unique:categories,category_name'
     ]);
     category::insert([
        'category_name' =>$request->category_name,
        'created_at' =>Carbon::now()
     ]);
     return redirect()->back()->with('success','Category added');
   }
   public function Categoryedit($cat_id){
      $category_id= category::find($cat_id);
      return view('admin.category.edit_cate',compact('category_id'));
   }

//   update category=======================
public function Categoryupdate(Request $request) {

    $cate_id = $request->hedden_id;

    category::find($cate_id)->update([
       'category_name' =>$request->category_name,
       'updated_at' =>Carbon::now()
    ]);
    return redirect()->route('category.admin')->with('success','Category updated');
  }
  public function DeleteCate($id){
   category::find($id)->delete();
   return redirect()->route('category.admin')->with('success','Category deleted');
  }

}
