{{-- resources/views/sections/home/videos.blade.php --}}
<section class="py-12 sm:py-16 lg:py-20 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8 sm:mb-12">
            <span class="inline-block px-4 py-1.5 text-sm font-medium rounded-full mb-4" style="background-color: rgba(0, 89, 145, 0.1); color: #005991;">
                Adventure Reels
            </span>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-3" style="color: #052734;">
                Top Adventure Videos
            </h2>
            <p class="text-base sm:text-lg max-w-2xl mx-auto" style="color: #6D6E70;">
                Experience the breathtaking Himalayas in action through our expedition highlights
            </p>
        </div>

        <!-- Carousel Container -->
        <div class="relative">
            <!-- Navigation Arrows -->
            <button 
                onclick="slideVideos('prev')"
                class="hidden sm:flex absolute -left-4 lg:-left-6 top-1/2 -translate-y-1/2 z-20 w-12 h-12 items-center justify-center rounded-full bg-white shadow-lg border transition-all duration-300 hover:scale-110"
                style="border-color: #005991; color: #005991;"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            
            <button 
                onclick="slideVideos('next')"
                class="hidden sm:flex absolute -right-4 lg:-right-6 top-1/2 -translate-y-1/2 z-20 w-12 h-12 items-center justify-center rounded-full bg-white shadow-lg border transition-all duration-300 hover:scale-110"
                style="border-color: #005991; color: #005991;"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            <!-- Carousel Track -->
            <div class="overflow-hidden mx-0 sm:-mx-4">
                <div 
                    id="video-carousel-track" 
                    class="flex transition-transform duration-500 ease-out gap-4 sm:gap-5 lg:gap-6 px-0 sm:px-4"
                    style="cursor: grab;"
                >
                    <!-- Video 1 -->
                    <div class="video-card flex-shrink-0 w-[85%] sm:w-[calc(50%-10px)] lg:w-[calc(33.333%-16px)] relative bg-gray-50 rounded-2xl overflow-hidden group border-2 border-transparent hover:border-[#005991] transition-all duration-300 shadow-sm hover:shadow-xl">
                        <div class="relative aspect-[9/16] sm:aspect-[9/14] bg-gray-900">
                            <video 
                                id="video-1"
                                class="w-full h-full object-cover"
                                muted
                                loop
                                playsinline
                                preload="metadata"
                                poster="{{ asset('user-assets/videosReels/thumb-1.jpg') }}"
                            >
                                <source src="{{ asset('user-assets/videosReels/m.mp4') }}" type="video/mp4">
                            </video>
                            
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            
                            <!-- Duration Badge -->
                            <div class="absolute top-3 right-3 px-2 py-1 rounded-md text-xs font-medium text-white bg-black/50 backdrop-blur-sm">
                                0:45
                            </div>

                            <!-- Views Badge -->
                            <div class="absolute top-3 left-3 flex items-center gap-1 px-2 py-1 rounded-md text-xs font-medium text-white bg-black/50 backdrop-blur-sm">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                </svg>
                                12.5K
                            </div>

                            <!-- Big Play Button - Always visible until played -->
                            <button 
                                onclick="togglePlayPause(1)"
                                id="big-play-btn-1"
                                class="absolute inset-0 w-full h-full flex items-center justify-center transition-opacity"
                            >
                                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center transition-transform hover:scale-110" style="background-color: rgba(0, 89, 145, 0.9);">
                                    <svg id="center-play-1" class="w-7 h-7 sm:w-8 sm:h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                    <svg id="center-pause-1" class="w-7 h-7 sm:w-8 sm:h-8 text-white hidden" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                                    </svg>
                                </div>
                            </button>
                            
                            <!-- Bottom Controls -->
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <!-- Progress Bar -->
                                <div class="w-full h-1 bg-white/30 rounded-full mb-3 overflow-hidden">
                                    <div id="progress-1" class="h-full rounded-full transition-all duration-100" style="width: 0%; background-color: #99C723;"></div>
                                </div>
                                
                                <!-- Controls Row -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <button 
                                            onclick="togglePlayPause(1); event.stopPropagation();"
                                            class="p-2 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all"
                                        >
                                            <svg id="play-icon-1" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z"/>
                                            </svg>
                                            <svg id="pause-icon-1" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                                            </svg>
                                        </button>

                                        <button 
                                            onclick="toggleMute(1); event.stopPropagation();"
                                            class="p-2 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all"
                                        >
                                            <svg id="mute-icon-1" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/>
                                            </svg>
                                            <svg id="unmute-icon-1" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <button 
                                        onclick="openFullscreen(1); event.stopPropagation();"
                                        class="p-2 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all"
                                    >
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Video Info -->
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-1" style="color: #052734;">
                                Everest Base Camp Journey
                            </h3>
                            <div class="flex items-center justify-between">
                                <p class="text-sm" style="color: #6D6E70;">Khumbu Region</p>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" style="color: #C9302C;" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                    </svg>
                                    <span class="text-sm font-medium" style="color: #6D6E70;">2.3K</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video 2 -->
                    <div class="video-card flex-shrink-0 w-[85%] sm:w-[calc(50%-10px)] lg:w-[calc(33.333%-16px)] relative bg-gray-50 rounded-2xl overflow-hidden group border-2 border-transparent hover:border-[#005991] transition-all duration-300 shadow-sm hover:shadow-xl">
                        <div class="relative aspect-[9/16] sm:aspect-[9/14] bg-gray-900">
                            <video 
                                id="video-2"
                                class="w-full h-full object-cover"
                                muted
                                loop
                                playsinline
                                preload="metadata"
                            >
                                <source src="{{ asset('user-assets/videosReels/n.mp4') }}" type="video/mp4">
                            </video>
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            
                            <div class="absolute top-3 right-3 px-2 py-1 rounded-md text-xs font-medium text-white bg-black/50 backdrop-blur-sm">
                                1:02
                            </div>

                            <div class="absolute top-3 left-3 flex items-center gap-1 px-2 py-1 rounded-md text-xs font-medium text-white bg-black/50 backdrop-blur-sm">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                </svg>
                                8.7K
                            </div>

                            <button 
                                onclick="togglePlayPause(2)"
                                id="big-play-btn-2"
                                class="absolute inset-0 w-full h-full flex items-center justify-center transition-opacity"
                            >
                                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center transition-transform hover:scale-110" style="background-color: rgba(0, 89, 145, 0.9);">
                                    <svg id="center-play-2" class="w-7 h-7 sm:w-8 sm:h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                    <svg id="center-pause-2" class="w-7 h-7 sm:w-8 sm:h-8 text-white hidden" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                                    </svg>
                                </div>
                            </button>
                            
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <div class="w-full h-1 bg-white/30 rounded-full mb-3 overflow-hidden">
                                    <div id="progress-2" class="h-full rounded-full transition-all duration-100" style="width: 0%; background-color: #99C723;"></div>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <button onclick="togglePlayPause(2); event.stopPropagation();" class="p-2 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all">
                                            <svg id="play-icon-2" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                            <svg id="pause-icon-2" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                                        </button>
                                        <button onclick="toggleMute(2); event.stopPropagation();" class="p-2 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all">
                                            <svg id="mute-icon-2" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/></svg>
                                            <svg id="unmute-icon-2" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/></svg>
                                        </button>
                                    </div>
                                    <button onclick="openFullscreen(2); event.stopPropagation();" class="p-2 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-1" style="color: #052734;">Annapurna Circuit Trail</h3>
                            <div class="flex items-center justify-between">
                                <p class="text-sm" style="color: #6D6E70;">Mustang Valley</p>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" style="color: #C9302C;" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                                    <span class="text-sm font-medium" style="color: #6D6E70;">1.8K</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video 3 -->
                    <div class="video-card flex-shrink-0 w-[85%] sm:w-[calc(50%-10px)] lg:w-[calc(33.333%-16px)] relative bg-gray-50 rounded-2xl overflow-hidden group border-2 border-transparent hover:border-[#005991] transition-all duration-300 shadow-sm hover:shadow-xl">
                        <div class="relative aspect-[9/16] sm:aspect-[9/14] bg-gray-900">
                            <video 
                                id="video-3"
                                class="w-full h-full object-cover"
                                muted
                                loop
                                playsinline
                                preload="metadata"
                            >
                                <source src="{{ asset('user-assets/videosReels/o.mp4') }}" type="video/mp4">
                            </video>
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            
                            <div class="absolute top-3 right-3 px-2 py-1 rounded-md text-xs font-medium text-white bg-black/50 backdrop-blur-sm">
                                0:58
                            </div>

                            <div class="absolute top-3 left-3 flex items-center gap-1 px-2 py-1 rounded-md text-xs font-medium text-white bg-black/50 backdrop-blur-sm">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                                15.2K
                            </div>

                            <button onclick="togglePlayPause(3)" id="big-play-btn-3" class="absolute inset-0 w-full h-full flex items-center justify-center transition-opacity">
                                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center transition-transform hover:scale-110" style="background-color: rgba(0, 89, 145, 0.9);">
                                    <svg id="center-play-3" class="w-7 h-7 sm:w-8 sm:h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    <svg id="center-pause-3" class="w-7 h-7 sm:w-8 sm:h-8 text-white hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                                </div>
                            </button>
                            
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <div class="w-full h-1 bg-white/30 rounded-full mb-3 overflow-hidden">
                                    <div id="progress-3" class="h-full rounded-full transition-all duration-100" style="width: 0%; background-color: #99C723;"></div>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <button onclick="togglePlayPause(3); event.stopPropagation();" class="p-2 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all">
                                            <svg id="play-icon-3" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                            <svg id="pause-icon-3" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                                        </button>
                                        <button onclick="toggleMute(3); event.stopPropagation();" class="p-2 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all">
                                            <svg id="mute-icon-3" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/></svg>
                                            <svg id="unmute-icon-3" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/></svg>
                                        </button>
                                    </div>
                                    <button onclick="openFullscreen(3); event.stopPropagation();" class="p-2 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-1" style="color: #052734;">Langtang Valley Trek</h3>
                            <div class="flex items-center justify-between">
                                <p class="text-sm" style="color: #6D6E70;">Langtang Region</p>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" style="color: #C9302C;" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                                    <span class="text-sm font-medium" style="color: #6D6E70;">3.1K</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video 4 -->
                    <div class="video-card flex-shrink-0 w-[85%] sm:w-[calc(50%-10px)] lg:w-[calc(33.333%-16px)] relative bg-gray-50 rounded-2xl overflow-hidden group border-2 border-transparent hover:border-[#005991] transition-all duration-300 shadow-sm hover:shadow-xl">
                        <div class="relative aspect-[9/16] sm:aspect-[9/14] bg-gray-900">
                            <video 
                                id="video-4"
                                class="w-full h-full object-cover"
                                muted
                                loop
                                playsinline
                                preload="metadata"
                            >
                                <source src="{{ asset('user-assets/videosReels/p.mp4') }}" type="video/mp4">
                            </video>
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            
                            <div class="absolute top-3 right-3 px-2 py-1 rounded-md text-xs font-medium text-white bg-black/50 backdrop-blur-sm">
                                1:15
                            </div>

                            <div class="absolute top-3 left-3 flex items-center gap-1 px-2 py-1 rounded-md text-xs font-medium text-white bg-black/50 backdrop-blur-sm">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                                6.4K
                            </div>

                            <button onclick="togglePlayPause(4)" id="big-play-btn-4" class="absolute inset-0 w-full h-full flex items-center justify-center transition-opacity">
                                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center transition-transform hover:scale-110" style="background-color: rgba(0, 89, 145, 0.9);">
                                    <svg id="center-play-4" class="w-7 h-7 sm:w-8 sm:h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    <svg id="center-pause-4" class="w-7 h-7 sm:w-8 sm:h-8 text-white hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                                </div>
                            </button>
                            
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <div class="w-full h-1 bg-white/30 rounded-full mb-3 overflow-hidden">
                                    <div id="progress-4" class="h-full rounded-full transition-all duration-100" style="width: 0%; background-color: #99C723;"></div>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <button onclick="togglePlayPause(4); event.stopPropagation();" class="p-2 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all">
                                            <svg id="play-icon-4" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                            <svg id="pause-icon-4" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                                        </button>
                                        <button onclick="toggleMute(4); event.stopPropagation();" class="p-2 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all">
                                            <svg id="mute-icon-4" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/></svg>
                                            <svg id="unmute-icon-4" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/></svg>
                                        </button>
                                    </div>
                                    <button onclick="openFullscreen(4); event.stopPropagation();" class="p-2 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-1" style="color: #052734;">Manaslu Circuit</h3>
                            <div class="flex items-center justify-between">
                                <p class="text-sm" style="color: #6D6E70;">Gorkha District</p>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" style="color: #C9302C;" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                                    <span class="text-sm font-medium" style="color: #6D6E70;">1.2K</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video 5 -->
                    <div class="video-card flex-shrink-0 w-[85%] sm:w-[calc(50%-10px)] lg:w-[calc(33.333%-16px)] relative bg-gray-50 rounded-2xl overflow-hidden group border-2 border-transparent hover:border-[#005991] transition-all duration-300 shadow-sm hover:shadow-xl">
                        <div class="relative aspect-[9/16] sm:aspect-[9/14] bg-gray-900">
                            <video 
                                id="video-5"
                                class="w-full h-full object-cover"
                                muted
                                loop
                                playsinline
                                preload="metadata"
                            >
                                <source src="{{ asset('user-assets/videosReels/q.mp4') }}" type="video/mp4">
                            </video>
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            
                            <div class="absolute top-3 right-3 px-2 py-1 rounded-md text-xs font-medium text-white bg-black/50 backdrop-blur-sm">
                                0:52
                            </div>

                            <div class="absolute top-3 left-3 flex items-center gap-1 px-2 py-1 rounded-md text-xs font-medium text-white bg-black/50 backdrop-blur-sm">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                                9.8K
                            </div>

                            <button onclick="togglePlayPause(5)" id="big-play-btn-5" class="absolute inset-0 w-full h-full flex items-center justify-center transition-opacity">
                                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center transition-transform hover:scale-110" style="background-color: rgba(0, 89, 145, 0.9);">
                                    <svg id="center-play-5" class="w-7 h-7 sm:w-8 sm:h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    <svg id="center-pause-5" class="w-7 h-7 sm:w-8 sm:h-8 text-white hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                                </div>
                            </button>
                            
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <div class="w-full h-1 bg-white/30 rounded-full mb-3 overflow-hidden">
                                    <div id="progress-5" class="h-full rounded-full transition-all duration-100" style="width: 0%; background-color: #99C723;"></div>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <button onclick="togglePlayPause(5); event.stopPropagation();" class="p-2 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all">
                                            <svg id="play-icon-5" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                            <svg id="pause-icon-5" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                                        </button>
                                        <button onclick="toggleMute(5); event.stopPropagation();" class="p-2 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all">
                                            <svg id="mute-icon-5" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/></svg>
                                            <svg id="unmute-icon-5" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/></svg>
                                        </button>
                                    </div>
                                    <button onclick="openFullscreen(5); event.stopPropagation();" class="p-2 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-1" style="color: #052734;">Upper Mustang Expedition</h3>
                            <div class="flex items-center justify-between">
                                <p class="text-sm" style="color: #6D6E70;">Lo Manthang</p>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" style="color: #C9302C;" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                                    <span class="text-sm font-medium" style="color: #6D6E70;">2.7K</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination Dots -->
            <div class="flex justify-center gap-2 mt-6" id="carousel-dots">
                <button onclick="goToSlide(0)" class="w-3 h-3 rounded-full transition-all duration-300" style="background-color: #005991;"></button>
                <button onclick="goToSlide(1)" class="w-3 h-3 rounded-full transition-all duration-300 bg-gray-300 hover:bg-gray-400"></button>
                <button onclick="goToSlide(2)" class="w-3 h-3 rounded-full transition-all duration-300 bg-gray-300 hover:bg-gray-400"></button>
            </div>
        </div>

        <!-- View More Button -->
        <div class="text-center mt-10">
            <a 
                href=""
                class="inline-flex items-center justify-center gap-2 px-8 py-3.5 text-white font-medium rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg group"
                style="background-color: #005991;"
            >
                View All Videos
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>
    </div>

    <script>
        // Carousel state
        let currentSlide = 0;
        let autoSlideInterval;
        let isUserInteracting = false;
        const totalVideos = 5;

        // Video states
        const videoStates = {};
        for (let i = 1; i <= totalVideos; i++) {
            videoStates[i] = { playing: false, muted: true };
        }

        // Get cards per view based on screen width
        function getCardsPerView() {
            if (window.innerWidth >= 1024) return 3;
            if (window.innerWidth >= 640) return 2;
            return 1;
        }

        // Calculate max slides
        function getMaxSlides() {
            const cardsPerView = getCardsPerView();
            return Math.max(0, totalVideos - cardsPerView);
        }

        // Slide videos carousel
        function slideVideos(direction) {
            const track = document.getElementById('video-carousel-track');
            const maxSlides = getMaxSlides();
            
            if (direction === 'next') {
                currentSlide = currentSlide >= maxSlides ? 0 : currentSlide + 1;
            } else {
                currentSlide = currentSlide <= 0 ? maxSlides : currentSlide - 1;
            }
            
            updateCarousel();
            resetAutoSlide();
        }

        // Go to specific slide
        function goToSlide(slideIndex) {
            currentSlide = slideIndex;
            updateCarousel();
            resetAutoSlide();
        }

        // Update carousel position
        function updateCarousel() {
            const track = document.getElementById('video-carousel-track');
            const cards = track.querySelectorAll('.video-card');
            if (cards.length === 0) return;

            const cardWidth = cards[0].offsetWidth;
            const gap = window.innerWidth >= 1024 ? 24 : window.innerWidth >= 640 ? 20 : 16;
            const offset = currentSlide * (cardWidth + gap);
            
            track.style.transform = `translateX(-${offset}px)`;
            updateDots();
        }

        // Update pagination dots
        function updateDots() {
            const dots = document.querySelectorAll('#carousel-dots button');
            dots.forEach((dot, index) => {
                if (index === currentSlide) {
                    dot.style.backgroundColor = '#005991';
                    dot.style.width = '24px';
                } else {
                    dot.style.backgroundColor = '#d1d5db';
                    dot.style.width = '12px';
                }
            });
        }

        // Auto slide
        function startAutoSlide() {
            autoSlideInterval = setInterval(() => {
                if (!isUserInteracting) {
                    slideVideos('next');
                }
            }, 5000);
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        // Toggle play/pause
        function togglePlayPause(videoId) {
            const video = document.getElementById(`video-${videoId}`);
            const playIcon = document.getElementById(`play-icon-${videoId}`);
            const pauseIcon = document.getElementById(`pause-icon-${videoId}`);
            const centerPlay = document.getElementById(`center-play-${videoId}`);
            const centerPause = document.getElementById(`center-pause-${videoId}`);
            
            // Pause all other videos first
            for (let i = 1; i <= totalVideos; i++) {
                if (i !== videoId && videoStates[i].playing) {
                    const otherVideo = document.getElementById(`video-${i}`);
                    otherVideo.pause();
                    updateVideoUI(i, false);
                    videoStates[i].playing = false;
                }
            }
            
            if (videoStates[videoId].playing) {
                video.pause();
                updateVideoUI(videoId, false);
            } else {
                video.play().catch(err => console.log('Video play error:', err));
                updateVideoUI(videoId, true);
            }
            
            videoStates[videoId].playing = !videoStates[videoId].playing;
            isUserInteracting = videoStates[videoId].playing;
        }

        // Update video UI state
        function updateVideoUI(videoId, isPlaying) {
            const playIcon = document.getElementById(`play-icon-${videoId}`);
            const pauseIcon = document.getElementById(`pause-icon-${videoId}`);
            const centerPlay = document.getElementById(`center-play-${videoId}`);
            const centerPause = document.getElementById(`center-pause-${videoId}`);
            
            if (isPlaying) {
                playIcon?.classList.add('hidden');
                pauseIcon?.classList.remove('hidden');
                centerPlay?.classList.add('hidden');
                centerPause?.classList.remove('hidden');
            } else {
                playIcon?.classList.remove('hidden');
                pauseIcon?.classList.add('hidden');
                centerPlay?.classList.remove('hidden');
                centerPause?.classList.add('hidden');
            }
        }

        // Toggle mute
        function toggleMute(videoId) {
            const video = document.getElementById(`video-${videoId}`);
            const muteIcon = document.getElementById(`mute-icon-${videoId}`);
            const unmuteIcon = document.getElementById(`unmute-icon-${videoId}`);
            
            video.muted = !video.muted;
            videoStates[videoId].muted = video.muted;
            
            if (video.muted) {
                muteIcon?.classList.remove('hidden');
                unmuteIcon?.classList.add('hidden');
            } else {
                muteIcon?.classList.add('hidden');
                unmuteIcon?.classList.remove('hidden');
            }
        }

        // Open fullscreen
        function openFullscreen(videoId) {
            const video = document.getElementById(`video-${videoId}`);
            if (video.requestFullscreen) {
                video.requestFullscreen();
            } else if (video.webkitRequestFullscreen) {
                video.webkitRequestFullscreen();
            } else if (video.msRequestFullscreen) {
                video.msRequestFullscreen();
            }
        }

        // Update progress bar
        function updateProgress(videoId) {
            const video = document.getElementById(`video-${videoId}`);
            const progress = document.getElementById(`progress-${videoId}`);
            if (video && progress) {
                const percent = (video.currentTime / video.duration) * 100;
                progress.style.width = `${percent}%`;
            }
        }

        // Touch/drag support
        let startX = 0;
        let isDragging = false;

        document.addEventListener('DOMContentLoaded', function() {
            const track = document.getElementById('video-carousel-track');
            
            // Setup progress updates for all videos
            for (let i = 1; i <= totalVideos; i++) {
                const video = document.getElementById(`video-${i}`);
                if (video) {
                    video.addEventListener('timeupdate', () => updateProgress(i));
                }
            }

            // Touch events
            track.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
                isDragging = true;
                isUserInteracting = true;
            });

            track.addEventListener('touchend', (e) => {
                if (!isDragging) return;
                const endX = e.changedTouches[0].clientX;
                const diff = startX - endX;
                
                if (Math.abs(diff) > 50) {
                    slideVideos(diff > 0 ? 'next' : 'prev');
                }
                isDragging = false;
                setTimeout(() => { isUserInteracting = false; }, 1000);
            });

            // Mouse drag
            track.addEventListener('mousedown', (e) => {
                startX = e.clientX;
                isDragging = true;
                track.style.cursor = 'grabbing';
            });

            document.addEventListener('mouseup', (e) => {
                if (!isDragging) return;
                const diff = startX - e.clientX;
                
                if (Math.abs(diff) > 50) {
                    slideVideos(diff > 0 ? 'next' : 'prev');
                }
                isDragging = false;
                track.style.cursor = 'grab';
            });

            // Pause auto-slide on hover
            track.addEventListener('mouseenter', () => { isUserInteracting = true; });
            track.addEventListener('mouseleave', () => { 
                if (!Object.values(videoStates).some(v => v.playing)) {
                    isUserInteracting = false; 
                }
            });

            // Handle resize
            window.addEventListener('resize', () => {
                currentSlide = Math.min(currentSlide, getMaxSlides());
                updateCarousel();
            });

            // Initialize
            updateCarousel();
            startAutoSlide();
        });
    </script>
</section>
