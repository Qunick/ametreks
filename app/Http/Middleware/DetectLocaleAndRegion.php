<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use GeoIP;

class DetectLocaleAndRegion
{
    public function handle(Request $request, Closure $next)
    {
        // Skip admin pages
        if ($request->is('admin/*')) {
            return $next($request);
        }

        // Only set locale once per session
        if (!session()->has('locale')) {
            $ip = $request->ip();

            // // Fallback for localhost testing
            // if ($ip === '127.0.0.1' || $ip === '::1') {
            //     $ip = config('geoip.default_location.ip'); 
            // }

            try {
                $location = geoip($ip);
            } catch (\Exception $e) {
                logger('GeoIP failed: '.$e->getMessage());
                $location = (object) config('geoip.default_location');
            }

            logger('Detected location: ', (array) $location);

            // Check Arabic countries
            $countryCode = $location->iso_code ?? 'NP';
            if ($countryCode && in_array($countryCode, config('arabic_countries'))) {
                app()->setLocale('ar');
                session(['locale' => 'ar', 'user_region' => 'arabic']);
            } else {
                app()->setLocale('en');
                session(['locale' => 'en', 'user_region' => 'global']);
            }
        }

        return $next($request);
    }
}
