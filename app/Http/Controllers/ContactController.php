<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display the contact form.
     */
    public function index()
    {
        // Demo contact information
        $contactInfo = [
            'address' => 'Thamel, Kathmandu 44600, Nepal',
            'phone' => '+977-1-1234567',
            'email' => 'info@trekadventures.com',
            'whatsapp' => '+977-9801234567',
            'office_hours' => 'Sun - Fri: 9:00 AM - 6:00 PM',
            'emergency_contact' => '+977-9801234567 (24/7)'
        ];

        // Demo team members
        $team = [
            [
                'name' => 'Rajesh Thapa',
                'position' => 'Operations Manager',
                'email' => 'rajesh@trekadventures.com',
                'phone' => '+977-9801234568',
                'image' => '/images/team/rajesh.jpg'
            ],
            [
                'name' => 'Mingma Sherpa',
                'position' => 'Head Guide',
                'email' => 'mingma@trekadventures.com',
                'phone' => '+977-9801234569',
                'image' => '/images/team/mingma.jpg'
            ],
            [
                'name' => 'Sarah Johnson',
                'position' => 'Customer Support',
                'email' => 'sarah@trekadventures.com',
                'phone' => '+977-9801234570',
                'image' => '/images/team/sarah.jpg'
            ]
        ];

        return view('pages.contact', compact('contactInfo', 'team'));
    }

    /**
     * Handle contact form submission.
     */
    public function store(Request $request)
    {
        // Demo validation (in real app, use Form Request)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'trek_interest' => 'nullable|string',
            'preferred_contact' => 'nullable|in:email,phone,whatsapp'
        ]);

        // In a real application, you would:
        // 1. Store message in database
        // 2. Send email notification to admin
        // 3. Send auto-reply to the sender
        
        // For demo, we'll just redirect with success message
        $messageId = 'MSG-' . rand(100000, 999999);
        
        return redirect()->route('contact')
                        ->with('success', 'Thank you for your message! We will get back to you within 24 hours.')
                        ->with('message_id', $messageId);
    }
}