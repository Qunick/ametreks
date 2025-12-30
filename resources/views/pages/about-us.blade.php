{{-- resources/views/pages/about.blade.php --}}
@extends('layouts.app')

@section('title', 'About Us - AME Treks & Expeditions')

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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                Since 2010
            </div>
            <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-green-300">Story</span> & Vision
            </h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                From humble beginnings to becoming Nepal's most trusted adventure specialists, creating unforgettable Himalayan experiences for over a decade.
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

<!-- Our Story Section -->
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <!-- Left - Story Text -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">
                        Our <span class="text-blue-600">Journey</span> Begins
                    </h2>
                    <p class="text-lg text-gray-700 leading-relaxed mb-4">
                        Founded in 2010 by a group of passionate mountain guides and travel enthusiasts, AME Treks started with a simple vision: to share the breathtaking beauty of the Himalayas with the world while ensuring sustainable and responsible tourism.
                    </p>
                    <p class="text-lg text-gray-700 leading-relaxed mb-4">
                        What began as a small operation with just two guides has grown into Nepal's premier adventure company, with over <span class="font-semibold text-blue-600">5,000 successful expeditions</span> and a team of <span class="font-semibold text-blue-600">50+ certified professionals</span>.
                    </p>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Today, we operate across Nepal, Bhutan, and Tibet, offering more than 50 unique trekking routes that cater to adventurers of all skill levels.
                    </p>
                </div>

                <!-- Founder's Quote -->
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-2xl p-8 border border-blue-200">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <blockquote class="text-gray-700 italic">
                                "Our mission has always been simple: to create safe, memorable, and transformative Himalayan adventures that respect both nature and local cultures."
                            </blockquote>
                            <div class="mt-4">
                                <p class="font-semibold text-gray-900">Mr Dhruba Prasad Khanal</p>
                                <p class="text-sm text-gray-600">Founder & Managing Director</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right - Image Grid -->
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-4">
                    <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                        <div class="aspect-[3/4] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1524654458049-e36be0721fa2?w=400&auto=format&fit=crop&q=80" 
                                 alt="Our Early Days" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                            <span class="text-white text-sm">2010 - Our First Office</span>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                        <div class="aspect-[3/4] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1551632811-561732d1e306?w=400&auto=format&fit=crop&q=80" 
                                 alt="Team Training" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                            <span class="text-white text-sm">Guide Training Session</span>
                        </div>
                    </div>
                </div>
                <div class="space-y-4 mt-8">
                    <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                        <div class="aspect-[3/4] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w-400&auto=format&fit=crop&q=80" 
                                 alt="Group Expedition" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                            <span class="text-white text-sm">Group Expedition 2015</span>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                        <div class="aspect-[3/4] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?w=400&auto=format&fit=crop&q=80" 
                                 alt="Award Ceremony" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                            <span class="text-white text-sm">Best Adventure Company 2020</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values & Mission Section -->
<section class="py-16 lg:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                Our <span class="text-blue-600">Core Values</span> & Mission
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                These principles guide every decision we make and every adventure we create
            </p>
        </div>

        <!-- Values Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            <!-- Value 1 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-lg hover:shadow-xl hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Safety First</h3>
                <p class="text-gray-600">
                    Comprehensive safety protocols, certified guides, and emergency response systems ensure every adventure is as safe as it is exciting.
                </p>
            </div>

            <!-- Value 2 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-lg hover:shadow-xl hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Sustainable Tourism</h3>
                <p class="text-gray-600">
                    Leave No Trace principles, support for local communities, and eco-friendly practices protect the Himalayan environment.
                </p>
            </div>

            <!-- Value 3 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-lg hover:shadow-xl hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Local Expertise</h3>
                <p class="text-gray-600">
                    Our guides are local experts with deep knowledge of Himalayan terrain, culture, and hidden gems off the beaten path.
                </p>
            </div>

            <!-- Value 4 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-lg hover:shadow-xl hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Personalized Service</h3>
                <p class="text-gray-600">
                    Every trek is customized to match your fitness level, interests, and timeline for a truly personal adventure.
                </p>
            </div>
        </div>

        <!-- Mission Statement -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-3xl p-12 text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-32 translate-x-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full translate-y-24 -translate-x-24"></div>
            
            <div class="relative z-10 text-center max-w-4xl mx-auto">
                <h3 class="text-2xl lg:text-3xl font-bold mb-6">Our Mission</h3>
                <p class="text-xl text-blue-100 leading-relaxed">
                    To inspire and enable people to experience the transformative power of the Himalayas through safe, sustainable, and unforgettable adventures that respect local cultures and preserve natural beauty for generations to come.
                </p>
            </div>
        </div>
    </div>
</section>


<!-- Impact & Community -->
<section class="py-16 lg:py-24 bg-gradient-to-b from-blue-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                Our <span class="text-blue-600">Impact</span> & Community
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Beyond adventures, we're committed to making a positive difference in the communities we operate in
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Impact 1 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-lg text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-6.201a9 9 0 01-4.5 7.745" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Local Employment</h3>
                <p class="text-gray-600">
                    We've created sustainable livelihoods for over 200 local guides, porters, and hospitality staff across Himalayan communities.
                </p>
            </div>

            <!-- Impact 2 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-lg text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4 4 0 003 15z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Environmental Projects</h3>
                <p class="text-gray-600">
                    We plant 10 trees for every trekker and have removed over 5 tons of waste from Himalayan trails since 2015.
                </p>
            </div>

            <!-- Impact 3 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-lg text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Community Support</h3>
                <p class="text-gray-600">
                    We support local schools and healthcare facilities in remote mountain villages along our trekking routes.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="py-16 lg:py-20 bg-gradient-to-r from-blue-900 via-blue-800 to-blue-900">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
            Ready to Write Your Own Story?
        </h2>
        <p class="text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
            Join thousands of adventurers who've discovered the magic of the Himalayas with AME Treks.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" 
               class="group flex items-center justify-center gap-3 bg-white text-blue-600 hover:bg-blue-50 font-semibold py-4 px-10 rounded-xl transition-all duration-300 hover:scale-105 shadow-lg">
                <span class="text-lg">Contact Our Team</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
            <a href="{{ route('treks.index') }}" 
               class="group flex items-center justify-center gap-3 border-2 border-white text-white hover:bg-white/10 font-semibold py-4 px-10 rounded-xl transition-all duration-300 hover:scale-105">
                <span class="text-lg">Explore Treks</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection