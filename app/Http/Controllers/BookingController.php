<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Show the booking form.
     */
    public function create(Request $request)
    {
        // Demo trek options
        $treks = [
            ['id' => 1, 'title' => 'Everest Base Camp Trek', 'duration' => '14 Days', 'price' => '$1,500'],
            ['id' => 2, 'title' => 'Annapurna Circuit', 'duration' => '18 Days', 'price' => '$1,200'],
            ['id' => 3, 'title' => 'Langtang Valley Trek', 'duration' => '10 Days', 'price' => '$800'],
            ['id' => 4, 'title' => 'Manaslu Circuit Trek', 'duration' => '16 Days', 'price' => '$1,400'],
            ['id' => 5, 'title' => 'Upper Mustang Trek', 'duration' => '15 Days', 'price' => '$1,800'],
            ['id' => 6, 'title' => 'Poon Hill Trek', 'duration' => '5 Days', 'price' => '$450'],
        ];

        // Demo months for departure dates
        $months = [
            'March 2024', 'April 2024', 'May 2024', 
            'September 2024', 'October 2024', 'November 2024',
            'March 2025', 'April 2025', 'May 2025'
        ];

        // If trek ID is provided in query, pre-select it
        $selectedTrekId = $request->query('trek');

        return view('pages.booking.form', compact('treks', 'months', 'selectedTrekId'));
    }

    /**
     * Store a new booking.
     */
    public function store(Request $request)
    {
        // Demo validation (in real app, use Form Request)
        $validated = $request->validate([
            'trek_id' => 'required|integer',
            'group_size' => 'required|integer|min:1|max:20',
            'departure_date' => 'required|string',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'country' => 'required|string',
            'message' => 'nullable|string',
            'emergency_contact' => 'required|string',
            'dietary_requirements' => 'nullable|string',
            'terms' => 'required|accepted'
        ]);

        // In a real application, you would:
        // 1. Store booking in database
        // 2. Send confirmation emails
        // 3. Process payment if needed
        
        // For demo, we'll just redirect to confirmation
        $bookingId = 'TREK-' . rand(100000, 999999);
        
        return redirect()->route('booking.confirmation')
                        ->with('booking_id', $bookingId)
                        ->with('trek_name', $this->getTrekName($validated['trek_id']))
                        ->with('departure_date', $validated['departure_date'])
                        ->with('group_size', $validated['group_size']);
    }

    /**
     * Show booking confirmation.
     */
    public function confirmation()
    {
        // Check if we have booking data in session
        if (!session()->has('booking_id')) {
            return redirect()->route('booking.create');
        }

        $bookingData = [
            'booking_id' => session('booking_id'),
            'trek_name' => session('trek_name', 'Unknown Trek'),
            'departure_date' => session('departure_date', 'Not specified'),
            'group_size' => session('group_size', 1),
            'date' => now()->format('F j, Y'),
            'next_steps' => [
                'We will contact you within 24 hours to confirm details',
                'Payment instructions will be sent via email',
                'Complete pre-trek questionnaire within 7 days',
                'Attend virtual briefing 2 weeks before departure'
            ]
        ];

        return view('pages.booking.confirmation', compact('bookingData'));
    }

    /**
     * Helper method to get trek name by ID.
     */
    private function getTrekName($trekId)
    {
        $treks = [
            1 => 'Everest Base Camp Trek',
            2 => 'Annapurna Circuit',
            3 => 'Langtang Valley Trek',
            4 => 'Manaslu Circuit Trek',
            5 => 'Upper Mustang Trek',
            6 => 'Poon Hill Trek',
        ];

        return $treks[$trekId] ?? 'Unknown Trek';
    }
}