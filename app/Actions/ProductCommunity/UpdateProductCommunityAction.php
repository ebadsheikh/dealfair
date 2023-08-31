<?php

namespace App\Actions\ProductCommunity;

use App\Models\Product;
use App\Models\ProductCommunity;

class UpdateProductCommunityAction
{
    public function handle($selectedCommunities, Product $product)
    {
        ProductCommunity::whereProductId($product->id)->delete();
        foreach ($selectedCommunities as $key => $community) {
            ProductCommunity::create([
                'product_id' => $product->id,
                'community_id' => $community,
            ]);
        }
    }
}
