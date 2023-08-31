<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\Listing;
use App\Models\Scopes\ActiveCategoryScope;
use App\Models\Scopes\ActiveListingAuctionFirstScope;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnableDisplayScopesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Category::addGlobalScope(new ActiveCategoryScope());
        Listing::addGlobalScope(new ActiveListingAuctionFirstScope());
        return $next($request);
    }
}
