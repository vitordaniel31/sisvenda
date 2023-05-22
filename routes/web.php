<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Redirect::route('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('sales', SaleController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__ . '/auth.php';
