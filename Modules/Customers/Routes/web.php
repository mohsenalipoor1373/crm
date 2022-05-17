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

Route::middleware('auth')->prefix('customers')->group(function() {
    Route::get('/', 'CustomersController@index')->name('customers');
    Route::post('post_data_customers', [\Modules\Customers\Http\Controllers\CustomersController::class, 'post_data_customers'])->name('post_data_customers');
    Route::post('post_data_edit_customers', [\Modules\Customers\Http\Controllers\CustomersController::class, 'post_data_edit_customers'])->name('post_data_edit_customers');
    Route::get('edit_customers', [\Modules\Customers\Http\Controllers\CustomersController::class, 'edit_customers'])->name('edit_customers');
    Route::get('change_customers', [\Modules\Customers\Http\Controllers\CustomersController::class, 'change_customers'])->name('change_customers');
    Route::get('remove_customers', [\Modules\Customers\Http\Controllers\CustomersController::class, 'remove_customers'])->name('remove_customers');

});

