<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Spatie\Permission\Exceptions\UnauthorizedException;

class Permission
{
    private array $exceptNames = [
        'LaravelInstaller*',
        'LaravelUpdater*',
        'debugbar*',
    ];

    private array $exceptControllers = [
        'AuthController',
    ];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('superadmin') || $user->hasRole('customer')) {
                return true;
            }
        });

        $permission = $request->route()->getName();

        if (auth()->check() && $permission && !auth()->user()->can($permission)) {
            //            if ($permission == '/') {
            //                return redirect(route('/'));
            //            }
            throw new UnauthorizedException(403, trans('error.permission').' <b>'.$permission.'</b>');
        }

        return $next($request);
    }

    private function match(\Illuminate\Routing\Route $route): bool
    {
        if ($route->getName() == '' || $route->getName() === null) {
            return false;
        } else {
            if (in_array(class_basename($route->getController()), $this->exceptControllers)) {
                return false;
            }
            foreach ($this->exceptNames as $except) {
                if (Str::is($except, $route->getName())) {
                    return false;
                }
            }
        }

        return true;
    }
}
