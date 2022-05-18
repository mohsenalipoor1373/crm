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

Route::middleware('auth')->prefix('events_result_reason')->group(function () {
    Route::get('/', 'EventsResultReasonController@index')->name('events_result_reason');
    Route::post('post_data_events_result_reason', [\Modules\EventsResultReason\Http\Controllers\EventsResultReasonController::class, 'post_data_events_result_reason'])->name('post_data_events_result_reason');
    Route::post('post_data_edit_events_result_reason', [\Modules\EventsResultReason\Http\Controllers\EventsResultReasonController::class, 'post_data_edit_events_result_reason'])->name('post_data_edit_events_result_reason');
    Route::get('edit_events_result_reason', [\Modules\EventsResultReason\Http\Controllers\EventsResultReasonController::class, 'edit_events_result_reason'])->name('edit_events_result_reason');
    Route::get('remove_events_result_reason', [\Modules\EventsResultReason\Http\Controllers\EventsResultReasonController::class, 'remove_events_result_reason'])->name('remove_events_result_reason');
});


