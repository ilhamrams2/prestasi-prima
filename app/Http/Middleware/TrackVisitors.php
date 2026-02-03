<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\prestasiprima\Visitor;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Don't track admin requests
        if ($request->is('prestasiprima/admin*')) {
            return $next($request);
        }

        // Simpler tracking: unique IP per day
        $ip = $request->ip();
        $today = today();

        try {
            // Check if this IP already visited today
            $exists = Visitor::where('ip_address', $ip)
                ->where('visit_date', $today)
                ->exists();

            if (!$exists) {
                // Determine device type
                $userAgent = strtolower($request->userAgent());
                $deviceType = 'desktop';
                if (strpos($userAgent, 'mobile') !== false) {
                    $deviceType = 'mobile';
                } elseif (strpos($userAgent, 'tablet') !== false || strpos($userAgent, 'ipad') !== false) {
                    $deviceType = 'tablet';
                }

                Visitor::create([
                    'ip_address' => $ip,
                    'page_url' => $request->fullUrl(),
                    'referrer' => $request->header('referer'),
                    'user_agent' => $request->userAgent(),
                    'device_type' => $deviceType,
                    'visit_date' => $today,
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Visitor tracking error: ' . $e->getMessage());
        }

        return $next($request);
    }
}
