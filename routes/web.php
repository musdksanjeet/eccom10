<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\ShopController;
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

Route::get('/',[AppController::class,'index'])->name('app.index');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/product/{slug}',[ShopController::class,'productDetails'])->name('shop.product.details');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//for User
Route::middleware('auth')->group(function(){
Route::get('/my-account',[UserController::class,'index'])->name('user.index');
});

//for Admin
Route::middleware('auth','auth.admin')->group(function(){
Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
});
