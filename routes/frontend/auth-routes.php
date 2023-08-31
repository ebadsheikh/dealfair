<?php

use App\Http\Controllers\Frontend\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')
    ->controller(AuthController::class)
    ->name('auth.')->group(function () {
        Route::get('signin', 'signInView')->name('signin');
        Route::post('signin', 'signIn')->name('signin');
        Route::get('signup', 'signUpView')->name('signup');
        Route::post('signup', 'signUp')->name('signup');
        Route::get('forgot-password', 'forgotPasswordView')->name('forgot.password');
        Route::get('reset-password/{token}/{email}', 'resetPasswordView')->name('reset.password');
        Route::post('verify/email', 'verifyEmail')->name('verify.email');
        Route::post('update/password', 'resetPassword')->name('update.password');
        Route::middleware(['isCustomer','redirectIfEmailVerified'])->group(function () {
            Route::get('email-verification', 'emailVerificationView')->name('email.verification');
            Route::post('verify-email-verification-code', 'verifyEmailVerificationCode')->name('verify.email.verification.code');
        });
    });
