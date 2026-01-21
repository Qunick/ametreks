{{-- Motorcycle Tour Section - Cinematic full-width section with dramatic typography --}}
<section class="relative min-h-[100svh] overflow-hidden bg-[#052734]">
    
    {{-- Background Image with Parallax Effect --}}
    <div class="absolute inset-0">
        <img 
            src="{{ asset('user-assets/images/motercycle/hero.jpg') }}" 
            alt="Motorcycle adventure through mountain passes"
            class="w-full h-full object-cover object-center scale-105 transition-transform duration-[3000ms] hover:scale-100"
        >
        {{-- Gradient Overlays for Text Readability --}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#052734] via-[#052734]/80 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#052734] via-transparent to-[#052734]/40"></div>
    </div>

    {{-- Animated Grain Texture Overlay --}}
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" 
         style="background-image: url('data:image/svg+xml,%3Csvg viewBox=\"0 0 200 200\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cfilter id=\"noise\"%3E%3CfeTurbulence type=\"fractalNoise\" baseFrequency=\"0.65\" numOctaves=\"3\" stitchTiles=\"stitch\"/%3E%3C/filter%3E%3Crect width=\"100%\" height=\"100%\" filter=\"url(%23noise)\"/%3E%3C/svg%3E');">
    </div>

    {{-- Main Content Container --}}
    <div class="relative z-10 min-h-[100svh] flex items-center">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 py-16 sm:py-20 lg:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 xl:gap-12 items-center">
                
                {{-- Left Content - Typography Section --}}
                <div class="lg:col-span-7 space-y-5 sm:space-y-6 lg:space-y-8">
                    
                    {{-- Eyebrow Label --}}
                    <div class="flex items-center gap-3 sm:gap-4">
                        <span class="w-8 sm:w-10 lg:w-12 h-px bg-[#99c723]"></span>
                        <span class="text-[#99c723] text-xs sm:text-sm font-medium tracking-[0.2em] sm:tracking-[0.3em] uppercase">
                            Adventure Awaits
                        </span>
                    </div>

                    {{-- Main Headline - Split Typography Style --}}
                    <div class="space-y-1 sm:space-y-2">
                        <h2 class="text-4xl xs:text-5xl sm:text-6xl md:text-7xl lg:text-6xl xl:text-7xl 2xl:text-8xl font-bold text-white leading-[0.9] tracking-tight">
                            <span class="block">RIDE</span>
                            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-[#4D8BB2] to-[#005991]">
                                THE WILD
                            </span>
                        </h2>
                        <div class="flex items-baseline gap-2 sm:gap-4 pt-1 sm:pt-2">
                            <span class="text-5xl xs:text-6xl sm:text-7xl md:text-8xl lg:text-7xl xl:text-8xl 2xl:text-9xl font-extralight text-white/20 tracking-tighter">
                                ROADS
                            </span>
                        </div>
                    </div>

                    {{-- Descriptive Text Lines --}}
                    <div class="max-w-xl space-y-3 sm:space-y-4 pt-2 sm:pt-4">
                        <p class="text-base sm:text-lg lg:text-xl text-[#4D8BB2] leading-relaxed font-light">
                            Conquer the highest motorable roads in the world. 
                            <span class="text-white font-medium">Feel the freedom</span> 
                            of endless horizons stretching before you.
                        </p>
                        <p class="text-sm sm:text-base text-[#6D6E70] leading-relaxed hidden sm:block">
                            From the serpentine curves of Khardung La to the pristine valleys of Spiti — 
                            experience motorcycle touring at its most raw and exhilarating.
                        </p>
                    </div>

                    {{-- Stats Row --}}
                    <div class="flex flex-wrap gap-4 sm:gap-6 lg:gap-8 pt-4 sm:pt-6 border-t border-[#005991]/30">
                        <div class="space-y-0.5 sm:space-y-1">
                            <span class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white">18,380</span>
                            <span class="block text-[10px] sm:text-xs text-[#6D6E70] uppercase tracking-wider">Feet Altitude</span>
                        </div>
                        <div class="space-y-0.5 sm:space-y-1">
                            <span class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white">1,200+</span>
                            <span class="block text-[10px] sm:text-xs text-[#6D6E70] uppercase tracking-wider">KM Routes</span>
                        </div>
                        <div class="space-y-0.5 sm:space-y-1">
                            <span class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white">15</span>
                            <span class="block text-[10px] sm:text-xs text-[#6D6E70] uppercase tracking-wider">Day Expeditions</span>
                        </div>
                    </div>

                    {{-- CTA Buttons --}}
                    <div class="flex flex-col xs:flex-row flex-wrap items-start xs:items-center gap-3 sm:gap-4 pt-2 sm:pt-4">
                        <a href="" 
                           class="group inline-flex items-center gap-2 sm:gap-3 px-5 sm:px-6 lg:px-8 py-3 sm:py-3.5 lg:py-4 bg-[#005991] hover:bg-[#4D8BB2] text-white text-sm sm:text-base font-semibold rounded-full transition-all duration-300 hover:shadow-lg hover:shadow-[#005991]/25">
                            <span>Explore Tours</span>
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="" 
                           class="group inline-flex items-center gap-2 sm:gap-3 px-4 sm:px-6 py-2 sm:py-4 text-white hover:text-[#99c723] text-sm sm:text-base font-medium transition-colors duration-300">
                            <span class="w-10 h-10 sm:w-12 sm:h-12 rounded-full border-2 border-white/30 group-hover:border-[#99c723] flex items-center justify-center transition-colors duration-300">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </span>
                            <span>Watch Film</span>
                        </a>
                    </div>
                </div>

                {{-- Right Side - Stacked Image Gallery (BIGGER & CLOSER) --}}
                <div class="lg:col-span-5 relative mt-8 lg:mt-0">
                    <div class="relative h-[500px] xs:h-[550px] sm:h-[600px] md:h-[650px] lg:h-[680px] xl:h-[720px] 2xl:h-[760px]">
                        
                        {{-- Image 1 - Top Right --}}
                        <div class="absolute top-0 right-0 w-36 xs:w-44 sm:w-52 md:w-56 lg:w-52 xl:w-60 2xl:w-64 z-30 group cursor-pointer">
                            <div class="relative overflow-hidden rounded-xl sm:rounded-2xl shadow-2xl shadow-black/50 ring-1 ring-white/10">
                                <img 
                                    src="{{ asset('user-assets/images/motercycle/download.jpg') }}" 
                                    alt="Rider on mountain pass"
                                    class="w-full aspect-[4/5] object-cover transition-transform duration-700 group-hover:scale-110"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-[#052734]/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute bottom-2 sm:bottom-4 left-2 sm:left-4 right-2 sm:right-4 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-2 group-hover:translate-y-0">
                                    <span class="text-white text-xs sm:text-sm font-medium">Khardung La Pass</span>
                                    <span class="block text-[#99c723] text-[10px] sm:text-xs">18,380 ft</span>
                                </div>
                            </div>
                            {{-- Decorative Frame --}}
                            <div class="absolute -inset-2 sm:-inset-3 border border-[#005991]/30 rounded-xl sm:rounded-2xl -z-10"></div>
                        </div>

                        {{-- Image 2 - Center Left (closer to Image 1) --}}
                        <div class="absolute top-[28%] sm:top-[25%] left-0 w-40 xs:w-48 sm:w-56 md:w-64 lg:w-56 xl:w-64 2xl:w-72 z-20 group cursor-pointer">
                            <div class="relative overflow-hidden rounded-xl sm:rounded-2xl shadow-2xl shadow-black/50 ring-1 ring-white/10">
                                <img 
                                    src="{{ asset('user-assets/images/motercycle/Team-photo-in-Annapurna.jpg') }}" 
                                    alt="Motorcycle convoy through valley"
                                    class="w-full aspect-[4/5] object-cover transition-transform duration-700 group-hover:scale-110"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-[#052734]/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute bottom-2 sm:bottom-4 left-2 sm:left-4 right-2 sm:right-4 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-2 group-hover:translate-y-0">
                                    <span class="text-white text-xs sm:text-sm font-medium">Spiti Valley</span>
                                    <span class="block text-[#99c723] text-[10px] sm:text-xs">The Middle Land</span>
                                </div>
                            </div>
                        </div>

                        {{-- Image 3 - Bottom Right (closer to Image 2) --}}
                        <div class="absolute bottom-0 right-4 sm:right-6 md:right-8 lg:right-6 xl:right-8 w-36 xs:w-44 sm:w-52 md:w-56 lg:w-52 xl:w-60 2xl:w-64 z-10 group cursor-pointer">
                            <div class="relative overflow-hidden rounded-xl sm:rounded-2xl shadow-2xl shadow-black/50 ring-1 ring-white/10">
                                <img 
                                    src="{{ asset('user-assets/images/motercycle/upper-mustang-motorbike-tour-5.jpg') }}" 
                                    alt="Campsite under stars"
                                    class="w-full aspect-[4/5] object-cover transition-transform duration-700 group-hover:scale-110"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-[#052734]/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute bottom-2 sm:bottom-4 left-2 sm:left-4 right-2 sm:right-4 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-2 group-hover:translate-y-0">
                                    <span class="text-white text-xs sm:text-sm font-medium">Pangong Lake Camp</span>
                                    <span class="block text-[#99c723] text-[10px] sm:text-xs">Under the Stars</span>
                                </div>
                            </div>
                            {{-- Decorative Element --}}
                            <div class="absolute -bottom-2 sm:-bottom-4 -left-2 sm:-left-4 w-16 sm:w-20 lg:w-24 h-16 sm:h-20 lg:h-24 border border-dashed border-[#4D8BB2]/30 rounded-full -z-10"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @media (min-width: 475px) {
        .xs\:text-5xl { font-size: 3rem; line-height: 1; }
        .xs\:text-6xl { font-size: 3.75rem; line-height: 1; }
        .xs\:h-\[550px\] { height: 550px; }
        .xs\:w-44 { width: 11rem; }
        .xs\:w-48 { width: 12rem; }
        .xs\:block { display: block; }
        .xs\:flex-row { flex-direction: row; }
        .xs\:items-center { align-items: center; }
    }
</style>