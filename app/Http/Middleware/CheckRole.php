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
            \Log::info('CheckRole: User not authenticated');
            return redirect()->route('authPP.login');
        }

        $user = $request->user('authPP');

        // Parse roles - if first role contains comma, split it
        if (count($roles) === 1 && str_contains($roles[0], ',')) {
            $roles = explode(',', $roles[0]);
            $roles = array_map('trim', $roles);
        }

        \Log::info('CheckRole Debug', [
            'user_role' => $user->role,
            'required_roles' => $roles,
            'is_super_admin' => $user->role === 'super_admin'
        ]);

        // Always allow Super Admin
        if ($user->role === 'super_admin') {
            \Log::info('CheckRole: Super admin allowed');
            return $next($request);
        }

        // Check if user role is in the allowed roles
        if (in_array($user->role, $roles)) {
            \Log::info('CheckRole: Role matched');
            return $next($request);
        }

        // Specific checks for inheritance if roles were passed as shortcuts
        if (in_array('any', $roles)) {
            \Log::info('CheckRole: Any role allowed');
            return $next($request);
        }

        \Log::warning('CheckRole: Access denied', [
            'user_role' => $user->role,
            'required_roles' => $roles
        ]);

        // Unauthorized
        if ($request->ajax()) {
            return response()->json(['message' => 'Unauthorized action.'], 403);
        }

        abort(403, 'Akses Ditolak. Anda tidak memiliki izin untuk halaman ini.');
    }
}
