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

Route::middleware('auth')->prefix('essentials_packing')->group(function () {
    Route::get('/', 'EssentialsPackingController@index')->name('essentials_packing');
    Route::post('post_data_essentials_packing', [\Modules\EssentialsPacking\Http\Controllers\EssentialsPackingController::class, 'post_data_essentials_packing'])->name('post_data_essentials_packing');
    Route::post('post_data_edit_essentials_packing', [\Modules\EssentialsPacking\Http\Controllers\EssentialsPackingController::class, 'post_data_edit_essentials_packing'])->name('post_data_edit_essentials_packing');
    Route::get('edit_essentials_packing', [\Modules\EssentialsPacking\Http\Controllers\EssentialsPackingController::class, 'edit_essentials_packing'])->name('edit_essentials_packing');
    Route::get('remove_essentials_packing', [\Modules\EssentialsPacking\Http\Controllers\EssentialsPackingController::class, 'remove_essentials_packing'])->name('remove_essentials_packing');
});

