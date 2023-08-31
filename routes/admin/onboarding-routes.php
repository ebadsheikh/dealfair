<?php

use App\Http\Controllers\Admin\OnBoardingController;
use Illuminate\Support\Facades\Route;

Route::prefix('onboarding')
    ->controller(OnBoardingController::class)
    ->name('onboarding.')->group(function () {
        Route::get('step-one', 'stepOneView')->name('step.one');
        Route::get('step-two', 'stepTwoView')->name('step.two');
        Route::get('step-three', 'stepThreeView')->name('step.three');
        Route::get('step-four', 'stepFourView')->name('step.four');
        Route::get('step-five', 'stepFiveView')->name('step.five');
        Route::get('step-six', 'stepSixView')->name('step.six');
    });
