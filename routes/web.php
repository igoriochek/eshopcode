<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\ReturnsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FaceBookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\OrdersReportController;
use App\Http\Controllers\ReturnsReportController;
use App\Http\Controllers\ChartController;
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
    Route::resource('orders', App\Http\Controllers\OrderController::class);
    Route::resource('orderItems', App\Http\Controllers\OrderItemController::class);
    Route::resource('orderStatuses', App\Http\Controllers\OrderStatusController::class);
    Route::resource('cartStatuses', App\Http\Controllers\CartStatusController::class);
    Route::resource('returns', App\Http\Controllers\ReturnsController::class);
    Route::resource('returnItems', App\Http\Controllers\ReturnItemController::class);
    Route::resource('returnStatuses', App\Http\Controllers\ReturnStatusController::class);
    Route::resource('carts', App\Http\Controllers\CartController::class);
    Route::resource('cartItems', App\Http\Controllers\CartItemController::class);
    Route::resource('messenger', MessengerController::class)->except('edit', 'update', 'delete');
    // Statistics
    Route::get("statistics", [ChartController::class, 'index'])->name('customers.statistics');
    Route::post("statistics", [ChartController::class, 'changeStatisticType'])->name('customers.statistics');
    // Logs
    Route::get('logs', [CustomerController::class, 'logs'])->name('customers.logs');

    Route::prefix('orders_report')->name('orders_report.')->group( function () {
        Route::get('', [OrdersReportController::class, 'index'])->name('index');
        Route::get('email', [OrdersReportController::class, 'sendEmail'])->name('email');
        Route::get('download_pdf', [OrdersReportController::class, 'downloadPdf'])->name('download_pdf');
        Route::get('download_csv', [OrdersReportController::class, 'downloadCsv'])->name('download_csv');
    });
    Route::prefix('returns_report')->name('returns_report.')->group( function () {
        Route::get('', [ReturnsReportController::class, 'index'])->name('index');
        Route::get('email', [ReturnsReportController::class, 'sendEmail'])->name('email');
        Route::get('download_pdf', [ReturnsReportController::class, 'downloadPdf'])->name('download_pdf');
        Route::get('download_csv', [ReturnsReportController::class, 'downloadCsv'])->name('download_csv');
    });
});

Route::group(array('prefix' => 'user', 'middleware' => 'auth'), function (){
    Route::get('/', function () {
        return redirect()->route('userhomepage');
    });
    Route::get("homepage", [App\Http\Controllers\HomeController::class, 'userhomepage'])->name('userhomepage');
    Route::get("rootcategories", [CategoryController::class, 'userRootCategories'])->name('rootcategories');
    Route::get("innercategories/{category_id}", [CategoryController::class, 'userInnerCategories'])->name('innercategories');
    Route::get("categorytree", [CategoryController::class, 'userCategoryTree'])->name('categorytree');
    Route::get("viewcategory", [CategoryController::class, 'userViewCategory'])->name('viewcategory');
    Route::get("viewproduct/{id}", [ProductController::class, 'userViewProduct'])->where('id', '[0-9]+')->name('viewproduct');
    Route::post('addtocart', [CartController::class, 'addToCart'])->name('addtocart');
    //Route::get('viewCarts', [\App\Models\Cart::class, 'viewAllCarts'])->name('viewallcarts');
    Route::get('viewcart', [CartController::class, 'viewCart'])->name('viewcart');
    Route::delete('cartItems/destroy/{id}', [\App\Http\Controllers\CartItemController::class, 'userCartItemDestroy'])->where('id', '[0-9]+')->name('userCartItemDestroy');
    Route::get('products', [ProductController::class, 'userProductIndex'])->name('userproducts');
//    Route::get('viewOrders', [\App\Models\Order::class, 'viewAllOrders'])->name('viewallorders');
    Route::get('checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('checkout/preview', [OrderController::class, 'checkoutPreview'])->name('checkout-preview');
    Route::post('pay', [PayController::class, 'index'])->name('pay');
    Route::get('pay/accept/{id}', [PayController::class, 'accept'])->where('id', '[0-9]+')->name('pay-accept');
    Route::get('pay/cancel/{id}', [PayController::class, 'cancel'])->where('id', '[0-9]+')->name('pay-cancel');
    Route::get('pay/callback/{id}', [PayController::class, 'callback'])->where('id', '[0-9]+')->name('pay-callback');

    Route::get('rootorders', [OrderController::class, 'indexOrders'])->name('rootorders');
    Route::get('rootoreturns', [ReturnsController::class, 'indexReturns'])->name('rootoreturns');
    Route::get('vieworder/{id}', [OrderController::class, 'viewOrder'])->where('id', '[0-9]+')->name('vieworder');
    Route::get('viewreturn/{id}', [ReturnsController::class, 'viewReturn'])->where('id', '[0-9]+')->name('viewreturn');
    Route::get('returnorder/{id}', [\App\Http\Controllers\ReturnsController::class, 'returnOrder'])->where('id', '[0-9]+')->name('returnorder');
    Route::post('returnorder/{id}/save', [\App\Http\Controllers\ReturnsController::class, 'saveReturnOrder'])->where('id', '[0-9]+')->name('savereturnorder');
    Route::get('promotions', [\App\Http\Controllers\PromotionController::class, 'indexPromotions'])->name('promotions');
    Route::get('promotion/{id}', [\App\Http\Controllers\PromotionController::class, 'promotionProducts'])->name('promotion');
    Route::get('discountCoupons', [\App\Http\Controllers\DiscountCouponController::class, 'discountcouponUser'])->name('discountCoupons');

    Route::post('addUserRating', [\App\Http\Controllers\RatingsController::class, 'addUserRating'])->name('addUserRating');

    Route::prefix('messenger')->name('messenger.')->group( function () {
        Route::get('', [MessengerController::class, 'index']);
        Route::get('create', [MessengerController::class, 'create'])->name('create');
        Route::get('{id}', [MessengerController::class, 'show'])->where('id', '[0-9]+')->name('show');
        Route::post('', [MessengerController::class, 'store'])->where('id', '[0-9]+')->name('store');
    });

    Route::get('userprofile', [\App\Http\Controllers\UserController::class, 'show'])->name('userprofile');
    Route::patch('userprofilesave', [\App\Http\Controllers\UserController::class, 'store'])->name('userprofilesave');
    Route::post('changePassword', [\App\Http\Controllers\UserController::class, 'changePassword'])->name('changePassword');
});

Auth::routes();
Route::get("logout", function (){
    Auth::logout();
    return redirect()->route('home');
} )->name("getlogout");

Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});

Route::prefix('google')->name('google.')->group( function (){
   Route::get('auth', [GoogleController::class, 'loginUsingGoogle'])->name('login');
   Route::get('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

Route::prefix('twitter')->name('twitter.')->group(function (){
    Route::get('auth', [TwitterController::class, 'loginUsingTwitter'])->name('login');
    Route::get('callback', [TwitterController::class, 'callbackFromTwitter'])->name('callback');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('lang/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
//    return redirect()->back();
    return redirect()->route('home');
});


//Route::resource('categories', App\Http\Controllers\CategoryController::class);











Route::resource('messages', App\Http\Controllers\MessageController::class);


Route::resource('ratings', App\Http\Controllers\RatingsController::class);
