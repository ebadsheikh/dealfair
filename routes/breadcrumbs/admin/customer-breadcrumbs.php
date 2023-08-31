<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('adminCustomersPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Customer');
});

Breadcrumbs::for('adminAddCustomerPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Customers', route('admin.customers.index'));
    $generateTrail->push('Add Customer');
});

Breadcrumbs::for('adminDetailCustomerPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Customer', route('admin.customers.index'));
    $generateTrail->push('Customer Detail');
});
