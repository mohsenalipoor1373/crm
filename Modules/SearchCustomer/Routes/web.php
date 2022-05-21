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

Route::middleware('auth')->prefix('search_customer')->group(function() {
    Route::get('/', 'SearchCustomerController@index')->name('search_customer');
    Route::get('search_customer_index', [\Modules\SearchCustomer\Http\Controllers\SearchCustomerController::class, 'search_customer_index'])->name('search_customer_index');
    Route::get('customer_page/{id?}', [\Modules\SearchCustomer\Http\Controllers\SearchCustomerController::class, 'customer_page'])->name('customer_page');

});
