<?php
// app/Mail/ReviewVerificationMail.php

namespace App\Mail;

use App\Models\Review;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReviewVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function build()
    {
        return $this->subject('Verify Your Trek Review')
            ->markdown('emails.review-verification')
            ->with([
                'verificationUrl' => route('reviews.verify', $this->review->verification_token)
            ]);
    }
}