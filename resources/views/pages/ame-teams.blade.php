@extends('layouts.app')

@section('title', 'Our Team - Summit Treks')

@section('content')
    {{-- Hero Section --}}
    <section class="relative h-[70vh] min-h-[500px] overflow-hidden">
        <div class="absolute inset-0">
            <img 
                src="/placeholder.svg?height=800&width=1600" 
                alt="Himalayan mountain range" 
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-b from-stone-900/60 via-stone-900/40 to-stone-900/80"></div>
        </div>
        
        <div class="relative z-10 h-full flex flex-col justify-center items-center text-center px-4">
            <span class="text-amber-400 uppercase tracking-[0.3em] text-sm font-medium mb-4">Meet The Experts</span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 text-balance">
                Our Mountain<br>
                <span class="text-amber-400">Family</span>
            </h1>
            <p class="text-stone-200 text-lg md:text-xl max-w-2xl leading-relaxed">
                Experienced guides, passionate adventurers, and dedicated professionals who make every expedition unforgettable.
            </p>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    {{-- Stats Bar --}}
    <section class="bg-stone-800 py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <span class="block text-3xl md:text-4xl font-bold text-amber-400">25+</span>
                    <span class="text-stone-300 text-sm uppercase tracking-wider">Years Experience</span>
                </div>
                <div>
                    <span class="block text-3xl md:text-4xl font-bold text-amber-400">500+</span>
                    <span class="text-stone-300 text-sm uppercase tracking-wider">Expeditions Led</span>
                </div>
                <div>
                    <span class="block text-3xl md:text-4xl font-bold text-amber-400">45</span>
                    <span class="text-stone-300 text-sm uppercase tracking-wider">Team Members</span>
                </div>
                <div>
                    <span class="block text-3xl md:text-4xl font-bold text-amber-400">100%</span>
                    <span class="text-stone-300 text-sm uppercase tracking-wider">Safety Record</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Leadership Section --}}
    <section class="bg-stone-100 py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-emerald-700 uppercase tracking-[0.2em] text-sm font-semibold">Leadership</span>
                <h2 class="text-3xl md:text-5xl font-bold text-stone-800 mt-3">Expedition Directors</h2>
                <div class="w-24 h-1 bg-amber-500 mx-auto mt-6"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
                {{-- Director Card 1 --}}
                <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500">
                    <div class="md:flex">
                        <div class="md:w-2/5 relative overflow-hidden">
                            <img 
                                src="/placeholder.svg?height=400&width=300" 
                                alt="Tenzing Dorje - Head Guide" 
                                class="w-full h-64 md:h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-stone-900/50 to-transparent"></div>
                        </div>
                        <div class="md:w-3/5 p-6 md:p-8">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider">Founder</span>
                            </div>
                            <h3 class="text-2xl font-bold text-stone-800 mb-1">Tenzing Dorje</h3>
                            <p class="text-amber-600 font-medium mb-4">Head Expedition Leader</p>
                            <p class="text-stone-600 leading-relaxed mb-6">
                                With over 30 years of mountaineering experience and 15 Everest summits, Tenzing founded Summit Treks to share the magic of the Himalayas with adventurers worldwide.
                            </p>
                            <div class="flex items-center gap-4 text-stone-500">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm">15x Everest</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm">30 Years</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Director Card 2 --}}
                <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500">
                    <div class="md:flex">
                        <div class="md:w-2/5 relative overflow-hidden">
                            <img 
                                src="/placeholder.svg?height=400&width=300" 
                                alt="Maya Sherpa - Operations Director" 
                                class="w-full h-64 md:h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-stone-900/50 to-transparent"></div>
                        </div>
                        <div class="md:w-3/5 p-6 md:p-8">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider">Co-Founder</span>
                            </div>
                            <h3 class="text-2xl font-bold text-stone-800 mb-1">Maya Sherpa</h3>
                            <p class="text-amber-600 font-medium mb-4">Operations Director</p>
                            <p class="text-stone-600 leading-relaxed mb-6">
                                Maya brings 20 years of expedition management expertise. She ensures every trek runs seamlessly, from permits to porters, creating safe and memorable journeys.
                            </p>
                            <div class="flex items-center gap-4 text-stone-500">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm">500+ Treks</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm">20 Years</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Mountain Guides Section --}}
    <section class="bg-stone-900 py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-amber-400 uppercase tracking-[0.2em] text-sm font-semibold">The Heart of Our Team</span>
                <h2 class="text-3xl md:text-5xl font-bold text-white mt-3">Mountain Guides</h2>
                <div class="w-24 h-1 bg-amber-500 mx-auto mt-6"></div>
                <p class="text-stone-400 mt-6 max-w-2xl mx-auto leading-relaxed">
                    Our certified guides are local experts with intimate knowledge of every trail, peak, and hidden gem in the Himalayas.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $guides = [
                        [
                            'name' => 'Pemba Norbu',
                            'role' => 'Senior Guide',
                            'specialty' => 'High Altitude',
                            'experience' => '18 years',
                            'image' => 'nepali sherpa guide portrait wearing mountaineering gear snow background'
                        ],
                        [
                            'name' => 'Dawa Yangji',
                            'role' => 'Lead Guide',
                            'specialty' => 'Technical Climbing',
                            'experience' => '15 years',
                            'image' => 'female himalayan guide smiling portrait outdoor adventure gear'
                        ],
                        [
                            'name' => 'Mingma Tashi',
                            'role' => 'Senior Guide',
                            'specialty' => 'Everest Region',
                            'experience' => '20 years',
                            'image' => 'experienced sherpa man portrait warm smile traditional cap'
                        ],
                        [
                            'name' => 'Pasang Lhamu',
                            'role' => 'Guide',
                            'specialty' => 'Annapurna Circuit',
                            'experience' => '12 years',
                            'image' => 'young female trekking guide portrait cheerful mountains'
                        ],
                        [
                            'name' => 'Karma Thundup',
                            'role' => 'Senior Guide',
                            'specialty' => 'Ice Climbing',
                            'experience' => '16 years',
                            'image' => 'tibetan mountain guide portrait weathered face warm eyes'
                        ],
                        [
                            'name' => 'Nima Dorje',
                            'role' => 'Guide',
                            'specialty' => 'Langtang Valley',
                            'experience' => '10 years',
                            'image' => 'young nepali guide portrait bright smile hiking gear'
                        ],
                        [
                            'name' => 'Lakpa Sonam',
                            'role' => 'Lead Guide',
                            'specialty' => 'Expedition Planning',
                            'experience' => '14 years',
                            'image' => 'professional mountain guide portrait confident expression outdoor'
                        ],
                        [
                            'name' => 'Phurba Tendi',
                            'role' => 'Guide',
                            'specialty' => 'Wilderness First Aid',
                            'experience' => '11 years',
                            'image' => 'himalayan guide medic portrait caring expression mountains'
                        ],
                    ];
                @endphp

                @foreach($guides as $guide)
                    <div class="group relative overflow-hidden rounded-xl bg-stone-800">
                        <div class="aspect-[3/4] overflow-hidden">
                            <img 
                                src="/placeholder.svg?height=400&width=300" 
                                alt="{{ $guide['name'] }}" 
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-stone-900 via-stone-900/20 to-transparent"></div>
                        </div>
                        
                        <div class="absolute bottom-0 left-0 right-0 p-5">
                            <span class="inline-block bg-amber-500/90 text-stone-900 px-2 py-0.5 rounded text-xs font-semibold mb-2">
                                {{ $guide['specialty'] }}
                            </span>
                            <h3 class="text-lg font-bold text-white">{{ $guide['name'] }}</h3>
                            <p class="text-amber-400 text-sm">{{ $guide['role'] }}</p>
                            <p class="text-stone-400 text-xs mt-1">{{ $guide['experience'] }} experience</p>
                        </div>

                        {{-- Hover overlay --}}
                        <div class="absolute inset-0 bg-emerald-800/90 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="text-center p-6">
                                <h3 class="text-xl font-bold text-white mb-2">{{ $guide['name'] }}</h3>
                                <p class="text-emerald-200 text-sm mb-4">{{ $guide['experience'] }} • {{ $guide['specialty'] }}</p>
                                <a href="#" class="inline-flex items-center gap-2 text-white border border-white/30 px-4 py-2 rounded-full text-sm hover:bg-white/10 transition-colors">
                                    View Profile
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Support Team Section --}}
    <section class="bg-stone-50 py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-emerald-700 uppercase tracking-[0.2em] text-sm font-semibold">Behind The Scenes</span>
                <h2 class="text-3xl md:text-5xl font-bold text-stone-800 mt-3">Support Team</h2>
                <div class="w-24 h-1 bg-amber-500 mx-auto mt-6"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $support = [
                        [
                            'name' => 'Sanjay Thapa',
                            'role' => 'Head Chef',
                            'description' => 'Creating delicious high-altitude meals that fuel our trekkers through every adventure.',
                            'image' => 'nepali chef portrait warm smile professional kitchen outdoor'
                        ],
                        [
                            'name' => 'Anita Gurung',
                            'role' => 'Booking Manager',
                            'description' => 'Your first point of contact, ensuring your journey begins smoothly from day one.',
                            'image' => 'professional nepali woman office portrait friendly smile'
                        ],
                        [
                            'name' => 'Bir Bahadur',
                            'role' => 'Equipment Manager',
                            'description' => 'Maintaining and preparing all gear to the highest safety standards for every expedition.',
                            'image' => 'nepali man checking climbing equipment warehouse portrait'
                        ],
                    ];
                @endphp

                @foreach($support as $member)
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                        <div class="relative h-64 overflow-hidden">
                            <img 
                                src="/placeholder.svg?height=300&width=400" 
                                alt="{{ $member['name'] }}" 
                                class="w-full h-full object-cover"
                            >
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-stone-800">{{ $member['name'] }}</h3>
                            <p class="text-emerald-600 font-medium text-sm mb-3">{{ $member['role'] }}</p>
                            <p class="text-stone-600 text-sm leading-relaxed">{{ $member['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Values Section --}}
    <section class="bg-emerald-800 py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-amber-400 uppercase tracking-[0.2em] text-sm font-semibold">Our Philosophy</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mt-3 mb-6">What Drives Us</h2>
                    <p class="text-emerald-100 leading-relaxed mb-8">
                        Every member of our team shares a deep respect for the mountains and a commitment to sustainable, responsible trekking. We believe in preserving the beauty of the Himalayas for future generations while sharing its wonder with adventurers today.
                    </p>

                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-amber-500 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-stone-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white">Safety First</h3>
                                <p class="text-emerald-200 text-sm">Rigorous training and protocols ensure every adventure is as safe as it is thrilling.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-amber-500 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-stone-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white">Eco-Conscious</h3>
                                <p class="text-emerald-200 text-sm">Leave no trace principles guide every expedition we lead.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-amber-500 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-stone-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white">Local Community</h3>
                                <p class="text-emerald-200 text-sm">Supporting and empowering Himalayan communities through responsible tourism.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <img 
                        src="/placeholder.svg?height=600&width=500" 
                        alt="Team celebrating at summit" 
                        class="rounded-2xl shadow-2xl"
                    >
                    <div class="absolute -bottom-6 -left-6 bg-amber-500 text-stone-900 p-6 rounded-xl shadow-lg">
                        <span class="block text-4xl font-bold">10,000+</span>
                        <span class="text-sm font-medium">Happy Trekkers</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-stone-900 py-20">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Trek With Us?</h2>
            <p class="text-stone-400 mb-8 leading-relaxed">
                Join our experienced team for your next Himalayan adventure. Whether you're a first-time trekker or seasoned mountaineer, we have the perfect expedition for you.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#" class="inline-flex items-center justify-center gap-2 bg-amber-500 hover:bg-amber-400 text-stone-900 font-semibold px-8 py-4 rounded-full transition-colors duration-300">
                    View Expeditions
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
                <a href="#" class="inline-flex items-center justify-center gap-2 border-2 border-stone-600 hover:border-stone-500 text-white font-semibold px-8 py-4 rounded-full transition-colors duration-300">
                    Contact Our Team
                </a>
            </div>
        </div>
    </section>
@endsection