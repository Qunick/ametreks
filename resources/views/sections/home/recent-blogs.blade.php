{{-- Blog Section --}}
<section class="py-20 lg:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Section Header --}}
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-14">
            <div>
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-[#005991]/10 text-[#005991] text-xs font-semibold tracking-[0.15em] uppercase rounded-full border border-[#005991]/20 mb-5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    Our Blog
                </span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#052734] tracking-tight">
                    Latest Travel <span class="text-[#005991]">Stories</span>
                </h2>
                <p class="mt-4 text-[#6D6E70] text-lg max-w-2xl">
                    Tips, guides, and inspiring stories from the Himalayas to help you plan your next adventure.
                </p>
            </div>
            <a href="/blog" class="inline-flex items-center gap-2 px-6 py-3 bg-[#005991] hover:bg-[#052734] text-white font-semibold rounded-xl transition-all duration-300 group self-start lg:self-auto">
                View All Posts
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        {{-- Blog Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            {{-- Featured Blog Post (Large) --}}
            <div class="md:col-span-2 lg:col-span-2 lg:row-span-2 group">
                <a href="#" class="block relative h-full min-h-[400px] lg:min-h-[500px] rounded-3xl overflow-hidden">
                    <img 
                        src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?w=1200&auto=format&fit=crop&q=80" 
                        alt="Everest Base Camp Trek Guide"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#052734] via-[#052734]/50 to-transparent"></div>
                    
                    {{-- Content --}}
                    <div class="absolute inset-0 p-8 lg:p-10 flex flex-col justify-end">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="px-3 py-1 bg-[#99c723] text-white text-xs font-bold rounded-full uppercase tracking-wide">
                                Featured
                            </span>
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-xs font-medium rounded-full">
                                Trekking Guide
                            </span>
                        </div>
                        <h3 class="text-2xl lg:text-3xl font-bold text-white mb-3 group-hover:text-[#4D8BB2] transition-colors">
                            The Ultimate Everest Base Camp Trek Guide 2024
                        </h3>
                        <p class="text-white/80 mb-5 line-clamp-2 max-w-xl">
                            Everything you need to know about trekking to Everest Base Camp - from preparation tips to day-by-day itinerary and what to expect along the way.
                        </p>
                        <div class="flex items-center gap-4">
                            <img 
                                src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80" 
                                alt="Author"
                                class="w-10 h-10 rounded-full object-cover border-2 border-white/30"
                            />
                            <div>
                                <p class="text-white font-medium text-sm">Pemba Sherpa</p>
                                <p class="text-white/60 text-xs">Jan 15, 2024 · 12 min read</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Blog Post 2 --}}
            <div class="group">
                <a href="#" class="block">
                    <div class="relative h-56 rounded-2xl overflow-hidden mb-5">
                        <img 
                            src="https://images.unsplash.com/photo-1585409677983-0f6c41ca9c3b?w=600&auto=format&fit=crop&q=80" 
                            alt="Annapurna Circuit"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        />
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-[#005991] text-white text-xs font-medium rounded-full">
                                Adventure
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-[#6D6E70] mb-3">
                        <span>Dec 28, 2023</span>
                        <span class="w-1 h-1 bg-[#6D6E70] rounded-full"></span>
                        <span>8 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#052734] mb-3 group-hover:text-[#005991] transition-colors line-clamp-2">
                        10 Things to Pack for Annapurna Circuit Trek
                    </h3>
                    <p class="text-[#6D6E70] text-sm line-clamp-2 mb-4">
                        A comprehensive packing list to ensure you're fully prepared for the diverse terrains and weather conditions.
                    </p>
                    <div class="flex items-center gap-3">
                        <img 
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80" 
                            alt="Author"
                            class="w-8 h-8 rounded-full object-cover"
                        />
                        <span class="text-sm font-medium text-[#052734]">Sarah Mitchell</span>
                    </div>
                </a>
            </div>

            {{-- Blog Post 3 --}}
            <div class="group">
                <a href="#" class="block">
                    <div class="relative h-56 rounded-2xl overflow-hidden mb-5">
                        <img 
                            src="https://images.unsplash.com/photo-1571401835393-8c5f35328320?w=600&auto=format&fit=crop&q=80" 
                            alt="Nepal Culture"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        />
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-[#4D8BB2] text-white text-xs font-medium rounded-full">
                                Culture
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-[#6D6E70] mb-3">
                        <span>Dec 15, 2023</span>
                        <span class="w-1 h-1 bg-[#6D6E70] rounded-full"></span>
                        <span>6 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#052734] mb-3 group-hover:text-[#005991] transition-colors line-clamp-2">
                        Experiencing Local Culture in Kathmandu Valley
                    </h3>
                    <p class="text-[#6D6E70] text-sm line-clamp-2 mb-4">
                        Discover the rich heritage, ancient temples, and vibrant traditions of Nepal's cultural heart.
                    </p>
                    <div class="flex items-center gap-3">
                        <img 
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&auto=format&fit=crop&q=80" 
                            alt="Author"
                            class="w-8 h-8 rounded-full object-cover"
                        />
                        <span class="text-sm font-medium text-[#052734]">Rajesh Thapa</span>
                    </div>
                </a>
            </div>

        </div>

        {{-- Bottom CTA Bar --}}
        <div class="mt-16 bg-gradient-to-r from-[#005991] to-[#4D8BB2] rounded-2xl p-8 lg:p-10 flex flex-col lg:flex-row items-center justify-between gap-6">
            <div class="text-center lg:text-left">
                <h3 class="text-xl lg:text-2xl font-bold text-white mb-2">
                    Subscribe to Our Newsletter
                </h3>
                <p class="text-white/80 text-sm">
                    Get travel tips, exclusive deals, and inspiring stories delivered to your inbox.
                </p>
            </div>
            <form class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                <input 
                    type="email" 
                    placeholder="Enter your email"
                    class="px-5 py-3.5 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none focus:border-white/50 focus:bg-white/20 transition-all w-full sm:w-72"
                />
                <button type="submit" class="px-8 py-3.5 bg-white text-[#005991] font-bold rounded-xl hover:bg-[#99c723] hover:text-white transition-all duration-300 whitespace-nowrap">
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</section>