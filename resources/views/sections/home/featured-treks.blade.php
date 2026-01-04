<section class="py-16 lg:py-20 bg-gradient-to-b from-white to-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 lg:mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#005991] text-white rounded-full text-sm font-semibold mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                Trending Adventures
            </div>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                Discover Featured Treks</span>
            </h2>
            <p class="text-lg text-[#6D6E70] max-w-3xl mx-auto">
                Handpicked Himalayan adventures that promise unforgettable experiences and breathtaking views
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1626429324105-3ac1d2c8d7e2?w=800&auto=format&fit=crop&q=80" 
                         alt="Everest Base Camp Trek" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    <div class="absolute top-4 left-4">
                        <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-[#C9302C]/90 text-white text-xs font-bold rounded-full backdrop-blur-sm">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.5 3.5l2.5 5-2.5 5h5l-2.5 5 2.5 5h-5l-2.5 5-2.5-5h-5l2.5-5-2.5-5h5z" />
                            </svg>
                            Challenging
                        </span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <div class="bg-[#005991] text-white px-4 py-2 rounded-xl shadow-lg">
                            <span class="text-lg font-bold">$1,699</span>
                            <span class="text-xs opacity-90">/ person</span>
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
                            <span class="text-sm font-semibold text-gray-900">4.9</span>
                            <span class="text-sm text-[#6D6E70]">(342 reviews)</span>
                        </div>
                        <div class="flex items-center gap-1 text-[#005991]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm font-medium">14 Days</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-600 mb-3 group-hover:text-[#005991] transition-colors">
                        Everest Base Camp Trek
                    </h3>
                    <p class="text-[#6D6E70] text-sm mb-5 leading-relaxed line-clamp-2">
                        Journey to the roof of the world through Sherpa villages, ancient monasteries, and breathtaking Himalayan landscapes.
                    </p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                       {{-- @foreach($treks as $trek)
    @if($trek)
        <a href="{{ route('pages.treks.show', ['slug' => $trek->slug]) }}">
            {{ $trek->title }}
        </a>
    @endif
@endforeach --}}
   class="text-[#005991] font-medium hover:text-[#052734] transition-colors flex items-center gap-1 group">
    View Details
    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M14 5l7 7m0 0l-7 7m7-7H3" />
    </svg>
</a>
                        <button class="bg-[#005991] hover:from-[#052734]/90 hover:to-[#005991]/90 text-white px-5 py-2.5 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>
        <div class="text-center mt-12 lg:mt-16">
            <a href="#" 
               class="group inline-flex items-center gap-3 px-8 py-3.5 bg-[#005991] text-white font-semibold rounded-xl hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <span>Explore All Treks</span>
                <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
            <div class="mt-8 flex flex-wrap items-center justify-center gap-8 text-sm text-[#6D6E70]">
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
            </div>
        </div>
    </div>
</section>

<style>
/* For line-clamp-2 utility */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>