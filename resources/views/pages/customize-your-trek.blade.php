@extends('layouts.app')

@section('title', 'Our Expert Team - AME Treks & Expeditions')

@section('content')

<!-- Build Your Own Trek Section -->
<section class="py-16 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto max-w-7xl px-4">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#052734] to-[#005991] text-white rounded-full text-sm font-semibold mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Complete Control
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Build Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#052734] to-[#005991]">Perfect Himalayan</span> Adventure
            </h2>
            <p class="text-[#6D6E70] max-w-2xl mx-auto">
                Design every aspect of your trek. From duration and difficulty to luxury level and activities. Get an instant personalized quote.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Left Column: Trek Builder -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Duration & Difficulty -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-[#005991] to-[#4D8BB2] flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Duration & Difficulty</h3>
                            <p class="text-[#6D6E70] text-sm">Set the length and challenge level of your trek</p>
                        </div>
                    </div>
                    
                    <div class="space-y-8">
                        <!-- Duration Slider -->
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <label class="block text-sm font-medium text-gray-900">Trek Duration</label>
                                <span id="durationValue" class="text-2xl font-bold text-[#005991]">14 days</span>
                            </div>
                            <div class="relative pt-2">
                                <input type="range" 
                                       min="3" 
                                       max="50" 
                                       value="14" 
                                       step="1"
                                       class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer slider-blue"
                                       oninput="updateDuration(this.value)">
                                <div class="flex justify-between text-xs text-[#6D6E70] mt-2">
                                    <span>3 days</span>
                                    <span>50 days</span>
                                </div>
                                <div class="grid grid-cols-5 text-xs text-[#6D6E70] mt-1">
                                    <span class="text-center">Short</span>
                                    <span class="text-center">Week</span>
                                    <span class="text-center">Standard</span>
                                    <span class="text-center">Extended</span>
                                    <span class="text-center">Epic</span>
                                </div>
                            </div>
                            <div id="durationSuggestions" class="mt-4 space-y-2">
                                <!-- Suggestions will be populated by JavaScript -->
                            </div>
                        </div>
                        
                        <!-- Difficulty Selector -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-4">Difficulty Level</label>
                            <div class="grid grid-cols-1 sm:grid-cols-4 gap-3" id="difficultyOptions">
                                <!-- Easy -->
                                <button class="difficulty-option p-4 border-2 border-gray-200 rounded-xl text-center hover:shadow-md transition-all duration-300"
                                        data-level="easy"
                                        onclick="selectDifficulty('easy')">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-2" 
                                         style="background: #99C72320">
                                        <svg class="w-5 h-5 text-[#99C723]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 text-[#99C723]">Easy</h4>
                                        <p class="text-[#6D6E70] text-xs mt-1">Beginner friendly</p>
                                    </div>
                                </button>
                                
                                <!-- Moderate -->
                                <button class="difficulty-option p-4 border-2 border-gray-200 rounded-xl text-center hover:shadow-md transition-all duration-300 border-[#005991] bg-blue-50"
                                        data-level="moderate"
                                        onclick="selectDifficulty('moderate')">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-2" 
                                         style="background: #4D8BB220">
                                        <svg class="w-5 h-5 text-[#4D8BB2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 text-[#4D8BB2]">Moderate</h4>
                                        <p class="text-[#6D6E70] text-xs mt-1">Most popular</p>
                                    </div>
                                </button>
                                
                                <!-- Challenging -->
                                <button class="difficulty-option p-4 border-2 border-gray-200 rounded-xl text-center hover:shadow-md transition-all duration-300"
                                        data-level="challenging"
                                        onclick="selectDifficulty('challenging')">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-2" 
                                         style="background: #C9302C20">
                                        <svg class="w-5 h-5 text-[#C9302C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 text-[#C9302C]">Challenging</h4>
                                        <p class="text-[#6D6E70] text-xs mt-1">For experienced</p>
                                    </div>
                                </button>
                                
                                <!-- Extreme -->
                                <button class="difficulty-option p-4 border-2 border-gray-200 rounded-xl text-center hover:shadow-md transition-all duration-300"
                                        data-level="extreme"
                                        onclick="selectDifficulty('extreme')">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-2" 
                                         style="background: #05273420">
                                        <svg class="w-5 h-5 text-[#052734]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 text-[#052734]">Extreme</h4>
                                        <p class="text-[#6D6E70] text-xs mt-1">Expert only</p>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Popular Trek Cards -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-[#99C723] to-[#99C723]/80 flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Popular Trek Routes</h3>
                            <p class="text-[#6D6E70] text-sm">Choose from our most popular treks or customize your own</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Trek Card 1: Everest Base Camp -->
                        <div class="group relative overflow-hidden rounded-xl border border-gray-200 hover:border-[#005991] transition-all duration-300 hover:shadow-lg">
                            <div class="absolute top-3 right-3 z-10">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-xs font-semibold text-[#005991]">
                                    Most Popular
                                </span>
                            </div>
                            <div class="h-40 bg-gradient-to-r from-[#052734] to-[#005991] relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                <div class="absolute bottom-4 left-4">
                                    <h4 class="text-xl font-bold text-white">Everest Base Camp</h4>
                                    <p class="text-white/80 text-sm">Nepal • Everest Region</p>
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#99C723]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-sm font-medium text-gray-900">14-16 days</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#C9302C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11l3-3m0 0l3 3m-3-3v8m0-13a9 9 0 110 18 9 9 0 010-18z" />
                                        </svg>
                                        <span class="text-sm font-medium text-gray-900">Challenging</span>
                                    </div>
                                </div>
                                <p class="text-[#6D6E70] text-sm mb-4">
                                    Classic trek to the base of the world's highest mountain. Experience Sherpa culture and breathtaking views.
                                </p>
                                <div class="flex items-center justify-between">
                                    <button onclick="selectTrek('everest-base-camp')"
                                            class="px-4 py-2 bg-gradient-to-r from-[#005991] to-[#4D8BB2] text-white rounded-lg text-sm font-medium hover:shadow-md transition-all">
                                        Select Trek
                                    </button>
                                    <div class="text-right">
                                        <div class="text-sm font-medium text-gray-900">Premium Package</div>
                                        <div class="text-xs text-[#6D6E70]">All inclusive</div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-xs text-[#6D6E70] mt-3 pt-3 border-t border-gray-100">
                                    <span>Max altitude: 5,545m</span>
                                    <span>Teahouse trek</span>
                                </div>
                            </div>
                        </div>

                        <!-- Trek Card 2: Annapurna Circuit -->
                        <div class="group relative overflow-hidden rounded-xl border border-gray-200 hover:border-[#99C723] transition-all duration-300 hover:shadow-lg">
                            <div class="h-40 bg-gradient-to-r from-[#99C723] to-[#4D8BB2] relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                <div class="absolute bottom-4 left-4">
                                    <h4 class="text-xl font-bold text-white">Annapurna Circuit</h4>
                                    <p class="text-white/80 text-sm">Nepal • Annapurna Region</p>
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#99C723]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-sm font-medium text-gray-900">15-20 days</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#4D8BB2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                        <span class="text-sm font-medium text-gray-900">Moderate</span>
                                    </div>
                                </div>
                                <p class="text-[#6D6E70] text-sm mb-4">
                                    Complete circuit around the Annapurna massif. Diverse landscapes from subtropical to alpine zones.
                                </p>
                                <div class="flex items-center justify-between">
                                    <button onclick="selectTrek('annapurna-circuit')"
                                            class="px-4 py-2 bg-gradient-to-r from-[#99C723] to-[#4D8BB2] text-white rounded-lg text-sm font-medium hover:shadow-md transition-all">
                                        Select Trek
                                    </button>
                                    <div class="text-right">
                                        <div class="text-sm font-medium text-gray-900">Standard Package</div>
                                        <div class="text-xs text-[#6D6E70]">All inclusive</div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-xs text-[#6D6E70] mt-3 pt-3 border-t border-gray-100">
                                    <span>Max altitude: 5,416m</span>
                                    <span>Lodge trek</span>
                                </div>
                            </div>
                        </div>

                        <!-- Trek Card 3: Langtang Valley -->
                        <div class="group relative overflow-hidden rounded-xl border border-gray-200 hover:border-[#4D8BB2] transition-all duration-300 hover:shadow-lg">
                            <div class="h-40 bg-gradient-to-r from-[#4D8BB2] to-[#005991] relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                <div class="absolute bottom-4 left-4">
                                    <h4 class="text-xl font-bold text-white">Langtang Valley</h4>
                                    <p class="text-white/80 text-sm">Nepal • Langtang Region</p>
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#99C723]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-sm font-medium text-gray-900">7-10 days</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#99C723]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-sm font-medium text-gray-900">Easy-Moderate</span>
                                    </div>
                                </div>
                                <p class="text-[#6D6E70] text-sm mb-4">
                                    Close to Kathmandu, stunning valley with Tamang culture, glaciers, and panoramic mountain views.
                                </p>
                                <div class="flex items-center justify-between">
                                    <button onclick="selectTrek('langtang-valley')"
                                            class="px-4 py-2 bg-gradient-to-r from-[#4D8BB2] to-[#005991] text-white rounded-lg text-sm font-medium hover:shadow-md transition-all">
                                        Select Trek
                                    </button>
                                    <div class="text-right">
                                        <div class="text-sm font-medium text-gray-900">Budget Package</div>
                                        <div class="text-xs text-[#6D6E70]">All inclusive</div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-xs text-[#6D6E70] mt-3 pt-3 border-t border-gray-100">
                                    <span>Max altitude: 4,984m</span>
                                    <span>Teahouse trek</span>
                                </div>
                            </div>
                        </div>

                        <!-- Trek Card 4: Manaslu Circuit -->
                        <div class="group relative overflow-hidden rounded-xl border border-gray-200 hover:border-[#052734] transition-all duration-300 hover:shadow-lg">
                            <div class="absolute top-3 right-3 z-10">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-xs font-semibold text-[#052734]">
                                    Restricted Area
                                </span>
                            </div>
                            <div class="h-40 bg-gradient-to-r from-[#052734] to-[#005991] relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                <div class="absolute bottom-4 left-4">
                                    <h4 class="text-xl font-bold text-white">Manaslu Circuit</h4>
                                    <p class="text-white/80 text-sm">Nepal • Manaslu Region</p>
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#99C723]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-sm font-medium text-gray-900">14-18 days</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#C9302C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                        </svg>
                                        <span class="text-sm font-medium text-gray-900">Challenging</span>
                                    </div>
                                </div>
                                <p class="text-[#6D6E70] text-sm mb-4">
                                    Remote trek around the 8th highest mountain. Authentic culture, fewer trekkers, stunning scenery.
                                </p>
                                <div class="flex items-center justify-between">
                                    <button onclick="selectTrek('manaslu-circuit')"
                                            class="px-4 py-2 bg-gradient-to-r from-[#052734] to-[#005991] text-white rounded-lg text-sm font-medium hover:shadow-md transition-all">
                                        Select Trek
                                    </button>
                                    <div class="text-right">
                                        <div class="text-sm font-medium text-gray-900">Expedition Package</div>
                                        <div class="text-xs text-[#6D6E70]">Special permits included</div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-xs text-[#6D6E70] mt-3 pt-3 border-t border-gray-100">
                                    <span>Max altitude: 5,106m</span>
                                    <span>Special permit required</span>
                                </div>
                            </div>
                        </div>

                        <!-- Trek Card 5: Upper Mustang -->
                        <div class="group relative overflow-hidden rounded-xl border border-gray-200 hover:border-[#C9302C] transition-all duration-300 hover:shadow-lg">
                            <div class="h-40 bg-gradient-to-r from-[#C9302C] to-[#052734] relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                <div class="absolute bottom-4 left-4">
                                    <h4 class="text-xl font-bold text-white">Upper Mustang</h4>
                                    <p class="text-white/80 text-sm">Nepal • Mustang Region</p>
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#99C723]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-sm font-medium text-gray-900">10-14 days</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#4D8BB2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                        <span class="text-sm font-medium text-gray-900">Moderate</span>
                                    </div>
                                </div>
                                <p class="text-[#6D6E70] text-sm mb-4">
                                    Ancient Kingdom of Lo. Desert landscapes, cave monasteries, and Tibetan culture.
                                </p>
                                <div class="flex items-center justify-between">
                                    <button onclick="selectTrek('upper-mustang')"
                                            class="px-4 py-2 bg-gradient-to-r from-[#C9302C] to-[#052734] text-white rounded-lg text-sm font-medium hover:shadow-md transition-all">
                                        Select Trek
                                    </button>
                                    <div class="text-right">
                                        <div class="text-sm font-medium text-gray-900">Cultural Package</div>
                                        <div class="text-xs text-[#6D6E70]">Restricted area</div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-xs text-[#6D6E70] mt-3 pt-3 border-t border-gray-100">
                                    <span>Max altitude: 4,200m</span>
                                    <span>Restricted area permit</span>
                                </div>
                            </div>
                        </div>

                        <!-- Trek Card 6: Custom Your Own -->
                        <div class="group relative overflow-hidden rounded-xl border-2 border-dashed border-gray-300 hover:border-[#005991] transition-all duration-300 hover:shadow-lg bg-gradient-to-br from-white to-gray-50">
                            <div class="h-40 bg-gradient-to-r from-gray-100 to-gray-200 relative overflow-hidden flex items-center justify-center">
                                <div class="text-center p-4">
                                    <div class="w-16 h-16 rounded-full bg-gradient-to-r from-[#005991] to-[#4D8BB2] flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </div>
                                    <h4 class="text-xl font-bold text-gray-900">Design Your Own</h4>
                                    <p class="text-gray-600 text-sm">Custom itinerary</p>
                                </div>
                            </div>
                            <div class="p-5 text-center">
                                <p class="text-[#6D6E70] text-sm mb-4">
                                    Have a specific route in mind? Build your own custom trek with our expert team.
                                </p>
                                <div class="space-y-3">
                                    <button onclick="showCustomTrekModal()"
                                            class="w-full px-4 py-3 bg-gradient-to-r from-[#052734] to-[#005991] text-white rounded-lg font-medium hover:shadow-md transition-all">
                                        Design Custom Trek
                                    </button>
                                    <p class="text-xs text-[#6D6E70]">
                                        Our experts will help you create the perfect itinerary
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Accommodation & Services -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-[#4D8BB2] to-[#005991] flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Accommodation & Services</h3>
                            <p class="text-[#6D6E70] text-sm">Customize your comfort and support level</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Accommodation Level -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-4">Accommodation Style</label>
                            <div class="space-y-3">
                                <!-- Basic Teahouses -->
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl hover:border-[#4D8BB2] cursor-pointer transition-all">
                                    <input type="radio" 
                                           name="accommodation" 
                                           value="basic" 
                                           data-price-day="0"
                                           class="h-4 w-4 text-[#4D8BB2] focus:ring-[#4D8BB2] border-gray-300"
                                           onchange="selectAccommodation('basic', 0)" checked>
                                    <div class="ml-4 flex-1">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-900">Basic Teahouses</h4>
                                                <p class="text-[#6D6E70] text-sm mt-1">Shared rooms, basic facilities</p>
                                            </div>
                                            <span class="text-sm font-semibold text-[#99C723]">Included</span>
                                        </div>
                                    </div>
                                </label>
                                
                                <!-- Comfort Teahouses -->
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl hover:border-[#4D8BB2] cursor-pointer transition-all">
                                    <input type="radio" 
                                           name="accommodation" 
                                           value="comfort" 
                                           data-price-day="30"
                                           class="h-4 w-4 text-[#4D8BB2] focus:ring-[#4D8BB2] border-gray-300"
                                           onchange="selectAccommodation('comfort', 30)">
                                    <div class="ml-4 flex-1">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-900">Comfort Teahouses</h4>
                                                <p class="text-[#6D6E70] text-sm mt-1">Better rooms, hot showers</p>
                                            </div>
                                            <span class="text-sm font-semibold text-[#C9302C]">Upgrade Available</span>
                                        </div>
                                    </div>
                                </label>
                                
                                <!-- Luxury Lodges -->
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl hover:border-[#4D8BB2] cursor-pointer transition-all">
                                    <input type="radio" 
                                           name="accommodation" 
                                           value="luxury" 
                                           data-price-day="80"
                                           class="h-4 w-4 text-[#4D8BB2] focus:ring-[#4D8BB2] border-gray-300"
                                           onchange="selectAccommodation('luxury', 80)">
                                    <div class="ml-4 flex-1">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-900">Luxury Lodges</h4>
                                                <p class="text-[#6D6E70] text-sm mt-1">Best available, private rooms</p>
                                            </div>
                                            <span class="text-sm font-semibold text-[#C9302C]">Premium Upgrade</span>
                                        </div>
                                    </div>
                                </label>
                                
                                <!-- Mix & Match -->
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl hover:border-[#4D8BB2] cursor-pointer transition-all">
                                    <input type="radio" 
                                           name="accommodation" 
                                           value="mix" 
                                           data-price-day="0"
                                           class="h-4 w-4 text-[#4D8BB2] focus:ring-[#4D8BB2] border-gray-300"
                                           onchange="selectAccommodation('mix', 0)">
                                    <div class="ml-4 flex-1">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-semibold text-gray-900">Mix & Match</h4>
                                                <p class="text-[#6D6E70] text-sm mt-1">Combine different levels</p>
                                            </div>
                                            <span class="text-sm text-[#6D6E70]">Custom</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Support Team -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-4">Support Team</label>
                            <div class="space-y-4">
                                <!-- Guide Level -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-900 mb-2">Guide Level</h4>
                                    <div class="grid grid-cols-3 gap-2">
                                        <!-- Basic Guide -->
                                        <button class="guide-option py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-[#005991] transition-colors border-[#005991] bg-blue-50"
                                                data-level="basic"
                                                data-price="0"
                                                onclick="selectGuide('basic', 0)">
                                            <div class="text-sm font-medium text-gray-900">Basic</div>
                                            <div class="text-xs text-[#99C723] mt-1">Included</div>
                                        </button>
                                        
                                        <!-- Experienced Guide -->
                                        <button class="guide-option py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-[#005991] transition-colors"
                                                data-level="experienced"
                                                data-price="20"
                                                onclick="selectGuide('experienced', 20)">
                                            <div class="text-sm font-medium text-gray-900">Experienced</div>
                                            <div class="text-xs text-[#C9302C] mt-1">Upgrade</div>
                                        </button>
                                        
                                        <!-- Expert Guide -->
                                        <button class="guide-option py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-[#005991] transition-colors"
                                                data-level="expert"
                                                data-price="50"
                                                onclick="selectGuide('expert', 50)">
                                            <div class="text-sm font-medium text-gray-900">Expert Guide</div>
                                            <div class="text-xs text-[#C9302C] mt-1">Premium</div>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Porter Service -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-900 mb-2">Porter Service</h4>
                                    <div class="space-y-2">
                                        <label class="flex items-center">
                                            <input type="radio" 
                                                   name="porter" 
                                                   value="none" 
                                                   class="h-4 w-4 text-[#4D8BB2] focus:ring-[#4D8BB2] border-gray-300"
                                                   onchange="selectPorter('none', 0)">
                                            <span class="ml-2 text-sm text-gray-700">Carry your own gear</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" 
                                                   name="porter" 
                                                   value="shared" 
                                                   class="h-4 w-4 text-[#4D8BB2] focus:ring-[#4D8BB2] border-gray-300"
                                                   onchange="selectPorter('shared', 15)">
                                            <span class="ml-2 text-sm text-gray-700">Shared porter (1 per 2 people)</span>
                                            <span class="ml-auto text-sm text-[#C9302C]">Upgrade</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" 
                                                   name="porter" 
                                                   value="personal" 
                                                   class="h-4 w-4 text-[#4D8BB2] focus:ring-[#4D8BB2] border-gray-300"
                                                   onchange="selectPorter('personal', 30)" checked>
                                            <span class="ml-2 text-sm text-gray-700">Personal porter</span>
                                            <span class="ml-auto text-sm text-[#99C723]">Recommended</span>
                                        </label>
                                    </div>
                                </div>
                                
                                <!-- Group Size -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-900 mb-2">Group Preference</h4>
                                    <div class="grid grid-cols-3 gap-2">
                                        <!-- Solo -->
                                        <button class="group-option py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-[#005991] transition-colors"
                                                data-size="solo"
                                                data-price="500"
                                                onclick="selectGroup('solo', 500)">
                                            <div class="text-sm font-medium text-gray-900">Solo</div>
                                            <div class="text-xs text-[#C9302C] mt-1">Private</div>
                                        </button>
                                        
                                        <!-- Private -->
                                        <button class="group-option py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-[#005991] transition-colors border-[#005991] bg-blue-50"
                                                data-size="private"
                                                data-price="300"
                                                onclick="selectGroup('private', 300)">
                                            <div class="text-sm font-medium text-gray-900">Private</div>
                                            <div class="text-xs text-[#C9302C] mt-1">Custom</div>
                                        </button>
                                        
                                        <!-- Join Group -->
                                        <button class="group-option py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-[#005991] transition-colors"
                                                data-size="group"
                                                data-price="-100"
                                                onclick="selectGroup('group', -100)">
                                            <div class="text-sm font-medium text-gray-900">Join Group</div>
                                            <div class="text-xs text-[#99C723] mt-1">Economy</div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add-on Experiences -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-[#C9302C] to-[#C9302C]/80 flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Add-on Experiences</h3>
                            <p class="text-[#6D6E70] text-sm">Enhance your trek with special experiences</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Helicopter Return -->
                        <label class="group relative p-4 border-2 border-gray-200 rounded-xl hover:border-[#C9302C] cursor-pointer transition-all">
                            <input type="checkbox" 
                                   class="absolute top-3 right-3 h-5 w-5 text-[#C9302C] focus:ring-[#C9302C] border-gray-300 rounded"
                                   data-addon-id="helicopter"
                                   data-price="1200"
                                   onchange="toggleAddon('helicopter', 1200, this)">
                            <div class="w-10 h-10 rounded-lg bg-[#C9302C]/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-[#C9302C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-1">Helicopter Return</h4>
                            <p class="text-[#6D6E70] text-sm mb-2">Scenic flight back from the mountains</p>
                            <div class="text-sm font-semibold text-[#C9302C]">Premium Experience</div>
                        </label>
                        
                        <!-- Professional Photos -->
                        <label class="group relative p-4 border-2 border-gray-200 rounded-xl hover:border-[#C9302C] cursor-pointer transition-all">
                            <input type="checkbox" 
                                   class="absolute top-3 right-3 h-5 w-5 text-[#C9302C] focus:ring-[#C9302C] border-gray-300 rounded"
                                   data-addon-id="photography"
                                   data-price="600"
                                   onchange="toggleAddon('photography', 600, this)">
                            <div class="w-10 h-10 rounded-lg bg-[#C9302C]/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-[#C9302C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-1">Professional Photos</h4>
                            <p class="text-[#6D6E70] text-sm mb-2">Dedicated photographer for your trek</p>
                            <div class="text-sm font-semibold text-[#C9302C]">Memory Package</div>
                        </label>
                        
                        <!-- Peak Climbing -->
                        <label class="group relative p-4 border-2 border-gray-200 rounded-xl hover:border-[#C9302C] cursor-pointer transition-all">
                            <input type="checkbox" 
                                   class="absolute top-3 right-3 h-5 w-5 text-[#C9302C] focus:ring-[#C9302C] border-gray-300 rounded"
                                   data-addon-id="peak"
                                   data-price="800"
                                   onchange="toggleAddon('peak', 800, this)">
                            <div class="w-10 h-10 rounded-lg bg-[#C9302C]/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-[#C9302C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11l3-3m0 0l3 3m-3-3v8m0-13a9 9 0 110 18 9 9 0 010-18z" />
                                </svg>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-1">Peak Climbing</h4>
                            <p class="text-[#6D6E70] text-sm mb-2">Add a summit attempt to your trek</p>
                            <div class="text-sm font-semibold text-[#C9302C]">Adventure Add-on</div>
                        </label>
                        
                        <!-- Mountain Yoga -->
                        <label class="group relative p-4 border-2 border-gray-200 rounded-xl hover:border-[#C9302C] cursor-pointer transition-all">
                            <input type="checkbox" 
                                   class="absolute top-3 right-3 h-5 w-5 text-[#C9302C] focus:ring-[#C9302C] border-gray-300 rounded"
                                   data-addon-id="yoga"
                                   data-price="300"
                                   onchange="toggleAddon('yoga', 300, this)">
                            <div class="w-10 h-10 rounded-lg bg-[#C9302C]/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-[#C9302C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-1">Mountain Yoga</h4>
                            <p class="text-[#6D6E70] text-sm mb-2">Daily yoga sessions with mountain views</p>
                            <div class="text-sm font-semibold text-[#C9302C]">Wellness Package</div>
                        </label>
                        
                        <!-- Cultural Immersion -->
                        <label class="group relative p-4 border-2 border-gray-200 rounded-xl hover:border-[#C9302C] cursor-pointer transition-all">
                            <input type="checkbox" 
                                   class="absolute top-3 right-3 h-5 w-5 text-[#C9302C] focus:ring-[#C9302C] border-gray-300 rounded"
                                   data-addon-id="cultural"
                                   data-price="200"
                                   onchange="toggleAddon('cultural', 200, this)">
                            <div class="w-10 h-10 rounded-lg bg-[#C9302C]/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-[#C9302C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-1">Cultural Immersion</h4>
                            <p class="text-[#6D6E70] text-sm mb-2">Village homestays and local experiences</p>
                            <div class="text-sm font-semibold text-[#C9302C]">Cultural Package</div>
                        </label>
                        
                        <!-- Wildlife Safari -->
                        <label class="group relative p-4 border-2 border-gray-200 rounded-xl hover:border-[#C9302C] cursor-pointer transition-all">
                            <input type="checkbox" 
                                   class="absolute top-3 right-3 h-5 w-5 text-[#C9302C] focus:ring-[#C9302C] border-gray-300 rounded"
                                   data-addon-id="wildlife"
                                   data-price="400"
                                   onchange="toggleAddon('wildlife', 400, this)">
                            <div class="w-10 h-10 rounded-lg bg-[#C9302C]/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-[#C9302C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-1">Wildlife Safari</h4>
                            <p class="text-[#6D6E70] text-sm mb-2">Chitwan or Jungle safari extension</p>
                            <div class="text-sm font-semibold text-[#C9302C]">Safari Add-on</div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Right Column: Summary & Quote -->
            <div class="lg:col-span-1">
                <div class="sticky top-24">
                    <!-- Quote Summary Card -->
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden mb-6">
                        <div class="bg-gradient-to-r from-[#052734] to-[#005991] p-6 text-white">
                            <h3 class="text-xl font-bold mb-2">Your Custom Trek</h3>
                            <p class="text-[#4D8BB2] text-sm">Your personalized adventure summary</p>
                        </div>
                        
                        <div class="p-6">
                            <!-- Trek Summary -->
                            <div class="space-y-4">
                                <div class="pb-4 border-b border-gray-200">
                                    <div class="flex items-start gap-3">
                                        <div class="w-12 h-12 rounded-lg bg-gradient-to-r from-[#005991] to-[#4D8BB2] flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-900 text-lg" id="summaryTrekName">Everest Base Camp</div>
                                            <div class="flex items-center gap-3 mt-1">
                                                <span class="text-sm text-[#6D6E70]" id="summaryDuration">14 Days</span>
                                                <span class="text-sm px-2 py-1 rounded-full bg-[#C9302C]/10 text-[#C9302C] font-medium" id="summaryDifficulty">Challenging</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Customizations -->
                                <div class="space-y-2 max-h-60 overflow-y-auto pr-2" id="customizationList">
                                    <!-- Dynamically populated -->
                                </div>
                                
                                <!-- Summary Details -->
                                <div class="pt-4 border-t border-gray-200">
                                    <div class="space-y-2">
                                        <div class="flex justify-between items-center">
                                            <span class="text-[#6D6E70]">Package Type</span>
                                            <span class="font-semibold text-gray-900" id="packageType">Premium</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-[#6D6E70]">Group Type</span>
                                            <span class="font-semibold text-gray-900" id="groupType">Private</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-[#6D6E70]">Accommodation</span>
                                            <span class="font-semibold text-gray-900" id="accommodationType">Basic Teahouses</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Selected Add-ons -->
                                    <div class="mt-4 pt-4 border-t border-gray-200">
                                        <h4 class="text-sm font-medium text-gray-900 mb-2">Selected Add-ons</h4>
                                        <div class="space-y-1" id="selectedAddons">
                                            <!-- Dynamically populated -->
                                        </div>
                                        <p id="noAddonsMessage" class="text-sm text-[#6D6E70]">No add-ons selected</p>
                                    </div>
                                    
                                    <!-- Action Note -->
                                    <div class="mt-6 p-3 bg-gradient-to-r from-[#052734]/5 to-[#005991]/5 rounded-lg">
                                        <p class="text-sm text-[#6D6E70] text-center">
                                            Get a personalized quote by contacting our experts
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="space-y-3 mt-6">
                                <button onclick="saveCustomTrek()"
                                        class="w-full bg-gradient-to-r from-[#99C723] to-[#99C723]/80 hover:from-[#99C723]/90 hover:to-[#99C723]/70 text-white py-3 rounded-lg font-semibold transition-all hover:shadow-lg flex items-center justify-center group">
                                    <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                    </svg>
                                    Save This Trek
                                </button>
                                
                                <button onclick="requestDetailedQuote()"
                                        class="w-full bg-gradient-to-r from-[#052734] to-[#005991] hover:from-[#052734]/90 hover:to-[#005991]/90 text-white py-3 rounded-lg font-semibold transition-all hover:shadow-xl flex items-center justify-center group">
                                    <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Get Detailed Quote
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Help Card -->
                    <div class="bg-gradient-to-r from-[#052734]/5 to-[#005991]/5 rounded-2xl p-6 border border-[#4D8BB2]/20">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-[#99C723]/20 to-[#99C723]/10 flex items-center justify-center mr-3">
                                <svg class="w-6 h-6 text-[#99C723]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-gray-900">Need Help?</h4>
                        </div>
                        
                        <p class="text-[#6D6E70] text-sm mb-4">
                            Our trek experts can help design the perfect itinerary for you.
                        </p>
                        
                        <div class="space-y-3">
                            <button onclick="startLiveChat()"
                                    class="w-full border-2 border-[#005991] text-[#005991] hover:bg-[#005991] hover:text-white py-2 rounded-lg font-medium transition-all flex items-center justify-center group">
                                <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                Live Chat with Expert
                            </button>
                            
                            <button onclick="callExpert()"
                                    class="w-full border-2 border-[#99C723] text-[#99C723] hover:bg-[#99C723] hover:text-white py-2 rounded-lg font-medium transition-all flex items-center justify-center group">
                                <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                Call Our Expert
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script>
    // Trek Configuration
    let trekConfig = {
        duration: 14,
        difficulty: 'challenging',
        selectedTrek: {
            id: 'everest-base-camp',
            name: 'Everest Base Camp',
            package: 'Premium Package',
            duration: 14,
            difficulty: 'challenging'
        },
        accommodation: 'basic',
        accommodationName: 'Basic Teahouses',
        guideLevel: 'basic',
        porter: 'personal',
        groupSize: 'private',
        groupName: 'Private',
        addons: new Map() // Map to store addon name and type
    };

    // Package mapping
    const trekPackages = {
        'everest-base-camp': 'Premium Package',
        'annapurna-circuit': 'Standard Package',
        'langtang-valley': 'Budget Package',
        'manaslu-circuit': 'Expedition Package',
        'upper-mustang': 'Cultural Package'
    };

    // Addon names mapping
    const addonNames = {
        'helicopter': {name: 'Helicopter Return', type: 'Premium Experience'},
        'photography': {name: 'Professional Photos', type: 'Memory Package'},
        'peak': {name: 'Peak Climbing', type: 'Adventure Add-on'},
        'yoga': {name: 'Mountain Yoga', type: 'Wellness Package'},
        'cultural': {name: 'Cultural Immersion', type: 'Cultural Package'},
        'wildlife': {name: 'Wildlife Safari', type: 'Safari Add-on'}
    };

    // Difficulty colors mapping
    const difficultyColors = {
        'easy': {bg: '#99C72310', text: '#99C723'},
        'moderate': {bg: '#4D8BB210', text: '#4D8BB2'},
        'challenging': {bg: '#C9302C10', text: '#C9302C'},
        'extreme': {bg: '#05273410', text: '#052734'}
    };

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        updateDuration(14);
        selectTrek('everest-base-camp');
        updateSummary();
        updateDurationSuggestions(14);
    });

    // Update Duration
    function updateDuration(days) {
        trekConfig.duration = parseInt(days);
        document.getElementById('durationValue').textContent = `${days} days`;
        updateSummary();
        updateDurationSuggestions(days);
    }

    function updateDurationSuggestions(days) {
        const suggestions = document.getElementById('durationSuggestions');
        suggestions.innerHTML = '';
        
        let suggestionsList = [];
        
        if (days >= 3 && days <= 7) {
            suggestionsList = ['Short scenic trek', 'Perfect for beginners', 'Weekend getaway'];
        } else if (days >= 8 && days <= 14) {
            suggestionsList = ['Standard trek length', 'Good acclimatization', 'Most popular choice'];
        } else if (days >= 15 && days <= 21) {
            suggestionsList = ['Extended exploration', 'More destinations', 'Better acclimatization'];
        } else if (days >= 22 && days <= 35) {
            suggestionsList = ['Epic journey', 'Lifetime experience'];
        } else {
            suggestionsList = ['Expedition level', 'Professional trek'];
        }
        
        suggestionsList.forEach(text => {
            const div = document.createElement('div');
            div.className = 'flex items-center text-sm text-[#6D6E70]';
            div.innerHTML = `
                <svg class="w-4 h-4 text-[#99C723] mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                ${text}
            `;
            suggestions.appendChild(div);
        });
    }

    // Select Difficulty
    function selectDifficulty(level) {
        trekConfig.difficulty = level;
        
        // Update UI
        document.querySelectorAll('.difficulty-option').forEach(option => {
            option.classList.remove('border-[#005991]', 'bg-blue-50');
        });
        document.querySelector(`[data-level="${level}"]`).classList.add('border-[#005991]', 'bg-blue-50');
        
        updateSummary();
    }

    // Select Trek
    function selectTrek(trekId) {
        const trekName = document.querySelector(`[onclick="selectTrek('${trekId}')"]`).closest('.group').querySelector('h4').textContent;
        
        trekConfig.selectedTrek = {
            id: trekId,
            name: trekName,
            package: trekPackages[trekId] || 'Custom Package',
            duration: trekConfig.duration,
            difficulty: trekConfig.difficulty
        };
        
        // Update difficulty based on trek
        if (trekId === 'everest-base-camp' || trekId === 'manaslu-circuit') {
            selectDifficulty('challenging');
        } else if (trekId === 'annapurna-circuit' || trekId === 'upper-mustang') {
            selectDifficulty('moderate');
        } else if (trekId === 'langtang-valley') {
            selectDifficulty('easy');
        }
        
        updateSummary();
    }

    // Select Accommodation
    function selectAccommodation(level, pricePerDay) {
        trekConfig.accommodation = level;
        
        // Get accommodation name
        const accommodationLabel = document.querySelector(`input[value="${level}"]`).closest('label');
        trekConfig.accommodationName = accommodationLabel.querySelector('h4').textContent;
        
        updateSummary();
    }

    // Select Guide
    function selectGuide(level, pricePerDay) {
        trekConfig.guideLevel = level;
        
        // Update UI
        document.querySelectorAll('.guide-option').forEach(option => {
            option.classList.remove('border-[#005991]', 'bg-blue-50');
        });
        document.querySelector(`[data-level="${level}"]`).classList.add('border-[#005991]', 'bg-blue-50');
        
        updateSummary();
    }

    // Select Porter
    function selectPorter(type, pricePerDay) {
        trekConfig.porter = type;
        updateSummary();
    }

    // Select Group
    function selectGroup(size, price) {
        trekConfig.groupSize = size;
        
        // Get group name
        const groupButton = document.querySelector(`[data-size="${size}"]`);
        trekConfig.groupName = groupButton.querySelector('.text-sm').textContent;
        
        // Update UI
        document.querySelectorAll('.group-option').forEach(option => {
            option.classList.remove('border-[#005991]', 'bg-blue-50');
        });
        groupButton.classList.add('border-[#005991]', 'bg-blue-50');
        
        updateSummary();
    }

    // Toggle Addon
    function toggleAddon(addonId, price, checkbox) {
        if (checkbox.checked) {
            trekConfig.addons.set(addonId, addonNames[addonId]);
        } else {
            trekConfig.addons.delete(addonId);
        }
        updateSummary();
    }

    // Update Summary
    function updateSummary() {
        // Update trek name and duration
        document.getElementById('summaryTrekName').textContent = trekConfig.selectedTrek.name;
        document.getElementById('summaryDuration').textContent = `${trekConfig.duration} Days`;
        
        // Update difficulty with color
        const difficultyElement = document.getElementById('summaryDifficulty');
        difficultyElement.textContent = trekConfig.difficulty.charAt(0).toUpperCase() + trekConfig.difficulty.slice(1);
        difficultyElement.className = `text-sm px-2 py-1 rounded-full font-medium`;
        difficultyElement.style.backgroundColor = difficultyColors[trekConfig.difficulty].bg;
        difficultyElement.style.color = difficultyColors[trekConfig.difficulty].text;
        
        // Update package type
        document.getElementById('packageType').textContent = trekConfig.selectedTrek.package;
        
        // Update group type
        document.getElementById('groupType').textContent = trekConfig.groupName;
        
        // Update accommodation type
        document.getElementById('accommodationType').textContent = trekConfig.accommodationName;
        
        // Update customizations list
        const list = document.getElementById('customizationList');
        list.innerHTML = '';
        
        const customizations = [];
        
        // Add duration customization if different from default
        if (trekConfig.duration !== 14) {
            customizations.push(`${trekConfig.duration} days (custom duration)`);
        }
        
        // Add guide level if not basic
        if (trekConfig.guideLevel !== 'basic') {
            customizations.push(`${trekConfig.guideLevel} guide`);
        }
        
        // Add porter if not personal
        if (trekConfig.porter !== 'personal') {
            customizations.push(`${trekConfig.porter} porter service`);
        }
        
        // Add accommodation if not basic
        if (trekConfig.accommodation !== 'basic') {
            customizations.push(`${trekConfig.accommodation} accommodation`);
        }
        
        customizations.forEach(text => {
            const div = document.createElement('div');
            div.className = 'flex items-center text-sm text-[#6D6E70]';
            div.innerHTML = `
                <svg class="w-4 h-4 text-[#005991] mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                ${text}
            `;
            list.appendChild(div);
        });
        
        // If no customizations
        if (customizations.length === 0) {
            const div = document.createElement('div');
            div.className = 'text-center py-4 text-[#6D6E70] text-sm';
            div.textContent = 'Standard configuration selected';
            list.appendChild(div);
        }
        
        // Update selected add-ons
        const selectedAddons = document.getElementById('selectedAddons');
        const noAddonsMessage = document.getElementById('noAddonsMessage');
        selectedAddons.innerHTML = '';
        
        if (trekConfig.addons.size > 0) {
            noAddonsMessage.style.display = 'none';
            trekConfig.addons.forEach((addonInfo, addonId) => {
                const div = document.createElement('div');
                div.className = 'flex justify-between items-center text-sm py-1';
                div.innerHTML = `
                    <span class="text-[#6D6E70] truncate pr-2">${addonInfo.name}</span>
                    <span class="text-xs px-2 py-1 rounded-full bg-[#C9302C]/10 text-[#C9302C] font-medium">
                        ${addonInfo.type}
                    </span>
                `;
                selectedAddons.appendChild(div);
            });
        } else {
            noAddonsMessage.style.display = 'block';
        }
    }

    // Save Custom Trek
    function saveCustomTrek() {
        const trekData = {
            config: trekConfig,
            timestamp: new Date().toISOString()
        };
        
        // Save to localStorage
        localStorage.setItem('customTrek', JSON.stringify(trekData));
        
        // Show success message
        const button = event.target;
        const originalText = button.innerHTML;
        button.innerHTML = `
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Trek Saved!
        `;
        button.disabled = true;
        
        setTimeout(() => {
            button.innerHTML = originalText;
            button.disabled = false;
            
            // Show notification
            showNotification('Your trek configuration has been saved successfully!');
        }, 1500);
    }

    // Request Detailed Quote
    function requestDetailedQuote() {
        const trekData = {
            config: trekConfig,
            contactInfo: {}
        };
        
        showNotification('Our expert will contact you shortly with a detailed quote!');
        
        // In a real application, you would send this data to your server
        console.log('Quote requested for:', trekData);
    }

    // Show Custom Trek Modal
    function showCustomTrekModal() {
        showNotification('Custom trek design feature will be available soon!');
    }

    // Helper functions
    function startLiveChat() {
        showNotification('Live chat feature coming soon!');
    }

    function callExpert() {
        showNotification('Call our expert at +977-980-1234567');
    }

    function showNotification(message) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'fixed top-4 right-4 bg-gradient-to-r from-[#052734] to-[#005991] text-white px-6 py-3 rounded-lg shadow-xl z-50 transform translate-x-full opacity-0 transition-all duration-300';
        notification.textContent = message;
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full', 'opacity-0');
            notification.classList.add('translate-x-0', 'opacity-100');
        }, 10);
        
        // Remove after 3 seconds
        setTimeout(() => {
            notification.classList.add('translate-x-full', 'opacity-0');
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }
</script>

<style>
    .slider-blue::-webkit-slider-thumb {
        appearance: none;
        height: 24px;
        width: 24px;
        border-radius: 50%;
        background: #005991;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0, 91, 145, 0.3);
        border: 3px solid white;
    }

    .slider-blue::-moz-range-thumb {
        height: 24px;
        width: 24px;
        border-radius: 50%;
        background: #005991;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0, 91, 145, 0.3);
        border: 3px solid white;
    }

    input[type="checkbox"]:checked + div {
        border-color: #005991 !important;
        background-color: rgba(0, 91, 145, 0.05) !important;
    }

    input[type="radio"]:checked + div {
        border-color: #005991 !important;
        background-color: rgba(0, 91, 145, 0.05) !important;
    }
</style>