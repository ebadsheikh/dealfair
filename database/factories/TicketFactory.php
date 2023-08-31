<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = ['pending','active','inprogress','closed'];
        $topics_id = Topic::pluck('id')->toArray();
        $product_ids = Product::pluck('id')->toArray();
        return [
            'ticket_number' => Str::random(8),
            'user_id' => 3,
            'assignee' => 1,
            'topic_id' => fake()->randomElement($topics_id),
            'product_id' => fake()->randomElement($product_ids),
            'status' => fake()->randomElement($status),
            'message' => fake()->paragraph()
        ];
    }
}
