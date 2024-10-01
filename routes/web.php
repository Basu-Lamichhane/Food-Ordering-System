<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminCouponController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Delivery\DeliveryController;
use App\Http\Controllers\Delivery\DeliveryOrderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Kitchen\KitchenController;
use App\Http\Controllers\Kitchen\KitchenOrderController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\SiteController;
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
//FRONTEND
Route::get('/', [PagesController::class, 'index'])->name("landing");
Route::get('/epay', [PagesController::class, 'epay'])->name("epay");
Route::get('/menu', [PagesController::class, 'menu'])->name("menu");
Route::get('/browse/{id}', [PagesController::class, 'browse'])->name("browse");
Route::get('/veggie', [PagesController::class, 'veggie'])->name("veggie");
Route::get('/drinks', [PagesController::class, 'drinks'])->name("drinks");
Route::get('/search',   [PagesController::class, 'search'])->name('search');
Route::get('product/{id}', [PagesController::class, 'viewProduct'])->name("viewProduct");
Route::post('usendmsg', [PagesController::class, 'usendmsg'])->name("usendmsg");
Route::get('/dashboard', [SiteController::class, 'home'])->middleware('auth');
Route::get('/checkout', [PagesController::class, 'checkout'])->middleware('auth')->name("checkout");
Route::get('/profile', [PagesController::class, 'profile'])->middleware('auth')->name("profile");
Route::resource('review', ReviewController::class)->middleware('auth');
Route::resource('orders', OrderController::class)->middleware('auth');
Route::post('esewa_store', [OrderController::class, 'esewa_store'])->name('esewa_store');
Route::get('/orders/update-status/{transaction_uuid}/{status}', [OrderController::class, 'update_status'])->name('orders.update_status');
Route::get('/logout', [SiteController::class, 'logout']);
//FRONTEND
//Cart
Route::post('cart/{id}', [CartController::class, 'addToCart'])->name("addtocart");
Route::post('deletecart/{id}', [CartController::class, 'deleteItem'])->name("deleteItem");

Route::post('addcartitem/{id}', [CartController::class, 'addItem'])->name("addItem");
Route::post('decreasecartitem/{id}', [CartController::class, 'decreaseItem'])->name("decreaseItem");
//endcart
//ADMIN
Route::middleware('auth', 'admin')->prefix('/admin')->name('admin.')->group(function () {
    Route::post('section/addproduct', [SectionController::class, 'addproductSection'])->name("addproductSection");
    Route::post('section/deleteproduct', [SectionController::class, 'deleteproductSection'])->name("deleteproductSection");
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('regions/assign', [RegionController::class, 'deliveryregion'])->name('viewassign');
    Route::get('assigned/list', [RegionController::class, 'listdelivery'])->name('listassigned');
    Route::post('notify', [AdminController::class, 'notify'])->name("notify");
    Route::post('assignregion', [RegionController::class, 'assignRegion'])->name("assignregion");
    Route::resource('regions', RegionController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('sliders/toggle/', [SliderController::class, 'toggleSliderView'])->name('toggleSliderView');
    Route::post('sliders/toggle/{slider}', [SliderController::class, 'toggleSliderUpdate'])->name('toggleSliderUpdate');
    Route::resource('sliders', SliderController::class);
    Route::resource('orders', AdminOrderController::class);
    Route::resource('coupons', AdminCouponController::class);
});

//KITCHEN
Route::middleware('auth', 'iskitchen')->prefix('/kitchen')->name('kitchen.')->group(function () {
    Route::get('/', [KitchenController::class, 'index'])->name('index');
    Route::resource('orders', KitchenOrderController::class);
});
//DELIVERY
Route::middleware('auth', 'isdelivery')->prefix('/delivery')->name('delivery.')->group(function () {
    Route::get('/', [DeliveryController::class, 'index'])->name('index');
    Route::resource('orders', DeliveryOrderController::class);
    Route::post('orders/handle', [DeliveryOrderController::class, 'handle'])->name('orders.handle');
    Route::post('orders/handled', [DeliveryOrderController::class, 'handled'])->name('orders.handled');
});
//All Personnels
Route::middleware('auth', 'kitchendelivery')->prefix('/dashboard')->name('dashboard.')->group(function () {
    Route::resource('chat', ChatController::class);
});
