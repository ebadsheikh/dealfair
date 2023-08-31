<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('adminCommunitiesPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Communities');
});

Breadcrumbs::for('adminEditCommunitiesPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Communities List', route('admin.communities.index'));
    $generateTrail->push('Edit Communities');
});
