{{-- resources/views/pages/teams.blade.php --}}
@extends('layouts.app')

@section('title', 'Our Expert Team - AME Treks & Expeditions')

@section('content')
<!-- Hero Section -->
<section class="relative py-20 lg:py-28 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white text-sm font-medium mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Our Professional Team
            </div>
            <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                Meet Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-green-300">Expert Guides</span>
            </h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Led by certified professionals with decades of combined experience in the Himalayas. Our team ensures your adventure is safe, memorable, and truly transformative.
            </p>
        </div>
    </div>
    
    <!-- Mountain Silhouette -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg class="w-full h-16 lg:h-24" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="white"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="white"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="white"></path>
        </svg>
    </div>
</section>

<!-- Leadership Team -->
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                Meet Our <span class="text-blue-600">Leadership Team</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                The experienced leaders who set the standard for safety, excellence, and unforgettable adventures in the Himalayas.
            </p>
        </div>

        <!-- Leadership Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
            <!-- Founder -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100">
                <!-- Profile Image -->
                <div class="relative h-80 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80" 
                         alt="Dhruba Prasad Khanal - Founder & Managing Director"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    <!-- Experience Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1.5 bg-blue-600 text-white text-xs font-bold rounded-full">
                            25+ Years
                        </span>
                    </div>
                </div>

                <!-- Profile Content -->
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Dhruba Prasad Khanal</h3>
                    <p class="text-blue-600 font-semibold mb-4">Founder & Managing Director</p>
                    
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-sm text-gray-600">Certified UIAA Mountain Guide</span>
                    </div>

                    <p class="text-gray-600 mb-6">
                        With over 25 years of mountaineering experience, Dhruba has led more than 200 expeditions in the Himalayas. His passion for sustainable tourism and local community development drives AME Treks' vision.
                    </p>

                    <!-- Specialties -->
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">Everest Expeditions</span>
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Sustainable Tourism</span>
                        <span class="px-3 py-1 bg-purple-100 text-purple-700 text-xs font-medium rounded-full">Team Leadership</span>
                    </div>
                </div>
            </div>

            <!-- Operations Manager -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100">
                <!-- Profile Image -->
                <div class="relative h-80 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=800&auto=format&fit=crop&q=80" 
                         alt="Maya Sharma - Operations Director"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    <!-- Experience Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1.5 bg-green-600 text-white text-xs font-bold rounded-full">
                            15+ Years
                        </span>
                    </div>
                </div>

                <!-- Profile Content -->
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Maya Sharma</h3>
                    <p class="text-blue-600 font-semibold mb-4">Operations Director</p>
                    
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-sm text-gray-600">Wilderness First Responder</span>
                    </div>

                    <p class="text-gray-600 mb-6">
                        Maya ensures every logistical detail is perfect. With 15+ years in adventure tourism operations, she coordinates teams, permits, and accommodations for seamless Himalayan experiences.
                    </p>

                    <!-- Specialties -->
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">Logistics</span>
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Safety Management</span>
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-medium rounded-full">Client Relations</span>
                    </div>
                </div>
            </div>

            <!-- Head Guide -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100">
                <!-- Profile Image -->
                <div class="relative h-80 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=800&auto=format&fit=crop&q=80" 
                         alt="Raj Thapa - Head Expedition Guide"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    <!-- Experience Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1.5 bg-red-600 text-white text-xs font-bold rounded-full">
                            20+ Years
                        </span>
                    </div>
                </div>

                <!-- Profile Content -->
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Raj Thapa</h3>
                    <p class="text-blue-600 font-semibold mb-4">Head Expedition Guide</p>
                    
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-sm text-gray-600">IFMGA Certified Guide</span>
                    </div>

                    <p class="text-gray-600 mb-6">
                        A veteran of over 100 high-altitude expeditions, Raj has summited Everest 5 times. His expertise in altitude acclimatization and mountain safety is unparalleled in the industry.
                    </p>

                    <!-- Specialties -->
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">High Altitude</span>
                        <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-medium rounded-full">Rescue Operations</span>
                        <span class="px-3 py-1 bg-purple-100 text-purple-700 text-xs font-medium rounded-full">Training</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Senior Guides -->
<section class="py-16 lg:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                Senior <span class="text-blue-600">Expedition Guides</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Our experienced senior guides with 10+ years of Himalayan expertise, ready to lead your adventure.
            </p>
        </div>

        <!-- Senior Guides Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
            <!-- Guide 1 -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=400&auto=format&fit=crop&q=80" 
                         alt="Karma Sherpa - Senior Guide"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-1">Karma Sherpa</h3>
                    <p class="text-blue-600 text-sm font-medium mb-3">Senior Everest Guide</p>
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-xs text-gray-600">12 Years Experience</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">
                        Born in Khumbu region, specializes in Everest and high-altitude treks.
                    </p>
                    <div class="text-xs text-gray-500">
                        <span class="font-medium">Languages:</span> English, Nepali, Sherpa
                    </div>
                </div>
            </div>

            <!-- Guide 2 -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?w=400&auto=format&fit=crop&q=80" 
                         alt="Santosh Rai - Senior Guide"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-1">Santosh Rai</h3>
                    <p class="text-blue-600 text-sm font-medium mb-3">Annapurna Specialist</p>
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-xs text-gray-600">15 Years Experience</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">
                        Expert in Annapurna circuit with deep knowledge of local flora and fauna.
                    </p>
                    <div class="text-xs text-gray-500">
                        <span class="font-medium">Languages:</span> English, Nepali, Hindi
                    </div>
                </div>
            </div>

            <!-- Guide 3 -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1564564321837-a57b7070ac4f?w=400&auto=format&fit=crop&q=80" 
                         alt="Pemba Tamang - Senior Guide"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-1">Pemba Tamang</h3>
                    <p class="text-blue-600 text-sm font-medium mb-3">Langtang & Culture Expert</p>
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-xs text-gray-600">10 Years Experience</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">
                        Specializes in cultural treks and off-the-beaten-path adventures in Langtang.
                    </p>
                    <div class="text-xs text-gray-500">
                        <span class="font-medium">Languages:</span> English, Nepali, Tamang, Tibetan
                    </div>
                </div>
            </div>

            <!-- Guide 4 -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200">
                <div class="relative h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&auto=format&fit=crop&q=80" 
                         alt="David Miller - International Guide"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-1">David Miller</h3>
                    <p class="text-blue-600 text-sm font-medium mb-3">Photography & Adventure Guide</p>
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-xs text-gray-600">8 Years Experience</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">
                        Combines trekking with photography workshops for unique visual storytelling adventures.
                    </p>
                    <div class="text-xs text-gray-500">
                        <span class="font-medium">Languages:</span> English, German, French
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Stats & Certifications -->
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
            <!-- Team Stats -->
            <div class="space-y-8">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
                    Team <span class="text-blue-600">Excellence</span> in Numbers
                </h2>
                
                <!-- Stats Grid -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 text-center">
                        <div class="text-4xl font-bold text-blue-600 mb-2">50+</div>
                        <div class="text-lg font-semibold text-gray-900">Certified Guides</div>
                        <div class="text-sm text-gray-600 mt-2">UIAA, IFMGA, Wilderness First Responder</div>
                    </div>
                    
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 text-center">
                        <div class="text-4xl font-bold text-green-600 mb-2">15+</div>
                        <div class="text-lg font-semibold text-gray-900">Avg. Years Experience</div>
                        <div class="text-sm text-gray-600 mt-2">Per team member</div>
                    </div>
                    
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8 text-center">
                        <div class="text-4xl font-bold text-purple-600 mb-2">12</div>
                        <div class="text-lg font-semibold text-gray-900">Languages Spoken</div>
                        <div class="text-sm text-gray-600 mt-2">Including local dialects</div>
                    </div>
                    
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8 text-center">
                        <div class="text-4xl font-bold text-orange-600 mb-2">100%</div>
                        <div class="text-lg font-semibold text-gray-900">Safety Record</div>
                        <div class="text-sm text-gray-600 mt-2">Zero major incidents since 2010</div>
                    </div>
                </div>
                
                <!-- Training Info -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Continuous Training</h3>
                    <p class="text-gray-600 mb-4">
                        Our team undergoes annual training in mountain rescue, first aid, weather forecasting, and sustainable tourism practices to ensure we maintain the highest safety and service standards.
                    </p>
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Annual Wilderness First Aid Recertification</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-500 mt-2">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Advanced Mountain Rescue Training</span>
                    </div>
                </div>
            </div>

            <!-- Certifications -->
            <div class="space-y-8">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
                    Our <span class="text-blue-600">Certifications</span>
                </h2>
                
                <!-- Certification Cards -->
                <div class="space-y-6">
                    <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">UIAA Certified</h3>
                                <p class="text-gray-600">International Mountaineering and Climbing Federation</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">TAAN Member</h3>
                                <p class="text-gray-600">Trekking Agencies' Association of Nepal</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Wilderness First Responder</h3>
                                <p class="text-gray-600">All senior guides certified in wilderness medicine</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Sustainable Tourism Certified</h3>
                                <p class="text-gray-600">Committed to eco-friendly and responsible tourism</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Support Team -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-blue-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                Behind-the-Scenes <span class="text-blue-600">Support Team</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Our dedicated support staff work tirelessly to ensure every aspect of your adventure runs smoothly, from logistics to hospitality.
            </p>
        </div>

        <!-- Support Team Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Logistics -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-lg">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Logistics & Planning</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Permits and documentation</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Transport coordination</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Equipment management</span>
                    </li>
                </ul>
            </div>

            <!-- Kitchen Staff -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-lg">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Kitchen & Hospitality</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Nutritious meal preparation</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Hygiene and sanitation</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Camp setup and maintenance</span>
                    </li>
                </ul>
            </div>

            <!-- Porters -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-lg">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Porter Team</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Experienced local porters</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Fair wages and proper equipment</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Weight limits strictly followed</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="py-16 lg:py-20 bg-gradient-to-r from-blue-900 via-blue-800 to-blue-900">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
            Ready to Meet Your Guide?
        </h2>
        <p class="text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
            Contact us to discuss your adventure and meet the expert who will lead your journey.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" 
               class="group flex items-center justify-center gap-3 bg-white text-blue-600 hover:bg-blue-50 font-semibold py-4 px-10 rounded-xl transition-all duration-300 hover:scale-105 shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span class="text-lg">Contact Our Team</span>
            </a>
            <a href="{{ route('treks.index') }}" 
               class="group flex items-center justify-center gap-3 border-2 border-white text-white hover:bg-white/10 font-semibold py-4 px-10 rounded-xl transition-all duration-300 hover:scale-105">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                </svg>
                <span class="text-lg">Browse Treks</span>
            </a>
        </div>
    </div>
</section>
@endsection