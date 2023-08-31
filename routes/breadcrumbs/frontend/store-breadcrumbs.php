<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('sellerStoreDashboardPage', function (Generator $generateTrail) {
    $generateTrail->push('Store Dashboard', route('seller.store.dashboard'));
});


Breadcrumbs::for('sellerMyStoresListPage', function (Generator $generateTrail) {
    $generateTrail->parent('sellerStoreDashboardPage');
    $generateTrail->push('My Stores');
});

Breadcrumbs::for('sellerMyStoresPage', function (Generator $generateTrail) {
    $generateTrail->push('My Stores', route('seller.my.stores'));
});

Breadcrumbs::for('sellerCreateStorePage', function (Generator $generateTrail) {
    $generateTrail->parent('sellerMyStoresPage');
    $generateTrail->push('Create Store');
});

Breadcrumbs::for('sellerEditStorePage', function (Generator $generateTrail) {
    $generateTrail->parent('sellerMyStoresPage');
    $generateTrail->push('Edit Store');
});
