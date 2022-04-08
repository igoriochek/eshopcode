<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
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

Route::group(array('prefix' => 'user','middleware' => 'auth' ), function (){
    Route::get('/', function () {
        return redirect()->route('userhomepage');
    });
    Route::get("homepage", [App\Http\Controllers\HomeController::class, 'userhomepage'])->name('userhomepage');
    Route::get("rootcategories", [CategoryController::class, 'userRootCategories'])->name('rootcategories');
    Route::get("innercategories/{category_id}", [CategoryController::class, 'userInnerCategories'])->name('innercategories');
    Route::get("viewcategory", [CategoryController::class, 'userViewCategory'])->name('viewcategory');
    Route::get("viewproduct/{id}", [ProductController::class, 'userViewProduct'])->where('id', '[0-9]+')->name('viewproduct');
    Route::post('addtocart', [CartController::class, 'addToCart'])->name('addtocart');
    Route::get('viewCarts', [\App\Models\Cart::class, 'viewAllCarts'])->name('viewallcarts');
    Route::get('viewcart', [CartController::class, 'viewCart'])->name('viewcart');
    Route::get('products', [ProductController::class, 'userProductIndex'])->name('userproducts');
//    Route::get('viewOrders', [\App\Models\Order::class, 'viewAllOrders'])->name('viewallorders');
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









