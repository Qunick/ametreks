@extends('layouts.app')

@section('title', 'Adventure Blog - Ame Treks')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[50vh] sm:min-h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('user-assets/images/blog-hero.jpg') }}" 
                 alt="Mountain landscape" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-[#052734]/80 via-[#052734]/60 to-[#052734]"></div>
        </div>
        
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block px-4 py-2 bg-[#005991]/20 border border-[#005991]/30 rounded-full text-white text-sm font-medium tracking-wider uppercase mb-4 sm:mb-6">
                Stories from the Summit
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-4 sm:mb-6 leading-tight">
                Adventure <span class="text-[#005991]">Blog</span>
            </h1>
            <p class="text-base sm:text-lg lg:text-xl text-gray-300 max-w-2xl mx-auto leading-relaxed px-4">
                Trail guides, expedition stories, gear reviews, and expert tips from our mountain veterans
            </p>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-6 sm:bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#005991]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Category Filter -->
    <section class="bg-white border-b border-gray-200 sticky top-0 z-40 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 py-3 sm:py-4 overflow-x-auto scrollbar-hide -mx-4 px-4 sm:mx-0 sm:px-0">
                <button class="px-4 sm:px-5 py-2 bg-[#005991] text-white rounded-full text-xs sm:text-sm font-semibold whitespace-nowrap transition-all hover:bg-[#004a7a]">
                    All Posts
                </button>
                <button class="px-4 sm:px-5 py-2 bg-gray-100 text-[#052734] rounded-full text-xs sm:text-sm font-medium whitespace-nowrap transition-all hover:bg-gray-200">
                    Expedition Stories
                </button>
                <button class="px-4 sm:px-5 py-2 bg-gray-100 text-[#052734] rounded-full text-xs sm:text-sm font-medium whitespace-nowrap transition-all hover:bg-gray-200">
                    Gear Guides
                </button>
                <button class="px-4 sm:px-5 py-2 bg-gray-100 text-[#052734] rounded-full text-xs sm:text-sm font-medium whitespace-nowrap transition-all hover:bg-gray-200">
                    Travel Tips
                </button>
                <button class="px-4 sm:px-5 py-2 bg-gray-100 text-[#052734] rounded-full text-xs sm:text-sm font-medium whitespace-nowrap transition-all hover:bg-gray-200">
                    Safety & Training
                </button>
                <button class="px-4 sm:px-5 py-2 bg-gray-100 text-[#052734] rounded-full text-xs sm:text-sm font-medium whitespace-nowrap transition-all hover:bg-gray-200">
                    Photography
                </button>
            </div>
        </div>
    </section>

    <!-- Featured Post -->
    <section class="bg-gray-50 py-10 sm:py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 mb-6 sm:mb-8">
                <div class="w-1 h-6 sm:h-8 bg-[#005991] rounded-full"></div>
                <h2 class="text-xl sm:text-2xl font-bold text-[#052734]">Featured Story</h2>
            </div>

            <article class="group relative bg-white rounded-xl sm:rounded-2xl overflow-hidden border border-gray-200 hover:border-[#005991]/30 transition-all duration-500 shadow-sm hover:shadow-lg">
                <div class="grid lg:grid-cols-2 gap-0">
                    <div class="relative h-56 sm:h-64 lg:h-auto lg:min-h-[400px] overflow-hidden">
                        <img src="{{ asset('user-assets/images/featured-blog.jpg') }}" 
                             alt="Featured post" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent lg:bg-gradient-to-r lg:from-transparent lg:to-white/20"></div>
                        <div class="absolute top-3 left-3 sm:top-4 sm:left-4">
                            <span class="px-3 py-1 bg-[#005991] text-white rounded-full text-xs font-bold uppercase tracking-wider">
                                Featured
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-5 sm:p-8 lg:p-12 flex flex-col justify-center">
                        <div class="flex flex-wrap items-center gap-2 sm:gap-4 mb-3 sm:mb-4">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold uppercase tracking-wider">
                                Expedition Stories
                            </span>
                            <span class="text-gray-500 text-xs sm:text-sm">15 min read</span>
                        </div>
                        
                        <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold text-[#052734] mb-3 sm:mb-4 group-hover:text-[#005991] transition-colors leading-tight">
                            Conquering Everest: A 60-Day Journey to the Roof of the World
                        </h3>
                        
                        <p class="text-gray-600 mb-4 sm:mb-6 leading-relaxed text-sm sm:text-base line-clamp-3 sm:line-clamp-none">
                            Follow our lead guide Tenzing Sherpa's incredible journey as he led a team of 12 climbers through treacherous conditions, unexpected storms, and moments of pure triumph on the world's highest peak.
                        </p>
                        
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('user-assets/images/author-1.jpg') }}" 
                                     alt="Author" 
                                     class="w-10 h-10 sm:w-12 sm:h-12 rounded-full object-cover border-2 border-[#005991]/30">
                                <div>
                                    <p class="text-[#052734] font-semibold text-sm sm:text-base">Tenzing Sherpa</p>
                                    <p class="text-gray-500 text-xs sm:text-sm">January 8, 2026</p>
                                </div>
                            </div>
                            
                            <a href="#" class="inline-flex items-center gap-2 text-[#005991] font-semibold group-hover:gap-3 transition-all text-sm sm:text-base">
                                Read Story
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <!-- Recent Posts Grid -->
    <section class="bg-white py-10 sm:py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8 sm:mb-10">
                <div class="flex items-center gap-3">
                    <div class="w-1 h-6 sm:h-8 bg-[#005991] rounded-full"></div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#052734]">Recent Posts</h2>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-gray-500 text-sm">Sort by:</span>
                    <select class="bg-gray-100 border border-gray-200 text-[#052734] text-sm rounded-lg px-3 py-2 focus:ring-[#005991] focus:border-[#005991]">
                        <option>Latest</option>
                        <option>Most Popular</option>
                        <option>Most Commented</option>
                    </select>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <!-- Post Card 1 -->
                <article class="group bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-[#005991]/30 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="relative h-48 sm:h-52 overflow-hidden">
                        <img src="{{ asset('user-assets/images/blog-1.jpg') }}" 
                             alt="Gear guide" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                        <span class="absolute top-3 left-3 sm:top-4 sm:left-4 px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold uppercase tracking-wider">
                            Gear Guides
                        </span>
                    </div>
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center gap-3 mb-2 sm:mb-3 text-xs sm:text-sm text-gray-500">
                            <span>Jan 12, 2026</span>
                            <span class="w-1 h-1 bg-gray-400 rounded-full"></span>
                            <span>8 min read</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-[#052734] mb-2 sm:mb-3 group-hover:text-[#005991] transition-colors line-clamp-2">
                            The Ultimate 2026 Trekking Gear Checklist for High-Altitude Adventures
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            Everything you need to pack for your next mountain expedition, from base layers to summit gear.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('user-assets/images/author-2.jpg') }}" 
                                     alt="Author" 
                                     class="w-7 h-7 sm:w-8 sm:h-8 rounded-full object-cover">
                                <span class="text-gray-600 text-xs sm:text-sm">Maya Chen</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-500 text-xs sm:text-sm">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    248
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    32
                                </span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Post Card 2 -->
                <article class="group bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-[#005991]/30 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="relative h-48 sm:h-52 overflow-hidden">
                        <img src="{{ asset('user-assets/images/blog-2.jpg') }}" 
                             alt="Annapurna trail" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                        <span class="absolute top-3 left-3 sm:top-4 sm:left-4 px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold uppercase tracking-wider">
                            Expedition Stories
                        </span>
                    </div>
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center gap-3 mb-2 sm:mb-3 text-xs sm:text-sm text-gray-500">
                            <span>Jan 10, 2026</span>
                            <span class="w-1 h-1 bg-gray-400 rounded-full"></span>
                            <span>12 min read</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-[#052734] mb-2 sm:mb-3 group-hover:text-[#005991] transition-colors line-clamp-2">
                            Annapurna Circuit: 21 Days Through Nepal's Most Iconic Trek
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            A day-by-day account of trekking through ancient villages, crossing high passes, and discovering Nepal.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('user-assets/images/author-3.jpg') }}" 
                                     alt="Author" 
                                     class="w-7 h-7 sm:w-8 sm:h-8 rounded-full object-cover">
                                <span class="text-gray-600 text-xs sm:text-sm">James Wilson</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-500 text-xs sm:text-sm">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    412
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    56
                                </span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Post Card 3 -->
                <article class="group bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-[#005991]/30 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="relative h-48 sm:h-52 overflow-hidden">
                        <img src="{{ asset('user-assets/images/blog-3.jpg') }}" 
                             alt="Safety training" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                        <span class="absolute top-3 left-3 sm:top-4 sm:left-4 px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold uppercase tracking-wider">
                            Safety & Training
                        </span>
                    </div>
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center gap-3 mb-2 sm:mb-3 text-xs sm:text-sm text-gray-500">
                            <span>Jan 8, 2026</span>
                            <span class="w-1 h-1 bg-gray-400 rounded-full"></span>
                            <span>10 min read</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-[#052734] mb-2 sm:mb-3 group-hover:text-[#005991] transition-colors line-clamp-2">
                            Understanding Altitude Sickness: Prevention, Recognition & Treatment
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            Essential knowledge every trekker needs to stay safe at high altitudes and recognize warning signs.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('user-assets/images/author-4.jpg') }}" 
                                     alt="Author" 
                                     class="w-7 h-7 sm:w-8 sm:h-8 rounded-full object-cover">
                                <span class="text-gray-600 text-xs sm:text-sm">Dr. Sarah Patel</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-500 text-xs sm:text-sm">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    589
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    78
                                </span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Post Card 4 -->
                <article class="group bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-[#005991]/30 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="relative h-48 sm:h-52 overflow-hidden">
                        <img src="{{ asset('user-assets/images/blog-4.jpg') }}" 
                             alt="Photography tips" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                        <span class="absolute top-3 left-3 sm:top-4 sm:left-4 px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-semibold uppercase tracking-wider">
                            Photography
                        </span>
                    </div>
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center gap-3 mb-2 sm:mb-3 text-xs sm:text-sm text-gray-500">
                            <span>Jan 5, 2026</span>
                            <span class="w-1 h-1 bg-gray-400 rounded-full"></span>
                            <span>6 min read</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-[#052734] mb-2 sm:mb-3 group-hover:text-[#005991] transition-colors line-clamp-2">
                            Mountain Photography: Capturing the Perfect Summit Sunrise
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            Pro tips for getting stunning photos at high altitude, from camera settings to composition techniques.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('user-assets/images/author-5.jpg') }}" 
                                     alt="Author" 
                                     class="w-7 h-7 sm:w-8 sm:h-8 rounded-full object-cover">
                                <span class="text-gray-600 text-xs sm:text-sm">Alex Kim</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-500 text-xs sm:text-sm">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    321
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    45
                                </span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Post Card 5 -->
                <article class="group bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-[#005991]/30 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="relative h-48 sm:h-52 overflow-hidden">
                        <img src="{{ asset('user-assets/images/blog-5.jpg') }}" 
                             alt="Travel tips" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                        <span class="absolute top-3 left-3 sm:top-4 sm:left-4 px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-semibold uppercase tracking-wider">
                            Travel Tips
                        </span>
                    </div>
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center gap-3 mb-2 sm:mb-3 text-xs sm:text-sm text-gray-500">
                            <span>Jan 3, 2026</span>
                            <span class="w-1 h-1 bg-gray-400 rounded-full"></span>
                            <span>7 min read</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-[#052734] mb-2 sm:mb-3 group-hover:text-[#005991] transition-colors line-clamp-2">
                            Best Time to Trek in Nepal: A Season-by-Season Guide
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            Plan your perfect trek with our comprehensive guide to Nepal's trekking seasons and weather patterns.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('user-assets/images/author-6.jpg') }}" 
                                     alt="Author" 
                                     class="w-7 h-7 sm:w-8 sm:h-8 rounded-full object-cover">
                                <span class="text-gray-600 text-xs sm:text-sm">Pemba Dorji</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-500 text-xs sm:text-sm">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    276
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    38
                                </span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Post Card 6 -->
                <article class="group bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-[#005991]/30 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="relative h-48 sm:h-52 overflow-hidden">
                        <img src="{{ asset('user-assets/images/blog-6.jpg') }}" 
                             alt="Expedition story" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                        <span class="absolute top-3 left-3 sm:top-4 sm:left-4 px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold uppercase tracking-wider">
                            Expedition Stories
                        </span>
                    </div>
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center gap-3 mb-2 sm:mb-3 text-xs sm:text-sm text-gray-500">
                            <span>Dec 28, 2025</span>
                            <span class="w-1 h-1 bg-gray-400 rounded-full"></span>
                            <span>14 min read</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-[#052734] mb-2 sm:mb-3 group-hover:text-[#005991] transition-colors line-clamp-2">
                            Langtang Valley: Rediscovering Nepal's Sacred Cheese Trail
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            A heartfelt journey through the rebuilt villages and stunning landscapes of the Langtang region.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('user-assets/images/author-7.jpg') }}" 
                                     alt="Author" 
                                     class="w-7 h-7 sm:w-8 sm:h-8 rounded-full object-cover">
                                <span class="text-gray-600 text-xs sm:text-sm">Lakpa Tamang</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-500 text-xs sm:text-sm">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    198
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    29
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-10 sm:mt-12">
                <nav class="flex items-center gap-1 sm:gap-2">
                    <button class="w-9 h-9 sm:w-10 sm:h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:border-[#005991] hover:text-[#005991] transition-all">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button class="w-9 h-9 sm:w-10 sm:h-10 flex items-center justify-center rounded-lg bg-[#005991] text-white font-semibold text-sm">1</button>
                    <button class="w-9 h-9 sm:w-10 sm:h-10 flex items-center justify-center rounded-lg border border-gray-200 text-[#052734] hover:border-[#005991] hover:text-[#005991] transition-all font-medium text-sm">2</button>
                    <button class="w-9 h-9 sm:w-10 sm:h-10 flex items-center justify-center rounded-lg border border-gray-200 text-[#052734] hover:border-[#005991] hover:text-[#005991] transition-all font-medium text-sm">3</button>
                    <span class="px-2 text-gray-400">...</span>
                    <button class="w-9 h-9 sm:w-10 sm:h-10 flex items-center justify-center rounded-lg border border-gray-200 text-[#052734] hover:border-[#005991] hover:text-[#005991] transition-all font-medium text-sm">12</button>
                    <button class="w-9 h-9 sm:w-10 sm:h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:border-[#005991] hover:text-[#005991] transition-all">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </nav>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="bg-[#052734] py-12 sm:py-16 lg:py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center justify-center w-14 h-14 sm:w-16 sm:h-16 rounded-full bg-[#005991]/20 mb-4 sm:mb-6">
                <svg class="w-7 h-7 sm:w-8 sm:h-8 text-[#005991]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-3 sm:mb-4">Subscribe to Our Newsletter</h2>
            <p class="text-gray-400 mb-6 sm:mb-8 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed">
                Get the latest trekking tips, expedition updates, and exclusive offers delivered straight to your inbox.
            </p>
            <form class="flex flex-col sm:flex-row gap-3 sm:gap-4 max-w-lg mx-auto">
                <input type="email" 
                       placeholder="Enter your email address" 
                       class="flex-1 px-4 sm:px-6 py-3 sm:py-4 rounded-full bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#005991] focus:border-transparent text-sm sm:text-base">
                <button type="submit" 
                        class="px-6 sm:px-8 py-3 sm:py-4 bg-[#005991] text-white rounded-full font-semibold hover:bg-[#004a7a] transition-all text-sm sm:text-base whitespace-nowrap">
                    Subscribe
                </button>
            </form>
            <p class="text-gray-500 text-xs sm:text-sm mt-4">
                No spam, unsubscribe anytime. We respect your privacy.
            </p>
        </div>
    </section>

    <!-- Popular Tags -->
    <section class="bg-gray-50 py-10 sm:py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 mb-6 sm:mb-8">
                <div class="w-1 h-6 sm:h-8 bg-[#005991] rounded-full"></div>
                <h2 class="text-xl sm:text-2xl font-bold text-[#052734]">Popular Topics</h2>
            </div>
            <div class="flex flex-wrap gap-2 sm:gap-3">
                <a href="#" class="px-4 sm:px-5 py-2 sm:py-2.5 bg-white border border-gray-200 rounded-full text-[#052734] text-sm font-medium hover:border-[#005991] hover:text-[#005991] transition-all">
                    Everest Base Camp
                </a>
                <a href="#" class="px-4 sm:px-5 py-2 sm:py-2.5 bg-white border border-gray-200 rounded-full text-[#052734] text-sm font-medium hover:border-[#005991] hover:text-[#005991] transition-all">
                    Annapurna Circuit
                </a>
                <a href="#" class="px-4 sm:px-5 py-2 sm:py-2.5 bg-white border border-gray-200 rounded-full text-[#052734] text-sm font-medium hover:border-[#005991] hover:text-[#005991] transition-all">
                    Trekking Gear
                </a>
                <a href="#" class="px-4 sm:px-5 py-2 sm:py-2.5 bg-white border border-gray-200 rounded-full text-[#052734] text-sm font-medium hover:border-[#005991] hover:text-[#005991] transition-all">
                    Altitude Sickness
                </a>
                <a href="#" class="px-4 sm:px-5 py-2 sm:py-2.5 bg-white border border-gray-200 rounded-full text-[#052734] text-sm font-medium hover:border-[#005991] hover:text-[#005991] transition-all">
                    Nepal Travel
                </a>
                <a href="#" class="px-4 sm:px-5 py-2 sm:py-2.5 bg-white border border-gray-200 rounded-full text-[#052734] text-sm font-medium hover:border-[#005991] hover:text-[#005991] transition-all">
                    Photography
                </a>
                <a href="#" class="px-4 sm:px-5 py-2 sm:py-2.5 bg-white border border-gray-200 rounded-full text-[#052734] text-sm font-medium hover:border-[#005991] hover:text-[#005991] transition-all">
                    Sherpa Culture
                </a>
                <a href="#" class="px-4 sm:px-5 py-2 sm:py-2.5 bg-white border border-gray-200 rounded-full text-[#052734] text-sm font-medium hover:border-[#005991] hover:text-[#005991] transition-all">
                    Langtang Valley
                </a>
                <a href="#" class="px-4 sm:px-5 py-2 sm:py-2.5 bg-white border border-gray-200 rounded-full text-[#052734] text-sm font-medium hover:border-[#005991] hover:text-[#005991] transition-all">
                    Bhutan Treks
                </a>
                <a href="#" class="px-4 sm:px-5 py-2 sm:py-2.5 bg-white border border-gray-200 rounded-full text-[#052734] text-sm font-medium hover:border-[#005991] hover:text-[#005991] transition-all">
                    Tibet Tours
                </a>
            </div>
        </div>
    </section>
@endsection
