<?php

use App\Http\Controllers\Admin\CustomerController;
use Illuminate\Support\Facades\Route;

Route::prefix('customers')
    ->name('customers.')
    ->controller(CustomerController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:View Customers List');
        Route::get('create', 'create')->name('create')->middleware('permission:Create Customer');
        Route::post('store', 'store')->name('store');
        Route::post('update/{user}', 'update')->name('update')->middleware('permission:Update Customer Profile');
        Route::get('destroy/{user}', 'destroy')->name('destroy')->middleware('permission:Delete Customer');
        Route::get('change-status/{user}/{status}', 'changeStatus')->name('change.status')->middleware('permission:Update Customer Status');
        Route::get('allow-verification/{user}/{verificationBadge}', 'changeVerificationStatus')->name('allow.verification');
        Route::get('download-media/{media}', 'downloadVerification')->name('download.media');
        Route::post('update-password/{user}', 'updatePassword')->name('update-password')->middleware('permission:Update Customer Password');
    });

Route::prefix('customer-details')
->name('customers.')
->controller(CustomerController::class)
->group(function () {
    Route::get('/{user}', 'show')->name('details')->middleware('permission:View Customers List');
});
