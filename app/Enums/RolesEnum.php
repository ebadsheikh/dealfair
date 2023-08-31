<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum RolesEnum: string
{
    use EnumToArrayTrait;

    case SUPERADMIN = 'superadmin';
    case ADMIN = 'admin';
    case STAFF = 'staff';
    case CUSTOMER = 'customer';
}
