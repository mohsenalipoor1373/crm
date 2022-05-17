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

Route::middleware('auth')->prefix('customers_agent')->group(function() {
    Route::get('/', 'CustomersAgentController@index')->name('customers_agent');
    Route::post('post_data_customers_agent', [\Modules\CustomersAgent\Http\Controllers\CustomersAgentController::class, 'post_data_customers_agent'])->name('post_data_customers_agent');
    Route::post('post_data_edit_customers_agent', [\Modules\CustomersAgent\Http\Controllers\CustomersAgentController::class, 'post_data_edit_customers_agent'])->name('post_data_edit_customers_agent');
    Route::get('edit_customers_agent', [\Modules\CustomersAgent\Http\Controllers\CustomersAgentController::class, 'edit_customers_agent'])->name('edit_customers_agent');
    Route::get('remove_customers_agent', [\Modules\CustomersAgent\Http\Controllers\CustomersAgentController::class, 'remove_customers_agent'])->name('remove_customers_agent');
});



