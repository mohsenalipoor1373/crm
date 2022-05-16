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

Route::middleware('auth')->prefix('essentials_packing_type')->group(function() {
    Route::get('/', 'EssentialsPackingTypeController@index')->name('essentials_packing_type');
    Route::post('post_data_essentials_packing_type', [\Modules\EssentialsPackingType\Http\Controllers\EssentialsPackingTypeController::class, 'post_data_essentials_packing_type'])->name('post_data_essentials_packing_type');
    Route::post('post_data_edit_essentials_packing_type', [\Modules\EssentialsPackingType\Http\Controllers\EssentialsPackingTypeController::class, 'post_data_edit_essentials_packing_type'])->name('post_data_edit_essentials_packing_type');
    Route::get('edit_essentials_packing_type', [\Modules\EssentialsPackingType\Http\Controllers\EssentialsPackingTypeController::class, 'edit_essentials_packing_type'])->name('edit_essentials_packing_type');
    Route::get('remove_essentials_packing_type', [\Modules\EssentialsPackingType\Http\Controllers\EssentialsPackingTypeController::class, 'remove_essentials_packing_type'])->name('remove_essentials_packing_type');
});

