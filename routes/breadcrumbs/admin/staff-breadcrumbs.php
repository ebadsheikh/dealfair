<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('adminStaffPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Staff');
});

Breadcrumbs::for('adminAddStaffPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Staff', route('admin.staff.index'));
    $generateTrail->push('Add Staff');
});

Breadcrumbs::for('adminDetailStaffPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Staff', route('admin.staff.index'));
    $generateTrail->push('Staff Detail');
});
