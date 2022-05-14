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

Route::middleware('auth')->prefix('color_masterbatch')->group(function() {
    Route::get('/', 'ColorMasterbatchController@index')->name('color_masterbatch');
    Route::post('post_data_color_masterbatch', [\Modules\ColorMasterbatch\Http\Controllers\ColorMasterbatchController::class, 'post_data_color_masterbatch'])->name('post_data_color_masterbatch');
    Route::post('post_data_edit_color_masterbatch', [\Modules\ColorMasterbatch\Http\Controllers\ColorMasterbatchController::class, 'post_data_edit_color_masterbatch'])->name('post_data_edit_color_masterbatch');
    Route::get('edit_color_masterbatch', [\Modules\ColorMasterbatch\Http\Controllers\ColorMasterbatchController::class, 'edit_color_masterbatch'])->name('edit_color_masterbatch');
    Route::get('remove_color_masterbatch', [\Modules\ColorMasterbatch\Http\Controllers\ColorMasterbatchController::class, 'remove_color_masterbatch'])->name('remove_color_masterbatch');
    Route::get('change_color_masterbatch', [\Modules\ColorMasterbatch\Http\Controllers\ColorMasterbatchController::class, 'change_color_masterbatch'])->name('change_color_masterbatch');
});
