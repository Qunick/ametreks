{{-- resources/views/sections/home/testimonials.blade.php --}}
<section class="py-20 md:py-28 bg-gradient-to-b from-stone-50 to-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-16">
            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-amber-100 text-amber-700 text-sm font-medium mb-6">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                </svg>
                700+ Happy Adventurers
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-light text-stone-800 mb-4">
                Stories from the <span class="font-semibold text-emerald-700">Mountains</span>
            </h2>
            <p class="text-stone-500 max-w-2xl mx-auto text-lg">
                Real experiences from travelers who turned their dreams into summit memories
            </p>
        </div>

        {{-- Platform Statistics - Horizontal Scrolling on Mobile --}}
        <div class="flex gap-4 md:gap-6 mb-14 overflow-x-auto pb-4 md:pb-0 md:overflow-visible md:justify-center scrollbar-hide -mx-4 px-4 md:mx-0 md:px-0">
            {{-- Google Stats --}}
            <div class="flex-shrink-0 w-64 md:w-auto md:flex-1 md:max-w-xs bg-white rounded-2xl p-6 border border-stone-200 hover:border-stone-300 hover:shadow-xl transition-all duration-300 group">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-xl bg-blue-50 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="Google" class="w-8 h-8" />
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-1 mb-1">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 text-amber-400 fill-amber-400" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            @endfor
                            <span class="text-sm font-semibold text-stone-700 ml-1">4.9</span>
                        </div>
                        <p class="text-2xl font-bold text-stone-800">400+</p>
                        <p class="text-sm text-stone-500">Google Reviews</p>
                    </div>
                </div>
            </div>

            {{-- Tripadvisor Stats --}}
            <div class="flex-shrink-0 w-64 md:w-auto md:flex-1 md:max-w-xs bg-white rounded-2xl p-6 border border-stone-200 hover:border-stone-300 hover:shadow-xl transition-all duration-300 group">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-xl bg-emerald-50 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <img src="{{ asset('user-assets/images/tripadvisor.png') }}" alt="Tripadvisor" class="w-8 h-8" />
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-1 mb-1">
                            @for($i = 0; $i < 5; $i++)
                                <div class="w-3.5 h-3.5 rounded-full bg-emerald-500"></div>
                            @endfor
                            <span class="text-sm font-semibold text-stone-700 ml-1">5.0</span>
                        </div>
                        <p class="text-2xl font-bold text-stone-800">200+</p>
                        <p class="text-sm text-stone-500">Tripadvisor Reviews</p>
                    </div>
                </div>
            </div>

            {{-- Website Stats --}}
            <div class="flex-shrink-0 w-64 md:w-auto md:flex-1 md:max-w-xs bg-white rounded-2xl p-6 border border-stone-200 hover:border-stone-300 hover:shadow-xl transition-all duration-300 group">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-xl bg-rose-50 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-1 mb-1">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 text-rose-400 fill-rose-400" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            @endfor
                            <span class="text-sm font-semibold text-stone-700 ml-1">4.8</span>
                        </div>
                        <p class="text-2xl font-bold text-stone-800">100+</p>
                        <p class="text-sm text-stone-500">Website Reviews</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Source Filters --}}
        <div class="flex flex-wrap justify-center gap-3 mb-10" id="review-filters">
            <button 
                onclick="filterReviews('all')"
                class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2 bg-stone-800 text-white shadow-lg shadow-stone-800/20"
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
                class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2 bg-white text-stone-600 border border-stone-200 hover:border-blue-300 hover:bg-blue-50"
                id="filter-google"
            >
                <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="Google" class="w-4 h-4" />
                Google
            </button>
            
            <button 
                onclick="filterReviews('tripadvisor')"
                class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2 bg-white text-stone-600 border border-stone-200 hover:border-emerald-300 hover:bg-emerald-50"
                id="filter-tripadvisor"
            >
                <img src="{{ asset('user-assets/images/tripadvisor.png') }}" alt="Tripadvisor" class="w-4 h-4" />
                Tripadvisor
            </button>
            
            <button 
                onclick="filterReviews('website')"
                class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2 bg-white text-stone-600 border border-stone-200 hover:border-rose-300 hover:bg-rose-50"
                id="filter-website"
            >
                <svg class="w-4 h-4 text-rose-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
                Website
            </button>
        </div>

        {{-- Reviews Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8" id="reviews-container">
            
            {{-- Review 1 - Google (Featured) --}}
            <div class="review-item google group relative bg-white rounded-3xl border border-stone-200 p-6 lg:p-8 hover:shadow-2xl hover:shadow-stone-200/50 transition-all duration-500 hover:-translate-y-1">
                {{-- Quote Icon --}}
                <div class="absolute -top-4 -left-2 w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30 rotate-6 group-hover:rotate-0 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>

                {{-- Platform Badge --}}
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-amber-400 fill-amber-400" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        @endfor
                    </div>
                    <span class="flex items-center gap-1.5 text-xs font-medium text-blue-600 bg-blue-50 px-3 py-1.5 rounded-full">
                        <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="Google" class="w-3.5 h-3.5" />
                        Google
                    </span>
                </div>

                {{-- Review Title --}}
                <h3 class="text-lg font-semibold text-stone-800 mb-3">Life-changing experience!</h3>

                {{-- Review Content --}}
                <p class="text-stone-600 leading-relaxed mb-6">
                    "The Everest Base Camp trek exceeded all expectations. Our guide was incredibly knowledgeable and made sure everyone felt safe. The scenery was absolutely breathtaking."
                </p>

                {{-- Trip Tag --}}
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-emerald-50 text-emerald-700 rounded-full text-sm font-medium mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Everest Base Camp Trek
                </div>

                {{-- Reviewer Info --}}
                <div class="flex items-center gap-4 pt-6 border-t border-stone-100">
                    <img 
                        src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=150&h=150&fit=crop&crop=face" 
                        alt="Sarah Johnson"
                        class="w-12 h-12 rounded-full object-cover ring-2 ring-stone-100"
                    />
                    <div class="flex-1">
                        <p class="font-semibold text-stone-800">Sarah Johnson</p>
                        <p class="text-sm text-stone-500">United States · 2 weeks ago</p>
                    </div>
                    <div class="flex items-center gap-1 text-emerald-600">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-xs font-medium">Verified</span>
                    </div>
                </div>
            </div>

            {{-- Review 2 - Tripadvisor --}}
            <div class="review-item tripadvisor group relative bg-white rounded-3xl border border-stone-200 p-6 lg:p-8 hover:shadow-2xl hover:shadow-stone-200/50 transition-all duration-500 hover:-translate-y-1">
                {{-- Quote Icon --}}
                <div class="absolute -top-4 -left-2 w-10 h-10 bg-emerald-500 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/30 rotate-6 group-hover:rotate-0 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>

                {{-- Platform Badge --}}
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < 5; $i++)
                            <div class="w-4 h-4 rounded-full bg-emerald-500"></div>
                        @endfor
                    </div>
                    <span class="flex items-center gap-1.5 text-xs font-medium text-emerald-700 bg-emerald-50 px-3 py-1.5 rounded-full">
                        <img src="{{ asset('user-assets/images/tripadvisor.png') }}" alt="Tripadvisor" class="w-3.5 h-3.5" />
                        Tripadvisor
                    </span>
                </div>

                {{-- Review Title --}}
                <h3 class="text-lg font-semibold text-stone-800 mb-3">Best trekking company in Nepal</h3>

                {{-- Review Content --}}
                <p class="text-stone-600 leading-relaxed mb-6">
                    "Professional from start to finish. The Annapurna Circuit was challenging but so rewarding. The team took care of every detail and went above and beyond."
                </p>

                {{-- Trip Tag --}}
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-amber-50 text-amber-700 rounded-full text-sm font-medium mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Annapurna Circuit Trek
                </div>

                {{-- Reviewer Info --}}
                <div class="flex items-center gap-4 pt-6 border-t border-stone-100">
                    <img 
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" 
                        alt="Mike Chen"
                        class="w-12 h-12 rounded-full object-cover ring-2 ring-stone-100"
                    />
                    <div class="flex-1">
                        <p class="font-semibold text-stone-800">Mike Chen</p>
                        <p class="text-sm text-stone-500">Canada · 1 month ago</p>
                    </div>
                    <div class="flex items-center gap-1 text-emerald-600">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-xs font-medium">Verified</span>
                    </div>
                </div>
            </div>

            {{-- Review 3 - Website --}}
            <div class="review-item website group relative bg-white rounded-3xl border border-stone-200 p-6 lg:p-8 hover:shadow-2xl hover:shadow-stone-200/50 transition-all duration-500 hover:-translate-y-1">
                {{-- Quote Icon --}}
                <div class="absolute -top-4 -left-2 w-10 h-10 bg-rose-500 rounded-xl flex items-center justify-center shadow-lg shadow-rose-500/30 rotate-6 group-hover:rotate-0 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>

                {{-- Platform Badge --}}
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-rose-400 fill-rose-400" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        @endfor
                    </div>
                    <span class="flex items-center gap-1.5 text-xs font-medium text-rose-600 bg-rose-50 px-3 py-1.5 rounded-full">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                        Website
                    </span>
                </div>

                {{-- Review Title --}}
                <h3 class="text-lg font-semibold text-stone-800 mb-3">Perfect for solo travelers</h3>

                {{-- Review Content --}}
                <p class="text-stone-600 leading-relaxed mb-6">
                    "As a solo female traveler, I felt completely safe. The Langtang Valley trek was beautiful and our group became like family by the end."
                </p>

                {{-- Trip Tag --}}
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-50 text-blue-700 rounded-full text-sm font-medium mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Langtang Valley Trek
                </div>

                {{-- Reviewer Info --}}
                <div class="flex items-center gap-4 pt-6 border-t border-stone-100">
                    <img 
                        src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face" 
                        alt="Emma Rodriguez"
                        class="w-12 h-12 rounded-full object-cover ring-2 ring-stone-100"
                    />
                    <div class="flex-1">
                        <p class="font-semibold text-stone-800">Emma Rodriguez</p>
                        <p class="text-sm text-stone-500">Spain · 3 days ago</p>
                    </div>
                    <div class="flex items-center gap-1 text-emerald-600">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-xs font-medium">Verified</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- CTA Section --}}
        <div class="mt-16 text-center">
            <div class="inline-flex flex-col sm:flex-row items-center gap-4 sm:gap-6 p-6 sm:p-8 bg-gradient-to-r from-stone-800 to-stone-900 rounded-3xl">
                <div class="text-center sm:text-left">
                    <h3 class="text-xl sm:text-2xl font-semibold text-white mb-2">Read All 700+ Reviews</h3>
                    <p class="text-stone-400 text-sm sm:text-base">See what adventurers worldwide are saying</p>
                </div>
                <div class="flex flex-wrap justify-center gap-3">
                    <a href="#" class="inline-flex items-center gap-2 px-5 py-3 bg-white text-stone-800 rounded-xl font-medium hover:bg-stone-100 transition-colors">
                        <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="Google" class="w-5 h-5" />
                        Google
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                    <a href="#" class="inline-flex items-center gap-2 px-5 py-3 bg-emerald-600 text-white rounded-xl font-medium hover:bg-emerald-700 transition-colors">
                        <img src="{{ asset('user-assets/images/tripadvisor.png') }}" alt="Tripadvisor" class="w-5 h-5" />
                        Tripadvisor
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterReviews(platform) {
            const reviews = document.querySelectorAll('.review-item');
            const filterButtons = document.querySelectorAll('#review-filters button');
            
            // Update button styles
            filterButtons.forEach(button => {
                const buttonId = button.id.replace('filter-', '');
                if (buttonId === platform) {
                    if (platform === 'all') {
                        button.className = 'px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2 bg-stone-800 text-white shadow-lg shadow-stone-800/20';
                    } else if (platform === 'google') {
                        button.className = 'px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2 bg-blue-500 text-white shadow-lg shadow-blue-500/20';
                    } else if (platform === 'tripadvisor') {
                        button.className = 'px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2 bg-emerald-500 text-white shadow-lg shadow-emerald-500/20';
                    } else if (platform === 'website') {
                        button.className = 'px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2 bg-rose-500 text-white shadow-lg shadow-rose-500/20';
                    }
                } else {
                    button.className = 'px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 flex items-center gap-2 bg-white text-stone-600 border border-stone-200 hover:border-stone-300';
                }
            });
            
            // Filter reviews with animation
            reviews.forEach(review => {
                if (platform === 'all' || review.classList.contains(platform)) {
                    review.style.display = 'block';
                    review.style.opacity = '0';
                    review.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        review.style.opacity = '1';
                        review.style.transform = 'translateY(0)';
                    }, 50);
                } else {
                    review.style.display = 'none';
                }
            });
        }
    </script>

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .review-item {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
    </style>
</section>
