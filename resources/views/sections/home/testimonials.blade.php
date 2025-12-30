{{-- resources/views/sections/home/testimonials.blade.php --}}
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                What Travelers Say
            </h2>
            <p class="text-[#6D6E70] max-w-2xl mx-auto">
                Real reviews from thousands of adventurers across different platforms
            </p>
        </div>

        <!-- Platform Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Google Stats -->
            <div class="bg-white rounded-2xl p-6 border border-gray-200 text-center hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-center gap-3 mb-3">
                    <img 
                        src="https://cdn-icons-png.flaticon.com/512/300/300221.png" 
                        alt="Google" 
                        class="w-8 h-8"
                    />
                    <div class="text-left">
                        <div class="flex items-center gap-1">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 {{ $i < 4.9 ? 'text-[#4285F4] fill-[#4285F4]' : 'text-gray-300 fill-gray-300' }}" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            @endfor
                        </div>
                        <p class="text-sm text-[#6D6E70]">4.9/5</p>
                    </div>
                </div>
                <p class="text-2xl font-bold text-gray-900">400+</p>
                <p class="text-[#6D6E70]">Google Reviews</p>
            </div>

            <!-- Tripadvisor Stats -->
            <div class="bg-white rounded-2xl p-6 border border-gray-200 text-center hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-center gap-3 mb-3">
                    <img 
                        src="{{ asset('user-assets/images/tripadvisor.png') }}" 
                        alt="Tripadvisor" 
                        class="w-8 h-8"
                    />
                    <div class="text-left">
                        <div class="flex items-center gap-1">
                            @for($i = 0; $i < 5; $i++)
                                <div class="w-3 h-3 rounded-full {{ $i < 5 ? 'bg-[#00AA6C]' : 'bg-gray-300' }}"></div>
                            @endfor
                        </div>
                        <p class="text-sm text-[#6D6E70]">5.0/5</p>
                    </div>
                </div>
                <p class="text-2xl font-bold text-gray-900">200+</p>
                <p class="text-[#6D6E70]">Tripadvisor Reviews</p>
            </div>

            <!-- Website Stats -->
            <div class="bg-white rounded-2xl p-6 border border-gray-200 text-center hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-center gap-3 mb-3">
                    <img 
                        src="https://cdn-icons-png.flaticon.com/512/2838/2838694.png" 
                        alt="Website" 
                        class="w-8 h-8"
                    />
                    <div class="text-left">
                        <div class="flex items-center gap-1">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 {{ $i < 4.8 ? 'text-[#DC2626] fill-[#DC2626]' : 'text-gray-300 fill-gray-300' }}" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            @endfor
                        </div>
                        <p class="text-sm text-[#6D6E70]">4.8/5</p>
                    </div>
                </div>
                <p class="text-2xl font-bold text-gray-900">100+</p>
                <p class="text-[#6D6E70]">Website Reviews</p>
            </div>
        </div>

        <!-- Source Filters -->
        <div class="flex flex-wrap justify-center gap-4 mb-8" id="review-filters">
            <button 
                onclick="filterReviews('all')"
                class="px-6 py-3 rounded-xl font-semibold transition-all flex items-center gap-2 bg-gradient-to-r from-[#052734] to-[#005991] text-white shadow-lg"
                id="filter-all"
            >
                All Reviews
                <span class="px-2 py-1 rounded text-xs bg-white/20">3</span>
            </button>
            
            <button 
                onclick="filterReviews('google')"
                class="px-6 py-3 rounded-xl font-semibold transition-all flex items-center gap-2 bg-white text-gray-700 border border-gray-300 hover:border-gray-400"
                id="filter-google"
            >
                <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="Google" class="w-4 h-4" />
                Google
                <span class="px-2 py-1 rounded text-xs bg-gray-100">400</span>
            </button>
            
            <button 
                onclick="filterReviews('tripadvisor')"
                class="px-6 py-3 rounded-xl font-semibold transition-all flex items-center gap-2 bg-white text-gray-700 border border-gray-300 hover:border-gray-400"
                id="filter-tripadvisor"
            >
                <img src="{{ asset('user-assets/images/tripadvisor.png') }}" alt="Tripadvisor" class="w-4 h-4" />
                Tripadvisor
                <span class="px-2 py-1 rounded text-xs bg-gray-100">200</span>
            </button>
            
            <button 
                onclick="filterReviews('website')"
                class="px-6 py-3 rounded-xl font-semibold transition-all flex items-center gap-2 bg-white text-gray-700 border border-gray-300 hover:border-gray-400"
                id="filter-website"
            >
                <img src="https://cdn-icons-png.flaticon.com/512/2838/2838694.png" alt="Website" class="w-4 h-4" />
                Website
                <span class="px-2 py-1 rounded text-xs bg-gray-100">100</span>
            </button>
        </div>

        <!-- Reviews Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="reviews-container">
            <!-- Review 1 - Google -->
            <div class="review-item google bg-white rounded-2xl border border-gray-200 p-6 hover:shadow-lg transition-all duration-300">
                <!-- Review Header -->
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <img 
                            src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=150&h=150&fit=crop&crop=face" 
                            alt="Sarah Johnson"
                            class="w-12 h-12 rounded-full object-cover border-2 border-gray-200"
                        />
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <div class="flex items-center gap-1">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-4 h-4 {{ $i < 5 ? 'text-[#4285F4] fill-[#4285F4]' : 'text-gray-300 fill-gray-300' }}" viewBox="0 0 24 24">
                                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="text-xs px-3 py-1 rounded-full border bg-blue-50 border-blue-200 text-[#005991] flex items-center gap-1">
                                    <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="Google" class="w-3 h-3" />
                                    Google
                                </span>
                            </div>
                            <h3 class="font-semibold text-gray-900 text-sm">Life-changing experience!</h3>
                        </div>
                    </div>
                </div>

                <!-- Review Content -->
                <p class="text-[#6D6E70] text-sm mb-4 leading-relaxed">
                    "The Everest Base Camp trek exceeded all expectations. Our guide was incredibly knowledgeable and made sure everyone felt safe. The scenery was absolutely breathtaking."
                </p>

                <!-- Reviewer Info -->
                <div class="flex items-center justify-between text-sm text-[#6D6E70]">
                    <div>
                        <p class="font-medium text-gray-900">Sarah Johnson</p>
                        <p class="text-xs">2 weeks ago</p>
                    </div>
                    <span class="text-xs text-[#99C723] font-medium flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Verified
                    </span>
                </div>

                <!-- Trip Info -->
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-xs text-[#6D6E70] font-medium">Everest Base Camp Trek - 14 Days</p>
                </div>
            </div>

            <!-- Review 2 - Tripadvisor -->
            <div class="review-item tripadvisor bg-white rounded-2xl border border-gray-200 p-6 hover:shadow-lg transition-all duration-300">
                <!-- Review Header -->
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <img 
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" 
                            alt="Mike Chen"
                            class="w-12 h-12 rounded-full object-cover border-2 border-gray-200"
                        />
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <div class="flex items-center gap-1">
                                    @for($i = 0; $i < 5; $i++)
                                        <div class="w-3 h-3 rounded-full {{ $i < 5 ? 'bg-[#00AA6C]' : 'bg-gray-300' }}"></div>
                                    @endfor
                                </div>
                                <span class="text-xs px-3 py-1 rounded-full border bg-green-50 border-green-200 text-[#005991] flex items-center gap-1">
                                    <img src="{{ asset('user-assets/images/tripadvisor.png') }}" alt="Tripadvisor" class="w-3 h-3" />
                                    Tripadvisor
                                </span>
                            </div>
                            <h3 class="font-semibold text-gray-900 text-sm">Best trekking company in Nepal</h3>
                        </div>
                    </div>
                </div>

                <!-- Review Content -->
                <p class="text-[#6D6E70] text-sm mb-4 leading-relaxed">
                    "Professional from start to finish. The Annapurna Circuit was challenging but so rewarding. The team took care of every detail."
                </p>

                <!-- Reviewer Info -->
                <div class="flex items-center justify-between text-sm text-[#6D6E70]">
                    <div>
                        <p class="font-medium text-gray-900">Mike Chen</p>
                        <p class="text-xs">1 month ago</p>
                    </div>
                    <span class="text-xs text-[#99C723] font-medium flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Verified
                    </span>
                </div>

                <!-- Trip Info -->
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-xs text-[#6D6E70] font-medium">Annapurna Circuit Trek - 21 Days</p>
                </div>
            </div>

            <!-- Review 3 - Website -->
            <div class="review-item website bg-white rounded-2xl border border-gray-200 p-6 hover:shadow-lg transition-all duration-300">
                <!-- Review Header -->
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <img 
                            src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face" 
                            alt="Emma Rodriguez"
                            class="w-12 h-12 rounded-full object-cover border-2 border-gray-200"
                        />
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <div class="flex items-center gap-1">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-4 h-4 {{ $i < 5 ? 'text-[#DC2626] fill-[#DC2626]' : 'text-gray-300 fill-gray-300' }}" viewBox="0 0 24 24">
                                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="text-xs px-3 py-1 rounded-full border bg-red-50 border-red-200 text-[#005991] flex items-center gap-1">
                                    <img src="https://cdn-icons-png.flaticon.com/512/2838/2838694.png" alt="Website" class="w-3 h-3" />
                                    Website
                                </span>
                            </div>
                            <h3 class="font-semibold text-gray-900 text-sm">Perfect for solo travelers</h3>
                        </div>
                    </div>
                </div>

                <!-- Review Content -->
                <p class="text-[#6D6E70] text-sm mb-4 leading-relaxed">
                    "As a solo female traveler, I felt completely safe. The Langtang Valley trek was beautiful and our group became like family."
                </p>

                <!-- Reviewer Info -->
                <div class="flex items-center justify-between text-sm text-[#6D6E70]">
                    <div>
                        <p class="font-medium text-gray-900">Emma Rodriguez</p>
                        <p class="text-xs">3 days ago</p>
                    </div>
                    <span class="text-xs text-[#99C723] font-medium flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Verified
                    </span>
                </div>

                <!-- Trip Info -->
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-xs text-[#6D6E70] font-medium">Langtang Valley Trek - 7 Days</p>
                </div>
            </div>
        </div>

        <!-- External Links -->
        <div class="text-center mt-12">
            <div class="bg-white rounded-2xl border border-gray-200 p-8 max-w-2xl mx-auto">
                <h3 class="text-xl font-bold text-gray-900 mb-4">
                    Read More Reviews
                </h3>
                <p class="text-[#6D6E70] mb-6">
                    See what thousands of travelers are saying about their adventures
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#" class="flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#052734] to-[#005991] hover:from-[#052734]/90 hover:to-[#005991]/90 text-white rounded-xl transition-all duration-300 hover:scale-105">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                        <span>All Reviews</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                    <a href="#" class="flex items-center gap-2 px-6 py-3 bg-[#4285F4] hover:bg-[#3367D6] text-white rounded-xl transition-all duration-300 hover:scale-105">
                        <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="Google" class="w-5 h-5" />
                        <span>Google Reviews</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                    <a href="#" class="flex items-center gap-2 px-6 py-3 bg-[#00AA6C] hover:bg-[#008F5B] text-white rounded-xl transition-all duration-300 hover:scale-105">
                        <img src="{{ asset('user-assets/images/tripadvisor.png') }}" alt="Tripadvisor" class="w-5 h-5" />
                        <span>Tripadvisor</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Filter reviews by platform
        function filterReviews(platform) {
            const reviews = document.querySelectorAll('.review-item');
            const filterButtons = document.querySelectorAll('#review-filters button');
            
            // Update active button styles
            filterButtons.forEach(button => {
                const buttonId = button.id.replace('filter-', '');
                if (buttonId === platform) {
                    // Apply active styles based on platform
                    if (platform === 'google') {
                        button.className = 'px-6 py-3 rounded-xl font-semibold transition-all flex items-center gap-2 bg-[#4285F4] text-white shadow-lg';
                    } else if (platform === 'tripadvisor') {
                        button.className = 'px-6 py-3 rounded-xl font-semibold transition-all flex items-center gap-2 bg-[#00AA6C] text-white shadow-lg';
                    } else if (platform === 'website') {
                        button.className = 'px-6 py-3 rounded-xl font-semibold transition-all flex items-center gap-2 bg-[#DC2626] text-white shadow-lg';
                    } else {
                        button.className = 'px-6 py-3 rounded-xl font-semibold transition-all flex items-center gap-2 bg-gradient-to-r from-[#052734] to-[#005991] text-white shadow-lg';
                    }
                } else {
                    // Apply inactive styles
                    button.className = 'px-6 py-3 rounded-xl font-semibold transition-all flex items-center gap-2 bg-white text-gray-700 border border-gray-300 hover:border-gray-400';
                }
            });
            
            // Show/hide reviews
            reviews.forEach(review => {
                if (platform === 'all' || review.classList.contains(platform)) {
                    review.classList.remove('hidden');
                    // Add fade-in animation
                    review.style.opacity = '0';
                    review.style.transform = 'translateY(10px)';
                    setTimeout(() => {
                        review.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                        review.style.opacity = '1';
                        review.style.transform = 'translateY(0)';
                    }, 50);
                } else {
                    review.classList.add('hidden');
                }
            });
        }
        
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Set all reviews to show initially
            filterReviews('all');
        });
    </script>
</section>