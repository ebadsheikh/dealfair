<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Real data for brands
        $brands = ["Nike", "Adidas", "Puma", "Reebok", "New Balance", "Apple", "Google"];

        // Inserting data into brands table
        foreach ($brands as $brand) {
            Brand::firstOrCreate([
                'name' => $brand,
            ]);
        }
    }
}
