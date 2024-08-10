<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\OrderItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('auth.logout');




Route::get('/', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
Route::post('register', [RegisterController::class, 'register'])->name('register.store');

Route::middleware('auth')->group(function () {
    Route::get('/User/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    Route::get('/profile/orders', [OrderController::class, 'index'])->name('profile.orders');
    Route::get('/profile/orders/{id}', [OrderController::class, 'show'])->name('order.show');
    // Route::get('/profile/store/{id}', [OrderController::class, 'rate'])->name('profile.order_details');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order.details');

    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

     Route::post('/rating/store', [OrderController::class, 'storeRating'])->name('rating.store');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/Admin/dashboard', [AdminController::class, 'index'])->name('Admin.dashboard');
    Route::resource('Admin/products', ProductsController::class, ['as' => 'Admin']);

    Route::get('/user-table',[AdminController::class,'userdata'])->name('Admin.user.table');
    Route::get('/wishlist-table',[AdminController::class,'wishlistdata'])->name('Admin.wishlist.table');
    Route::get('/order-table',[AdminController::class,'orderdata'])->name('Admin.order.table');
    // Route::get('/orderdata-table',[OrderController::class,'OrderData'])->name('Admin.order.table');

    Route::get('/product-table', [AdminController::class, 'productdata'])->name('Admin.products.table');


    Route::get('admin/products/export', [AdminController::class, 'exportProducts'])->name('Admin.products.export');





});

Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::post('/wishlist/add/{product}', [WishlistController::class, 'add'])->name('wishlist.add');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout-method');
Route::post('/order/create', [CheckoutController::class, 'create'])->name('order.create');
Route::get('/order/success', [CheckoutController::class, 'success'])->name('order.success');





// Route::post('/order-item/update-status', [OrderItemController::class, 'updateStatus'])->name('order_item.update_status');






























