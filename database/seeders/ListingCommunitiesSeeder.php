<?php

namespace Database\Seeders;

use App\Enums\ProductShippingCostPayerEnum;
use App\Models\Community;
use App\Models\Listing;
use App\Models\ListingCommunity;
use App\Models\UserAddress;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListingCommunitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pickUpOnlyListings = Listing::whereShippingCostPayer(ProductShippingCostPayerEnum::PICKUP_ONLY->value)->get();

        foreach ($pickUpOnlyListings as $pickUpOnlyListing) {
            $nearByAddresses = UserAddress::select([
                'user_addresses.*',
                DB::raw('( 3959 * acos( cos( radians(?) ) * cos( radians( latitude ) ) *
                        cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) *
                        sin( radians( latitude ) ) ) ) AS distance')
            ])
                ->having('distance', '<=', $pickUpOnlyListing->visible_range)
                ->orderBy('distance')
                ->setBindings([$pickUpOnlyListing->pickup_latitude, $pickUpOnlyListing->pickup_longitude, $pickUpOnlyListing->pickup_latitude])
                ->pluck('zip');
            $communities = Community::whereIn('zip', $nearByAddresses)->get();

            foreach ($communities as $community) {
                ListingCommunity::firstOrCreate([
                    'listing_id' => $pickUpOnlyListing->id,
                    'community_id' => $community->id
                ]);
            }
        }
    }
}
