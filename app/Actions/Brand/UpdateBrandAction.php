<?php

namespace App\Actions\Brand;

use App\Models\Brand;

class UpdateBrandAction
{
    public function handle(array $data, Brand $brand): Brand
    {
        $brand->update($data);
        return $brand;
    }
}
