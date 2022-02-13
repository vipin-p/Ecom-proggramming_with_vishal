<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('admin_section.login');
});

// route to show the login page 
Route::get('admin',[AdminController::class,'index']);
// route to take the datas from login page to verify admin
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');
// middleware to protect the unauthenticated entry to dashboard [create middleware update
// inside kernal put condition in middleware and put the routes inside middleware]
Route::group(['middlware'=>'admin_auth'],function(){
    // route to show dashboard view to the user
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    // route to show categories view to the user
    Route::get('admin/category',[CategoryController::class,'index']);
    // route to show manage category form view 
    Route::get('admin/category/manage_category',[CategoryController::class,'managecategory']);
    // route to update the category table here we are using same form for inserting and updating categor
    Route::get('admin/category/manage_category/{id}',[CategoryController::class,'managecategory']);
    // post route to take form values from manage category proces
    Route::post('admin/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.manage_category_process');
    // route for deleting category
    Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);

    Route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status']);


    // Routes for coupon crud
    Route::get('admin/Coupon',[CouponController::class,'index']);
    Route::get('admin/Coupon/manage_coupon',[CouponController::class,'managecoupon']);
    Route::get('admin/Coupon/manage_coupon/{id}',[CouponController::class,'managecoupon']);
    Route::post('admin/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('coupon.manage_coupon_process');
    Route::get('admin/coupon/delete/{id}',[CouponController::class,'delete']);

    // Routes for size crud

    Route::get('admin/size',[SizeController::class,'index']);
    Route::get('admin/size/manage_size',[SizeController::class,'managesize']);
    Route::get('admin/size/manage_size/{id}',[SizeController::class,'managesize']);
    Route::post('admin/manage_size_process',[SizeController::class,'manage_size_process'])->name('size.manage_size_process');
    Route::get('admin/size/delete/{id}',[SizeController::class,'delete']);

    Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status']);


    // Routes for color crud

    Route::get('admin/color',[ColorController::class,'index']);
    Route::get('admin/color/manage_color',[ColorController::class,'managecolor']);
    Route::get('admin/color/manage_color/{id}',[ColorController::class,'managecolor']);
    Route::post('admin/manage_color_process',[ColorController::class,'manage_color_process'])->name('color.manage_color_process');
    Route::get('admin/color/delete/{id}',[ColorController::class,'delete']);

    Route::get('admin/color/status/{status}/{id}',[ColorController::class,'status']);






    Route::get('admin/logout',function(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        return redirect('/');
    });

});
