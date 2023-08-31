<?php

use App\Http\Controllers\Frontend\OnBoardingController;
use Illuminate\Support\Facades\Route;

Route::prefix('onboarding')
    ->controller(OnBoardingController::class)
    ->name('onboarding.')->group(function () {
        Route::get('/', 'onBoardingView')->name('index');
    });
