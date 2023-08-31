<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('adminTicketCategoriesPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Ticket Categories');
});
