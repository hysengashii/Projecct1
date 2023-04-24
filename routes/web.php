<?php

use App\Models\Order;
use App\Models\Slide;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SlidesController;
use App\Http\Controllers\ProductsController;

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
    $slides = Slide::get();
    $products = Product::take(4)->get();
    return view('home', compact('slides','products'));
})->name('home');


Route::get('/shop', [ShopController::class, 'index'])->name('shop');

Route::post('/cart/{product}/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/{item}/inc', [CartController::class, 'inc'])->name('cart.inc');
Route::get('/cart/{item}/dec', [CartController::class, 'dec'])->name('cart.dec');
Route::get('/cart/{item}/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');



Route::resource('slides', SlidesController::class);
Route::resource('products', ProductsController::class);
Route::resource('orders', OrdersController::class)->only(['index','destroy']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $slides = Slide::count();
        $products = Product::count();
        $orders = Order::count();
        return view('dashboard',
         compact('products','slides','orders'));
    })->name('dashboard');
});
