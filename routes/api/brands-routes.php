<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Api\BrandController::class)
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::get('six/brands', 'getTopSixBrands');
        Route::get('brands', 'getBrandsWithPagination');
    });
