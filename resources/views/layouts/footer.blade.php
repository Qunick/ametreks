<footer class="bg-[#052734] text-white">
    
    {{-- Partners & Associations Section --}}
    <section class="border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
            
            {{-- Section Header --}}
            <div class="text-center mb-12">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-[#4D8BB2]/20 text-[#4D8BB2] text-xs font-semibold tracking-[0.15em] uppercase rounded-full border border-[#4D8BB2]/30 mb-5">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    Trusted Partnerships
                </span>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white tracking-tight">
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
            
            <div class="flex flex-wrap items-center justify-center gap-6 md:gap-8 lg:gap-10">
                @foreach($associations as $partner)
                    <a href="#" class="group relative" title="{{ $partner['name'] }}">
                        <div class="w-28 h-20 md:w-36 md:h-24 bg-white rounded-2xl p-4 flex items-center justify-center border-2 border-transparent group-hover:border-[#99c723] shadow-lg shadow-black/30 group-hover:shadow-[#99c723]/30 transition-all duration-500 group-hover:-translate-y-1">
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
    <section class="border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
            
            <div class="text-center mb-12">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-[#99c723]/15 text-[#99c723] text-xs font-semibold tracking-[0.15em] uppercase rounded-full border border-[#99c723]/30 mb-5">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd"/>
                    </svg>
                    Recognition
                </span>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white tracking-tight">
                    Awards & Achievements
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                {{-- Award 1 --}}
                <div class="group relative overflow-hidden rounded-3xl bg-[#005991]/30 border border-[#4D8BB2]/40 p-8 hover:border-[#99c723] transition-all duration-500 hover:-translate-y-1">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-[#4D8BB2]/20 rounded-full blur-3xl group-hover:bg-[#99c723]/20 transition-all duration-700"></div>
                    <div class="relative">
                        <div class="w-16 h-16 rounded-2xl bg-[#005991] flex items-center justify-center mb-6 shadow-lg shadow-[#005991]/50 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Excellence in Sustainable Tourism</h3>
                        <p class="text-[#99c723] text-sm font-semibold mb-3">Nepal Tourism Awards 2023</p>
                        <p class="text-white/70 text-sm leading-relaxed">Recognized for eco-friendly trekking practices and community engagement</p>
                    </div>
                </div>

                {{-- Award 2 --}}
                <div class="group relative overflow-hidden rounded-3xl bg-[#005991]/30 border border-[#4D8BB2]/40 p-8 hover:border-[#99c723] transition-all duration-500 hover:-translate-y-1">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-[#4D8BB2]/20 rounded-full blur-3xl group-hover:bg-[#99c723]/20 transition-all duration-700"></div>
                    <div class="relative">
                        <div class="w-16 h-16 rounded-2xl bg-[#005991] flex items-center justify-center mb-6 shadow-lg shadow-[#005991]/50 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Best Adventure Tour Operator</h3>
                        <p class="text-[#99c723] text-sm font-semibold mb-3">TAAN Annual Awards 2022</p>
                        <p class="text-white/70 text-sm leading-relaxed">Awarded for outstanding service and safety standards</p>
                    </div>
                </div>

                {{-- Award 3 --}}
                <div class="group relative overflow-hidden rounded-3xl bg-[#005991]/30 border border-[#4D8BB2]/40 p-8 hover:border-[#99c723] transition-all duration-500 hover:-translate-y-1">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-[#4D8BB2]/20 rounded-full blur-3xl group-hover:bg-[#99c723]/20 transition-all duration-700"></div>
                    <div class="relative">
                        <div class="w-16 h-16 rounded-2xl bg-[#005991] flex items-center justify-center mb-6 shadow-lg shadow-[#005991]/50 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Travelers' Choice Award</h3>
                        <p class="text-[#99c723] text-sm font-semibold mb-3">Tripadvisor 2023</p>
                        <p class="text-white/70 text-sm leading-relaxed">Based on traveler reviews and satisfaction ratings</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Footer Content --}}
    <section class="border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8">
                
                {{-- Brand & Newsletter Column --}}
                <div class="lg:col-span-5 space-y-8">
                    {{-- Logo --}}
                    <div>
                        <a href="/" class="inline-block">
                            <span class="text-3xl font-bold text-white">AME<span class="text-[#99c723]">Treks</span></span>
                        </a>
                    </div>
                    
                    <p class="text-white/80 leading-relaxed max-w-md text-base">
                        Discover the magic of the Himalayas with our expert-guided treks and adventure packages. Creating unforgettable memories since 2010.
                    </p>
                    
                    {{-- Social Links --}}
                    <div class="flex gap-3 pt-2">
                        <a href="#" class="w-12 h-12 rounded-2xl bg-white/10 hover:bg-[#005991] flex items-center justify-center transition-all duration-300 group border border-white/20 hover:border-[#005991] hover:scale-110">
                            <svg class="w-5 h-5 text-white group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-2xl bg-white/10 hover:bg-[#005991] flex items-center justify-center transition-all duration-300 group border border-white/20 hover:border-[#005991] hover:scale-110">
                            <svg class="w-5 h-5 text-white group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.073-1.689-.073-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-2xl bg-white/10 hover:bg-[#005991] flex items-center justify-center transition-all duration-300 group border border-white/20 hover:border-[#005991] hover:scale-110">
                            <svg class="w-5 h-5 text-white group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-2xl bg-white/10 hover:bg-[#005991] flex items-center justify-center transition-all duration-300 group border border-white/20 hover:border-[#005991] hover:scale-110">
                            <svg class="w-5 h-5 text-white group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
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
                            <h4 class="text-sm font-bold text-[#4D8BB2] tracking-wide uppercase mb-6 flex items-center gap-2">
                                <span class="w-8 h-0.5 bg-[#99c723] rounded-full"></span>
                                Quick Links
                            </h4>
                            <ul class="space-y-4">
                                @foreach(['Home', 'About Us', 'Tours & Packages', 'Photo Gallery', 'Customer Reviews', 'Contact Us'] as $link)
                                    <li>
                                        <a href="#" class="text-white/70 hover:text-[#99c723] text-sm transition-all duration-300 inline-flex items-center gap-2 group">
                                            <svg class="w-3 h-3 text-[#99c723] opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $link }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Popular Treks --}}
                        <div>
                            <h4 class="text-sm font-bold text-[#4D8BB2] tracking-wide uppercase mb-6 flex items-center gap-2">
                                <span class="w-8 h-0.5 bg-[#99c723] rounded-full"></span>
                                Popular Treks
                            </h4>
                            <ul class="space-y-4">
                                @foreach(['Everest Base Camp', 'Annapurna Circuit', 'Langtang Valley', 'Manaslu Circuit', 'Upper Mustang', 'Gokyo Lakes'] as $trek)
                                    <li>
                                        <a href="#" class="text-white/70 hover:text-[#99c723] text-sm transition-all duration-300 inline-flex items-center gap-2 group">
                                            <svg class="w-3 h-3 text-[#99c723] opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $trek }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Contact Info --}}
                        <div class="col-span-2 md:col-span-1">
                            <h4 class="text-sm font-bold text-[#4D8BB2] tracking-wide uppercase mb-6 flex items-center gap-2">
                                <span class="w-8 h-0.5 bg-[#99c723] rounded-full"></span>
                                Get In Touch
                            </h4>
                            <ul class="space-y-5">
                                <li>
                                    <a href="mailto:{{ config('settings.email', 'info@ametreks.com') }}" class="group flex items-start gap-4">
                                        <span class="w-11 h-11 rounded-xl bg-[#005991] flex items-center justify-center flex-shrink-0 group-hover:bg-[#99c723] transition-all duration-300">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </span>
                                        <span class="text-sm text-white/80 group-hover:text-[#99c723] transition-colors pt-2.5">
                                            {{ config('settings.email', 'info@ametreks.com') }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:{{ config('settings.phone', '+9779800000000') }}" class="group flex items-start gap-4">
                                        <span class="w-11 h-11 rounded-xl bg-[#005991] flex items-center justify-center flex-shrink-0 group-hover:bg-[#99c723] transition-all duration-300">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                        </span>
                                        <span class="text-sm text-white/80 group-hover:text-[#99c723] transition-colors pt-2.5">
                                            {{ config('settings.phone', '+977 980-0000000') }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="group flex items-start gap-4">
                                        <span class="w-11 h-11 rounded-xl bg-[#005991] flex items-center justify-center flex-shrink-0">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </span>
                                        <span class="text-sm text-white/80 pt-2.5">
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
    <section class="border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-10">
                
                {{-- Certification Badge --}}
                <div class="flex items-center gap-5">
                    <div class="w-18 h-18 rounded-2xl bg-[#005991] p-4 flex items-center justify-center flex-shrink-0 shadow-lg shadow-[#005991]/40">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-white font-bold text-lg">Licensed & Certified</h4>
                        <p class="text-white/60 text-sm">Authorized by Nepal Government & Tourism Board</p>
                    </div>
                </div>

                {{-- Stats --}}
                <div class="flex flex-wrap items-center justify-center gap-8 lg:gap-12">
                    <div class="text-center group">
                        <p class="text-4xl lg:text-5xl font-bold text-white group-hover:text-[#4D8BB2] transition-colors">15<span class="text-[#99c723]">+</span></p>
                        <p class="text-xs text-white/60 uppercase tracking-widest mt-2 font-medium">Years</p>
                    </div>
                    <div class="w-px h-14 bg-white/20 hidden sm:block"></div>
                    <div class="text-center group">
                        <p class="text-4xl lg:text-5xl font-bold text-white group-hover:text-[#4D8BB2] transition-colors">5000<span class="text-[#99c723]">+</span></p>
                        <p class="text-xs text-white/60 uppercase tracking-widest mt-2 font-medium">Happy Clients</p>
                    </div>
                    <div class="w-px h-14 bg-white/20 hidden sm:block"></div>
                    <div class="text-center group">
                        <p class="text-4xl lg:text-5xl font-bold text-white group-hover:text-[#4D8BB2] transition-colors">50<span class="text-[#99c723]">+</span></p>
                        <p class="text-xs text-white/60 uppercase tracking-widest mt-2 font-medium">Destinations</p>
                    </div>
                    <div class="w-px h-14 bg-white/20 hidden sm:block"></div>
                    <div class="text-center group">
                        <p class="text-4xl lg:text-5xl font-bold text-white group-hover:text-[#4D8BB2] transition-colors">4.9<span class="text-[#99c723]">★</span></p>
                        <p class="text-xs text-white/60 uppercase tracking-widest mt-2 font-medium">Rating</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Bottom Bar --}}
    <section class="bg-[#052734]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-white/60 text-sm text-center md:text-left">
                    &copy; {{ date('Y') }} <span class="text-[#99c723] font-medium">AME Treks</span>. All rights reserved.
                </p>
                <div class="flex flex-wrap items-center justify-center gap-6">
                    <a href="#" class="text-white/60 hover:text-[#99c723] text-sm transition-colors">Privacy Policy</a>
                    <span class="text-white/20">|</span>
                    <a href="#" class="text-white/60 hover:text-[#99c723] text-sm transition-colors">Terms & Conditions</a>
                    <span class="text-white/20">|</span>
                    <a href="#" class="text-white/60 hover:text-[#99c723] text-sm transition-colors">Sitemap</a>
                </div>
            </div>
        </div>
    </section>
</footer>