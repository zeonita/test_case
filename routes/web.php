<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::redirect('/', 'home');
Route::get('home', [HomeController::class, 'index'])->name('index');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('produk')->name('product.')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('tambah', [ProductController::class, 'add'])->name('add');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::get('{product}', [ProductController::class, 'edit'])->name('edit');
        Route::put('edit/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('{product}', [ProductController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('kategori')->name('category.')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('index');
        Route::get('tambah', [CategoryController::class, 'add'])->name('add');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::get('{category}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('edit/{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('api')->name('api.')->group(function () {
        Route::get('category', [CategoryApiController::class, 'list'])->name('category-list');
        Route::get('product', [ProductApiController::class, 'list'])->name('product-list');
    });
});

Auth::routes();