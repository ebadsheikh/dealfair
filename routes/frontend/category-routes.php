<?php

use App\Http\Controllers\Frontend\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('category/{category:slug}', [CategoryController::class, 'categoryDetails'])->name('category.details');
