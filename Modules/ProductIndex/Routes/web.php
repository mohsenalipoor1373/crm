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

Route::middleware('auth')->prefix('product_index')->group(function() {
    Route::get('/', 'ProductIndexController@index')->name('product_index');
    Route::post('post_data_product_index', [\Modules\ProductIndex\Http\Controllers\ProductIndexController::class, 'post_data_product_index'])->name('post_data_product_index');
    Route::post('post_data_edit_product_index', [\Modules\ProductIndex\Http\Controllers\ProductIndexController::class, 'post_data_edit_product_index'])->name('post_data_edit_product_index');
    Route::get('edit_product_index', [\Modules\ProductIndex\Http\Controllers\ProductIndexController::class, 'edit_product_index'])->name('edit_product_index');
    Route::get('remove_product_index', [\Modules\ProductIndex\Http\Controllers\ProductIndexController::class, 'remove_product_index'])->name('remove_product_index');
});



