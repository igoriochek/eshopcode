<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('categories', App\Http\Controllers\API\CategoryAPIController::class);


Route::resource('discounts', App\Http\Controllers\API\DiscountAPIController::class);


Route::resource('discount_coupons', App\Http\Controllers\API\DiscountCouponAPIController::class);


Route::resource('promotions', App\Http\Controllers\API\PromotionAPIController::class);


Route::resource('products', App\Http\Controllers\API\ProductAPIController::class);
