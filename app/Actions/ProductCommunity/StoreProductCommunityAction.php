<?php

namespace App\Actions\ProductCommunity;

use App\Models\Product;
use App\Models\ProductCommunity;

class StoreProductCommunityAction
{
    public function handle(array $selectedCommunities, Product $product)
    {
        foreach ($selectedCommunities as $key => $community) {
            ProductCommunity::create([
                'product_id' => $product->id,
                'community_id' => $community,
            ]);
        }
    }
}
