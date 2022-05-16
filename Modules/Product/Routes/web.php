<?php

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

Route::middleware('auth')->prefix('product')->group(function() {
    Route::get('/', 'ProductController@index')->name('product');
    Route::post('post_data_product', [\Modules\Product\Http\Controllers\ProductController::class, 'post_data_product'])->name('post_data_product');
    Route::post('post_data_edit_product', [\Modules\Product\Http\Controllers\ProductController::class, 'post_data_edit_product'])->name('post_data_edit_product');
    Route::get('edit_product', [\Modules\Product\Http\Controllers\ProductController::class, 'edit_product'])->name('edit_product');
    Route::get('remove_product', [\Modules\Product\Http\Controllers\ProductController::class, 'remove_product'])->name('remove_product');
    Route::get('change_product', [\Modules\Product\Http\Controllers\ProductController::class, 'change_product'])->name('change_product');
});

