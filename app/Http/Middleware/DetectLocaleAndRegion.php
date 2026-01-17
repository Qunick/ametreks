<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DetectLocaleAndRegion
{
    public function handle($request, Closure $next)
{

    if (session()->has('locale')) {
        app()->setLocale(session('locale'));
        return $next($request);
    }

    if (function_exists('geoip')) {
        $location = geoip('91.212.120.0');
        // $location = geoip($request->ip());
        $countryCode = $location->iso_code ?? null;

        if ($countryCode && in_array($countryCode, config('arabic_countries'))) {
            app()->setLocale('ar');
            session(['locale' => 'ar', 'user_region' => 'arabic']);
            return $next($request);
        }
    }

    $browserLang = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
    if ($browserLang === 'ar') {
        app()->setLocale('ar');
        session(['locale' => 'ar', 'user_region' => 'arabic']);
    } else {
        app()->setLocale('en');
        session(['locale' => 'en', 'user_region' => 'global']);
    }

    return $next($request);
}

}

