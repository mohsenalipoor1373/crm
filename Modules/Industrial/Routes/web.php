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


Route::middleware('auth')->prefix('industrial')->group(function() {
    Route::get('/', 'IndustrialController@index')->name('industrial');
    Route::post('post_data_industrial', [\Modules\Industrial\Http\Controllers\IndustrialController::class, 'post_data_industrial'])->name('post_data_industrial');
    Route::post('post_data_edit_industrial', [\Modules\Industrial\Http\Controllers\IndustrialController::class, 'post_data_edit_industrial'])->name('post_data_edit_industrial');
    Route::get('edit_industrial', [\Modules\Industrial\Http\Controllers\IndustrialController::class, 'edit_industrial'])->name('edit_industrial');
    Route::get('remove_industrial', [\Modules\Industrial\Http\Controllers\IndustrialController::class, 'remove_industrial'])->name('remove_industrial');
});
