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

Route::middleware('auth')->prefix('events_customers')->group(function() {
    Route::get('/', 'EventsCustomersController@index');
    Route::post('post_data_events_customers', [\Modules\EventsCustomers\Http\Controllers\EventsCustomersController::class, 'post_data_events_customers'])->name('post_data_events_customers');
    Route::post('post_data_events_customers_detail', [\Modules\EventsCustomers\Http\Controllers\EventsCustomersController::class, 'post_data_events_customers_detail'])->name('post_data_events_customers_detail');
    Route::post('post_edit_events_customers', [\Modules\EventsCustomers\Http\Controllers\EventsCustomersController::class, 'post_edit_events_customers'])->name('post_edit_events_customers');

});
