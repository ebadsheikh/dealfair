<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('adminCategoryBrandPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Category Brand List');
});

Breadcrumbs::for('adminAddCategoryBrandPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Category Brand List', route('admin.category.brand.index'));
    $generateTrail->push('Add Category Brand');
});

Breadcrumbs::for('adminEditCategoryBrandPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Category Brand List', route('admin.category.brand.index'));
    $generateTrail->push('Edit Category Brand');
});
