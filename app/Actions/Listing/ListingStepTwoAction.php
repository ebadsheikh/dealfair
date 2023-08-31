<?php

namespace App\Actions\Listing;

use App\DTO\MediaDTO;
use App\Enums\MediaDirectoryNamesEnum;
use App\Jobs\UploadMediaJob;
use App\Models\Listing;

class ListingStepTwoAction
{
    public function handle(Listing $listing, array $data): Listing
    {
        $listingImages = $data['listingImages'];
        $listingVideo = $data['listingVideo'];

        foreach ($listingImages as $listingImage) {
            $listingImageDTO = new MediaDTO(
                $listingImage->path(),
                $listingImage->getClientOriginalName(),
            );
            UploadMediaJob::dispatch($listingImageDTO, MediaDirectoryNamesEnum::PRODUCT_IMAGES->value, $listing);
        }

        if (!empty($listingVideo)) {
            $listingVideoDTO = new MediaDTO(
                $listingVideo->path(),
                $listingVideo->getClientOriginalName(),
            );
            UploadMediaJob::dispatch($listingVideoDTO, MediaDirectoryNamesEnum::PRODUCT_VIDEO->value, $listing);
        }

        return $listing;
    }
}
