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

Route::middleware('auth')->prefix('setting_checkout')->group(function() {
    Route::get('/', 'SettingCheckoutController@index')->name('setting_checkout');
    Route::post('post_data_setting_checkout', [\Modules\SettingCheckout\Http\Controllers\SettingCheckoutController::class, 'post_data_setting_checkout'])->name('post_data_setting_checkout');
    Route::post('post_data_edit_setting_checkout', [\Modules\SettingCheckout\Http\Controllers\SettingCheckoutController::class, 'post_data_edit_setting_checkout'])->name('post_data_edit_setting_checkout');
    Route::get('edit_setting_checkout', [\Modules\SettingCheckout\Http\Controllers\SettingCheckoutController::class, 'edit_setting_checkout'])->name('edit_setting_checkout');
    Route::get('remove_setting_checkout', [\Modules\SettingCheckout\Http\Controllers\SettingCheckoutController::class, 'remove_setting_checkout'])->name('remove_setting_checkout');
});

