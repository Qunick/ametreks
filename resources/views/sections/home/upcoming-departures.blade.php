<section class="py-16 lg:py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-10 lg:mb-14">
            <span class="inline-flex items-center gap-2 px-4 py-2 bg-[#005991]/10 text-[#005991] rounded-full text-sm font-medium mb-4 border border-[#005991]/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Scheduled Departures
            </span>
            <h2 class="text-3xl lg:text-4xl font-light text-[#052734] mb-4">
                Upcoming <span class="font-semibold text-[#005991]">Adventures</span>
            </h2>
            <p class="text-[#6D6E70] text-base lg:text-lg max-w-2xl mx-auto">
                Join our scheduled group departures and embark on unforgettable journeys
            </p>
        </div>

        {{-- Desktop Table Header --}}
        <div class="hidden lg:block mb-4">
            <div class="grid grid-cols-12 gap-4 px-6 py-3 text-xs font-semibold text-[#6D6E70] uppercase tracking-wider">
                <div class="col-span-5">Adventure</div>
                <div class="col-span-3 text-center">Dates</div>
                <div class="col-span-2 text-center">Status</div>
                <div class="col-span-2 text-center">Price</div>
            </div>
        </div>

        {{-- Trips List --}}
        <div class="space-y-3" id="trips-container">
            {{-- Trips rendered by JavaScript --}}
        </div>

        {{-- Footer CTA --}}
        <div class="text-center mt-12 lg:mt-16">
            <div class="inline-flex flex-col sm:flex-row items-center gap-4 p-6 lg:p-8 bg-[#005991] rounded-2xl">
                <div class="text-center sm:text-left">
                    <p class="text-white font-medium mb-1">Can't find your dates?</p>
                    <p class="text-white/60 text-sm">We offer custom private departures tailored to you</p>
                </div>
                <button class="flex-shrink-0 bg-[#99c723] hover:bg-[#8ab620] text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 hover:shadow-lg hover:shadow-[#99c723]/25 flex items-center gap-2">
                    Request Custom Trip
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        const trips = [
            {
                id: 1,
                name: "Annapurna Circuit Trek",
                duration: "17 Days",
                difficulty: "Moderate",
                image: "/placeholder.svg?height=80&width=80",
                departures: [
                    { id: 1, arrival: "07 Dec, 2025", departure: "23 Dec, 2025", days: "Sun - Tue", availability: "Available", spots: 12, price: 3160 },
                    { id: 2, arrival: "15 Dec, 2025", departure: "01 Jan, 2026", days: "Mon - Thu", availability: "Available", spots: 8, price: 3160 }
                ]
            },
            {
                id: 2,
                name: "Everest Base Camp via Gokyo",
                duration: "18 Days",
                difficulty: "Challenging",
                image: "/placeholder.svg?height=80&width=80",
                departures: [
                    { id: 1, arrival: "20 Dec, 2025", departure: "05 Jan, 2026", days: "Sat - Mon", availability: "Available", spots: 6, price: 3299 }
                ]
            },
            {
                id: 3,
                name: "Annapurna With Tilicho Lake",
                duration: "17 Days",
                difficulty: "Moderate",
                image: "/placeholder.svg?height=80&width=80",
                departures: [
                    { id: 1, arrival: "21 Dec, 2025", departure: "28 Dec, 2025", days: "Sun - Sun", availability: "Limited", spots: 3, price: 3299 }
                ]
            },
            {
                id: 4,
                name: "Tiger's Nest Trek - Bhutan",
                duration: "8 Days",
                difficulty: "Easy",
                image: "/placeholder.svg?height=80&width=80",
                departures: [
                    { id: 1, arrival: "24 Dec, 2025", departure: "31 Dec, 2025", days: "Wed - Wed", availability: "Available", spots: 10, price: 2499 }
                ]
            },
            {
                id: 5,
                name: "Everest Mountain Flight",
                duration: "1 Day",
                difficulty: "Easy",
                image: "/placeholder.svg?height=80&width=80",
                departures: [
                    { id: 1, arrival: "24 Dec, 2025", departure: "24 Dec, 2025", days: "Daily", availability: "Available", spots: 20, price: 299 }
                ]
            }
        ];

        let expandedTrip = null;

        function formatPrice(price) {
            return `$${price.toLocaleString()}`;
        }

        function getAvailabilityBadge(availability, spots) {
            if (availability === 'Limited' || spots <= 5) {
                return `<span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#c9302c]/10 text-[#c9302c] border border-[#c9302c]/20 rounded-full text-xs font-medium">
                    <span class="w-1.5 h-1.5 bg-[#c9302c] rounded-full animate-pulse"></span>
                    ${spots} spots left
                </span>`;
            }
            return `<span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#99c723]/10 text-[#99c723] border border-[#99c723]/20 rounded-full text-xs font-medium">
                <span class="w-1.5 h-1.5 bg-[#99c723] rounded-full"></span>
                Available
            </span>`;
        }

        function getDifficultyColor(difficulty) {
            const colors = {
                'Easy': 'bg-[#99c723]/15 text-[#7a9e1c]',
                'Moderate': 'bg-[#4D8BB2]/15 text-[#005991]',
                'Challenging': 'bg-[#c9302c]/10 text-[#c9302c]'
            };
            return colors[difficulty] || 'bg-gray-100 text-[#6D6E70]';
        }

        function toggleTrip(tripId) {
            expandedTrip = expandedTrip === tripId ? null : tripId;
            renderTrips();
        }

        function renderTrips() {
            const container = document.getElementById('trips-container');
            container.innerHTML = '';

            trips.forEach(trip => {
                const isExpanded = expandedTrip === trip.id;
                const firstDeparture = trip.departures[0];
                
                const tripElement = document.createElement('div');
                tripElement.className = `bg-white rounded-2xl border transition-all duration-300 overflow-hidden ${isExpanded ? 'border-[#4D8BB2] shadow-lg shadow-[#005991]/10' : 'border-gray-200 hover:border-[#4D8BB2]/50 hover:shadow-md'}`;
                
                tripElement.innerHTML = `
                    <!-- Trip Header -->
                    <div class="p-4 lg:p-5 cursor-pointer" onclick="toggleTrip(${trip.id})">
                        
                        <!-- Mobile Layout -->
                        <div class="lg:hidden">
                            <div class="flex gap-4">
                                <img src="${trip.image}" alt="${trip.name}" class="w-16 h-16 rounded-xl object-cover flex-shrink-0" />
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between gap-2 mb-2">
                                        <h3 class="font-semibold text-[#052734] text-sm leading-tight">${trip.name}</h3>
                                        <svg class="w-5 h-5 text-[#005991] flex-shrink-0 transition-transform duration-300 ${isExpanded ? 'rotate-180' : ''}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-wrap items-center gap-2 text-xs">
                                        <span class="inline-flex items-center gap-1 text-[#6D6E70]">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            ${trip.duration}
                                        </span>
                                        <span class="px-2 py-0.5 rounded-full text-xs font-medium ${getDifficultyColor(trip.difficulty)}">${trip.difficulty}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                                <div>
                                    <p class="text-xs text-[#6D6E70] mb-0.5">Starting from</p>
                                    <p class="text-lg font-bold text-[#052734]">${formatPrice(firstDeparture.price)}</p>
                                </div>
                                ${getAvailabilityBadge(firstDeparture.availability, firstDeparture.spots)}
                            </div>
                        </div>

                        <!-- Desktop Layout -->
                        <div class="hidden lg:grid lg:grid-cols-12 lg:gap-6 lg:items-center">
                            <div class="col-span-5">
                                <div class="flex items-center gap-4">
                                    <img src="${trip.image}" alt="${trip.name}" class="w-14 h-14 rounded-xl object-cover" />
                                    <div>
                                        <h3 class="font-semibold text-[#052734] mb-1">${trip.name}</h3>
                                        <div class="flex items-center gap-3 text-sm">
                                            <span class="inline-flex items-center gap-1 text-[#6D6E70]">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                ${trip.duration}
                                            </span>
                                            <span class="px-2 py-0.5 rounded-full text-xs font-medium ${getDifficultyColor(trip.difficulty)}">${trip.difficulty}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-span-3 text-center">
                                <p class="text-sm font-medium text-[#052734]">${firstDeparture.arrival}</p>
                                <p class="text-xs text-[#6D6E70]">${firstDeparture.days}</p>
                            </div>
                            
                            <div class="col-span-2 flex justify-center">
                                ${getAvailabilityBadge(firstDeparture.availability, firstDeparture.spots)}
                            </div>
                            
                            <div class="col-span-2 flex items-center justify-between">
                                <div class="text-center flex-1">
                                    <p class="text-lg font-bold text-[#052734]">${formatPrice(firstDeparture.price)}</p>
                                    <p class="text-xs text-[#6D6E70]">per person</p>
                                </div>
                                <svg class="w-5 h-5 text-[#005991] transition-transform duration-300 ${isExpanded ? 'rotate-180' : ''}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Expanded Content -->
                    ${isExpanded ? `
                        <div class="border-t border-gray-100 bg-[#4D8BB2]/5">
                            <div class="p-4 lg:p-5">
                                <p class="text-xs font-semibold text-[#6D6E70] uppercase tracking-wider mb-4">All Available Dates</p>
                                
                                <div class="space-y-3">
                                    ${trip.departures.map((dep, idx) => `
                                        <div class="bg-white rounded-xl p-4 border border-gray-200 hover:border-[#4D8BB2] transition-colors">
                                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                                <div class="flex items-center gap-4">
                                                    <div class="w-12 h-12 bg-gradient-to-br from-[#005991]/20 to-[#4D8BB2]/10 rounded-xl flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-[#005991]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-medium text-[#052734]">${dep.arrival} - ${dep.departure}</p>
                                                        <p class="text-sm text-[#6D6E70]">${dep.days}</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="flex items-center gap-4 sm:gap-6">
                                                    ${getAvailabilityBadge(dep.availability, dep.spots)}
                                                    <div class="text-right">
                                                        <p class="text-lg font-bold text-[#052734]">${formatPrice(dep.price)}</p>
                                                    </div>
                                                    <button class="bg-[#005991] hover:bg-[#052734] text-white font-medium py-2.5 px-5 rounded-xl transition-all duration-300 hover:shadow-lg text-sm whitespace-nowrap">
                                                        Book Now
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    `).join('')}
                                </div>
                                
                                <div class="mt-4 pt-4 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-3">
                                    <p class="text-sm text-[#6D6E70]">
                                        <svg class="w-4 h-4 inline mr-1 text-[#99c723]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                        Free cancellation up to 30 days before departure
                                    </p>
                                    <a href="#" class="text-[#99c723] hover:text-[#7a9e1c] font-medium text-sm flex items-center gap-1 transition-colors">
                                        View Full Itinerary
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    ` : ''}
                `;
                
                container.appendChild(tripElement);
            });
        }

        // Initial render
        renderTrips();
    </script>
</section>