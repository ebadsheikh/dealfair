<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $topicsData = [
            ['name' => 'Billing'],
            ['name' => 'Shipping'],
            ['name' => 'Technical Support'],
            ['name' => 'Sales'],
            ['name' => 'Product Inquiry'],
            ['name' => 'Complaints'],
        ];

        foreach ($topicsData as $topic) {
            Topic::create($topic);
        }
    }
}
