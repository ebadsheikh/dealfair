<?php

namespace Database\Seeders;

use App\Models\ReportedUserReason;
use Illuminate\Database\Seeder;

class ReportedUserReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportedUserReason::factory()->count(10)->create();
    }
}
