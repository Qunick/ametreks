<?php
// app/Http/Controllers/ReviewController.php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Trek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReviewVerificationMail;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    // Show all reviews
    public function index()
    {
        // Get approved reviews with trek relationship
        $reviews = Review::with('trek')
            ->where('status', 'approved')
            ->whereNotNull('verified_at')
            ->latest()
            ->paginate(9);
        
        return view('pages.dropdown.company.ame-reviews', compact('reviews'));
    }

    // Store new review
    public function store(Request $request)
    {
        $validated = $request->validate([
            'trek_id' => 'nullable|exists:treks,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10|max:2000',
            'location' => 'nullable|string|max:255',
            'terms' => 'required|accepted'
        ]);

        // Check for existing unverified review
        $existingReview = Review::where('email', $validated['email'])
            ->when($validated['trek_id'], function($query, $trekId) {
                return $query->where('trek_id', $trekId);
            })
            ->whereNull('verified_at')
            ->first();

        if ($existingReview) {
            // Resend verification email
            Mail::to($existingReview->email)->send(new ReviewVerificationMail($existingReview));
            
            return response()->json([
                'success' => true,
                'message' => 'We sent you a verification email previously. Check your inbox!'
            ]);
        }

        // Create new review
        $review = Review::create([
            'trek_id' => $validated['trek_id'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'location' => $validated['location'],
            'verification_token' => Str::random(60),
            'status' => 'pending'
        ]);

        // Send verification email
        Mail::to($review->email)->send(new ReviewVerificationMail($review));

        return response()->json([
            'success' => true,
            'message' => 'Verification email sent! Please check your inbox.',
            'reviews_count' => Review::approved()->count()
        ]);
    }

    // Verify email
    public function verify($token)
    {
        $review = Review::where('verification_token', $token)->first();

        if (!$review) {
            return redirect('/reviews')->with('error', 'Invalid verification link.');
        }

        $review->update([
            'verified_at' => now(),
            'verification_token' => null
        ]);

        return redirect('/reviews')->with('success', 'Review verified! It will be published after approval.');
    }

    // Load more reviews via AJAX
    public function loadMore(Request $request)
    {
        $reviews = Review::with('trek')
            ->where('status', 'approved')
            ->whereNotNull('verified_at')
            ->latest()
            ->paginate(9, ['*'], 'page', $request->page);

        if ($request->ajax()) {
            $html = '';
            foreach ($reviews as $review) {
                $html .= view('partials.modal.review-modal', compact('review'))->render();
            }
            
            return response()->json([
                'html' => $html,
                'hasMore' => $reviews->hasMorePages()
            ]);
        }
        
        return back();
    }
}