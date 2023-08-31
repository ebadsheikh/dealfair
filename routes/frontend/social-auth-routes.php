<?php

use App\Http\Controllers\Frontend\SocialAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('social-auth/signin/{provider}')
    ->controller(SocialAuthController::class)
    ->name('social.auth.signin.')->group(function () {
        Route::get('/', 'redirect')->name('redirect');
        Route::get('callback', 'callback')->name('callback');
    });
