<?php

namespace App\Actions\Community;

use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use App\Enums\MediaDirectoryNamesEnum;
use App\Models\Community;

class UpdateCommunityAction
{
    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function updateImage(array $data, Community $community): Community
    {
        if (array_key_exists('image', $data)) {
            // Update the user's image if a new image is uploaded
            $community->clearMediaCollection(MediaDirectoryNamesEnum::COMMUNITY_IMAGES->value);
            $community->addMediaFromRequest('image')->toMediaCollection(MediaDirectoryNamesEnum::COMMUNITY_IMAGES->value);
        }

        return $community;
    }
}
