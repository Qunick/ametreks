<!-- Nepal Bhutan Tibet Section -->
<section class="py-24 relative overflow-hidden min-h-screen flex items-center bg-[#F1F3F6]">
    <!-- Removed Background Image & Overlay -->
    <div class="container mx-auto max-w-6xl px-4 relative z-10 w-full">
        <!-- Section header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-6 py-3 bg-white/20 backdrop-blur-md text-black rounded-full text-sm font-semibold mb-8 border border-white/30">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                </svg>
                Explore Different Countries With Us
            </div>
           
            <div class="w-24 h-1 bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 mx-auto rounded-full"></div>
        </div>

        <!-- Single iFrame Container -->
        {{-- <div class="relative w-full max-w-5xl mx-auto bg-[#F1F3F6] backdrop-blur-xl rounded-3xl overflow-hidden shadow-2xl border border-white/20 p-8"> --}}
            
            <!-- Carousel Container -->
            <div class="relative">
                <!-- Cards Carousel -->
                <div class="relative h-96 overflow-hidden rounded-2xl">
                    <!-- Card 1: Nepal -->
                    <div class="carousel-slide absolute inset-0 transition-all duration-700 ease-in-out" data-index="0">
                        <div class="relative h-full rounded-2xl overflow-hidden">
                            <img src="{{ asset('user-assets/images/different-countries/nepal.jpg') }}" 
                                 alt="Nepal Himalayas" 
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <h3 class="text-6xl md:text-7xl font-black text-white drop-shadow-2xl tracking-wider">NEPAL</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Bhutan -->
                    <div class="carousel-slide absolute inset-0 transition-all duration-700 ease-in-out translate-x-full" data-index="1">
                        <div class="relative h-full rounded-2xl overflow-hidden">
                            <img src="{{ asset('user-assets/images/different-countries/bhutan.jpg') }}" 
                                 alt="Bhutan Landscape" 
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <h3 class="text-6xl md:text-7xl font-black text-white drop-shadow-2xl tracking-wider">BHUTAN</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Tibet -->
                    <div class="carousel-slide absolute inset-0 transition-all duration-700 ease-in-out translate-x-full" data-index="2">
                        <div class="relative h-full rounded-2xl overflow-hidden">
                            <img src="{{ asset('user-assets/images/different-countries/tibet.jpg') }}" 
                                 alt="Tibet Potala Palace" 
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <h3 class="text-6xl md:text-7xl font-black text-white drop-shadow-2xl tracking-wider">TIBET</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Arrows (Inside frame) -->
                <button onclick="prevSlide()"
                        class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-[#005991]/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-rgb(241, 243, 246)/40 transition-all border border-white/30 z-10">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                
                <button onclick="nextSlide()"
                        class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-[#005991]/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/40 transition-all border border-white/30 z-10">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Navigation Dots -->
            <div class="flex justify-center items-center gap-3 mt-8">
                <button class="dot-indicator w-3 h-3 rounded-full bg-[#005991]/40 hover:bg-white transition-all duration-300"
                        data-index="0"
                        onclick="goToSlide(0)">
                    <span class="sr-only">Nepal</span>
                </button>
                <button class="dot-indicator w-3 h-3 rounded-full bg-[#005991]/40 hover:bg-white transition-all duration-300"
                        data-index="1"
                        onclick="goToSlide(1)">
                    <span class="sr-only">Bhutan</span>
                </button>
                <button class="dot-indicator w-3 h-3 rounded-full bg-[#005991]/40 hover:bg-white transition-all duration-300"
                        data-index="2"
                        onclick="goToSlide(2)">
                    <span class="sr-only">Tibet</span>
                </button>
            </div>

            <!-- Description -->
            <div class="mt-8 text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full mb-4 border border-[#005991]/20">
                    <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span id="destination-title" class="text-black text-sm font-semibold">Why Choose Nepal?</span>
                </div>
                <p id="destination-description" class="text-black text-base leading-relaxed transition-opacity duration-300">
                    Home to Mount Everest, Nepal offers world-class trekking routes through the Himalayas, rich cultural heritage in Kathmandu Valley, and diverse landscapes from jungles to snow-capped peaks.
                </p>
            </div>
        </div>
    </div>
</section>

<script>
    // Destination descriptions data
    const destinations = {
        0: {
            title: "Why Choose Nepal?",
            description: "Home to Mount Everest, Nepal offers world-class trekking routes through the Himalayas, rich cultural heritage in Kathmandu Valley, and diverse landscapes from jungles to snow-capped peaks. Experience authentic Sherpa culture and visit UNESCO World Heritage Sites."
        },
        1: {
            title: "Why Choose Bhutan?",
            description: "The Land of the Thunder Dragon focuses on Gross National Happiness over GDP. Experience preserved Buddhist culture, stunning dzongs (fortresses), and pristine natural beauty. Bhutan offers a unique blend of ancient traditions and sustainable tourism."
        },
        2: {
            title: "Why Choose Tibet?",
            description: "The 'Roof of the World' offers spiritual journeys to sacred Mount Kailash, breathtaking high-altitude landscapes, and rich Tibetan Buddhist heritage. Visit the iconic Potala Palace and experience unique high-altitude culture that has captivated travelers for centuries."
        }
    };

    let currentSlide = 0;
    const totalSlides = 3;
    let autoSlideInterval;

    document.addEventListener('DOMContentLoaded', function() {
        updateIndicators();
        updateDestinationInfo();
        startAutoSlide();
    });

    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            nextSlide();
        }, 4000);
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
        updateDestinationInfo();
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateCarousel();
        updateDestinationInfo();
    }

    function goToSlide(index) {
        currentSlide = index;
        updateCarousel();
        updateDestinationInfo();
        resetAutoSlide();
    }

    function updateCarousel() {
        const slides = document.querySelectorAll('.carousel-slide');
        slides.forEach((slide, index) => {
            slide.classList.remove('translate-x-full', '-translate-x-full');
            if (index === currentSlide) {
                slide.classList.remove('translate-x-full', '-translate-x-full');
            } else if (index < currentSlide) {
                slide.classList.add('-translate-x-full');
            } else {
                slide.classList.add('translate-x-full');
            }
        });
        updateIndicators();
    }

    function updateIndicators() {
        const dots = document.querySelectorAll('.dot-indicator');
        dots.forEach((dot, index) => {
            if (index === currentSlide) {
                dot.classList.remove('bg-[#005991]/40', 'w-3');
                dot.classList.add('bg-[#005991]', 'w-10');
            } else {
                dot.classList.remove('bg-[#005991]/40', 'w-10');
                dot.classList.add('bg-[#005991]/40', 'w-3');
            }
        });
    }

    function updateDestinationInfo() {
        const destination = destinations[currentSlide];
        const titleElement = document.getElementById('destination-title');
        const descriptionElement = document.getElementById('destination-description');
        
        descriptionElement.style.opacity = '0';
        
        setTimeout(() => {
            titleElement.textContent = destination.title;
            descriptionElement.textContent = destination.description;
            descriptionElement.style.opacity = '1';
        }, 200);
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    const carousel = document.querySelector('.relative.h-96');
    if (carousel) {
        carousel.addEventListener('mouseenter', () => {
            clearInterval(autoSlideInterval);
        });
        
        carousel.addEventListener('mouseleave', () => {
            startAutoSlide();
        });
    }
</script>

<style>
    .carousel-slide {
        transition: transform 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .dot-indicator {
        transition: all 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    section {
        animation: fadeIn 0.8s ease-out;
    }

    #destination-description {
        transition: opacity 0.3s ease-in-out;
    }
</style>