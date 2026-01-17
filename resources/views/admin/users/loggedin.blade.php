@extends('admin.layouts')

@section('title', 'Manage Users - Logged-in Users')

@section('content')
<div x-data="usersManager()" class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold" style="color: #052734;">Logged-in Users</h1>
            <p class="text-sm mt-1" style="color: #6D6E70;">Manage registered users and their accounts</p>
        </div>
        <div class="flex items-center gap-3">
            <button @click="exportUsers()" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 border border-gray-300 rounded-lg font-medium transition-all hover:bg-gray-50" style="color: #052734;">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                </svg>
                Export CSV
            </button>
            <button @click="openAddUserDrawer()" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-white font-medium rounded-lg transition-all hover:opacity-90 shadow-lg hover:shadow-xl" style="background-color: #005991;">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add User
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(0, 89, 145, 0.1);">
                    <svg class="w-5 h-5" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Total Users</p>
                    <p class="text-xl font-bold" style="color: #052734;">{{ $stats['total'] ?? 1428 }}</p>
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
                    <p class="text-xs font-medium" style="color: #6D6E70;">Active Today</p>
                    <p class="text-xl font-bold" style="color: #99C723;">{{ $stats['active_today'] ?? 86 }}</p>
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
                    <p class="text-xs font-medium" style="color: #6D6E70;">With Bookings</p>
                    <p class="text-xl font-bold" style="color: #4D8BB2;">{{ $stats['with_bookings'] ?? 324 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(0, 89, 145, 0.1);">
                    <svg class="w-5 h-5" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Verified</p>
                    <p class="text-xl font-bold" style="color: #005991;">{{ $stats['verified'] ?? 1250 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 col-span-2 lg:col-span-1">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(255, 193, 7, 0.1);">
                    <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Pending</p>
                    <p class="text-xl font-bold text-yellow-600">{{ $stats['pending'] ?? 178 }}</p>
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

            <!-- User Type Filter -->
            <div>
                <select x-model="selectedUserType" class="px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 w-full lg:w-auto" style="--tw-ring-color: #005991; color: #052734;">
                    <option value="">All Types</option>
                    <option value="customer">Customers</option>
                    <option value="guide">Guides</option>
                    <option value="staff">Staff</option>
                    <option value="admin">Admins</option>
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

    <!-- Users Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead style="background-color: #052734;">
                    <tr>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">User</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Contact</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Type</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Joined</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Bookings</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Status</th>
                        <th class="text-center text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php
                        $sampleUsers = $users ?? collect([
                            (object)[
                                'id' => 1,
                                'name' => 'John Smith',
                                'email' => 'john.smith@email.com',
                                'phone' => '+1 234 567 890',
                                'avatar_color' => '#4D8BB2',
                                'type' => 'customer',
                                'type_label' => 'Customer',
                                'joined_date' => 'Jan 15, 2023',
                                'last_active' => '2 hours ago',
                                'total_bookings' => 3,
                                'status' => 'active',
                                'verified' => true
                            ],
                            (object)[
                                'id' => 2,
                                'name' => 'Sarah Johnson',
                                'email' => 'sarah.j@email.com',
                                'phone' => '+1 987 654 321',
                                'avatar_color' => '#005991',
                                'type' => 'customer',
                                'type_label' => 'Premium Member',
                                'joined_date' => 'Nov 22, 2022',
                                'last_active' => '1 day ago',
                                'total_bookings' => 7,
                                'status' => 'active',
                                'verified' => true
                            ],
                            (object)[
                                'id' => 3,
                                'name' => 'Mike Williams',
                                'email' => 'mike.w@email.com',
                                'phone' => '+44 7890 123456',
                                'avatar_color' => '#99C723',
                                'type' => 'guide',
                                'type_label' => 'Lead Guide',
                                'joined_date' => 'Mar 10, 2022',
                                'last_active' => '5 minutes ago',
                                'total_bookings' => 42,
                                'status' => 'active',
                                'verified' => true
                            ],
                            (object)[
                                'id' => 4,
                                'name' => 'Emma Davis',
                                'email' => 'emma.d@email.com',
                                'phone' => '+61 412 345 678',
                                'avatar_color' => '#C9302C',
                                'type' => 'staff',
                                'type_label' => 'Operations',
                                'joined_date' => 'Feb 28, 2023',
                                'last_active' => 'Online',
                                'total_bookings' => 0,
                                'status' => 'active',
                                'verified' => true
                            ],
                            (object)[
                                'id' => 5,
                                'name' => 'Robert Chen',
                                'email' => 'robert.c@email.com',
                                'phone' => '+86 138 0013 8000',
                                'avatar_color' => '#4D8BB2',
                                'type' => 'customer',
                                'type_label' => 'Customer',
                                'joined_date' => 'Dec 05, 2023',
                                'last_active' => '1 week ago',
                                'total_bookings' => 0,
                                'status' => 'inactive',
                                'verified' => false
                            ],
                            (object)[
                                'id' => 6,
                                'name' => 'Lisa Wang',
                                'email' => 'lisa.w@email.com',
                                'phone' => '+65 9123 4567',
                                'avatar_color' => '#005991',
                                'type' => 'customer',
                                'type_label' => 'VIP Member',
                                'joined_date' => 'Aug 18, 2022',
                                'last_active' => '3 hours ago',
                                'total_bookings' => 12,
                                'status' => 'active',
                                'verified' => true
                            ]
                        ]);
                    @endphp

                    @forelse($sampleUsers as $user)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="relative">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-semibold" style="background-color: {{ $user->avatar_color }};">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    @if($user->last_active === 'Online')
                                    <div class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-500 rounded-full border border-white"></div>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-sm font-medium" style="color: #052734;">{{ $user->name }}</p>
                                    <p class="text-xs" style="color: #6D6E70;">
                                        <span class="inline-flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            {{ $user->last_active }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-1">
                                <p class="text-sm font-medium" style="color: #052734;">{{ $user->email }}</p>
                                <p class="text-xs" style="color: #6D6E70;">{{ $user->phone }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium capitalize"
                                style="@if($user->type === 'guide') background-color: rgba(153, 199, 35, 0.1); color: #99C723;
                                       @elseif($user->type === 'staff') background-color: rgba(201, 48, 44, 0.1); color: #C9302C;
                                       @elseif($user->type === 'admin') background-color: rgba(0, 89, 145, 0.1); color: #005991;
                                       @else background-color: rgba(77, 139, 178, 0.1); color: #4D8BB2;
                                       @endif">
                                @if($user->type === 'guide')
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                @elseif($user->type === 'staff')
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                @elseif($user->type === 'admin')
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                @else
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                @endif
                                {{ $user->type_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-1">
                                <p class="text-sm" style="color: #052734;">{{ $user->joined_date }}</p>
                                <p class="text-xs" style="color: #6D6E70;">{{ \Carbon\Carbon::parse($user->joined_date)->diffForHumans() }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background-color: rgba(77, 139, 178, 0.1);">
                                    <svg class="w-4 h-4" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium" style="color: #052734;">{{ $user->total_bookings }}</p>
                                    <p class="text-xs" style="color: #6D6E70;">bookings</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium"
                                    :class="{ 'bg-green-100 text-green-700': '{{ $user->status }}' === 'active', 'bg-red-100 text-red-700': '{{ $user->status }}' === 'inactive', 'bg-yellow-100 text-yellow-700': '{{ $user->status }}' === 'suspended' }"
                                    style="@if($user->status === 'active') background-color: rgba(153, 199, 35, 0.1); color: #99C723; @endif">
                                    <span class="w-1.5 h-1.5 rounded-full 
                                        @if($user->status === 'active') bg-green-500
                                        @elseif($user->status === 'inactive') bg-red-500
                                        @else bg-yellow-500
                                        @endif"></span>
                                    {{ ucfirst($user->status) }}
                                </span>
                                @if($user->verified)
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs" style="background-color: rgba(0, 89, 145, 0.1); color: #005991;">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                    Verified
                                </span>
                                @else
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs" style="background-color: rgba(255, 193, 7, 0.1); color: #F59E0B;">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    Unverified
                                </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-1">
                                <button @click="viewUser({{ $user->id }})" class="p-2 rounded-lg hover:bg-gray-100 transition-colors" title="View Profile">
                                    <svg class="w-4 h-4" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button @click="editUser({{ $user->id }})" class="p-2 rounded-lg hover:bg-gray-100 transition-colors" title="Edit User">
                                    <svg class="w-4 h-4" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <button @click="sendMessage({{ $user->id }})" class="p-2 rounded-lg hover:bg-blue-50 transition-colors" title="Send Message">
                                    <svg class="w-4 h-4" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                </button>
                                @if($user->status === 'active')
                                <button @click="suspendUser({{ $user->id }})" class="p-2 rounded-lg hover:bg-yellow-50 transition-colors" title="Suspend User">
                                    <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                </button>
                                @else
                                <button @click="activateUser({{ $user->id }})" class="p-2 rounded-lg hover:bg-green-50 transition-colors" title="Activate User">
                                    <svg class="w-4 h-4" style="color: #99C723;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </button>
                                @endif
                                <button @click="confirmDelete({{ $user->id }})" class="p-2 rounded-lg hover:bg-red-50 transition-colors" title="Delete User">
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
                                <p class="text-lg font-semibold text-gray-500">No users found</p>
                                <p class="text-sm text-gray-400 mt-1">Start by adding your first user</p>
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
        <p class="text-sm" style="color: #6D6E70;">Showing <span class="font-semibold" style="color: #052734;">1-6</span> of <span class="font-semibold" style="color: #052734;">1,428</span> users</p>
        <div class="flex items-center gap-2">
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors disabled:opacity-50" style="color: #052734;" disabled>
                Previous
            </button>
            <button class="px-3 py-2 rounded-lg text-sm font-medium text-white" style="background-color: #005991;">1</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">2</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">3</button>
            <span style="color: #6D6E70;">...</span>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">238</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">
                Next
            </button>
        </div>
    </div>

    <!-- Add/Edit User Drawer -->
    <div x-show="showAddDrawer" x-cloak class="fixed inset-0 z-50 overflow-hidden" @keydown.escape.window="showAddDrawer = false">
        <div x-show="showAddDrawer" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/50" @click="showAddDrawer = false"></div>
        
        <div x-show="showAddDrawer" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition-transform ease-in duration-200" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="absolute inset-y-0 right-0 w-full max-w-lg bg-white shadow-2xl flex flex-col">
            <!-- Drawer Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100" style="background-color: #052734;">
                <div>
                    <h2 class="text-lg font-semibold text-white" x-text="editMode ? 'Edit User' : 'Add New User'"></h2>
                    <p class="text-sm text-white/70" x-text="editMode ? 'Update user details' : 'Create a new user account'"></p>
                </div>
                <button @click="showAddDrawer = false" class="p-2 rounded-lg hover:bg-white/10 transition-colors">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Drawer Content -->
            <div class="flex-1 overflow-y-auto p-6">
                <form @submit.prevent="submitUser()" class="space-y-6">
                    <!-- Profile Picture -->
                    <div class="flex flex-col items-center">
                        <div class="relative w-24 h-24 rounded-full overflow-hidden mb-4">
                            <div x-show="!form.profile_picture" class="w-full h-full flex items-center justify-center text-white text-2xl font-bold" :style="'background-color: ' + form.avatar_color">
                                <span x-text="form.full_name ? form.full_name.charAt(0) : 'U'"></span>
                            </div>
                            <img x-show="form.profile_picture" :src="form.profile_picture" alt="Profile" class="w-full h-full object-cover">
                            <button type="button" @click="$refs.profileInput.click()" class="absolute bottom-0 right-0 w-8 h-8 bg-[#005991] text-white rounded-full flex items-center justify-center hover:bg-[#052734]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </button>
                            <input type="file" x-ref="profileInput" accept="image/*" class="hidden" @change="handleProfileUpload($event)">
                        </div>
                        <p class="text-sm text-gray-600">Click to upload profile picture</p>
                    </div>

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

                    <!-- Account Type -->
                    <div>
                        <h4 class="text-sm font-semibold mb-4" style="color: #052734;">Account Type</h4>
                        <div class="grid grid-cols-2 gap-3">
                            <template x-for="type in userTypes" :key="type.value">
                                <label class="flex items-center gap-3 p-3 border-2 rounded-lg cursor-pointer transition-all" :class="form.user_type === type.value ? 'border-[#005991] bg-blue-50' : 'border-gray-200 hover:border-gray-300'">
                                    <input type="radio" x-model="form.user_type" :value="type.value" name="user_type" class="w-4 h-4" style="accent-color: #005991;">
                                    <div>
                                        <p class="text-sm font-medium" style="color: #052734;" x-text="type.label"></p>
                                        <p class="text-xs" style="color: #6D6E70;" x-text="type.description"></p>
                                    </div>
                                </label>
                            </template>
                        </div>
                    </div>

                    <!-- Password (only for new users) -->
                    <div x-show="!editMode">
                        <h4 class="text-sm font-semibold mb-4" style="color: #052734;">Password</h4>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Password *</label>
                                <input type="password" x-model="form.password" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                            </div>
                            <div>
                                <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Confirm Password *</label>
                                <input type="password" x-model="form.password_confirmation" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                            </div>
                        </div>
                    </div>

                    <!-- Account Status -->
                    <div>
                        <h4 class="text-sm font-semibold mb-4" style="color: #052734;">Account Status</h4>
                        <div class="space-y-3">
                            <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" x-model="form.email_verified" class="w-4 h-4" style="accent-color: #99C723;">
                                <div>
                                    <p class="text-sm font-medium" style="color: #052734;">Email Verified</p>
                                    <p class="text-xs" style="color: #6D6E70;">User can login immediately</p>
                                </div>
                            </label>
                            <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" x-model="form.active" class="w-4 h-4" style="accent-color: #99C723;">
                                <div>
                                    <p class="text-sm font-medium" style="color: #052734;">Active Account</p>
                                    <p class="text-xs" style="color: #6D6E70;">User can access the platform</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div>
                        <h4 class="text-sm font-semibold mb-4" style="color: #052734;">Additional Information</h4>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Country</label>
                                <select x-model="form.country" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                                    <option value="">Select Country</option>
                                    <option value="US">United States</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="AU">Australia</option>
                                    <option value="CA">Canada</option>
                                    <option value="NP">Nepal</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Notes</label>
                                <textarea x-model="form.notes" rows="3" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent resize-none" style="--tw-ring-color: #005991;" placeholder="Any additional notes about this user..."></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Drawer Footer -->
            <div class="flex items-center gap-3 px-6 py-4 border-t border-gray-100 bg-gray-50">
                <button @click="showAddDrawer = false" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-all border border-gray-300 hover:bg-gray-100" style="color: #052734;">
                    Cancel
                </button>
                <button @click="submitUser()" class="flex-1 px-4 py-2.5 rounded-lg text-white font-medium transition-all hover:opacity-90" style="background-color: #005991;">
                    <span x-text="editMode ? 'Update User' : 'Create User'"></span>
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
                <h3 class="text-lg font-semibold mb-2" style="color: #052734;">Delete User?</h3>
                <p class="text-sm mb-6" style="color: #6D6E70;">Are you sure you want to delete this user account? This action cannot be undone and all associated data will be removed.</p>
                <div class="flex items-center gap-3">
                    <button @click="showDeleteModal = false" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-all border border-gray-300 hover:bg-gray-100" style="color: #052734;">
                        Cancel
                    </button>
                    <button @click="deleteUser()" class="flex-1 px-4 py-2.5 rounded-lg text-white font-medium transition-all hover:opacity-90" style="background-color: #C9302C;">
                        Yes, Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function usersManager() {
    return {
        searchQuery: '',
        activeStatus: 'all',
        selectedUserType: '',
        dateFrom: '',
        dateTo: '',
        showAddDrawer: false,
        showDeleteModal: false,
        editMode: false,
        selectedUserId: null,
        statuses: [
            { value: 'all', label: 'All', color: '#005991' },
            { value: 'active', label: 'Active', color: '#99C723' },
            { value: 'inactive', label: 'Inactive', color: '#F59E0B' },
            { value: 'suspended', label: 'Suspended', color: '#C9302C' }
        ],
        userTypes: [
            { value: 'customer', label: 'Customer', description: 'Regular user' },
            { value: 'premium', label: 'Premium Member', description: 'VIP customer' },
            { value: 'guide', label: 'Guide', description: 'Tour guide' },
            { value: 'staff', label: 'Staff', description: 'Company staff' },
            { value: 'admin', label: 'Admin', description: 'Administrator' }
        ],
        form: {
            first_name: '',
            last_name: '',
            email: '',
            phone: '',
            profile_picture: '',
            avatar_color: '#4D8BB2',
            user_type: 'customer',
            password: '',
            password_confirmation: '',
            email_verified: true,
            active: true,
            country: '',
            notes: ''
        },
        
        openAddDrawer() {
            this.editMode = false;
            this.resetForm();
            this.showAddDrawer = true;
        },
        
        viewUser(id) {
            console.log('View user:', id);
            // In real app, redirect to user profile
        },
        
        editUser(id) {
            this.editMode = true;
            this.selectedUserId = id;
            
            // In real app, fetch user data and populate form
            const sampleData = {
                first_name: 'John',
                last_name: 'Smith',
                email: 'john.smith@email.com',
                phone: '+1 234 567 890',
                profile_picture: '',
                avatar_color: '#4D8BB2',
                user_type: 'customer',
                email_verified: true,
                active: true,
                country: 'US',
                notes: 'VIP customer with 3 bookings'
            };
            
            this.form = { ...this.form, ...sampleData };
            this.showAddDrawer = true;
        },
        
        sendMessage(id) {
            console.log('Send message to user:', id);
            // In real app, open message modal
        },
        
        suspendUser(id) {
            console.log('Suspend user:', id);
            // In real app, send suspend request
        },
        
        activateUser(id) {
            console.log('Activate user:', id);
            // In real app, send activate request
        },
        
        confirmDelete(id) {
            this.selectedUserId = id;
            this.showDeleteModal = true;
        },
        
        deleteUser() {
            console.log('Delete user:', this.selectedUserId);
            this.showDeleteModal = false;
            // Show success notification
        },
        
        exportUsers() {
            console.log('Export users to CSV');
            // In real app, trigger CSV export
        },
        
        submitUser() {
            console.log('Submit user:', this.form);
            this.showAddDrawer = false;
            this.resetForm();
            // Show success notification
        },
        
        handleProfileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.form.profile_picture = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        
        resetForm() {
            this.form = {
                first_name: '',
                last_name: '',
                email: '',
                phone: '',
                profile_picture: '',
                avatar_color: '#4D8BB2',
                user_type: 'customer',
                password: '',
                password_confirmation: '',
                email_verified: true,
                active: true,
                country: '',
                notes: ''
            };
        }
    }
}
</script>
@endsection