<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [LandingpageController::class, 'index'])->name('landingpage');


Route::get('login', [LoginController::class, 'form'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->middleware('guest');

Route::post('logout', [LoginController::class, 'logout'])->middleware('auth');

Route::prefix('dashboard')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    
    Route::resource('categories', CategoryController::class);

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('create', [ProductController::class, 'create']);
        Route::post('/', [ProductController::class, 'store']);
        Route::get('{product}', [ProductController::class, 'show']);
        Route::get('{product}/edit', [ProductController::class, 'edit']);
        Route::patch('{product}', [ProductController::class, 'update']);
        Route::delete('{product}', [ProductController::class, 'destroy']);
    });
});

Route::prefix('pembeli')->middleware('role:pembeli')->group(function () {
    Route::get('/', function () {
        return 'ini halaman pembeli';
    });
});

Route::get('/checkout/{product}', [OrderController::class, 'checkout'])->middleware(['auth', 'role:pembeli']);

Route::prefix('orders')->middleware(['auth', 'role:pembeli'])->group(function () {
    Route::post('/', [OrderController::class, 'store']);
    Route::get('{order}', [OrderController::class, 'show']);
    Route::post('{order}/pay', [OrderController::class, 'pay']);
});
