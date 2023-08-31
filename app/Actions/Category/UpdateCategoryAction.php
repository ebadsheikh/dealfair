<?php

namespace App\Actions\Category;

use App\Enums\MediaDirectoryNamesEnum;
use App\Jobs\CategoryImageUploadJob;
use App\Models\Category;
use App\Services\MediaService;

class UpdateCategoryAction
{
    public function handle(Category $category, array $data): Category
    {
        $category->update($data);
        if (array_key_exists('image', $data)) {
            MediaService::deleteFileFromBucket($category->image_url);
            $mediaDTO = MediaService::uploadTempFile($data['image']);
            CategoryImageUploadJob::dispatch($mediaDTO, MediaDirectoryNamesEnum::CATEGORY_IMAGES->value, $category);
        }
        return $category;
    }
}
