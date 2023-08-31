<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum KeywordStatusEnum: string
{
    use EnumToArrayTrait;

    case ACTIVE = 'active';

    case PENDING = 'pending';

    case DRAFT = 'draft';
}
