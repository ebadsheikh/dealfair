<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum ProductListingTypesEnum: string
{
    use EnumToArrayTrait;
    case AUCTION = 'auction';
    case SELL = 'sell';
    case BOTH = 'both';
}
