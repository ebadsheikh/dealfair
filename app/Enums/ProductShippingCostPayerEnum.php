<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum ProductShippingCostPayerEnum: string
{
    use EnumToArrayTrait;

    case ME = 'me';
    case BUYER = 'buyer';
    case PICKUP_ONLY = 'pickup_only';
}
