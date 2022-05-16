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

Route::middleware('auth')->prefix('product_packing')->group(function() {
    Route::get('/', 'ProductPackingController@index')->name('product_packing');
    Route::post('post_data_product_packing', [\Modules\ProductPacking\Http\Controllers\ProductPackingController::class, 'post_data_product_packing'])->name('post_data_product_packing');
    Route::post('post_data_edit_product_packing', [\Modules\ProductPacking\Http\Controllers\ProductPackingController::class, 'post_data_edit_product_packing'])->name('post_data_edit_product_packing');
    Route::get('edit_product_packing', [\Modules\ProductPacking\Http\Controllers\ProductPackingController::class, 'edit_product_packing'])->name('edit_product_packing');
    Route::get('remove_product_packing', [\Modules\ProductPacking\Http\Controllers\ProductPackingController::class, 'remove_product_packing'])->name('remove_product_packing');
});

