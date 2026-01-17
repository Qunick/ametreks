<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trek;

class TrekController extends Controller
{
    // List all active treks
    public function index()
    {
        $treks = Trek::with('departures')->where('is_active', true)->latest()->paginate(12);
        return view('pages.treks.index', compact('treks'));
    }

    // Show single trek detail by slug
    public function show($slug)
    {
        $trek = Trek::with(['itineraries','departures','galleries'])
                     ->where('slug', $slug)
                     ->where('is_active', true)
                     ->firstOrFail();

        // SEO meta
        $meta_title = $trek->meta_title ?? $trek->title;
        $meta_description = $trek->meta_description ?? $trek->short_desc;
        $meta_keywords = $trek->meta_keywords ?? '';

        return view('pages.treks.show', compact('trek','meta_title','meta_description','meta_keywords'));
    }
}
