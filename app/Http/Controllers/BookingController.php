<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'trek_name' => 'required|string|max:255',
            'is_offer' => 'boolean',
            'is_private' => 'boolean',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'nationality' => 'required|string|max:100',
            'passport_number' => 'required|string|max:50',
            'date_of_birth' => 'required|date',
            'passport_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'preferred_date' => 'required|date',
            'group_size' => 'required|integer|min:1|max:12',
            'special_requests' => 'nullable|string',
            'total_amount' => 'required|numeric|min:0',
        ]);

        try {
            // Handle passport photo upload
            $photoPath = $request->file('passport_photo')->store('passport-photos', 'public');

            // Create booking
            $booking = Booking::create([
                'trek_name' => $validated['trek_name'],
                'is_offer' => $validated['is_offer'] ?? false,
                'is_private' => $validated['is_private'] ?? false,
                'full_name' => $validated['full_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'nationality' => $validated['nationality'],
                'passport_number' => $validated['passport_number'],
                'date_of_birth' => $validated['date_of_birth'],
                'passport_photo_path' => $photoPath,
                'preferred_date' => $validated['preferred_date'],
                'group_size' => $validated['group_size'],
                'special_requests' => $validated['special_requests'],
                'total_amount' => $validated['total_amount'],
                'status' => 'pending', // Initial status
            ]);

            // Return booking details for confirmation modal
            return response()->json([
                'success' => true,
                'booking' => $booking,
                'message' => 'Booking created successfully. Please confirm to proceed with payment.'
            ]);

        } catch (\Exception $e) {
            Log::error('Booking creation error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error creating booking: ' . $e->getMessage()
            ], 422);
        }
    }

    public function confirmPayment(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'agreement' => 'required|accepted'
        ]);

        try {
            $booking = Booking::findOrFail($request->booking_id);

            // Update booking status to payment_pending
            $booking->update([
                'status' => 'payment_pending'
            ]);

            // Return data for redirecting to old payment page
            // The old page expects: price, userDefined1, userDefined2, productDesc
            return response()->json([
                'success' => true,
                'message' => 'Proceeding to payment gateway',
                'redirect_data' => [
                    'price' => $booking->total_amount,
                    'userDefined1' => $booking->full_name,
                    'userDefined2' => $booking->email . '|' . $booking->phone . '|' . $booking->id,
                    'productDesc' => $booking->trek_name . ' - ' . $booking->group_size . ' person(s)',
                    'booking_id' => $booking->id
                ],
                'payment_url' => env('OLD_PAYMENT_PAGE_URL', '/payment-confirmation.php'),
                'transaction_id' => 'PENDING-' . $booking->id
            ]);

        } catch (\Exception $e) {
            Log::error('Payment confirmation error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error processing payment: ' . $e->getMessage()
            ], 422);
        }
    }

    public function showConfirmation($bookingNumber)
    {
        $booking = Booking::where('booking_number', $bookingNumber)->firstOrFail();
        
        return view('bookings.confirmation', compact('booking'));
    }

    // Callback from old payment gateway
    public function paymentCallback(Request $request)
    {
        try {
            $bookingId = $request->input('userDefined2');
            $invoiceNo = $request->input('invoiceNo');
            $respCode = $request->input('respCode');
            $transactionRef = $request->input('transactionRef');
            $approvalCode = $request->input('approvalCode');

            $booking = Booking::findOrFail($bookingId);

            if ($respCode == '0000') {
                // Payment successful
                $booking->update([
                    'status' => 'confirmed',
                    'payment_status' => 'completed',
                    'payment_gateway' => 'Himalayan Bank (2C2P)',
                    'transaction_id' => $transactionRef,
                    'approval_code' => $approvalCode,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Payment successful',
                    'booking' => $booking
                ]);
            } else {
                // Payment failed
                $booking->update([
                    'status' => 'payment_failed',
                    'payment_status' => 'failed',
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Payment failed with code: ' . $respCode
                ], 422);
            }

        } catch (\Exception $e) {
            Log::error('Payment callback error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error processing callback: ' . $e->getMessage()
            ], 422);
        }
    }
}