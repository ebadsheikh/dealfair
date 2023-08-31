<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum BrandStatusEnum: string
{
    use EnumToArrayTrait;

    case ACTIVE = 'active';

    case DRAFT = 'draft';
}
