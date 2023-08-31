<?php

namespace App\Actions\Listing;

use App\Models\Listing;
use App\Models\ListingColor;
use App\Models\ListingTag;

class ListingStepFourAction
{
    public function handle(Listing $listing, array $data): Listing
    {
        $listing->update([
            'brand' => $data['brand'],
        ]);

        foreach ($data['listingTags'] as $listingTag) {
            ListingTag::create([
                'listing_id' => $listing->id,
                'tag' => $listingTag->value
            ]);
        }

        foreach ($data['colors'] as $color) {
            ListingColor::create([
                'listing_id' => $listing->id,
                'value' => $color
            ]);
        }

        return $listing;
    }
}
