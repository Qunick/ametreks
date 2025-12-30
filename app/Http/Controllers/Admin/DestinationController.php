<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $query = Destination::query();

        // Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('country', 'like', '%' . $request->search . '%')
                  ->orWhere('city', 'like', '%' . $request->search . '%');
        }

        // Filter by country
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'featured') {
                $query->where('is_featured', true);
            } elseif ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $destinations = $query->latest()->paginate(15);

        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('admin.destinations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:destinations',
            'description' => 'required|string',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('destinations', 'public');
            $validated['featured_image'] = $path;
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('destinations/gallery', 'public');
                    $galleryPaths[] = $path;
                }
            }
            $validated['gallery'] = json_encode($galleryPaths);
        }

        // Set default values
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        Destination::create($validated);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination created successfully!');
    }

    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:destinations,slug,' . $destination->id,
            'description' => 'required|string',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($destination->featured_image) {
                Storage::disk('public')->delete($destination->featured_image);
            }
            
            $path = $request->file('featured_image')->store('destinations', 'public');
            $validated['featured_image'] = $path;
        } else {
            $validated['featured_image'] = $destination->featured_image;
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery')) {
            // Delete old gallery images if exists
            $oldGallery = json_decode($destination->gallery, true) ?? [];
            foreach ($oldGallery as $oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
            
            $galleryPaths = [];
            foreach ($request->file('gallery') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('destinations/gallery', 'public');
                    $galleryPaths[] = $path;
                }
            }
            $validated['gallery'] = json_encode($galleryPaths);
        } else {
            $validated['gallery'] = $destination->gallery;
        }

        // Set boolean values
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        $destination->update($validated);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination updated successfully!');
    }

    public function destroy(Destination $destination)
    {
        // Delete images
        if ($destination->featured_image) {
            Storage::disk('public')->delete($destination->featured_image);
        }
        
        $gallery = json_decode($destination->gallery, true) ?? [];
        foreach ($gallery as $image) {
            Storage::disk('public')->delete($image);
        }
        
        $destination->delete();

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination deleted successfully!');
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:delete,activate,deactivate,feature,unfeature',
            'ids' => 'required|array',
            'ids.*' => 'exists:destinations,id',
        ]);

        $destinations = Destination::whereIn('id', $request->ids)->get();

        foreach ($destinations as $destination) {
            switch ($request->action) {
                case 'delete':
                    $destination->delete();
                    break;
                case 'activate':
                    $destination->update(['is_active' => true]);
                    break;
                case 'deactivate':
                    $destination->update(['is_active' => false]);
                    break;
                case 'feature':
                    $destination->update(['is_featured' => true]);
                    break;
                case 'unfeature':
                    $destination->update(['is_featured' => false]);
                    break;
            }
        }

        $message = match($request->action) {
            'delete' => 'Destinations deleted successfully!',
            'activate' => 'Destinations activated successfully!',
            'deactivate' => 'Destinations deactivated successfully!',
            'feature' => 'Destinations marked as featured!',
            'unfeature' => 'Destinations removed from featured!',
        };

        return redirect()->back()->with('success', $message);
    }
}