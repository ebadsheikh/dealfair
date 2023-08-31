<?php

namespace App\Enums;

enum CommunityMemberFiltersEnum: string
{
    case LESS_THAN_50 = 'Less than 50';
    case FROM_50_TO_500 = 'From 50 to 500';
    case FROM_500_TO_5000 = 'From 500 to 5000';
    case MORE_THAN_5000 = 'More than 5000';
}
