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

Route::middleware('auth')->prefix('events_type')->group(function () {
    Route::get('/', 'EventsTypeController@index')->name('events_type');
    Route::post('post_data_events_type', [\Modules\EventsType\Http\Controllers\EventsTypeController::class, 'post_data_events_type'])->name('post_data_events_type');
    Route::post('post_data_edit_events_type', [\Modules\EventsType\Http\Controllers\EventsTypeController::class, 'post_data_edit_events_type'])->name('post_data_edit_events_type');
    Route::get('edit_events_type', [\Modules\EventsType\Http\Controllers\EventsTypeController::class, 'edit_events_type'])->name('edit_events_type');
    Route::get('remove_events_type', [\Modules\EventsType\Http\Controllers\EventsTypeController::class, 'remove_events_type'])->name('remove_events_type');
});

