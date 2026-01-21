<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Torann\GeoIP\Facades\GeoIP;

class TrackingController extends Controller
{
    public function pageVisit(Request $request)
    {
        $location = GeoIP::get($request->ip());

        activity('page_visit')
            ->causedBy(null)
            ->withProperties([
                'visitor_id' => $request->visitor_id,
                'page' => $request->page,
                'referrer' => $request->referrer,
                'ip' => $request->ip(),
                'country' => $location->country,
                'iso_code' => $location->iso_code,
                'city' => $location->city,
                'user_agent' => $request->userAgent(),
            ])
            ->log('Guest visited page');

        return response()->json(['status' => 'ok']);
    }

    public function pageDuration(Request $request)
    {
        activity('page_duration')
            ->causedBy(null)
            ->withProperties([
                'visitor_id' => $request->visitor_id,
                'page' => $request->page,
                'duration_seconds' => $request->duration,
            ])
            ->log('Guest spent time on page');

        return response()->json(['status' => 'ok']);
    }

    public function pageSwitch(Request $request)
    {
        activity('page_switch')
            ->causedBy(null)
            ->withProperties([
                'visitor_id' => $request->visitor_id,
                'from' => $request->from,
                'to' => $request->to,
            ])
            ->log('Guest switched page');

        return response()->json(['status' => 'ok']);
    }
}


