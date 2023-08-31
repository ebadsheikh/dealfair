<?php

namespace Database\Factories;

use App\Enums\UserStatusEnum;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'username' => Str::random(8),
            'date_of_birth' => Carbon::createFromFormat('Y-m-d', $this->faker->date('Y-m-d', '-18 years')),
            'telephone' => $this->faker->regexify('^(\+92)[0-9]{10}$'),
            'onboarding_step' => 6,
            'status' => UserStatusEnum::ACTIVE->value,
            'is_verification_badge_allowed' => 0,
        ];
    }
}
