<?php

namespace App\Enums;

enum ListingPriceFiltersEnum: string
{
    case LESS_THAN_100 = 'Less than $100';
    case FROM_100_TO_500 = 'From $100 to $500';
    case FROM_500_TO_1000 = 'From $500 to $1000';

    case FROM_1000_TO_2500 = 'From $1000 to $2500';

    case FROM_2500_TO_5000 = 'From $2500 to $5000';
    case MORE_THAN_5000 = 'More than $5000';
}
