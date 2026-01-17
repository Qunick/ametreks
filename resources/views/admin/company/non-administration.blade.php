@extends('admin.layouts')

@section('title', 'Guide & Porter Management')

@section('content')
<div x-data="guidePorterManagement()" class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold" style="color: #052734;">Guide & Porter Management</h1>
            <p class="text-sm mt-1" style="color: #6D6E70;">Manage trekking staff assignments and communications</p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <div class="relative group">
                <button @click="openQuickAssignDrawer()" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-white font-medium rounded-lg transition-all hover:opacity-90" style="background-color: #99C723;">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Quick Assign
                </button>
                <div class="absolute left-0 mt-2 w-64 bg-white rounded-xl shadow-xl border border-gray-200 p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                    <div class="text-xs font-medium text-gray-500 px-2 py-1">Quick Actions</div>
                    <button @click="openBulkAssignment()" class="flex items-center gap-2 w-full px-3 py-2 text-sm hover:bg-gray-50 rounded-lg">
                        <svg class="w-4 h-4" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        Bulk Assignment
                    </button>
                    <button @click="sendBulkWhatsApp()" class="flex items-center gap-2 w-full px-3 py-2 text-sm hover:bg-gray-50 rounded-lg">
                        <svg class="w-4 h-4" style="color: #25D366;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                        </svg>
                        Bulk WhatsApp
                    </button>
                </div>
            </div>
            <button @click="openAddStaffDrawer()" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-white font-medium rounded-lg transition-all hover:opacity-90 shadow-lg" style="background-color: #005991;">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add Staff
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Total Guides</p>
                    <p class="text-2xl font-bold mt-1" style="color: #052734;">{{ $stats['total_guides'] ?? 24 }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background-color: rgba(0, 89, 145, 0.1);">
                    <svg class="w-6 h-6" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-3">
                <span class="text-xs px-2 py-1 rounded" style="background-color: rgba(153, 199, 35, 0.1); color: #99C723;">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 inline-block mr-1"></span>
                    18 Available
                </span>
            </div>
        </div>

        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Total Porters</p>
                    <p class="text-2xl font-bold mt-1" style="color: #052734;">{{ $stats['total_porters'] ?? 32 }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background-color: rgba(77, 139, 178, 0.1);">
                    <svg class="w-6 h-6" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-3">
                <span class="text-xs px-2 py-1 rounded" style="background-color: rgba(153, 199, 35, 0.1); color: #99C723;">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 inline-block mr-1"></span>
                    26 Available
                </span>
            </div>
        </div>

        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">On Duty</p>
                    <p class="text-2xl font-bold mt-1" style="color: #052734;">{{ $stats['on_duty'] ?? 28 }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background-color: rgba(159, 122, 234, 0.1);">
                    <svg class="w-6 h-6" style="color: #9F7AEA;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div class="text-xs text-gray-500 mt-3">
                <span class="text-green-600 font-medium">+3 this week</span>
            </div>
        </div>

        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Upcoming Assignments</p>
                    <p class="text-2xl font-bold mt-1" style="color: #052734;">{{ $stats['upcoming'] ?? 15 }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background-color: rgba(201, 48, 44, 0.1);">
                    <svg class="w-6 h-6" style="color: #C9302C;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <div class="text-xs text-gray-500 mt-3">
                Next 7 days
            </div>
        </div>
    </div>

    <!-- Quick Actions Bar -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex flex-wrap items-center gap-4">
            <div class="flex-1 min-w-[200px]">
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5" style="color: #6D6E70;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" x-model="searchQuery" placeholder="Search by name, phone, or trek..." class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 text-sm" style="--tw-ring-color: #005991;">
                </div>
            </div>
            
            <!-- Type Filter -->
            <div class="flex gap-2">
                <button @click="activeType = 'all'" :class="activeType === 'all' ? 'text-white' : 'bg-gray-100 hover:bg-gray-200'" :style="activeType === 'all' ? 'background-color: #005991' : 'color: #052734'" class="px-4 py-2 rounded-lg text-sm font-medium transition-all">
                    All Staff
                </button>
                <button @click="activeType = 'guide'" :class="activeType === 'guide' ? 'text-white' : 'bg-gray-100 hover:bg-gray-200'" :style="activeType === 'guide' ? 'background-color: #4D8BB2' : 'color: #052734'" class="px-4 py-2 rounded-lg text-sm font-medium transition-all">
                    Guides Only
                </button>
                <button @click="activeType = 'porter'" :class="activeType === 'porter' ? 'text-white' : 'bg-gray-100 hover:bg-gray-200'" :style="activeType === 'porter' ? 'background-color: #99C723' : 'color: #052734'" class="px-4 py-2 rounded-lg text-sm font-medium transition-all">
                    Porters Only
                </button>
            </div>

            <!-- Status Filter -->
            <div>
                <select x-model="selectedStatus" class="px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991; color: #052734;">
                    <option value="">All Status</option>
                    <option value="available">Available</option>
                    <option value="assigned">Assigned</option>
                    <option value="on_leave">On Leave</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <!-- Date Range Filter -->
            <div class="flex gap-2">
                <input type="date" x-model="dateFrom" class="px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
                <input type="date" x-model="dateTo" class="px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Staff List Column -->
        <div class="lg:col-span-2 space-y-4">
            <!-- Staff Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @php
                    $sampleStaff = collect([
                        [
                            'id' => 1,
                            'name' => 'Rajesh Gurung',
                            'type' => 'guide',
                            'type_label' => 'Senior Guide',
                            'phone' => '+977 9841 123456',
                            'experience' => '8 years',
                            'languages' => ['English', 'Hindi', 'Japanese'],
                            'availability' => 'available',
                            'trek_assigned' => 'Everest Base Camp - Starting Mar 15',
                            'rating' => 4.8,
                            'last_assigned' => 'Feb 10, 2024',
                            'avatar_color' => '#005991',
                            'certifications' => ['Wilderness First Aid', 'UIAGM']
                        ],
                        [
                            'id' => 2,
                            'name' => 'Mohan Thapa',
                            'type' => 'porter',
                            'type_label' => 'Head Porter',
                            'phone' => '+977 9841 654321',
                            'experience' => '6 years',
                            'languages' => ['English', 'Chinese'],
                            'availability' => 'assigned',
                            'trek_assigned' => 'Annapurna Circuit - Mar 10-25',
                            'rating' => 4.9,
                            'last_assigned' => 'Current',
                            'avatar_color' => '#4D8BB2',
                            'max_load' => '25kg'
                        ],
                        [
                            'id' => 3,
                            'name' => 'Sita Rai',
                            'type' => 'guide',
                            'type_label' => 'Female Guide',
                            'phone' => '+977 9841 789012',
                            'experience' => '5 years',
                            'languages' => ['English', 'French', 'Spanish'],
                            'availability' => 'available',
                            'trek_assigned' => 'Available from Mar 20',
                            'rating' => 4.7,
                            'last_assigned' => 'Feb 5, 2024',
                            'avatar_color' => '#C9302C',
                            'specialization' => 'Family Treks'
                        ],
                        [
                            'id' => 4,
                            'name' => 'Kumar Sherpa',
                            'type' => 'porter',
                            'type_label' => 'Porter',
                            'phone' => '+977 9841 345678',
                            'experience' => '4 years',
                            'languages' => ['English'],
                            'availability' => 'on_leave',
                            'trek_assigned' => 'On Leave until Mar 18',
                            'rating' => 4.5,
                            'last_assigned' => 'Jan 28, 2024',
                            'avatar_color' => '#99C723',
                            'max_load' => '30kg'
                        ],
                        [
                            'id' => 5,
                            'name' => 'Prem Lama',
                            'type' => 'guide',
                            'type_label' => 'Mountain Guide',
                            'phone' => '+977 9841 901234',
                            'experience' => '12 years',
                            'languages' => ['English', 'German', 'Italian'],
                            'availability' => 'available',
                            'trek_assigned' => 'Available immediately',
                            'rating' => 4.9,
                            'last_assigned' => 'Feb 15, 2024',
                            'avatar_color' => '#9F7AEA',
                            'certifications' => ['IFMGA Guide']
                        ],
                        [
                            'id' => 6,
                            'name' => 'Bikash Tamang',
                            'type' => 'porter',
                            'type_label' => 'Assistant Porter',
                            'phone' => '+977 9841 567890',
                            'experience' => '2 years',
                            'languages' => ['English'],
                            'availability' => 'inactive',
                            'trek_assigned' => 'Currently not available',
                            'rating' => 4.3,
                            'last_assigned' => 'Dec 20, 2023',
                            'avatar_color' => '#052734',
                            'max_load' => '20kg'
                        ]
                    ]);
                @endphp

                @foreach($sampleStaff as $staff)
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                    <!-- Staff Header -->
                    <div class="p-4 border-b border-gray-100" :style="'background: linear-gradient(135deg, {{ $staff['avatar_color'] }}15, transparent)'">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center gap-3">
                                <div class="relative">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-semibold text-lg" style="background-color: {{ $staff['avatar_color'] }};">
                                        {{ substr($staff['name'], 0, 1) }}
                                    </div>
                                    <div class="absolute -bottom-1 -right-1 w-5 h-5 rounded-full border-2 border-white flex items-center justify-center"
                                        :style="'background-color: ' + {
                                            'available': '#99C723',
                                            'assigned': '#F59E0B',
                                            'on_leave': '#C9302C',
                                            'inactive': '#6D6E70'
                                        }[$staff['availability']]">
                                        @if($staff['type'] === 'guide')
                                        <svg class="w-2.5 h-2.5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                        </svg>
                                        @else
                                        <svg class="w-2.5 h-2.5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"/>
                                        </svg>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900">{{ $staff['name'] }}</h3>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-xs px-2 py-1 rounded font-medium" :style="'background-color: ' + ($staff['type'] === 'guide' ? '#4D8BB2' : '#99C723') + '20; color: ' + ($staff['type'] === 'guide' ? '#4D8BB2' : '#99C723')">
                                            {{ $staff['type_label'] }}
                                        </span>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <span class="text-sm font-medium text-gray-700 ml-1">{{ $staff['rating'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="relative" x-data="{ showActions: false }">
                                <button @click="showActions = !showActions" class="p-1 hover:bg-gray-100 rounded-lg">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                    </svg>
                                </button>
                                <div x-show="showActions" @click.away="showActions = false" class="absolute right-0 mt-1 w-48 bg-white rounded-lg shadow-xl border border-gray-200 py-1 z-50">
                                    <button @click="assignTrek({{ $staff['id'] }})" class="flex items-center gap-2 w-full px-4 py-2 text-sm hover:bg-gray-50">
                                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Assign Trek
                                    </button>
                                    <button @click="sendWhatsApp({{ $staff['id'] }})" class="flex items-center gap-2 w-full px-4 py-2 text-sm hover:bg-gray-50">
                                        <svg class="w-4 h-4" style="color: #25D366;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                        </svg>
                                        WhatsApp Message
                                    </button>
                                    <button @click="viewDetails({{ $staff['id'] }})" class="flex items-center gap-2 w-full px-4 py-2 text-sm hover:bg-gray-50">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        View Details
                                    </button>
                                    <button @click="editStaff({{ $staff['id'] }})" class="flex items-center gap-2 w-full px-4 py-2 text-sm hover:bg-gray-50">
                                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit Profile
                                    </button>
                                    <div class="border-t border-gray-100 my-1"></div>
                                    <button @click="changeStatus({{ $staff['id'] }}, 'inactive')" class="flex items-center gap-2 w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                        </svg>
                                        Deactivate
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Staff Details -->
                    <div class="p-4">
                        <div class="space-y-3">
                            <!-- Contact Info -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <span class="text-sm font-medium text-gray-900">{{ $staff['phone'] }}</span>
                                </div>
                                <button @click="sendWhatsApp({{ $staff['id'] }})" class="text-xs px-2 py-1 rounded-lg flex items-center gap-1" style="background-color: #25D366; color: white;">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.76.982.998-3.675-.236-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.9 6.994c-.004 5.45-4.438 9.88-9.888 9.88m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.333.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.333 11.893-11.893 0-3.18-1.24-6.162-3.495-8.411"/>
                                    </svg>
                                    Message
                                </button>
                            </div>

                            <!-- Experience & Languages -->
                            <div class="flex items-center gap-4">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="text-xs text-gray-600">{{ $staff['experience'] }} exp</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                                    </svg>
                                    <span class="text-xs text-gray-600">{{ implode(', ', array_slice($staff['languages'], 0, 2)) }}</span>
                                </div>
                            </div>

                            <!-- Availability Status -->
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-xs font-medium px-2 py-1 rounded" :style="'background-color: ' + {
                                        'available': '#99C72320',
                                        'assigned': '#F59E0B20',
                                        'on_leave': '#C9302C20',
                                        'inactive': '#6D6E7020'
                                    }[$staff['availability']] + '; color: ' + {
                                        'available': '#99C723',
                                        'assigned': '#F59E0B',
                                        'on_leave': '#C9302C',
                                        'inactive': '#6D6E70'
                                    }[$staff['availability']]">
                                        {{ ucfirst($staff['availability']) }}
                                    </span>
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ $staff['last_assigned'] }}
                                </div>
                            </div>

                            <!-- Trek Assignment -->
                            <div class="mt-3">
                                <div class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                    </svg>
                                    <p class="text-sm text-gray-600 flex-1">{{ $staff['trek_assigned'] }}</p>
                                </div>
                            </div>

                            <!-- Specializations -->
                            @if(isset($staff['certifications']) || isset($staff['max_load']))
                            <div class="flex flex-wrap gap-2 mt-3">
                                @if(isset($staff['certifications']))
                                    @foreach($staff['certifications'] as $cert)
                                    <span class="text-xs px-2 py-1 rounded" style="background-color: rgba(0, 89, 145, 0.1); color: #005991;">
                                        {{ $cert }}
                                    </span>
                                    @endforeach
                                @endif
                                @if(isset($staff['max_load']))
                                    <span class="text-xs px-2 py-1 rounded" style="background-color: rgba(77, 139, 178, 0.1); color: #4D8BB2;">
                                        {{ $staff['max_load'] }} max load
                                    </span>
                                @endif
                                @if(isset($staff['specialization']))
                                    <span class="text-xs px-2 py-1 rounded" style="background-color: rgba(153, 199, 35, 0.1); color: #99C723;">
                                        {{ $staff['specialization'] }}
                                    </span>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="px-4 py-3 border-t border-gray-100 bg-gray-50">
                        <div class="flex items-center justify-between">
                            <button @click="quickAssign({{ $staff['id'] }})" class="flex items-center gap-1 text-sm px-3 py-1.5 rounded-lg" style="background-color: #4D8BB2; color: white;" :disabled="$staff['availability'] !== 'available'">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Assign
                            </button>
                            <button @click="sendWhatsApp({{ $staff['id'] }})" class="flex items-center gap-1 text-sm px-3 py-1.5 rounded-lg border border-gray-300 hover:bg-gray-100">
                                <svg class="w-4 h-4" style="color: #25D366;" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.76.982.998-3.675-.236-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.9 6.994c-.004 5.45-4.438 9.88-9.888 9.88m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.333.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.333 11.893-11.893 0-3.18-1.24-6.162-3.495-8.411"/>
                                </svg>
                                WhatsApp
                            </button>
                            <button @click="viewDetails({{ $staff['id'] }})" class="flex items-center gap-1 text-sm px-3 py-1.5 rounded-lg border border-gray-300 hover:bg-gray-100">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Details
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Sidebar - Upcoming Treks & Quick Actions -->
        <div class="space-y-6">
            <!-- Upcoming Treks -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm">
                <div class="p-4 border-b border-gray-100">
                    <h3 class="font-semibold text-gray-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Upcoming Treks
                    </h3>
                </div>
                <div class="p-4 space-y-3">
                    @foreach([
                        ['name' => 'Everest Base Camp', 'date' => 'Mar 15-30, 2024', 'guides_needed' => 2, 'porters_needed' => 4],
                        ['name' => 'Annapurna Circuit', 'date' => 'Mar 10-25, 2024', 'guides_needed' => 1, 'porters_needed' => 3],
                        ['name' => 'Langtang Valley', 'date' => 'Mar 20-Apr 5, 2024', 'guides_needed' => 1, 'porters_needed' => 2],
                        ['name' => 'Manaslu Circuit', 'date' => 'Apr 5-20, 2024', 'guides_needed' => 2, 'porters_needed' => 5],
                    ] as $trek)
                    <div class="p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer" @click="viewTrekDetails('{{ $trek['name'] }}')">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-medium text-gray-900">{{ $trek['name'] }}</h4>
                                <p class="text-sm text-gray-500 mt-1">{{ $trek['date'] }}</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xs text-gray-500">Staff Needed</div>
                                <div class="flex gap-2 mt-1">
                                    <span class="text-xs px-2 py-1 rounded" style="background-color: rgba(77, 139, 178, 0.1); color: #4D8BB2;">
                                        {{ $trek['guides_needed'] }} Guides
                                    </span>
                                    <span class="text-xs px-2 py-1 rounded" style="background-color: rgba(153, 199, 35, 0.1); color: #99C723;">
                                        {{ $trek['porters_needed'] }} Porters
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm">
                <div class="p-4 border-b border-gray-100">
                    <h3 class="font-semibold text-gray-900">Staff Availability</h3>
                </div>
                <div class="p-4 space-y-4">
                    <!-- Guide Availability -->
                    <div>
                        <div class="flex justify-between text-sm mb-2">
                            <span class="font-medium text-gray-700">Guides</span>
                            <span class="text-gray-600">18/24 available</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>
                    
                    <!-- Porter Availability -->
                    <div>
                        <div class="flex justify-between text-sm mb-2">
                            <span class="font-medium text-gray-700">Porters</span>
                            <span class="text-gray-600">26/32 available</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-600 h-2 rounded-full" style="width: 81%"></div>
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="space-y-2 pt-4 border-t border-gray-100">
                        <button @click="openBulkAssignment()" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium rounded-lg border border-gray-300 hover:bg-gray-50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            Bulk Assignment
                        </button>
                        <button @click="sendBulkWhatsApp()" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium rounded-lg" style="background-color: #25D366; color: white;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                            Send Bulk WhatsApp
                        </button>
                        <button @click="generateReports()" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium rounded-lg border border-gray-300 hover:bg-gray-50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Generate Reports
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Staff Drawer -->
    <div x-show="showStaffDrawer" class="fixed inset-y-0 right-0 w-full sm:w-96 bg-white shadow-xl z-50 transform transition-transform duration-300 ease-in-out" :class="showStaffDrawer ? 'translate-x-0' : 'translate-x-full'">
        <div class="h-full flex flex-col">
            <!-- Drawer Header -->
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold" style="color: #052734;" x-text="isEditingStaff ? 'Edit Staff' : 'Add New Staff'"></h3>
                    <button @click="closeStaffDrawer()" class="p-1 hover:bg-gray-100 rounded-lg">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Drawer Content -->
            <div class="flex-1 overflow-y-auto p-6">
                <div class="space-y-6">
                    <!-- Staff Type Selection -->
                    <div>
                        <label class="block text-sm font-medium mb-3" style="color: #052734;">Staff Type</label>
                        <div class="grid grid-cols-2 gap-3">
                            <button @click="staffForm.type = 'guide'" :class="staffForm.type === 'guide' ? 'border-blue-500 bg-blue-50' : 'border-gray-300'" class="p-4 border rounded-lg text-center transition-colors">
                                <div class="w-10 h-10 mx-auto mb-2 rounded-lg flex items-center justify-center" :style="staffForm.type === 'guide' ? 'background-color: rgba(77, 139, 178, 0.2)' : 'background-color: rgba(77, 139, 178, 0.1)'">
                                    <svg class="w-6 h-6" :style="staffForm.type === 'guide' ? 'color: #4D8BB2' : 'color: #6D6E70'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium" :style="staffForm.type === 'guide' ? 'color: #4D8BB2' : 'color: #6D6E70'">Guide</span>
                            </button>
                            <button @click="staffForm.type = 'porter'" :class="staffForm.type === 'porter' ? 'border-green-500 bg-green-50' : 'border-gray-300'" class="p-4 border rounded-lg text-center transition-colors">
                                <div class="w-10 h-10 mx-auto mb-2 rounded-lg flex items-center justify-center" :style="staffForm.type === 'porter' ? 'background-color: rgba(153, 199, 35, 0.2)' : 'background-color: rgba(153, 199, 35, 0.1)'">
                                    <svg class="w-6 h-6" :style="staffForm.type === 'porter' ? 'color: #99C723' : 'color: #6D6E70'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium" :style="staffForm.type === 'porter' ? 'color: #99C723' : 'color: #6D6E70'">Porter</span>
                            </button>
                        </div>
                    </div>

                    <!-- Personal Information -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-semibold" style="color: #052734;">Personal Information</h4>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #052734;">Full Name</label>
                            <input type="text" x-model="staffForm.name" placeholder="Enter full name" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                        </div>
                        
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-sm font-medium mb-1" style="color: #052734;">Phone Number</label>
                                <input type="tel" x-model="staffForm.phone" placeholder="+977 9841 XXXXXX" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1" style="color: #052734;">Email (Optional)</label>
                                <input type="email" x-model="staffForm.email" placeholder="staff@ametreks.com" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                            </div>
                        </div>
                    </div>

                    <!-- Professional Details -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-semibold" style="color: #052734;">Professional Details</h4>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #052734;">Years of Experience</label>
                            <input type="number" x-model="staffForm.experience" min="0" max="50" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #052734;">Languages Spoken</label>
                            <div class="flex flex-wrap gap-2 mb-2">
                                <template x-for="(lang, index) in staffForm.languages" :key="index">
                                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
                                        <span x-text="lang"></span>
                                        <button @click="removeLanguage(index)" class="hover:text-blue-900">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </span>
                                </template>
                            </div>
                            <div class="flex gap-2">
                                <input type="text" x-model="newLanguage" placeholder="Add language" @keydown.enter="addLanguage()" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                                <button @click="addLanguage()" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-sm">
                                    Add
                                </button>
                            </div>
                        </div>
                        
                        <div x-show="staffForm.type === 'guide'">
                            <label class="block text-sm font-medium mb-1" style="color: #052734;">Certifications</label>
                            <textarea x-model="staffForm.certifications" rows="2" placeholder="Enter certifications (separated by commas)" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent resize-none" style="--tw-ring-color: #005991;"></textarea>
                        </div>
                        
                        <div x-show="staffForm.type === 'porter'">
                            <label class="block text-sm font-medium mb-1" style="color: #052734;">Maximum Load Capacity (kg)</label>
                            <input type="number" x-model="staffForm.max_load" min="10" max="50" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                        </div>
                    </div>

                    <!-- Status & Availability -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-semibold" style="color: #052734;">Status & Availability</h4>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #052734;">Availability Status</label>
                            <select x-model="staffForm.availability" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                                <option value="available">Available</option>
                                <option value="assigned">Currently Assigned</option>
                                <option value="on_leave">On Leave</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        
                        <div x-show="staffForm.availability === 'on_leave'">
                            <label class="block text-sm font-medium mb-1" style="color: #052734;">Leave Period</label>
                            <div class="grid grid-cols-2 gap-3">
                                <input type="date" x-model="staffForm.leave_start" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                                <input type="date" x-model="staffForm.leave_end" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                            </div>
                        </div>
                    </div>

                    <!-- Emergency Contact -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-semibold" style="color: #052734;">Emergency Contact</h4>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #052734;">Emergency Contact Name</label>
                            <input type="text" x-model="staffForm.emergency_name" placeholder="Contact person name" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #052734;">Emergency Phone</label>
                            <input type="tel" x-model="staffForm.emergency_phone" placeholder="+977 9841 XXXXXX" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Drawer Footer -->
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <button @click="closeStaffDrawer()" class="px-4 py-2 text-sm font-medium border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors" style="color: #052734;">
                        Cancel
                    </button>
                    <button @click="saveStaff()" class="px-4 py-2 text-sm font-medium text-white rounded-lg hover:opacity-90 transition-all" style="background-color: #005991;">
                        <span x-text="isEditingStaff ? 'Update Staff' : 'Add Staff'"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Trek Assignment Modal -->
    <div x-show="showAssignmentModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="px-6 py-4 border-b border-gray-200 sticky top-0 bg-white">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold" style="color: #052734;">Assign Trek</h3>
                    <button @click="showAssignmentModal = false" class="p-1 hover:bg-gray-100 rounded-lg">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="p-6 space-y-6">
                <!-- Staff Selection -->
                <div>
                    <label class="block text-sm font-medium mb-3" style="color: #052734;">Select Staff</label>
                    <div class="border border-gray-300 rounded-lg p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-white" :style="'background-color: ' + selectedStaff.avatar_color" x-text="selectedStaff.name.charAt(0)"></div>
                            <div>
                                <h4 class="font-medium text-gray-900" x-text="selectedStaff.name"></h4>
                                <p class="text-sm text-gray-600" x-text="selectedStaff.type_label"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trek Selection -->
                <div>
                    <label class="block text-sm font-medium mb-3" style="color: #052734;">Select Trek</label>
                    <div class="space-y-3">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <template x-for="trek in availableTreks" :key="trek.id">
                                <div @click="assignmentForm.trek_id = trek.id" :class="assignmentForm.trek_id === trek.id ? 'border-blue-500 bg-blue-50' : 'border-gray-300'" class="p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h4 class="font-medium text-gray-900" x-text="trek.name"></h4>
                                            <p class="text-sm text-gray-500 mt-1" x-text="trek.date_range"></p>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-xs text-gray-500">Needs</div>
                                            <div class="flex gap-1 mt-1">
                                                <span class="text-xs px-2 py-1 rounded" style="background-color: rgba(77, 139, 178, 0.1); color: #4D8BB2;" x-text="trek.guides_needed"></span>
                                                <span class="text-xs px-2 py-1 rounded" style="background-color: rgba(153, 199, 35, 0.1); color: #99C723;" x-text="trek.porters_needed"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Assignment Details -->
                <div class="space-y-4">
                    <h4 class="text-sm font-semibold" style="color: #052734;">Assignment Details</h4>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #052734;">Start Date</label>
                            <input type="date" x-model="assignmentForm.start_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color: #052734;">End Date</label>
                            <input type="date" x-model="assignmentForm.end_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: #052734;">Role in Trek</label>
                        <input type="text" x-model="assignmentForm.role" placeholder="e.g., Lead Guide, Assistant Porter" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: #052734;">Daily Rate (NPR)</label>
                        <input type="number" x-model="assignmentForm.daily_rate" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: #052734;">Additional Notes</label>
                        <textarea x-model="assignmentForm.notes" rows="3" placeholder="Any special instructions or notes..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent resize-none" style="--tw-ring-color: #005991;"></textarea>
                    </div>
                </div>

                <!-- Notification Options -->
                <div>
                    <h4 class="text-sm font-semibold mb-3" style="color: #052734;">Notification</h4>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="checkbox" x-model="assignmentForm.send_whatsapp" class="rounded border-gray-300" style="color: #25D366;">
                            <span class="ml-2 text-sm" style="color: #052734;">Send WhatsApp notification</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" x-model="assignmentForm.send_email" class="rounded border-gray-300" style="color: #005991;">
                            <span class="ml-2 text-sm" style="color: #052734;">Send email confirmation</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" x-model="assignmentForm.add_to_calendar" class="rounded border-gray-300" style="color: #C9302C;">
                            <span class="ml-2 text-sm" style="color: #052734;">Add to staff calendar</span>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="px-6 py-4 border-t border-gray-200 sticky bottom-0 bg-white">
                <div class="flex items-center justify-between">
                    <button @click="showAssignmentModal = false" class="px-4 py-2 text-sm font-medium border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors" style="color: #052734;">
                        Cancel
                    </button>
                    <div class="flex gap-3">
                        <button @click="saveAssignment(true)" class="px-4 py-2 text-sm font-medium text-white rounded-lg hover:opacity-90 transition-all" style="background-color: #25D366;">
                            Save & Notify
                        </button>
                        <button @click="saveAssignment()" class="px-4 py-2 text-sm font-medium text-white rounded-lg hover:opacity-90 transition-all" style="background-color: #005991;">
                            Save Assignment
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- WhatsApp Message Modal -->
    <div x-show="showWhatsAppModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold flex items-center gap-2" style="color: #052734;">
                        <svg class="w-5 h-5" style="color: #25D366;" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.76.982.998-3.675-.236-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.9 6.994c-.004 5.45-4.438 9.88-9.888 9.88m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.333.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.333 11.893-11.893 0-3.18-1.24-6.162-3.495-8.411"/>
                        </svg>
                        WhatsApp Message
                    </h3>
                    <button @click="showWhatsAppModal = false" class="p-1 hover:bg-gray-100 rounded-lg">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="p-6 space-y-4">
                <!-- Recipient Info -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white" :style="'background-color: ' + selectedStaff.avatar_color" x-text="selectedStaff.name.charAt(0)"></div>
                        <div>
                            <h4 class="font-medium text-gray-900" x-text="selectedStaff.name"></h4>
                            <p class="text-sm text-gray-600" x-text="selectedStaff.phone"></p>
                        </div>
                    </div>
                </div>
                
                <!-- Message Type -->
                <div>
                    <label class="block text-sm font-medium mb-2" style="color: #052734;">Message Type</label>
                    <div class="grid grid-cols-2 gap-2">
                        <button @click="selectMessageType('assignment')" :class="whatsAppForm.message_type === 'assignment' ? 'bg-blue-100 border-blue-500' : 'border-gray-300'" class="p-3 border rounded-lg text-sm text-center">
                            Trek Assignment
                        </button>
                        <button @click="selectMessageType('reminder')" :class="whatsAppForm.message_type === 'reminder' ? 'bg-blue-100 border-blue-500' : 'border-gray-300'" class="p-3 border rounded-lg text-sm text-center">
                            Reminder
                        </button>
                        <button @click="selectMessageType('payment')" :class="whatsAppForm.message_type === 'payment' ? 'bg-blue-100 border-blue-500' : 'border-gray-300'" class="p-3 border rounded-lg text-sm text-center">
                            Payment Info
                        </button>
                        <button @click="selectMessageType('custom')" :class="whatsAppForm.message_type === 'custom' ? 'bg-blue-100 border-blue-500' : 'border-gray-300'" class="p-3 border rounded-lg text-sm text-center">
                            Custom
                        </button>
                    </div>
                </div>
                
                <!-- Message Templates -->
                <div x-show="whatsAppForm.message_type !== 'custom'">
                    <label class="block text-sm font-medium mb-2" style="color: #052734;">Template</label>
                    <select x-model="whatsAppForm.template" @change="loadTemplate()" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                        <option value="">Select a template</option>
                        <option value="assignment_confirmation">Trek Assignment Confirmation</option>
                        <option value="pre_trek_briefing">Pre-Trek Briefing</option>
                        <option value="payment_reminder">Payment Reminder</option>
                        <option value="meeting_reminder">Meeting Reminder</option>
                        <option value="documents_reminder">Documents Reminder</option>
                    </select>
                </div>
                
                <!-- Message Content -->
                <div>
                    <label class="block text-sm font-medium mb-2" style="color: #052734;">Message</label>
                    <textarea x-model="whatsAppForm.message" rows="6" placeholder="Type your message here..." class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent resize-none" style="--tw-ring-color: #005991;"></textarea>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xs text-gray-500">Character count: <span x-text="whatsAppForm.message.length"></span></span>
                        <div class="flex gap-2">
                            <button @click="addVariable('{name}')" class="text-xs px-2 py-1 bg-gray-100 hover:bg-gray-200 rounded">
                                {name}
                            </button>
                            <button @click="addVariable('{trek}')" class="text-xs px-2 py-1 bg-gray-100 hover:bg-gray-200 rounded">
                                {trek}
                            </button>
                            <button @click="addVariable('{date}')" class="text-xs px-2 py-1 bg-gray-100 hover:bg-gray-200 rounded">
                                {date}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <button @click="showWhatsAppModal = false" class="px-4 py-2 text-sm font-medium border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors" style="color: #052734;">
                        Cancel
                    </button>
                    <div class="flex gap-3">
                        <button @click="previewMessage()" class="px-4 py-2 text-sm font-medium border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors" style="color: #052734;">
                            Preview
                        </button>
                        <button @click="sendWhatsAppMessage()" class="px-4 py-2 text-sm font-medium text-white rounded-lg hover:opacity-90 transition-all" style="background-color: #25D366;">
                            Send Message
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function guidePorterManagement() {
    return {
        // State Management
        searchQuery: '',
        selectedStatus: '',
        activeType: 'all',
        dateFrom: '',
        dateTo: '',
        
        // Modal/Drawer States
        showStaffDrawer: false,
        showAssignmentModal: false,
        showWhatsAppModal: false,
        isEditingStaff: false,
        
        // Form Data
        staffForm: {
            id: null,
            type: 'guide',
            name: '',
            phone: '',
            email: '',
            experience: 0,
            languages: ['English'],
            certifications: '',
            max_load: 25,
            availability: 'available',
            leave_start: '',
            leave_end: '',
            emergency_name: '',
            emergency_phone: ''
        },
        
        newLanguage: '',
        
        assignmentForm: {
            staff_id: null,
            trek_id: null,
            start_date: '',
            end_date: '',
            role: '',
            daily_rate: 0,
            notes: '',
            send_whatsapp: true,
            send_email: false,
            add_to_calendar: true
        },
        
        whatsAppForm: {
            staff_id: null,
            message_type: 'assignment',
            template: '',
            message: ''
        },
        
        // Sample Data
        selectedStaff: {},
        availableTreks: [
            { id: 1, name: 'Everest Base Camp', date_range: 'Mar 15-30, 2024', guides_needed: 2, porters_needed: 4 },
            { id: 2, name: 'Annapurna Circuit', date_range: 'Mar 10-25, 2024', guides_needed: 1, porters_needed: 3 },
            { id: 3, name: 'Langtang Valley', date_range: 'Mar 20-Apr 5, 2024', guides_needed: 1, porters_needed: 2 },
            { id: 4, name: 'Manaslu Circuit', date_range: 'Apr 5-20, 2024', guides_needed: 2, porters_needed: 5 }
        ],
        
        // Template Messages
        messageTemplates: {
            assignment_confirmation: "Hello {name},\n\nYou have been assigned to {trek} starting on {date}. Please confirm your availability and review the trek details.\n\nBest regards,\nAME Treks Team",
            pre_trek_briefing: "Hello {name},\n\nPre-trek briefing for {trek} is scheduled for tomorrow at 10 AM at our office. Please bring your documents and gear for review.\n\nBest regards,\nAME Treks Team",
            payment_reminder: "Hello {name},\n\nThis is a reminder about your pending payment for the upcoming {trek}. Please clear the payment at your earliest convenience.\n\nBest regards,\nAME Treks Team"
        },
        
        // Methods
        openAddStaffDrawer() {
            this.isEditingStaff = false;
            this.resetStaffForm();
            this.showStaffDrawer = true;
        },
        
        editStaff(id) {
            this.isEditingStaff = true;
            // In real app, fetch staff data by ID
            this.staffForm = {
                id: id,
                type: 'guide',
                name: 'Sample Guide',
                phone: '+977 9841 000000',
                email: 'guide@ametreks.com',
                experience: 5,
                languages: ['English', 'Nepali'],
                certifications: 'Wilderness First Aid',
                max_load: 25,
                availability: 'available',
                emergency_name: 'Emergency Contact',
                emergency_phone: '+977 9841 111111'
            };
            this.showStaffDrawer = true;
        },
        
        assignTrek(id) {
            this.selectedStaff = this.getStaffById(id);
            this.assignmentForm.staff_id = id;
            this.assignmentForm.start_date = new Date().toISOString().split('T')[0];
            this.showAssignmentModal = true;
        },
        
        quickAssign(id) {
            // Quick assign to next available trek
            const staff = this.getStaffById(id);
            if (staff && staff.availability === 'available') {
                this.assignTrek(id);
            }
        },
        
        sendWhatsApp(id) {
            this.selectedStaff = this.getStaffById(id);
            this.whatsAppForm.staff_id = id;
            this.whatsAppForm.message_type = 'assignment';
            this.loadDefaultTemplate();
            this.showWhatsAppModal = true;
        },
        
        sendBulkWhatsApp() {
            // In real app, show bulk selection modal
            alert('Bulk WhatsApp feature would open selection modal');
        },
        
        openBulkAssignment() {
            // In real app, show bulk assignment modal
            alert('Bulk assignment feature would open selection modal');
        },
        
        openQuickAssignDrawer() {
            // Toggle quick assign dropdown
        },
        
        viewDetails(id) {
            // In real app, navigate to staff details page
            const staff = this.getStaffById(id);
            alert(`Viewing details for: ${staff.name}`);
        },
        
        viewTrekDetails(trekName) {
            alert(`Viewing trek details for: ${trekName}`);
        },
        
        changeStatus(id, status) {
            if (confirm(`Change staff status to ${status}?`)) {
                console.log(`Status changed for staff ${id}: ${status}`);
                // API call to update status
            }
        },
        
        saveStaff() {
            if (this.validateStaffForm()) {
                console.log('Saving staff:', this.staffForm);
                // API call to save/update staff
                this.closeStaffDrawer();
                this.resetStaffForm();
            }
        },
        
        saveAssignment(notify = false) {
            if (this.validateAssignmentForm()) {
                console.log('Saving assignment:', this.assignmentForm);
                if (notify) {
                    this.sendAssignmentNotification();
                }
                this.showAssignmentModal = false;
                this.resetAssignmentForm();
            }
        },
        
        sendAssignmentNotification() {
            console.log('Sending assignment notification');
            // API call to send notification
        },
        
        sendWhatsAppMessage() {
            if (this.whatsAppForm.message.trim()) {
                console.log('Sending WhatsApp message:', this.whatsAppForm);
                // API call to send WhatsApp message
                alert('WhatsApp message sent successfully!');
                this.showWhatsAppModal = false;
                this.resetWhatsAppForm();
            }
        },
        
        selectMessageType(type) {
            this.whatsAppForm.message_type = type;
            this.loadDefaultTemplate();
        },
        
        loadTemplate() {
            if (this.whatsAppForm.template && this.messageTemplates[this.whatsAppForm.template]) {
                this.whatsAppForm.message = this.messageTemplates[this.whatsAppForm.template]
                    .replace('{name}', this.selectedStaff.name)
                    .replace('{trek}', 'Everest Base Camp') // In real app, get from assignment
                    .replace('{date}', new Date().toLocaleDateString());
            }
        },
        
        loadDefaultTemplate() {
            this.whatsAppForm.message = `Hello ${this.selectedStaff.name},\n\n`;
            if (this.whatsAppForm.message_type === 'assignment') {
                this.whatsAppForm.message += 'You have been assigned to an upcoming trek. Please check your email for details.\n\nBest regards,\nAME Treks Team';
            } else if (this.whatsAppForm.message_type === 'reminder') {
                this.whatsAppForm.message += 'This is a reminder about your upcoming assignment.\n\nBest regards,\nAME Treks Team';
            }
        },
        
        addVariable(variable) {
            this.whatsAppForm.message += variable;
        },
        
        previewMessage() {
            alert('Message Preview:\n\n' + this.whatsAppForm.message);
        },
        
        generateReports() {
            alert('Report generation feature');
        },
        
        // Helper Methods
        getStaffById(id) {
            // In real app, fetch from API
            return { id: id, name: 'Sample Staff', avatar_color: '#005991', phone: '+977 9841 000000', type_label: 'Guide' };
        },
        
        addLanguage() {
            if (this.newLanguage.trim() && !this.staffForm.languages.includes(this.newLanguage.trim())) {
                this.staffForm.languages.push(this.newLanguage.trim());
                this.newLanguage = '';
            }
        },
        
        removeLanguage(index) {
            this.staffForm.languages.splice(index, 1);
        },
        
        // Validation Methods
        validateStaffForm() {
            return this.staffForm.name && this.staffForm.phone;
        },
        
        validateAssignmentForm() {
            return this.assignmentForm.staff_id && this.assignmentForm.trek_id && 
                   this.assignmentForm.start_date && this.assignmentForm.end_date;
        },
        
        // Reset Methods
        resetStaffForm() {
            this.staffForm = {
                id: null,
                type: 'guide',
                name: '',
                phone: '',
                email: '',
                experience: 0,
                languages: ['English'],
                certifications: '',
                max_load: 25,
                availability: 'available',
                leave_start: '',
                leave_end: '',
                emergency_name: '',
                emergency_phone: ''
            };
            this.newLanguage = '';
        },
        
        resetAssignmentForm() {
            this.assignmentForm = {
                staff_id: null,
                trek_id: null,
                start_date: '',
                end_date: '',
                role: '',
                daily_rate: 0,
                notes: '',
                send_whatsapp: true,
                send_email: false,
                add_to_calendar: true
            };
        },
        
        resetWhatsAppForm() {
            this.whatsAppForm = {
                staff_id: null,
                message_type: 'assignment',
                template: '',
                message: ''
            };
        },
        
        closeStaffDrawer() {
            this.showStaffDrawer = false;
            this.resetStaffForm();
        }
    };
}
</script>
@endsection