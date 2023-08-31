<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum VerificationBadgeEnum: int
{
    use EnumToArrayTrait;

    case APPROVED = 1;
    case REJECTED = 0;
}
