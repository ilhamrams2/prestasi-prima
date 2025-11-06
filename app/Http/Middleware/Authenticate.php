<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // If the incoming request is for presmaboard area, redirect to presmaboard login
            if ($request->is('presmaboard') || $request->is('presmaboard/*') || str_starts_with($request->route()?->getName() ?? '', 'presmaboard.')) {
                return route('presmaboard.login');
            }

            return route('login');
        }
    }

}
