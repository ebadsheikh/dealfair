<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\ListingColor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ListingColor>
 */
class ListingColorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'value' => Color::inRandomOrder()->first()->name
        ];
    }
}
