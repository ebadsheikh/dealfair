<?php

use App\Models\Community;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('frontendCommunitiesPage', function (Generator $generateTrail) {
    $generateTrail->parent('frontendHomePage');
    $generateTrail->push('Communities');
});

Breadcrumbs::for('frontendCommunityDetailsPage', function (Generator $generateTrail, Community $community) {
    $generateTrail->parent('frontendHomePage');
    $generateTrail->push('Communities', route('communities'));
    $generateTrail->push($community->name);
});
