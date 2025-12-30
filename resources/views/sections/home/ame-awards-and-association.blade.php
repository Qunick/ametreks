<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#4D8BB2]/10 border border-[#4D8BB2]/30 rounded-full text-[#005991] text-sm font-medium mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
                Recognition & Partnerships
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                Awards & Associations
            </h2>
            <p class="text-[#6D6E70] max-w-2xl mx-auto">
                Recognized for excellence in adventure tourism and proud partnerships with leading organizations
            </p>
        </div>

        {{-- Associations Section --}}
        <div>
            <div class="flex items-center justify-center gap-2 mb-8">
                <svg class="w-6 h-6 text-[#99C723]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="text-2xl font-bold text-gray-900">We Are Associated With</h3>
            </div>
            
            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 md:gap-8">
                    @php
                        $associations = [
                            [
                                'id' => 1,
                                'logo' => asset('user-assets/Associates/government.jpg'),
                                'name' => 'Nepal Government',
                                'url' => '#'
                            ],
                            [
                                'id' => 2,
                                'logo' => asset('user-assets/Associates/logo-taan.png'),
                                'name' => "Trekking Agencies' Association of Nepal",
                                'url' => '#'
                            ],
                            [
                                'id' => 3,
                                'logo' => asset('user-assets/Associates/keep.png'),
                                'name' => 'Keep Nepal',
                                'url' => '#'
                            ],
                            [
                                'id' => 4,
                                'logo' => asset('user-assets/Associates/NMA-Logo.png'),
                                'name' => 'Nepal Mountaineering Association',
                                'url' => '#'
                            ],
                            [
                                'id' => 5,
                                'logo' => asset('user-assets/Associates/ntb-logo.jpg'),
                                'name' => 'Nepal Tourism Board',
                                'url' => '#'
                            ]
                        ];
                    @endphp

                    @foreach($associations as $partner)
                        <a
                            href="{{ $partner['url'] }}"
                            class="group flex items-center justify-center p-4 bg-gray-50/50 rounded-xl hover:bg-gradient-to-br hover:from-[#052734]/5 hover:to-[#005991]/5 hover:border-[#4D8BB2]/30 border border-gray-100 transition-all duration-300 relative overflow-hidden"
                            title="{{ $partner['name'] }}"
                        >
                            {{-- Subtle brand gradient overlay on hover --}}
                            <div class="absolute inset-0 bg-gradient-to-br from-transparent to-transparent group-hover:from-[#052734]/5 group-hover:to-[#005991]/5 transition-all duration-300"></div>
                            
                            <div class="w-full h-full flex items-center justify-center overflow-hidden relative z-10">
                                <img 
                                    src="{{ $partner['logo'] }}" 
                                    alt="{{ $partner['name'] }}"
                                    class="max-h-12 w-auto object-contain opacity-80 group-hover:opacity-100 group-hover:scale-105 transition-all duration-300"
                                    style="max-width: 100%;"
                                />
                            </div>
                            
                            {{-- Tooltip-style name display on hover --}}
                            {{-- <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none">
                                <div class="bg-[#052734] text-white text-xs px-3 py-1.5 rounded-lg whitespace-nowrap shadow-lg">
                                    {{ $partner['name'] }}
                                    <div class="absolute -top-1 left-1/2 transform -translate-x-1/2 w-2 h-2 bg-[#052734] rotate-45"></div>
                                </div>
                            </div> --}}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Optional: Add Awards Section if you have awards --}}
        <div class="mt-16">
            <div class="flex items-center justify-center gap-2 mb-8">
                <svg class="w-6 h-6 text-[#C9302C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
                <h3 class="text-2xl font-bold text-gray-900">Awards & Recognition</h3>
            </div>
            
            <div class="bg-gradient-to-r from-[#052734]/5 to-[#005991]/5 rounded-2xl border border-[#4D8BB2]/20 p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- Award 1 --}}
                    <div class="bg-white rounded-xl p-6 border border-gray-200 hover:border-[#4D8BB2]/50 hover:shadow-lg transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-[#99C723] to-[#99C723]/80 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-lg mb-1">Excellence in Sustainable Tourism</h4>
                                <p class="text-[#6D6E70] text-sm mb-3">Nepal Tourism Awards 2023</p>
                                <p class="text-[#6D6E70] text-sm">Recognized for eco-friendly trekking practices and community engagement</p>
                            </div>
                        </div>
                    </div>

                    {{-- Award 2 --}}
                    <div class="bg-white rounded-xl p-6 border border-gray-200 hover:border-[#4D8BB2]/50 hover:shadow-lg transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-[#005991] to-[#4D8BB2] rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-lg mb-1">Best Adventure Tour Operator</h4>
                                <p class="text-[#6D6E70] text-sm mb-3">TAAN Annual Awards 2022</p>
                                <p class="text-[#6D6E70] text-sm">Awarded for outstanding service and safety standards</p>
                            </div>
                        </div>
                    </div>

                    {{-- Award 3 --}}
                    <div class="bg-white rounded-xl p-6 border border-gray-200 hover:border-[#4D8BB2]/50 hover:shadow-lg transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-[#C9302C] to-[#C9302C]/80 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-lg mb-1">Customer Choice Award</h4>
                                <p class="text-[#6D6E70] text-sm mb-3">Tripadvisor 2023</p>
                                <p class="text-[#6D6E70] text-sm">Based on traveler reviews and satisfaction ratings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>