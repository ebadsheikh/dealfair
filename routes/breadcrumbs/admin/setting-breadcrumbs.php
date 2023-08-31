<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

Breadcrumbs::for('adminGeneralSettingPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('General Settings');
});

Breadcrumbs::for('adminLogoSettingPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Logo Settings');
});

Breadcrumbs::for('adminProductSettingPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Product Settings');
});

Breadcrumbs::for('adminMediaSettingPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Media Settings');
});

Breadcrumbs::for('adminListingSettingPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Listing Page Settings');
});

Breadcrumbs::for('adminSocialLinkSettingPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Social Links Settings');
});

Breadcrumbs::for('adminMailSettingPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Mail Settings');
});

Breadcrumbs::for('adminAwsSettingPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('AWS Settings');
});

Breadcrumbs::for('adminPusherSettingPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Pusher Settings');
});

Breadcrumbs::for('adminMapSettingPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Map Settings');
});

Breadcrumbs::for('adminMaintenanceSettingPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Maintenance Mode');
});

Breadcrumbs::for('adminFeeSettingPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Fees Settings');
});

Breadcrumbs::for('adminWalletSettingPage', function (Generator $generateTrail) {
    $generateTrail->parent('adminDashboard');
    $generateTrail->push('Wallet Settings');
});
