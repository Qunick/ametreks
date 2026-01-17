<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trek;
use App\Models\TrekExclusion;
use Illuminate\Http\Request;

class AdminTrekExclusionController extends Controller
{
    public function index(Trek $trek)
    {
        $exclusions = $trek->exclusions()->orderBy('sort_order')->get();
        
        return view('admin.treks.exclusions', compact('trek', 'exclusions'));
    }

    public function store(Request $request, Trek $trek)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        TrekExclusion::create([
            'trek_id' => $trek->id,
            'title' => $request->title,
            'description' => $request->description,
            'sort_order' => $trek->exclusions()->count()
        ]);

        return redirect()->route('admin.treks.exclusions', $trek)
            ->with('success', 'Exclusion added successfully.');
    }

    public function destroy(Trek $trek, TrekExclusion $exclusion)
    {
        $exclusion->delete();

        return redirect()->route('admin.treks.exclusions', $trek)
            ->with('success', 'Exclusion deleted successfully.');
    }
}