<?php

namespace Database\Seeders;

use App\Enums\TicketStatusEnum;
use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws \Exception
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Ticket::create([
                'ticket_number' => 'TCKT.'. random_int(1000, 9999),
                'user_id' => fake()->numberBetween(2, 10),
                'ticket_category_id' => fake()->numberBetween(1, 5),
                'assignee' => fake()->numberBetween(2, 10),
                'subject' => fake()->sentence(3),
                'description' => fake()->paragraph,
                'status' => TicketStatusEnum::PENDING,
            ]);
        }
    }
}
