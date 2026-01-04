<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trek;
use App\Models\TrekItinerary;
use App\Models\TrekDeparture;
use App\Models\TrekGallery;
use Illuminate\Support\Str;

class AdminTrekController extends Controller
{
   
    public function index()
    {
        $treks = Trek::latest()->paginate(10);
        return view('admin.treks.index', compact('treks'));
    }

    // Show form to create trek
    public function create()
    {
        return view('admin.treks.create');
    }

    // Store new trek
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'base_price' => 'nullable|numeric',
            'slug' => 'nullable|unique:treks,slug',
            'main_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        // Upload main image
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('trek_images','public');
        }

        // Auto slug
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $trek = Trek::create($data);

        return redirect()->route('admin.treks.index')->with('success','Trek created successfully!');
    }

    // Show trek details in admin
    public function show(Trek $trek)
    {
        $trek->load(['itineraries','departures','galleries']);
        return view('admin.treks.show', compact('trek'));
    }

    // Edit trek
    public function edit(Trek $trek)
    {
        return view('admin.treks.edit', compact('trek'));
    }

    // Update trek
    public function update(Request $request, Trek $trek)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|unique:treks,slug,'.$trek->id,
            'base_price' => 'nullable|numeric',
            'main_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('trek_images','public');
        }

        // Auto slug if empty
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $trek->update($data);

        return redirect()->route('admin.treks.index')->with('success','Trek updated successfully!');
    }

    // Delete trek
    public function destroy(Trek $trek)
    {
        $trek->delete();
        return redirect()->route('admin.treks.index')->with('success','Trek deleted successfully!');
    }
}
