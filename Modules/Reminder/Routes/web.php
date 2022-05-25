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

Route::middleware('auth')->prefix('reminder')->group(function() {
    Route::get('/', 'ReminderController@index')->name('reminder');
    Route::post('post_data_reminder', [\Modules\Reminder\Http\Controllers\ReminderController::class, 'post_data_reminder'])->name('post_data_reminder');
    Route::get('remove_reminder', [\Modules\Reminder\Http\Controllers\ReminderController::class, 'remove_reminder'])->name('remove_reminder');
    Route::get('edit_reminder', [\Modules\Reminder\Http\Controllers\ReminderController::class, 'edit_reminder'])->name('edit_reminder');
    Route::post('post_edit_data_reminder', [\Modules\Reminder\Http\Controllers\ReminderController::class, 'post_edit_data_reminder'])->name('post_edit_data_reminder');

});
