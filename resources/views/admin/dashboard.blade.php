@extends('admin.layouts')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Welcome back, Admin! Here\'s what\'s happening today.')

@section('content')
<div id="dashboard" class="space-y-6">
    <!-- Quick Actions Bar -->
    <div class="flex flex-wrap gap-3 p-4 bg-gradient-to-r from-[#052734] to-[#005991] rounded-xl">
        <a href="{{ route('admin.bookings.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 hover:bg-white/20 text-white text-sm font-medium rounded-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            New Booking
        </a>
        <a href="{{ route('admin.treks.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 hover:bg-white/20 text-white text-sm font-medium rounded-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
            </svg>
            Add Trek
        </a>
        <a href="{{ route('admin.reviews.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 hover:bg-white/20 text-white text-sm font-medium rounded-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
            </svg>
            View Reviews
        </a>
        <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-[#99C723] hover:bg-[#8ab620] text-[#052734] text-sm font-semibold rounded-lg transition-all ml-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Generate Report
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
        <!-- Total Bookings -->
        <div class="group bg-white rounded-xl border border-gray-100 p-5 hover:shadow-lg hover:border-[#005991]/20 transition-all duration-300">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <p class="text-[#6D6E70] text-xs font-medium uppercase tracking-wider">Total Bookings</p>
                    <p class="text-2xl lg:text-3xl font-bold text-[#052734] mt-2">1,245</p>
                    <div class="flex items-center gap-1 mt-3">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-[#99C723]/10 text-[#99C723] text-xs font-semibold rounded-full">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            12%
                        </span>
                        <span class="text-[#6D6E70] text-xs hidden sm:inline">vs last month</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-[#005991]/10 rounded-xl flex items-center justify-center group-hover:bg-[#005991] group-hover:scale-110 transition-all duration-300">
                    <svg class="w-6 h-6 text-[#005991] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <!-- Mini sparkline -->
            <div class="flex items-end gap-0.5 mt-4 h-8">
                <div class="flex-1 bg-[#005991]/20 rounded-sm" style="height: 40%"></div>
                <div class="flex-1 bg-[#005991]/20 rounded-sm" style="height: 60%"></div>
                <div class="flex-1 bg-[#005991]/20 rounded-sm" style="height: 45%"></div>
                <div class="flex-1 bg-[#005991]/20 rounded-sm" style="height: 80%"></div>
                <div class="flex-1 bg-[#005991]/20 rounded-sm" style="height: 65%"></div>
                <div class="flex-1 bg-[#005991]/20 rounded-sm" style="height: 90%"></div>
                <div class="flex-1 bg-[#005991] rounded-sm" style="height: 100%"></div>
            </div>
        </div>

        <!-- Revenue -->
        <div class="group bg-white rounded-xl border border-gray-100 p-5 hover:shadow-lg hover:border-[#99C723]/20 transition-all duration-300">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <p class="text-[#6D6E70] text-xs font-medium uppercase tracking-wider">Revenue</p>
                    <p class="text-2xl lg:text-3xl font-bold text-[#052734] mt-2">$45.2K</p>
                    <div class="flex items-center gap-1 mt-3">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-[#99C723]/10 text-[#99C723] text-xs font-semibold rounded-full">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            8.5%
                        </span>
                        <span class="text-[#6D6E70] text-xs hidden sm:inline">vs last month</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-[#99C723]/10 rounded-xl flex items-center justify-center group-hover:bg-[#99C723] group-hover:scale-110 transition-all duration-300">
                    <svg class="w-6 h-6 text-[#99C723] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <!-- Mini sparkline -->
            <div class="flex items-end gap-0.5 mt-4 h-8">
                <div class="flex-1 bg-[#99C723]/20 rounded-sm" style="height: 50%"></div>
                <div class="flex-1 bg-[#99C723]/20 rounded-sm" style="height: 70%"></div>
                <div class="flex-1 bg-[#99C723]/20 rounded-sm" style="height: 55%"></div>
                <div class="flex-1 bg-[#99C723]/20 rounded-sm" style="height: 85%"></div>
                <div class="flex-1 bg-[#99C723]/20 rounded-sm" style="height: 75%"></div>
                <div class="flex-1 bg-[#99C723]/20 rounded-sm" style="height: 95%"></div>
                <div class="flex-1 bg-[#99C723] rounded-sm" style="height: 100%"></div>
            </div>
        </div>

        <!-- Active Tours -->
        <div class="group bg-white rounded-xl border border-gray-100 p-5 hover:shadow-lg hover:border-[#4D8BB2]/20 transition-all duration-300">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <p class="text-[#6D6E70] text-xs font-medium uppercase tracking-wider">Active Tours</p>
                    <p class="text-2xl lg:text-3xl font-bold text-[#052734] mt-2">24</p>
                    <div class="flex items-center gap-1 mt-3">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-[#005991]/10 text-[#005991] text-xs font-semibold rounded-full">
                            3 new
                        </span>
                        <span class="text-[#6D6E70] text-xs hidden sm:inline">this month</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-[#4D8BB2]/10 rounded-xl flex items-center justify-center group-hover:bg-[#4D8BB2] group-hover:scale-110 transition-all duration-300">
                    <svg class="w-6 h-6 text-[#4D8BB2] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                </div>
            </div>
            <!-- Active status dots -->
            <div class="flex items-center gap-2 mt-4">
                <div class="flex -space-x-1">
                    <span class="w-3 h-3 bg-[#99C723] rounded-full border-2 border-white"></span>
                    <span class="w-3 h-3 bg-[#99C723] rounded-full border-2 border-white"></span>
                    <span class="w-3 h-3 bg-[#99C723] rounded-full border-2 border-white"></span>
                    <span class="w-3 h-3 bg-[#005991] rounded-full border-2 border-white"></span>
                    <span class="w-3 h-3 bg-[#005991] rounded-full border-2 border-white"></span>
                </div>
                <span class="text-xs text-[#6D6E70]">5 departing soon</span>
            </div>
        </div>

        <!-- Customer Reviews -->
        <div class="group bg-white rounded-xl border border-gray-100 p-5 hover:shadow-lg hover:border-amber-200 transition-all duration-300">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <p class="text-[#6D6E70] text-xs font-medium uppercase tracking-wider">Reviews</p>
                    <p class="text-2xl lg:text-3xl font-bold text-[#052734] mt-2">487</p>
                    <div class="flex items-center gap-1 mt-3">
                        <div class="flex items-center">
                            @for($i = 0; $i < 5; $i++)
                            <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            @endfor
                        </div>
                        <span class="text-[#052734] text-sm font-bold">4.7</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center group-hover:bg-amber-400 group-hover:scale-110 transition-all duration-300">
                    <svg class="w-6 h-6 text-amber-500 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </div>
            </div>
            <!-- Review breakdown mini bar -->
            <div class="flex items-center gap-1 mt-4">
                <div class="flex-1 h-2 bg-[#99C723] rounded-full" style="flex: 4.7"></div>
                <div class="flex-1 h-2 bg-gray-200 rounded-full" style="flex: 0.3"></div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <!-- Recent Bookings - Takes 2 columns -->
        <div class="xl:col-span-2 bg-white rounded-xl border border-gray-100 overflow-hidden">
            <div class="flex items-center justify-between p-5 border-b border-gray-100">
                <div>
                    <h3 class="text-lg font-semibold text-[#052734]">Recent Bookings</h3>
                    <p class="text-sm text-[#6D6E70]">Latest customer reservations</p>
                </div>
                <a href="{{ route('admin.bookings.index') }}" class="inline-flex items-center gap-1 text-[#005991] hover:text-[#052734] text-sm font-medium transition-colors">
                    View All
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            
            <div class="divide-y divide-gray-50">
                <!-- Booking Item 1 -->
                <div class="p-4 hover:bg-gray-50/50 transition-colors group">
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <img src="/placeholder.svg?height=48&width=48" alt="Trek" class="w-12 h-12 rounded-lg object-cover">
                            <span class="absolute -bottom-1 -right-1 w-5 h-5 bg-[#99C723] rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2">
                                <h4 class="font-semibold text-[#052734] truncate">Everest Base Camp</h4>
                                <span class="px-2 py-0.5 bg-[#99C723]/10 text-[#99C723] text-xs font-medium rounded-full">Confirmed</span>
                            </div>
                            <div class="flex items-center gap-3 mt-1 text-sm text-[#6D6E70]">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    John Doe
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Dec 20, 2024
                                </span>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-[#052734]">$2,500</p>
                            <p class="text-xs text-[#6D6E70]">2 travelers</p>
                        </div>
                    </div>
                </div>

                <!-- Booking Item 2 -->
                <div class="p-4 hover:bg-gray-50/50 transition-colors group">
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <img src="/placeholder.svg?height=48&width=48" alt="Trek" class="w-12 h-12 rounded-lg object-cover">
                            <span class="absolute -bottom-1 -right-1 w-5 h-5 bg-amber-400 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2">
                                <h4 class="font-semibold text-[#052734] truncate">Annapurna Circuit</h4>
                                <span class="px-2 py-0.5 bg-amber-100 text-amber-700 text-xs font-medium rounded-full">Pending</span>
                            </div>
                            <div class="flex items-center gap-3 mt-1 text-sm text-[#6D6E70]">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Jane Smith
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Dec 18, 2024
                                </span>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-[#052734]">$1,800</p>
                            <p class="text-xs text-[#6D6E70]">1 traveler</p>
                        </div>
                    </div>
                </div>

                <!-- Booking Item 3 -->
                <div class="p-4 hover:bg-gray-50/50 transition-colors group">
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <img src="/placeholder.svg?height=48&width=48" alt="Trek" class="w-12 h-12 rounded-lg object-cover">
                            <span class="absolute -bottom-1 -right-1 w-5 h-5 bg-[#005991] rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2">
                                <h4 class="font-semibold text-[#052734] truncate">Manaslu Trek</h4>
                                <span class="px-2 py-0.5 bg-[#005991]/10 text-[#005991] text-xs font-medium rounded-full">Completed</span>
                            </div>
                            <div class="flex items-center gap-3 mt-1 text-sm text-[#6D6E70]">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Mike Johnson
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Dec 15, 2024
                                </span>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-[#052734]">$2,200</p>
                            <p class="text-xs text-[#6D6E70]">3 travelers</p>
                        </div>
                    </div>
                </div>

                <!-- Booking Item 4 -->
                <div class="p-4 hover:bg-gray-50/50 transition-colors group">
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <img src="/placeholder.svg?height=48&width=48" alt="Trek" class="w-12 h-12 rounded-lg object-cover">
                            <span class="absolute -bottom-1 -right-1 w-5 h-5 bg-[#C9302C] rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2">
                                <h4 class="font-semibold text-[#052734] truncate">Langtang Valley</h4>
                                <span class="px-2 py-0.5 bg-[#C9302C]/10 text-[#C9302C] text-xs font-medium rounded-full">Cancelled</span>
                            </div>
                            <div class="flex items-center gap-3 mt-1 text-sm text-[#6D6E70]">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Sarah Wilson
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Dec 12, 2024
                                </span>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-[#052734] line-through opacity-50">$1,500</p>
                            <p class="text-xs text-[#C9302C]">Refunded</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Column -->
        <div class="space-y-6">
            <!-- Top Rated Tours -->
            <div class="bg-white rounded-xl border border-gray-100 p-5">
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-lg font-semibold text-[#052734]">Top Rated Tours</h3>
                    <span class="text-xs text-[#6D6E70]">This month</span>
                </div>
                
                <div class="space-y-4">
                    <!-- Tour 1 -->
                    <div class="group cursor-pointer">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="w-6 h-6 bg-[#005991] text-white text-xs font-bold rounded-full flex items-center justify-center">1</span>
                            <span class="font-medium text-[#052734] group-hover:text-[#005991] transition-colors flex-1">Khumbu Trek</span>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="text-sm font-bold text-[#052734]">4.9</span>
                            </div>
                        </div>
                        <div class="ml-9">
                            <div class="w-full bg-gray-100 rounded-full h-1.5 overflow-hidden">
                                <div class="bg-gradient-to-r from-[#005991] to-[#4D8BB2] h-full rounded-full transition-all duration-500" style="width: 98%"></div>
                            </div>
                            <div class="flex justify-between mt-1">
                                <span class="text-xs text-[#6D6E70]">156 reviews</span>
                                <span class="text-xs font-medium text-[#99C723]">98% positive</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tour 2 -->
                    <div class="group cursor-pointer">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="w-6 h-6 bg-[#4D8BB2] text-white text-xs font-bold rounded-full flex items-center justify-center">2</span>
                            <span class="font-medium text-[#052734] group-hover:text-[#005991] transition-colors flex-1">Poon Hill Trek</span>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="text-sm font-bold text-[#052734]">4.8</span>
                            </div>
                        </div>
                        <div class="ml-9">
                            <div class="w-full bg-gray-100 rounded-full h-1.5 overflow-hidden">
                                <div class="bg-gradient-to-r from-[#99C723] to-[#b8e030] h-full rounded-full transition-all duration-500" style="width: 96%"></div>
                            </div>
                            <div class="flex justify-between mt-1">
                                <span class="text-xs text-[#6D6E70]">142 reviews</span>
                                <span class="text-xs font-medium text-[#99C723]">96% positive</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tour 3 -->
                    <div class="group cursor-pointer">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="w-6 h-6 bg-[#6D6E70] text-white text-xs font-bold rounded-full flex items-center justify-center">3</span>
                            <span class="font-medium text-[#052734] group-hover:text-[#005991] transition-colors flex-1">Langtang Trek</span>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="text-sm font-bold text-[#052734]">4.7</span>
                            </div>
                        </div>
                        <div class="ml-9">
                            <div class="w-full bg-gray-100 rounded-full h-1.5 overflow-hidden">
                                <div class="bg-gradient-to-r from-[#052734] to-[#0a4a63] h-full rounded-full transition-all duration-500" style="width: 94%"></div>
                            </div>
                            <div class="flex justify-between mt-1">
                                <span class="text-xs text-[#6D6E70]">98 reviews</span>
                                <span class="text-xs font-medium text-[#99C723]">94% positive</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Departures -->
            <div class="bg-white rounded-xl border border-gray-100 p-5">
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-lg font-semibold text-[#052734]">Upcoming Departures</h3>
                    <span class="px-2 py-1 bg-[#C9302C]/10 text-[#C9302C] text-xs font-medium rounded-full">5 trips</span>
                </div>
                
                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-[#005991]/5 transition-colors">
                        <div class="w-10 h-10 bg-[#005991] rounded-lg flex flex-col items-center justify-center text-white">
                            <span class="text-xs font-bold leading-none">22</span>
                            <span class="text-[10px] leading-none">DEC</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-[#052734] text-sm truncate">Everest Base Camp</p>
                            <p class="text-xs text-[#6D6E70]">8 travelers</p>
                        </div>
                        <span class="px-2 py-1 bg-[#99C723]/10 text-[#99C723] text-xs font-medium rounded">Ready</span>
                    </div>

                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-[#005991]/5 transition-colors">
                        <div class="w-10 h-10 bg-[#4D8BB2] rounded-lg flex flex-col items-center justify-center text-white">
                            <span class="text-xs font-bold leading-none">25</span>
                            <span class="text-[10px] leading-none">DEC</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-[#052734] text-sm truncate">Annapurna Circuit</p>
                            <p class="text-xs text-[#6D6E70]">5 travelers</p>
                        </div>
                        <span class="px-2 py-1 bg-amber-100 text-amber-700 text-xs font-medium rounded">Pending</span>
                    </div>

                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-[#005991]/5 transition-colors">
                        <div class="w-10 h-10 bg-[#99C723] rounded-lg flex flex-col items-center justify-center text-white">
                            <span class="text-xs font-bold leading-none">28</span>
                            <span class="text-[10px] leading-none">DEC</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-[#052734] text-sm truncate">Manaslu Trek</p>
                            <p class="text-xs text-[#6D6E70]">12 travelers</p>
                        </div>
                        <span class="px-2 py-1 bg-[#99C723]/10 text-[#99C723] text-xs font-medium rounded">Ready</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="bg-white rounded-xl border border-gray-100 p-5 lg:p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div>
                <h3 class="text-lg font-semibold text-[#052734]">Monthly Booking Trends</h3>
                <p class="text-sm text-[#6D6E70]">Booking volume over the past 12 months</p>
            </div>
            <div class="inline-flex rounded-lg border border-gray-200 p-1 bg-gray-50">
                <button class="px-4 py-1.5 text-sm font-medium text-white bg-[#005991] rounded-md shadow-sm transition-all">This Year</button>
                <button class="px-4 py-1.5 text-sm font-medium text-[#6D6E70] hover:text-[#005991] rounded-md transition-all">Last Year</button>
            </div>
        </div>
        
        <!-- Chart -->
        <div class="relative">
            <div class="flex items-end gap-2 lg:gap-3 h-64">
                <!-- Y-axis labels -->
                <div class="hidden sm:flex flex-col justify-between h-full text-xs text-[#6D6E70] pr-2 py-1">
                    <span>200</span>
                    <span>150</span>
                    <span>100</span>
                    <span>50</span>
                    <span>0</span>
                </div>
                
                <!-- Chart bars -->
                <div class="flex-1 flex items-end gap-1 sm:gap-2">
                    @php
                    $months = [
                        ['name' => 'Jan', 'height' => 80, 'value' => 160],
                        ['name' => 'Feb', 'height' => 65, 'value' => 130],
                        ['name' => 'Mar', 'height' => 50, 'value' => 100],
                        ['name' => 'Apr', 'height' => 70, 'value' => 140],
                        ['name' => 'May', 'height' => 90, 'value' => 180],
                        ['name' => 'Jun', 'height' => 100, 'value' => 200, 'peak' => true],
                        ['name' => 'Jul', 'height' => 95, 'value' => 190],
                        ['name' => 'Aug', 'height' => 85, 'value' => 170],
                        ['name' => 'Sep', 'height' => 75, 'value' => 150],
                        ['name' => 'Oct', 'height' => 60, 'value' => 120],
                        ['name' => 'Nov', 'height' => 55, 'value' => 110],
                        ['name' => 'Dec', 'height' => 40, 'value' => 80],
                    ];
                    @endphp
                    
                    @foreach($months as $month)
                    <div class="flex flex-col items-center flex-1 group relative">
                        <!-- Tooltip -->
                        <div class="absolute -top-10 left-1/2 -translate-x-1/2 px-2 py-1 bg-[#052734] text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            {{ $month['value'] }} bookings
                        </div>
                        <div class="w-full max-w-[40px] rounded-t-md transition-all duration-300 group-hover:opacity-80 {{ isset($month['peak']) ? 'bg-gradient-to-t from-[#99C723] to-[#b8e030]' : 'bg-gradient-to-t from-[#005991] to-[#4D8BB2]' }}" style="height: {{ $month['height'] }}%;"></div>
                        <span class="text-[10px] sm:text-xs text-[#6D6E70] mt-2">{{ $month['name'] }}</span>
                        @if(isset($month['peak']))
                        <span class="text-[10px] font-medium text-[#99C723] mt-0.5">Peak</span>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Chart Legend -->
            <div class="flex items-center justify-center gap-6 mt-6 pt-4 border-t border-gray-100">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-sm bg-gradient-to-r from-[#005991] to-[#4D8BB2]"></span>
                    <span class="text-xs text-[#6D6E70]">Regular Season</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-sm bg-gradient-to-r from-[#99C723] to-[#b8e030]"></span>
                    <span class="text-xs text-[#6D6E70]">Peak Season</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Row: Recent Reviews & Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Reviews -->
        <div class="bg-white rounded-xl border border-gray-100 p-5">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-lg font-semibold text-[#052734]">Recent Reviews</h3>
                <a href="{{ route('admin.reviews.index') }}" class="text-[#005991] hover:text-[#052734] text-sm font-medium transition-colors">View All</a>
            </div>
            
            <div class="space-y-4">
                <div class="p-4 bg-gray-50 rounded-lg hover:bg-[#99C723]/5 transition-colors">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-[#005991] rounded-full flex items-center justify-center text-white font-semibold text-sm flex-shrink-0">
                            JD
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-2">
                                <h4 class="font-medium text-[#052734] text-sm">John Doe</h4>
                                <div class="flex items-center gap-0.5">
                                    @for($i = 0; $i < 5; $i++)
                                    <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    @endfor
                                </div>
                            </div>
                            <p class="text-xs text-[#6D6E70] mt-0.5">Everest Base Camp</p>
                            <p class="text-sm text-[#052734] mt-2 line-clamp-2">"Absolutely incredible experience! The guides were professional and the views were breathtaking."</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 bg-gray-50 rounded-lg hover:bg-[#99C723]/5 transition-colors">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-[#4D8BB2] rounded-full flex items-center justify-center text-white font-semibold text-sm flex-shrink-0">
                            SM
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-2">
                                <h4 class="font-medium text-[#052734] text-sm">Sarah Miller</h4>
                                <div class="flex items-center gap-0.5">
                                    @for($i = 0; $i < 4; $i++)
                                    <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    @endfor
                                    <svg class="w-3.5 h-3.5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="text-xs text-[#6D6E70] mt-0.5">Poon Hill Trek</p>
                            <p class="text-sm text-[#052734] mt-2 line-clamp-2">"Great trek for beginners. Beautiful sunrise views but accommodation could be better."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-xl border border-gray-100 p-5">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-lg font-semibold text-[#052734]">Recent Activity</h3>
                <span class="text-xs text-[#6D6E70]">Last 24 hours</span>
            </div>
            
            <div class="relative">
                <!-- Timeline line -->
                <div class="absolute left-[18px] top-2 bottom-2 w-0.5 bg-gray-100"></div>
                
                <div class="space-y-4">
                    <div class="flex gap-4 relative">
                        <div class="w-9 h-9 bg-[#99C723] rounded-full flex items-center justify-center z-10 flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <div class="flex-1 pb-4">
                            <p class="text-sm text-[#052734]"><span class="font-medium">New booking</span> received for Everest Base Camp</p>
                            <p class="text-xs text-[#6D6E70] mt-1">2 hours ago</p>
                        </div>
                    </div>

                    <div class="flex gap-4 relative">
                        <div class="w-9 h-9 bg-[#005991] rounded-full flex items-center justify-center z-10 flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <div class="flex-1 pb-4">
                            <p class="text-sm text-[#052734]"><span class="font-medium">New review</span> submitted by John Doe</p>
                            <p class="text-xs text-[#6D6E70] mt-1">4 hours ago</p>
                        </div>
                    </div>

                    <div class="flex gap-4 relative">
                        <div class="w-9 h-9 bg-amber-400 rounded-full flex items-center justify-center z-10 flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1 pb-4">
                            <p class="text-sm text-[#052734]"><span class="font-medium">Payment received</span> - $2,500 from Jane Smith</p>
                            <p class="text-xs text-[#6D6E70] mt-1">6 hours ago</p>
                        </div>
                    </div>

                    <div class="flex gap-4 relative">
                        <div class="w-9 h-9 bg-[#C9302C] rounded-full flex items-center justify-center z-10 flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-[#052734]"><span class="font-medium">Booking cancelled</span> by Sarah Wilson</p>
                            <p class="text-xs text-[#6D6E70] mt-1">8 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
