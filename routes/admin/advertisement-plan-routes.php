<?php

use App\Http\Controllers\Admin\AdvertisementPlanController;
use Illuminate\Support\Facades\Route;

Route::prefix('advertisement-plans')
    ->name('advertisement-plans.')
    ->controller(AdvertisementPlanController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{advertisementPlan}', 'edit')->name('edit');
        Route::post('update/{advertisementPlan}', 'update')->name('update');
        Route::get('destroy/{advertisementPlan}', 'destroy')->name('destroy');
    });
