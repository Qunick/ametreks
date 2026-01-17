<footer class="bg-stone-950 text-stone-300">
    
    {{-- Partners & Associations Section --}}
    <section class="border-b border-stone-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
            
            {{-- Section Header --}}
            <div class="text-center mb-12">
                <span class="inline-block text-amber-500 text-xs font-medium tracking-[0.2em] uppercase mb-4">Trusted Partnerships</span>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-light text-white tracking-tight">
                    We Are Associated With
                </h2>
            </div>
            
            {{-- Partner Logos --}}
            @php
                $associations = [
                    ['logo' => asset('user-assets/Associates/government.jpg'), 'name' => 'Nepal Government'],
                    ['logo' => asset('user-assets/Associates/logo-taan.png'), 'name' => "Trekking Agencies' Association of Nepal"],
                    ['logo' => asset('user-assets/Associates/keep.png'), 'name' => 'Keep Nepal'],
                    ['logo' => asset('user-assets/Associates/NMA-Logo.png'), 'name' => 'Nepal Mountaineering Association'],
                    ['logo' => asset('user-assets/Associates/ntb-logo.jpg'), 'name' => 'Nepal Tourism Board']
                ];
            @endphp
            
            <div class="flex flex-wrap items-center justify-center gap-8 md:gap-12 lg:gap-16">
                @foreach($associations as $partner)
                    <a href="#" class="group relative" title="{{ $partner['name'] }}">
                        <div class="w-24 h-16 md:w-32 md:h-20 bg-white rounded-xl p-3 flex items-center justify-center border border-stone-700 group-hover:border-amber-500/50 group-hover:shadow-lg group-hover:shadow-amber-500/10 transition-all duration-500">
                            <img 
                                src="{{ $partner['logo'] }}" 
                                alt="{{ $partner['name'] }}"
                                class="max-h-full max-w-full object-contain transition-transform duration-500 group-hover:scale-105"
                            />
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Awards Section --}}
    <section class="border-b border-stone-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
            
            <div class="text-center mb-12">
                <span class="inline-block text-amber-500 text-xs font-medium tracking-[0.2em] uppercase mb-4">Recognition</span>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-light text-white tracking-tight">
                    Awards & Achievements
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                {{-- Award 1 --}}
                <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-stone-900 to-stone-900/50 border border-stone-800 p-6 lg:p-8 hover:border-amber-500/30 transition-all duration-500">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/5 rounded-full blur-3xl group-hover:bg-amber-500/10 transition-all duration-700"></div>
                    <div class="relative">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-stone-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-white mb-2">Excellence in Sustainable Tourism</h3>
                        <p class="text-amber-500/80 text-sm mb-3">Nepal Tourism Awards 2023</p>
                        <p class="text-stone-400 text-sm leading-relaxed">Recognized for eco-friendly trekking practices and community engagement</p>
                    </div>
                </div>

                {{-- Award 2 --}}
                <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-stone-900 to-stone-900/50 border border-stone-800 p-6 lg:p-8 hover:border-emerald-500/30 transition-all duration-500">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/5 rounded-full blur-3xl group-hover:bg-emerald-500/10 transition-all duration-700"></div>
                    <div class="relative">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-stone-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-white mb-2">Best Adventure Tour Operator</h3>
                        <p class="text-emerald-500/80 text-sm mb-3">TAAN Annual Awards 2022</p>
                        <p class="text-stone-400 text-sm leading-relaxed">Awarded for outstanding service and safety standards</p>
                    </div>
                </div>

                {{-- Award 3 --}}
                <div class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-stone-900 to-stone-900/50 border border-stone-800 p-6 lg:p-8 hover:border-rose-500/30 transition-all duration-500">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-rose-500/5 rounded-full blur-3xl group-hover:bg-rose-500/10 transition-all duration-700"></div>
                    <div class="relative">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-rose-500 to-rose-600 flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-stone-950" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-white mb-2">Travelers' Choice Award</h3>
                        <p class="text-rose-500/80 text-sm mb-3">Tripadvisor 2023</p>
                        <p class="text-stone-400 text-sm leading-relaxed">Based on traveler reviews and satisfaction ratings</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Footer Content --}}
    <section class="border-b border-stone-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8">
                
                {{-- Brand & Newsletter Column --}}
                <div class="lg:col-span-5 space-y-8">
                    {{-- Logo --}}
                    <div>
                        <a href="/" class="inline-block">
                            <span class="text-3xl font-bold text-white">AME<span class="text-amber-500">Treks</span></span>
                        </a>
                    </div>
                    
                    <p class="text-stone-400 leading-relaxed max-w-md">
                        Discover the magic of the Himalayas with our expert-guided treks and adventure packages. Creating unforgettable memories since 2010.
                    </p>

                    {{-- Newsletter --}}
                    {{-- <div class="pt-4">
                        <h4 class="text-white font-medium mb-4">Subscribe to our newsletter</h4>
                        <form class="flex flex-col sm:flex-row gap-3">
                            <input 
                                type="email" 
                                placeholder="Enter your email" 
                                class="flex-1 px-5 py-3.5 bg-stone-900 border border-stone-700 rounded-xl text-white placeholder-stone-500 focus:outline-none focus:border-amber-500/50 focus:ring-1 focus:ring-amber-500/20 transition-all"
                            />
                            <button type="submit" class="px-6 py-3.5 bg-amber-500 hover:bg-amber-400 text-stone-950 font-medium rounded-xl transition-colors duration-300 whitespace-nowrap">
                                Subscribe
                            </button>
                        </form>
                    </div> --}}

                    {{-- Social Links --}}
                    <div class="flex gap-3 pt-2">
                        <a href="#" class="w-11 h-11 rounded-xl bg-stone-800/50 hover:bg-amber-500 flex items-center justify-center transition-all duration-300 group">
                            <svg class="w-5 h-5 text-stone-400 group-hover:text-stone-950 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-11 h-11 rounded-xl bg-stone-800/50 hover:bg-amber-500 flex items-center justify-center transition-all duration-300 group">
                            <svg class="w-5 h-5 text-stone-400 group-hover:text-stone-950 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.073-1.689-.073-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-11 h-11 rounded-xl bg-stone-800/50 hover:bg-amber-500 flex items-center justify-center transition-all duration-300 group">
                            <svg class="w-5 h-5 text-stone-400 group-hover:text-stone-950 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-11 h-11 rounded-xl bg-stone-800/50 hover:bg-amber-500 flex items-center justify-center transition-all duration-300 group">
                            <svg class="w-5 h-5 text-stone-400 group-hover:text-stone-950 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Links Columns --}}
                <div class="lg:col-span-7">
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-8 lg:gap-12">
                        
                        {{-- Quick Links --}}
                        <div>
                            <h4 class="text-xs font-medium text-amber-500 tracking-[0.15em] uppercase mb-6">Quick Links</h4>
                            <ul class="space-y-4">
                                @foreach(['Home', 'About Us', 'Tours & Packages', 'Photo Gallery', 'Customer Reviews', 'Contact Us'] as $link)
                                    <li>
                                        <a href="#" class="text-stone-400 hover:text-white text-sm transition-colors duration-300 inline-flex items-center gap-2 group">
                                            <span class="w-0 h-px bg-amber-500 group-hover:w-4 transition-all duration-300"></span>
                                            {{ $link }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Popular Treks --}}
                        <div>
                            <h4 class="text-xs font-medium text-amber-500 tracking-[0.15em] uppercase mb-6">Popular Treks</h4>
                            <ul class="space-y-4">
                                @foreach(['Everest Base Camp', 'Annapurna Circuit', 'Langtang Valley', 'Manaslu Circuit', 'Upper Mustang', 'Gokyo Lakes'] as $trek)
                                    <li>
                                        <a href="#" class="text-stone-400 hover:text-white text-sm transition-colors duration-300 inline-flex items-center gap-2 group">
                                            <span class="w-0 h-px bg-amber-500 group-hover:w-4 transition-all duration-300"></span>
                                            {{ $trek }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Contact Info --}}
                        <div class="col-span-2 md:col-span-1">
                            <h4 class="text-xs font-medium text-amber-500 tracking-[0.15em] uppercase mb-6">Get In Touch</h4>
                            <ul class="space-y-5">
                                <li>
                                    <a href="mailto:{{ config('settings.email', 'info@ametreks.com') }}" class="group flex items-start gap-4">
                                        <span class="w-10 h-10 rounded-lg bg-stone-800/50 flex items-center justify-center flex-shrink-0 group-hover:bg-amber-500/10 transition-colors">
                                            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </span>
                                        <span class="text-sm text-stone-400 group-hover:text-white transition-colors pt-2">
                                            {{ config('settings.email', 'info@ametreks.com') }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:{{ config('settings.phone', '+9779800000000') }}" class="group flex items-start gap-4">
                                        <span class="w-10 h-10 rounded-lg bg-stone-800/50 flex items-center justify-center flex-shrink-0 group-hover:bg-amber-500/10 transition-colors">
                                            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                        </span>
                                        <span class="text-sm text-stone-400 group-hover:text-white transition-colors pt-2">
                                            {{ config('settings.phone', '+977 980-0000000') }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="group flex items-start gap-4">
                                        <span class="w-10 h-10 rounded-lg bg-stone-800/50 flex items-center justify-center flex-shrink-0">
                                            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </span>
                                        <span class="text-sm text-stone-400 pt-2">
                                            {{ config('settings.location', 'Thamel, Kathmandu, Nepal') }}
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Trust Badge Section --}}
    <section class="border-b border-stone-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                
                {{-- Certification Badge --}}
                <div class="flex items-center gap-5">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8 text-stone-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-white font-medium text-lg">Licensed & Certified</h4>
                        <p class="text-stone-400 text-sm">Authorized by Nepal Government & Tourism Board</p>
                    </div>
                </div>

                {{-- Stats --}}
                <div class="flex flex-wrap items-center justify-center gap-6 lg:gap-10">
                    <div class="text-center">
                        <p class="text-3xl lg:text-4xl font-light text-white">15<span class="text-amber-500">+</span></p>
                        <p class="text-xs text-stone-500 uppercase tracking-wider mt-1">Years</p>
                    </div>
                    <div class="w-px h-12 bg-stone-800 hidden sm:block"></div>
                    <div class="text-center">
                        <p class="text-3xl lg:text-4xl font-light text-white">5000<span class="text-amber-500">+</span></p>
                        <p class="text-xs text-stone-500 uppercase tracking-wider mt-1">Happy Clients</p>
                    </div>
                    <div class="w-px h-12 bg-stone-800 hidden sm:block"></div>
                    <div class="text-center">
                        <p class="text-3xl lg:text-4xl font-light text-white">100<span class="text-amber-500">%</span></p>
                        <p class="text-xs text-stone-500 uppercase tracking-wider mt-1">Safety Record</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Bottom Bar --}}
    <section>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                
                {{-- Copyright --}}
                <div class="flex flex-col sm:flex-row items-center gap-3 text-sm text-stone-500">
                    <p>&copy; {{ now()->year }} <span class="text-white">AME<span class="text-amber-500">Treks</span></span>. All rights reserved.</p>
                    <span class="hidden sm:block text-stone-700">|</span>
                    <p class="flex items-center gap-1.5">
                        Made with <span class="text-rose-500">&#10084;</span> in Nepal
                    </p>
                </div>

                {{-- Legal Links --}}
                <div class="flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-sm">
                    <a href="#" class="text-stone-500 hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="text-stone-500 hover:text-white transition-colors">Terms of Service</a>
                    <a href="#" class="text-stone-500 hover:text-white transition-colors">Booking Policy</a>
                    <a href="#" class="text-stone-500 hover:text-white transition-colors">Cancellation</a>
                </div>
            </div>
        </div>
    </section>

</footer>
