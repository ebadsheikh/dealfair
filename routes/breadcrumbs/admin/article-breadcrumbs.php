<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('adminArticlePage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Article List');
});

Breadcrumbs::for('adminAddArticlePage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Article List', route('admin.article.index'));
    $generateTrail->push('Add Article');
});

Breadcrumbs::for('adminEditArticlePage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Article List', route('admin.article.index'));
    $generateTrail->push('Edit Article');
});
