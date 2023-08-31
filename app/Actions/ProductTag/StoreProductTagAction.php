<?php

namespace App\Actions\ProductTag;

use App\Models\Product;
use App\Models\ProductTag;

class StoreProductTagAction
{
    public function handle(Product $product, $tags): ProductTag
    {
        foreach ($tags as $tag) {
            $productTag =  ProductTag::create([
                 'product_id' => $product->id,
                 'tag' => $tag->value,
             ]);
        }
        return $productTag;
    }
}
