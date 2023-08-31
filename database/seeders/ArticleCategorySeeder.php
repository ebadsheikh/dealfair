<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Real data for brands
        $articlesCategory = [
            [
                'name' => 'Seller',
                'icon' => 'fa fa-user',
                'slug' => Str::slug('Seller')
            ],
            [
                'name' => 'Buyer',
                'icon' => 'fa fa-shopping-cart',
                'slug' => Str::slug('Buyer')
            ],
        ];

        // Inserting data into articlesCategory table
        foreach ($articlesCategory as $data) {
            ArticleCategory::firstOrCreate(['name' => $data['name']], $data);
        }
    }
}
