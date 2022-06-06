<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardUserController;
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
});

Route::get('/login', [LoginController::class, 'index']);

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', function () {
    return view('index');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});
Route::resource('/dashboard/pelanggan', DashboardUserController::class);
Route::get('/verify', [LoginController::class, 'verify']);
Route::get('/block', [LoginController::class, 'block']);
Route::get('/search', [DashboardUserController::class, 'search'])->name('search');
