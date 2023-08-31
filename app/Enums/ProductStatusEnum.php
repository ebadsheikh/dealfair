<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum ProductStatusEnum: string
{
    use EnumToArrayTrait;

    case PUBLISHED = 'published';

    case DRAFT = 'draft';
    case SOLD = 'sold';
    case BLOCKED = 'blocked';
}
