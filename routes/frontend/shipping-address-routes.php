<?php

use App\Http\Controllers\Frontend\UserAddressController;
use Illuminate\Support\Facades\Route;

Route::prefix('shipping/addresses')
    ->controller(UserAddressController::class)
    ->name('shipping.address.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::post('update/{userAddress}', 'update')->name('update');
        Route::get('/destroy/{userAddress}', 'destroy')->name('destroy');
    });
