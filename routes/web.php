<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index']);
Route::get('product_create', [ProductController::class, 'create'])->name('products.create');
Route::post('product_store', [ProductController::class, 'store'])->name('products.store');
Route::get('product_edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('product_update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('product_delete/{id}',[ProductController::class, 'destroy'])->name('products.destroy');

Route::get('sold_products', [ProductController::class, 'soldProduct'])->name('products.sold');
Route::put('product_status_change/{id}', [ProductController::class, 'updateStatusChange'])->name('products.updateStatusChange');
