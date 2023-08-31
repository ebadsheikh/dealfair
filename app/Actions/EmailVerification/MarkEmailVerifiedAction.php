<?php

namespace App\Actions\EmailVerification;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MarkEmailVerifiedAction
{
    public function handle(): bool
    {
        return User::whereId(Auth::id())->update([
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
