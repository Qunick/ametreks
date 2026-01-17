<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trek;
use App\Models\TrekInclusion;
use Illuminate\Http\Request;

class AdminTrekInclusionController extends Controller
{
    public function index(Trek $trek)
    {
        $inclusions = $trek->inclusions()->orderBy('sort_order')->get();
        
        return view('admin.treks.inclusions', compact('trek', 'inclusions'));
    }

    public function store(Request $request, Trek $trek)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        TrekInclusion::create([
            'trek_id' => $trek->id,
            'title' => $request->title,
            'description' => $request->description,
            'sort_order' => $trek->inclusions()->count()
        ]);

        return redirect()->route('admin.treks.inclusions', $trek)
            ->with('success', 'Inclusion added successfully.');
    }

    public function destroy(Trek $trek, TrekInclusion $inclusion)
    {
        $inclusion->delete();

        return redirect()->route('admin.treks.inclusions', $trek)
            ->with('success', 'Inclusion deleted successfully.');
    }
}