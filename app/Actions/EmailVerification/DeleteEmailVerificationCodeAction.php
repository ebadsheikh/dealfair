<?php

namespace App\Actions\EmailVerification;

use App\Models\EmailVerification;
use Illuminate\Support\Facades\Auth;

class DeleteEmailVerificationCodeAction
{
    public function handle(): bool
    {
        return EmailVerification::whereUserId(Auth::id())->delete();
    }
}
