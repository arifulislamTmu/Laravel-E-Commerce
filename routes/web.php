<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','FontendController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@Login');

Route::get('admin_log','AdminController@Logout');


//=================category=======================
Route::get('admin/categories','Admin\CategoryController@index')->name('category.admin');
Route::POST('Store/categories','Admin\CategoryController@categoryStore')->name('store.category');
Route::get('admin/categories/{cat_id}','Admin\CategoryController@Categoryedit');
Route::POST('update/categories','Admin\CategoryController@Categoryupdate')->name('update.category');
Route::get('delete/category/{cat_id}','Admin\CategoryController@DeleteCate');

//=================Brand=======================
Route::get('admin/brand','Admin\BrandController@index')->name('brand.admin');
Route::POST('Store/brand','Admin\BrandController@brandStore')->name('store.brand');
Route::get('admin/brand/{brand_id}','Admin\BrandController@Brandedit');
Route::POST('update/brands','Admin\BrandController@Brandupdate')->name('update.brand');
Route::get('Delete/brand/{brand_id}','Admin\BrandController@BrandDelete');

//=================Products=======================
Route::get('admin/product/add','Admin\ProductController@addproduct')->name('add.product');
Route::POST('Store/product','Admin\ProductController@addBrandpr')->name('store.product');
Route::get('Menage/product','Admin\ProductController@menageProduct')->name('menage.product');
Route::get('admin/product/edit/{product_id}','Admin\ProductController@EditProduct');
Route::POST('Update/product','Admin\ProductController@UpdateProduct')->name('update.product');
Route::POST('Update/Image','Admin\ProductController@UpdateImage')->name('store.image');
Route::get('Active/product/{prod_id}','Admin\ProductController@ProductActive');
Route::get('Dective/product/{prod_id}','Admin\ProductController@ProductDctive');

//=================Copone=======================
Route::get('admin/Coupon/add','Admin\CouponController@addcuopon')->name('add.coupon');
Route::POST('Store/Coupon','Admin\CouponController@addcuoponid')->name('store.Coupon');
Route::get('admin/coupon/{coupon_id}','Admin\CouponController@editCoupon');
Route::POST('Update/Coupon','Admin\CouponController@Updatecuopon')->name('coupon.update');

Route::get('Delete/coupon/{copon_ide}','Admin\CouponController@deleteCopon');
Route::get('admin/Dective/{cupon_id}','Admin\CouponController@activeCopon');
Route::get('admin/Active/{cupon_id}','Admin\CouponController@dectiveCopon');

//=================Order details =======================
Route::get('admin/Order/Itame','Admin\CouponController@orderItamle')->name('order.itame');
Route::get('view/product/{order_id}','Admin\CouponController@viewOrder');

//=================Frontend Route=======================
Route::POST('Cart/Product/{Product_id}', 'CartController@index');
Route::get('Cart/page', 'CartController@cart_product');
Route::get('cart/product/delete/{product_id}', 'CartController@remove_product');
Route::post('Cart/update/{product_id}', 'CartController@updateCart');
Route::post('Coupon/Code/', 'CartController@couponchack');
Route::get('Delete/coupon', 'CartController@couponDesatroy');

// ================================wishlist==========================
Route::get('wishlist/add/{product_id}', 'WishlistController@add_wishlist');
Route::get('wishlist/pages', 'WishlistController@wishlist_page');
Route::get('wishlist/product/delete/{product_id}', 'WishlistController@remove_product');

// ================================product details==========================

Route::get('Product/details/{product_id}', 'FontendController@product_details');

// ================================CheckOut details==========================

Route::get('Chekout/Order', 'CheckoutController@Index');
Route::post('Place/Order', 'OrederController@storeOrder')->name('place.order');
Route::get('complate/page', 'OrederController@copleteOrder');


// ================================profile OrderDetails details==========================

Route::get('My/Order', 'OrderDetailsController@showorder')->name('order.details');
Route::get('order/view/{order_id}', 'OrderDetailsController@orderView');

// ================================nav bar shop page details==========================
Route::get('Shop/Page', 'shopController@index')->name('shop.page');
Route::get('Category/Product/{cate_id}', 'shopController@category_pro');
