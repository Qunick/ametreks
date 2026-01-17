{{-- Motorcycle Tour Section - Cinematic full-width section with dramatic typography --}}
<section class="relative min-h-screen overflow-hidden bg-stone-950">
    
    {{-- Background Image with Parallax Effect --}}
    <div class="absolute inset-0">
        <img 
            src="{{ asset('user-assets/images/motercycle/hero.jpg') }}" 
            alt="Motorcycle adventure through mountain passes"
            class="w-full h-full object-cover object-center scale-105 transition-transform duration-[3000ms] hover:scale-100"
        >
        {{-- Gradient Overlays for Text Readability --}}
        <div class="absolute inset-0 bg-gradient-to-r from-stone-950 via-stone-950/80 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-transparent to-stone-950/40"></div>
    </div>

    {{-- Animated Grain Texture Overlay --}}
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" 
         style="background-image: url('data:image/svg+xml,%3Csvg viewBox=\"0 0 200 200\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cfilter id=\"noise\"%3E%3CfeTurbulence type=\"fractalNoise\" baseFrequency=\"0.65\" numOctaves=\"3\" stitchTiles=\"stitch\"/%3E%3C/filter%3E%3Crect width=\"100%\" height=\"100%\" filter=\"url(%23noise)\"/%3E%3C/svg%3E');">
    </div>

    {{-- Main Content Container --}}
    <div class="relative z-10 min-h-screen flex items-center">
        <div class="container mx-auto px-6 lg:px-12 py-24">
            <div class="grid lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                {{-- Left Content - Typography Section --}}
                <div class="lg:col-span-7 space-y-8">
                    
                    {{-- Eyebrow Label --}}
                    <div class="flex items-center gap-4">
                        <span class="w-12 h-px bg-amber-500"></span>
                        <span class="text-amber-500 text-sm font-medium tracking-[0.3em] uppercase">
                            Adventure Awaits
                        </span>
                    </div>

                    {{-- Main Headline - Split Typography Style --}}
                    <div class="space-y-2">
                        <h2 class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-bold text-white leading-[0.9] tracking-tight">
                            <span class="block">RIDE</span>
                            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500">
                                THE WILD
                            </span>
                        </h2>
                        <div class="flex items-baseline gap-4 pt-2">
                            <span class="text-6xl sm:text-7xl lg:text-8xl xl:text-9xl font-extralight text-white/20 tracking-tighter">
                                ROADS
                            </span>
                        </div>
                    </div>

                    {{-- Descriptive Text Lines --}}
                    <div class="max-w-xl space-y-4 pt-4">
                        <p class="text-lg sm:text-xl text-stone-300 leading-relaxed font-light">
                            Conquer the highest motorable roads in the world. 
                            <span class="text-white font-medium">Feel the freedom</span> 
                            of endless horizons stretching before you.
                        </p>
                        <p class="text-stone-400 leading-relaxed">
                            From the serpentine curves of Khardung La to the pristine valleys of Spiti — 
                            experience motorcycle touring at its most raw and exhilarating.
                        </p>
                    </div>

                    {{-- Stats Row --}}
                    <div class="flex flex-wrap gap-8 pt-6 border-t border-stone-800">
                        <div class="space-y-1">
                            <span class="text-3xl sm:text-4xl font-bold text-white">18,380</span>
                            <span class="block text-xs text-stone-500 uppercase tracking-wider">Feet Altitude</span>
                        </div>
                        <div class="space-y-1">
                            <span class="text-3xl sm:text-4xl font-bold text-white">1,200+</span>
                            <span class="block text-xs text-stone-500 uppercase tracking-wider">KM Routes</span>
                        </div>
                        <div class="space-y-1">
                            <span class="text-3xl sm:text-4xl font-bold text-white">15</span>
                            <span class="block text-xs text-stone-500 uppercase tracking-wider">Day Expeditions</span>
                        </div>
                    </div>

                    {{-- CTA Buttons --}}
                    <div class="flex flex-wrap items-center gap-4 pt-4">
                        <a href="" 
                           class="group inline-flex items-center gap-3 px-8 py-4 bg-amber-500 hover:bg-amber-400 text-stone-950 font-semibold rounded-full transition-all duration-300 hover:shadow-lg hover:shadow-amber-500/25">
                            <span>Explore Tours</span>
                            <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="" 
                           class="group inline-flex items-center gap-3 px-6 py-4 text-white hover:text-amber-400 font-medium transition-colors duration-300">
                            <span class="w-12 h-12 rounded-full border-2 border-white/30 group-hover:border-amber-400 flex items-center justify-center transition-colors duration-300">
                                <svg class="w-5 h-5 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </span>
                            <span>Watch Film</span>
                        </a>
                    </div>
                </div>

                {{-- Right Side - Stacked Image Gallery --}}
                <div class="lg:col-span-5 relative">
                    <div class="relative h-[500px] sm:h-[600px] lg:h-[700px]">
                        
                        {{-- Image 1 - Top Right --}}
                        <div class="absolute top-0 right-0 w-48 sm:w-56 lg:w-64 z-30 group cursor-pointer">
                            <div class="relative overflow-hidden rounded-2xl shadow-2xl shadow-black/50 ring-1 ring-white/10">
                                <img 
                                    src="{{ asset('user-assets/images/motercycle/download.jpg') }}" 
                                    alt="Rider on mountain pass"
                                    class="w-full aspect-[3/4] object-cover transition-transform duration-700 group-hover:scale-110"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-stone-950/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute bottom-4 left-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-2 group-hover:translate-y-0">
                                    <span class="text-white text-sm font-medium">Khardung La Pass</span>
                                    <span class="block text-amber-400 text-xs">18,380 ft</span>
                                </div>
                            </div>
                            {{-- Decorative Frame --}}
                            <div class="absolute -inset-3 border border-amber-500/20 rounded-2xl -z-10"></div>
                        </div>

                        {{-- Image 2 - Middle --}}
                        <div class="absolute top-1/4 right-16 sm:right-20 lg:right-24 w-52 sm:w-60 lg:w-72 z-20 group cursor-pointer">
                            <div class="relative overflow-hidden rounded-2xl shadow-2xl shadow-black/50 ring-1 ring-white/10">
                                <img 
                                    src="{{ asset('user-assets/images/motercycle/Team-photo-in-Annapurna.jpg') }}" 
                                    alt="Motorcycle convoy through valley"
                                    class="w-full aspect-[4/5] object-cover transition-transform duration-700 group-hover:scale-110"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-stone-950/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute bottom-4 left-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-2 group-hover:translate-y-0">
                                    <span class="text-white text-sm font-medium">Spiti Valley</span>
                                    <span class="block text-amber-400 text-xs">The Middle Land</span>
                                </div>
                            </div>
                        </div>

                        {{-- Image 3 - Bottom --}}
                        <div class="absolute bottom-0 right-8 sm:right-10 lg:right-12 w-44 sm:w-52 lg:w-60 z-10 group cursor-pointer">
                            <div class="relative overflow-hidden rounded-2xl shadow-2xl shadow-black/50 ring-1 ring-white/10">
                                <img 
                                    src="{{ asset('user-assets/images/motercycle/upper-mustang-motorbike-tour-5.jpg') }}" 
                                    alt="Campsite under stars"
                                    class="w-full aspect-[3/4] object-cover transition-transform duration-700 group-hover:scale-110"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-stone-950/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute bottom-4 left-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-2 group-hover:translate-y-0">
                                    <span class="text-white text-sm font-medium">Pangong Lake Camp</span>
                                    <span class="block text-amber-400 text-xs">Under the Stars</span>
                                </div>
                            </div>
                            {{-- Decorative Element --}}
                            <div class="absolute -bottom-4 -left-4 w-24 h-24 border border-dashed border-stone-700 rounded-full -z-10"></div>
                        </div>

                        {{-- Floating Badge --}}
                        <div class="absolute top-12 left-0 lg:-left-8 z-40">
                            <div class="bg-stone-900/90 backdrop-blur-sm border border-stone-800 rounded-xl px-5 py-4 shadow-xl">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-amber-500/10 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block text-white font-semibold text-sm">Premium Bikes</span>
                                        <span class="block text-stone-500 text-xs">Royal Enfield Himalayan</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Vertical Text --}}
                        <div class="absolute -left-4 top-1/2 -translate-y-1/2 hidden xl:block">
                            <span class="text-stone-700 text-xs tracking-[0.4em] uppercase rotate-[-90deg] block whitespace-nowrap origin-center">
                                Motorcycle Expeditions
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Add to your CSS or create a style block --}}
<style>
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        animation: marquee 30s linear infinite;
    }
</style>
