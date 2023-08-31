<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\FranchiseAffiliateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserVerificationRejectedController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

/**
 * Frontend routes start
 */

Route::middleware(['enableDisplayScopes'])->group(function () {
    // include customer auth routes
    require_once __DIR__ . '/frontend/auth-routes.php';
    require_once __DIR__ . '/frontend/social-auth-routes.php';
    require_once __DIR__ . '/frontend/support-routes.php';

    require_once __DIR__ . '/frontend/category-routes.php';

    Route::middleware(['isEmailVerified'])->group(function () {
        require_once __DIR__ . '/frontend/onboarding-routes.php';
        Route::middleware(['isOnBoardingCompleted'])->group(function () {
            require_once __DIR__ . '/frontend/open-access-routes.php';
            Route::middleware(['isCustomer'])->group(function () {
                require_once __DIR__ . '/frontend/seller-routes.php';
                require_once __DIR__ . '/frontend/store-routes.php';
                require_once __DIR__ . '/frontend/community-routes.php';
                require_once __DIR__ . '/frontend/auth-after-login-routes.php';
                require_once __DIR__ . '/frontend/shipping-address-routes.php';
                require_once __DIR__ . '/frontend/update-profile-routes.php';
                require_once __DIR__ . '/frontend/ticket-routes.php';
            });
        });
    });
});


/**
 * Frontend routes end
 */

/**
 * login user as an admin route
 */
Route::get('login/user/admin/{user}', [AuthController::class, 'loginUserasAdmin'])->name('login.user.admin');


Route::get('/admin/login', [AuthController::class, 'loginView'])->name('login.view');
Route::post('check/login', [AuthController::class, 'login'])->name('login');


Route::get('forgot-password', [AuthController::class, 'forgotPasswordView'])->name('forgotpassword.view');
Route::post('verify-email', [AuthController::class, 'verifyEmail'])->name('verify.email');

Route::get('reset-password/{token?}/{email?}', [AuthController::class, 'resetpasswordView'])->name('password.reset');
Route::post('update-password', [AuthController::class, 'resetPassword'])->name('update.password');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::view('cart', 'frontend.products.cart')->name('cart');
Route::view('checkout', 'frontend.products.checkout')->name('checkout');
Route::view('how-to-sell', 'frontend.sell.sell')->name('sell');
Route::view('orders', 'frontend.user-panel.orders')->name('orders');
Route::view('thankYou', 'frontend.products.thankyou')->name('thankYou');
Route::view('report-listing', 'frontend.listings.report-listing')->name('report.listing');
Route::view('seller/dashboard', 'frontend.user-panel.dashboards.seller-dashboard')->name('seller.dashboard');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // include customer routes
    require_once __DIR__ . '/admin/customer-routes.php';

    // include staff routes
    require_once __DIR__ . '/admin/staff-routes.php';

    // include admin routes
    require_once __DIR__ . '/admin/admin-routes.php';

    // include category routes
    require_once __DIR__ . '/admin/category-routes.php';

    // include category brand routes
    require_once __DIR__ . '/admin/category-brand-routes.php';

    // include dynamic pages routes
    require_once __DIR__ . '/admin/dynamic-page-routes.php';

    // include faq routes
    require_once __DIR__ . '/admin/faq-routes.php';

    // include faq routes
    require_once __DIR__ . '/admin/ticket-routes.php';

    // include faq routes
    require_once __DIR__ . '/admin/account-setting-routes.php';

    // include role routes
    require_once __DIR__ . '/admin/role-routes.php';

    // include permission routes
    require_once __DIR__ . '/admin/permission-routes.php';

    // include role & permission routes
    require_once __DIR__ . '/admin/roles-and-permissions-routes.php';

    // include articles category routes
    require_once __DIR__ . '/admin/article-category-routes.php';

    // include articles routes
    require_once __DIR__ . '/admin/articles-routes.php';

    // include articles category routes
    require_once __DIR__ . '/admin/ticket-category-routes.php';

    // include product routes
    require_once __DIR__ . '/admin/listing-routes.php';


    Route::prefix('user')
        ->controller(UserController::class)
        ->group(function () {
            Route::get('/', 'index')->name('users');
            Route::get('add', 'create')->name('user.add');
            Route::post('store', 'store')->name('user.store');
            Route::get('edit/{user}', 'edit')->name('user.edit');
            Route::post('update/{user}', 'update')->name('user.update');
            Route::get('destroy/{user}', 'destroy')->name('user.destroy');
            Route::get('admins', 'adminUsers')->name('admin.users');
        });


    Route::view('dashboard', 'admin.dashboard')->name('dashboard');

    // Route::view('products', 'admin.products.show')->name('products');
    Route::view('product/edit', 'admin.products.edit')->name('product.edit');

    Route::view('user/reported', 'admin.users.reported')->name('user.reported');

    //Route::view('tickets', 'admin.tickets.show')->name('tickets');

    Route::view('stores', 'admin.stores.all')->name('stores');
    Route::view('reported-stores', 'admin.stores.reported')->name('reported.stores');

    Route::view('refund-requests', 'admin.refund-requests.show')->name('refund-requests');

    // include brands routes
    require_once __DIR__ . '/admin/brand-routes.php';

    // include keywords routes
    require_once __DIR__ . '/admin/keyword-routes.php';

    // include announcement routes
    require_once __DIR__ . '/admin/announcement-routes.php';


    // include advertisement plans routes
    require_once __DIR__ . '/admin/advertisement-plan-routes.php';


    Route::get('franchise-affilate', [FranchiseAffiliateController::class, 'index'])->name('franchise-affiliates');


    // include community routes
    require_once __DIR__ . '/admin/communities-routes.php';

    // include email templates routes
    require_once __DIR__ . '/admin/email-template-routes.php';

    //include onboarding routes
    require_once __DIR__ . '/admin/onboarding-routes.php';

    //include settings routes
    require_once __DIR__ . '/admin/setting-routes.php';

    Route::post('verification/rejection/{user}', [UserVerificationRejectedController::class, 'store'])->name('user.verification.rejected');
});
