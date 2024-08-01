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
Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::any('logout', [LoginController::class, 'logout'])->name('auth.logout');



Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
Route::post('register', [RegisterController::class, 'register'])->name('register.store');

Route::middleware('auth')->group(function () {
    Route::get('/User/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/Admin/dashboard', [AdminController::class, 'index'])->name('Admin.dashboard');
    Route::resource('admin/products', ProductsController::class, ['as' => 'Admin']);
    Route::get('/user-table',[AdminController::class,'userdata'])->name('Admin.user.table');
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



Route::get('/profile/orders', [OrderController::class, 'index'])->name('profile.orders');




































