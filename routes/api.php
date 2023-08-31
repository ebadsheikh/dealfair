<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// include setting api routes
require_once __DIR__ . '/api/settings-api-routes.php';

// include auth api routes
require_once __DIR__ . '/api/auth-routes.php';

// include auth forget password routes
require_once __DIR__ . '/api/forget-password-routes.php';

// include onboarding api routes
require_once __DIR__ . '/api/onboarding-routes.php';

// include countries api routes
require_once __DIR__ . '/api/countries-routes.php';

// include categories api routes
require_once __DIR__ . '/api/categories-routes.php';

// include brands api routes
require_once __DIR__ . '/api/brands-routes.php';

// include user profile api routes
require_once __DIR__ . '/api/profile-routes.php';

// include product listing api routes
require_once __DIR__ . '/api/product-listing-routes.php';
