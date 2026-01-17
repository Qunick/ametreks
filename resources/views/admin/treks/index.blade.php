@extends('admin.layouts')

@section('title', 'Manage Tours & Treks')

@section('content')
<div x-data="toursManager()" class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold" style="color: #052734;">Tours & Treks</h1>
            <p class="text-sm mt-1" style="color: #6D6E70;">Create, edit, and manage your trekking tours</p>
        </div>
        <a href="{{ route('admin.treks.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-white font-medium rounded-lg transition-all hover:opacity-90 shadow-lg hover:shadow-xl" style="background-color: #005991;">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            New Tour
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(0, 89, 145, 0.1);">
                    <svg class="w-5 h-5" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Total Tours</p>
                    <p class="text-xl font-bold" style="color: #052734;">{{ $stats['total'] ?? 48 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(153, 199, 35, 0.1);">
                    <svg class="w-5 h-5" style="color: #99C723;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Active Tours</p>
                    <p class="text-xl font-bold" style="color: #99C723;">{{ $stats['active'] ?? 36 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(77, 139, 178, 0.1);">
                    <svg class="w-5 h-5" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Total Bookings</p>
                    <p class="text-xl font-bold" style="color: #4D8BB2;">{{ $stats['bookings'] ?? 324 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(201, 48, 44, 0.1);">
                    <svg class="w-5 h-5" style="color: #C9302C;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Upcoming Departures</p>
                    <p class="text-xl font-bold" style="color: #C9302C;">{{ $stats['departures'] ?? 12 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters & Search -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex flex-col lg:flex-row lg:items-center gap-4">
            <!-- Search -->
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5" style="color: #6D6E70;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" x-model="searchQuery" placeholder="Search by tour name, region, difficulty..." class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 text-sm" style="--tw-ring-color: #005991;">
            </div>
            
            <!-- Region Filter -->
            <div>
                <select x-model="selectedRegion" class="px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 w-full lg:w-auto" style="--tw-ring-color: #005991; color: #052734;">
                    <option value="">All Regions</option>
                    <option value="everest">Everest Region</option>
                    <option value="annapurna">Annapurna Region</option>
                    <option value="langtang">Langtang Region</option>
                    <option value="manaslu">Manaslu Region</option>
                    <option value="mustang">Upper Mustang</option>
                </select>
            </div>

            <!-- Difficulty Filter -->
            <div>
                <select x-model="selectedDifficulty" class="px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 w-full lg:w-auto" style="--tw-ring-color: #005991; color: #052734;">
                    <option value="">All Difficulty</option>
                    <option value="easy">Easy</option>
                    <option value="moderate">Moderate</option>
                    <option value="difficult">Difficult</option>
                    <option value="challenging">Challenging</option>
                </select>
            </div>

            <!-- Status Filter -->
            <div class="flex flex-wrap gap-2">
                <template x-for="status in statuses" :key="status.value">
                    <button @click="activeStatus = status.value" :class="activeStatus === status.value ? 'text-white' : 'bg-gray-100 hover:bg-gray-200'" :style="activeStatus === status.value ? 'background-color: ' + status.color : 'color: #052734'" class="px-4 py-2 rounded-lg text-sm font-medium transition-all">
                        <span x-text="status.label"></span>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Tours Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead style="background-color: #052734;">
                    <tr>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Tour Details</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Duration</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Price</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Status</th>
                        <th class="text-center text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php
                        $sampleTours = $treks ?? collect([
                            (object)[
                                'id' => 1,
                                'title' => 'Everest Base Camp Trek',
                                'region' => 'Everest Region',
                                'difficulty' => 'challenging',
                                'difficulty_label' => 'Challenging',
                                'duration_days' => 14,
                                'base_price' => 2500,
                                'sale_price' => 2200,
                                'currency' => '$',
                                'is_active' => true,
                                'bookings_count' => 42,
                                'tags' => collect(['Adventure', 'Himalayan', 'Classic'])
                            ],
                            (object)[
                                'id' => 2,
                                'title' => 'Annapurna Circuit Trek',
                                'region' => 'Annapurna Region',
                                'difficulty' => 'difficult',
                                'difficulty_label' => 'Difficult',
                                'duration_days' => 18,
                                'base_price' => 1800,
                                'sale_price' => null,
                                'currency' => '$',
                                'is_active' => true,
                                'bookings_count' => 28,
                                'tags' => collect(['Cultural', 'Mountain', 'Tea Houses'])
                            ],
                            (object)[
                                'id' => 3,
                                'title' => 'Langtang Valley Trek',
                                'region' => 'Langtang Region',
                                'difficulty' => 'moderate',
                                'difficulty_label' => 'Moderate',
                                'duration_days' => 10,
                                'base_price' => 1200,
                                'sale_price' => 1050,
                                'currency' => '$',
                                'is_active' => true,
                                'bookings_count' => 15,
                                'tags' => collect(['Valley', 'Scenic', 'Less Crowded'])
                            ],
                            (object)[
                                'id' => 4,
                                'title' => 'Upper Mustang Trek',
                                'region' => 'Mustang Region',
                                'difficulty' => 'moderate',
                                'difficulty_label' => 'Moderate',
                                'duration_days' => 16,
                                'base_price' => 3200,
                                'sale_price' => 2900,
                                'currency' => '$',
                                'is_active' => false,
                                'bookings_count' => 8,
                                'tags' => collect(['Restricted', 'Desert', 'Cultural'])
                            ],
                            (object)[
                                'id' => 5,
                                'title' => 'Manaslu Circuit Trek',
                                'region' => 'Manaslu Region',
                                'difficulty' => 'difficult',
                                'difficulty_label' => 'Difficult',
                                'duration_days' => 21,
                                'base_price' => 2800,
                                'sale_price' => null,
                                'currency' => '$',
                                'is_active' => true,
                                'bookings_count' => 12,
                                'tags' => collect(['Remote', 'Camping', 'Wilderness'])
                            ]
                        ]);
                    @endphp

                    @forelse($treks as $tour)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0">
                                    <div class="w-16 h-16 rounded-lg flex items-center justify-center shadow-sm" style="background-color: rgba(0, 89, 145, 0.1);">
                                        <svg class="w-8 h-8" style="color: #005991;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18 10L15 11.5L11 8.5L10 14L13.5 17L14 21.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M18 8.5V10V21.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10 17L8 21.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.5 8.5C7 9.5 6 12 6 12L8 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 6.5C13.1046 6.5 14 5.60457 14 4.5C14 3.39543 13.1046 2.5 12 2.5C10.8954 2.5 10 3.39543 10 4.5C10 5.60457 10.8954 6.5 12 6.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    @if($tour->bookings_count > 0)
                                    <div class="absolute -bottom-2 -right-2 bg-[#99C723] text-white text-xs px-2 py-1 rounded-full shadow-sm">
                                        {{ $tour->bookings_count }} booked
                                    </div>
                                    @endif
                                </div>
                                
                                <div>
                                    <p class="text-sm font-medium" style="color: #052734;">{{ $tour->title }}</p>
                                    <div class="flex items-center gap-2 mt-2">
                                        <span class="inline-flex items-center gap-1 px-2 py-1 rounded text-xs font-medium" style="background-color: rgba(77, 139, 178, 0.1); color: #4D8BB2;">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            {{ $tour->region }}
                                        </span>
                                        <span class="inline-flex items-center gap-1 px-2 py-1 rounded text-xs font-medium capitalize"
                                            style="@if($tour->difficulty === 'easy') background-color: rgba(72, 187, 120, 0.1); color: #48BB78;
                                                   @elseif($tour->difficulty === 'moderate') background-color: rgba(237, 137, 54, 0.1); color: #ED8936;
                                                   @elseif($tour->difficulty === 'difficult') background-color: rgba(245, 101, 101, 0.1); color: #F56565;
                                                   @else background-color: rgba(159, 122, 234, 0.1); color: #9F7AEA;
                                                   @endif">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                            </svg>
                                            {{ $tour->difficulty_label }}
                                        </span>
                                    </div>
                                    <div class="flex flex-wrap gap-1 mt-2">
                                        @foreach($tour->tags->take(3) as $tag)
                                        <span class="text-xs px-2 py-1 rounded-full" style="background-color: rgba(0, 89, 145, 0.1); color: #005991;">
                                            {{ $tag->name }}
                                        </span>
                                        @endforeach
                                        @if($tour->tags->count() > 3)
                                        <span class="text-xs px-2 py-1 rounded-full" style="background-color: rgba(109, 110, 112, 0.1); color: #6D6E70;">
                                            +{{ $tour->tags->count() - 3 }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" style="color: #6D6E70;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm font-medium" style="color: #052734;">{{ $tour->duration_days }} days</span>
                            </div>
                        </td>
                        
                        <td class="px-6 py-4">
                            <div>
                                @if($tour->sale_price)
                                <p class="text-sm font-bold" style="color: #99C723;">{{ $tour->currency }}{{ number_format($tour->sale_price) }}</p>
                                <p class="text-xs line-through" style="color: #6D6E70;">{{ $tour->currency }}{{ number_format($tour->base_price) }}</p>
                                @else
                                <p class="text-sm font-bold" style="color: #052734;">{{ $tour->currency }}{{ number_format($tour->base_price) }}</p>
                                <p class="text-xs" style="color: #6D6E70;">Base price</p>
                                @endif
                            </div>
                        </td>
                        
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <form action="{{ route('admin.treks.toggle', $tour->id) }}" method="POST" class="m-0">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="relative inline-flex items-center cursor-pointer">
                                        <div class="w-10 h-5 flex items-center rounded-full p-0.5 transition-all duration-300 {{ $tour->is_active ? 'bg-[#99C723]' : 'bg-gray-300' }}">
                                            <div class="bg-white w-4 h-4 rounded-full shadow transform transition-transform duration-300 {{ $tour->is_active ? 'translate-x-5' : '' }}"></div>
                                        </div>
                                    </button>
                                </form>
                                <span class="text-sm font-medium {{ $tour->is_active ? 'text-[#99C723]' : 'text-gray-500' }}">
                                    {{ $tour->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </td>
                        
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-1">
                                <a href="{{ route('admin.treks.edit', $tour->id) }}" class="p-2 rounded-lg hover:bg-gray-100 transition-colors" title="Edit Tour">
                                    <svg class="w-4 h-4" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                
                                <!-- Dropdown Menu -->
                                <div class="relative group">
                                    <button class="p-2 rounded-lg hover:bg-gray-100 transition-colors" title="More Options">
                                        <svg class="w-4 h-4" style="color: #6D6E70;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                        </svg>
                                    </button>
                                    
                                    <div class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                        <div class="p-2">
                                            <a href="{{ route('admin.treks.tags', $tour->id) }}" class="flex items-center gap-3 px-3 py-2.5 text-sm rounded-lg hover:bg-gray-50 transition-colors" style="color: #052734;">
                                                <svg class="w-4 h-4" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                                </svg>
                                                Add/Edit Tags
                                            </a>
                                            
                                            <a href="{{ route('admin.treks.itinerary', $tour->id) }}" class="flex items-center gap-3 px-3 py-2.5 text-sm rounded-lg hover:bg-gray-50 transition-colors" style="color: #052734;">
                                                <svg class="w-4 h-4" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                                Add Itinerary
                                            </a>
                                            
                                            <a href="{{ route('admin.treks.departures', $tour->id) }}" class="flex items-center gap-3 px-3 py-2.5 text-sm rounded-lg hover:bg-gray-50 transition-colors" style="color: #052734;">
                                                <svg class="w-4 h-4" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                Departure Dates
                                            </a>
                                            
                                            <a href="{{ route('admin.treks.inclusions', $tour->id) }}" class="flex items-center gap-3 px-3 py-2.5 text-sm rounded-lg hover:bg-gray-50 transition-colors" style="color: #052734;">
                                                <svg class="w-4 h-4" style="color: #99C723;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                                Trip Inclusions
                                            </a>
                                            
                                            <a href="{{ route('admin.treks.exclusions', $tour->id) }}" class="flex items-center gap-3 px-3 py 2.5 text-sm rounded-lg hover:bg-gray-50 transition-colors" style="color: #052734;">
                                                <svg class="w-4 h-4" style="color: #C9302C;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                                Trip Exclusions
                                            </a>

                                            <a href="{{ route('admin.treks.faq', $tour->id) }}" class="flex items-center gap-3 px-3 py-2.5 text-sm rounded-lg hover:bg-gray-50 transition-colors" style="color: #052734;">
                                                <svg class="w-4 h-4" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                FAQs
                                            </a>
                                            
                                            <hr class="my-2 border-gray-100">
                                            
                                            <form action="{{ route('admin.treks.destroy', $tour->id) }}" method="POST" class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this tour?')" class="flex items-center gap-3 w-full px-3 py-2.5 text-sm rounded-lg hover:bg-red-50 transition-colors" style="color: #C9302C;">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    Delete Tour
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-16 h-16 rounded-full flex items-center justify-center mb-4" style="background-color: rgba(0, 89, 145, 0.1);">
                                    <svg class="w-8 h-8" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                                <p class="text-lg font-semibold text-gray-500">No tours found</p>
                                <p class="text-sm text-gray-400 mt-1">Start by creating your first trekking tour</p>
                                <a href="{{ route('admin.treks.create') }}" class="mt-4 inline-flex items-center gap-2 px-4 py-2.5 text-white font-medium rounded-lg transition-all hover:opacity-90" style="background-color: #005991;">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Create New Tour
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-white rounded-xl shadow-sm border border-gray-100 px-6 py-4">
        <p class="text-sm" style="color: #6D6E70;">Showing <span class="font-semibold" style="color: #052734;">1-5</span> of <span class="font-semibold" style="color: #052734;">48</span> tours</p>
        <div class="flex items-center gap-2">
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors disabled:opacity-50" style="color: #052734;" disabled>
                Previous
            </button>
            <button class="px-3 py-2 rounded-lg text-sm font-medium text-white" style="background-color: #005991;">1</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">2</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">3</button>
            <span style="color: #6D6E70;">...</span>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">10</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">
                Next
            </button>
        </div>
    </div>
</div>

<script>
function toursManager() {
    return {
        searchQuery: '',
        activeStatus: 'all',
        selectedRegion: '',
        selectedDifficulty: '',
        statuses: [
            { value: 'all', label: 'All', color: '#005991' },
            { value: 'active', label: 'Active', color: '#99C723' },
            { value: 'inactive', label: 'Inactive', color: '#C9302C' }
        ],
        
        // Function to toggle tour status
        toggleTourStatus(tourId) {
            console.log('Toggle tour status:', tourId);
            // In real app, send API request to toggle status
        },
        
        // Function to delete tour
        deleteTour(tourId) {
            if (confirm('Are you sure you want to delete this tour?')) {
                console.log('Delete tour:', tourId);
                // In real app, send API request to delete
            }
        }
    }
}
</script>
@endsection