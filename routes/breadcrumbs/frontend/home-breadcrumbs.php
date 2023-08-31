<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('frontendHomePage', function (Generator $generateTrail) {
    $generateTrail->push('Dealfair', route('home'));
});
