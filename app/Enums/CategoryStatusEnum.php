<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum CategoryStatusEnum: string
{
    use EnumToArrayTrait;

    case ACTIVE = 'active';
    case DRAFT = 'draft';
}
