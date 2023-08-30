<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products',[ProductController::class,'index'])->name('product.index');
Route::get('/products/create',[ProductController::class,'create'])->name('product.create');
Route::get('/products/{id}',[ProductController::class,'show'])->name('product.show');

Route::get('/products/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::put('/products/edit/{id}',[ProductController::class,'edit'])->name('product.edit');

Route::post('/products/store',[ProductController::class,'store'])->name('product.store');


Route::delete('/products/{id}',[ProductController::class,'destroy'])->name('product.destroy');

Route::resource('/category',CategoryController::class);

Route::resource('/order',OrderController::class);
