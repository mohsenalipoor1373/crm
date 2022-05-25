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
    Route::post('events_customers_attach', [\Modules\SearchCustomer\Http\Controllers\SearchCustomerController::class, 'events_customers_attach'])->name('events_customers_attach');
    Route::post('events_customers_detail_attach', [\Modules\SearchCustomer\Http\Controllers\SearchCustomerController::class, 'events_customers_detail_attach'])->name('events_customers_detail_attach');
    Route::get('remove_events_customers', [\Modules\SearchCustomer\Http\Controllers\SearchCustomerController::class, 'remove_events_customers'])->name('remove_events_customers');
    Route::get('edit_events_customers', [\Modules\SearchCustomer\Http\Controllers\SearchCustomerController::class, 'edit_events_customers'])->name('edit_events_customers');
    Route::post('edit_events_customers_attach', [\Modules\SearchCustomer\Http\Controllers\SearchCustomerController::class, 'edit_events_customers_attach'])->name('edit_events_customers_attach');
    Route::post('edit_events_customers_attach_detail', [\Modules\SearchCustomer\Http\Controllers\SearchCustomerController::class, 'edit_events_customers_attach_detail'])->name('edit_events_customers_attach_detail');
    Route::get('see_customers_events_detail', [\Modules\SearchCustomer\Http\Controllers\SearchCustomerController::class, 'see_customers_events_detail'])->name('see_customers_events_detail');
    Route::get('remove_customers_events_detail', [\Modules\SearchCustomer\Http\Controllers\SearchCustomerController::class, 'remove_customers_events_detail'])->name('remove_customers_events_detail');
    Route::get('remove_events_customers_detail_attach_all', [\Modules\SearchCustomer\Http\Controllers\SearchCustomerController::class, 'remove_events_customers_detail_attach_all'])->name('remove_events_customers_detail_attach_all');
    Route::post('edit_events_customer_attach', [\Modules\SearchCustomer\Http\Controllers\SearchCustomerController::class, 'edit_events_customer_attach'])->name('edit_events_customer_attach');
    Route::post('post_data_edit_events_customer_attach', [\Modules\SearchCustomer\Http\Controllers\SearchCustomerController::class, 'post_data_edit_events_customer_attach'])->name('post_data_edit_events_customer_attach');


});
