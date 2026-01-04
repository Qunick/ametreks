<section class="py-12 lg:py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8 lg:mb-12">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-3 lg:mb-4">
                Upcoming Departures
            </h2>
            <p class="text-[#6D6E70] text-sm lg:text-base max-w-2xl mx-auto">
                Check available dates and join our scheduled group departures
            </p>
        </div>

        <!-- Desktop Table Header - Hidden on mobile -->
        <div class="hidden lg:block bg-gray-50 border border-gray-200 rounded-lg mb-6">
            <div class="grid grid-cols-12 gap-4 px-6 py-4 text-sm font-semibold text-[#6D6E70]">
                <div class="col-span-5">Trip Name</div>
                <div class="col-span-3 text-center">Joining Dates</div>
                <div class="col-span-2 text-center">Availability</div>
                <div class="col-span-2 text-center">Prices</div>
            </div>
        </div>

        <!-- Trips List -->
        <div class="space-y-3 lg:space-y-4" id="trips-container">
            <!-- Trips will be rendered here by JavaScript -->
        </div>

        <!-- Footer CTA -->
        <div class="text-center mt-8 lg:mt-12 pt-6 lg:pt-8 border-t border-gray-200">
            <p class="text-[#6D6E70] text-sm lg:text-base mb-4 lg:mb-6">
                Can't find your preferred dates? We offer custom private departures.
            </p>
            <button class="bg-[#005991] hover: text-white font-semibold py-2 lg:py-3 px-6 lg:px-8 rounded-lg transition-all duration-300 hover:scale-105 flex items-center gap-2 mx-auto text-sm lg:text-base">
                View More Dates!!
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </div>
    </div>

    <script>
        // Data (same as in React component)
        const trips = [
            {
                id: 1,
                name: "Annapurna Circuit Trek",
                duration: "17 Days",
                departures: [
                    {
                        id: 1,
                        arrival: "07 Dec, 2025",
                        departure: "23 Dec, 2025",
                        days: "Sunday - Tuesday",
                        availability: "Available",
                        price: 3160,
                        action: "JOIN A GROUP"
                    },
                    {
                        id: 2,
                        arrival: "15 Dec, 2025",
                        departure: "01 Jan, 2026",
                        days: "Monday - Thursday",
                        availability: "Available",
                        price: 3160,
                        action: "JOIN A GROUP"
                    }
                ]
            },
            {
                id: 2,
                name: "Everest Base Camp Trek via Gokyo Lakes",
                duration: "18 Days",
                departures: [
                    {
                        id: 1,
                        arrival: "20 Dec, 2025",
                        departure: "05 Jan, 2026",
                        days: "Saturday - Monday",
                        availability: "Available",
                        price: 3299,
                        action: "JOIN A GROUP"
                    }
                ]
            },
            {
                id: 3,
                name: "Annapurna With Tilicho Lake Trek",
                duration: "17 Days",
                departures: [
                    {
                        id: 1,
                        arrival: "21 Dec, 2025",
                        departure: "28 Dec, 2025",
                        days: "Sunday - Sunday",
                        availability: "10 spaces left",
                        price: 3299,
                        action: "JOIN A GROUP"
                    }
                ]
            },
            {
                id: 4,
                name: "Tiger's Nest Trek - Bhutan",
                duration: "8 Days",
                departures: [
                    {
                        id: 1,
                        arrival: "24 Dec, 2025",
                        departure: "24 Dec, 2025",
                        days: "Wednesday - Wednesday",
                        availability: "Available",
                        price: 299,
                        action: "JOIN A GROUP"
                    }
                ]
            },
            {
                id: 5,
                name: "Everest Mountain Flight",
                duration: "1 Day",
                departures: [
                    {
                        id: 1,
                        arrival: "24 Dec, 2025",
                        departure: "24 Dec, 2025",
                        days: "Wednesday - Wednesday",
                        availability: "Available",
                        price: 299,
                        action: "JOIN A GROUP"
                    }
                ]
            }
        ];

        let expandedTrip = null;

        // Format price function
        function formatPrice(price) {
            return `US $${price.toLocaleString()}`;
        }

        // Get availability color class
        function getAvailabilityClass(availability) {
            if (availability.includes('left')) {
                return 'bg-[#99C723]/20 text-[#99C723] border border-[#99C723]/30';
            } else if (availability === 'Available') {
                return 'bg-[#4D8BB2]/20 text-[#005991] border border-[#4D8BB2]/30';
            }
            return 'bg-gray-100 text-gray-800 border border-gray-200';
        }

        // Toggle trip function
        function toggleTrip(tripId) {
            if (expandedTrip === tripId) {
                expandedTrip = null;
            } else {
                expandedTrip = tripId;
            }
            renderTrips();
        }

        // Render trips function
        function renderTrips() {
            const container = document.getElementById('trips-container');
            container.innerHTML = '';

            trips.forEach(trip => {
                const isExpanded = expandedTrip === trip.id;
                
                const tripElement = document.createElement('div');
                tripElement.className = 'border border-gray-200 rounded-lg hover:border-[#4D8BB2]/30 transition-all duration-300';
                tripElement.innerHTML = `
                    <!-- Trip Header - Always Visible -->
                    <div 
                        class="p-4 lg:px-6 lg:py-4 cursor-pointer bg-white hover:bg-gray-50/50 rounded-lg"
                        onclick="toggleTrip(${trip.id})"
                    >
                        <!-- Mobile Layout -->
                        <div class="lg:hidden">
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex-1">
                                    <h5 class="font-normal text-gray-900 mb-1">
                                        ${trip.name}
                                    </h5>
                                    <div class="flex items-center gap-2 text-sm text-[#6D6E70] mb-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>${trip.duration}</span>
                                    </div>
                                </div>
                                ${isExpanded ? 
                                    '<svg class="w-5 h-5 text-[#005991] mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" /></svg>' :
                                    '<svg class="w-5 h-5 text-[#005991] mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>'
                                }
                            </div>
                            
                            <!-- First departure preview - Mobile -->
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2 text-sm text-[#6D6E70]">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span>${trip.departures[0].arrival}</span>
                                    </div>
                                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-medium ${getAvailabilityClass(trip.departures[0].availability)}">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-6.201a9 9 0 01-4.5 7.745" />
                                        </svg>
                                        ${trip.departures[0].availability}
                                    </span>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div class="text-sm text-gray-900 font-semibold">
                                        ${formatPrice(trip.departures[0].price)}
                                    </div>
                                    <button class="text-[#005991] hover:text-[#052734] font-medium text-sm flex items-center gap-1 transition-colors">
                                        ${trip.departures[0].action}
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Desktop Layout -->
                        <div class="hidden lg:grid lg:grid-cols-12 lg:gap-4">
                            <div class="col-span-5">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-semibold text-gray-900 text-sm lg:text-base">
                                            ${trip.name}
                                        </h3>
                                        <div class="flex items-center gap-1 text-sm text-[#6D6E70] mt-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>${trip.duration}</span>
                                        </div>
                                    </div>
                                    ${isExpanded ? 
                                        '<svg class="w-5 h-5 text-[#005991]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" /></svg>' :
                                        '<svg class="w-5 h-5 text-[#005991]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>'
                                    }
                                </div>
                            </div>
                            
                            <!-- First departure preview - Desktop -->
                            ${trip.departures.length > 0 ? `
                                <div class="col-span-3">
                                    <div class="text-center">
                                        <div class="flex items-center justify-center gap-1 text-sm text-[#6D6E70] mb-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span>${trip.departures[0].days}</span>
                                        </div>
                                        <div class="text-xs text-[#6D6E70]/80">
                                            ${trip.departures[0].arrival} - ${trip.departures[0].departure}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-span-2 text-center">
                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium ${getAvailabilityClass(trip.departures[0].availability)}">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-6.201a9 9 0 01-4.5 7.745" />
                                        </svg>
                                        ${trip.departures[0].availability}
                                    </span>
                                </div>
                                
                                <div class="col-span-2 text-center">
                                    <div class="font-semibold text-gray-900 text-sm">
                                        ${formatPrice(trip.departures[0].price)}
                                    </div>
                                    <button class="text-xs text-[#005991] hover:text-[#052734] font-medium mt-1 transition-colors">
                                        ${trip.departures[0].action}
                                    </button>
                                </div>
                            ` : ''}
                        </div>
                    </div>

                    ${isExpanded ? `
                        <!-- Expandable Departures List -->
                        <div class="border-t border-gray-200 bg-gray-50/50">
                            <!-- Mobile Expanded View -->
                            <div class="lg:hidden p-4 space-y-4">
                                <h4 class="font-semibold text-gray-900 text-sm mb-3">All Departures:</h4>
                                ${trip.departures.map((departure, index) => `
                                    <div class="p-3 bg-white rounded-lg border border-gray-200 ${index !== trip.departures.length - 1 ? 'mb-3' : ''}">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="flex items-center gap-2 text-sm text-[#6D6E70]">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <span class="font-medium">${departure.days}</span>
                                            </div>
                                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-medium ${getAvailabilityClass(departure.availability)}">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-6.201a9 9 0 01-4.5 7.745" />
                                                </svg>
                                                ${departure.availability}
                                            </span>
                                        </div>
                                        
                                        <div class="text-xs text-[#6D6E70]/80 mb-3">
                                            ${departure.arrival} - ${departure.departure}
                                        </div>
                                        
                                        <div class="flex items-center justify-between">
                                            <div class="text-sm text-gray-900 font-semibold">
                                                ${formatPrice(departure.price)}
                                            </div>
                                            <button class="text-[#005991] hover:text-[#052734] font-medium text-sm flex items-center gap-1 transition-colors">
                                                ${departure.action}
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                `).join('')}
                            </div>

                            <!-- Desktop Expanded View -->
                            <div class="hidden lg:block">
                                ${trip.departures.map((departure, index) => `
                                    <div class="grid grid-cols-12 gap-4 px-6 py-4 ${index !== trip.departures.length - 1 ? 'border-b border-gray-200' : ''}">
                                        <div class="col-span-5"></div> <!-- Empty space under trip name -->
                                        
                                        <div class="col-span-3">
                                            <div class="text-center">
                                                <div class="flex items-center justify-center gap-1 text-sm text-[#6D6E70] mb-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    <span>${departure.days}</span>
                                                </div>
                                                <div class="text-xs text-[#6D6E70]/80">
                                                    ${departure.arrival} - ${departure.departure}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-span-2 text-center">
                                            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium ${getAvailabilityClass(departure.availability)}">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-6.201a9 9 0 01-4.5 7.745" />
                                                </svg>
                                                ${departure.availability}
                                            </span>
                                        </div>
                                        
                                        <div class="col-span-2 text-center">
                                            <div class="font-semibold text-gray-900 text-sm">
                                                ${formatPrice(departure.price)}
                                            </div>
                                            <button class="text-xs text-[#005991] hover:text-[#052734] font-medium mt-1 flex items-center justify-center gap-1 mx-auto transition-colors">
                                                ${departure.action}
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                    ` : ''}
                `;
                
                container.appendChild(tripElement);
            });
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', renderTrips);
    </script>
</section>