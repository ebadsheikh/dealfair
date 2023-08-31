<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::firstOrCreate(
            [
                'name' => 'United States',
                'country_code' => 'US',
                'phone_code' => '+1'
            ],
            Country::factory()->make()->toArray()
        );
    }
}
