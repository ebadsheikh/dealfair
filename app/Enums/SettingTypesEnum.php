<?php

namespace App\Enums;

enum SettingTypesEnum: string
{
    case MAIL = 'mail';
    case SOCIALAUTH = 'socialauth';
    case GOOGLEADDRESS = 'googleaddress';
    case AWS = 'aws';
    case PUSHER = 'pusher';
}
