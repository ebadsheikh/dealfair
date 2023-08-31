<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Api\ListingWizardController::class)
    ->prefix('product')->middleware('auth:sanctum')
    ->group(function () {
        Route::post('firststep', 'storeFirstStepProduct');
        Route::post('secondstep/{listing}', 'storeSecondStepProduct');
        Route::post('thirdstep/{listing}', 'storeThirdStepProduct');
        Route::post('fourthstep/{listing}', 'storeFourthStepProduct');
    });
