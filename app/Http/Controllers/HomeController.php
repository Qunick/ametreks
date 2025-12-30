<?php

namespace App\Http\Controllers;

use App\Models\GreetingCard;
use App\Models\HomeSetting;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display homepage
     */
    public function index()
    {
        // Get first (single) home settings row
         $siteSettings = SiteSetting::first();
        $card = GreetingCard::latest()->first();

            return view('pages.home', compact('siteSettings', 'card'));
    }
}
