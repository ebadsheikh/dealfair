<?php

return [

    /**
     * This will set customer seeder limit
     */
    'customer_seeder_limit' => env('CUSTOMER_SEEDER_LIMIT', 10),

    /**
     * This will set staff seeder limit
     */
    'staff_seeder_limit' => env('STAFF_SEEDER_LIMIT', 10),

    /**
     * This will set admin seeder limit
     */
    'admin_seeder_limit'  => env('ADMIN_SEEDER_LIMIT', 10),

    /**
     * This will set color seeder limit
     */
    'color_seeder_limit'  => env('COLOR_SEEDER_LIMIT', 10),

    /**
     * This will set keyword seeder limit
     */
    'keyword_seeder_limit'  => env('KEYWORD_SEEDER_LIMIT', 5),

    /**
     * This will set parent category seeder limit
     */
    'parent_category_seeder_limit'  => env('PARENT_CATEGORY_SEEDER_LIMIT', 20)
];
