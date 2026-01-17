<!-- Hero Section - Immersive Trekking Experience -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-slate-950">
    <!-- Background Video -->
    <div class="absolute inset-0 z-0">
        <video 
            id="heroVideo" 
            class="w-full h-full object-cover scale-105" 
            autoplay 
            muted 
            loop 
            playsinline
            poster="https://images.unsplash.com/photo-1464278533981-50106e6176b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2074&q=80"
        >
            <source src="{{ asset('user-assets/videosReels/m.mp4') }}" type="video/mp4">
        </video>
        
        <!-- Refined gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/80 via-slate-950/40 to-slate-950/90"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/60 via-transparent to-slate-950/60"></div>
    </div>

    <!-- Floating Stats Badge - Top Right -->
    <div class="absolute top-6 right-6 md:top-10 md:right-10 z-20 hidden sm:block">
        <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl px-5 py-4 text-white">
            <div class="flex items-center gap-4">
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-amber-400">20+</div>
                    <div class="text-xs text-white/70 uppercase tracking-wider">Years</div>
                </div>
                <div class="w-px h-10 bg-white/20"></div>
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-amber-400">500+</div>
                    <div class="text-xs text-white/70 uppercase tracking-wider">Treks</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Hero Content -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32">
        <div class="flex flex-col items-center text-center">
            
            <!-- Eyebrow Text -->
            <div class="inline-flex items-center gap-2 mb-6 md:mb-8">
                <span class="w-8 h-px bg-amber-400"></span>
                <span class="text-amber-400 text-sm md:text-base font-medium uppercase tracking-[0.2em]">
                    AME Treks & Expedition
                </span>
                <span class="w-8 h-px bg-amber-400"></span>
            </div>

            <!-- Main Headline with Animation -->
            <div class="mb-6 md:mb-8 overflow-hidden">
                <h1 
                    id="mainChangingText" 
                    class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-bold text-white leading-[1.1] tracking-tight hero-text-animate"
                >
                    Into the Himalayas
                </h1>
            </div>

            <!-- Subtitle with Animation -->
            <div class="max-w-3xl mb-10 md:mb-14 overflow-hidden px-4">
                <p 
                    id="subtitleChangingText" 
                    class="text-base sm:text-lg md:text-xl lg:text-2xl text-white/80 leading-relaxed font-light hero-text-animate"
                >
                    With more than 20 years of experience, AME Treks leads you beyond the ordinary—where adventure, culture, and challenge meet.
                </p>
            </div>

            <!-- Search Section - Glassmorphism Card -->
            <div class="w-full max-w-2xl">
                <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl md:rounded-3xl p-6 md:p-8 shadow-2xl">
                    <h2 class="text-lg md:text-xl font-semibold text-white mb-5 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Find Your Perfect Trek
                    </h2>
                    
                    <form id="trekSearchForm" class="flex flex-col sm:flex-row gap-3">
                        <div class="relative flex-1">
                            <input 
                                type="text" 
                                id="destination"
                                placeholder="Search destinations, treks..."
                                class="w-full px-5 py-4 rounded-xl bg-white/95 border-0 text-slate-800 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-400 transition-all text-base"
                            />
                        </div>
                        <button 
                            type="submit" 
                            class="px-8 py-4 bg-amber-500 hover:bg-amber-400 text-slate-900 font-semibold rounded-xl transition-all duration-300 hover:shadow-lg hover:shadow-amber-500/30 flex items-center justify-center gap-2 group"
                        >
                            <span>Search</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    </form>

                    <!-- Quick Links -->
                    <div class="flex flex-wrap justify-center gap-2 mt-5">
                        <span class="text-white/50 text-sm">Popular:</span>
                        <a href="#" class="text-sm text-white/70 hover:text-amber-400 transition-colors">Everest Base Camp</a>
                        <span class="text-white/30">•</span>
                        <a href="#" class="text-sm text-white/70 hover:text-amber-400 transition-colors">Annapurna Circuit</a>
                        <span class="text-white/30">•</span>
                        <a href="#" class="text-sm text-white/70 hover:text-amber-400 transition-colors">Langtang Valley</a>
                    </div>
                </div>
            </div>

            <!-- Destination Pills -->
            <div class="flex flex-wrap justify-center gap-3 mt-10 md:mt-14">
                @php
                    $destinations = ['Nepal', 'Bhutan', 'Tibet', 'India'];
                @endphp
                @foreach($destinations as $index => $destination)
                    <button 
                        class="destination-pill group relative px-6 py-3 rounded-full border border-white/20 text-white/80 text-sm md:text-base font-medium backdrop-blur-sm transition-all duration-300 hover:border-amber-400/50 hover:text-amber-400 {{ $index === 0 ? 'bg-amber-500/20 border-amber-400/50 text-amber-400' : 'bg-white/5' }}"
                        data-index="{{ $index }}"
                    >
                        {{ $destination }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Video Controls - Bottom Left -->
    <div class="absolute bottom-8 left-6 md:left-10 z-20">
        <button 
            id="muteToggle" 
            class="group flex items-center gap-3 backdrop-blur-xl bg-white/10 hover:bg-white/20 text-white px-4 py-3 rounded-full transition-all border border-white/20"
        >
            <span id="muteIcon" class="relative w-5 h-5">
                <svg class="unmuted-icon w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" />
                </svg>
                <svg class="muted-icon w-5 h-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                </svg>
            </span>
            <span class="text-sm font-medium hidden sm:block">Sound</span>
        </button>
    </div>
</section>

<style>
    /* Hero text animation */
    .hero-text-animate {
        transition: opacity 0.5s ease, transform 0.5s ease;
    }
    
    /* Smooth scale animation for video */
    @keyframes slowZoom {
        0%, 100% { transform: scale(1.05); }
        50% { transform: scale(1.1); }
    }
    
    #heroVideo {
        animation: slowZoom 30s ease-in-out infinite;
    }
    
    /* Destination pill active state */
    .destination-pill.active {
        background-color: rgba(245, 158, 11, 0.2);
        border-color: rgba(245, 158, 11, 0.5);
        color: #f59e0b;
    }
    
    /* Input shake animation */
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
    
    .animate-shake {
        animation: shake 0.3s ease-in-out;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Text content arrays
    const mainTextLines = [
        "Into the Himalayas",
        "Where Adventure Awaits",
        "Experience the Culture",
        "Challenge Your Limits"
    ];
    
    const subtitleTextLines = [
        "With more than 20 years of experience, AME Treks leads you beyond the ordinary—where adventure, culture, and challenge meet.",
        "Two decades of expertise guiding you through Himalayan wonders where every step is a story.",
        "Over 20 years mastering Himalayan adventures that blend culture, challenge, and breathtaking beauty.",
        "For 20+ years, we've redefined Himalayan trekking—where extraordinary experiences become lifelong memories."
    ];
    
    let currentIndex = 0;
    const mainText = document.getElementById('mainChangingText');
    const subtitleText = document.getElementById('subtitleChangingText');
    
    // Text rotation function
    function rotateText() {
        // Fade out
        mainText.style.opacity = '0';
        mainText.style.transform = 'translateY(20px)';
        subtitleText.style.opacity = '0';
        subtitleText.style.transform = 'translateY(10px)';
        
        setTimeout(() => {
            currentIndex = (currentIndex + 1) % mainTextLines.length;
            mainText.textContent = mainTextLines[currentIndex];
            subtitleText.textContent = subtitleTextLines[currentIndex % subtitleTextLines.length];
            
            // Fade in
            setTimeout(() => {
                mainText.style.opacity = '1';
                mainText.style.transform = 'translateY(0)';
                subtitleText.style.opacity = '1';
                subtitleText.style.transform = 'translateY(0)';
            }, 50);
        }, 500);
    }
    
    // Start rotation after 3 seconds
    setTimeout(() => {
        setInterval(rotateText, 5000);
    }, 3000);
    
    // Mute toggle
    const video = document.getElementById('heroVideo');
    const muteToggle = document.getElementById('muteToggle');
    const unmutedIcon = muteToggle.querySelector('.unmuted-icon');
    const mutedIcon = muteToggle.querySelector('.muted-icon');
    
    muteToggle.addEventListener('click', function() {
        video.muted = !video.muted;
        unmutedIcon.classList.toggle('hidden', !video.muted);
        mutedIcon.classList.toggle('hidden', video.muted);
    });
    
    // Destination pills
    const pills = document.querySelectorAll('.destination-pill');
    pills.forEach(pill => {
        pill.addEventListener('click', function() {
            pills.forEach(p => p.classList.remove('active', 'bg-amber-500/20', 'border-amber-400/50', 'text-amber-400'));
            pills.forEach(p => p.classList.add('bg-white/5'));
            this.classList.remove('bg-white/5');
            this.classList.add('active', 'bg-amber-500/20', 'border-amber-400/50', 'text-amber-400');
        });
    });
    
    // Search form
    const searchForm = document.getElementById('trekSearchForm');
    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const input = document.getElementById('destination');
        
        if (!input.value.trim()) {
            input.classList.add('animate-shake', 'ring-2', 'ring-red-400');
            setTimeout(() => {
                input.classList.remove('animate-shake', 'ring-2', 'ring-red-400');
            }, 500);
            return;
        }
        
        // Handle search submission
        console.log('Searching for:', input.value);
    });
});
</script>