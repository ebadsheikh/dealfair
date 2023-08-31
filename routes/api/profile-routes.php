<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Api\UpdateProfileController::class)
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::get('show/profile', 'getUserProfile');
    });
