<?php
// app/Http/Controllers/Admin/ReviewController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    // Show all reviews
    public function index(Request $request)
    {
        $query = Review::with('trek')->latest();

        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $reviews = $query->paginate(20);

        return view('admin.reviews.index', compact('reviews'));
    }

    // Update review status
    public function updateStatus(Request $request, Review $review)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $review->update(['status' => $request->status]);

        return back()->with('success', 'Review status updated.');
    }

    // Delete review
    public function destroy(Review $review)
    {
        $review->delete();
        return back()->with('success', 'Review deleted.');
    }
}