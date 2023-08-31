<?php

use App\Http\Controllers\Api\ForgetPasswordController;
use Illuminate\Support\Facades\Route;

Route::controller(ForgetPasswordController::class)
    ->prefix('auth')
    ->group(function () {
        Route::post('verify/email', 'verifyEmail');
        Route::post('reset/password', 'resetPassword');
    });
