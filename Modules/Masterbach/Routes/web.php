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

Route::middleware('auth')->prefix('masterbach')->group(function () {
    Route::get('/', 'MasterbachController@index')->name('masterbach');
    Route::post('post_data_masterbach', [\Modules\Masterbach\Http\Controllers\MasterbachController::class, 'post_data_masterbach'])->name('post_data_masterbach');
    Route::post('post_data_edit_masterbach', [\Modules\Masterbach\Http\Controllers\MasterbachController::class, 'post_data_edit_masterbach'])->name('post_data_edit_masterbach');
    Route::get('edit_masterbach', [\Modules\Masterbach\Http\Controllers\MasterbachController::class, 'edit_masterbach'])->name('edit_masterbach');
    Route::get('remove_masterbach', [\Modules\Masterbach\Http\Controllers\MasterbachController::class, 'remove_masterbach'])->name('remove_masterbach');

});
