<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = Review::with(['user', 'tour.destination']);

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('comment', 'like', '%' . $request->search . '%')
                  ->orWhereHas('user', function ($q) use ($request) {
                      $q->where('name', 'like', '%' . $request->search . '%');
                  })
                  ->orWhereHas('tour', function ($q) use ($request) {
                      $q->where('title', 'like', '%' . $request->search . '%');
                  });
            });
        }

        // Filter by rating
        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $reviews = $query->latest()->paginate(20);

        return view('admin.reviews.index', compact('reviews'));
    }

    public function approve(Review $review)
    {
        $review->update(['status' => 'approved']);

        return redirect()->back()
            ->with('success', 'Review approved successfully!');
    }

    public function reject(Review $review)
    {
        $review->update(['status' => 'rejected']);

        return redirect()->back()
            ->with('success', 'Review rejected successfully!');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review deleted successfully!');
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:approve,reject,delete',
            'ids' => 'required|array',
            'ids.*' => 'exists:reviews,id',
        ]);

        $reviews = Review::whereIn('id', $request->ids)->get();

        foreach ($reviews as $review) {
            switch ($request->action) {
                case 'approve':
                    $review->update(['status' => 'approved']);
                    break;
                case 'reject':
                    $review->update(['status' => 'rejected']);
                    break;
                case 'delete':
                    $review->delete();
                    break;
            }
        }

        $message = match($request->action) {
            'approve' => 'Reviews approved successfully!',
            'reject' => 'Reviews rejected successfully!',
            'delete' => 'Reviews deleted successfully!',
        };

        return redirect()->back()->with('success', $message);
    }
}