<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trek;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminTrekTagController extends Controller
{
    public function index(Trek $trek)
    {
        // Eager load the tags relationship
        $trek->load('tags');
        
        // Get all tags
        $tags = Tag::orderBy('name')->get();
        
        // Get tags for this trek
        $trekTags = $trek->tags;
        
        return view('admin.treks.tags', compact('trek', 'tags', 'trekTags'));
    }

    public function store(Request $request, Trek $trek)
    {
        // If creating a NEW tag (from the modal form)
        if ($request->has('name') && !$request->has('tag_id')) {
            $request->validate([
                'name' => 'required|string|max:255|unique:tags,name',
                'color' => ['required', 'string', 'max:7', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
                // 'icon' => 'nullable|string|max:50',
                // 'description' => 'nullable|string|max:500'
            ]);

            // Create new tag
            $tag = Tag::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'color' => $request->color,
                // 'icon' => $request->icon ?? 'fas fa-tag',
                // 'description' => $request->description
            ]);

            // Attach the newly created tag to the trek
            $trek->tags()->attach($tag->id);

            return redirect()->route('admin.treks.tags', $trek)
                ->with('success', 'New tag created and added to tour successfully.');
        }
        
        // If attaching an EXISTING tag (from the available tags list)
        $request->validate([
            'tag_id' => 'required|exists:tags,id'
        ]);

        // Check if tag is already attached
        if (!$trek->tags()->where('tag_id', $request->tag_id)->exists()) {
            $trek->tags()->attach($request->tag_id);
            
            return redirect()->route('admin.treks.tags', $trek)
                ->with('success', 'Tag added successfully.');
        }
        
        return redirect()->route('admin.treks.tags', $trek)
            ->with('info', 'Tag is already attached to this tour.');
    }

    public function destroy(Trek $trek, Tag $tag)
    {
        $trek->tags()->detach($tag->id);

        return redirect()->route('admin.treks.tags', $trek)
            ->with('success', 'Tag removed from tour successfully.');
    }
}