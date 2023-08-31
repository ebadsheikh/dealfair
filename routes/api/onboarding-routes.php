<?php

use App\Http\Controllers\Api\OnboardingController;
use Illuminate\Support\Facades\Route;

Route::controller(OnboardingController::class)
    ->prefix('onboarding')->middleware('auth:sanctum')
    ->group(function () {
        Route::get('firststepdata', 'getFirstStepData');
        Route::post('secondstep', 'storeSecondStepData');
        Route::post('thirdstep', 'storeThirdStepData');
        Route::post('fourstep', 'storeFourStepData');
        Route::get('fivestep', 'getFiveStepData');
        Route::get('sixstepdata', 'getSixStepData');
    });

Route::controller(OnboardingController::class)
->prefix('community')->middleware('auth:sanctum')
->group(function () {
    Route::get('follow/{community}', 'followCommunity');
    Route::get('leave/{community}', 'leaveCommunity');
});
