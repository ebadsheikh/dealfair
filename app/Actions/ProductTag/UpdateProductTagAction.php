<?php

namespace App\Actions\ProductTag;

use App\Models\Product;
use App\Models\ProductTag;

class UpdateProductTagAction
{
    public function handle(Product $product, $tags)
    {
        foreach ($tags as $tag) {
            $productTag =  ProductTag::whereProductId($product->id)->update([
                 'product_id' => $product->id,
                 'tag' => $tag->value,
             ]);
        }
        return $productTag;
    }
}
