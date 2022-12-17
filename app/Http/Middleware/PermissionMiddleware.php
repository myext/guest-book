<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response|RedirectResponse) $next
     * @param string $permission
     * @return JsonResponse|Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $permission)
    {
        if(!auth()->user()->hasPermission($permission)) {
            return response()->json('forbidden', 403);
        }

        return $next($request);
    }
}
