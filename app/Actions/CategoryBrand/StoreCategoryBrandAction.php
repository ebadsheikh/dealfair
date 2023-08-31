<?php

namespace App\Actions\CategoryBrand;

use App\Models\CategoryBrand;

class StoreCategoryBrandAction
{
    public function handle(array $data): CategoryBrand
    {
        $categoryBrand = CategoryBrand::create($data);

        return $categoryBrand;
    }
}
