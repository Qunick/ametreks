<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trek;
use App\Models\TrekItinerary;
use Illuminate\Http\Request;

class AdminTrekItineraryController extends Controller
{
    public function index(Trek $trek)
    {
        $itineraries = $trek->itineraries()->orderBy('day')->get();
        
        return view('admin.treks.itinerary', compact('trek', 'itineraries'));
    }

    public function store(Request $request, Trek $trek)
    {
        $request->validate([
            'day' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'altitude' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'meal' => 'nullable|string|max:100',
            'description' => 'required|string',
            'activities' => 'nullable|array',
            'pro_tip' => 'nullable|string|max:500',
            'highlight' => 'nullable|string|max:255',
            'overnight' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:100',
            'distance' => 'nullable|string|max:100',
        ]);

        $activities = $request->activities ? array_filter($request->activities) : null;

        TrekItinerary::create([
            'trek_id' => $trek->id,
            'day' => $request->day,
            'title' => $request->title,
            'altitude' => $request->altitude,
            'location' => $request->location,
            'meal' => $request->meal,
            'description' => $request->description,
            'activities' => $activities,
            'pro_tip' => $request->pro_tip,
            'highlight' => $request->highlight,
            'overnight' => $request->overnight,
            'duration' => $request->duration,
            'distance' => $request->distance
        ]);

        return redirect()->route('admin.treks.itinerary', $trek)
            ->with('success', 'Itinerary day added successfully.');
    }

    public function update(Request $request, Trek $trek, TrekItinerary $itinerary)
    {
        $request->validate([
            'day' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'altitude' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'meal' => 'nullable|string|max:100',
            'description' => 'required|string',
            'activities' => 'nullable|array',
            'pro_tip' => 'nullable|string|max:500',
            'highlight' => 'nullable|string|max:255',
            'overnight' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:100',
            'distance' => 'nullable|string|max:100'
        ]);

        $activities = $request->activities ? array_filter($request->activities) : null;

        $itinerary->update([
            'day' => $request->day,
            'title' => $request->title,
            'altitude' => $request->altitude,
            'location' => $request->location,
            'meal' => $request->meal,
            'description' => $request->description,
            'activities' => $activities,
            'pro_tip' => $request->pro_tip,
            'highlight' => $request->highlight,
            'overnight' => $request->overnight,
            'duration' => $request->duration,
            'distance' => $request->distance
        ]);

        return redirect()->route('admin.treks.itinerary', $trek)
            ->with('success', 'Itinerary updated successfully.');
    }

    public function destroy(Trek $trek, TrekItinerary $itinerary)
    {
        $itinerary->delete();

        return redirect()->route('admin.treks.itinerary', $trek)
            ->with('success', 'Itinerary day deleted successfully.');
    }
}