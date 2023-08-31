<?php

namespace Database\Factories;

use App\Models\CategoryBrand;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Keyword;

/**
 * @extends Factory<Keyword>
 */
class KeywordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $categoryBrand = CategoryBrand::inRandomOrder()->first();

        return [
            'keyword' => fake()->unique()->name(),
            'brand_id' => $categoryBrand->brand_id,
            'category_id' => $categoryBrand->category_id,
            'weight' => fake()->numberBetween(10, 100),
            'length' => fake()->numberBetween(10, 100),
            'width' => fake()->numberBetween(10, 100),
            'height' => fake()->numberBetween(10, 100),
        ];
    }
}
