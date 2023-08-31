<?php

namespace App\Actions\EmailVerification;

use App\Exceptions\EmailVerification\VerificationCodeDidNotExistException;
use App\Exceptions\EmailVerification\VerificationCodeExpiresException;
use App\Exceptions\EmailVerification\VerificationCodeIncorrectException;
use App\Helpers\GlobalHelper;
use App\Models\EmailVerification;

class VerifyEmailVerificationCodeAction
{
    private MarkEmailVerifiedAction $markEmailVerifiedAction;
    private DeleteEmailVerificationCodeAction $deleteEmailVerificationCodeAction;

    public function __construct(MarkEmailVerifiedAction $markEmailVerifiedAction, DeleteEmailVerificationCodeAction $deleteEmailVerificationCodeAction)
    {
        $this->markEmailVerifiedAction = $markEmailVerifiedAction;
        $this->deleteEmailVerificationCodeAction = $deleteEmailVerificationCodeAction;
    }


    /**
     * @param array $data
     *
     * @return bool
     *
     * @throws VerificationCodeDidNotExistException
     * @throws VerificationCodeIncorrectException
     * @throws VerificationCodeExpiresException
     */
    public function handle(array $data): bool
    {
        $user = GlobalHelper::getUser();
        $verification = EmailVerification::whereUserId($user->id)->first();

        if (!$verification) {
            throw new VerificationCodeDidNotExistException();
        }

        if ($verification->code != $data['code']) {
            throw new VerificationCodeIncorrectException();
        }

        if (!$verification->expires_at->isFuture()) {
            throw new VerificationCodeExpiresException();
        }

        $this->markEmailVerifiedAction->handle();

        $this->deleteEmailVerificationCodeAction->handle();
        GlobalHelper::forgetUserCache($user->id);
        return true;
    }
}
