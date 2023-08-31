<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('adminTicketPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Tickets');
});
