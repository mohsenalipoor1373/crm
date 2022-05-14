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

Route::middleware('auth')->prefix('material')->group(function() {
    Route::get('/', 'MaterialController@index')->name('material');
    Route::post('post_data_material', [\Modules\Material\Http\Controllers\MaterialController::class, 'post_data_material'])->name('post_data_material');
    Route::post('post_data_edit_material', [\Modules\Material\Http\Controllers\MaterialController::class, 'post_data_edit_material'])->name('post_data_edit_material');
    Route::get('edit_material', [\Modules\Material\Http\Controllers\MaterialController::class, 'edit_material'])->name('edit_material');
    Route::get('remove_material', [\Modules\Material\Http\Controllers\MaterialController::class, 'remove_material'])->name('remove_material');
});

