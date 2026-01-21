<section class="py-16 lg:py-24 bg-gray-50">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-10 lg:mb-12">
            <div class="max-w-2xl">
                <span class="inline-flex items-center gap-2 text-[#005991] font-semibold text-sm tracking-wide uppercase mb-3">
                    <span class="w-8 h-px bg-[#005991]"></span>
                    Featured Adventures
                </span>
                <h2 class="text-3xl lg:text-5xl font-bold tracking-tight text-[#052734] mb-4">
                    Handpicked Treks
                </h2>
                <p class="text-base lg:text-lg leading-relaxed text-[#6D6E70]">
                    Curated Himalayan journeys designed for unforgettable moments and breathtaking panoramas.
                </p>
            </div>
            <div class="flex items-center gap-3 sm:gap-4">
                {{-- Navigation Arrows --}}
                <button id="prevBtn" class="w-11 h-11 sm:w-12 sm:h-12 rounded-full border-2 border-[#005991] text-[#005991] flex items-center justify-center transition-all duration-300 hover:bg-[#005991] hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="nextBtn" class="w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-[#005991] text-white flex items-center justify-center transition-all duration-300 hover:bg-[#052734]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <a href="{{ route('pages.treks.index') }}" 
                   class="hidden lg:inline-flex items-center gap-2 text-[#052734] hover:text-[#005991] font-semibold transition-colors ml-4">
                    View all treks
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
        
        {{-- Carousel Container --}}
        <div class="relative overflow-hidden" id="carouselContainer">
            <div class="flex transition-transform duration-500 ease-out" id="carouselTrack">
                @foreach ($trek as $index => $treks)
                    @if($treks)
                    <article class="carousel-card flex-shrink-0 px-2 sm:px-3" data-index="{{ $index }}">
                        <div class="group relative bg-white rounded-2xl lg:rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-[#005991]/10 transition-all duration-500 h-full border border-gray-100 hover:border-[#4D8BB2]/30">
                            {{-- Image Container --}}
                            <div class="relative h-52 sm:h-56 md:h-64 lg:h-72 overflow-hidden">
                                <img src="{{ asset('storage/'.$treks->main_image) }}"
                                     alt="{{ $treks->title }}" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#052734]/90 via-[#052734]/30 to-transparent"></div>
                                
                                {{-- Featured Badge --}}
                                @if($treks->is_featured ?? false)
                                <div class="absolute top-3 sm:top-4 left-3 sm:left-4 z-10">
                                    <div class="inline-flex items-center gap-1.5 px-2.5 sm:px-3 py-1 sm:py-1.5 bg-[#99c723] text-white text-[10px] sm:text-xs font-bold uppercase tracking-wider rounded-full shadow-lg shadow-[#99c723]/30">
                                        <svg class="w-3 sm:w-3.5 h-3 sm:h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        Featured
                                    </div>
                                </div>
                                @endif
                                
                                {{-- Offer Ribbon --}}
                                @if($treks->offer ?? false)
                                <div class="absolute -right-8 sm:-right-10 top-4 sm:top-5 z-10 rotate-45">
                                    <div class="w-28 sm:w-36 py-1 sm:py-1.5 bg-[#c9302c] text-white text-[10px] sm:text-xs font-bold text-center uppercase tracking-wide shadow-lg">
                                        {{ $treks->offer }}% Off
                                    </div>
                                </div>
                                @endif
                                
                                {{-- Price Tag --}}
                                <div class="absolute top-3 sm:top-4 right-3 sm:right-4 {{ ($treks->offer ?? false) ? 'top-12 sm:top-14' : '' }}">
                                    <div class="bg-white/95 backdrop-blur-sm px-2.5 sm:px-4 py-1 sm:py-2 rounded-full shadow-lg">
                                        @if($treks->offer ?? false)
                                        <span class="text-[10px] sm:text-xs line-through mr-1 text-[#6D6E70]">${{ $treks->base_price ?? '0' }}</span>
                                        <span class="text-sm sm:text-lg font-bold text-[#99c723]">${{ number_format(($treks->base_price ?? 0) * (1 - ($treks->offer ?? 0) / 100), 0) }}</span>
                                        @else
                                        <span class="text-sm sm:text-lg font-bold text-[#052734]">${{ $treks->base_price ?? '0' }}</span>
                                        @endif
                                        <span class="text-[10px] sm:text-xs ml-0.5 sm:ml-1 text-[#6D6E70]">/pp</span>
                                    </div>
                                </div>
                                
                                {{-- Bottom Info Overlay --}}
                                <div class="absolute bottom-0 left-0 right-0 p-3 sm:p-4 lg:p-5">
                                    <div class="flex items-center gap-1.5 sm:gap-2 lg:gap-3 mb-2 lg:mb-3">
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 sm:py-1 bg-white/20 backdrop-blur-sm text-white text-[10px] sm:text-xs font-medium rounded-full border border-white/20">
                                            <svg class="w-2.5 sm:w-3.5 h-2.5 sm:h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                            {{ $treks->difficulty ?? 'Medium' }}
                                        </span>
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 sm:py-1 bg-white/20 backdrop-blur-sm text-white text-[10px] sm:text-xs font-medium rounded-full border border-white/20">
                                            <svg class="w-2.5 sm:w-3.5 h-2.5 sm:h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ $treks->duration_days ?? 0 }} Days
                                        </span>
                                    </div>
                                    <h3 class="text-base sm:text-lg lg:text-xl font-bold text-white leading-tight line-clamp-2">
                                        {{ $treks->title ?? 'Trek Title' }}
                                    </h3>
                                </div>
                            </div>
                            
                            {{-- Card Content --}}
                            <div class="p-3 sm:p-4 lg:p-6">
                                <p class="text-xs sm:text-sm leading-relaxed text-[#6D6E70] mb-3 sm:mb-4 lg:mb-5 line-clamp-2">
                                    {!! $treks->short_desc !!}
                                </p>
                                
                                {{-- Rating & Meta --}}
                                <div class="flex items-center justify-between pb-3 sm:pb-4 lg:pb-5 mb-3 sm:mb-4 lg:mb-5 border-b border-gray-100">
                                    <div class="flex items-center gap-1.5 sm:gap-2">
                                        <div class="flex items-center gap-1 px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-lg bg-[#99c723]/10">
                                            <svg class="w-3.5 sm:w-4 h-3.5 sm:h-4 text-[#99c723]" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <span class="text-xs sm:text-sm font-bold text-[#052734]">4.9</span>
                                        </div>
                                        <span class="text-[10px] sm:text-sm text-[#6D6E70]">(342)</span>
                                    </div>
                                    <button class="w-7 h-7 sm:w-8 sm:h-8 lg:w-9 lg:h-9 flex items-center justify-center rounded-full border border-gray-200 text-[#6D6E70] hover:border-[#c9302c] hover:text-[#c9302c] hover:bg-[#c9302c]/5 transition-colors">
                                        <svg class="w-3.5 sm:w-4 h-3.5 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </div>
                                
                                {{-- Actions --}}
                                <div class="flex items-center gap-2 lg:gap-3">
                                    <a href="{{ route('pages.treks.show', $treks->slug ?? '#') }}" 
                                       class="flex-1 text-center py-2 sm:py-2.5 lg:py-3 px-2 sm:px-3 lg:px-4 border-2 border-[#052734] text-[#052734] hover:bg-[#052734] hover:text-white font-semibold text-xs sm:text-sm lg:text-base rounded-xl transition-all duration-300">
                                        View Details
                                    </a>
                                    <button class="flex-1 py-2 sm:py-2.5 lg:py-3 px-2 sm:px-3 lg:px-4 bg-[#005991] hover:bg-[#052734] text-white font-semibold text-xs sm:text-sm lg:text-base rounded-xl transition-colors">
                                        Book Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endif
                @endforeach
            </div>
        </div>
        
        {{-- Pagination Dots --}}
        <div class="flex items-center justify-center gap-1.5 sm:gap-2 mt-6 sm:mt-8" id="paginationDots">
            {{-- Dots will be generated by JS --}}
        </div>
        
        {{-- Mobile View All Link --}}
        <div class="lg:hidden text-center mt-6">
            <a href="{{ route('pages.treks.index') }}" 
               class="inline-flex items-center gap-2 text-[#005991] font-semibold transition-colors">
                View all treks
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
        
        {{-- Trust Badges --}}
        <div class="mt-10 sm:mt-12 lg:mt-16 pt-6 sm:pt-8 lg:pt-10 border-t border-gray-200">
            <div class="flex flex-wrap items-center justify-center gap-x-6 sm:gap-x-8 lg:gap-x-12 gap-y-4">
                <div class="flex items-center gap-2 sm:gap-3 text-[#6D6E70]">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full flex items-center justify-center bg-[#005991]/10">
                        <svg class="w-4 sm:w-5 h-4 sm:h-5 text-[#005991]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <span class="font-medium text-xs sm:text-sm lg:text-base">Certified Guides</span>
                </div>
                <div class="flex items-center gap-2 sm:gap-3 text-[#6D6E70]">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full flex items-center justify-center bg-[#005991]/10">
                        <svg class="w-4 sm:w-5 h-4 sm:h-5 text-[#005991]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="font-medium text-xs sm:text-sm lg:text-base">Best Price</span>
                </div>
                <div class="flex items-center gap-2 sm:gap-3 text-[#6D6E70]">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full flex items-center justify-center bg-[#005991]/10">
                        <svg class="w-4 sm:w-5 h-4 sm:h-5 text-[#005991]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="font-medium text-xs sm:text-sm lg:text-base">Flexible Booking</span>
                </div>
                <div class="flex items-center gap-2 sm:gap-3 text-[#6D6E70]">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full flex items-center justify-center bg-[#005991]/10">
                        <svg class="w-4 sm:w-5 h-4 sm:h-5 text-[#005991]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="font-medium text-xs sm:text-sm lg:text-base">24/7 Support</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Responsive card widths - Show partial card to indicate more content */
.carousel-card {
    width: calc(85%);
}

@media (min-width: 480px) {
    .carousel-card {
        width: calc(75%);
    }
}

@media (min-width: 640px) {
    .carousel-card {
        width: calc(50% - 8px);
    }
}

@media (min-width: 768px) {
    .carousel-card {
        width: calc(50% - 12px);
    }
}

@media (min-width: 1024px) {
    .carousel-card {
        width: calc(33.333% - 12px);
    }
}

@media (min-width: 1280px) {
    .carousel-card {
        width: calc(33.333% - 16px);
    }
}

/* Smooth carousel transition */
#carouselTrack {
    will-change: transform;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('carouselTrack');
    const container = document.getElementById('carouselContainer');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const dotsContainer = document.getElementById('paginationDots');
    const cards = document.querySelectorAll('.carousel-card');
    
    if (!track || cards.length === 0) return;
    
    let currentIndex = 0;
    let autoSlideInterval;
    let cardsToShow = 1;
    
    // Determine cards to show based on screen width
    function updateCardsToShow() {
        if (window.innerWidth >= 1280) {
            cardsToShow = 3;
        } else if (window.innerWidth >= 1024) {
            cardsToShow = 3;
        } else if (window.innerWidth >= 768) {
            cardsToShow = 2;
        } else if (window.innerWidth >= 640) {
            cardsToShow = 2;
        } else if (window.innerWidth >= 480) {
            cardsToShow = 1.3;
        } else {
            cardsToShow = 1.15;
        }
        updateCarousel();
        createDots();
    }
    
    // Calculate max index
    function getMaxIndex() {
        return Math.max(0, cards.length - Math.floor(cardsToShow));
    }
    
    // Update carousel position
    function updateCarousel() {
        const cardWidth = cards[0].offsetWidth;
        const offset = currentIndex * cardWidth;
        track.style.transform = `translateX(-${offset}px)`;
        updateDots();
    }
    
    // Create pagination dots
    function createDots() {
        dotsContainer.innerHTML = '';
        const totalDots = getMaxIndex() + 1;
        
        for (let i = 0; i < totalDots; i++) {
            const dot = document.createElement('button');
            dot.className = 'transition-all duration-300 rounded-full';
            if (i === currentIndex) {
                dot.style.width = '24px';
                dot.style.height = '8px';
                dot.style.backgroundColor = '#005991';
            } else {
                dot.style.width = '8px';
                dot.style.height = '8px';
                dot.style.backgroundColor = '#d1d5db';
            }
            dot.addEventListener('click', () => {
                currentIndex = i;
                updateCarousel();
                resetAutoSlide();
            });
            dotsContainer.appendChild(dot);
        }
    }
    
    // Update active dot
    function updateDots() {
        const dots = dotsContainer.querySelectorAll('button');
        dots.forEach((dot, index) => {
            if (index === currentIndex) {
                dot.style.width = '24px';
                dot.style.height = '8px';
                dot.style.backgroundColor = '#005991';
            } else {
                dot.style.width = '8px';
                dot.style.height = '8px';
                dot.style.backgroundColor = '#d1d5db';
            }
        });
    }
    
    // Next slide
    function nextSlide() {
        const maxIndex = getMaxIndex();
        currentIndex = currentIndex >= maxIndex ? 0 : currentIndex + 1;
        updateCarousel();
    }
    
    // Previous slide
    function prevSlide() {
        const maxIndex = getMaxIndex();
        currentIndex = currentIndex <= 0 ? maxIndex : currentIndex - 1;
        updateCarousel();
    }
    
    // Auto slide
    function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, 5000);
    }
    
    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }
    
    // Event listeners
    nextBtn.addEventListener('click', () => {
        nextSlide();
        resetAutoSlide();
    });
    
    prevBtn.addEventListener('click', () => {
        prevSlide();
        resetAutoSlide();
    });
    
    // Pause on hover
    container.addEventListener('mouseenter', () => {
        clearInterval(autoSlideInterval);
    });
    
    container.addEventListener('mouseleave', () => {
        startAutoSlide();
    });
    
    // Touch/swipe support
    let touchStartX = 0;
    let touchEndX = 0;
    
    container.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
        clearInterval(autoSlideInterval);
    }, { passive: true });
    
    container.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        const diff = touchStartX - touchEndX;
        
        if (Math.abs(diff) > 50) {
            if (diff > 0) {
                nextSlide();
            } else {
                prevSlide();
            }
        }
        startAutoSlide();
    }, { passive: true });
    
    // Handle resize
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            currentIndex = Math.min(currentIndex, getMaxIndex());
            updateCardsToShow();
        }, 100);
    });
    
    // Initialize
    updateCardsToShow();
    startAutoSlide();
});
</script>