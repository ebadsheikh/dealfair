<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UpdateProfileController;

Route::prefix('profile')
    ->controller(UpdateProfileController::class)
    ->name('profile.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('update/{user}', 'updateProfile')->name('update');
        Route::post('change/password', 'updatePassword')->name('change.password');
        Route::post('update/privacy/{userProfile}', 'updatePrivacySetting')->name('update.privacy');
    });
