<?php

namespace App\Actions\CategoryBrand;

use App\Models\CategoryBrand;

class UpdateCategoryBrandAction
{
    public function handle(array $data, CategoryBrand $categoryBrand): CategoryBrand
    {
        $categoryBrand->update($data);

        return $categoryBrand;
    }
}
