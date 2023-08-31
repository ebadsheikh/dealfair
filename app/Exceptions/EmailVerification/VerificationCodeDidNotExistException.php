<?php

namespace App\Exceptions\EmailVerification;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class VerificationCodeDidNotExistException extends Exception
{
    public function render(Request $request): JsonResponse|RedirectResponse
    {
        $message = 'The verification code did not exist.';

        if ($request->wantsJson()) {
            return response()->json([
                'error' => $message
            ], 422);
        } else {
            return redirect()->back()->withErrors(['code' => $message]);
        }
    }
}
