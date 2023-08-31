<?php

namespace App\Actions\EmailVerification;

use App\Models\EmailVerification;
use App\Models\User;
use Exception;
use Illuminate\Support\Carbon;

class StoreEmailVerificationCodeAction
{
    /**
     * @throws Exception
     */
    public function handle(User $user, $type): EmailVerification
    {
        try {
            return EmailVerification::updateOrCreate(
                [
                    'user_id' => $user->id,
                ],
                [
                    'user_id' => $user->id,
                    'code' => random_int(100000, 999999),
                    'expires_at' => Carbon::now()->addHours(24),
                    'type' => $type
                ]
            );
        } catch(Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }
}
