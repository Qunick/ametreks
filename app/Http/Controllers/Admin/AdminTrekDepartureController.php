<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trek;
use App\Models\TrekDeparture;
use Illuminate\Http\Request;

class AdminTrekDepartureController extends Controller
{
    public function index(Trek $trek)
    {
        $departures = $trek->departures()->orderBy('departure_date')->get();
        
        return view('admin.treks.departures', compact('trek', 'departures'));
    }

    public function store(Request $request, Trek $trek)
    {
        $request->validate([
            'departure_date' => 'required|date|after_or_equal:today',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'spots_left' => 'nullable|integer|min:0',
            'status' => 'required|in:Available,Limited,Sold Out',
            'is_guaranteed' => 'boolean'
        ]);

        TrekDeparture::create([
            'trek_id' => $trek->id,
            'departure_date' => $request->departure_date,
            'price' => $request->price,
            'currency' => $request->currency,
            'spots_left' => $request->spots_left,
            'status' => $request->status,
            'is_guaranteed' => $request->boolean('is_guaranteed')
        ]);

        return redirect()->route('admin.treks.departures', $trek)
            ->with('success', 'Departure date added successfully.');
    }

    public function update(Request $request, Trek $trek, TrekDeparture $departure)
    {
        $request->validate([
            'departure_date' => 'required|date',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'spots_left' => 'nullable|integer|min:0',
            'status' => 'required|in:Available,Limited,Sold Out',
            'is_guaranteed' => 'boolean'
        ]);

        $departure->update([
            'departure_date' => $request->departure_date,
            'price' => $request->price,
            'currency' => $request->currency,
            'spots_left' => $request->spots_left,
            'status' => $request->status,
            'is_guaranteed' => $request->boolean('is_guaranteed')
        ]);

        return redirect()->route('admin.treks.departures', $trek)
            ->with('success', 'Departure date updated successfully.');
    }

    public function destroy(Trek $trek, TrekDeparture $departure)
    {
        $departure->delete();

        return redirect()->route('admin.treks.departures', $trek)
            ->with('success', 'Departure date deleted successfully.');
    }
}