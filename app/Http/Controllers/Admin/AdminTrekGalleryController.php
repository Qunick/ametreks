<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trek;
use App\Models\TrekGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTrekGalleryController extends Controller
{
    public function index(Trek $trek)
    {
        $images = $trek->galleries()->orderBy('sort_order')->get();
        
        return view('admin.treks.images', compact('trek', 'images'));
    }

    public function store(Request $request, Trek $trek)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt_text.*' => 'nullable|string|max:255'
        ]);

        foreach ($request->file('images') as $key => $image) {
            $path = $image->store('trek-galleries', 'public');
            
            TrekGallery::create([
                'trek_id' => $trek->id,
                'image_path' => $path,
                'alt_text' => $request->alt_text[$key] ?? null,
                'sort_order' => $trek->galleries()->count()
            ]);
        }

        return redirect()->route('admin.treks.images', $trek)
            ->with('success', 'Images uploaded successfully.');
    }

    public function update(Request $request, Trek $trek, TrekGallery $image)
    {
        $request->validate([
            'alt_text' => 'nullable|string|max:255'
        ]);

        $image->update([
            'alt_text' => $request->alt_text
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy(Trek $trek, TrekGallery $image)
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return redirect()->route('admin.treks.images', $trek)
            ->with('success', 'Image deleted successfully.');
    }

    public function reorder(Request $request, Trek $trek)
    {
        $request->validate([
            'order' => 'required|array'
        ]);

        foreach ($request->order as $index => $id) {
            TrekGallery::where('id', $id)->update(['sort_order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}