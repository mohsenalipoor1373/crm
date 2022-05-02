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

Route::middleware('auth')->prefix('color')->group(function() {
    Route::get('/', 'ColorController@index')->name('color');
    Route::post('post_data_color', [\Modules\Color\Http\Controllers\ColorController::class, 'post_data_color'])->name('post_data_color');
    Route::post('post_data_edit_color', [\Modules\Color\Http\Controllers\ColorController::class, 'post_data_edit_color'])->name('post_data_edit_color');
    Route::get('edit_color', [\Modules\Color\Http\Controllers\ColorController::class, 'edit_color'])->name('edit_color');
    Route::get('remove_color', [\Modules\Color\Http\Controllers\ColorController::class, 'remove_color'])->name('remove_color');
});
