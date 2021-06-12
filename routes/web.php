<?php

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

Route::get('/', [App\Http\Controllers\EcommerceController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('products', App\Http\Controllers\ProductController::class);

Route::get('products/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit.products');

Route::post('products/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('update.products');

Route::get('products/detail/{id}', [App\Http\Controllers\ProductController::class, 'detail'])->name('detail.product');


