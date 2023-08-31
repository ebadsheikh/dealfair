<?php

namespace App\Helpers;

use App\Enums\KeywordStatusEnum;
use App\Enums\ProductListingTypesEnum;
use App\Enums\ProductStatusEnum;

class StatusCssClassHelper
{
    public static function keywordStatusCssClass(?string $value, string $type = 'btn'): string
    {
        return match ($value) {
            KeywordStatusEnum::PENDING->value => $type . '-warning',
            KeywordStatusEnum::ACTIVE->value => $type . '-primary',
            KeywordStatusEnum::DRAFT->value => $type . '-danger',
            default => $type . '-success',
        };
    }

    public static function listingStatusCssClass(?string $value, string $type = 'btn'): string
    {
        return match ($value) {
            ProductStatusEnum::PUBLISHED->value => $type . '-primary',
            ProductStatusEnum::DRAFT->value => $type . '-warning',
            ProductStatusEnum::BLOCKED->value => $type . '-danger',
            ProductStatusEnum::SOLD->value => $type . '-success',
            default => $type . '-light',
        };
    }

    public static function listingTypeCssClass(?string $value, string $type = 'btn'): string
    {
        return match ($value) {
            ProductListingTypesEnum::AUCTION->value => $type . '-primary',
            ProductListingTypesEnum::SELL->value => $type . '-success',
            ProductListingTypesEnum::BOTH->value => $type . '-warning',
            default => $type . '-light',
        };
    }
}
