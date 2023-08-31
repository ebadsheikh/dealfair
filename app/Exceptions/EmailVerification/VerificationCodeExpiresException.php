<?php

namespace App\Exceptions\EmailVerification;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class VerificationCodeExpiresException extends Exception
{
    public function render(Request $request): JsonResponse|RedirectResponse
    {
        $message = 'Verification code has expired.';

        if ($request->wantsJson()) {
            return response()->json([
                'error' => $message
            ], 422);
        } else {
            return redirect()->back()->withErrors(['code' => $message]);
        }
    }
}
