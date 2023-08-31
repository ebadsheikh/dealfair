<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum SignUpTypesEnum: string
{
    use EnumToArrayTrait;
    case FACEBOOK = 'facebook';
    case GOOGLE = 'google';
    case DEALFAIR = 'dealfair';

}
