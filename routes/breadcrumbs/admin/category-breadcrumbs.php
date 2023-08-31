<?php

use App\Models\Category;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('adminCategoriesPage', function (Generator $generateTrail, Category $category = null) {
    $generateTrail->parent('adminDashboard');
    if ($category != null) {
        $generateTrail->push('Categories', route('admin.category.index'));
        GlobalHelper::generateCategoryBreadcrumbsInAdmin($generateTrail, $category);
    } else {
        $generateTrail->push('Categories');
    }
});

Breadcrumbs::for('adminAddCategoryPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push(' Categories', route('admin.category.index'));
    $generateTrail->push('Add Category');
});

Breadcrumbs::for('adminEditCategoryPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push(' Categories', route('admin.category.index'));
    $generateTrail->push('Edit Category');
});
