<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\ListingColor;
use App\Models\ListingTag;
use Illuminate\Database\Seeder;

class ListingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Listing::factory()->times(500)->create()->each(function ($listing) {
            $listing->listingTags()->saveMany(ListingTag::factory()->times(3)->make());
            $listing->listingColors()->save(ListingColor::factory()->make());
        });
    }
}
