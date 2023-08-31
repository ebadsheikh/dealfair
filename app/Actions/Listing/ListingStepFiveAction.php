<?php

namespace App\Actions\Listing;

use App\Enums\ProductShippingCostPayerEnum;
use App\Enums\ProductStatusEnum;
use App\Models\Listing;
use App\Models\ListingCommunity;
use App\Models\UserAddress;

class ListingStepFiveAction
{
    public function handle(Listing $listing, array $data): Listing
    {
        $pickUpAddress = UserAddress::whereId($data['pickUpAddress'])->with('country')->first();

        $communities = $data['communities'];

        if ($data['shippingCostPayer'] === ProductShippingCostPayerEnum::PICKUP_ONLY->value) {
            foreach ($communities as $community) {
                ListingCommunity::firstOrCreate([
                    'listing_id' => $listing->id,
                    'community_id' => $community->id,
                ], [
                    'listing_id' => $listing->id,
                    'community_id' => $community->id,
                ]);
            }
        } else {
            $data['visibleRange'] = 0;
        }

        $listing->update([
            'shipping_cost_payer' => $data['shippingCostPayer'],
            'visible_range' => $data['visibleRange'],
            'pickup_latitude' => $pickUpAddress->latitude,
            'pickup_longitude' => $pickUpAddress->longitude,
            'pickup_address' => $pickUpAddress->address,
            'pickup_city' => $pickUpAddress->city,
            'pickup_state' => $pickUpAddress->state,
            'pickup_zip' => $pickUpAddress->zip,
            'pickup_country' => $pickUpAddress->country->name,
            'weight' => $data['weight'],
            'width' => $data['width'],
            'length' => $data['length'],
            'height' => $data['height'],
            'status' => ProductStatusEnum::PUBLISHED->value
        ]);

        return $listing;
    }
}
