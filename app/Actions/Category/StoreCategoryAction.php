<?php

namespace App\Actions\Category;

use App\Enums\MediaDirectoryNamesEnum;
use App\Jobs\CategoryImageUploadJob;
use App\Services\MediaService;
use App\Models\Category;

class StoreCategoryAction
{
    public function handle(array $data): Category
    {
        $category = Category::create($data);
        if (array_key_exists('image', $data)) {
            $mediaDTO = MediaService::uploadTempFile($data['image']);
            CategoryImageUploadJob::dispatch($mediaDTO, MediaDirectoryNamesEnum::CATEGORY_IMAGES->value, $category);
        }
        return $category;
    }
}
