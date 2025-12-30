{{-- resources/views/sections/home/videos.blade.php --}}
<section class="py-16 bg-white min-h-screen">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">
                Top Adventure Videos
            </h2>
            <p class="text-gray-600">
                Experience the Himalayas in action
            </p>
        </div>

        <!-- Videos Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12" id="videos-container">
            <!-- Video 1 -->
            <div class="video-card relative bg-gray-100 rounded-2xl overflow-hidden group border border-gray-200 hover:border-blue-300 transition-all duration-300">
                <div class="relative h-80 bg-gray-900">
                    <video 
                        id="video-1"
                        class="w-full h-full object-cover"
                        muted
                        loop
                        playsinline
                        preload="metadata"
                    >
                        <source src="{{ asset('user-assets/videosReels/m.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    
                    <!-- Controls Overlay -->
                    <div class="absolute bottom-4 left-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                        <!-- Controls -->
                        <div class="flex items-center gap-2">
                            <button 
                                onclick="togglePlayPause(1)"
                                class="video-control play-pause p-2 bg-black/50 rounded-full hover:bg-white/20 transition-all"
                            >
                                <svg id="play-icon-1" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                                <svg id="pause-icon-1" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                                </svg>
                            </button>

                            <button 
                                onclick="toggleMute(1)"
                                class="video-control mute-unmute p-2 bg-black/50 rounded-full hover:bg-white/20 transition-all"
                            >
                                <svg id="mute-icon-1" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
                                </svg>
                                <svg id="unmute-icon-1" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Big Play/Pause Button in Center -->
                    <button 
                        onclick="togglePlayPause(1)"
                        class="absolute inset-0 w-full h-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity"
                    >
                        <div class="bg-black/50 rounded-full p-3">
                            <svg id="big-play-icon-1" class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <svg id="big-pause-icon-1" class="w-6 h-6 text-white hidden" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                            </svg>
                        </div>
                    </button>
                </div>

                <!-- Video Info -->
                <div class="p-4">
                    <h3 class="text-gray-900 font-semibold text-lg mb-1">
                        Mountain Adventure
                    </h3>
                    <p class="text-gray-600 text-sm">
                        Himalayas
                    </p>
                </div>
            </div>

            <!-- Video 2 -->
            <div class="video-card relative bg-gray-100 rounded-2xl overflow-hidden group border border-gray-200 hover:border-blue-300 transition-all duration-300">
                <div class="relative h-80 bg-gray-900">
                    <video 
                        id="video-2"
                        class="w-full h-full object-cover"
                        muted
                        loop
                        playsinline
                        preload="metadata"
                    >
                        <source src="{{ asset('user-assets/videosReels/n.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    
                    <!-- Controls Overlay -->
                    <div class="absolute bottom-4 left-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                        <!-- Controls -->
                        <div class="flex items-center gap-2">
                            <button 
                                onclick="togglePlayPause(2)"
                                class="video-control play-pause p-2 bg-black/50 rounded-full hover:bg-white/20 transition-all"
                            >
                                <svg id="play-icon-2" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                                <svg id="pause-icon-2" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                                </svg>
                            </button>

                            <button 
                                onclick="toggleMute(2)"
                                class="video-control mute-unmute p-2 bg-black/50 rounded-full hover:bg-white/20 transition-all"
                            >
                                <svg id="mute-icon-2" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
                                </svg>
                                <svg id="unmute-icon-2" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Big Play/Pause Button in Center -->
                    <button 
                        onclick="togglePlayPause(2)"
                        class="absolute inset-0 w-full h-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity"
                    >
                        <div class="bg-black/50 rounded-full p-3">
                            <svg id="big-play-icon-2" class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <svg id="big-pause-icon-2" class="w-6 h-6 text-white hidden" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                            </svg>
                        </div>
                    </button>
                </div>

                <!-- Video Info -->
                <div class="p-4">
                    <h3 class="text-gray-900 font-semibold text-lg mb-1">
                        Forest Trail
                    </h3>
                    <p class="text-gray-600 text-sm">
                        Alpine Zone
                    </p>
                </div>
            </div>

            <!-- Video 3 -->
            <div class="video-card relative bg-gray-100 rounded-2xl overflow-hidden group border border-gray-200 hover:border-blue-300 transition-all duration-300">
                <div class="relative h-80 bg-gray-900">
                    <video 
                        id="video-3"
                        class="w-full h-full object-cover"
                        muted
                        loop
                        playsinline
                        preload="metadata"
                    >
                        <source src="{{ asset('user-assets/videosReels/o.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    
                    <!-- Controls Overlay -->
                    <div class="absolute bottom-4 left-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                        <!-- Controls -->
                        <div class="flex items-center gap-2">
                            <button 
                                onclick="togglePlayPause(3)"
                                class="video-control play-pause p-2 bg-black/50 rounded-full hover:bg-white/20 transition-all"
                            >
                                <svg id="play-icon-3" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                                <svg id="pause-icon-3" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                                </svg>
                            </button>

                            <button 
                                onclick="toggleMute(3)"
                                class="video-control mute-unmute p-2 bg-black/50 rounded-full hover:bg-white/20 transition-all"
                            >
                                <svg id="mute-icon-3" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
                                </svg>
                                <svg id="unmute-icon-3" class="w-4 h-4 text-white hidden" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Big Play/Pause Button in Center -->
                    <button 
                        onclick="togglePlayPause(3)"
                        class="absolute inset-0 w-full h-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity"
                    >
                        <div class="bg-black/50 rounded-full p-3">
                            <svg id="big-play-icon-3" class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <svg id="big-pause-icon-3" class="w-6 h-6 text-white hidden" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                            </svg>
                        </div>
                    </button>
                </div>

                <!-- Video Info -->
                <div class="p-4">
                    <h3 class="text-gray-900 font-semibold text-lg mb-1">
                        Winding Path
                    </h3>
                    <p class="text-gray-600 text-sm">
                        High Pass
                    </p>
                </div>
            </div>
        </div>

        <!-- View More Videos Button -->
        <div class="text-center">
            <a 
                href="" {{-- Update this route based on your setup --}}
                class="inline-flex items-center justify-center gap-2 px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg group"
            >
                View More Videos
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>
    </div>

    <script>
        // Video states
        const videoStates = {
            1: { playing: false, muted: true },
            2: { playing: false, muted: true },
            3: { playing: false, muted: true }
        };

        // Toggle play/pause
        function togglePlayPause(videoId) {
            const video = document.getElementById(`video-${videoId}`);
            const playIcon = document.getElementById(`play-icon-${videoId}`);
            const pauseIcon = document.getElementById(`pause-icon-${videoId}`);
            const bigPlayIcon = document.getElementById(`big-play-icon-${videoId}`);
            const bigPauseIcon = document.getElementById(`big-pause-icon-${videoId}`);
            
            if (videoStates[videoId].playing) {
                // Pause video
                video.pause();
                playIcon.classList.remove('hidden');
                pauseIcon.classList.add('hidden');
                bigPlayIcon.classList.remove('hidden');
                bigPauseIcon.classList.add('hidden');
            } else {
                // Play video
                video.play().catch(err => {
                    console.log('Video play error:', err);
                    // Auto-play may be blocked by browser, show play button
                    playIcon.classList.remove('hidden');
                    pauseIcon.classList.add('hidden');
                });
                playIcon.classList.add('hidden');
                pauseIcon.classList.remove('hidden');
                bigPlayIcon.classList.add('hidden');
                bigPauseIcon.classList.remove('hidden');
            }
            
            videoStates[videoId].playing = !videoStates[videoId].playing;
        }

        // Toggle mute/unmute
        function toggleMute(videoId) {
            const video = document.getElementById(`video-${videoId}`);
            const muteIcon = document.getElementById(`mute-icon-${videoId}`);
            const unmuteIcon = document.getElementById(`unmute-icon-${videoId}`);
            
            if (videoStates[videoId].muted) {
                // Unmute
                video.muted = false;
                muteIcon.classList.add('hidden');
                unmuteIcon.classList.remove('hidden');
            } else {
                // Mute
                video.muted = true;
                muteIcon.classList.remove('hidden');
                unmuteIcon.classList.add('hidden');
            }
            
            videoStates[videoId].muted = !videoStates[videoId].muted;
        }

        // Auto-pause other videos when one plays
        function setupVideoAutoPause() {
            const videos = document.querySelectorAll('video');
            
            videos.forEach(video => {
                video.addEventListener('play', function() {
                    // Get video ID from element ID
                    const currentVideoId = this.id.split('-')[1];
                    
                    // Pause all other videos
                    videos.forEach(otherVideo => {
                        if (otherVideo.id !== this.id) {
                            const otherVideoId = otherVideo.id.split('-')[1];
                            otherVideo.pause();
                            
                            // Update UI for paused videos
                            if (videoStates[otherVideoId]) {
                                videoStates[otherVideoId].playing = false;
                                const playIcon = document.getElementById(`play-icon-${otherVideoId}`);
                                const pauseIcon = document.getElementById(`pause-icon-${otherVideoId}`);
                                const bigPlayIcon = document.getElementById(`big-play-icon-${otherVideoId}`);
                                const bigPauseIcon = document.getElementById(`big-pause-icon-${otherVideoId}`);
                                
                                if (playIcon && pauseIcon && bigPlayIcon && bigPauseIcon) {
                                    playIcon.classList.remove('hidden');
                                    pauseIcon.classList.add('hidden');
                                    bigPlayIcon.classList.remove('hidden');
                                    bigPauseIcon.classList.add('hidden');
                                }
                            }
                        }
                    });
                });
            });
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            setupVideoAutoPause();
        });
    </script>
</section>