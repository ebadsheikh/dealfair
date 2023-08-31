<?php

namespace Database\Seeders;

use App\Models\ReportedUser;
use Illuminate\Database\Seeder;

class ReportedUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportedUser::factory()->count(10)->create();
    }
}
