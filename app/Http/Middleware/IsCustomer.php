<?php

namespace App\Http\Middleware;

use App\Enums\RolesEnum;
use App\Helpers\GlobalHelper;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsCustomer
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
        if (GlobalHelper::getUser()?->hasRole(RolesEnum::CUSTOMER->value)) {
            return $next($request);
        }
        session(['intendedRoute' => url()->current()]);
        return redirect()->route('auth.signin');
    }
}
