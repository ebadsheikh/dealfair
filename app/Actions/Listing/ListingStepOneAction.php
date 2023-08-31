<?php

namespace App\Actions\Listing;

use App\Models\Listing;

class ListingStepOneAction
{
    public function handle(array $data): Listing
    {
        return Listing::create($data);
    }
}
