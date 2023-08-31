<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum StoreStatusEnum: string
{
    use EnumToArrayTrait;
    case ACTIVE = 'active';
    case SUSPENDED = 'suspended';
    case DEACTIVATED = 'deactivated';
    case BLOCKED = 'blocked';
}
