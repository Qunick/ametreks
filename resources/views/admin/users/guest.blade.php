@extends('admin.layouts')

@section('title', 'Manage Users - Guest Users')

@section('content')
<div x-data="guestUsersManager()" class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold" style="color: #052734;">Guest Users</h1>
            <p class="text-sm mt-1" style="color: #6D6E70;">Manage guest inquiries and non-registered users</p>
        </div>
        <div class="flex items-center gap-3">
            <button @click="exportGuests()" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 border border-gray-300 rounded-lg font-medium transition-all hover:bg-gray-50" style="color: #052734;">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                </svg>
                Export CSV
            </button>
            <button @click="openAddGuestDrawer()" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-white font-medium rounded-lg transition-all hover:opacity-90 shadow-lg hover:shadow-xl" style="background-color: #005991;">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add Guest
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(0, 89, 145, 0.1);">
                    <svg class="w-5 h-5" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Total Guests</p>
                    <p class="text-xl font-bold" style="color: #052734;">{{ $stats['total'] ?? 2450 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(153, 199, 35, 0.1);">
                    <svg class="w-5 h-5" style="color: #99C723;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Recent Inquiries</p>
                    <p class="text-xl font-bold" style="color: #99C723;">{{ $stats['recent_inquiries'] ?? 124 }}</p>
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
                    <p class="text-xs font-medium" style="color: #6D6E70;">Converted to Users</p>
                    <p class="text-xl font-bold" style="color: #4D8BB2;">{{ $stats['converted'] ?? 320 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(255, 193, 7, 0.1);">
                    <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Pending Follow-up</p>
                    <p class="text-xl font-bold text-yellow-600">{{ $stats['pending_followup'] ?? 56 }}</p>
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
                <input type="text" x-model="searchQuery" placeholder="Search by name, email, phone..." class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 text-sm" style="--tw-ring-color: #005991;">
            </div>
            
            <!-- Status Filter -->
            <div class="flex flex-wrap gap-2">
                <template x-for="status in statuses" :key="status.value">
                    <button @click="activeStatus = status.value" :class="activeStatus === status.value ? 'text-white' : 'bg-gray-100 hover:bg-gray-200'" :style="activeStatus === status.value ? 'background-color: ' + status.color : 'color: #052734'" class="px-4 py-2 rounded-lg text-sm font-medium transition-all">
                        <span x-text="status.label"></span>
                    </button>
                </template>
            </div>

            <!-- Inquiry Type Filter -->
            <div>
                <select x-model="selectedInquiryType" class="px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 w-full lg:w-auto" style="--tw-ring-color: #005991; color: #052734;">
                    <option value="">All Inquiries</option>
                    <option value="trek_info">Trek Information</option>
                    <option value="booking">Booking Inquiry</option>
                    <option value="custom">Custom Trek</option>
                    <option value="general">General Question</option>
                    <option value="partnership">Partnership</option>
                </select>
            </div>

            <!-- Date Range -->
            <div class="flex items-center gap-2">
                <input type="date" x-model="dateFrom" class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
                <span style="color: #6D6E70;">to</span>
                <input type="date" x-model="dateTo" class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
            </div>
        </div>
    </div>

    <!-- Guest Users Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead style="background-color: #052734;">
                    <tr>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Guest</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Contact</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Inquiry Type</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Date</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Source</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Status</th>
                        <th class="text-center text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php
                        $sampleGuests = $guests ?? collect([
                            (object)[
                                'id' => 1,
                                'name' => 'David Wilson',
                                'email' => 'david.w@email.com',
                                'phone' => '+1 555 123 4567',
                                'avatar_color' => '#4D8BB2',
                                'inquiry_type' => 'trek_info',
                                'inquiry_label' => 'Trek Information',
                                'inquiry_message' => 'Interested in Everest Base Camp trek for April 2024',
                                'date' => '2 hours ago',
                                'source' => 'Website Form',
                                'status' => 'new',
                                'priority' => 'high'
                            ],
                            (object)[
                                'id' => 2,
                                'name' => 'Jennifer Lee',
                                'email' => 'jennifer.lee@email.com',
                                'phone' => '+44 7890 123456',
                                'avatar_color' => '#005991',
                                'inquiry_type' => 'booking',
                                'inquiry_label' => 'Booking Inquiry',
                                'inquiry_message' => 'Looking for private Annapurna Circuit trek for 4 people',
                                'date' => '1 day ago',
                                'source' => 'Email',
                                'status' => 'contacted',
                                'priority' => 'medium'
                            ],
                            (object)[
                                'id' => 3,
                                'name' => 'Thomas Brown',
                                'email' => 'thomas.b@email.com',
                                'phone' => '+61 412 345 678',
                                'avatar_color' => '#99C723',
                                'inquiry_type' => 'custom',
                                'inquiry_label' => 'Custom Trek',
                                'inquiry_message' => 'Want to customize Langtang Valley trek with photography focus',
                                'date' => '3 days ago',
                                'source' => 'Phone Call',
                                'status' => 'in_progress',
                                'priority' => 'high'
                            ],
                            (object)[
                                'id' => 4,
                                'name' => 'Maria Garcia',
                                'email' => 'maria.g@email.com',
                                'phone' => '+34 600 123 456',
                                'avatar_color' => '#C9302C',
                                'inquiry_type' => 'general',
                                'inquiry_label' => 'General Question',
                                'inquiry_message' => 'Question about required documents for trekking in Nepal',
                                'date' => '1 week ago',
                                'source' => 'WhatsApp',
                                'status' => 'converted',
                                'priority' => 'low'
                            ],
                            (object)[
                                'id' => 5,
                                'name' => 'Kenji Tanaka',
                                'email' => 'kenji.t@email.com',
                                'phone' => '+81 90 1234 5678',
                                'avatar_color' => '#4D8BB2',
                                'inquiry_type' => 'partnership',
                                'inquiry_label' => 'Partnership',
                                'inquiry_message' => 'Travel agency looking for partnership opportunities',
                                'date' => '2 weeks ago',
                                'source' => 'Referral',
                                'status' => 'closed',
                                'priority' => 'medium'
                            ],
                            (object)[
                                'id' => 6,
                                'name' => 'Sophie Martin',
                                'email' => 'sophie.m@email.com',
                                'phone' => '+33 6 12 34 56 78',
                                'avatar_color' => '#005991',
                                'inquiry_type' => 'booking',
                                'inquiry_label' => 'Booking Inquiry',
                                'inquiry_message' => 'Family trek to Manaslu Circuit for summer 2024',
                                'date' => '3 weeks ago',
                                'source' => 'Website Form',
                                'status' => 'follow_up',
                                'priority' => 'high'
                            ]
                        ]);
                    @endphp

                    @forelse($sampleGuests as $guest)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-semibold" style="background-color: {{ $guest->avatar_color }};">
                                    {{ substr($guest->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-medium" style="color: #052734;">{{ $guest->name }}</p>
                                    <p class="text-xs" style="color: #6D6E70; max-width: 200px;" title="{{ $guest->inquiry_message }}">
                                        {{ Str::limit($guest->inquiry_message, 50) }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-1">
                                <p class="text-sm font-medium" style="color: #052734;">{{ $guest->email }}</p>
                                <p class="text-xs" style="color: #6D6E70;">{{ $guest->phone }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium"
                                style="@if($guest->inquiry_type === 'booking') background-color: rgba(153, 199, 35, 0.1); color: #99C723;
                                       @elseif($guest->inquiry_type === 'custom') background-color: rgba(77, 139, 178, 0.1); color: #4D8BB2;
                                       @elseif($guest->inquiry_type === 'partnership') background-color: rgba(0, 89, 145, 0.1); color: #005991;
                                       @else background-color: rgba(160, 174, 192, 0.1); color: #A0AEC0;
                                       @endif">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                {{ $guest->inquiry_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-1">
                                <p class="text-sm" style="color: #052734;">{{ $guest->date }}</p>
                                <p class="text-xs" style="color: #6D6E70;">Inquiry received</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium"
                                style="@if($guest->source === 'Website Form') background-color: rgba(0, 89, 145, 0.1); color: #005991;
                                       @elseif($guest->source === 'Email') background-color: rgba(153, 199, 35, 0.1); color: #99C723;
                                       @elseif($guest->source === 'Phone Call') background-color: rgba(77, 139, 178, 0.1); color: #4D8BB2;
                                       @else background-color: rgba(160, 174, 192, 0.1); color: #A0AEC0;
                                       @endif">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                </svg>
                                {{ $guest->source }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium"
                                    style="@if($guest->status === 'new') background-color: rgba(66, 153, 225, 0.1); color: #4299E1;
                                           @elseif($guest->status === 'contacted') background-color: rgba(237, 137, 54, 0.1); color: #ED8936;
                                           @elseif($guest->status === 'in_progress') background-color: rgba(245, 158, 11, 0.1); color: #F59E0B;
                                           @elseif($guest->status === 'converted') background-color: rgba(72, 187, 120, 0.1); color: #48BB78;
                                           @elseif($guest->status === 'follow_up') background-color: rgba(159, 122, 234, 0.1); color: #9F7AEA;
                                           @else background-color: rgba(160, 174, 192, 0.1); color: #A0AEC0;
                                           @endif">
                                    <span class="w-1.5 h-1.5 rounded-full"
                                        style="@if($guest->status === 'new') background-color: #4299E1;
                                               @elseif($guest->status === 'contacted') background-color: #ED8936;
                                               @elseif($guest->status === 'in_progress') background-color: #F59E0B;
                                               @elseif($guest->status === 'converted') background-color: #48BB78;
                                               @elseif($guest->status === 'follow_up') background-color: #9F7AEA;
                                               @else background-color: #A0AEC0;
                                               @endif"></span>
                                    {{ ucfirst(str_replace('_', ' ', $guest->status)) }}
                                </span>
                                @if($guest->priority === 'high')
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs" style="background-color: rgba(245, 101, 101, 0.1); color: #F56565;">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                    High Priority
                                </span>
                                @elseif($guest->priority === 'medium')
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs" style="background-color: rgba(237, 137, 54, 0.1); color: #ED8936;">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Medium Priority
                                </span>
                                @else
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs" style="background-color: rgba(72, 187, 120, 0.1); color: #48BB78;">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Low Priority
                                </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-1">
                                <button @click="viewInquiry({{ $guest->id }})" class="p-2 rounded-lg hover:bg-gray-100 transition-colors" title="View Inquiry">
                                    <svg class="w-4 h-4" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button @click="contactGuest({{ $guest->id }})" class="p-2 rounded-lg hover:bg-blue-50 transition-colors" title="Contact Guest">
                                    <svg class="w-4 h-4" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </button>
                                <button @click="convertToUser({{ $guest->id }})" class="p-2 rounded-lg hover:bg-green-50 transition-colors" title="Convert to User">
                                    <svg class="w-4 h-4" style="color: #99C723;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </button>
                                <button @click="editGuest({{ $guest->id }})" class="p-2 rounded-lg hover:bg-gray-100 transition-colors" title="Edit Details">
                                    <svg class="w-4 h-4" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <button @click="confirmDelete({{ $guest->id }})" class="p-2 rounded-lg hover:bg-red-50 transition-colors" title="Delete">
                                    <svg class="w-4 h-4" style="color: #C9302C;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <p class="text-lg font-semibold text-gray-500">No guest inquiries found</p>
                                <p class="text-sm text-gray-400 mt-1">All guest inquiries will appear here</p>
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
        <p class="text-sm" style="color: #6D6E70;">Showing <span class="font-semibold" style="color: #052734;">1-6</span> of <span class="font-semibold" style="color: #052734;">2,450</span> guests</p>
        <div class="flex items-center gap-2">
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors disabled:opacity-50" style="color: #052734;" disabled>
                Previous
            </button>
            <button class="px-3 py-2 rounded-lg text-sm font-medium text-white" style="background-color: #005991;">1</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">2</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">3</button>
            <span style="color: #6D6E70;">...</span>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">408</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">
                Next
            </button>
        </div>
    </div>

    <!-- View Inquiry Modal -->
    <div x-show="showViewModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" @keydown.escape.window="showViewModal = false">
        <div x-show="showViewModal" x-transition:enter="transition-opacity ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/50" @click="showViewModal = false"></div>
        
        <div x-show="showViewModal" x-transition:enter="transition-all ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="relative bg-white rounded-2xl shadow-2xl max-w-2xl w-full p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-semibold" style="color: #052734;">Inquiry Details</h3>
                    <p class="text-sm" style="color: #6D6E70;">Guest inquiry information</p>
                </div>
                <button @click="showViewModal = false" class="p-2 rounded-lg hover:bg-gray-100">
                    <svg class="w-5 h-5" style="color: #052734;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="space-y-6">
                <!-- Guest Info -->
                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-white text-xl font-bold" :style="'background-color: ' + (selectedGuest?.avatar_color || '#4D8BB2')">
                        <span x-text="selectedGuest?.name?.charAt(0) || 'G'"></span>
                    </div>
                    <div>
                        <h4 class="font-semibold" style="color: #052734;" x-text="selectedGuest?.name || 'Guest Name'"></h4>
                        <p class="text-sm" style="color: #6D6E70;" x-text="selectedGuest?.email || 'guest@email.com'"></p>
                        <p class="text-sm" style="color: #6D6E70;" x-text="selectedGuest?.phone || '+1 234 567 890'"></p>
                    </div>
                </div>

                <!-- Inquiry Details -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Inquiry Type</label>
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 rounded-full text-sm font-medium"
                                :style="selectedGuest?.inquiry_type === 'booking' ? 'background-color: rgba(153, 199, 35, 0.1); color: #99C723;' :
                                        selectedGuest?.inquiry_type === 'custom' ? 'background-color: rgba(77, 139, 178, 0.1); color: #4D8BB2;' :
                                        'background-color: rgba(0, 89, 145, 0.1); color: #005991;'">
                                <span x-text="selectedGuest?.inquiry_label || 'Inquiry Type'"></span>
                            </span>
                            <span class="px-3 py-1 rounded-full text-sm font-medium"
                                :style="selectedGuest?.source === 'Website Form' ? 'background-color: rgba(0, 89, 145, 0.1); color: #005991;' :
                                        selectedGuest?.source === 'Email' ? 'background-color: rgba(153, 199, 35, 0.1); color: #99C723;' :
                                        'background-color: rgba(77, 139, 178, 0.1); color: #4D8BB2;'">
                                <span x-text="selectedGuest?.source || 'Source'"></span>
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Inquiry Message</label>
                        <div class="bg-gray-50 rounded-xl p-4">
                            <p class="text-sm" style="color: #052734;" x-text="selectedGuest?.inquiry_message || 'No message available'"></p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Timeline</label>
                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="text-sm" style="color: #052734;">Inquiry Received</span>
                                <span class="text-sm" style="color: #6D6E70;" x-text="selectedGuest?.date || 'Date not available'"></span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm" style="color: #052734;">Last Contact</span>
                                <span class="text-sm" style="color: #6D6E70;">Never contacted</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3 pt-4 border-t border-gray-200">
                    <button @click="contactGuest(selectedGuest?.id)" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-all border-2 hover:bg-gray-100" style="color: #005991; border-color: #005991;">
                        Contact Guest
                    </button>
                    <button @click="convertToUser(selectedGuest?.id)" class="flex-1 px-4 py-2.5 rounded-lg text-white font-medium transition-all hover:opacity-90" style="background-color: #99C723;">
                        Convert to User
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Guest Drawer -->
    <div x-show="showAddDrawer" x-cloak class="fixed inset-0 z-50 overflow-hidden" @keydown.escape.window="showAddDrawer = false">
        <div x-show="showAddDrawer" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/50" @click="showAddDrawer = false"></div>
        
        <div x-show="showAddDrawer" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition-transform ease-in duration-200" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="absolute inset-y-0 right-0 w-full max-w-lg bg-white shadow-2xl flex flex-col">
            <!-- Drawer Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100" style="background-color: #052734;">
                <div>
                    <h2 class="text-lg font-semibold text-white" x-text="editMode ? 'Edit Guest' : 'Add New Guest'"></h2>
                    <p class="text-sm text-white/70" x-text="editMode ? 'Update guest details' : 'Add a new guest inquiry'"></p>
                </div>
                <button @click="showAddDrawer = false" class="p-2 rounded-lg hover:bg-white/10 transition-colors">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Drawer Content -->
            <div class="flex-1 overflow-y-auto p-6">
                <form @submit.prevent="submitGuest()" class="space-y-6">
                    <!-- Basic Information -->
                    <div>
                        <h4 class="text-sm font-semibold mb-4" style="color: #052734;">Basic Information</h4>
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">First Name *</label>
                                    <input type="text" x-model="form.first_name" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Last Name *</label>
                                    <input type="text" x-model="form.last_name" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Email Address *</label>
                                <input type="email" x-model="form.email" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                            </div>
                            <div>
                                <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Phone Number</label>
                                <input type="tel" x-model="form.phone" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                            </div>
                        </div>
                    </div>

                    <!-- Inquiry Details -->
                    <div>
                        <h4 class="text-sm font-semibold mb-4" style="color: #052734;">Inquiry Details</h4>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Inquiry Type *</label>
                                <select x-model="form.inquiry_type" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                                    <option value="">Select Type</option>
                                    <option value="trek_info">Trek Information</option>
                                    <option value="booking">Booking Inquiry</option>
                                    <option value="custom">Custom Trek</option>
                                    <option value="general">General Question</option>
                                    <option value="partnership">Partnership</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Source *</label>
                                <select x-model="form.source" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                                    <option value="">Select Source</option>
                                    <option value="website">Website Form</option>
                                    <option value="email">Email</option>
                                    <option value="phone">Phone Call</option>
                                    <option value="whatsapp">WhatsApp</option>
                                    <option value="referral">Referral</option>
                                    <option value="social">Social Media</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Inquiry Message *</label>
                                <textarea x-model="form.message" rows="4" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent resize-none" style="--tw-ring-color: #005991;" placeholder="Enter the inquiry message..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Status & Priority -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Status *</label>
                            <select x-model="form.status" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                                <option value="new">New</option>
                                <option value="contacted">Contacted</option>
                                <option value="in_progress">In Progress</option>
                                <option value="follow_up">Follow Up Needed</option>
                                <option value="converted">Converted to User</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Priority</label>
                            <select x-model="form.priority" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                    </div>

                    <!-- Additional Notes -->
                    <div>
                        <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Internal Notes</label>
                        <textarea x-model="form.notes" rows="3" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent resize-none" style="--tw-ring-color: #005991;" placeholder="Any internal notes about this inquiry..."></textarea>
                    </div>
                </form>
            </div>

            <!-- Drawer Footer -->
            <div class="flex items-center gap-3 px-6 py-4 border-t border-gray-100 bg-gray-50">
                <button @click="showAddDrawer = false" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-all border border-gray-300 hover:bg-gray-100" style="color: #052734;">
                    Cancel
                </button>
                <button @click="submitGuest()" class="flex-1 px-4 py-2.5 rounded-lg text-white font-medium transition-all hover:opacity-90" style="background-color: #005991;">
                    <span x-text="editMode ? 'Update Guest' : 'Add Guest'"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" @keydown.escape.window="showDeleteModal = false">
        <div x-show="showDeleteModal" x-transition:enter="transition-opacity ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/50" @click="showDeleteModal = false"></div>
        
        <div x-show="showDeleteModal" x-transition:enter="transition-all ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full p-6">
            <div class="text-center">
                <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: rgba(201, 48, 44, 0.1);">
                    <svg class="w-8 h-8" style="color: #C9302C;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2" style="color: #052734;">Delete Guest Inquiry?</h3>
                <p class="text-sm mb-6" style="color: #6D6E70;">Are you sure you want to delete this guest inquiry? This action cannot be undone.</p>
                <div class="flex items-center gap-3">
                    <button @click="showDeleteModal = false" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-all border border-gray-300 hover:bg-gray-100" style="color: #052734;">
                        Cancel
                    </button>
                    <button @click="deleteGuest()" class="flex-1 px-4 py-2.5 rounded-lg text-white font-medium transition-all hover:opacity-90" style="background-color: #C9302C;">
                        Yes, Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function guestUsersManager() {
    return {
        searchQuery: '',
        activeStatus: 'all',
        selectedInquiryType: '',
        dateFrom: '',
        dateTo: '',
        showViewModal: false,
        showAddDrawer: false,
        showDeleteModal: false,
        editMode: false,
        selectedGuestId: null,
        selectedGuest: null,
        statuses: [
            { value: 'all', label: 'All', color: '#005991' },
            { value: 'new', label: 'New', color: '#4299E1' },
            { value: 'contacted', label: 'Contacted', color: '#ED8936' },
            { value: 'in_progress', label: 'In Progress', color: '#F59E0B' },
            { value: 'converted', label: 'Converted', color: '#48BB78' }
        ],
        form: {
            first_name: '',
            last_name: '',
            email: '',
            phone: '',
            inquiry_type: '',
            source: '',
            message: '',
            status: 'new',
            priority: 'medium',
            notes: ''
        },
        
        openAddGuestDrawer() {
            this.editMode = false;
            this.resetForm();
            this.showAddDrawer = true;
        },
        
        viewInquiry(id) {
            // In real app, fetch guest data
            const guest = {
                id: id,
                name: 'David Wilson',
                email: 'david.w@email.com',
                phone: '+1 555 123 4567',
                avatar_color: '#4D8BB2',
                inquiry_type: 'trek_info',
                inquiry_label: 'Trek Information',
                inquiry_message: 'Interested in Everest Base Camp trek for April 2024',
                date: '2 hours ago',
                source: 'Website Form',
                status: 'new',
                priority: 'high'
            };
            
            this.selectedGuest = guest;
            this.showViewModal = true;
        },
        
        contactGuest(id) {
            console.log('Contact guest:', id);
            // In real app, open contact modal
        },
        
        convertToUser(id) {
            console.log('Convert guest to user:', id);
            // In real app, open conversion modal
        },
        
        editGuest(id) {
            this.editMode = true;
            this.selectedGuestId = id;
            
            // In real app, fetch guest data and populate form
            const sampleData = {
                first_name: 'David',
                last_name: 'Wilson',
                email: 'david.w@email.com',
                phone: '+1 555 123 4567',
                inquiry_type: 'trek_info',
                source: 'website',
                message: 'Interested in Everest Base Camp trek for April 2024',
                status: 'new',
                priority: 'high',
                notes: 'Follow up in 24 hours'
            };
            
            this.form = { ...this.form, ...sampleData };
            this.showAddDrawer = true;
        },
        
        confirmDelete(id) {
            this.selectedGuestId = id;
            this.showDeleteModal = true;
        },
        
        deleteGuest() {
            console.log('Delete guest:', this.selectedGuestId);
            this.showDeleteModal = false;
            // Show success notification
        },
        
        exportGuests() {
            console.log('Export guests to CSV');
            // In real app, trigger CSV export
        },
        
        submitGuest() {
            console.log('Submit guest:', this.form);
            this.showAddDrawer = false;
            this.resetForm();
            // Show success notification
        },
        
        resetForm() {
            this.form = {
                first_name: '',
                last_name: '',
                email: '',
                phone: '',
                inquiry_type: '',
                source: '',
                message: '',
                status: 'new',
                priority: 'medium',
                notes: ''
            };
        }
    }
}
</script>
@endsection