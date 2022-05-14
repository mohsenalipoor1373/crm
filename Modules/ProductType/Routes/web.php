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

Route::middleware('auth')->prefix('product_type')->group(function() {
    Route::get('/', 'ProductTypeController@index')->name('product_type');
    Route::post('post_data_product_type', [\Modules\ProductType\Http\Controllers\ProductTypeController::class, 'post_data_product_type'])->name('post_data_product_type');
    Route::post('post_data_edit_product_type', [\Modules\ProductType\Http\Controllers\ProductTypeController::class, 'post_data_edit_product_type'])->name('post_data_edit_product_type');
    Route::get('edit_product_type', [\Modules\ProductType\Http\Controllers\ProductTypeController::class, 'edit_product_type'])->name('edit_product_type');
    Route::get('remove_product_type', [\Modules\ProductType\Http\Controllers\ProductTypeController::class, 'remove_product_type'])->name('remove_product_type');
});

