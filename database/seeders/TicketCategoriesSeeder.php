<?php

namespace Database\Seeders;

use App\Models\TicketCategory;
use Illuminate\Database\Seeder;

class TicketCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Account Management'],
            ['name' => 'Billing'],
            ['name' => 'Technical Support'],
            ['name' => 'Sales'],
            ['name' => 'Other'],
        ];

        foreach ($categories as $category) {
            TicketCategory::create($category);
        }
    }
}
