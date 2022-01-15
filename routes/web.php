<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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
Route::group(['middlware'=>'admin_auth'],function(){
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('admin/category',[CategoryController::class,'index']);
    Route::get('admin/manage_category',[CategoryController::class,'managecategory']);


});
