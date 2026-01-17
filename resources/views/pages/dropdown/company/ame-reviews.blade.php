{{-- resources/views/pages/reviews.blade.php --}}
@extends('layouts.app')

@section('title', 'Customer Reviews - Summit Trails')

@section('content')
    {{-- Hero Section --}}
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img 
                src="/placeholder.svg?height=800&width=1920" 
                alt="Mountain trekkers at summit" 
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-b from-stone-900/70 via-stone-900/50 to-stone-900"></div>
        </div>
        
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
            <span class="inline-block px-4 py-2 bg-amber-500/20 text-amber-400 text-sm font-medium rounded-full mb-6 tracking-wide">
                TRUSTED BY ADVENTURERS
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                Stories From<br>
                <span class="text-amber-400">The Summit</span>
            </h1>
            <p class="text-lg md:text-xl text-stone-300 max-w-2xl mx-auto leading-relaxed">
                Real experiences from trekkers who conquered peaks with us. Discover why adventurers choose Summit Trails.
            </p>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </section>

    {{-- Rating Overview --}}
    <section class="bg-stone-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-amber-400 mb-2">4.9</div>
                    <div class="flex justify-center gap-1 mb-2">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <p class="text-stone-400 text-sm">Overall Rating</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2">2,500+</div>
                    <p class="text-stone-400 text-sm">Happy Trekkers</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2">98%</div>
                    <p class="text-stone-400 text-sm">Would Recommend</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2">150+</div>
                    <p class="text-stone-400 text-sm">Expeditions Completed</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Reviews --}}
    <section class="bg-stone-950 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Featured Experiences</h2>
                <p class="text-stone-400 max-w-2xl mx-auto">Hear directly from adventurers who reached new heights with our expert guides.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Featured Review 1 --}}
                <div class="bg-stone-900 rounded-2xl p-8 border border-stone-800 hover:border-amber-500/50 transition-all duration-300 group">
                    <div class="flex items-center gap-4 mb-6">
                        <img 
                            src="/placeholder.svg?height=60&width=60" 
                            alt="Sarah Mitchell" 
                            class="w-14 h-14 rounded-full object-cover ring-2 ring-amber-500/50"
                        >
                        <div>
                            <h4 class="text-white font-semibold">Sarah Mitchell</h4>
                            <p class="text-stone-400 text-sm">Everest Base Camp Trek</p>
                        </div>
                    </div>
                    <div class="flex gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <p class="text-stone-300 leading-relaxed mb-6">
                        "An absolutely life-changing experience. Our guide Pemba was incredibly knowledgeable and made sure everyone in our group felt safe and supported throughout the entire journey. The views were breathtaking!"
                    </p>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-stone-500">October 2024</span>
                        <span class="text-emerald-400 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Verified Trekker
                        </span>
                    </div>
                </div>

                {{-- Featured Review 2 --}}
                <div class="bg-stone-900 rounded-2xl p-8 border border-stone-800 hover:border-amber-500/50 transition-all duration-300 group">
                    <div class="flex items-center gap-4 mb-6">
                        <img 
                            src="/placeholder.svg?height=60&width=60" 
                            alt="James Rodriguez" 
                            class="w-14 h-14 rounded-full object-cover ring-2 ring-amber-500/50"
                        >
                        <div>
                            <h4 class="text-white font-semibold">James Rodriguez</h4>
                            <p class="text-stone-400 text-sm">Annapurna Circuit</p>
                        </div>
                    </div>
                    <div class="flex gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <p class="text-stone-300 leading-relaxed mb-6">
                        "Third time trekking with Summit Trails and they never disappoint. The attention to detail, from accommodation to meals, is exceptional. The Annapurna Circuit exceeded all my expectations."
                    </p>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-stone-500">September 2024</span>
                        <span class="text-emerald-400 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Verified Trekker
                        </span>
                    </div>
                </div>

                {{-- Featured Review 3 --}}
                <div class="bg-stone-900 rounded-2xl p-8 border border-stone-800 hover:border-amber-500/50 transition-all duration-300 group">
                    <div class="flex items-center gap-4 mb-6">
                        <img 
                            src="/placeholder.svg?height=60&width=60" 
                            alt="Emily Chen" 
                            class="w-14 h-14 rounded-full object-cover ring-2 ring-amber-500/50"
                        >
                        <div>
                            <h4 class="text-white font-semibold">Emily Chen</h4>
                            <p class="text-stone-400 text-sm">Langtang Valley Trek</p>
                        </div>
                    </div>
                    <div class="flex gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <p class="text-stone-300 leading-relaxed mb-6">
                        "As a solo female traveler, safety was my priority. Summit Trails made me feel completely secure while pushing my limits. The local community interactions were the highlight of my trip."
                    </p>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-stone-500">November 2024</span>
                        <span class="text-emerald-400 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Verified Trekker
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Video Testimonial Section --}}
    <section class="bg-stone-900 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="relative rounded-2xl overflow-hidden aspect-video group cursor-pointer">
                    <img 
                        src="/placeholder.svg?height=400&width=600" 
                        alt="Video testimonial thumbnail" 
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    >
                    <div class="absolute inset-0 bg-stone-900/40 group-hover:bg-stone-900/30 transition-colors"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-20 h-20 bg-amber-500 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-stone-900 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div>
                    <span class="text-amber-400 font-medium tracking-wide text-sm">VIDEO TESTIMONIAL</span>
                    <h3 class="text-3xl md:text-4xl font-bold text-white mt-4 mb-6">
                        "The Best Decision I Ever Made"
                    </h3>
                    <p class="text-stone-300 leading-relaxed mb-6">
                        Watch how Mark's journey to the Everest Base Camp transformed his perspective on life. From the challenging trails to the rewarding summit moments, discover why our trekkers keep coming back.
                    </p>
                    <div class="flex items-center gap-4">
                        <img 
                            src="/placeholder.svg?height=50&width=50" 
                            alt="Mark Thompson" 
                            class="w-12 h-12 rounded-full object-cover"
                        >
                        <div>
                            <p class="text-white font-semibold">Mark Thompson</p>
                            <p class="text-stone-400 text-sm">Everest Base Camp, 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- All Reviews Grid --}}
    <section class="bg-stone-900 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-12">
                <h2 class="text-3xl font-bold text-white">All Reviews</h2>
                <div class="flex gap-4">
                    <select class="bg-stone-800 text-white px-4 py-2 rounded-lg border border-stone-700 focus:border-amber-500 focus:outline-none">
                        <option>All Expeditions</option>
                        <option>Everest Base Camp</option>
                        <option>Annapurna Circuit</option>
                        <option>Langtang Valley</option>
                        <option>Manaslu Circuit</option>
                    </select>
                    <select class="bg-stone-800 text-white px-4 py-2 rounded-lg border border-stone-700 focus:border-amber-500 focus:outline-none">
                        <option>Most Recent</option>
                        <option>Highest Rated</option>
                        <option>Lowest Rated</option>
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                @php
                    $reviews = [
                        [
                            'name' => 'Michael Brown',
                            'expedition' => 'Manaslu Circuit',
                            'date' => 'December 2024',
                            'rating' => 5,
                            'review' => 'Incredible off-the-beaten-path experience. Less crowded than other treks but equally stunning. Our guide\'s local knowledge was invaluable.',
                            'image' => 'middle aged man outdoor portrait'
                        ],
                        [
                            'name' => 'Anna Kowalski',
                            'expedition' => 'Everest Base Camp',
                            'date' => 'November 2024',
                            'rating' => 5,
                            'review' => 'A dream come true! The organization was flawless, and reaching base camp was the most emotional moment of my life. Thank you Summit Trails!',
                            'image' => 'european woman traveler portrait'
                        ],
                        [
                            'name' => 'David Park',
                            'expedition' => 'Annapurna Base Camp',
                            'date' => 'October 2024',
                            'rating' => 5,
                            'review' => 'Perfect first trek in Nepal. The guides were patient with beginners and the views of Machapuchare were absolutely spectacular.',
                            'image' => 'korean man adventurer portrait'
                        ],
                        [
                            'name' => 'Lisa Martinez',
                            'expedition' => 'Gokyo Lakes Trek',
                            'date' => 'October 2024',
                            'rating' => 4,
                            'review' => 'Beautiful alternative to the classic EBC trek. The turquoise lakes are unlike anything I\'ve ever seen. Highly recommend for repeat visitors.',
                            'image' => 'latina woman hiker portrait'
                        ],
                        [
                            'name' => 'Thomas Weber',
                            'expedition' => 'Island Peak Climb',
                            'date' => 'September 2024',
                            'rating' => 5,
                            'review' => 'My first 6000m peak! The technical training provided was excellent and gave me confidence for summit day. An unforgettable achievement.',
                            'image' => 'german man mountaineer portrait'
                        ],
                        [
                            'name' => 'Priya Sharma',
                            'expedition' => 'Langtang Valley',
                            'date' => 'September 2024',
                            'rating' => 5,
                            'review' => 'The cultural immersion in Tamang villages was the highlight. Amazing to see the region\'s recovery and the resilient spirit of the people.',
                            'image' => 'indian woman traveler portrait'
                        ],
                    ];
                @endphp

                @foreach($reviews as $review)
                    <div class="bg-stone-800/50 rounded-xl p-6 border border-stone-700 hover:border-stone-600 transition-colors">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <img 
                                    src="/placeholder.svg?height=48&width=48" 
                                    alt="{{ $review['name'] }}" 
                                    class="w-12 h-12 rounded-full object-cover"
                                >
                                <div>
                                    <h4 class="text-white font-semibold">{{ $review['name'] }}</h4>
                                    <p class="text-stone-400 text-sm">{{ $review['expedition'] }}</p>
                                </div>
                            </div>
                            <span class="text-stone-500 text-sm">{{ $review['date'] }}</span>
                        </div>
                        <div class="flex gap-1 mb-3">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 {{ $i < $review['rating'] ? 'text-amber-400' : 'text-stone-600' }} fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                        </div>
                        <p class="text-stone-300 leading-relaxed">{{ $review['review'] }}</p>
                    </div>
                @endforeach
            </div>

            {{-- Load More Button --}}
            <div class="text-center mt-12">
                <button class="px-8 py-3 bg-stone-800 text-white font-semibold rounded-lg border border-stone-700 hover:bg-stone-700 hover:border-stone-600 transition-all duration-300">
                    Load More Reviews
                </button>
            </div>
        </div>
    </section>

    {{-- Submit Review CTA --}}
    <section class="bg-stone-950 py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-gradient-to-br from-stone-800 to-stone-900 rounded-3xl p-12 border border-stone-700">
                <svg class="w-16 h-16 text-amber-400 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
                <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">Share Your Adventure</h3>
                <p class="text-stone-400 mb-8 max-w-xl mx-auto">
                    Trekked with us? We'd love to hear about your experience. Your review helps fellow adventurers make informed decisions.
                </p>
                <a 
                    href="/submit-review" 
                    class="inline-flex items-center gap-2 px-8 py-4 bg-amber-500 text-stone-900 font-bold rounded-lg hover:bg-amber-400 transition-colors duration-300"
                >
                    Write a Review
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Trust Badges --}}
    <section class="bg-stone-900 py-16 border-t border-stone-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-center text-stone-500 mb-8 text-sm tracking-wide">FEATURED & TRUSTED BY</p>
            <div class="flex flex-wrap items-center justify-center gap-8 md:gap-16 opacity-60">
                <div class="text-stone-400 font-bold text-xl">TripAdvisor</div>
                <div class="text-stone-400 font-bold text-xl">Lonely Planet</div>
                <div class="text-stone-400 font-bold text-xl">National Geographic</div>
                <div class="text-stone-400 font-bold text-xl">Outside Magazine</div>
                <div class="text-stone-400 font-bold text-xl">Adventure Travel</div>
            </div>
        </div>
    </section>
@endsection
