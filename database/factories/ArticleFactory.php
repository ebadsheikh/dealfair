<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => $this->faker->randomElement([1, 2]),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'tags' => $this->faker->words(3, true),
            'status' => $this->faker->randomElement(['publish', 'draft']),
            'like_count' => 0,
            'dislike_count' => 0
        ];
    }
}
