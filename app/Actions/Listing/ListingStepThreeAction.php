<?php

namespace App\Actions\Listing;

use App\Enums\ProductListingTypesEnum;
use App\Helpers\GlobalHelper;
use App\Models\Listing;

class ListingStepThreeAction
{
    public function handle(Listing $listing, array $data): Listing
    {
        $prepareData = [];

        switch ($data['listingType']) {
            case ProductListingTypesEnum::AUCTION->value:
                $prepareData['starting_bid'] = $data['startingBid'];
                break;

            case ProductListingTypesEnum::SELL->value:
                $prepareData['price'] = $data['productPrice'];
                $prepareData['discounted_price'] = $data['discountedProductPrice'] ?? 0;
                break;

            case ProductListingTypesEnum::BOTH->value:
                $prepareData['starting_bid'] = $data['startingBid'];
                $prepareData['price'] = $data['productPrice'];
                $prepareData['discounted_price'] = $data['discountedProductPrice'] ?? 0;
                break;
        }

        $prepareData['listing_type'] = $data['listingType'];

        $prepareData['selling_fees'] = GlobalHelper::getSettingValue('selling_fees');
        $prepareData['payment_charges_fixed'] = GlobalHelper::getSettingValue('payment_charges_fixed');
        $prepareData['payment_charges_percentage'] = GlobalHelper::getSettingValue('payment_charges_percentage');

        $listing->update($prepareData);
        return $listing;
    }
}
