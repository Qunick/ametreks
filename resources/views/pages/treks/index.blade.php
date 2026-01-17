@extends('layouts.app') {{-- Or your client layout --}}
@section('title','All Treks')

@section('content')
<section class="py-16 lg:py-20 bg-gradient-to-b from-white to-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-12 lg:mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#005991] text-white rounded-full text-sm font-semibold mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Explore {{ $treks->total() }} Adventures
            </div>
            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                Discover Your Next Adventure
            </h1>
            <p class="text-lg text-[#6D6E70] max-w-3xl mx-auto">
                Browse our collection of handpicked Himalayan treks, each offering unique experiences and breathtaking landscapes
            </p>
        </div>

        <!-- Filter and Search Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <form action="{{ request()->url() }}" method="GET" class="space-y-6">
                <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                    <!-- Search Input -->
                    <div class="relative flex-1 max-w-md">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" 
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Search treks by name or description..." 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#005991] focus:border-transparent">
                    </div>
                    
                    <!-- Filter Buttons -->
                    <div class="flex flex-wrap gap-3">
                        <button type="button" onclick="resetFilters()" 
                                class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                            Reset Filters
                        </button>
                        <button type="submit" 
                                class="px-6 py-2 bg-[#005991] text-white rounded-lg font-semibold hover:bg-[#052734] transition-colors">
                            Apply Filters
                        </button>
                    </div>
                </div>

                <!-- Filter Options Grid -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 pt-6 border-t border-gray-100">
                    <!-- Region Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            Region
                        </label>
                        <select name="region" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#005991] focus:border-transparent">
                            <option value="">All Regions</option>
                            @php
                                $regions = $treks->pluck('region')->unique()->filter()->sort();
                            @endphp
                            @foreach($regions as $region)
                                <option value="{{ $region }}" {{ request('region') == $region ? 'selected' : '' }}>
                                    {{ $region }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Difficulty Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.5 3.5l2.5 5-2.5 5h5l-2.5 5 2.5 5h-5l-2.5 5-2.5-5h-5l2.5-5-2.5-5h5z" />
                            </svg>
                            Difficulty
                        </label>
                        <select name="difficulty" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#005991] focus:border-transparent">
                            <option value="">All Difficulties</option>
                            <option value="Easy" {{ request('difficulty') == 'Easy' ? 'selected' : '' }}>Easy</option>
                            <option value="Moderate" {{ request('difficulty') == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                            <option value="Challenging" {{ request('difficulty') == 'Challenging' ? 'selected' : '' }}>Challenging</option>
                            <option value="Difficult" {{ request('difficulty') == 'Difficult' ? 'selected' : '' }}>Difficult</option>
                        </select>
                    </div>

                    <!-- Duration Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Duration
                        </label>
                        <select name="duration" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#005991] focus:border-transparent">
                            <option value="">Any Duration</option>
                            <option value="1-5" {{ request('duration') == '1-5' ? 'selected' : '' }}>1-5 Days</option>
                            <option value="6-10" {{ request('duration') == '6-10' ? 'selected' : '' }}>6-10 Days</option>
                            <option value="11-15" {{ request('duration') == '11-15' ? 'selected' : '' }}>11-15 Days</option>
                            <option value="16+" {{ request('duration') == '16+' ? 'selected' : '' }}>16+ Days</option>
                        </select>
                    </div>

                    <!-- Price Range -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Max Price
                        </label>
                        <select name="max_price" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#005991] focus:border-transparent">
                            <option value="">Any Price</option>
                            <option value="1000" {{ request('max_price') == '1000' ? 'selected' : '' }}>Under $1000</option>
                            <option value="2000" {{ request('max_price') == '2000' ? 'selected' : '' }}>Under $2000</option>
                            <option value="3000" {{ request('max_price') == '3000' ? 'selected' : '' }}>Under $3000</option>
                            <option value="5000" {{ request('max_price') == '5000' ? 'selected' : '' }}>Under $5000</option>
                        </select>
                    </div>
                </div>

                <!-- Active Filters Display -->
                @if(request()->anyFilled(['search', 'region', 'difficulty', 'duration', 'max_price']))
                <div class="pt-4 border-t border-gray-100">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        <span class="text-sm font-medium text-gray-700">Active Filters:</span>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @if(request('search'))
                        <span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full">
                            Search: "{{ request('search') }}"
                            <button type="button" onclick="removeFilter('search')" class="ml-1 hover:text-blue-600">
                                ×
                            </button>
                        </span>
                        @endif
                        @if(request('region'))
                        <span class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 text-green-800 text-sm rounded-full">
                            Region: {{ request('region') }}
                            <button type="button" onclick="removeFilter('region')" class="ml-1 hover:text-green-600">
                                ×
                            </button>
                        </span>
                        @endif
                        @if(request('difficulty'))
                        <span class="inline-flex items-center gap-1 px-3 py-1 bg-yellow-100 text-yellow-800 text-sm rounded-full">
                            Difficulty: {{ request('difficulty') }}
                            <button type="button" onclick="removeFilter('difficulty')" class="ml-1 hover:text-yellow-600">
                                ×
                            </button>
                        </span>
                        @endif
                        @if(request('duration'))
                        <span class="inline-flex items-center gap-1 px-3 py-1 bg-purple-100 text-purple-800 text-sm rounded-full">
                            Duration: {{ request('duration') }} days
                            <button type="button" onclick="removeFilter('duration')" class="ml-1 hover:text-purple-600">
                                ×
                            </button>
                        </span>
                        @endif
                        @if(request('max_price'))
                        <span class="inline-flex items-center gap-1 px-3 py-1 bg-red-100 text-red-800 text-sm rounded-full">
                            Max Price: ${{ request('max_price') }}
                            <button type="button" onclick="removeFilter('max_price')" class="ml-1 hover:text-red-600">
                                ×
                            </button>
                        </span>
                        @endif
                    </div>
                </div>
                @endif
            </form>
        </div>

        <!-- Results Count -->
        <div class="flex items-center justify-between mb-6">
            <div class="text-gray-600">
                <span class="font-semibold">{{ $treks->total() }}</span> treks found
                @if(request()->anyFilled(['search', 'region', 'difficulty', 'duration', 'max_price']))
                <span class="text-sm text-gray-500 ml-2">(filtered)</span>
                @endif
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600">Sort by:</span>
                <select onchange="sortTreks(this.value)" class="border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:ring-2 focus:ring-[#005991] focus:border-transparent">
                    <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>Featured</option>
                    <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                    <option value="duration_short" {{ request('sort') == 'duration_short' ? 'selected' : '' }}>Duration: Short to Long</option>
                    <option value="duration_long" {{ request('sort') == 'duration_long' ? 'selected' : '' }}>Duration: Long to Short</option>
                    <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                </select>
            </div>
        </div>

        <!-- Treks Grid -->
        @if($treks->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mb-8">
            @foreach($treks as $trek)
            <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('storage/'.$trek->main_image) }}" 
                         alt="{{ $trek->image_alt ?? $trek->title }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    
                    <!-- Difficulty Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-[#C9302C]/90 text-white text-xs font-bold rounded-full backdrop-blur-sm">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.5 3.5l2.5 5-2.5 5h5l-2.5 5 2.5 5h-5l-2.5 5-2.5-5h-5l2.5-5-2.5-5h5z" />
                            </svg>
                            {{ $trek->difficulty ?? 'Moderate' }}
                        </span>
                    </div>
                    
                    <!-- Price -->
                    <div class="absolute top-4 right-4">
                        <div class="bg-[#005991] text-white px-4 py-2 rounded-xl shadow-lg">
                            <span class="text-lg font-bold">{{ $trek->currency ?? '$' }}{{ number_format($trek->base_price, 2) }}</span>
                            <span class="text-xs opacity-90 ml-1">/ person</span>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-2">
                            <div class="flex text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                @endfor
                            </div>
                            <span class="text-sm font-semibold text-gray-900">{{ $trek->rating ?? '4.9' }}</span>
                            <span class="text-sm text-[#6D6E70]">({{ $trek->reviews_count ?? '342' }} reviews)</span>
                        </div>
                        <div class="flex items-center gap-1 text-[#005991]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm font-medium">{{ $trek->duration_days }} Days</span>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-600 mb-3 group-hover:text-[#005991] transition-colors">
                        {{ $trek->title }}
                    </h3>
                    
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-sm text-gray-600">{{ $trek->region }}</span>
                    </div>
                    
                    <p class="text-[#6D6E70] text-sm mb-5 leading-relaxed line-clamp-2">
                        {{ $trek->short_desc }}
                    </p>
                    
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="text-sm text-gray-500">
                            <span class="font-medium">Availability:</span> 
                            <span class="{{ ($trek->available_slots ?? 0) > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ ($trek->available_slots ?? 0) > 0 ? $trek->available_slots . ' slots' : 'Fully Booked' }}
                            </span>
                        </div>
                        <a href="{{ route('pages.treks.show', $trek->slug) }}" 
                           class="text-[#005991] font-medium hover:text-[#052734] transition-colors flex items-center gap-1 group">
                            View Details
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- No Results Message -->
        <div class="bg-white rounded-2xl shadow-lg p-12 text-center mb-8">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="text-xl font-bold text-gray-900 mb-2">No treks found</h3>
            <p class="text-gray-600 max-w-md mx-auto mb-6">
                We couldn't find any treks matching your criteria. Try adjusting your filters or search term.
            </p>
            <a href="{{ request()->url() }}" 
               class="inline-flex items-center gap-2 px-6 py-3 bg-[#005991] text-white font-semibold rounded-lg hover:bg-[#052734] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                Reset All Filters
            </a>
        </div>
        @endif

        <!-- Pagination -->
        @if($treks->hasPages())
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-sm text-gray-600">
                    Showing {{ $treks->firstItem() }} to {{ $treks->lastItem() }} of {{ $treks->total() }} treks
                </div>
                
                <nav class="flex items-center space-x-2">
                    {{ $treks->links('vendor.pagination.tailwind') }}
                </nav>
            </div>
        </div>
        @endif

        <!-- Trust Features -->
        <div class="mt-12 text-center">
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Why Book With Us</h3>
                <div class="flex flex-wrap justify-center gap-8 text-sm text-[#6D6E70]">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#99C723]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Certified Guides</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#99C723]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Best Price Guarantee</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#99C723]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Flexible Booking</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#99C723]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>24/7 Support</span>
                    </div>
                </div>
            </div>
            
            <a href="" 
               class="group inline-flex items-center gap-3 px-8 py-3.5 bg-[#005991] text-white font-semibold rounded-xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <span>Need Help Choosing?</span>
                <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>

<script>
function resetFilters() {
    // Clear all form inputs
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input, select');
    inputs.forEach(input => {
        if (input.type === 'text') input.value = '';
        if (input.type === 'select-one') input.selectedIndex = 0;
    });
    form.submit();
}

function removeFilter(filterName) {
    const url = new URL(window.location.href);
    url.searchParams.delete(filterName);
    window.location.href = url.toString();
}

function sortTreks(sortBy) {
    const url = new URL(window.location.href);
    url.searchParams.set('sort', sortBy);
    window.location.href = url.toString();
}

// Initialize Alpine.js or similar if needed
document.addEventListener('DOMContentLoaded', function() {
    // Add any interactive features here
    console.log('Trek listing page loaded');
});
</script>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Custom pagination styling */
.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}

.pagination li {
    margin: 0 2px;
}

.pagination li a,
.pagination li span {
    display: block;
    padding: 8px 12px;
    border-radius: 6px;
    border: 1px solid #e5e7eb;
    color: #4b5563;
    font-size: 14px;
    transition: all 0.2s;
}

.pagination li.active span {
    background-color: #005991;
    color: white;
    border-color: #005991;
}

.pagination li a:hover {
    background-color: #f3f4f6;
    border-color: #d1d5db;
}

.pagination li.disabled span {
    color: #9ca3af;
    cursor: not-allowed;
}

/* Smooth transitions for filter badges */
[onclick^="removeFilter"] {
    cursor: pointer;
    transition: color 0.2s;
}
</style>
@endsection