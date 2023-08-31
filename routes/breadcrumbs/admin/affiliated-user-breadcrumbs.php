<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('adminAffiliatePage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Franchise Affiliate');
});
