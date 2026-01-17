{{-- resources/views/partials/review-card.blade.php --}}
<div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
    <!-- Review Header -->
    <div class="flex items-start justify-between mb-4">
        <div class="flex items-center space-x-3">
            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center">
                <span class="font-semibold text-blue-600">{{ substr($review->name, 0, 1) }}</span>
            </div>
            <div>
                <h4 class="font-semibold text-gray-900">{{ $review->name }}</h4>
                @if($review->location)
                <p class="text-sm text-gray-500">{{ $review->location }}</p>
                @endif
            </div>
        </div>
        @if($review->verified_at)
        <span class="inline-flex items-center px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">
            <i class="fas fa-check-circle mr-1"></i>
            Verified
        </span>
        @endif
    </div>
    
    <!-- Rating -->
    <div class="flex items-center mb-4">
        <div class="flex">
            @for($i = 1; $i <= 5; $i++)
                @if($i <= $review->rating)
                    <i class="fas fa-star text-yellow-400"></i>
                @else
                    <i class="far fa-star text-gray-300"></i>
                @endif
            @endfor
        </div>
        <span class="text-sm text-gray-600 ml-2">{{ $review->created_at->diffForHumans() }}</span>
    </div>
    
    <!-- Review Content -->
    <p class="text-gray-700 mb-4">{{ $review->comment }}</p>
    
    <!-- Trek Info -->
    @if($review->trek)
    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
        <div class="flex items-center space-x-2">
            <div class="w-10 h-10 rounded-lg bg-gray-100 overflow-hidden">
                @if($review->trek->featured_image)
                <img src="{{ asset('storage/' . $review->trek->featured_image) }}" 
                     alt="{{ $review->trek->name }}" 
                     class="w-full h-full object-cover">
                @else
                <div class="w-full h-full bg-gradient-to-br from-blue-50 to-indigo-50 flex items-center justify-center">
                    <i class="fas fa-mountain text-gray-400"></i>
                </div>
                @endif
            </div>
            <span class="text-sm font-medium text-gray-900">{{ $review->trek->name }}</span>
        </div>
    </div>
    @endif
</div>