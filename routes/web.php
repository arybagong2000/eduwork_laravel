<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKatagoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [Dashboard::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
/*
Route::get('/dashboard', function () {
    
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['adminku'])->group(function () {
    
    /*Route::get('/katagori', function () {
        Route::resource('/admin/katagori', BarangKatagoriController::class);
    })->name('katagori');*/
    Route::resource('/admin/katagori', BarangKatagoriController::class);
    Route::resource('/barang', BarangController::class);
});

Route::name('admin.')->group(function () {
    Route::resource('/admin/barang', BarangController::class);
    //Route::resource('/admin/katagori', BarangKatagoriController::class);
});

//Route::get('/katagori', function () {return view('katagori');})->name('katagori');
//Route::get('/barang', function () {return view('barangAdmin');})->name('barang');
Route::resource('/products', ProductController::class);
Route::resource('/carts', CartController::class);

require __DIR__.'/auth.php';
