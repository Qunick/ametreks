{{-- resources/views/sections/home/blog.blade.php --}}
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header - Centered -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-[#99C723]/10 border border-[#99C723]/30 rounded-full text-[#99C723] text-sm font-medium mb-3">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
                Trending Now
            </div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                Popular Travel Blogs
            </h2>
            <p class="text-[#6D6E70] text-sm mt-2 max-w-xl mx-auto">
                Expert guides, tips and stories from the Himalayas
            </p>
        </div>

        <!-- Main Blog Grid -->
        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Featured Big Blog -->
            <div class="lg:col-span-2">
                <article class="group bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-[#4D8BB2]/50 transition-all duration-300 hover:shadow-lg">
                    <!-- Image with Featured Badge -->
                    <div class="relative h-56 md:h-64 overflow-hidden">
                        <img 
                            src="{{ asset('user-assets/images/productImages/everest1.png') }}" 
                            alt="Everest Base Camp Trek: A Complete Guide for 2024"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        />
                        <div class="absolute top-4 left-4">
                            <span class="bg-gradient-to-r from-[#C9302C] to-[#C9302C]/80 text-white px-3 py-1 rounded-full text-xs font-semibold shadow-md">
                                Featured
                            </span>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-5">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="bg-[#4D8BB2]/10 text-[#005991] text-xs font-medium px-2.5 py-1 rounded-full">
                                Trekking Guide
                            </span>
                            <div class="flex items-center gap-1 text-[#6D6E70] text-xs">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Mar 15, 2024
                            </div>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#005991] transition-colors">
                            Everest Base Camp Trek: A Complete Guide for 2024
                        </h3>
                        
                        <p class="text-[#6D6E70] text-sm mb-4">
                            Everything you need to know about trekking to Everest Base Camp, from permits to packing lists and altitude tips.
                        </p>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 bg-[#4D8BB2]/10 rounded-full flex items-center justify-center">
                                    <svg class="w-3.5 h-3.5 text-[#005991]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700">Guide</span>
                            </div>
                            
                            <div class="flex items-center gap-4 text-xs text-[#6D6E70]">
                                <div class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    8 min read
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    12.5k
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Side Column - Small Blogs with View All at Bottom -->
            <div class="flex flex-col">
                <!-- Small Blogs -->
                <div class="space-y-5 flex-1">
                    <!-- Blog 1 -->
                    <article class="group bg-white rounded-lg overflow-hidden border border-gray-200 hover:border-[#4D8BB2]/50 transition-all duration-300 hover:shadow-md">
                        <div class="flex">
                            <!-- Image -->
                            <div class="w-24 flex-shrink-0 relative overflow-hidden">
                                <img 
                                    src="{{ asset('user-assets/images/productImages/everest.png') }}" 
                                    alt="Best Time to Visit Nepal"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 min-h-24"
                                />
                                <div class="absolute inset-0 bg-gradient-to-r from-black/10 to-transparent"></div>
                            </div>
                            
                            <!-- Content -->
                            <div class="flex-1 p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs font-medium text-[#005991] bg-[#4D8BB2]/10 px-2 py-1 rounded">
                                        Travel Tips
                                    </span>
                                    <div class="flex items-center gap-1 text-[#6D6E70]/70 text-xs">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        8.7k
                                    </div>
                                </div>
                                
                                <h4 class="text-sm font-semibold text-gray-900 mb-2 group-hover:text-[#005991] transition-colors line-clamp-2">
                                    Best Time to Visit Nepal
                                </h4>
                                
                                <div class="flex items-center justify-between text-xs text-[#6D6E70]">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        Feb 28, 2024
                                    </div>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        6 min
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Blog 2 -->
                    <article class="group bg-white rounded-lg overflow-hidden border border-gray-200 hover:border-[#4D8BB2]/50 transition-all duration-300 hover:shadow-md">
                        <div class="flex">
                            <!-- Image -->
                            <div class="w-24 flex-shrink-0 relative overflow-hidden">
                                <img 
                                    src="https://images.unsplash.com/photo-1526938972776-11558ad4de30?w=500&auto=format&fit=crop&q=60" 
                                    alt="Annapurna vs Everest"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 min-h-24"
                                />
                                <div class="absolute inset-0 bg-gradient-to-r from-black/10 to-transparent"></div>
                            </div>
                            
                            <!-- Content -->
                            <div class="flex-1 p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs font-medium text-[#005991] bg-[#4D8BB2]/10 px-2 py-1 rounded">
                                        Comparison
                                    </span>
                                    <div class="flex items-center gap-1 text-[#6D6E70]/70 text-xs">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        15.2k
                                    </div>
                                </div>
                                
                                <h4 class="text-sm font-semibold text-gray-900 mb-2 group-hover:text-[#005991] transition-colors line-clamp-2">
                                    Annapurna vs Everest
                                </h4>
                                
                                <div class="flex items-center justify-between text-xs text-[#6D6E70]">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        Jan 20, 2024
                                    </div>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        10 min
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Blog 3 -->
                    <article class="group bg-white rounded-lg overflow-hidden border border-gray-200 hover:border-[#4D8BB2]/50 transition-all duration-300 hover:shadow-md">
                        <div class="flex">
                            <!-- Image -->
                            <div class="w-24 flex-shrink-0 relative overflow-hidden">
                                <img 
                                    src="https://images.unsplash.com/photo-1594559672568-3c9d7b592c7e?w=500&auto=format&fit=crop&q=60" 
                                    alt="Essential Trekking Gear for Nepal"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 min-h-24"
                                />
                                <div class="absolute inset-0 bg-gradient-to-r from-black/10 to-transparent"></div>
                            </div>
                            
                            <!-- Content -->
                            <div class="flex-1 p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-xs font-medium text-[#005991] bg-[#4D8BB2]/10 px-2 py-1 rounded">
                                        Gear Guide
                                    </span>
                                    <div class="flex items-center gap-1 text-[#6D6E70]/70 text-xs">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        9.3k
                                    </div>
                                </div>
                                
                                <h4 class="text-sm font-semibold text-gray-900 mb-2 group-hover:text-[#005991] transition-colors line-clamp-2">
                                    Essential Trekking Gear for Nepal
                                </h4>
                                
                                <div class="flex items-center justify-between text-xs text-[#6D6E70]">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        Dec 15, 2023
                                    </div>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        7 min
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                
                <!-- View All Articles - At bottom of the three blogs -->
                <div class="mt-6 pt-4 border-t border-gray-100">
                    <a 
                        href="#"
                        class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-[#052734]/5 to-[#005991]/5 text-[#005991] font-medium rounded-lg hover:from-[#052734]/10 hover:to-[#005991]/10 transition-all duration-300 group hover:shadow-sm"
                    >
                        View All Articles
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</section>