<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PixController;
use App\Http\Controllers\ProductSaleController;
use App\Http\Controllers\PaymentMethodController;
use Illuminate\Support\Facades\Redirect;
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
    return view('landing-page.index');
});

Route::prefix('backoffice')->middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('sales', SaleController::class)->except(['destroy']);
    Route::put('/sales/{sale}/finish', [SaleController::class, 'finish'])->name('sales.finish');
    Route::put('/sales/{sale}/cancel', [SaleController::class, 'cancel'])->name('sales.cancel');
    Route::resource('sales.products', ProductSaleController::class)->parameters(['products' => 'productSale'])->only(['destroy']);
    Route::post('/sales/products/save/{sale?}', [ProductSaleController::class, 'save'])->name('sales.products.save');
    Route::put('/sales/{sale}/products/{productSale}/add', [ProductSaleController::class, 'add'])->name('sales.products.add');
    Route::put('/sales/{sale}/products/{productSale}/remove', [ProductSaleController::class, 'remove'])->name('sales.products.remove');
    Route::resource('sales.bills', BillController::class)->parameters(['bills' => 'paymentMethod'])->only(['store', 'destroy']);
    Route::resource('pixes', PixController::class);
    Route::resource('paymentMethods', PaymentMethodController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__ . '/auth.php';
