<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\CategoryBrand;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryBrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 2; $i++) {
            $category = Category::where('name', '!=', 'other')
                ->inRandomOrder()
                ->whereDoesntHave('categories')
                ->first();

            $brand = Brand::inRandomOrder()->first();

            CategoryBrand::firstOrCreate([
                'category_id' => $category->id,
                'brand_id' => $brand->id
            ]);
        }
    }
}
