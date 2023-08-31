<?php

use App\Http\Controllers\Admin\CommunityController;
use Illuminate\Support\Facades\Route;

Route::prefix('communities')
    ->controller(CommunityController::class)
    ->name('communities.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:View Communities');
        Route::get('edit/{community}', 'edit')->name('edit')->middleware('permission:Edit Community');
        Route::post('update/{community}', 'update')->name('update');
        Route::get('destroy/{community}', 'destroy')->name('destroy')->middleware('permission:Delete Community');
        Route::post('update-image/{community}', 'updateCommunityImage')->name('update-image');
    });
