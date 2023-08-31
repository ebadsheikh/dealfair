<?php

namespace App\Http\Middleware;

use App\Actions\EmailVerification\StoreEmailVerificationCodeAction;
use App\Enums\EmailVerificationEnums;
use App\Helpers\GlobalHelper;
use App\Jobs\SendEmailVerificationCodeJob;
use Closure;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsEmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return RedirectResponse|Response
     * @throws Exception
     */
    public function handle(Request $request, Closure $next): RedirectResponse|Response
    {
        $user = GlobalHelper::getUser();

        if (!$user || $user->email_verified_at) {
            return $next($request);
        }

        $verificationCode = (new StoreEmailVerificationCodeAction())->handle($user, EmailVerificationEnums::EMAILVERIFICATION);
        SendEmailVerificationCodeJob::dispatch($user, $verificationCode);
        return redirect()->route('auth.email.verification');
    }
}
