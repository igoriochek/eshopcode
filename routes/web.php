<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;

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
    return view('welcome');
});

Route::group(array('prefix' => 'admin','middleware' => 'admin'), function() {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('discounts', App\Http\Controllers\DiscountController::class);
    Route::resource('discountCoupons', App\Http\Controllers\DiscountCouponController::class);
    Route::resource('promotions', App\Http\Controllers\PromotionController::class);
    Route::resource('customers', App\Http\Controllers\CustomerController::class);
    Route::resource('orderStatuses', App\Http\Controllers\OrderStatusController::class);
    Route::resource('cartStatuses', App\Http\Controllers\CartStatusController::class);
    Route::resource('returnStatuses', App\Http\Controllers\ReturnStatusController::class);
    Route::resource('carts', App\Http\Controllers\CartController::class);
    Route::resource('cartItems', App\Http\Controllers\CartItemController::class);

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('lang/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
//    return redirect()->back();
    return redirect()->route('home');
});


//Route::resource('categories', App\Http\Controllers\CategoryController::class);









