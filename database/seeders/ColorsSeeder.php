<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            'Black',
            'Grey',
            'White',
            'Beige',
            'Red',
            'Pink',
            'Purple',
            'Blue',
            'Green',
            'Yellow'
        ];

        foreach ($colors as $color) {
            Color::firstOrCreate(['name' => $color]);
        }
    }
}
