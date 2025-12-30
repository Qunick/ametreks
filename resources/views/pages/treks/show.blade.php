@extends('layouts.app')

@section('title', 'Everest Base Camp Trek | Ame Treks')

@section('content')
<!-- Hero Section with Parallax Effect -->
<section class="relative h-[90vh] overflow-hidden">
    <div class="absolute inset-0 hero-parallax">
    <img src="https://images.unsplash.com/photo-1551632811-561732d1e306"
         alt="Everest Base Camp"
         class="w-full h-full object-cover scale-110">

    <!-- Blue overlay WITH opacity -->
    <div class="absolute inset-0 bg-[#005991]/50"></div>

    <!-- Gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-[#052734] via-[#005991]/60 to-transparent"></div>
</div>

    
    <div class="absolute bottom-0 left-0 right-0 pb-20 px-4 z-10">
        <div class="container mx-auto max-w-6xl">
            <!-- Breadcrumb -->
            <nav class="text-white/80 text-sm mb-6 flex items-center space-x-2 overflow-x-auto">
                <a href="/" class="hover:text-white transition-colors whitespace-nowrap">Home</a>
                <i class="bi bi-chevron-right text-xs"></i>
                <a href="/treks" class="hover:text-white transition-colors whitespace-nowrap">Treks</a>
                <i class="bi bi-chevron-right text-xs"></i>
                <span class="text-white whitespace-nowrap">Everest Base Camp</span>
            </nav>
            
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-4 md:mb-6 leading-tight animate-fade-in">
                Everest Base Camp Trek
            </h1>
            
            <p class="text-lg sm:text-xl md:text-2xl text-gray-200 max-w-3xl mb-6 md:mb-8 animate-fade-in-delay">
                Journey to the base of the world's highest peak through Sherpa villages and stunning Himalayan landscapes
            </p>
            
            <!-- Rating and Reviews -->
            <div class="flex flex-wrap items-center gap-4 md:gap-6 mb-6 md:mb-8 animate-fade-in-delay-2">
                <div class="flex items-center bg-white/20 backdrop-blur-md px-3 py-1.5 md:px-4 md:py-2 rounded-full">
                    <div class="flex items-center text-yellow-400 mr-2">
                        <i class="bi bi-star-fill text-sm md:text-base"></i>
                        <i class="bi bi-star-fill text-sm md:text-base"></i>
                        <i class="bi bi-star-fill text-sm md:text-base"></i>
                        <i class="bi bi-star-fill text-sm md:text-base"></i>
                        <i class="bi bi-star-half text-sm md:text-base"></i>
                    </div>
                    <span class="text-white font-semibold text-sm md:text-base">4.9</span>
                    <span class="text-white/80 ml-1 md:ml-2 text-sm">(2,847)</span>
                </div>
                
                <div class="flex items-center text-white text-sm md:text-base">
                    <i class="bi bi-people-fill mr-1 md:mr-2"></i>
                    <span>12,000+ trekkers completed</span>
                </div>
            </div>
            
            <div class="flex flex-wrap gap-3 md:gap-4 animate-fade-in-delay-3">
                <button onclick="openBookingModal()" class="bg-[#005991] hover:bg-[#052734] text-white px-6 py-3 md:px-8 md:py-4 rounded-xl font-semibold transition-all hover:shadow-2xl flex items-center group hover:scale-105 transform text-sm md:text-base">
                    <i class="bi bi-calendar-plus mr-2 text-lg md:text-xl group-hover:scale-110 transition-transform"></i>
                    Book Now
                </button>
                <button onclick="openVideoModal()" class="bg-white/20 backdrop-blur-md hover:bg-white/30 text-white px-6 py-3 md:px-8 md:py-4 rounded-xl font-semibold transition-all border-2 border-white/40 hover:shadow-2xl flex items-center group hover:scale-105 transform text-sm md:text-base">
                    <i class="bi bi-play-circle-fill mr-2 text-lg md:text-xl group-hover:scale-110 transition-transform"></i>
                    Watch Trek Video
                </button>
                <button onclick="shareContent()" class="bg-white/10 backdrop-blur-md hover:bg-white/20 text-white p-3 md:p-4 rounded-xl transition-all border-2 border-white/30 hover:shadow-xl flex items-center hover:scale-105 transform">
                    <i class="bi bi-share text-lg md:text-xl"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Navigation Bar for Sections -->
<div class="sticky top-0 z-30 bg-white shadow-md">
    <div class="container mx-auto max-w-7xl">
        <nav class="flex overflow-x-auto py-3 md:py-4 px-4 scrollbar-hide">
            <a href="#overview" class="nav-link text-gray-600 hover:text-[#005991] px-3 md:px-4 py-1 md:py-2 font-medium whitespace-nowrap text-sm md:text-base">
                Overview
            </a>
            <a href="#itinerary" class="nav-link text-gray-600 hover:text-[#005991] px-3 md:px-4 py-1 md:py-2 font-medium whitespace-nowrap text-sm md:text-base">
                Itinerary
            </a>
            <a href="#departures" class="nav-link text-gray-600 hover:text-[#005991] px-3 md:px-4 py-1 md:py-2 font-medium whitespace-nowrap text-sm md:text-base">
                Departure Dates
            </a>
            <a href="#faqs" class="nav-link text-gray-600 hover:text-[#005991] px-3 md:px-4 py-1 md:py-2 font-medium whitespace-nowrap text-sm md:text-base">
                FAQs
            </a>
            <a href="#reviews" class="nav-link text-gray-600 hover:text-[#005991] px-3 md:px-4 py-1 md:py-2 font-medium whitespace-nowrap text-sm md:text-base">
                Reviews
            </a>
        </nav>
    </div>
</div>

<!-- Main Content -->
<div class="container mx-auto max-w-7xl px-3 sm:px-4 py-8 md:py-12 lg:py-16">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-12 md:space-y-16">
            <!-- Quick Info Cards -->
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 md:gap-4">
                @foreach([
                    ['icon' => 'calendar3', 'label' => 'Best Months', 'value' => 'Mar-May, Sep-Nov'],
                    // ['icon' => 'people', 'label' => 'Group Size', 'value' => '2-12 People'],
                    ['icon' => 'house-heart', 'label' => 'Accommodation', 'value' => 'Tea Houses'],
                    ['icon' => 'cup-hot', 'label' => 'Meals', 'value' => 'Full Board'],
                    ['icon' => 'clock-fill', 'label' => 'Duration', 'value' => '14 Days'],
                    ['icon' => 'triangle-fill', 'label' => 'Max Altitude', 'value' => '5,545m']
                ] as $info)
                <div class="bg-white rounded-xl p-3 md:p-4 border border-gray-200 hover:border-[#005991] hover:shadow-lg transition-all">
                    <i class="bi bi-{{ $info['icon'] }} text-[#005991] text-xl md:text-2xl mb-1 md:mb-2"></i>
                    <div class="text-xs md:text-sm text-gray-600 uppercase tracking-wide mb-0.5 md:mb-1">{{ $info['label'] }}</div>
                    <div class="font-bold text-gray-900 text-sm md:text-base">{{ $info['value'] }}</div>
                </div>
                @endforeach
            </div>

            <!-- Overview Section -->
            <section class="scroll-reveal" id="overview">
                <div class="flex items-center mb-6 md:mb-8">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-[#005991] flex items-center justify-center mr-3 md:mr-4 shadow-xl">
                        <i class="bi bi-compass text-white text-2xl md:text-3xl"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Trek Overview</h2>
                        <p class="text-gray-600 text-sm md:text-base">Your complete adventure guide</p>
                    </div>
                </div>
                
                <div class="space-y-4 md:space-y-6">
                    <div class="prose max-w-none">
                        <p class="text-base md:text-lg text-gray-700 leading-relaxed">
                            The <strong>Everest Base Camp Trek</strong> is a legendary Himalayan adventure that takes you to the foot of the world's highest mountain, <strong>Mount Everest (8,848m)</strong>. This iconic journey offers an unparalleled opportunity to experience authentic Sherpa culture, visit ancient Buddhist monasteries, and witness some of the most breathtaking mountain scenery on Earth.
                        </p>
                        <p class="text-base md:text-lg text-gray-700 leading-relaxed">
                            Walking through the heart of the Khumbu region, you'll traverse suspension bridges over roaring rivers, pass through colorful prayer flag-adorned villages, and gradually ascend to the base of the world's highest peak. The trek combines physical challenge with spiritual discovery, cultural immersion with natural wonder.
                        </p>
                    </div>
                    
                    <!-- Simple Highlights Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4 mt-6 md:mt-8">
                        @foreach([
                            ['title' => 'Kala Patthar Summit', 'desc' => 'Watch sunrise from 5,545m - trek\'s highest point'],
                            ['title' => 'Everest Base Camp', 'desc' => 'Stand at 5,364m where climbers begin expeditions'],
                            ['title' => 'Tengboche Monastery', 'desc' => 'Spiritual heart of Khumbu with Ama Dablam views'],
                            ['title' => 'Sherpa Culture', 'desc' => 'Experience authentic hospitality in mountain villages']
                        ] as $highlight)
                        <div class="bg-white rounded-xl p-4 md:p-5 border-2 border-gray-100 hover:border-[#005991] hover:shadow-lg transition-all">
                            <h4 class="font-bold text-gray-900 text-base md:text-lg mb-1 md:mb-2">{{ $highlight['title'] }}</h4>
                            <p class="text-gray-600 text-xs md:text-sm">{{ $highlight['desc'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Detailed Itinerary -->
            <section class="scroll-reveal" id="itinerary">
                <div class="flex items-center mb-6 md:mb-8">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-[#005991] flex items-center justify-center mr-3 md:mr-4 shadow-xl">
                        <i class="bi bi-map text-white text-2xl md:text-3xl"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Complete Itinerary</h2>
                        <p class="text-gray-600 text-sm md:text-base">Day-by-day journey breakdown</p>
                    </div>
                </div>
                
                <div class="space-y-3 md:space-y-4">
                    @foreach([
                        [
                            'day' => 1, 
                            'title' => 'Arrival in Kathmandu', 
                            'altitude' => '1,400m', 
                            'duration' => 'Arrival day', 
                            'distance' => '-',
                            'overnight' => 'Kathmandu',
                            'meal' => 'Welcome Dinner',
                            'desc' => 'Welcome to Nepal! Our representative meets you at Tribhuvan International Airport and transfers you to your hotel in Thamel. Evening trek briefing with your experienced guide, gear check, and final preparations. Explore the vibrant streets of Thamel or relax at your hotel.', 
                            'activities' => ['Airport pickup', 'Hotel check-in', 'Trek briefing', 'Gear check'], 
                            'tip' => 'Arrive at least one day early to recover from jet lag and complete last-minute shopping in Thamel', 
                            'highlights' => ['Meet your guide', 'Final preparations', 'Explore Kathmandu']
                        ],
                        [
                            'day' => 2, 
                            'title' => 'Fly to Lukla, Trek to Phakding', 
                            'altitude' => '2,610m', 
                            'duration' => '3-4 hours', 
                            'distance' => '8km',
                            'overnight' => 'Phakding',
                            'meal' => 'Breakfast, Lunch, Dinner',
                            'desc' => 'Early morning scenic flight to Lukla (35 minutes) - one of the world\'s most thrilling flights. Meet porters and crew, begin trekking alongside the Dudh Koshi River through pine forests. Pass through several small villages before reaching Phakding.', 
                            'activities' => ['Scenic mountain flight', 'Meet trekking crew', 'River trail walking', 'Village exploration'], 
                            'highlights' => ['Thrilling Lukla flight', 'First day trekking', 'Dudh Koshi River']
                        ],
                        [
                            'day' => 3, 
                            'title' => 'Phakding to Namche Bazaar', 
                            'altitude' => '3,440m', 
                            'duration' => '5-6 hours', 
                            'distance' => '11km',
                            'overnight' => 'Namche Bazaar',
                            'meal' => 'Breakfast, Lunch, Dinner',
                            'desc' => 'Cross multiple suspension bridges including the famous Hillary Suspension Bridge. Enter Sagarmatha National Park (permit check). Steep 2-hour ascent to Namche Bazaar. First glimpse of Everest (weather permitting) from the trail. Arrive at the bustling Sherpa capital.', 
                            'activities' => ['Suspension bridge crossings', 'National Park entry', 'Steep ascent', 'First Everest view'], 
                            'tip' => 'Take it slow on the final ascent - proper pacing helps acclimatization', 
                            'highlights' => ['Hillary Bridge', 'Enter Sagarmatha NP', 'First Everest glimpse']
                        ],
                        [
                            'day' => 4, 
                            'title' => 'Acclimatization in Namche', 
                            'altitude' => '3,440m', 
                            'duration' => '4-5 hours', 
                            'distance' => '5km',
                            'overnight' => 'Namche Bazaar',
                            'meal' => 'Breakfast, Lunch, Dinner',
                            'desc' => 'Essential acclimatization day. Morning hike to Everest View Hotel (3,880m) for spectacular panoramic views of Everest, Lhotse, Ama Dablam, and Thamserku. Visit Sherpa Museum and learn about Everest expeditions. Explore Namche\'s markets, bakeries, and shops. Optional visit to Khumjung village and Hillary School.', 
                            'activities' => ['Everest View Hotel hike', 'Museum visit', 'Market exploration', 'Village tour'], 
                            'tip' => 'Climb high, sleep low - this hike prepares your body for higher altitudes', 
                            'highlights' => ['Everest panorama', 'Sherpa culture', 'Local market']
                        ],
                        [
                            'day' => 5, 
                            'title' => 'Namche to Tengboche', 
                            'altitude' => '3,860m', 
                            'duration' => '5-6 hours', 
                            'distance' => '10km',
                            'overnight' => 'Tengboche',
                            'meal' => 'Breakfast, Lunch, Dinner',
                            'desc' => 'Contour trail with stunning mountain views. Descend to Dudh Koshi River, then climb through rhododendron and magnolia forests. Reach Tengboche Monastery - the spiritual center of Khumbu region. Spectacular close-up views of Ama Dablam. Attend evening prayer ceremony (puja).', 
                            'activities' => ['Forest trekking', 'Monastery visit', 'Prayer ceremony', 'Mountain photography'], 
                            'highlights' => ['Tengboche Monastery', 'Ama Dablam views', 'Buddhist ceremony']
                        ]
                    ] as $day)
                    <div class="itinerary-item bg-white rounded-xl md:rounded-2xl border-2 border-gray-200 overflow-hidden hover:border-[#005991] hover:shadow-xl transition-all">
                        <button onclick="toggleItinerary({{ $day['day'] }})" class="w-full p-4 md:p-6 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                            <div class="flex items-center flex-1">
                                <div class="w-12 h-12 md:w-16 md:h-16 rounded-xl bg-[#005991] flex items-center justify-center mr-3 md:mr-5 shadow-lg flex-shrink-0">
                                    <span class="text-xl md:text-2xl font-bold text-white">{{ $day['day'] }}</span>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-0.5 md:mb-1">Day {{ $day['day'] }}: {{ $day['title'] }}</h3>
                                    <div class="flex flex-wrap gap-2 md:gap-4 text-xs md:text-sm text-gray-600">
                                        <span class="flex items-center"><i class="bi bi-altitude mr-1 text-[#005991]"></i> {{ $day['altitude'] }}</span>
                                        <span class="flex items-center"><i class="bi bi-clock mr-1 text-[#99C723]"></i> {{ $day['duration'] }}</span>
                                        <span class="flex items-center"><i class="bi bi-map mr-1 text-[#4D8BB2]"></i> {{ $day['distance'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <i class="bi bi-chevron-down text-xl md:text-2xl text-gray-400 transition-transform duration-300" id="chevron-{{ $day['day'] }}"></i>
                        </button>
                        
                        <div class="itinerary-content hidden px-4 md:px-6 pb-4 md:pb-6" id="content-{{ $day['day'] }}">
                            <div class="pl-0 md:pl-20 md:border-l-4 md:border-[#005991]/30 md:ml-8">
                                <!-- Overnight and Meal Info -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4 mb-4 md:mb-6">
                                    <div class="bg-[#005991]/5 rounded-xl p-3 md:p-4">
                                        <div class="flex items-center mb-1 md:mb-2">
                                            <i class="bi bi-moon-stars text-[#005991] mr-2"></i>
                                            <h4 class="font-bold text-gray-900 text-sm md:text-base">Overnight</h4>
                                        </div>
                                        <p class="text-gray-700 text-sm md:text-base">{{ $day['overnight'] }}</p>
                                    </div>
                                    <div class="bg-[#99C723]/5 rounded-xl p-3 md:p-4">
                                        <div class="flex items-center mb-1 md:mb-2">
                                            <i class="bi bi-egg-fried text-[#99C723] mr-2"></i>
                                            <h4 class="font-bold text-gray-900 text-sm md:text-base">Meal</h4>
                                        </div>
                                        <p class="text-gray-700 text-sm md:text-base">{{ $day['meal'] }}</p>
                                    </div>
                                </div>
                                
                                <!-- Two Small Images -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4 mb-4 md:mb-6">
                                    <img src="https://images.unsplash.com/photo-1551632811-561732d1e306?w=400&h=200&fit=crop" alt="Day {{ $day['day'] }} image 1" class="w-full h-40 md:h-48 object-cover rounded-xl">
                                    <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?w=400&h=200&fit=crop" alt="Day {{ $day['day'] }} image 2" class="w-full h-40 md:h-48 object-cover rounded-xl">
                                </div>
                                
                                <!-- Description -->
                                <p class="text-gray-700 leading-relaxed mb-4 md:mb-6 text-sm md:text-base">{{ $day['desc'] }}</p>
                                
                                <!-- Activities Grid -->
                                <div class="bg-[#005991]/5 rounded-xl p-4 md:p-5 mb-4 md:mb-6">
                                    <h4 class="font-bold text-gray-900 mb-2 md:mb-3 flex items-center text-sm md:text-base">
                                        <i class="bi bi-list-check text-[#005991] mr-2 text-lg md:text-xl"></i>
                                        Today's Activities
                                    </h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 md:gap-3">
                                        @foreach($day['activities'] as $activity)
                                        <div class="flex items-center bg-white rounded-lg px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm">
                                            <i class="bi bi-check-circle-fill text-[#99C723] mr-1 md:mr-2"></i>
                                            <span class="text-gray-700">{{ $activity }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                                <!-- Highlights -->
                                @if(isset($day['highlights']))
                                <div class="flex flex-wrap gap-1 md:gap-2 mb-4 md:mb-6">
                                    @foreach($day['highlights'] as $highlight)
                                    <span class="bg-[#99C723]/20 text-gray-900 px-2 py-0.5 md:px-3 md:py-1 rounded-full text-xs md:text-sm font-medium border border-[#99C723]/30">
                                        <i class="bi bi-star-fill text-[#99C723] mr-0.5 md:mr-1"></i>{{ $highlight }}
                                    </span>
                                    @endforeach
                                </div>
                                @endif
                                
                                <!-- Pro Tip -->
                                @if(isset($day['tip']))
                                <div class="bg-amber-500/10 rounded-xl p-3 md:p-4 border border-amber-500/30">
                                    <h5 class="font-bold text-gray-900 mb-1 md:mb-2 flex items-center text-sm md:text-base">
                                        <i class="bi bi-lightbulb-fill text-amber-600 mr-1 md:mr-2"></i>
                                        Pro Tip
                                    </h5>
                                    <p class="text-xs md:text-sm text-gray-700">{{ $day['tip'] }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Download Itinerary Button -->
                <div class="mt-6 md:mt-8 text-center">
                    <button class="inline-flex items-center bg-[#005991] text-white px-6 py-3 md:px-8 md:py-4 rounded-xl font-semibold hover:shadow-xl transition-all hover:scale-105 text-sm md:text-base">
                        <i class="bi bi-download mr-2 text-lg md:text-xl"></i>
                        Download Detailed Itinerary PDF
                    </button>
                </div>
            </section>

            <!-- Departure Dates Section -->
            <section class="scroll-reveal" id="departures">
                <div class="flex items-center mb-6 md:mb-8">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-[#005991] flex items-center justify-center mr-3 md:mr-4 shadow-xl">
                        <i class="bi bi-calendar-event text-white text-2xl md:text-3xl"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Departure Dates</h2>
                        <p class="text-gray-600 text-sm md:text-base">Choose your preferred trek date</p>
                    </div>
                </div>
                
                <!-- Toggle for Private/Group -->
                <div class="mb-4 md:mb-6">
                    <div class="inline-flex rounded-xl border border-gray-300 p-0.5 md:p-1 bg-gray-50">
                        <button onclick="setTrekType('group')" id="group-btn" class="px-4 py-1.5 md:px-6 md:py-2 rounded-lg font-medium transition-all trek-type-btn active text-xs md:text-sm">
                            <i class="bi bi-people-fill mr-1 md:mr-2"></i>Join Group
                        </button>
                        <button onclick="setTrekType('private')" id="private-btn" class="px-4 py-1.5 md:px-6 md:py-2 rounded-lg font-medium transition-all trek-type-btn text-xs md:text-sm">
                            <i class="bi bi-person-fill mr-1 md:mr-2"></i>Private Trek
                        </button>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl md:rounded-2xl border-2 border-gray-200 overflow-hidden">
                    <!-- Group Departures (Default) -->
                    <div id="group-departures" class="p-4 md:p-6 space-y-3 md:space-y-4">
                        @foreach([
                            ['date' => 'March 15, 2025', 'seats' => 8, 'status' => 'Available', 'color' => '#99C723', 'price' => '$1,500'],
                            ['date' => 'April 5, 2025', 'seats' => 5, 'status' => 'Available', 'color' => '#99C723', 'price' => '$1,500'],
                            ['date' => 'April 20, 2025', 'seats' => 2, 'status' => 'Filling Fast', 'color' => '#C9302C', 'price' => '$1,500'],
                            ['date' => 'May 10, 2025', 'seats' => 10, 'status' => 'Available', 'color' => '#99C723', 'price' => '$1,500'],
                            ['date' => 'September 8, 2025', 'seats' => 12, 'status' => 'Available', 'color' => '#99C723', 'price' => '$1,500'],
                            ['date' => 'October 15, 2025', 'seats' => 6, 'status' => 'Available', 'color' => '#99C723', 'price' => '$1,500']
                        ] as $departure)
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between p-3 md:p-4 border border-gray-200 rounded-xl hover:bg-[#005991]/5 transition-all">
                            <div class="flex-1 mb-2 sm:mb-0">
                                <div class="flex items-center mb-1 md:mb-2">
                                    <i class="bi bi-calendar-date text-[#005991] mr-2 md:mr-3 text-base md:text-lg"></i>
                                    <span class="font-bold text-gray-900 text-sm md:text-base">{{ $departure['date'] }}</span>
                                </div>
                                <div class="flex items-center space-x-2 md:space-x-4 text-xs md:text-sm">
                                    <span class="text-gray-600">
                                        <i class="bi bi-people mr-0.5 md:mr-1"></i> {{ $departure['seats'] }} spots left
                                    </span>
                                    <span class="px-1.5 py-0.5 md:px-2 md:py-1 rounded-full text-xs font-medium" style="background: {{ $departure['color'] }}20; color: {{ $departure['color'] }};">
                                        {{ $departure['status'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between sm:justify-end space-x-2 md:space-x-4">
                                <span class="font-bold text-gray-900 text-sm md:text-base">{{ $departure['price'] }}</span>
                                <button onclick="selectDeparture('{{ $departure['date'] }}', 'group')" class="bg-[#005991] text-white px-3 py-1.5 md:px-4 md:py-2 rounded-lg font-medium hover:bg-[#052734] transition-all text-xs md:text-sm whitespace-nowrap">
                                    Join
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Private Departures (Hidden by default) -->
                    <div id="private-departures" class="hidden p-4 md:p-6 space-y-3 md:space-y-4">
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 md:p-6 mb-4 md:mb-6">
                            <div class="flex items-start">
                                <i class="bi bi-info-circle-fill text-[#005991] text-xl md:text-2xl mr-2 md:mr-3 mt-0.5"></i>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-1 md:mb-2 text-sm md:text-base">Private Trek Information</h4>
                                    <p class="text-gray-700 text-xs md:text-sm">Private treks can start on any date of your choice. Choose your preferred start date below and we'll customize the itinerary for your group.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-4 md:mb-6">
                            <label class="block text-gray-700 font-medium mb-2 text-sm md:text-base">Select Your Start Date</label>
                            <div class="flex flex-col sm:flex-row gap-2 md:gap-4">
                                <div class="flex-1">
                                    <input type="date" id="private-date" class="w-full px-3 py-2 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] text-sm md:text-base">
                                </div>
                                <button onclick="selectPrivateDate()" class="bg-[#005991] text-white px-4 py-2 md:px-6 md:py-3 rounded-xl font-medium hover:bg-[#052734] transition-all text-sm md:text-base whitespace-nowrap">
                                    Set Custom Date
                                </button>
                            </div>
                        </div>
                        
                        <!-- Price for different group sizes -->
                        <div class="space-y-3 md:space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between p-3 md:p-4 border border-gray-200 rounded-xl">
                                <div class="mb-2 sm:mb-0">
                                    <div class="font-bold text-gray-900 text-sm md:text-base">1 Person</div>
                                    <div class="text-xs md:text-sm text-gray-600">Solo private trek</div>
                                </div>
                                <div class="text-right">
                                    <div class="font-bold text-gray-900 text-lg md:text-xl">$2,200</div>
                                    <div class="text-xs text-gray-600">per person</div>
                                </div>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between p-3 md:p-4 border border-gray-200 rounded-xl bg-[#005991]/5">
                                <div class="mb-2 sm:mb-0">
                                    <div class="font-bold text-gray-900 text-sm md:text-base">2 Persons</div>
                                    <div class="text-xs md:text-sm text-gray-600">Most popular private option</div>
                                </div>
                                <div class="text-right">
                                    <div class="font-bold text-gray-900 text-lg md:text-xl">$1,800</div>
                                    <div class="text-xs text-gray-600">per person</div>
                                </div>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between p-3 md:p-4 border border-gray-200 rounded-xl">
                                <div class="mb-2 sm:mb-0">
                                    <div class="font-bold text-gray-900 text-sm md:text-base">3-4 Persons</div>
                                    <div class="text-xs md:text-sm text-gray-600">Group discount</div>
                                </div>
                                <div class="text-right">
                                    <div class="font-bold text-gray-900 text-lg md:text-xl">$1,600</div>
                                    <div class="text-xs text-gray-600">per person</div>
                                </div>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between p-3 md:p-4 border border-gray-200 rounded-xl">
                                <div class="mb-2 sm:mb-0">
                                    <div class="font-bold text-gray-900 text-sm md:text-base">5+ Persons</div>
                                    <div class="text-xs md:text-sm text-gray-600">Contact for custom quote</div>
                                </div>
                                <button onclick="contactForQuote()" class="bg-[#005991] text-white px-3 py-1.5 md:px-4 md:py-2 rounded-lg font-medium hover:bg-[#052734] transition-all text-xs md:text-sm whitespace-nowrap">
                                    Get Quote
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 md:mt-6 text-center">
                    <p class="text-gray-600 text-xs md:text-sm">Can't find your preferred date? <button onclick="contactForCustomDate()" class="text-[#005991] hover:underline font-medium">Contact us for custom dates</button></p>
                </div>
            </section>

            <!-- Package Details Section -->
            <section class="scroll-reveal">
                <div class="flex items-center mb-6 md:mb-8">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-[#005991] flex items-center justify-center mr-3 md:mr-4 shadow-xl">
                        <i class="bi bi-clipboard-check-fill text-white text-2xl md:text-3xl"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Package Details</h2>
                        <p class="text-gray-600 text-sm md:text-base">What's included and what's not</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-8 border-2 border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                        <!-- Included Column -->
                        <div>
                            <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                                <i class="bi bi-check-circle-fill text-[#99C723] mr-2 md:mr-3 text-xl md:text-2xl"></i>
                                What's Included
                            </h3>
                            <div class="space-y-3 md:space-y-4">
                                @foreach([
                                    'Domestic flights (Kathmandu-Lukla-Kathmandu)',
                                    'All accommodation (hotels & tea houses)',
                                    'All meals during trek (Breakfast, Lunch, Dinner)',
                                    'Experienced English-speaking guide',
                                    'Porter service (1 porter per 2 trekkers)',
                                    'All permits & TIMS card',
                                    'First aid kit & oxygen cylinder',
                                    'Duffle bag & sleeping bag',
                                    'Airport transfers in private vehicle',
                                    'Ame Treks t-shirt & trekking map',
                                    'Trek completion certificate',
                                    'Farewell dinner in Kathmandu'
                                ] as $item)
                                <div class="flex items-center">
                                    <i class="bi bi-check-circle-fill text-[#99C723] mr-2 md:mr-3 text-base md:text-lg"></i>
                                    <span class="text-gray-700 text-sm md:text-base">{{ $item }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Not Included Column -->
                        <div>
                            <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                                <i class="bi bi-x-circle-fill text-[#C9302C] mr-2 md:mr-3 text-xl md:text-2xl"></i>
                                Not Included
                            </h3>
                            <div class="space-y-3 md:space-y-4">
                                @foreach([
                                    'International airfare to/from Nepal',
                                    'Travel insurance (mandatory)',
                                    'Nepal visa fee ($30-50 on arrival)',
                                    'Personal expenses & shopping',
                                    'Tips for guide, porter & driver',
                                    'Alcoholic & soft drinks',
                                    'WiFi & battery charging fees',
                                    'Hot showers in tea houses',
                                    'Extra nights in Kathmandu',
                                    'Personal medication',
                                    'Photography charges at monuments',
                                    'Personal phone calls & data'
                                ] as $item)
                                <div class="flex items-center">
                                    <i class="bi bi-x-circle-fill text-[#C9302C] mr-2 md:mr-3 text-base md:text-lg"></i>
                                    <span class="text-gray-700 text-sm md:text-base">{{ $item }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FAQ Section (Only 5) -->
            <section class="scroll-reveal" id="faqs">
                <div class="flex items-center mb-6 md:mb-8">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-[#005991] flex items-center justify-center mr-3 md:mr-4 shadow-xl">
                        <i class="bi bi-question-circle-fill text-white text-2xl md:text-3xl"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Frequently Asked Questions</h2>
                        <p class="text-gray-600 text-sm md:text-base">Common queries answered</p>
                    </div>
                </div>
                
                <div class="space-y-3 md:space-y-4">
                    @foreach([
                        ['q' => 'What is the best time for Everest Base Camp trek?', 'a' => 'The best seasons are spring (March to May) and autumn (September to November). Spring offers blooming rhododendrons, warmer temperatures, and great visibility. Autumn provides crystal clear mountain views, stable weather, and comfortable temperatures.'],
                        ['q' => 'Do I need previous trekking experience?', 'a' => 'No previous Himalayan trekking experience is required, but good physical fitness is essential. We recommend 2-3 months of regular cardio exercise (walking, jogging, cycling, swimming) before the trek. The trek involves 5-7 hours of daily walking at high altitude.'],
                        ['q' => 'How difficult is the Everest Base Camp trek?', 'a' => 'It\'s rated as moderate to challenging. Main challenges are: altitude (max 5,545m), duration (14 days), daily walking (5-7 hours), some steep sections, and variable weather. The trek is more about endurance than technical skills. Proper acclimatization days significantly increase success rates.'],
                        ['q' => 'What about altitude sickness?', 'a' => 'Our itinerary includes proper acclimatization days following "climb high, sleep low" principles. Guides are trained in altitude sickness recognition and carry emergency oxygen. We ascend gradually with rest days in Namche and Dingboche. Drink 4-5 liters water daily and avoid alcohol.'],
                        ['q' => 'Is travel insurance mandatory?', 'a' => 'Yes, comprehensive travel insurance is mandatory covering: medical expenses, emergency helicopter evacuation (up to 6,000m), trip cancellation, lost luggage, and flight delays. Insurance must specifically cover trekking activities at high altitude. We verify insurance before trek departure.']
                    ] as $index => $faq)
                    <div class="faq-item bg-white rounded-xl md:rounded-2xl border-2 border-gray-200 overflow-hidden hover:border-[#005991] hover:shadow-lg transition-all">
                        <button onclick="toggleFAQ({{ $index }})" class="w-full px-4 py-3 md:px-6 md:py-5 flex items-center justify-between text-left">
                            <div class="flex items-start flex-1">
                                <div class="w-8 h-8 md:w-10 md:h-10 rounded-lg bg-[#005991]/10 flex items-center justify-center mr-2 md:mr-4 flex-shrink-0">
                                    <span class="text-[#005991] font-bold text-sm md:text-base">{{ $index + 1 }}</span>
                                </div>
                                <h4 class="font-bold text-gray-900 text-sm md:text-lg">{{ $faq['q'] }}</h4>
                            </div>
                            <i class="bi bi-chevron-down text-xl md:text-2xl text-gray-400 transition-transform duration-300 ml-2 md:ml-4" id="faq-chevron-{{ $index }}"></i>
                        </button>
                        <div class="faq-answer hidden px-4 md:px-6 pb-4 md:pb-6" id="faq-answer-{{ $index }}">
                            <div class="pl-0 md:pl-14 text-gray-700 leading-relaxed text-sm md:text-base">{{ $faq['a'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Testimonials -->
            <section class="scroll-reveal" id="reviews">
                <div class="flex items-center mb-6 md:mb-8">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-[#005991] flex items-center justify-center mr-3 md:mr-4 shadow-xl">
                        <i class="bi bi-chat-quote-fill text-white text-2xl md:text-3xl"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">What Trekkers Say</h2>
                        <p class="text-gray-600 text-sm md:text-base">Real experiences from our adventurers</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    @foreach([
                        ['name' => 'Sarah Johnson', 'country' => 'USA', 'rating' => 5, 'date' => 'October 2024', 'text' => 'Absolutely incredible experience! Our guide Ram was phenomenal - knowledgeable, patient, and genuinely cared about our wellbeing. The itinerary was perfectly paced with proper acclimatization. Reaching EBC was a dream come true. Ame Treks handled everything professionally.', 'image' => 'https://i.pravatar.cc/150?img=1'],
                        ['name' => 'Michael Chen', 'country' => 'Australia', 'rating' => 5, 'date' => 'April 2024', 'text' => 'Best adventure of my life! The Kala Patthar sunrise was worth every step. Tea house accommodation was better than expected. The team was amazing - always ready to help. Would highly recommend Ame Treks to anyone considering this trek.', 'image' => 'https://i.pravatar.cc/150?img=33'],
                        ['name' => 'Emma Rodriguez', 'country' => 'Spain', 'rating' => 5, 'date' => 'March 2024', 'text' => 'I was nervous about altitude but the slow pace and acclimatization days really helped. The Sherpa culture experience was beautiful. Food was delicious even at high altitude. Our porter was so strong and kind. Thank you Ame Treks for this lifetime memory!', 'image' => 'https://i.pravatar.cc/150?img=5'],
                        ['name' => 'James Wilson', 'country' => 'UK', 'rating' => 5, 'date' => 'November 2024', 'text' => 'Outstanding organization from start to finish. The guide\'s local knowledge added so much value. Tengboche Monastery visit was spiritual. Weather was perfect in autumn. Every penny was worth it. Already planning my next trek with Ame Treks!', 'image' => 'https://i.pravatar.cc/150?img=12']
                    ] as $review)
                    <div class="bg-white rounded-xl md:rounded-2xl p-4 md:p-6 border-2 border-gray-200 hover:border-[#005991] hover:shadow-xl transition-all">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-3 md:mb-4">
                            <div class="flex items-center mb-2 sm:mb-0">
                                <img src="{{ $review['image'] }}" alt="{{ $review['name'] }}" class="w-10 h-10 md:w-14 md:h-14 rounded-full mr-2 md:mr-3 border-2 border-[#005991]">
                                <div>
                                    <h4 class="font-bold text-gray-900 text-sm md:text-base">{{ $review['name'] }}</h4>
                                    <p class="text-xs md:text-sm text-gray-600">{{ $review['country'] }} • {{ $review['date'] }}</p>
                                </div>
                            </div>
                            <div class="flex text-amber-500">
                                @for($i = 0; $i < $review['rating']; $i++)
                                <i class="bi bi-star-fill text-sm md:text-base"></i>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed italic text-xs md:text-sm">"{{ $review['text'] }}"</p>
                    </div>
                    @endforeach
                </div>
                
                <div class="mt-6 md:mt-8 text-center">
                    <a href="#" class="inline-flex items-center text-[#005991] hover:text-[#052734] font-semibold text-sm md:text-lg">
                        Read All 2,847 Reviews
                        <i class="bi bi-arrow-right ml-1 md:ml-2"></i>
                    </a>
                </div>
            </section>
        </div>

        <!-- Right Column - Booking Sidebar -->
        <div class="lg:col-span-1">
            <div class="sticky top-20 md:top-24 space-y-4 md:space-y-6" id="booking-sidebar">
                <!-- Main Booking Card -->
                <div class="bg-white rounded-2xl md:rounded-3xl shadow-2xl border-2 border-gray-200 overflow-hidden">
                    <div class="bg-[#005991] p-4 md:p-8 text-white relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-24 md:w-40 md:h-40 bg-white/10 rounded-full -mr-12 -mt-12 md:-mr-20 md:-mt-20"></div>
                        <div class="relative z-10">
                            <div class="flex justify-between items-start mb-1 md:mb-2">
                                <div>
                                    <div class="text-3xl md:text-5xl font-bold mb-0.5 md:mb-1" id="price-display">$1,500</div>
                                    <div class="text-white/80 text-xs md:text-sm">per person</div>
                                </div>
                                <div class="bg-white/20 backdrop-blur-md px-2 py-0.5 md:px-3 md:py-1 rounded-full text-xs md:text-sm font-semibold">
                                    <i class="bi bi-tag-fill mr-0.5 md:mr-1"></i>Best Price
                                </div>
                            </div>
                            <div class="flex items-center space-x-1 md:space-x-2 mt-2 md:mt-4">
                                <div class="flex text-yellow-400">
                                    <i class="bi bi-star-fill text-sm md:text-base"></i>
                                    <i class="bi bi-star-fill text-sm md:text-base"></i>
                                    <i class="bi bi-star-fill text-sm md:text-base"></i>
                                    <i class="bi bi-star-fill text-sm md:text-base"></i>
                                    <i class="bi bi-star-half text-sm md:text-base"></i>
                                </div>
                                <span class="text-xs md:text-sm text-white/90">4.9 (2,847)</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-4 md:p-6">
                        <!-- Group Size Selector - Updated UI -->
                        <div class="mb-4 md:mb-6">
                            <label class="block text-gray-700 font-semibold mb-2 md:mb-3 text-sm md:text-base">Group Size</label>
                            <div class="flex items-center justify-between border border-gray-300 rounded-xl px-3 py-2 md:px-4 md:py-3 bg-gray-50">
                                <button onclick="updateGroupSize(-1)" class="w-6 h-6 md:w-8 md:h-8 flex items-center justify-center text-gray-600 hover:text-[#005991]">
                                    <i class="bi bi-dash text-base md:text-lg"></i>
                                </button>
                                <div class="flex-1 text-center">
                                    <span class="text-xl md:text-2xl font-bold text-gray-900" id="group-size">1</span>
                                    <span class="text-gray-600 ml-1 md:ml-2 text-xs md:text-sm">Person(s)</span>
                                </div>
                                <button onclick="updateGroupSize(1)" class="w-6 h-6 md:w-8 md:h-8 flex items-center justify-center text-gray-600 hover:text-[#005991]">
                                    <i class="bi bi-plus text-base md:text-lg"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Book Now Button -->
                        <button onclick="openBookingModal()" class="w-full bg-[#005991] hover:bg-[#052734] text-white py-3 md:py-4 rounded-xl font-bold text-base md:text-lg transition-all hover:shadow-2xl flex items-center justify-center group mb-4 md:mb-6 transform hover:scale-105">
                            <i class="bi bi-calendar-check-fill mr-1 md:mr-2 text-lg md:text-xl group-hover:scale-110 transition-transform"></i>
                            Book This Trek Now
                        </button>
                        
                        <!-- Contact Buttons -->
                        <div class="grid grid-cols-2 gap-2 md:gap-3 mb-4 md:mb-6">
                            <button class="border-2 border-[#99C723] text-[#99C723] hover:bg-[#99C723] hover:text-white py-2 md:py-3 rounded-xl font-semibold transition-all flex items-center justify-center hover:scale-105 text-xs md:text-sm">
                                <i class="bi bi-whatsapp mr-1 md:mr-2"></i>
                                WhatsApp
                            </button>
                            <button class="border-2 border-[#005991] text-[#005991] hover:bg-[#005991] hover:text-white py-2 md:py-3 rounded-xl font-semibold transition-all flex items-center justify-center hover:scale-105 text-xs md:text-sm">
                                <i class="bi bi-envelope-fill mr-1 md:mr-2"></i>
                                Email
                            </button>
                        </div>
                        
                        <!-- Trust Badges -->
                        <div class="grid grid-cols-2 gap-3 md:gap-4 py-3 md:py-4 border-t border-gray-200">
                            <div class="flex items-center">
                                <i class="bi bi-shield-check text-xl md:text-2xl text-[#99C723] mr-1 md:mr-2"></i>
                                <div>
                                    <div class="text-xs md:text-sm font-semibold text-gray-900">Safe & Secure</div>
                                    <div class="text-xs text-gray-600">Expert Guides</div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="bi bi-award text-xl md:text-2xl text-[#005991] mr-1 md:mr-2"></i>
                                <div>
                                    <div class="text-xs md:text-sm font-semibold text-gray-900">Award Winning</div>
                                    <div class="text-xs text-gray-600">Best 2024</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Need Help Card -->
                <div class="bg-[#99C723] rounded-2xl p-4 md:p-6 text-white shadow-xl">
                    <div class="flex items-center mb-3 md:mb-4">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center mr-2 md:mr-3">
                            <i class="bi bi-headset text-xl md:text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-base md:text-lg">Need Help?</h4>
                            <p class="text-xs md:text-sm text-white/90">We're here 24/7</p>
                        </div>
                    </div>
                    <p class="text-xs md:text-sm text-white/90 mb-3 md:mb-4">Have questions? Our trek experts are ready to assist you with planning your adventure.</p>
                    <div class="space-y-1 md:space-y-2">
                        <a href="tel:+9779851234567" class="flex items-center text-white hover:text-white/90 transition-colors text-xs md:text-sm">
                            <i class="bi bi-telephone-fill mr-1 md:mr-2"></i>
                            <span class="font-medium">+977 985-123-4567</span>
                        </a>
                        <a href="mailto:info@ametreks.com" class="flex items-center text-white hover:text-white/90 transition-colors text-xs md:text-sm">
                            <i class="bi bi-envelope-fill mr-1 md:mr-2"></i>
                            <span class="font-medium">info@ametreks.com</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Booking Modal -->
<div id="bookingModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-3 md:p-4 overflow-y-auto">
    <!-- Blue Overlay -->
    <div class="fixed inset-0 bg-[#005991]/90 backdrop-blur-sm" onclick="closeBookingModal()"></div>
    
    <!-- Modal Content -->
    <div class="relative w-full max-w-4xl mx-auto my-8">
        <div class="bg-white rounded-2xl md:rounded-3xl overflow-hidden shadow-2xl">
            <div class="p-4 md:p-6 lg:p-8">
                <!-- Modal Header -->
                <div class="flex items-center justify-between mb-6 md:mb-8">
                    <div>
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-900">Book Everest Base Camp Trek</h3>
                        <p class="text-gray-600 text-sm md:text-base">Complete your booking details</p>
                    </div>
                    <button onclick="closeBookingModal()" class="text-gray-500 hover:text-gray-700 text-2xl md:text-3xl">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
                
                <!-- Booking Form -->
                <form id="bookingForm" class="space-y-6 md:space-y-8 max-h-[60vh] md:max-h-[70vh] overflow-y-auto pr-2 md:pr-4">
                    <!-- Trek Type -->
                    <div>
                        <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-3 md:mb-4">Trek Type</h4>
                        <div class="inline-flex rounded-xl border border-gray-300 p-0.5 md:p-1 bg-gray-50">
                            <button type="button" onclick="setModalTrekType('group')" id="modal-group-btn" class="px-4 py-1.5 md:px-6 md:py-2 rounded-lg font-medium transition-all modal-trek-type-btn active text-xs md:text-sm">
                                <i class="bi bi-people-fill mr-1 md:mr-2"></i>Join Group
                            </button>
                            <button type="button" onclick="setModalTrekType('private')" id="modal-private-btn" class="px-4 py-1.5 md:px-6 md:py-2 rounded-lg font-medium transition-all modal-trek-type-btn text-xs md:text-sm">
                                <i class="bi bi-person-fill mr-1 md:mr-2"></i>Private Trek
                            </button>
                        </div>
                    </div>
                    
                    <!-- Personal Information -->
                    <div>
                        <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                            <i class="bi bi-person-fill text-[#005991] mr-2 md:mr-3"></i>
                            Personal Information
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Full Name *</label>
                                <input type="text" required class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Email Address *</label>
                                <input type="email" required class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Phone Number *</label>
                                <input type="tel" required class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Nationality *</label>
                                <select required class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                                    <option value="">Select Country</option>
                                    <option value="US">United States</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="AU">Australia</option>
                                    <option value="CA">Canada</option>
                                    <option value="DE">Germany</option>
                                    <option value="FR">France</option>
                                    <option value="NP">Nepal</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Passport Number *</label>
                                <input type="text" required class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Date of Birth *</label>
                                <input type="date" required class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Trek Details -->
                    <div>
                        <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                            <i class="bi bi-calendar-fill text-[#005991] mr-2 md:mr-3"></i>
                            Trek Details
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div id="group-date-selection">
                                <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Preferred Departure Date *</label>
                                <select required class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                                    <option value="">Select Date</option>
                                    <option value="2025-03-15">March 15, 2025</option>
                                    <option value="2025-04-05">April 5, 2025</option>
                                    <option value="2025-04-20">April 20, 2025</option>
                                    <option value="2025-05-10">May 10, 2025</option>
                                </select>
                            </div>
                            <div id="private-date-selection" class="hidden">
                                <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Custom Start Date *</label>
                                <input type="date" class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Group Size *</label>
                                <div class="flex items-center border border-gray-300 rounded-xl px-3 py-2 md:px-4 md:py-3 bg-gray-50">
                                    <button type="button" onclick="updateModalGroupSize(-1)" class="w-6 h-6 md:w-8 md:h-8 flex items-center justify-center text-gray-600 hover:text-[#005991]">
                                        <i class="bi bi-dash text-base md:text-lg"></i>
                                    </button>
                                    <div class="flex-1 text-center">
                                        <input type="number" id="modal-group-size" value="1" min="1" max="12" class="text-center bg-transparent border-none w-full text-xl md:text-2xl font-bold text-gray-900" readonly>
                                        <span class="text-gray-600 text-xs md:text-sm">Person(s)</span>
                                    </div>
                                    <button type="button" onclick="updateModalGroupSize(1)" class="w-6 h-6 md:w-8 md:h-8 flex items-center justify-center text-gray-600 hover:text-[#005991]">
                                        <i class="bi bi-plus text-base md:text-lg"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-gray-700 font-medium mb-1 md:mb-2 text-sm md:text-base">Special Requests</label>
                                <textarea rows="3" class="w-full px-3 py-2.5 md:px-4 md:py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-[#005991] focus:ring-2 focus:ring-[#005991]/20 text-sm md:text-base" placeholder="Dietary requirements, medical conditions, etc."></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Payment Summary -->
                    <div class="bg-gray-50 rounded-xl md:rounded-2xl p-4 md:p-6">
                        <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                            <i class="bi bi-credit-card-fill text-[#005991] mr-2 md:mr-3"></i>
                            Payment Summary
                        </h4>
                        <div class="space-y-3 md:space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 text-sm md:text-base">Everest Base Camp Trek (x<span id="summary-group-size">1</span>)</span>
                                <span class="font-bold text-sm md:text-base" id="summary-price">$1,500</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 text-sm md:text-base">Booking Fee</span>
                                <span class="font-bold text-sm md:text-base">$0</span>
                            </div>
                            <div class="border-t border-gray-300 pt-3 md:pt-4">
                                <div class="flex justify-between items-center text-lg md:text-xl font-bold text-[#005991]">
                                    <span>Total Amount</span>
                                    <span id="total-price">$1,500</span>
                                </div>
                                <p class="text-xs md:text-sm text-gray-600 mt-1 md:mt-2">* 30% deposit required to confirm booking</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Terms & Submit -->
                    <div class="space-y-4 md:space-y-6">
                        <div class="flex items-start">
                            <input type="checkbox" id="terms" required class="mt-1 mr-2 md:mr-3">
                            <label for="terms" class="text-gray-700 text-xs md:text-sm">
                                I agree to the <a href="#" class="text-[#005991] hover:underline">Terms & Conditions</a> and confirm that I have read and understood the trek requirements, including fitness level and equipment needed.
                            </label>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3 md:gap-4">
                            <button type="button" onclick="closeBookingModal()" class="flex-1 border-2 border-gray-300 text-gray-700 hover:bg-gray-50 py-3 md:py-4 rounded-xl font-semibold transition-all text-sm md:text-base">
                                Cancel
                            </button>
                            <button type="submit" class="flex-1 bg-[#005991] hover:bg-[#052734] text-white py-3 md:py-4 rounded-xl font-bold transition-all hover:shadow-xl text-sm md:text-base">
                                Proceed to Payment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Gallery Section -->
<section class="py-12 md:py-16 lg:py-20 bg-gray-50">
    <div class="container mx-auto max-w-7xl px-3 sm:px-4">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-2 md:mb-4">Trek Gallery</h2>
            <p class="text-lg md:text-xl text-gray-600">Visual journey through the Himalayas</p>
        </div>
        
        <div class="columns-2 sm:columns-3 lg:columns-4 gap-3 md:gap-4">
            @foreach([
                'https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=600',
                'https://images.unsplash.com/photo-1548013146-72479768bada?w=600',
                'https://images.unsplash.com/photo-1551632811-561732d1e306?w=600',
                'https://images.unsplash.com/photo-1519681393784-d120267933ba?w=600',
                'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600',
                'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=600',
                'https://images.unsplash.com/photo-1506260408121-e353d10b87c7?w=600',
                'https://images.unsplash.com/photo-1580502304786-4d0cab1c5b42?w=600'
            ] as $image)
            <div class="break-inside-avoid group cursor-pointer mb-3 md:mb-4">
                <div class="relative overflow-hidden rounded-xl md:rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500">
                    <img src="{{ $image }}" alt="Trek photo" class="w-full h-auto group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center p-3 md:p-4">
                        <i class="bi bi-zoom-in text-white text-2xl md:text-3xl"></i>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-12 md:py-16 lg:py-20 bg-[#005991] relative overflow-hidden">
    <div class="container mx-auto max-w-4xl px-3 sm:px-4 text-center relative z-10">
        <h2 class="text-3xl md:text-5xl lg:text-6xl font-bold text-white mb-4 md:mb-6">
            Ready for Your <span class="text-[#99C723]">Everest Adventure?</span>
        </h2>
        <p class="text-lg md:text-xl text-white/90 mb-6 md:mb-10 max-w-2xl mx-auto">
            Join thousands of trekkers who have made their Himalayan dreams come true. Book now and start your journey to the roof of the world!
        </p>
        <div class="flex flex-wrap gap-3 md:gap-4 justify-center">
            <button onclick="openBookingModal()" class="bg-[#99C723] hover:bg-[#99C723]/90 text-white px-6 py-3 md:px-10 md:py-5 rounded-xl font-bold text-base md:text-lg transition-all hover:shadow-2xl flex items-center group hover:scale-105 transform">
                <i class="bi bi-calendar-check-fill mr-2 text-lg md:text-xl group-hover:scale-110 transition-transform"></i>
                Book Your Trek Now
            </button>
            <button class="bg-white/20 backdrop-blur-md hover:bg-white/30 text-white px-6 py-3 md:px-10 md:py-5 rounded-xl font-bold text-base md:text-lg transition-all border-2 border-white/40 hover:shadow-2xl flex items-center group hover:scale-105 transform">
                <i class="bi bi-download mr-2 text-lg md:text-xl group-hover:scale-110 transition-transform"></i>
                Download Brochure
            </button>
        </div>
    </div>
</section>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in { animation: fadeIn 0.8s ease-out; }
.animate-fade-in-delay { animation: fadeIn 0.8s ease-out 0.2s backwards; }
.animate-fade-in-delay-2 { animation: fadeIn 0.8s ease-out 0.4s backwards; }
.animate-fade-in-delay-3 { animation: fadeIn 0.8s ease-out 0.6s backwards; }

.stat-card {
    animation: fadeIn 0.6s ease-out backwards;
}

.hero-parallax {
    will-change: transform;
}

.scroll-reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

.scroll-reveal.revealed {
    opacity: 1;
    transform: translateY(0);
}

.particles {
    position: absolute;
    inset: 0;
    background: radial-gradient(2px 2px at 20% 30%, white, transparent),
                radial-gradient(2px 2px at 60% 70%, white, transparent),
                radial-gradient(1px 1px at 50% 50%, white, transparent),
                radial-gradient(1px 1px at 80% 10%, white, transparent);
    animation: particles 20s linear infinite;
    opacity: 0.3;
}

@keyframes particles {
    from { background-position: 0 0; }
    to { background-position: 100px 100px; }
}

.itinerary-content, .faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s ease-out;
}

.itinerary-content.active { max-height: 2000px; }
.faq-answer.active { max-height: 1000px; }

#chevron-1, #chevron-2, #chevron-3, #chevron-4, #chevron-5,
#faq-chevron-0, #faq-chevron-1, #faq-chevron-2, #faq-chevron-3, #faq-chevron-4 {
    transition: transform 0.3s ease;
}

.rotate-180 { transform: rotate(180deg); }

.nav-link {
    position: relative;
    transition: color 0.3s ease;
}

.nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 3px;
    background-color: #005991;
    transition: width 0.3s ease;
}

.nav-link:hover::after,
.nav-link.active::after {
    width: 80%;
}

.nav-link.active {
    color: #005991;
}

.trek-type-btn {
    color: #666;
    white-space: nowrap;
}

.trek-type-btn.active {
    background-color: #005991;
    color: white;
}

.modal-trek-type-btn {
    color: #666;
    white-space: nowrap;
}

.modal-trek-type-btn.active {
    background-color: #005991;
    color: white;
}

/* Custom scrollbar for modal */
#bookingForm::-webkit-scrollbar {
    width: 6px;
}

#bookingForm::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

#bookingForm::-webkit-scrollbar-thumb {
    background: #005991;
    border-radius: 10px;
}

#bookingForm::-webkit-scrollbar-thumb:hover {
    background: #052734;
}

/* Hide scrollbar for navigation */
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

/* Responsive adjustments */
@media (max-width: 640px) {
    .hero-parallax {
        transform: translateY(0) !important;
    }
    
    .container {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }
}

@media (max-width: 768px) {
    #bookingModal {
        padding: 1rem;
    }
    
    #bookingForm {
        max-height: 70vh;
    }
}
</style>

<script>
// Booking Modal Functions
let groupSize = 1;
let basePrice = 1500;
let trekType = 'group';

function openBookingModal() {
    document.getElementById('bookingModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    
    // Center modal on mobile
    if (window.innerWidth <= 768) {
        document.getElementById('bookingModal').scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
}

function closeBookingModal() {
    document.getElementById('bookingModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

function updateGroupSize(change) {
    groupSize = Math.max(1, Math.min(12, groupSize + change));
    document.getElementById('group-size').textContent = groupSize;
    updatePrice();
}

function updateModalGroupSize(change) {
    groupSize = Math.max(1, Math.min(12, groupSize + change));
    document.getElementById('modal-group-size').value = groupSize;
    document.getElementById('summary-group-size').textContent = groupSize;
    updatePrice();
}

function updatePrice() {
    let pricePerPerson = basePrice;
    
    // Adjust price based on trek type and group size
    if (trekType === 'private') {
        if (groupSize === 1) {
            pricePerPerson = 2200;
        } else if (groupSize === 2) {
            pricePerPerson = 1800;
        } else if (groupSize >= 3 && groupSize <= 4) {
            pricePerPerson = 1600;
        } else {
            pricePerPerson = basePrice; // For 5+, contact for quote
        }
    }
    
    const totalPrice = pricePerPerson * groupSize;
    const formattedPrice = totalPrice.toLocaleString('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 0
    });
    
    const perPersonPrice = pricePerPerson.toLocaleString('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 0
    });
    
    document.getElementById('price-display').textContent = perPersonPrice;
    document.getElementById('summary-price').textContent = perPersonPrice;
    document.getElementById('total-price').textContent = formattedPrice;
}

function setTrekType(type) {
    trekType = type;
    
    // Update button states
    document.getElementById('group-btn').classList.toggle('active', type === 'group');
    document.getElementById('private-btn').classList.toggle('active', type === 'private');
    
    // Show/hide departure sections
    document.getElementById('group-departures').classList.toggle('hidden', type !== 'group');
    document.getElementById('private-departures').classList.toggle('hidden', type !== 'private');
    
    updatePrice();
}

function setModalTrekType(type) {
    trekType = type;
    
    // Update button states
    document.getElementById('modal-group-btn').classList.toggle('active', type === 'group');
    document.getElementById('modal-private-btn').classList.toggle('active', type === 'private');
    
    // Show/hide date selection
    document.getElementById('group-date-selection').classList.toggle('hidden', type !== 'group');
    document.getElementById('private-date-selection').classList.toggle('hidden', type !== 'private');
    
    updatePrice();
}

function selectDeparture(date, type) {
    openBookingModal();
    setModalTrekType(type);
    console.log('Selected departure:', date, 'Type:', type);
}

function selectPrivateDate() {
    const dateInput = document.getElementById('private-date');
    if (dateInput.value) {
        openBookingModal();
        setModalTrekType('private');
        console.log('Selected private date:', dateInput.value);
    } else {
        alert('Please select a date first');
    }
}

function contactForQuote() {
    alert('Redirecting to contact form for custom quote...');
}

function contactForCustomDate() {
    alert('Redirecting to contact form for custom dates...');
}

// Close modal when clicking outside or pressing ESC
document.getElementById('bookingModal').addEventListener('click', function(e) {
    if (e.target === this || e.target.classList.contains('bg-[#005991]/90')) {
        closeBookingModal();
    }
});

// Close modal with ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && !document.getElementById('bookingModal').classList.contains('hidden')) {
        closeBookingModal();
    }
});

// Form submission
document.getElementById('bookingForm').addEventListener('submit', function(e) {
    e.preventDefault();
    // Handle form submission here
    alert('Booking submitted successfully!');
    closeBookingModal();
});

// Smooth scroll to sections
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        const targetId = this.getAttribute('href');
        if (targetId === '#') return;
        
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            // Update active nav link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            this.classList.add('active');
            
            // Scroll to section
            const offset = window.innerWidth <= 768 ? 120 : 80;
            window.scrollTo({
                top: targetElement.offsetTop - offset,
                behavior: 'smooth'
            });
        }
    });
});

// Update active nav link on scroll
function updateActiveNavLink() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    
    let currentSection = '';
    const offset = window.innerWidth <= 768 ? 150 : 100;
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop - offset;
        const sectionHeight = section.clientHeight;
        if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
            currentSection = section.getAttribute('id');
        }
    });
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${currentSection}`) {
            link.classList.add('active');
        }
    });
}

// Toggle itinerary
function toggleItinerary(day) {
    const content = document.getElementById(`content-${day}`);
    const chevron = document.getElementById(`chevron-${day}`);
    
    content.classList.toggle('hidden');
    content.classList.toggle('active');
    chevron.classList.toggle('rotate-180');
}

// Toggle FAQ
function toggleFAQ(index) {
    const answer = document.getElementById(`faq-answer-${index}`);
    const chevron = document.getElementById(`faq-chevron-${index}`);
    
    answer.classList.toggle('hidden');
    answer.classList.toggle('active');
    chevron.classList.toggle('rotate-180');
}

// Scroll reveal animation
function revealOnScroll() {
    const reveals = document.querySelectorAll('.scroll-reveal');
    const windowHeight = window.innerHeight;
    const elementVisible = 150;
    
    reveals.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        if (elementTop < windowHeight - elementVisible) {
            element.classList.add('revealed');
        }
    });
}

// Parallax effect - only on desktop
function handleParallax() {
    if (window.innerWidth > 768) {
        const scrolled = window.pageYOffset;
        const parallax = document.querySelector('.hero-parallax');
        if (parallax) {
            parallax.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    }
}

// Initialize on load
window.addEventListener('load', () => {
    revealOnScroll();
    updatePrice();
    updateActiveNavLink();
    
    // Set tomorrow as default date for private trek
    const tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    const formattedDate = tomorrow.toISOString().split('T')[0];
    document.getElementById('private-date').min = formattedDate;
    document.getElementById('private-date').value = formattedDate;
    
    // Initialize modal date field
    const modalPrivateDate = document.querySelector('#private-date-selection input[type="date"]');
    if (modalPrivateDate) {
        modalPrivateDate.min = formattedDate;
        modalPrivateDate.value = formattedDate;
    }
});

window.addEventListener('scroll', () => {
    handleParallax();
    revealOnScroll();
    updateActiveNavLink();
});

// Handle window resize
window.addEventListener('resize', () => {
    revealOnScroll();
    updateActiveNavLink();
});

// Share content
function shareContent() {
    if (navigator.share) {
        navigator.share({
            title: 'Everest Base Camp Trek',
            text: 'Check out this amazing Everest Base Camp Trek!',
            url: window.location.href
        });
    } else {
        alert('Share: ' + window.location.href);
    }
}

// Video modal
function openVideoModal() {
    alert('Video modal would open here with trek footage');
}
</script>

@endsection