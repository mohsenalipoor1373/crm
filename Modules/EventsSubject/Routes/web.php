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

Route::middleware('auth')->prefix('events_subject')->group(function() {
    Route::get('/', 'EventsSubjectController@index')->name('events_subject');
    Route::post('post_data_events_subject', [\Modules\EventsSubject\Http\Controllers\EventsSubjectController::class, 'post_data_events_subject'])->name('post_data_events_subject');
    Route::post('post_data_edit_events_subject', [\Modules\EventsSubject\Http\Controllers\EventsSubjectController::class, 'post_data_edit_events_subject'])->name('post_data_edit_events_subject');
    Route::get('edit_events_subject', [\Modules\EventsSubject\Http\Controllers\EventsSubjectController::class, 'edit_events_subject'])->name('edit_events_subject');
    Route::get('remove_events_subject', [\Modules\EventsSubject\Http\Controllers\EventsSubjectController::class, 'remove_events_subject'])->name('remove_events_subject');
});

