{{-- resources/views/sections/home/blog.blade.php --}}
<section class="py-16 md:py-24 bg-gradient-to-b from-stone-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-10 md:mb-14">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-amber-50 border border-amber-200/60 rounded-full text-amber-700 text-sm font-medium mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    Travel Stories
                </div>
                <h2 class="text-3xl md:text-4xl font-light text-stone-800 tracking-tight">
                    From the <span class="font-semibold">Trail</span>
                </h2>
                <p class="text-stone-500 mt-2 max-w-md">
                    Expert guides, insider tips, and inspiring stories from the Himalayas
                </p>
            </div>
            
            <a href="" class="group inline-flex items-center gap-2 text-stone-600 hover:text-amber-700 font-medium transition-colors">
                Browse all articles
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>

        {{-- Blog Grid --}}
        <div class="grid lg:grid-cols-12 gap-6 lg:gap-8">
            
            {{-- Featured Article - Large Card --}}
            <article class="lg:col-span-7 group">
                <a href="#" class="block relative rounded-2xl overflow-hidden bg-stone-900 aspect-[2/3] lg:aspect-[16/10]">
                    {{-- Image --}}
                    <img 
                        src="{{ asset('user-assets/images/productImages/everest1.png') }}" 
                        alt="Everest Base Camp Trek: A Complete Guide"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                    />
                    
                    {{-- Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-900 via-stone-900/40 to-transparent"></div>
                    
                    {{-- Featured Badge --}}
                    <div class="absolute top-5 left-5">
                        <span class="inline-flex items-center gap-1.5 bg-amber-500 text-white px-3 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wide shadow-lg">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            Featured
                        </span>
                    </div>
                    
                    {{-- Content --}}
                    <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="bg-white/20 backdrop-blur-sm text-white/90 text-xs font-medium px-3 py-1 rounded-full">
                                Trekking Guide
                            </span>
                            <span class="text-white/60 text-sm flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                8 min read
                            </span>
                        </div>
                        
                        <h3 class="text-xl md:text-2xl lg:text-3xl font-semibold text-white mb-3 group-hover:text-amber-200 transition-colors">
                            Everest Base Camp Trek: A Complete Guide for 2024
                        </h3>
                        
                        <p class="text-white/70 text-sm md:text-base mb-5 line-clamp-2 max-w-xl">
                            Everything you need to know about trekking to Everest Base Camp, from permits to packing lists and altitude acclimatization tips.
                        </p>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-amber-500/20 backdrop-blur-sm flex items-center justify-center ring-2 ring-white/20">
                                    <svg class="w-5 h-5 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white text-sm font-medium">Trail Expert</p>
                                    <p class="text-white/50 text-xs">Mar 15, 2024</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-1.5 text-white/60 text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                12.5k views
                            </div>
                        </div>
                    </div>
                </a>
            </article>

            {{-- Side Articles --}}
            <div class="lg:col-span-5 flex flex-col gap-5">
                
                {{-- Article Card 1 --}}
                <article class="group flex-1">
                    <a href="#" class="flex gap-4 p-4 bg-white rounded-xl border border-stone-200/80 hover:border-amber-300/50 hover:shadow-lg hover:shadow-amber-100/50 transition-all duration-300">
                        {{-- Image --}}
                        <div class="relative w-28 md:w-32 flex-shrink-0 rounded-lg overflow-hidden">
                            <img 
                                src="{{ asset('user-assets/images/productImages/everest.png') }}" 
                                alt="Best Time to Visit Nepal"
                                class="w-full h-full object-cover aspect-square group-hover:scale-110 transition-transform duration-500"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-stone-900/20 to-transparent"></div>
                        </div>
                        
                        {{-- Content --}}
                        <div class="flex-1 flex flex-col justify-between py-1">
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-xs font-medium text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">
                                        Travel Tips
                                    </span>
                                    <span class="text-stone-400 text-xs">6 min</span>
                                </div>
                                
                                <h4 class="text-base font-semibold text-stone-800 group-hover:text-amber-700 transition-colors line-clamp-2 mb-2">
                                    Best Time to Visit Nepal: Season Guide
                                </h4>
                            </div>
                            
                            <div class="flex items-center justify-between text-xs text-stone-500">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Feb 28, 2024
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    8.7k
                                </span>
                            </div>
                        </div>
                    </a>
                </article>

                {{-- Article Card 2 --}}
                <article class="group flex-1">
                    <a href="#" class="flex gap-4 p-4 bg-white rounded-xl border border-stone-200/80 hover:border-amber-300/50 hover:shadow-lg hover:shadow-amber-100/50 transition-all duration-300">
                        {{-- Image --}}
                        <div class="relative w-28 md:w-32 flex-shrink-0 rounded-lg overflow-hidden">
                            <img 
                                src="https://images.unsplash.com/photo-1526938972776-11558ad4de30?w=500&auto=format&fit=crop&q=60" 
                                alt="Annapurna vs Everest"
                                class="w-full h-full object-cover aspect-square group-hover:scale-110 transition-transform duration-500"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-stone-900/20 to-transparent"></div>
                        </div>
                        
                        {{-- Content --}}
                        <div class="flex-1 flex flex-col justify-between py-1">
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-xs font-medium text-blue-700 bg-blue-50 px-2 py-0.5 rounded">
                                        Comparison
                                    </span>
                                    <span class="text-stone-400 text-xs">10 min</span>
                                </div>
                                
                                <h4 class="text-base font-semibold text-stone-800 group-hover:text-amber-700 transition-colors line-clamp-2 mb-2">
                                    Annapurna vs Everest: Which Trek is Right for You?
                                </h4>
                            </div>
                            
                            <div class="flex items-center justify-between text-xs text-stone-500">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Jan 20, 2024
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    15.2k
                                </span>
                            </div>
                        </div>
                    </a>
                </article>
                <article class="group flex-1">
                    <a href="#" class="flex gap-4 p-4 bg-white rounded-xl border border-stone-200/80 hover:border-amber-300/50 hover:shadow-lg hover:shadow-amber-100/50 transition-all duration-300">
                        {{-- Image --}}
                        <div class="relative w-28 md:w-32 flex-shrink-0 rounded-lg overflow-hidden">
                            <img 
                                src="https://images.unsplash.com/photo-1526938972776-11558ad4de30?w=500&auto=format&fit=crop&q=60" 
                                alt="Annapurna vs Everest"
                                class="w-full h-full object-cover aspect-square group-hover:scale-110 transition-transform duration-500"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-stone-900/20 to-transparent"></div>
                        </div>
                        
                        {{-- Content --}}
                        <div class="flex-1 flex flex-col justify-between py-1">
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-xs font-medium text-blue-700 bg-blue-50 px-2 py-0.5 rounded">
                                        Comparison
                                    </span>
                                    <span class="text-stone-400 text-xs">10 min</span>
                                </div>
                                
                                <h4 class="text-base font-semibold text-stone-800 group-hover:text-amber-700 transition-colors line-clamp-2 mb-2">
                                    Annapurna vs Everest: Which Trek is Right for You?
                                </h4>
                            </div>
                            
                            <div class="flex items-center justify-between text-xs text-stone-500">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Jan 20, 2024
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    15.2k
                                </span>
                            </div>
                        </div>
                    </a>
                </article>
            </div>
        </div>
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</section>
