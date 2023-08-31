<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Api\CategoryController::class)
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::get('six/categories', 'getTopSixCategories');
        Route::get('categories', 'getCategoriesWithPagination');
    });
