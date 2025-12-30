<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GreetingCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GreetingCardController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'text' => 'required|string|max:1000',
        ]);

        // Upload image
        $path = $request->file('image')->store('greeting_cards', 'public');

        // Save to DB
        GreetingCard::create([
            'image' => $path,
            'text' => $request->text,
        ]);

        return redirect()->back()->with('success', 'Greeting card added successfully!');
    }

    public function index()
    {
        $cards = GreetingCard::latest()->get();
        return view('admin.greeting-cards.index', compact('cards'));
    }
}
