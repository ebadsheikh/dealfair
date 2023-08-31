<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertisementPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advertisement_plans')->insert([
            [
                'views' => 1000,
                'price' => 50.00,
                'status' => 'active',
            ],
            [
                'views' => 500,
                'price' => 30.00,
                'status' => 'inactive',
            ],
            [
                'views' => 2000,
                'price' => 100.00,
                'status' => 'active',
            ],
        ]);
    }
}
