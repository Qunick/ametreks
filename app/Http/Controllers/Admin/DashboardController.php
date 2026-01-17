<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Destination;
use App\Models\HomeSetting;
use App\Models\SiteSetting;
use App\Models\Trek;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            // 'total_bookings' => Booking::count(),
            // 'total_revenue' => Booking::where('status', 'confirmed')->sum('total_price'),
            // 'active_tours' => Tour::where('status', 'active')->count(),
            'new_users' => User::where('created_at', '>=', now()->subDays(30))->count(),
            // 'total_destinations' => Destination::where('is_active', true)->count(),
            // 'pending_bookings' => Booking::where('status', 'pending')->count(),
        ];

        // $recentBookings = Booking::with(['user'])
        //     ->latest()
        //     ->take(10)
        //     ->get();

        // $topDestinations = Destination::withCount(['bookings' => function ($query) {
        //     $query->where('created_at', '>=', now()->subDays(30));
        // }])
        //     ->orderBy('bookings_count', 'desc')
        //     ->take(5)
        //     ->get();
          $treks = Trek::with(['tags', 'galleries'])
                 ->withCount(['bookings', 'galleries'])
                 ->latest()
                 ->paginate(10);
    
    $totalTours = Trek::count();
    $activeTours = Trek::where('is_active', true)->count();
    // $totalBookings = Booking::count();
    
    return view('admin.dashboard', compact('treks', 'totalTours', 'activeTours'));
        $siteSettings = SiteSetting::getSettings();
        // $homeSettings = HomeSetting::getSettings();

        // return view('admin.dashboard', compact('siteSettings'));
    }
}