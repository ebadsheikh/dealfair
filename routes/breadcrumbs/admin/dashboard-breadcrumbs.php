<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('adminDashboard', function (Generator $generateTrail) {
    $generateTrail->push('Dashboard', route('admin.dashboard'));
});
