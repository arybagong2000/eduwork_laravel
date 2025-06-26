<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

Route::get('/', [ProductController::class, 'index']);

Route::resource('/products', ProductController::class);

Route::resource('/carts', CartController::class);
/*
Route::get('/products', function () {
    return "ini route products";
    //return view('welcome');
});

Route::get('/cart', function () {
    return "ini route cart";
    //return view('welcome');
});
*/
Route::get('/checkout', function () {
    return "ini route checkout";
    //return view('welcome');
});