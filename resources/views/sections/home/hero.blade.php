{{-- <section class="relative w-full min-h-screen flex items-center justify-center text-white overflow-hidden bg-black py-8 md:py-0"
        style="
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.8)), url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920&h=1080&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        ">
        <div class="absolute inset-0 bg-black/50"></div>
        
        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8 lg:gap-12 items-center pt-16 md:pt-24 lg:pt-0">
                <div class="space-y-6 md:space-y-8 order-2 lg:order-1">
                    <div>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black mb-3 md:mb-4 leading-tight">
                            Discover The
                            <br>
                            <span class="bg-gradient-to-r from-orange-400 via-pink-500 to-red-500 bg-clip-text text-transparent">
                                Himalayan Magic
                            </span>
                        </h1>
                       <div class="flex items-center flex-wrap sm:flex-nowrap gap-3 mt-4 md:mt-6">
    <span class="text-white/70 text-base sm:text-lg md:text-xl">
        With
    </span>

    <span class="inline-flex items-center 
                 px-3 sm:px-4 py-1 sm:py-1.5
                 rounded-full 
                 bg-white/10 backdrop-blur-md 
                 text-white text-sm sm:text-base md:text-lg font-medium
                 border border-white/20
                 whitespace-nowrap">
        Adventure, Nature &amp; Memories
    </span>
</div>

                    </div>
                    <div class="space-y-3 md:space-y-4">
                        <div class="flex items-center justify-between">
                            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-orange-400 flex items-center gap-2">
                                <i class="bi bi-geo-alt-fill text-orange-400 text-xl md:text-2xl lg:text-3xl"></i>
                                <span id="region-name">Nepal</span>
                            </h2>
                        </div>

                        <div class="text-white/80 text-sm sm:text-base md:text-lg space-y-1 md:space-y-2 line-clamp-3">
                            <p id="region-description">
                                Nepal is a land of towering Himalayas, vibrant culture, and spiritual heritage. 
                                Home to Mount Everest and ancient cities, it offers breathtaking landscapes and warm hospitality. 
                                From trekking adventures to rich traditions, Nepal captivates every traveler with its natural beauty and cultural depth.
                            </p>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <a href="{{ route('customizePlan') }}" 
                       class="inline-flex items-center px-6 py-3 md:px-8 md:py-4 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold text-base md:text-lg rounded-xl hover:shadow-2xl hover:shadow-orange-500/30 transition-all hover:scale-105 group w-full sm:w-auto justify-center">
                        See All 
                        <i class="bi bi-chevron-right ml-2 md:ml-3 text-lg md:text-xl group-hover:translate-x-2 transition-transform"></i>
                    </a>
                </div>

                <!-- Right Section - Card Carousel -->
                <div class="relative w-full order-1 lg:order-2 flex flex-col items-center justify-center gap-8">
                    <!-- Single Card Display - Landscape Rectangle -->
                    <div class="relative w-full max-w-md md:max-w-2xl">
                        <div id="card-display" 
                             class="w-full aspect-video rounded-2xl overflow-hidden shadow-2xl transition-all duration-700 ease-in-out">
                            <div class="w-full h-full bg-cover bg-center"
                                 id="card-image"
                                 style="background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop')">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6">
                                    <h3 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white" id="card-name">
                                        Nepal
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Indicator Dots - Outside Card -->
                    <div class="flex gap-3">
                        <button class="indicator-dot w-3 h-3 rounded-full bg-white/50 transition-all duration-300 hover:bg-white/75" data-index="0"></button>
                        <button class="indicator-dot w-3 h-3 rounded-full bg-white/50 transition-all duration-300 hover:bg-white/75" data-index="1"></button>
                        <button class="indicator-dot w-3 h-3 rounded-full bg-white/50 transition-all duration-300 hover:bg-white/75" data-index="2"></button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Spacing -->
        <div class="lg:hidden h-12"></div>
    </section>

    <style>
        .bg-gradient-to-r.from-orange-400.via-pink-500.to-red-500 {
            background-size: 200% 200%;
            animation: gradientShift 3s ease infinite;
        }
        
        @keyframes gradientShift {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        .indicator-dot.active {
            background-color: rgb(255, 255, 255);
            width: 1rem;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Region Data - Main array only
            const regions = [
                {
                    id: 0,
                    name: 'Nepal',
                    description: 'Nepal is a land of towering Himalayas, vibrant culture, and spiritual heritage. Home to Mount Everest and ancient cities, it offers breathtaking landscapes and warm hospitality. From trekking adventures to rich traditions, Nepal captivates every traveler with its natural beauty and cultural depth.',
                    image: 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop'
                },
                {
                    id: 1,
                    name: 'Bhutan',
                    description: 'Bhutan, the Land of the Thunder Dragon, is a mystical kingdom nestled in the Eastern Himalayas. Known for its Gross National Happiness philosophy, ancient monasteries, and pristine landscapes, Bhutan offers a unique blend of spiritual enlightenment and natural beauty that captivates every visitor.',
                    image: 'https://images.unsplash.com/photo-1580502304786-4d0cab1c5b42?w=800&h=600&fit=crop'
                },
                {
                    id: 2,
                    name: 'Tibet',
                    description: 'Tibet, known as the Roof of the World, is a land of spiritual mystery and breathtaking high-altitude landscapes. From the majestic Potala Palace to sacred Mount Kailash, Tibet offers a journey through ancient Buddhist traditions and some of the most spectacular mountain scenery on Earth.',
                    image: 'https://images.unsplash.com/photo-1548013146-72479768bada?w=800&h=600&fit=crop'
                }
            ];

            // Rotating words
            // const words = ['Adventure', 'Nature', 'Memories'];
            // let currentWordIndex = 0;
            // const rotatingWordElement = document.getElementById('rotating-word');
            
            // // Rotate words every 2 seconds
            // setInterval(() => {
            //     currentWordIndex = (currentWordIndex + 1) % words.length;
            //     rotatingWordElement.textContent = words[currentWordIndex];
            // }, 1000);

            // Carousel functionality
            let currentIndex = 0;
            const indicatorDots = document.querySelectorAll('.indicator-dot');
            const cardDisplay = document.getElementById('card-display');
            const cardImage = document.getElementById('card-image');
            const cardName = document.getElementById('card-name');
            const regionName = document.getElementById('region-name');
            const regionDescription = document.getElementById('region-description');

            // Update card display
            function updateCard(index) {
                const region = regions[index];
                
                // Update card
                cardImage.style.backgroundImage = `url('${region.image}')`;
                cardName.textContent = region.name;
                
                // Update left section
                regionName.textContent = region.name;
                regionDescription.textContent = region.description;
                
                // Update indicators
                indicatorDots.forEach((dot, i) => {
                    if (i === index) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
            }

            // Indicator dot click handlers
            indicatorDots.forEach(dot => {
                dot.addEventListener('click', function() {
                    currentIndex = parseInt(this.dataset.index);
                    updateCard(currentIndex);
                });
            });

            // Auto rotate every 4 seconds
            setInterval(() => {
                currentIndex = (currentIndex + 1) % regions.length;
                updateCard(currentIndex);
            }, 4000);

            // Initialize
            updateCard(0);
        });
    </script> --}}


<!-- Hero Section with YouTube-style Video Intro -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Video -->
    <div class="absolute inset-0 z-0">
        <video 
            id="heroVideo" 
            class="w-full h-full object-cover" 
            autoplay 
            muted 
            loop 
            playsinline
            poster="https://images.unsplash.com/photo-1464278533981-50106e6176b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2074&q=80"
        >
            <source src="{{ asset('user-assets/videosReels/m.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        
        <!-- Gradient overlay for better text readability -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/70"></div>
    </div>

    <!-- Hero Content -->
    <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 text-center py-16">
        <!-- Changing Text Container -->
        <div class="mb-8 sm:mb-12 lg:mb-16">
            <!-- Main Changing Text -->
            <div class="mb-6 sm:mb-8">
                <div class="h-16 sm:h-20 md:h-24 lg:h-28 flex items-center justify-center overflow-hidden">
                    <h1 id="mainChangingText" class="text-3xl xs:text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-bold text-white transition-all duration-700 ease-in-out transform">
                        Into the Himalayas
                    </h1>
                </div>
            </div>
            
            <!-- Subtitle Changing Text -->
            <div class="px-2">
                <div class="h-20 sm:h-24 md:h-28 flex items-center justify-center overflow-hidden">
                    <p id="subtitleChangingText" class="text-base xs:text-lg sm:text-xl md:text-2xl lg:text-3xl text-gray-100 leading-relaxed max-w-2xl sm:max-w-3xl md:max-w-4xl mx-auto font-light transition-all duration-700 ease-in-out transform">
                        With more than 20 years of experience, AME Treks leads you beyond the ordinary—where adventure, culture, and challenge meet.
                    </p>
                </div>
            </div>
        </div>

        <!-- Search Section - Transparent -->
        <div class=" backdrop-blur-md rounded-lg sm:rounded-xl lg:rounded-2xl p-4 sm:p-6 md:p-8 max-w-full xs:max-w-sm sm:max-w-xl md:max-w-2xl lg:max-w-3xl mx-auto shadow-2xl border border-white/20">
            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-white mb-4 sm:mb-6 drop-shadow-lg">
                Find Your Perfect Trek
            </h2>
        
        <div class="flex flex-col sm:flex-row gap-3">
            <input 
                type="text" 
                placeholder="Search Treks"
                class="flex-1 px-6 py-3 rounded-lg border border-slate-300 text-slate-900 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <button class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
                Search
            </button>
        </div>
    </div>
</div>

    <!-- Video Controls -->
    <div class="absolute bottom-4 left-4 z-20">
        <button id="muteToggle" class="bg-black/40 hover:bg-black/60 text-white p-2.5 sm:p-3 rounded-full transition-all backdrop-blur-sm border border-white/20 hover:scale-110">
            <i id="muteIcon" class="fas fa-volume-up text-sm sm:text-base md:text-lg"></i>
        </button>
    </div>
</section>

<!-- JavaScript for dynamic functionality -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Main text changing effect
        const mainTextLines = [
            "Into the Himalayas",
            "Where Adventure Awaits",
            "Experience the Culture",
            "Challenge Your Limits",
            
        ];
        
        // Subtitle changing text (the specified text variations)
        const subtitleTextLines = [
            "With more than 20 years of experience, AME Treks leads you beyond the ordinary—where adventure, culture, and challenge meet.",
            "Two decades of expertise guiding you through Himalayan wonders where every step is a story.",
            "Over 20 years mastering Himalayan adventures that blend culture, challenge, and breathtaking beauty.",
            "For 20+ years, we've redefined Himalayan trekking—where extraordinary experiences become lifelong memories.",
            "Two decades of leading adventurers beyond the ordinary into the heart of Himalayan majesty."
        ];
        
        let currentMainLine = 0;
        let currentSubtitleLine = 0;
        const mainChangingText = document.getElementById('mainChangingText');
        const subtitleChangingText = document.getElementById('subtitleChangingText');
        
        // Function to change main text
        function changeMainText() {
            // Fade out
            mainChangingText.style.opacity = '0';
            mainChangingText.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                currentMainLine = (currentMainLine + 1) % mainTextLines.length;
                mainChangingText.textContent = mainTextLines[currentMainLine];
                
                // Fade in with new text
                setTimeout(() => {
                    mainChangingText.style.opacity = '1';
                    mainChangingText.style.transform = 'translateY(0)';
                }, 50);
            }, 500);
        }
        
        // Function to change subtitle text
        function changeSubtitleText() {
            // Fade out
            subtitleChangingText.style.opacity = '0';
            subtitleChangingText.style.transform = 'translateY(10px)';
            
            setTimeout(() => {
                currentSubtitleLine = (currentSubtitleLine + 1) % subtitleTextLines.length;
                subtitleChangingText.textContent = subtitleTextLines[currentSubtitleLine];
                
                // Fade in with new text
                setTimeout(() => {
                    subtitleChangingText.style.opacity = '1';
                    subtitleChangingText.style.transform = 'translateY(0)';
                }, 50);
            }, 500);
        }
        
        // Start text rotation after initial load
        setTimeout(() => {
            // Start with main text
            changeMainText();
            setInterval(changeMainText, 4000);
            
            // Start subtitle text slightly offset
            setTimeout(() => {
                changeSubtitleText();
                setInterval(changeSubtitleText, 4000);
            }, 2000);
        }, 2000);
        
        // Mute/unmute video functionality
        const video = document.getElementById('heroVideo');
        const muteToggle = document.getElementById('muteToggle');
        const muteIcon = document.getElementById('muteIcon');
        
        if (muteToggle) {
            muteToggle.addEventListener('click', function() {
                video.muted = !video.muted;
                muteIcon.className = video.muted ? 'fas fa-volume-mute' : 'fas fa-volume-up';
                this.classList.toggle('bg-red-500/40', video.muted);
                this.classList.toggle('bg-black/40', !video.muted);
            });
        }
        
        // Search form submission
        const searchForm = document.getElementById('trekSearchForm');
        
        if (searchForm) {
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const destination = document.getElementById('destination').value.trim();
                
                if (!destination) {
                    // Add shake animation to input
                    const input = document.getElementById('destination');
                    input.classList.add('animate-shake');
                    input.focus();
                    
                    setTimeout(() => {
                        input.classList.remove('animate-shake');
                    }, 500);
                    
                    return;
                }
                
                // Show loading state
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Searching...';
                submitBtn.disabled = true;
                
                // Simulate search delay
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    
                    // Show success message
                    const notification = document.createElement('div');
                    notification.className = 'fixed top-4 right-4 bg-green-500/90 text-white px-4 py-3 rounded-xl shadow-2xl z-50 animate-fade-in backdrop-blur-sm border border-white/20';
                    notification.innerHTML = `<i class="fas fa-check-circle mr-2"></i> Searching for "${destination}"...`;
                    document.body.appendChild(notification);
                    
                    setTimeout(() => {
                        notification.remove();
                    }, 3000);
                    
                    // Clear input
                    document.getElementById('destination').value = '';
                    
                    // Here you would typically redirect or show results
                    console.log('Searching for:', destination);
                }, 1500);
            });
        }
        
        // Handle popular trek tag clicks
        document.querySelectorAll('.trek-tag').forEach(tag => {
            tag.addEventListener('click', function() {
                const trekName = this.textContent.replace(/[^a-zA-Z\s]/g, '').trim();
                document.getElementById('destination').value = trekName;
                
                // Focus and highlight input
                const input = document.getElementById('destination');
                input.focus();
                input.classList.add('ring-2', 'ring-white');
                
                setTimeout(() => {
                    input.classList.remove('ring-2', 'ring-white');
                }, 1000);
            });
        });
        
        // Add placeholder cycling for search input
        const placeholders = [
            "Search for Everest Base Camp...",
            "Find Annapurna Circuit treks...",
            "Discover Langtang Valley...",
            "Explore Manaslu Circuit...",
            "Search Himalayan adventures..."
        ];
        
        let placeholderIndex = 0;
        const destinationInput = document.getElementById('destination');
        
        function cyclePlaceholder() {
            destinationInput.setAttribute('placeholder', placeholders[placeholderIndex]);
            placeholderIndex = (placeholderIndex + 1) % placeholders.length;
        }
        
        // Start placeholder cycling
        setInterval(cyclePlaceholder, 3000);
        
        // Initial placeholder
        destinationInput.setAttribute('placeholder', placeholders[0]);
        
        // Responsive video controls
        function handleResize() {
            const video = document.getElementById('heroVideo');
            
            // Adjust video for mobile
            if (window.innerWidth < 640) {
                video.setAttribute('playsinline', '');
                video.setAttribute('webkit-playsinline', '');
                video.muted = true;
            }
        }
        
        // Initial check and resize listener
        handleResize();
        window.addEventListener('resize', handleResize);
    });
</script>

<!-- Additional responsive styles -->
<style>
    /* Smooth transitions */
    #mainChangingText, #subtitleChangingText {
        transition: opacity 0.7s ease, transform 0.7s ease;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.8);
    }
    
    .trek-tag {
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    /* Custom breakpoints for extra small devices */
    @media (max-width: 360px) {
        #mainChangingText {
            font-size: 1.75rem;
        }
        
        #subtitleChangingText {
            font-size: 0.875rem;
        }
    }
    
    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.3s ease-out;
    }
    
    .animate-shake {
        animation: shake 0.5s ease-in-out;
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
    }
    
    ::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.5);
    }
    
    @@supports (-webkit-touch-callout: none) {
        .min-h-screen {
            min-height: -webkit-fill-available;
        }
        
        section {
            min-height: -webkit-fill-available;
        }
    }
    
    /* Better focus styles */
    input:focus, button:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
    }
    
    /* Smooth video loading */
    video {
        background: linear-gradient(45deg, #0f172a, #1e293b);
    }
    
    /* Glass effect enhancement */
    .backdrop-blur-md {
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }
</style>