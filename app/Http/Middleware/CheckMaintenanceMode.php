<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\prestasiprima\SiteSetting;
use Illuminate\Support\Facades\Auth;

class CheckMaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // 1. Check if maintenance mode is enabled
        $isMaintenance = SiteSetting::get('maintenance_mode', '0');

        if ($isMaintenance == '1') {
            // 2. Allow access ONLY for admin panel and auth routes
            if ($request->is('prestasiprima/admin*') || 
                $request->is('authPP*')) {
                return $next($request);
            }

            // 3. Otherwise, show maintenance page
            return response()->view('errors.maintenance', [], 503);
        }

        return $next($request);
    }
}
