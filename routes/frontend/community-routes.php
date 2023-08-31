<?php

use App\Http\Controllers\Frontend\CommunityDashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('community')
    ->controller(CommunityDashboardController::class)
    ->name('community.')->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });
