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

Route::middleware('auth')->prefix('setting_company')->group(function() {
    Route::get('/', 'SettingCompanyController@index')->name('setting_company');
    Route::post('post_data_setting_company', [\Modules\SettingCompany\Http\Controllers\SettingCompanyController::class, 'post_data_setting_company'])->name('post_data_setting_company');
    Route::post('post_data_edit_setting_company', [\Modules\SettingCompany\Http\Controllers\SettingCompanyController::class, 'post_data_edit_setting_company'])->name('post_data_edit_setting_company');
    Route::get('edit_setting_company', [\Modules\SettingCompany\Http\Controllers\SettingCompanyController::class, 'edit_setting_company'])->name('edit_setting_company');
    Route::get('remove_setting_company', [\Modules\SettingCompany\Http\Controllers\SettingCompanyController::class, 'remove_setting_company'])->name('remove_setting_company');
});

