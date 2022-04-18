<?php


use Modules\Settings\Http\Controllers\SettingsController;


Route::prefix('settings')->middleware(['password.confirm'])->controller(SettingsController::class)->group(function () {
    Route::get('/', 'index')->name('settings');
    Route::get('/password', 'password')->name('settings.password');
});
