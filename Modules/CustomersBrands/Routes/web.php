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

Route::middleware('auth')->prefix('customers_brands')->group(function() {
    Route::get('/', 'CustomersBrandsController@index')->name('customers_brands');
    Route::post('post_data_customers_brands', [\Modules\CustomersBrands\Http\Controllers\CustomersBrandsController::class, 'post_data_customers_brands'])->name('post_data_customers_brands');
    Route::post('post_data_edit_customers_brands', [\Modules\CustomersBrands\Http\Controllers\CustomersBrandsController::class, 'post_data_edit_customers_brands'])->name('post_data_edit_customers_brands');
    Route::get('edit_customers_brands', [\Modules\CustomersBrands\Http\Controllers\CustomersBrandsController::class, 'edit_customers_brands'])->name('edit_customers_brands');
    Route::get('remove_customers_brands', [\Modules\CustomersBrands\Http\Controllers\CustomersBrandsController::class, 'remove_customers_brands'])->name('remove_customers_brands');
});


