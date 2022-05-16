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

Route::middleware('auth')->prefix('product_accessories')->group(function() {
    Route::get('/', 'ProductAccessoriesController@index')->name('product_accessories');
    Route::post('post_data_product_accessories', [\Modules\ProductAccessories\Http\Controllers\ProductAccessoriesController::class, 'post_data_product_accessories'])->name('post_data_product_accessories');
    Route::post('post_data_edit_product_accessories', [\Modules\ProductAccessories\Http\Controllers\ProductAccessoriesController::class, 'post_data_edit_product_accessories'])->name('post_data_edit_product_accessories');
    Route::get('edit_product_accessories', [\Modules\ProductAccessories\Http\Controllers\ProductAccessoriesController::class, 'edit_product_accessories'])->name('edit_product_accessories');
    Route::get('remove_product_accessories', [\Modules\ProductAccessories\Http\Controllers\ProductAccessoriesController::class, 'remove_product_accessories'])->name('remove_product_accessories');
});

