<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum TicketCategoryStatusEnum: string
{
    use EnumToArrayTrait;

    case ACTIVE = 'active';

    case DRAFT = 'draft';
}
