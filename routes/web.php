<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
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
Route::get('/', function () {
    return view('welcome');
})->name('landingpage');

Route::get('products', [ProductController::class, 'index']);

Route::get('products/create', [ProductController::class, 'create']);
Route::post('products', [ProductController::class, 'store']);

Route::get('products/{product}', [ProductController::class, 'show']);

Route::get('products/{product}/edit', [ProductController::class, 'edit']);
Route::patch('products/{product}', [ProductController::class, 'update']);

Route::delete('products/{product}', [ProductController::class, 'destroy']);

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('login', [LoginController::class, 'form'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout']);

