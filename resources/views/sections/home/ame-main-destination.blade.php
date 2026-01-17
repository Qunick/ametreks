<!-- Nepal Bhutan Tibet Section -->
<section class="py-20 lg:py-28 relative overflow-hidden bg-slate-50">
    <!-- Subtle background pattern -->
    {{-- <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23000000&quot; fill-opacity=&quot;1&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div> --}}
    
    <div class="container mx-auto max-w-6xl px-4 sm:px-6 relative z-10">
        <!-- Section header -->
        <div class="text-center mb-14">
            <span class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-50 text-emerald-700 rounded-full text-xs font-semibold uppercase tracking-wider mb-6 border border-emerald-100">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Explore Destinations
            </span>
            
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 mb-4 tracking-tight">
                Discover the <span class="text-emerald-600">Himalayas</span>
            </h2>
            
            <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                Three unique kingdoms, endless adventures. Choose your next expedition.
            </p>
        </div>

        <!-- Carousel Container -->
        <div class="relative">
            <!-- Main Carousel -->
            <div class="relative h-[420px] sm:h-[480px] lg:h-[520px] overflow-hidden rounded-3xl shadow-2xl shadow-slate-900/10">
                <!-- Card 1: Nepal -->
                <div class="carousel-slide absolute inset-0 transition-transform duration-700 ease-out" data-index="0">
                    <div class="relative h-full group">
                        <img src="{{ asset('user-assets/images/different-countries/nepal.jpg') }}" 
                             alt="Nepal Himalayas" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent"></div>
                        
                        <!-- Content Overlay -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center p-8">
                            {{-- <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white/90 text-xs font-medium tracking-wide mb-4 border border-white/10">
                                8 of 10 World's Highest Peaks
                            </span> --}}
                            <h3 class="text-5xl sm:text-6xl lg:text-7xl font-black text-white tracking-tight mb-3">
                                NEPAL
                            </h3>
                            {{-- <p class="text-white/70 text-sm sm:text-base max-w-md text-center">
                                Gateway to Everest & Annapurna
                            </p> --}}
                        </div>
                        
                        <!-- Explore Button -->
                        <div class="absolute bottom-8 left-1/2 -translate-x-1/2">
                            <a href="#" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-slate-900 rounded-full font-semibold text-sm hover:bg-emerald-500 hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                Explore Nepal
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Bhutan -->
                <div class="carousel-slide absolute inset-0 transition-transform duration-700 ease-out translate-x-full" data-index="1">
                    <div class="relative h-full group">
                        <img src="{{ asset('user-assets/images/different-countries/bhutan.jpg') }}" 
                             alt="Bhutan Landscape" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent"></div>
                        
                        <div class="absolute inset-0 flex flex-col items-center justify-center p-8">
                            {{-- <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white/90 text-xs font-medium tracking-wide mb-4 border border-white/10">
                                Land of Gross National Happiness
                            </span> --}}
                            <h3 class="text-5xl sm:text-6xl lg:text-7xl font-black text-white tracking-tight mb-3">
                                BHUTAN
                            </h3>
                            {{-- <p class="text-white/70 text-sm sm:text-base max-w-md text-center">
                                The Last Shangri-La
                            </p> --}}
                        </div>
                        
                        <div class="absolute bottom-8 left-1/2 -translate-x-1/2">
                            <a href="#" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-slate-900 rounded-full font-semibold text-sm hover:bg-emerald-500 hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                Explore Bhutan
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Tibet -->
                <div class="carousel-slide absolute inset-0 transition-transform duration-700 ease-out translate-x-full" data-index="2">
                    <div class="relative h-full group">
                        <img src="{{ asset('user-assets/images/different-countries/tibet.jpg') }}" 
                             alt="Tibet Potala Palace" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent"></div>
                        
                        <div class="absolute inset-0 flex flex-col items-center justify-center p-8">
                            {{-- <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white/90 text-xs font-medium tracking-wide mb-4 border border-white/10">
                                Average Altitude 4,500m
                            </span> --}}
                            <h3 class="text-5xl sm:text-6xl lg:text-7xl font-black text-white tracking-tight mb-3">
                                TIBET
                            </h3>
                            {{-- <p class="text-white/70 text-sm sm:text-base max-w-md text-center">
                                The Roof of the World
                            </p> --}}
                        </div>
                        
                        <div class="absolute bottom-8 left-1/2 -translate-x-1/2">
                            <a href="#" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-slate-900 rounded-full font-semibold text-sm hover:bg-emerald-500 hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                Explore Tibet
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <button onclick="prevSlide()"
                        class="absolute left-4 sm:left-6 top-1/2 -translate-y-1/2 w-11 h-11 sm:w-12 sm:h-12 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center hover:bg-white/25 transition-all duration-300 border border-white/20 group z-10">
                    <svg class="w-5 h-5 text-white transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                
                <button onclick="nextSlide()"
                        class="absolute right-4 sm:right-6 top-1/2 -translate-y-1/2 w-11 h-11 sm:w-12 sm:h-12 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center hover:bg-white/25 transition-all duration-300 border border-white/20 group z-10">
                    <svg class="w-5 h-5 text-white transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Navigation Dots -->
            <div class="flex justify-center items-center gap-2 mt-8">
                <button class="dot-indicator w-2.5 h-2.5 rounded-full bg-slate-300 hover:bg-emerald-500 transition-all duration-300"
                        data-index="0"
                        onclick="goToSlide(0)">
                    <span class="sr-only">Nepal</span>
                </button>
                <button class="dot-indicator w-2.5 h-2.5 rounded-full bg-slate-300 hover:bg-emerald-500 transition-all duration-300"
                        data-index="1"
                        onclick="goToSlide(1)">
                    <span class="sr-only">Bhutan</span>
                </button>
                <button class="dot-indicator w-2.5 h-2.5 rounded-full bg-slate-300 hover:bg-emerald-500 transition-all duration-300"
                        data-index="2"
                        onclick="goToSlide(2)">
                    <span class="sr-only">Tibet</span>
                </button>
            </div>
        </div>

        <!-- Info Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-12">
            <div class="info-card group p-6 bg-white rounded-2xl border border-slate-100 hover:border-emerald-200 hover:shadow-lg hover:shadow-emerald-500/5 transition-all duration-300 cursor-pointer" data-index="0" onclick="goToSlide(0)">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-emerald-100 transition-colors">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-slate-900 mb-1 group-hover:text-emerald-600 transition-colors">Nepal</h4>
                        <p class="text-slate-500 text-sm leading-relaxed">Home to Everest and ancient temples. Experience Sherpa culture and world-class trekking.</p>
                    </div>
                </div>
            </div>
            
            <div class="info-card group p-6 bg-white rounded-2xl border border-slate-100 hover:border-emerald-200 hover:shadow-lg hover:shadow-emerald-500/5 transition-all duration-300 cursor-pointer" data-index="1" onclick="goToSlide(1)">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-emerald-100 transition-colors">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-slate-900 mb-1 group-hover:text-emerald-600 transition-colors">Bhutan</h4>
                        <p class="text-slate-500 text-sm leading-relaxed">Carbon-negative kingdom of happiness. Pristine nature meets Buddhist spirituality.</p>
                    </div>
                </div>
            </div>
            
            <div class="info-card group p-6 bg-white rounded-2xl border border-slate-100 hover:border-emerald-200 hover:shadow-lg hover:shadow-emerald-500/5 transition-all duration-300 cursor-pointer" data-index="2" onclick="goToSlide(2)">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-emerald-100 transition-colors">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-slate-900 mb-1 group-hover:text-emerald-600 transition-colors">Tibet</h4>
                        <p class="text-slate-500 text-sm leading-relaxed">Sacred Mount Kailash awaits. Discover Potala Palace and high-altitude mysticism.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let currentSlide = 0;
    const totalSlides = 3;
    let autoSlideInterval;

    document.addEventListener('DOMContentLoaded', function() {
        updateIndicators();
        updateInfoCards();
        startAutoSlide();
    });

    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            nextSlide();
        }, 5000);
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateCarousel();
    }

    function goToSlide(index) {
        currentSlide = index;
        updateCarousel();
        resetAutoSlide();
    }

    function updateCarousel() {
        const slides = document.querySelectorAll('.carousel-slide');
        slides.forEach((slide, index) => {
            slide.classList.remove('translate-x-full', '-translate-x-full');
            if (index < currentSlide) {
                slide.classList.add('-translate-x-full');
            } else if (index > currentSlide) {
                slide.classList.add('translate-x-full');
            }
        });
        updateIndicators();
        updateInfoCards();
        updateSlideCounter();
    }

    function updateIndicators() {
        const dots = document.querySelectorAll('.dot-indicator');
        dots.forEach((dot, index) => {
            if (index === currentSlide) {
                dot.classList.remove('bg-slate-300', 'w-2.5');
                dot.classList.add('bg-emerald-500', 'w-8');
            } else {
                dot.classList.remove('bg-emerald-500', 'w-8');
                dot.classList.add('bg-slate-300', 'w-2.5');
            }
        });
    }

    function updateInfoCards() {
        const cards = document.querySelectorAll('.info-card');
        cards.forEach((card, index) => {
            if (index === currentSlide) {
                card.classList.add('border-emerald-200', 'shadow-lg', 'shadow-emerald-500/5');
                card.classList.remove('border-slate-100');
            } else {
                card.classList.remove('border-emerald-200', 'shadow-lg', 'shadow-emerald-500/5');
                card.classList.add('border-slate-100');
            }
        });
    }

    function updateSlideCounter() {
        const counter = document.getElementById('current-slide');
        if (counter) {
            counter.textContent = String(currentSlide + 1).padStart(2, '0');
        }
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    // Pause on hover
    const carousel = document.querySelector('.relative.h-\\[420px\\]');
    if (carousel) {
        carousel.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
        carousel.addEventListener('mouseleave', () => startAutoSlide());
    }
</script>

<style>
    .carousel-slide {
        transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .dot-indicator {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>
