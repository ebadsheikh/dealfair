<?php

namespace App\Actions\ResetPassword;

use App\Jobs\ResetPasswordLink;
use App\Models\PasswordReset;
use App\Models\User;
use Exception;
use Illuminate\Support\Carbon;
use Str;

class StoreResetPasswordTokenAction
{
    /**
     * @throws Exception
     */
    public function handle(User $user)
    {
        try {
            $token = Str::random(64);

            PasswordReset::insert([
                'email' => $user['email'],
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);

            ResetPasswordLink::dispatch($user, $token);
        } catch(Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }
}
