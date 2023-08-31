<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('adminKeywordsPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Keywords List');
});

Breadcrumbs::for('adminAddKeywordsPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Keywords List', route('admin.keywords.index'));
    $generateTrail->push('Add Keywords');
});

Breadcrumbs::for('adminEditKeywordsPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Keywords List', route('admin.keywords.index'));
    $generateTrail->push('Edit Keywords');
});
