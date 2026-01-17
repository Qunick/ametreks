{{-- resources/views/emails/review-verification.blade.php --}}
<x-mail::message>
# Verify Your Review

Hello {{ $review->name }},

Thank you for reviewing "{{ $review->trek->name }}".

Please click the button below to verify your email address and submit your review for approval.

<x-mail::button :url="$verificationUrl">
Verify Review
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>