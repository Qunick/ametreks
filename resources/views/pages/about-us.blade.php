{{-- resources/views/pages/about.blade.php --}}
@extends('layouts.app')

@section('title', 'About Us - AME Treks & Expeditions')

@section('content')

{{-- Hero Section --}}
<section class="relative bg-[#052734] overflow-hidden">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-5">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="heroPattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="1" fill="white"/>
                </pattern>
            </defs>
            <rect fill="url(#heroPattern)" width="100%" height="100%"/>
        </svg>
    </div>
    
    {{-- Gradient Orbs --}}
    <div class="absolute top-10 left-0 w-48 sm:w-64 lg:w-96 h-48 sm:h-64 lg:h-96 bg-[#005991]/30 rounded-full blur-[80px] sm:blur-[100px] lg:blur-[120px]"></div>
    <div class="absolute bottom-10 right-0 w-40 sm:w-56 lg:w-80 h-40 sm:h-56 lg:h-80 bg-[#99c723]/20 rounded-full blur-[60px] sm:blur-[80px] lg:blur-[100px]"></div>
    
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:grid lg:grid-cols-2 gap-8 sm:gap-10 lg:gap-16 items-center py-12 sm:py-16 lg:py-24">
            
            {{-- Left Content --}}
            <div class="w-full space-y-5 sm:space-y-6 lg:space-y-8 order-2 lg:order-1">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 sm:py-2 bg-white/10 backdrop-blur-sm rounded-full border border-white/10">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#99c723] opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-[#99c723]"></span>
                    </span>
                    <span class="text-white/80 text-xs sm:text-sm font-medium">Crafting Adventures Since 2010</span>
                </div>
                
                {{-- Headline --}}
                <div>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-5xl xl:text-6xl font-bold text-white leading-tight tracking-tight">
                        Where
                        <span class="relative inline-block">
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#4D8BB2] via-[#99c723] to-[#4D8BB2]">Dreams</span>
                            <svg class="absolute -bottom-1 sm:-bottom-2 left-0 w-full h-2 sm:h-3" viewBox="0 0 200 12" fill="none" preserveAspectRatio="none">
                                <path d="M2 10C50 4 150 4 198 10" stroke="url(#underlineGradient)" stroke-width="3" stroke-linecap="round"/>
                                <defs>
                                    <linearGradient id="underlineGradient" x1="0" y1="0" x2="200" y2="0">
                                        <stop offset="0%" stop-color="#4D8BB2"/>
                                        <stop offset="50%" stop-color="#99c723"/>
                                        <stop offset="100%" stop-color="#4D8BB2"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </span>
                        <br class="hidden sm:block">
                        <span class="sm:hidden"> </span>Meet Mountains
                    </h1>
                </div>
                
                {{-- Description --}}
                <p class="text-base sm:text-lg lg:text-xl text-[#4D8BB2] leading-relaxed max-w-xl">
                    We don't just organize treks — we craft life-changing journeys through the world's most magnificent landscapes with passion, expertise, and commitment to your safety.
                </p>
                
                {{-- Stats Row --}}
                <div class="flex flex-wrap gap-4 sm:gap-6 lg:gap-8 pt-2 sm:pt-4">
                    <div class="relative">
                        <span class="block text-3xl sm:text-4xl lg:text-5xl font-bold text-white">14<span class="text-[#99c723]">+</span></span>
                        <span class="text-xs sm:text-sm text-white/60 uppercase tracking-wider">Years</span>
                        <div class="absolute -right-2 sm:-right-3 lg:-right-4 top-1/2 -translate-y-1/2 w-px h-8 sm:h-10 bg-white/20 hidden sm:block"></div>
                    </div>
                    <div class="relative">
                        <span class="block text-3xl sm:text-4xl lg:text-5xl font-bold text-white">5K<span class="text-[#99c723]">+</span></span>
                        <span class="text-xs sm:text-sm text-white/60 uppercase tracking-wider">Trekkers</span>
                        <div class="absolute -right-2 sm:-right-3 lg:-right-4 top-1/2 -translate-y-1/2 w-px h-8 sm:h-10 bg-white/20 hidden sm:block"></div>
                    </div>
                    <div>
                        <span class="block text-3xl sm:text-4xl lg:text-5xl font-bold text-white">50<span class="text-[#99c723]">+</span></span>
                        <span class="text-xs sm:text-sm text-white/60 uppercase tracking-wider">Guides</span>
                    </div>
                </div>
                
                {{-- CTA Buttons --}}
                <div class="flex flex-col xs:flex-row flex-wrap gap-3 sm:gap-4 pt-2 sm:pt-4">
                    <a href="{{ route('pages.treks.index') }}" 
                       class="group inline-flex items-center justify-center gap-2 sm:gap-3 bg-[#99c723] hover:bg-[#8ab520] text-[#052734] px-5 sm:px-6 lg:px-8 py-2.5 sm:py-3 lg:py-4 rounded-full font-semibold text-sm sm:text-base lg:text-lg transition-all duration-300 shadow-lg shadow-[#99c723]/25 hover:shadow-xl hover:shadow-[#99c723]/30">
                        <span>Start Your Journey</span>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="#our-story" 
                       class="group inline-flex items-center justify-center gap-2 sm:gap-3 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white px-5 sm:px-6 lg:px-8 py-2.5 sm:py-3 lg:py-4 rounded-full font-semibold text-sm sm:text-base lg:text-lg transition-all duration-300 border border-white/20">
                        <span>Our Story</span>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            {{-- Right - Hero Image --}}
            <div class="relative w-full max-w-sm sm:max-w-md lg:max-w-none mx-auto order-1 lg:order-2">
                {{-- Main Image --}}
                <div class="relative">
                    {{-- Image Container --}}
                    <div class="relative z-10 rounded-2xl sm:rounded-3xl overflow-hidden shadow-2xl shadow-black/40">
                        <img 
                            src="{{ asset('user-assets/images/about/hero-team.jpg') }}" 
                            alt="AME Treks Team at Mountain Summit"
                            class="w-full aspect-[4/3] sm:aspect-[4/4] lg:aspect-[4/5] object-cover"
                        >
                        {{-- Gradient Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-[#052734]/80 via-transparent to-transparent"></div>
                        
                        {{-- Bottom Info --}}
                        <div class="absolute bottom-0 left-0 right-0 p-4 sm:p-5 lg:p-6">
                            <div class="flex items-center gap-3 sm:gap-4">
                                {{-- Avatar Stack --}}
                                <div class="flex -space-x-2 sm:-space-x-3">
                                    <img src="{{ asset('user-assets/images/team/guide-1.jpg') }}" alt="" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white object-cover">
                                    <img src="{{ asset('user-assets/images/team/guide-2.jpg') }}" alt="" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white object-cover">
                                    <img src="{{ asset('user-assets/images/team/guide-3.jpg') }}" alt="" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white object-cover">
                                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white bg-[#005991] flex items-center justify-center text-white text-[10px] sm:text-xs font-bold">+47</div>
                                </div>
                                <div>
                                    <p class="text-white font-semibold text-sm sm:text-base">Expert Guides</p>
                                    <p class="text-white/60 text-xs sm:text-sm">Certified & Experienced</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Decorative Frame - Hidden on mobile --}}
                    <div class="absolute -inset-2 sm:-inset-3 lg:-inset-4 border-2 border-[#4D8BB2]/30 rounded-2xl sm:rounded-3xl lg:rounded-[2rem] -z-10 hidden sm:block"></div>
                    
                    {{-- Floating Badge - Top Right --}}
                    <div class="absolute -top-2 -right-2 sm:-top-4 sm:-right-4 lg:-top-6 lg:-right-6 z-20">
                        <div class="bg-white rounded-xl sm:rounded-2xl p-2 sm:p-3 lg:p-4 shadow-xl">
                            <div class="flex items-center gap-2 sm:gap-3">
                                <div class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 bg-[#99c723] rounded-lg sm:rounded-xl flex items-center justify-center">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg sm:text-xl lg:text-2xl font-bold text-[#052734]">4.9</p>
                                    <p class="text-[10px] sm:text-xs text-[#6D6E70]">700+ Reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Floating Badge - Bottom Left --}}
                    <div class="absolute -bottom-2 -left-2 sm:-bottom-4 sm:-left-4 lg:-bottom-6 lg:-left-6 z-20">
                        <div class="bg-[#005991] rounded-xl sm:rounded-2xl p-2 sm:p-3 lg:p-4 shadow-xl">
                            <div class="flex items-center gap-2 sm:gap-3">
                                <div class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 bg-white/20 rounded-lg sm:rounded-xl flex items-center justify-center">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white font-bold text-xs sm:text-sm lg:text-base">100% Safe</p>
                                    <p class="text-white/60 text-[10px] sm:text-xs">No Incidents</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Our Story Section --}}
<section id="our-story" class="py-12 sm:py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:grid lg:grid-cols-2 gap-8 sm:gap-10 lg:gap-16 xl:gap-20 items-center">
            {{-- Left - Story Text --}}
            <div class="w-full space-y-5 sm:space-y-6 lg:space-y-8 order-2 lg:order-1">
                {{-- Section Label --}}
                <div class="flex items-center gap-3">
                    <span class="w-8 sm:w-10 h-px bg-[#005991]"></span>
                    <span class="text-[#005991] text-xs sm:text-sm font-semibold uppercase tracking-wider">Our Journey</span>
                </div>
                
                <div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#052734] mb-4 sm:mb-6 leading-tight">
                        A Decade of Creating
                        <span class="text-[#005991]">Mountain Memories</span>
                    </h2>
                    <div class="space-y-3 sm:space-y-4 text-sm sm:text-base text-[#6D6E70] leading-relaxed">
                        <p>
                            Founded in 2010 by a group of passionate mountain guides and travel enthusiasts, AME Treks started with a simple vision: to share the breathtaking beauty of the Himalayas with the world while ensuring sustainable and responsible tourism.
                        </p>
                        <p>
                            What began as a small operation with just two guides has grown into Nepal's premier adventure company, with over <span class="font-semibold text-[#005991]">5,000 successful expeditions</span> and a team of <span class="font-semibold text-[#005991]">50+ certified professionals</span>.
                        </p>
                        <p class="hidden sm:block">
                            Today, we operate across Nepal, Bhutan, and Tibet, offering more than 50 unique trekking routes that cater to adventurers of all skill levels.
                        </p>
                    </div>
                </div>

                {{-- Founder's Quote --}}
                <div class="relative bg-gradient-to-br from-[#005991]/5 to-[#4D8BB2]/10 rounded-xl sm:rounded-2xl p-4 sm:p-6 lg:p-8 border border-[#4D8BB2]/20">
                    {{-- Quote Mark --}}
                    <div class="absolute -top-3 sm:-top-4 left-4 sm:left-6 w-8 h-8 sm:w-10 sm:h-10 bg-[#005991] rounded-lg flex items-center justify-center shadow-lg shadow-[#005991]/30">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                        </svg>
                    </div>
                    
                    <blockquote class="text-[#052734] text-sm sm:text-base lg:text-lg italic leading-relaxed pt-3 sm:pt-4">
                        "Our mission has always been simple: to create safe, memorable, and transformative Himalayan adventures that respect both nature and local cultures."
                    </blockquote>
                    <div class="flex items-center gap-3 sm:gap-4 mt-4 sm:mt-6 pt-4 sm:pt-6 border-t border-[#4D8BB2]/20">
                        <img 
                            src="{{ asset('user-assets/images/team/founder.jpg') }}" 
                            alt="Mr Dhruba Prasad Khanal"
                            class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 rounded-full object-cover ring-2 ring-[#005991]/20"
                        >
                        <div>
                            <p class="font-bold text-[#052734] text-sm sm:text-base">Mr Dhruba Prasad Khanal</p>
                            <p class="text-xs sm:text-sm text-[#6D6E70]">Founder & Managing Director</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right - Image Grid --}}
            <div class="w-full max-w-md sm:max-w-lg lg:max-w-none mx-auto order-1 lg:order-2">
                <div class="grid grid-cols-12 gap-3 sm:gap-4">
                    {{-- Large Image --}}
                    <div class="col-span-7 relative group overflow-hidden rounded-xl sm:rounded-2xl shadow-xl">
                        <div class="aspect-[3/4]">
                            <img 
                                src="{{ asset('user-assets/images/about/team-1.jpg') }}" 
                                alt="AME Treks Team" 
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            >
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-[#052734]/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-3 sm:p-4 lg:p-6">
                            <span class="text-[#99c723] text-[10px] sm:text-xs font-semibold uppercase tracking-wider">2010</span>
                            <p class="text-white font-medium text-sm sm:text-base mt-0.5 sm:mt-1">Where It All Began</p>
                        </div>
                    </div>
                    
                    {{-- Stacked Images --}}
                    <div class="col-span-5 flex flex-col gap-3 sm:gap-4">
                        <div class="relative group overflow-hidden rounded-xl sm:rounded-2xl shadow-xl flex-1">
                            <div class="aspect-square h-full">
                                <img 
                                    src="{{ asset('user-assets/images/about/team-2.jpg') }}" 
                                    alt="Guide Training" 
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                >
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-[#052734]/80 via-transparent to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-2 sm:p-3 lg:p-4">
                                <span class="text-white text-xs sm:text-sm font-medium">Expert Training</span>
                            </div>
                        </div>
                        
                        <div class="relative group overflow-hidden rounded-xl sm:rounded-2xl shadow-xl flex-1">
                            <div class="aspect-square h-full">
                                <img 
                                    src="{{ asset('user-assets/images/about/team-3.jpg') }}" 
                                    alt="Summit Success" 
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                >
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-[#052734]/80 via-transparent to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-2 sm:p-3 lg:p-4">
                                <span class="text-white text-xs sm:text-sm font-medium">Summit Success</span>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Award Badge --}}
                    <div class="col-span-12 mt-1 sm:mt-2">
                        <div class="flex items-center gap-3 sm:gap-4 bg-[#99c723]/10 border border-[#99c723]/20 rounded-lg sm:rounded-xl p-3 sm:p-4">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-[#99c723] rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-[#052734] text-sm sm:text-base">Best Adventure Company 2023</p>
                                <p class="text-xs sm:text-sm text-[#6D6E70]">Nepal Tourism Board Award</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Core Values Section --}}
<section class="py-12 sm:py-16 lg:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-10 sm:mb-12 lg:mb-16">
            <div class="flex items-center justify-center gap-2 sm:gap-3 mb-3 sm:mb-4">
                <span class="w-6 sm:w-8 lg:w-10 h-px bg-[#005991]"></span>
                <span class="text-[#005991] text-xs sm:text-sm font-semibold uppercase tracking-wider">What We Stand For</span>
                <span class="w-6 sm:w-8 lg:w-10 h-px bg-[#005991]"></span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#052734] mb-3 sm:mb-4">
                Our Core <span class="text-[#005991]">Values</span>
            </h2>
            <p class="text-sm sm:text-base lg:text-lg text-[#6D6E70] max-w-2xl mx-auto">
                These principles guide every decision we make and every adventure we create
            </p>
        </div>

        {{-- Values Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 lg:gap-6">
            {{-- Value 1 --}}
            <div class="group bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 lg:p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-[#005991]/10 hover:border-[#4D8BB2]/30 transition-all duration-500 hover:-translate-y-1">
                <div class="w-12 h-12 sm:w-14 sm:h-14 bg-[#005991] rounded-lg sm:rounded-xl flex items-center justify-center mb-4 sm:mb-5 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-[#052734] mb-2 sm:mb-3">Safety First</h3>
                <p class="text-sm sm:text-base text-[#6D6E70] leading-relaxed">
                    Comprehensive safety protocols, certified guides, and emergency response systems ensure every adventure is secure.
                </p>
            </div>

            {{-- Value 2 --}}
            <div class="group bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 lg:p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-[#005991]/10 hover:border-[#4D8BB2]/30 transition-all duration-500 hover:-translate-y-1">
                <div class="w-12 h-12 sm:w-14 sm:h-14 bg-[#99c723] rounded-lg sm:rounded-xl flex items-center justify-center mb-4 sm:mb-5 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-[#052734] mb-2 sm:mb-3">Sustainable Tourism</h3>
                <p class="text-sm sm:text-base text-[#6D6E70] leading-relaxed">
                    Leave No Trace principles, community support, and eco-friendly practices protect our environment.
                </p>
            </div>

            {{-- Value 3 --}}
            <div class="group bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 lg:p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-[#005991]/10 hover:border-[#4D8BB2]/30 transition-all duration-500 hover:-translate-y-1">
                <div class="w-12 h-12 sm:w-14 sm:h-14 bg-[#4D8BB2] rounded-lg sm:rounded-xl flex items-center justify-center mb-4 sm:mb-5 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-[#052734] mb-2 sm:mb-3">Local Expertise</h3>
                <p class="text-sm sm:text-base text-[#6D6E70] leading-relaxed">
                    Our guides are local experts with deep knowledge of Himalayan terrain, culture, and hidden gems.
                </p>
            </div>

            {{-- Value 4 --}}
            <div class="group bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 lg:p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-[#005991]/10 hover:border-[#4D8BB2]/30 transition-all duration-500 hover:-translate-y-1">
                <div class="w-12 h-12 sm:w-14 sm:h-14 bg-[#052734] rounded-lg sm:rounded-xl flex items-center justify-center mb-4 sm:mb-5 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-[#052734] mb-2 sm:mb-3">Personalized Service</h3>
                <p class="text-sm sm:text-base text-[#6D6E70] leading-relaxed">
                    Every trek is customized to match your fitness level, interests, and timeline for a unique adventure.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Mission Statement --}}
<section class="py-12 sm:py-16 lg:py-24 bg-[#052734] relative overflow-hidden">
    {{-- Decorative Elements --}}
    <div class="absolute top-0 left-0 w-40 sm:w-56 lg:w-72 h-40 sm:h-56 lg:h-72 bg-[#005991]/20 rounded-full blur-[80px] sm:blur-[100px] lg:blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-48 sm:w-64 lg:w-96 h-48 sm:h-64 lg:h-96 bg-[#4D8BB2]/10 rounded-full blur-[80px] sm:blur-[100px] lg:blur-3xl translate-x-1/2 translate-y-1/2"></div>
    
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
            {{-- Icon --}}
            <div class="inline-flex items-center justify-center w-14 h-14 sm:w-16 sm:h-16 bg-[#99c723] rounded-xl sm:rounded-2xl mb-6 sm:mb-8 shadow-lg shadow-[#99c723]/30">
                <svg class="w-7 h-7 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-4 sm:mb-6">Our Mission</h2>
            <p class="text-base sm:text-lg lg:text-xl xl:text-2xl text-[#4D8BB2] leading-relaxed max-w-4xl mx-auto">
                To inspire and enable people to experience the transformative power of the Himalayas through 
                <span class="text-white font-semibold">safe, sustainable, and unforgettable adventures</span> 
                that respect local cultures and preserve natural beauty for generations to come.
            </p>
            
            {{-- Divider --}}
            <div class="flex items-center justify-center gap-2 mt-8 sm:mt-10">
                <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-[#99c723] rounded-full"></span>
                <span class="w-12 sm:w-16 h-px bg-[#4D8BB2]/50"></span>
                <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-[#99c723] rounded-full"></span>
            </div>
        </div>
    </div>
</section>

{{-- Impact Section --}}
<section class="py-12 sm:py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:grid lg:grid-cols-2 gap-8 sm:gap-10 lg:gap-16 items-center">
            {{-- Left - Content --}}
            <div class="w-full order-2 lg:order-1">
                <div class="flex items-center gap-2 sm:gap-3 mb-3 sm:mb-4">
                    <span class="w-8 sm:w-10 h-px bg-[#005991]"></span>
                    <span class="text-[#005991] text-xs sm:text-sm font-semibold uppercase tracking-wider">Making A Difference</span>
                </div>
                
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#052734] mb-4 sm:mb-6 leading-tight">
                    Our Impact on <span class="text-[#005991]">Communities</span> & Environment
                </h2>
                <p class="text-sm sm:text-base lg:text-lg text-[#6D6E70] leading-relaxed mb-6 sm:mb-8">
                    Beyond adventures, we're committed to making a positive difference in the communities we operate in and protecting the pristine Himalayan environment.
                </p>
                
                {{-- Impact Stats --}}
                <div class="space-y-4 sm:space-y-5 lg:space-y-6">
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-[#99c723]/15 rounded-lg sm:rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#99c723]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg sm:text-xl font-bold text-[#052734] mb-0.5 sm:mb-1">200+ Local Jobs Created</h3>
                            <p class="text-sm sm:text-base text-[#6D6E70]">Sustainable livelihoods for guides, porters, and hospitality staff across Himalayan communities.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-[#005991]/10 rounded-lg sm:rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#005991]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg sm:text-xl font-bold text-[#052734] mb-0.5 sm:mb-1">10,000+ Trees Planted</h3>
                            <p class="text-sm sm:text-base text-[#6D6E70]">We plant 10 trees for every trekker as part of our reforestation initiative.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-[#4D8BB2]/15 rounded-lg sm:rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#4D8BB2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg sm:text-xl font-bold text-[#052734] mb-0.5 sm:mb-1">5+ Tons Waste Removed</h3>
                            <p class="text-sm sm:text-base text-[#6D6E70]">Trail cleanup initiatives keeping Himalayan paths pristine for future generations.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Right - Image --}}
            <div class="relative w-full max-w-md lg:max-w-none mx-auto order-1 lg:order-2">
                <div class="relative overflow-hidden rounded-xl sm:rounded-2xl shadow-2xl shadow-[#005991]/20">
                    <img 
                        src="{{ asset('user-assets/images/about/community.jpg') }}" 
                        alt="AME Treks Community Work"
                        class="w-full aspect-[4/3] object-cover"
                    >
                </div>
                
                {{-- Floating Card --}}
                <div class="absolute -bottom-4 -left-2 sm:-bottom-6 sm:-left-4 lg:-left-6 bg-white rounded-lg sm:rounded-xl shadow-xl p-3 sm:p-4 lg:p-5 max-w-[180px] sm:max-w-[200px] lg:max-w-[220px] border border-gray-100">
                    <div class="flex items-center gap-2 sm:gap-3 mb-2 sm:mb-3">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-[#99c723] rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <span class="font-bold text-[#052734] text-sm sm:text-base">Education</span>
                    </div>
                    <p class="text-xs sm:text-sm text-[#6D6E70]">Supporting 3 local schools in remote mountain villages</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Final CTA --}}
<section class="py-12 sm:py-16 lg:py-24 bg-gradient-to-br from-[#005991] via-[#005991] to-[#052734] relative overflow-hidden">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
            <defs>
                <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                    <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                </pattern>
            </defs>
            <rect width="100" height="100" fill="url(#grid)" />
        </svg>
    </div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-bold text-white mb-4 sm:mb-6 leading-tight">
            Ready to Write Your Own <span class="text-[#99c723]">Adventure Story?</span>
        </h2>
        <p class="text-base sm:text-lg lg:text-xl text-[#4D8BB2] mb-6 sm:mb-8 lg:mb-10 max-w-2xl mx-auto">
            Join thousands of adventurers who've discovered the magic of the Himalayas with AME Treks.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
            <a href="{{ route('pages.treks.index') }}" 
               class="group inline-flex items-center justify-center gap-2 sm:gap-3 bg-white hover:bg-gray-50 text-[#005991] px-6 sm:px-8 py-3 sm:py-4 rounded-full font-semibold text-base sm:text-lg transition-all duration-300 shadow-lg shadow-black/20">
                <span>Explore Our Treks</span>
                <svg class="w-4 h-4 sm:w-5 sm:h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
            <a href="" 
               class="group inline-flex items-center justify-center gap-2 sm:gap-3 bg-transparent hover:bg-white/10 text-white border-2 border-white/30 hover:border-white px-6 sm:px-8 py-3 sm:py-4 rounded-full font-semibold text-base sm:text-lg transition-all duration-300">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <span>Contact Us</span>
            </a>
        </div>
    </div>
</section>

@endsection