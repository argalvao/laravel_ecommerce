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




Route::get('/carrinho', [App\Http\Controllers\CarrinhoController::class, 'index'])->name('carrinho.index');
Route::get('/carrinho/adicionar', function() {
    return redirect()->route('index');
});


Route::post('/carrinho/adicionar/{id}', [App\Http\Controllers\CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');

Route::delete('/carrinho/remover', [App\Http\Controllers\CarrinhoController::class, 'remover'])->name('carrinho.remover');

Route::post('/carrinho/concluir', [App\Http\Controllers\CarrinhoController::class, 'concluir'])->name('carrinho.concluir');

Route::get('/carrinho/compras', [App\Http\Controllers\CarrinhoController::class, 'compras'])->name('carrinho.compras');

Route::post('/carrinho/cancelar', [App\Http\Controllers\CarrinhoController::class, 'cancelar'])->name('carrinho.cancelar');



Route::get('/usuario', [App\Http\Controllers\EcommerceController::class, 'usuario'])->name('auth.usuario');

Route::get('/concluido', [App\Http\Controllers\EcommerceController::class, 'concluido'])->name('carrinho.concluido');

