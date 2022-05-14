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

Route::middleware('auth')->prefix('quality_materials')->group(function() {
    Route::get('/', 'QualityMaterialsController@index')->name('quality_materials');
    Route::post('post_data_quality_materials', [\Modules\QualityMaterials\Http\Controllers\QualityMaterialsController::class, 'post_data_quality_materials'])->name('post_data_quality_materials');
    Route::post('post_data_edit_quality_materials', [\Modules\QualityMaterials\Http\Controllers\QualityMaterialsController::class, 'post_data_edit_quality_materials'])->name('post_data_edit_quality_materials');
    Route::get('edit_quality_materials', [\Modules\QualityMaterials\Http\Controllers\QualityMaterialsController::class, 'edit_quality_materials'])->name('edit_quality_materials');
    Route::get('remove_quality_materials', [\Modules\QualityMaterials\Http\Controllers\QualityMaterialsController::class, 'remove_quality_materials'])->name('remove_quality_materials');
});


