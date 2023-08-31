<?php

use App\Http\Controllers\Api\CountryController;
use Illuminate\Support\Facades\Route;

Route::controller(CountryController::class)
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::get('/countries', 'getCountries');
    });
