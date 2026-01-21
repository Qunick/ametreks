{{-- Testimonials Section --}}
<section class="py-20 md:py-28 bg-gradient-to-b from-gray-50 to-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-16">
            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#005991]/10 text-[#005991] text-sm font-medium mb-6 border border-[#005991]/20">
                <svg class="w-4 h-4 text-[#99c723]" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                </svg>
                700+ Happy Adventurers
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-light text-[#052734] mb-4">
                Stories from the <span class="font-semibold text-[#005991]">Mountains</span>
            </h2>
            <p class="text-[#6D6E70] max-w-2xl mx-auto text-lg">
                Real experiences from travelers who turned their dreams into summit memories
            </p>
        </div>

        {{-- Platform Statistics --}}
        <div class="flex gap-4 md:gap-6 mb-14 overflow-x-auto pb-4 md:pb-0 md:overflow-visible md:justify-center scrollbar-hide -mx-4 px-4 md:mx-0 md:px-0">
            {{-- Google Stats --}}
            <div class="flex-shrink-0 w-64 md:w-auto md:flex-1 md:max-w-xs bg-white rounded-2xl p-6 border border-gray-200 hover:border-[#4D8BB2] hover:shadow-xl hover:shadow-[#005991]/10 transition-all duration-300 group">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-xl bg-[#005991]/10 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="Google" class="w-8 h-8" />
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-1 mb-1">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 text-[#99c723] fill-[#99c723]" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            @endfor
                            <span class="text-sm font-semibold text-[#052734] ml-1">4.9</span>
                        </div>
                        <p class="text-2xl font-bold text-[#052734]">400+</p>
                        <p class="text-sm text-[#6D6E70]">Google Reviews</p>
                    </div>
                </div>
            </div>

            {{-- Tripadvisor Stats --}}
            <div class="flex-shrink-0 w-64 md:w-auto md:flex-1 md:max-w-xs bg-white rounded-2xl p-6 border border-gray-200 hover:border-[#4D8BB2] hover:shadow-xl hover:shadow-[#005991]/10 transition-all duration-300 group">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-xl bg-[#99c723]/10 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <img src="{{ asset('user-assets/images/tripadvisor.png') }}" alt="Tripadvisor" class="w-8 h-8" />
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-1 mb-1">
                            @for($i = 0; $i < 5; $i++)
                                <div class="w-3.5 h-3.5 rounded-full bg-[#99c723]"></div>
                            @endfor
                            <span class="text-sm font-semibold text-[#052734] ml-1">5.0</span>
                        </div>
                        <p class="text-2xl font-bold text-[#052734]">200+</p>
                        <p class="text-sm text-[#6D6E70]">Tripadvisor Reviews</p>
                    </div>
                </div>
            </div>

            {{-- Website Stats --}}
            <div class="flex-shrink-0 w-64 md:w-auto md:flex-1 md:max-w-xs bg-white rounded-2xl p-6 border border-gray-200 hover:border-[#4D8BB2] hover:shadow-xl hover:shadow-[#005991]/10 transition-all duration-300 group">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-xl bg-[#4D8BB2]/15 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-[#005991]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-1 mb-1">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 text-[#99c723] fill-[#99c723]" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            @endfor
                            <span class="text-sm font-semibold text-[#052734] ml-1">4.8</span>
                        </div>
                        <p class="text-2xl font-bold text-[#052734]">100+</p>
                        <p class="text-sm text-[#6D6E70]">Website Reviews</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Source Filters --}}
        <div class="flex flex-wrap justify-center gap-3 mb-10" id="review-filters">
            <button 
                onclick="filterReviews('all')"
                class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2 bg-[#005991] text-white shadow-lg shadow-[#005991]/25"
                id="filter-all"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                All Reviews
                <span class="px-2 py-0.5 rounded-full text-xs bg-white/20">700+</span>
            </button>
            
            <button 
                onclick="filterReviews('google')"
                class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2 bg-white text-[#6D6E70] border border-gray-200 hover:border-[#005991] hover:bg-[#005991]/5 hover:text-[#005991]"
                id="filter-google"
            >
                <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="Google" class="w-4 h-4" />
                Google
            </button>
            
            <button 
                onclick="filterReviews('tripadvisor')"
                class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2 bg-white text-[#6D6E70] border border-gray-200 hover:border-[#99c723] hover:bg-[#99c723]/5 hover:text-[#99c723]"
                id="filter-tripadvisor"
            >
                <img src="{{ asset('user-assets/images/tripadvisor.png') }}" alt="Tripadvisor" class="w-4 h-4" />
                Tripadvisor
            </button>
            
            <button 
                onclick="filterReviews('website')"
                class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2 bg-white text-[#6D6E70] border border-gray-200 hover:border-[#4D8BB2] hover:bg-[#4D8BB2]/10 hover:text-[#005991]"
                id="filter-website"
            >
                <svg class="w-4 h-4 text-[#005991]" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
                Website
            </button>
        </div>

        {{-- Reviews Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8" id="reviews-container">
            
            {{-- Review 1 - Google --}}
            <div class="review-item google group relative bg-white rounded-3xl border border-gray-200 p-6 lg:p-8 hover:shadow-2xl hover:shadow-[#005991]/10 hover:border-[#4D8BB2]/50 transition-all duration-500 hover:-translate-y-1">
                {{-- Quote Icon --}}
                <div class="absolute -top-4 -left-2 w-10 h-10 bg-[#005991] rounded-xl flex items-center justify-center shadow-lg shadow-[#005991]/30 rotate-6 group-hover:rotate-0 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>

                {{-- Platform Badge --}}
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-[#99c723] fill-[#99c723]" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        @endfor
                    </div>
                    <span class="flex items-center gap-1.5 text-xs font-medium text-[#005991] bg-[#005991]/10 px-3 py-1.5 rounded-full">
                        <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="Google" class="w-3.5 h-3.5" />
                        Google
                    </span>
                </div>

                {{-- Review Title --}}
                <h3 class="text-lg font-semibold text-[#052734] mb-3">Life-changing experience!</h3>

                {{-- Review Content --}}
                <p class="text-[#6D6E70] leading-relaxed mb-6">
                    "The Everest Base Camp trek exceeded all expectations. Our guide was incredibly knowledgeable and made sure everyone felt safe. The scenery was absolutely breathtaking."
                </p>

                {{-- Trip Tag --}}
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-[#99c723]/10 text-[#99c723] rounded-full text-sm font-medium mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Everest Base Camp Trek
                </div>

                {{-- Reviewer Info --}}
                <div class="flex items-center gap-4 pt-6 border-t border-gray-100">
                    <img 
                        src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=150&h=150&fit=crop&crop=face" 
                        alt="Sarah Johnson"
                        class="w-12 h-12 rounded-full object-cover ring-2 ring-[#4D8BB2]/20"
                    />
                    <div class="flex-1">
                        <p class="font-semibold text-[#052734]">Sarah Johnson</p>
                        <p class="text-sm text-[#6D6E70]">United States · 2 weeks ago</p>
                    </div>
                    <div class="flex items-center gap-1 text-[#99c723]">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-xs font-medium">Verified</span>
                    </div>
                </div>
            </div>

            {{-- Review 2 - Tripadvisor --}}
            <div class="review-item tripadvisor group relative bg-white rounded-3xl border border-gray-200 p-6 lg:p-8 hover:shadow-2xl hover:shadow-[#005991]/10 hover:border-[#4D8BB2]/50 transition-all duration-500 hover:-translate-y-1">
                {{-- Quote Icon --}}
                <div class="absolute -top-4 -left-2 w-10 h-10 bg-[#99c723] rounded-xl flex items-center justify-center shadow-lg shadow-[#99c723]/30 rotate-6 group-hover:rotate-0 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>

                {{-- Platform Badge --}}
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < 5; $i++)
                            <div class="w-4 h-4 rounded-full bg-[#99c723]"></div>
                        @endfor
                    </div>
                    <span class="flex items-center gap-1.5 text-xs font-medium text-[#99c723] bg-[#99c723]/10 px-3 py-1.5 rounded-full">
                        <img src="{{ asset('user-assets/images/tripadvisor.png') }}" alt="Tripadvisor" class="w-3.5 h-3.5" />
                        Tripadvisor
                    </span>
                </div>

                {{-- Review Title --}}
                <h3 class="text-lg font-semibold text-[#052734] mb-3">Best trekking company in Nepal</h3>

                {{-- Review Content --}}
                <p class="text-[#6D6E70] leading-relaxed mb-6">
                    "Professional from start to finish. The Annapurna Circuit was challenging but so rewarding. The team took care of every detail and went above and beyond."
                </p>

                {{-- Trip Tag --}}
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-[#4D8BB2]/10 text-[#005991] rounded-full text-sm font-medium mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Annapurna Circuit Trek
                </div>

                {{-- Reviewer Info --}}
                <div class="flex items-center gap-4 pt-6 border-t border-gray-100">
                    <img 
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" 
                        alt="Mike Chen"
                        class="w-12 h-12 rounded-full object-cover ring-2 ring-[#4D8BB2]/20"
                    />
                    <div class="flex-1">
                        <p class="font-semibold text-[#052734]">Mike Chen</p>
                        <p class="text-sm text-[#6D6E70]">Canada · 1 month ago</p>
                    </div>
                    <div class="flex items-center gap-1 text-[#99c723]">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-xs font-medium">Verified</span>
                    </div>
                </div>
            </div>

            {{-- Review 3 - Website --}}
            <div class="review-item website group relative bg-white rounded-3xl border border-gray-200 p-6 lg:p-8 hover:shadow-2xl hover:shadow-[#005991]/10 hover:border-[#4D8BB2]/50 transition-all duration-500 hover:-translate-y-1">
                {{-- Quote Icon --}}
                <div class="absolute -top-4 -left-2 w-10 h-10 bg-[#4D8BB2] rounded-xl flex items-center justify-center shadow-lg shadow-[#4D8BB2]/30 rotate-6 group-hover:rotate-0 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>

                {{-- Platform Badge --}}
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-[#99c723] fill-[#99c723]" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        @endfor
                    </div>
                    <span class="flex items-center gap-1.5 text-xs font-medium text-[#005991] bg-[#4D8BB2]/15 px-3 py-1.5 rounded-full">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                        Website
                    </span>
                </div>

                {{-- Review Title --}}
                <h3 class="text-lg font-semibold text-[#052734] mb-3">Perfect for solo travelers</h3>

                {{-- Review Content --}}
                <p class="text-[#6D6E70] leading-relaxed mb-6">
                    "As a solo female traveler, I felt completely safe. The Langtang Valley trek was beautiful and our group became like family by the end."
                </p>

                {{-- Trip Tag --}}
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-[#005991]/10 text-[#005991] rounded-full text-sm font-medium mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Langtang Valley Trek
                </div>

                {{-- Reviewer Info --}}
                <div class="flex items-center gap-4 pt-6 border-t border-gray-100">
                    <img 
                        src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face" 
                        alt="Emma Rodriguez"
                        class="w-12 h-12 rounded-full object-cover ring-2 ring-[#4D8BB2]/20"
                    />
                    <div class="flex-1">
                        <p class="font-semibold text-[#052734]">Emma Rodriguez</p>
                        <p class="text-sm text-[#6D6E70]">Spain · 3 days ago</p>
                    </div>
                    <div class="flex items-center gap-1 text-[#99c723]">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-xs font-medium">Verified</span>
                    </div>
                </div>
            </div>

            {{-- Review 4 - Google --}}
            <div class="review-item google group relative bg-white rounded-3xl border border-gray-200 p-6 lg:p-8 hover:shadow-2xl hover:shadow-[#005991]/10 hover:border-[#4D8BB2]/50 transition-all duration-500 hover:-translate-y-1">
                <div class="absolute -top-4 -left-2 w-10 h-10 bg-[#005991] rounded-xl flex items-center justify-center shadow-lg shadow-[#005991]/30 rotate-6 group-hover:rotate-0 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-[#99c723] fill-[#99c723]" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        @endfor
                    </div>
                    <span class="flex items-center gap-1.5 text-xs font-medium text-[#005991] bg-[#005991]/10 px-3 py-1.5 rounded-full">
                        <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="Google" class="w-3.5 h-3.5" />
                        Google
                    </span>
                </div>

                <h3 class="text-lg font-semibold text-[#052734] mb-3">Unforgettable journey</h3>

                <p class="text-[#6D6E70] leading-relaxed mb-6">
                    "From the moment we landed in Kathmandu, AME Treks took care of everything. The Manaslu Circuit was incredibly beautiful and less crowded than expected."
                </p>

                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-[#99c723]/10 text-[#99c723] rounded-full text-sm font-medium mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Manaslu Circuit Trek
                </div>

                <div class="flex items-center gap-4 pt-6 border-t border-gray-100">
                    <img 
                        src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&h=150&fit=crop&crop=face" 
                        alt="James Wilson"
                        class="w-12 h-12 rounded-full object-cover ring-2 ring-[#4D8BB2]/20"
                    />
                    <div class="flex-1">
                        <p class="font-semibold text-[#052734]">James Wilson</p>
                        <p class="text-sm text-[#6D6E70]">Australia · 1 week ago</p>
                    </div>
                    <div class="flex items-center gap-1 text-[#99c723]">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-xs font-medium">Verified</span>
                    </div>
                </div>
            </div>

            {{-- Review 5 - Tripadvisor --}}
            <div class="review-item tripadvisor group relative bg-white rounded-3xl border border-gray-200 p-6 lg:p-8 hover:shadow-2xl hover:shadow-[#005991]/10 hover:border-[#4D8BB2]/50 transition-all duration-500 hover:-translate-y-1">
                <div class="absolute -top-4 -left-2 w-10 h-10 bg-[#99c723] rounded-xl flex items-center justify-center shadow-lg shadow-[#99c723]/30 rotate-6 group-hover:rotate-0 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < 5; $i++)
                            <div class="w-4 h-4 rounded-full bg-[#99c723]"></div>
                        @endfor
                    </div>
                    <span class="flex items-center gap-1.5 text-xs font-medium text-[#99c723] bg-[#99c723]/10 px-3 py-1.5 rounded-full">
                        <img src="{{ asset('user-assets/images/tripadvisor.png') }}" alt="Tripadvisor" class="w-3.5 h-3.5" />
                        Tripadvisor
                    </span>
                </div>

                <h3 class="text-lg font-semibold text-[#052734] mb-3">Highly recommended!</h3>

                <p class="text-[#6D6E70] leading-relaxed mb-6">
                    "The Upper Mustang trek was like stepping back in time. Ancient monasteries, unique landscapes, and our guide's knowledge of local culture made it truly special."
                </p>

                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-[#4D8BB2]/10 text-[#005991] rounded-full text-sm font-medium mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Upper Mustang Trek
                </div>

                <div class="flex items-center gap-4 pt-6 border-t border-gray-100">
                    <img 
                        src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&h=150&fit=crop&crop=face" 
                        alt="Anna Schmidt"
                        class="w-12 h-12 rounded-full object-cover ring-2 ring-[#4D8BB2]/20"
                    />
                    <div class="flex-1">
                        <p class="font-semibold text-[#052734]">Anna Schmidt</p>
                        <p class="text-sm text-[#6D6E70]">Germany · 2 weeks ago</p>
                    </div>
                    <div class="flex items-center gap-1 text-[#99c723]">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-xs font-medium">Verified</span>
                    </div>
                </div>
            </div>

            {{-- Review 6 - Website --}}
            <div class="review-item website group relative bg-white rounded-3xl border border-gray-200 p-6 lg:p-8 hover:shadow-2xl hover:shadow-[#005991]/10 hover:border-[#4D8BB2]/50 transition-all duration-500 hover:-translate-y-1">
                <div class="absolute -top-4 -left-2 w-10 h-10 bg-[#4D8BB2] rounded-xl flex items-center justify-center shadow-lg shadow-[#4D8BB2]/30 rotate-6 group-hover:rotate-0 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-[#99c723] fill-[#99c723]" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        @endfor
                    </div>
                    <span class="flex items-center gap-1.5 text-xs font-medium text-[#005991] bg-[#4D8BB2]/15 px-3 py-1.5 rounded-full">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                        Website
                    </span>
                </div>

                <h3 class="text-lg font-semibold text-[#052734] mb-3">Family-friendly adventure</h3>

                <p class="text-[#6D6E70] leading-relaxed mb-6">
                    "Took my kids (12 and 15) on the Ghorepani Poon Hill trek. AME Treks made it age-appropriate and fun. Great memories we'll cherish forever!"
                </p>

                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-[#005991]/10 text-[#005991] rounded-full text-sm font-medium mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Ghorepani Poon Hill Trek
                </div>

                <div class="flex items-center gap-4 pt-6 border-t border-gray-100">
                    <img 
                        src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face" 
                        alt="Robert Taylor"
                        class="w-12 h-12 rounded-full object-cover ring-2 ring-[#4D8BB2]/20"
                    />
                    <div class="flex-1">
                        <p class="font-semibold text-[#052734]">Robert Taylor</p>
                        <p class="text-sm text-[#6D6E70]">United Kingdom · 5 days ago</p>
                    </div>
                    <div class="flex items-center gap-1 text-[#99c723]">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-xs font-medium">Verified</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- View All Button --}}
        <div class="text-center mt-12">
            <a href="/reviews" class="inline-flex items-center gap-2 px-8 py-4 bg-[#005991] hover:bg-[#052734] text-white font-semibold rounded-xl transition-all duration-300 shadow-lg shadow-[#005991]/25 hover:shadow-xl group">
                View All Reviews
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>

    {{-- Filter JavaScript --}}
    <script>
        let currentFilter = 'all';

        function filterReviews(source) {
            currentFilter = source;
            const reviews = document.querySelectorAll('.review-item');
            const buttons = document.querySelectorAll('#review-filters button');
            
            // Update button styles
            buttons.forEach(btn => {
                const btnId = btn.id.replace('filter-', '');
                if (btnId === source) {
                    btn.classList.remove('bg-white', 'text-[#6D6E70]', 'border-gray-200');
                    btn.classList.add('bg-[#005991]', 'text-white', 'shadow-lg', 'shadow-[#005991]/25');
                } else {
                    btn.classList.remove('bg-[#005991]', 'text-white', 'shadow-lg', 'shadow-[#005991]/25');
                    btn.classList.add('bg-white', 'text-[#6D6E70]', 'border-gray-200');
                }
            });
            
            // Filter reviews with animation
            reviews.forEach(review => {
                if (source === 'all' || review.classList.contains(source)) {
                    review.style.display = 'block';
                    review.style.opacity = '0';
                    review.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        review.style.opacity = '1';
                        review.style.transform = 'translateY(0)';
                    }, 50);
                } else {
                    review.style.opacity = '0';
                    review.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        review.style.display = 'none';
                    }, 300);
                }
            });
        }

        // Add transition styles
        document.querySelectorAll('.review-item').forEach(review => {
            review.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        });
    </script>
</section>