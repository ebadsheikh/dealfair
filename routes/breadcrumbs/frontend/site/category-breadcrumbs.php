<?php

use App\Models\Category;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;
use App\Helpers\GlobalHelper;

Breadcrumbs::for('frontendCategoryDetailsPage', function (Generator $generateTrail, Category $category) {
    $generateTrail->parent('frontendHomePage');
    GlobalHelper::generateCategoryBreadcrumbs($generateTrail, $category);
});
