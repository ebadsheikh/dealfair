<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum ArticleStatusEnum: string
{
    use EnumToArrayTrait;
    case PUBLISH = 'publish';
    case DRAFT = 'draft';
}
