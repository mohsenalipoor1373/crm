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

Route::middleware('auth')->prefix('shift')->group(function() {
    Route::get('/', 'ShiftController@index')->name('shift');
    Route::post('post_data_shift', [\Modules\Shift\Http\Controllers\ShiftController::class, 'post_data_shift'])->name('post_data_shift');
    Route::post('post_data_edit_shift', [\Modules\Shift\Http\Controllers\ShiftController::class, 'post_data_edit_shift'])->name('post_data_edit_shift');
    Route::get('edit_shift', [\Modules\Shift\Http\Controllers\ShiftController::class, 'edit_shift'])->name('edit_shift');
    Route::get('remove_shift', [\Modules\Shift\Http\Controllers\ShiftController::class, 'remove_shift'])->name('remove_shift');
});
