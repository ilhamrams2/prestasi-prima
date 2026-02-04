<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!$request->user('authPP')) {
            return redirect()->route('authPP.login');
        }

        $user = $request->user('authPP');

        // Always allow Super Admin
        if ($user->role === 'super_admin') {
            return $next($request);
        }

        // Check if user role is in the allowed roles
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // Specific checks for inheritance if roles were passed as shortcuts
        if (in_array('any', $roles)) {
            return $next($request);
        }

        // Unauthorized
        if ($request->ajax()) {
            return response()->json(['message' => 'Unauthorized action.'], 403);
        }

        abort(403, 'Akses Ditolak. Anda tidak memiliki izin untuk halaman ini.');
    }
}
