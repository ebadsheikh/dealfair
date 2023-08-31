<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum ProductConditionsEnum: string
{
    use EnumToArrayTrait;

    case NEW = 'new';
    case LIKE_NEW = 'like_new';
    case GOOD = 'good';
    case FAIR = 'fair';
    case POOR = 'poor';
}
