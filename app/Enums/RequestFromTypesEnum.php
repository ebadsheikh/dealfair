<?php

namespace App\Enums;

enum RequestFromTypesEnum: string
{
    case WEBSITE = 'website';
    case ANDROID = 'android';
    case IPHONE = 'iphone';
}
