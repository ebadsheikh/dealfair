<?php

use App\Http\Controllers\Api\SettingApiController;
use Illuminate\Support\Facades\Route;

Route::controller(SettingApiController::class)
    ->group(function () {
        Route::get('/settings', 'getAllSetting');
    });
