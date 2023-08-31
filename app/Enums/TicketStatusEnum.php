<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum TicketStatusEnum: string
{
    use EnumToArrayTrait;

    case PENDING = 'pending';

    case ACTIVE = 'active';
    case INPROGRESS = 'inprogress';
    case HOLD = 'hold';
    case CLOSED = 'closed';
}
