<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [App\Http\Controllers\PublishController::class, 'index'])->name('home');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//  Route::resource('category', CategoryController::class);
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');

Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');

Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');

Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.delete');

Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('/product/', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::get('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');
