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

Route::middleware('auth')->prefix('product_dim')->group(function() {
    Route::get('/', 'ProductDimController@index')->name('product_dim');
    Route::post('post_data_product_dim', [\Modules\ProductDim\Http\Controllers\ProductDimController::class, 'post_data_product_dim'])->name('post_data_product_dim');
    Route::post('post_data_edit_product_dim', [\Modules\ProductDim\Http\Controllers\ProductDimController::class, 'post_data_edit_product_dim'])->name('post_data_edit_product_dim');
    Route::get('edit_product_dim', [\Modules\ProductDim\Http\Controllers\ProductDimController::class, 'edit_product_dim'])->name('edit_product_dim');
    Route::get('remove_product_dim', [\Modules\ProductDim\Http\Controllers\ProductDimController::class, 'remove_product_dim'])->name('remove_product_dim');
});




