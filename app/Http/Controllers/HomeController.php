<?php

namespace App\Http\Controllers;

use App\Models\GreetingCard;
use App\Models\SiteSetting;
use App\Models\Trek;
use App\Models\Review;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display homepage
     */
    public function index()
    {
         $siteSettings = SiteSetting::first();
         $card = GreetingCard::latest()->first();
         $trek = Trek::where('is_active', true)->latest()->take(5)->get();
         $reviews = Review::where('status', 'approved')->latest()->take(5)->get();
         return view('pages.home', compact('siteSettings', 'card', 'trek', 'reviews'));
    }
}
