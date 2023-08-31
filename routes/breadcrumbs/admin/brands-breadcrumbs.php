<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('adminBrandsPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Brands List');
});

Breadcrumbs::for('adminAddBrandPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Brands List', route('admin.brands.index'));
    $generateTrail->push('Add Brand');
});

Breadcrumbs::for('adminEditBrandPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Brands List', route('admin.brands.index'));
    $generateTrail->push('Edit Brand');
});
