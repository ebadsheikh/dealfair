<?php

namespace Database\Factories;

use App\Models\ReportedUserReason;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReportedUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reported_by' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'reported_to' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'reason_id' => function () {
                return ReportedUserReason::inRandomOrder()->first()->id;
            },
            'description' => fake()->name()
        ];
    }
}
