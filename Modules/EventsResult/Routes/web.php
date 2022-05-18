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

Route::middleware('auth')->prefix('events_result')->group(function() {
    Route::get('/', 'EventsResultController@index')->name('events_result');
    Route::post('post_data_events_result', [\Modules\EventsResult\Http\Controllers\EventsResultController::class, 'post_data_events_result'])->name('post_data_events_result');
    Route::post('post_data_edit_events_result', [\Modules\EventsResult\Http\Controllers\EventsResultController::class, 'post_data_edit_events_result'])->name('post_data_edit_events_result');
    Route::get('edit_events_result', [\Modules\EventsResult\Http\Controllers\EventsResultController::class, 'edit_events_result'])->name('edit_events_result');
    Route::get('remove_events_result', [\Modules\EventsResult\Http\Controllers\EventsResultController::class, 'remove_events_result'])->name('remove_events_result');
});

