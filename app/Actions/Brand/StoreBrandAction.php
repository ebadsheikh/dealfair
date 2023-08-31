<?php

namespace App\Actions\Brand;

use App\Models\Brand;

class StoreBrandAction
{
    public function handle(array $data)
    {
        return Brand::create($data);
    }
}
