<?php

namespace App\Enums;

enum EmailVerificationEnums: string
{
    case EMAILVERIFICATION = 'email_verification';
    case RESETPASSWORD = 'reset_password';
}
