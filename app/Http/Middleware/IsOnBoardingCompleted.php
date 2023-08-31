<?php

namespace App\Http\Middleware;

use App\Helpers\GlobalHelper;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsOnBoardingCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return RedirectResponse|Response
     */
    public function handle(Request $request, Closure $next): RedirectResponse|Response
    {
        $user = GlobalHelper::getUser();

        if (!$user || $user->userProfile?->onboarding_step >= 4) {
            return $next($request);
        }
        return redirect()->route('onboarding.index');
    }
}
