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

Route::middleware('auth')->prefix('early_materials')->group(function() {
    Route::get('/', 'EarlyMaterialsController@index')->name('early_materials');
    Route::post('post_data_early_materials', [\Modules\EarlyMaterials\Http\Controllers\EarlyMaterialsController::class, 'post_data_early_materials'])->name('post_data_early_materials');
    Route::post('post_data_edit_early_materials', [\Modules\EarlyMaterials\Http\Controllers\EarlyMaterialsController::class, 'post_data_edit_early_materials'])->name('post_data_edit_early_materials');
    Route::get('edit_early_materials', [\Modules\EarlyMaterials\Http\Controllers\EarlyMaterialsController::class, 'edit_early_materials'])->name('edit_early_materials');
    Route::get('remove_early_materials', [\Modules\EarlyMaterials\Http\Controllers\EarlyMaterialsController::class, 'remove_early_materials'])->name('remove_early_materials');
    Route::get('change_early_materials', [\Modules\EarlyMaterials\Http\Controllers\EarlyMaterialsController::class, 'change_early_materials'])->name('change_early_materials');
});



