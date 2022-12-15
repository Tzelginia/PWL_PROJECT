<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CetakController;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/admin', function () {
    return view('dashboard.index');
})->middleware('checkRole:admin');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', function () {
    return view('index');
});
Route::get('/product', [ProductController::class, 'index']);

Route::get('/product/{id}', [ProductController::class, 'show']);

// Route::get('/product', function () {
//     return view('product');
// });
// Route::get('/dashboardproduct', [ProductController::class, 'create']);
// Route::post('/dashboardproduct', [ProductController::class, 'store']);
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});
Route::resource('/dashboard/pelanggan', DashboardUserController::class)->middleware('checkRole:admin');
Route::get('/verify', [LoginController::class, 'verify']);
Route::get('/block', [LoginController::class, 'block']);

Route::get('/pelanggan/search', [DashboardUserController::class, 'search'])->name('search');
Route::resource('/dashboard/category', DashboardCategoryController::class)->middleware('checkRole:admin');
Route::resource('/dashboard/product', DashboardProductController::class)->middleware('checkRole:admin');
// Route::get('/dashboard/product', [ProductController::class, 'index'])->middleware('checkRole:admin');
Route::resource('/review', ReviewController::class)->middleware('auth');
Route::get('/contact/search', [ReviewController::class, 'search'])->name('search');
Route::resource('/keranjang', KeranjangController::class);
Route::get('/transaksiUser', [KeranjangController::class, 'transaksi']);

Route::resource('/dashboard/transaksi', TransaksiController::class);
Route::get('/verifyTransaksi', [TransaksiController::class, 'verify']);
Route::post('/bayar', [TransaksiController::class, 'bayar']);

Route::get('cetak', CetakController::class)->name('cetak');

Route::get('/migration', function () {
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
});