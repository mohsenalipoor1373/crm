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

Route::prefix('product_shape')->group(function() {
    Route::get('/', 'ProductShapeController@index')->name('product_shape');
    Route::post('post_data_product_shape', [\Modules\ProductShape\Http\Controllers\ProductShapeController::class, 'post_data_product_shape'])->name('post_data_product_shape');
    Route::post('post_data_edit_product_shape', [\Modules\ProductShape\Http\Controllers\ProductShapeController::class, 'post_data_edit_product_shape'])->name('post_data_edit_product_shape');
    Route::get('edit_product_shape', [\Modules\ProductShape\Http\Controllers\ProductShapeController::class, 'edit_product_shape'])->name('edit_product_shape');
    Route::get('remove_product_shape', [\Modules\ProductShape\Http\Controllers\ProductShapeController::class, 'remove_product_shape'])->name('remove_product_shape');
});


