<?php

use App\Models\Order;
use App\Models\Slide;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::delete('/slides/{slide}/image/{image}', [SlidesController::class, 'destroyPhoto'])->name('slides.destroyPhoto');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');


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
