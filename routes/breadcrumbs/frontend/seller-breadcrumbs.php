<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('sellerDashboardPage', function (Generator $generateTrail) {
    $generateTrail->push('Seller Dashboard', route('seller.dashboard'));
});


Breadcrumbs::for('sellerMyListingPage', function (Generator $generateTrail) {
    $generateTrail->parent('sellerDashboardPage');
    $generateTrail->push('My Listing');
});
