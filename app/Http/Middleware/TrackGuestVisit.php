<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Torann\GeoIP\Facades\GeoIP;
use Illuminate\Support\Facades\Auth;

class TrackGuestVisit
{
    public function handle(Request $request, Closure $next)
{
    // Only track GET requests from guests
    if ($request->isMethod('get') && !Auth::check()) {
        if (!str_starts_with($request->path(), 'admin') 
            && !str_ends_with($request->path(), '.svg')
            && !str_ends_with($request->path(), '.css')
            && !str_ends_with($request->path(), '.js')) {

            $location = geoip($request->ip());

            activity('page_visit')
                ->causedBy(null)
                ->withProperties([
                    'ip' => $request->ip(),
                    'country' => $location->country,
                    'iso_code' => $location->iso_code,
                    'city' => $location->city,
                    'page' => $request->fullUrl(),
                    'user_agent' => $request->userAgent(),
                ])
                ->log('Guest visited page');
        }
    }

    return $next($request);
}


}
