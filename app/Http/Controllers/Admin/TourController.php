<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $query = Tour::with('destination');

        // Search
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Filter by destination
        if ($request->filled('destination_id')) {
            $query->where('destination_id', $request->destination_id);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $tours = $query->latest()->paginate(15);
        $destinations = Destination::where('is_active', true)->get();

        return view('admin.tours.index', compact('tours', 'destinations'));
    }

    public function create()
    {
        $destinations = Destination::where('is_active', true)->get();
        return view('admin.tours.create', compact('destinations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tours',
            'description' => 'required|string',
            'duration_days' => 'required|integer|min:1',
            'duration_nights' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'max_participants' => 'required|integer|min:1',
            'min_participants' => 'required|integer|min:1',
            'departure_date' => 'required|date',
            'return_date' => 'required|date|after:departure_date',
            'meeting_point' => 'required|string|max:255',
            'inclusions' => 'required|array',
            'exclusions' => 'nullable|array',
            'itinerary' => 'required|array',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'status' => 'required|in:draft,published,archived',
            'is_featured' => 'boolean',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('tours', 'public');
            $validated['featured_image'] = $path;
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('tours/gallery', 'public');
                    $galleryPaths[] = $path;
                }
            }
            $validated['gallery'] = $galleryPaths;
        }

        // Set default values
        $validated['is_featured'] = $request->has('is_featured');
        $validated['current_participants'] = 0;

        Tour::create($validated);

        return redirect()->route('admin.tours.index')
            ->with('success', 'Tour created successfully!');
    }

    public function edit(Tour $tour)
    {
        $destinations = Destination::where('is_active', true)->get();
        return view('admin.tours.edit', compact('tour', 'destinations'));
    }

    public function update(Request $request, Tour $tour)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tours,slug,' . $tour->id,
            'description' => 'required|string',
            'duration_days' => 'required|integer|min:1',
            'duration_nights' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'max_participants' => 'required|integer|min:1',
            'min_participants' => 'required|integer|min:1',
            'departure_date' => 'required|date',
            'return_date' => 'required|date|after:departure_date',
            'meeting_point' => 'required|string|max:255',
            'inclusions' => 'required|array',
            'exclusions' => 'nullable|array',
            'itinerary' => 'required|array',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'status' => 'required|in:draft,published,archived',
            'is_featured' => 'boolean',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($tour->featured_image) {
                Storage::disk('public')->delete($tour->featured_image);
            }
            
            $path = $request->file('featured_image')->store('tours', 'public');
            $validated['featured_image'] = $path;
        } else {
            $validated['featured_image'] = $tour->featured_image;
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery')) {
            // Delete old gallery images if exists
            $oldGallery = $tour->gallery ?? [];
            foreach ($oldGallery as $oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
            
            $galleryPaths = [];
            foreach ($request->file('gallery') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('tours/gallery', 'public');
                    $galleryPaths[] = $path;
                }
            }
            $validated['gallery'] = $galleryPaths;
        } else {
            $validated['gallery'] = $tour->gallery;
        }

        // Set boolean values
        $validated['is_featured'] = $request->has('is_featured');

        $tour->update($validated);

        return redirect()->route('admin.tours.index')
            ->with('success', 'Tour updated successfully!');
    }

    public function destroy(Tour $tour)
    {
        // Delete images
        if ($tour->featured_image) {
            Storage::disk('public')->delete($tour->featured_image);
        }
        
        $gallery = $tour->gallery ?? [];
        foreach ($gallery as $image) {
            Storage::disk('public')->delete($image);
        }
        
        $tour->delete();

        return redirect()->route('admin.tours.index')
            ->with('success', 'Tour deleted successfully!');
    }
}