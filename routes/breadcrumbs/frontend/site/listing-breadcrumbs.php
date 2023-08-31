<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;
use App\Helpers\GlobalHelper;
use App\Models\Listing;

Breadcrumbs::for('frontendListingsPage', function (Generator $generateTrail) {
    $generateTrail->parent('frontendHomePage');
    $generateTrail->push('Listings');
});

Breadcrumbs::for('frontendListingDetailsPage', function (Generator $generateTrail, Listing $listing) {
    $generateTrail->parent('frontendHomePage');
    GlobalHelper::generateCategoryBreadcrumbs($generateTrail, $listing->category);
    $generateTrail->push($listing->title);
});
