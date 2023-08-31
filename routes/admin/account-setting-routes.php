<?php

use App\Http\Controllers\Admin\AccountSettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('account-settings')
    ->controller(AccountSettingController::class)
    ->name('account-settings.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('change-password', 'updatePassword')->name('change-password');
    });
