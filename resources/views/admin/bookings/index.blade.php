@extends('admin.layouts')

@section('title', 'Manage Bookings')

@section('content')
<div x-data="bookingsManager()" class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold" style="color: #052734;">Manage Bookings</h1>
            <p class="text-sm mt-1" style="color: #6D6E70;">Track and manage all trek bookings</p>
        </div>
        <button @click="openAddDrawer()" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-white font-medium rounded-lg transition-all hover:opacity-90 shadow-lg hover:shadow-xl" style="background-color: #005991;">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Booking
        </button>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(0, 89, 145, 0.1);">
                    <svg class="w-5 h-5" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Total</p>
                    <p class="text-xl font-bold" style="color: #052734;">{{ $stats['total'] ?? 248 }}</p>
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
                    <p class="text-xs font-medium" style="color: #6D6E70;">Pending</p>
                    <p class="text-xl font-bold text-yellow-600">{{ $stats['pending'] ?? 18 }}</p>
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
                    <p class="text-xs font-medium" style="color: #6D6E70;">Confirmed</p>
                    <p class="text-xl font-bold" style="color: #99C723;">{{ $stats['confirmed'] ?? 156 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(0, 89, 145, 0.1);">
                    <svg class="w-5 h-5" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Completed</p>
                    <p class="text-xl font-bold" style="color: #005991;">{{ $stats['completed'] ?? 62 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 col-span-2 lg:col-span-1">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(201, 48, 44, 0.1);">
                    <svg class="w-5 h-5" style="color: #C9302C;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Cancelled</p>
                    <p class="text-xl font-bold" style="color: #C9302C;">{{ $stats['cancelled'] ?? 12 }}</p>
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
                <input type="text" x-model="searchQuery" placeholder="Search by name, email, booking ID..." class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 text-sm" style="--tw-ring-color: #005991;">
            </div>
            
            <!-- Status Filter -->
            <div class="flex flex-wrap gap-2">
                <template x-for="status in statuses" :key="status.value">
                    <button @click="activeStatus = status.value" :class="activeStatus === status.value ? 'text-white' : 'bg-gray-100 hover:bg-gray-200'" :style="activeStatus === status.value ? 'background-color: ' + status.color : 'color: #052734'" class="px-4 py-2 rounded-lg text-sm font-medium transition-all">
                        <span x-text="status.label"></span>
                    </button>
                </template>
            </div>

            <!-- Date Range -->
            <div class="flex items-center gap-2">
                <input type="date" x-model="dateFrom" class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
                <span style="color: #6D6E70;">to</span>
                <input type="date" x-model="dateTo" class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
            </div>
        </div>
    </div>

    <!-- Bookings Table (Desktop) -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead style="background-color: #052734;">
                    <tr>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Booking ID</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Customer</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Trek</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Date</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Travelers</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Amount</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Status</th>
                        <th class="text-center text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php
                        $sampleBookings = $bookings ?? collect([
                            (object)[
                                'id' => 1,
                                'customer_name' => 'John Smith',
                                'customer_email' => 'john.smith@email.com',
                                'trek_name' => 'Everest Base Camp',
                                'trek_duration' => '14 Days',
                                'trek_date' => 'Mar 15, 2024',
                                'travelers' => 2,
                                'amount' => 2500,
                                'status' => 'confirmed'
                            ],
                            (object)[
                                'id' => 2,
                                'customer_name' => 'Sarah Johnson',
                                'customer_email' => 'sarah.j@email.com',
                                'trek_name' => 'Annapurna Circuit',
                                'trek_duration' => '18 Days',
                                'trek_date' => 'Apr 02, 2024',
                                'travelers' => 4,
                                'amount' => 4800,
                                'status' => 'pending'
                            ],
                            (object)[
                                'id' => 3,
                                'customer_name' => 'Mike Williams',
                                'customer_email' => 'mike.w@email.com',
                                'trek_name' => 'Langtang Valley',
                                'trek_duration' => '10 Days',
                                'trek_date' => 'Feb 28, 2024',
                                'travelers' => 1,
                                'amount' => 1200,
                                'status' => 'completed'
                            ]
                        ]);
                    @endphp

                    @forelse($sampleBookings as $booking)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <span class="font-mono text-sm font-semibold" style="color: #005991;">#{{ $booking->id ?? 'TRK-2024-001' }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm font-semibold" style="background-color: #4D8BB2;">
                                    {{ substr($booking->customer_name ?? 'John Doe', 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-medium" style="color: #052734;">{{ $booking->customer_name ?? 'John Doe' }}</p>
                                    <p class="text-xs" style="color: #6D6E70;">{{ $booking->customer_email ?? 'john@example.com' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-medium" style="color: #052734;">{{ $booking->trek_name ?? 'Everest Base Camp' }}</p>
                            <p class="text-xs" style="color: #6D6E70;">{{ $booking->trek_duration ?? '14 Days' }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm" style="color: #052734;">{{ $booking->trek_date ?? 'Mar 15, 2024' }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" style="color: #6D6E70;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="text-sm" style="color: #052734;">{{ $booking->travelers ?? 2 }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-semibold" style="color: #99C723;">${{ number_format($booking->amount ?? 2500) }}</p>
                        </td>
                        <td class="px-6 py-4">
                            @php $status = $booking->status ?? 'confirmed'; @endphp
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium
                                @if($status == 'pending') bg-yellow-100 text-yellow-700
                                @elseif($status == 'confirmed') text-white
                                @elseif($status == 'completed') text-white
                                @else bg-red-100 text-red-700
                                @endif"
                                @if($status == 'confirmed') style="background-color: #99C723;"
                                @elseif($status == 'completed') style="background-color: #005991;"
                                @endif>
                                <span class="w-1.5 h-1.5 rounded-full 
                                    @if($status == 'pending') bg-yellow-500
                                    @elseif($status == 'confirmed') bg-white
                                    @elseif($status == 'completed') bg-white
                                    @else bg-red-500
                                    @endif"></span>
                                {{ ucfirst($status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-1">
                                <button @click="viewBooking({{ $booking->id ?? 1 }})" class="p-2 rounded-lg hover:bg-gray-100 transition-colors" title="View">
                                    <svg class="w-4 h-4" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button @click="editBooking({{ $booking->id ?? 1 }})" class="p-2 rounded-lg hover:bg-gray-100 transition-colors" title="Edit">
                                    <svg class="w-4 h-4" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <button @click="confirmCancel({{ $booking->id ?? 1 }})" class="p-2 rounded-lg hover:bg-red-50 transition-colors" title="Cancel">
                                    <svg class="w-4 h-4" style="color: #C9302C;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <p class="text-lg font-semibold text-gray-500">No bookings found</p>
                                <p class="text-sm text-gray-400 mt-1">Start by creating your first booking</p>
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
        <p class="text-sm" style="color: #6D6E70;">Showing <span class="font-semibold" style="color: #052734;">1-10</span> of <span class="font-semibold" style="color: #052734;">248</span> bookings</p>
        <div class="flex items-center gap-2">
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors disabled:opacity-50" style="color: #052734;" disabled>
                Previous
            </button>
            <button class="px-3 py-2 rounded-lg text-sm font-medium text-white" style="background-color: #005991;">1</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">2</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">3</button>
            <span style="color: #6D6E70;">...</span>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">25</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">
                Next
            </button>
        </div>
    </div>

    <!-- View Booking Drawer -->
    <div x-show="showViewDrawer" x-cloak class="fixed inset-0 z-50 overflow-hidden" @keydown.escape.window="showViewDrawer = false">
        <div x-show="showViewDrawer" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/50" @click="showViewDrawer = false"></div>
        
        <div x-show="showViewDrawer" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition-transform ease-in duration-200" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="absolute inset-y-0 right-0 w-full max-w-lg bg-white shadow-2xl flex flex-col">
            <!-- Drawer Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100" style="background-color: #052734;">
                <div>
                    <h2 class="text-lg font-semibold text-white">Booking Details</h2>
                    <p class="text-sm text-white/70">#TRK-2024-001</p>
                </div>
                <button @click="showViewDrawer = false" class="p-2 rounded-lg hover:bg-white/10 transition-colors">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Drawer Content -->
            <div class="flex-1 overflow-y-auto p-6 space-y-6">
                <!-- Status Banner -->
                <div class="flex items-center justify-between p-4 rounded-xl" style="background-color: rgba(153, 199, 35, 0.1);">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center" style="background-color: #99C723;">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold" style="color: #052734;">Confirmed</p>
                            <p class="text-xs" style="color: #6D6E70;">Payment received</p>
                        </div>
                    </div>
                    <span class="text-lg font-bold" style="color: #99C723;">$2,500</span>
                </div>

                <!-- Customer Info -->
                <div>
                    <h3 class="text-sm font-semibold mb-3" style="color: #052734;">Customer Information</h3>
                    <div class="bg-gray-50 rounded-xl p-4 space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-semibold" style="background-color: #4D8BB2;">JS</div>
                            <div>
                                <p class="font-semibold" style="color: #052734;">John Smith</p>
                                <p class="text-sm" style="color: #6D6E70;">Premium Member</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 pt-3 border-t border-gray-200">
                            <div>
                                <p class="text-xs" style="color: #6D6E70;">Email</p>
                                <p class="text-sm font-medium" style="color: #052734;">john.smith@email.com</p>
                            </div>
                            <div>
                                <p class="text-xs" style="color: #6D6E70;">Phone</p>
                                <p class="text-sm font-medium" style="color: #052734;">+1 234 567 890</p>
                            </div>
                            <div class="col-span-2">
                                <p class="text-xs" style="color: #6D6E70;">Address</p>
                                <p class="text-sm font-medium" style="color: #052734;">123 Main St, New York, NY 10001</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trek Details -->
                <div>
                    <h3 class="text-sm font-semibold mb-3" style="color: #052734;">Trek Details</h3>
                    <div class="bg-gray-50 rounded-xl overflow-hidden">
                        <img src="/placeholder.svg?height=150&width=400" alt="Trek" class="w-full h-32 object-cover">
                        <div class="p-4 space-y-3">
                            <div>
                                <p class="font-semibold" style="color: #052734;">Everest Base Camp Trek</p>
                                <p class="text-sm" style="color: #6D6E70;">14 Days Adventure</p>
                            </div>
                            <div class="grid grid-cols-2 gap-3 pt-3 border-t border-gray-200">
                                <div>
                                    <p class="text-xs" style="color: #6D6E70;">Start Date</p>
                                    <p class="text-sm font-medium" style="color: #052734;">Mar 15, 2024</p>
                                </div>
                                <div>
                                    <p class="text-xs" style="color: #6D6E70;">End Date</p>
                                    <p class="text-sm font-medium" style="color: #052734;">Mar 29, 2024</p>
                                </div>
                                <div>
                                    <p class="text-xs" style="color: #6D6E70;">Travelers</p>
                                    <p class="text-sm font-medium" style="color: #052734;">2 Adults</p>
                                </div>
                                <div>
                                    <p class="text-xs" style="color: #6D6E70;">Difficulty</p>
                                    <p class="text-sm font-medium" style="color: #C9302C;">Challenging</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Summary -->
                <div>
                    <h3 class="text-sm font-semibold mb-3" style="color: #052734;">Payment Summary</h3>
                    <div class="bg-gray-50 rounded-xl p-4 space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm" style="color: #6D6E70;">Trek Cost (2 persons)</span>
                            <span class="text-sm font-medium" style="color: #052734;">$2,200</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm" style="color: #6D6E70;">Porter Service</span>
                            <span class="text-sm font-medium" style="color: #052734;">$200</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm" style="color: #6D6E70;">Travel Insurance</span>
                            <span class="text-sm font-medium" style="color: #052734;">$100</span>
                        </div>
                        <div class="flex justify-between pt-3 border-t border-gray-200">
                            <span class="font-semibold" style="color: #052734;">Total Paid</span>
                            <span class="font-bold" style="color: #99C723;">$2,500</span>
                        </div>
                    </div>
                </div>

                <!-- Special Requests -->
                <div>
                    <h3 class="text-sm font-semibold mb-3" style="color: #052734;">Special Requests</h3>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <p class="text-sm" style="color: #6D6E70;">Vegetarian meals preferred. Would like a window seat on flights if possible. Celebrating our anniversary during the trek.</p>
                    </div>
                </div>
            </div>

            <!-- Drawer Footer -->
            <div class="flex items-center gap-3 px-6 py-4 border-t border-gray-100 bg-gray-50">
                <button @click="editBooking(1)" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-all border-2 hover:bg-gray-100" style="color: #005991; border-color: #005991;">
                    Edit Booking
                </button>
                <button class="flex-1 px-4 py-2.5 rounded-lg text-white font-medium transition-all hover:opacity-90" style="background-color: #005991;">
                    Send Confirmation
                </button>
            </div>
        </div>
    </div>

    <!-- Add/Edit Booking Drawer -->
    <div x-show="showAddDrawer" x-cloak class="fixed inset-0 z-50 overflow-hidden" @keydown.escape.window="showAddDrawer = false">
        <div x-show="showAddDrawer" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/50" @click="showAddDrawer = false"></div>
        
        <div x-show="showAddDrawer" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition-transform ease-in duration-200" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="absolute inset-y-0 right-0 w-full max-w-lg bg-white shadow-2xl flex flex-col">
            <!-- Drawer Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100" style="background-color: #052734;">
                <div>
                    <h2 class="text-lg font-semibold text-white" x-text="editMode ? 'Edit Booking' : 'Add New Booking'"></h2>
                    <p class="text-sm text-white/70" x-text="editMode ? 'Update booking details' : 'Create a new trek booking'"></p>
                </div>
                <button @click="showAddDrawer = false" class="p-2 rounded-lg hover:bg-white/10 transition-colors">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Drawer Content -->
            <div class="flex-1 overflow-y-auto p-6">
                <form @submit.prevent="submitBooking()" class="space-y-6">
                    <!-- Customer Information -->
                    <div>
                        <h3 class="text-sm font-semibold mb-4 flex items-center gap-2" style="color: #052734;">
                            <svg class="w-4 h-4" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Customer Information
                        </h3>
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">First Name *</label>
                                    <input type="text" x-model="form.firstName" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;" placeholder="John">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Last Name *</label>
                                    <input type="text" x-model="form.lastName" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;" placeholder="Smith">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Email Address *</label>
                                <input type="email" x-model="form.email" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;" placeholder="john@example.com">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Phone Number *</label>
                                    <input type="tel" x-model="form.phone" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;" placeholder="+1 234 567 890">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Country</label>
                                    <select x-model="form.country" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                                        <option value="">Select Country</option>
                                        <option value="US">United States</option>
                                        <option value="UK">United Kingdom</option>
                                        <option value="CA">Canada</option>
                                        <option value="AU">Australia</option>
                                        <option value="DE">Germany</option>
                                        <option value="FR">France</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Trek Selection -->
                    <div>
                        <h3 class="text-sm font-semibold mb-4 flex items-center gap-2" style="color: #052734;">
                            <svg class="w-4 h-4" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Trek Details
                        </h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Select Trek *</label>
                                <select x-model="form.trek" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                                    <option value="">Choose a trek</option>
                                    <option value="everest">Everest Base Camp - 14 Days ($1,250/person)</option>
                                    <option value="annapurna">Annapurna Circuit - 18 Days ($1,200/person)</option>
                                    <option value="langtang">Langtang Valley - 10 Days ($850/person)</option>
                                    <option value="manaslu">Manaslu Circuit - 16 Days ($1,400/person)</option>
                                    <option value="gokyo">Gokyo Lakes - 12 Days ($1,100/person)</option>
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Start Date *</label>
                                    <input type="date" x-model="form.startDate" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Number of Travelers *</label>
                                    <input type="number" x-model="form.travelers" min="1" max="20" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;" placeholder="2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add-ons -->
                    <div>
                        <h3 class="text-sm font-semibold mb-4 flex items-center gap-2" style="color: #052734;">
                            <svg class="w-4 h-4" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Add-ons (Optional)
                        </h3>
                        <div class="space-y-3">
                            <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                <input type="checkbox" x-model="form.addons.porter" class="w-4 h-4 rounded" style="accent-color: #005991;">
                                <div class="flex-1">
                                    <p class="text-sm font-medium" style="color: #052734;">Porter Service</p>
                                    <p class="text-xs" style="color: #6D6E70;">Personal porter to carry your luggage</p>
                                </div>
                                <span class="text-sm font-semibold" style="color: #99C723;">+$100</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                <input type="checkbox" x-model="form.addons.insurance" class="w-4 h-4 rounded" style="accent-color: #005991;">
                                <div class="flex-1">
                                    <p class="text-sm font-medium" style="color: #052734;">Travel Insurance</p>
                                    <p class="text-xs" style="color: #6D6E70;">Comprehensive travel & medical coverage</p>
                                </div>
                                <span class="text-sm font-semibold" style="color: #99C723;">+$50</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                <input type="checkbox" x-model="form.addons.privateRoom" class="w-4 h-4 rounded" style="accent-color: #005991;">
                                <div class="flex-1">
                                    <p class="text-sm font-medium" style="color: #052734;">Private Room Upgrade</p>
                                    <p class="text-xs" style="color: #6D6E70;">Private rooms at teahouses</p>
                                </div>
                                <span class="text-sm font-semibold" style="color: #99C723;">+$200</span>
                            </label>
                        </div>
                    </div>

                    <!-- Special Requests -->
                    <div>
                        <h3 class="text-sm font-semibold mb-4 flex items-center gap-2" style="color: #052734;">
                            <svg class="w-4 h-4" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                            </svg>
                            Special Requests
                        </h3>
                        <textarea x-model="form.specialRequests" rows="3" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent resize-none" style="--tw-ring-color: #005991;" placeholder="Any dietary requirements, medical conditions, or special requests..."></textarea>
                    </div>

                    <!-- Booking Status -->
                    <div>
                        <h3 class="text-sm font-semibold mb-4 flex items-center gap-2" style="color: #052734;">
                            <svg class="w-4 h-4" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Booking Status
                        </h3>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="flex items-center gap-3 p-3 border-2 rounded-lg cursor-pointer transition-all" :class="form.status === 'pending' ? 'border-yellow-400 bg-yellow-50' : 'border-gray-200 hover:border-gray-300'">
                                <input type="radio" x-model="form.status" value="pending" name="status" class="w-4 h-4" style="accent-color: #F59E0B;">
                                <div>
                                    <p class="text-sm font-medium" style="color: #052734;">Pending</p>
                                    <p class="text-xs" style="color: #6D6E70;">Awaiting payment</p>
                                </div>
                            </label>
                            <label class="flex items-center gap-3 p-3 border-2 rounded-lg cursor-pointer transition-all" :class="form.status === 'confirmed' ? 'bg-green-50' : 'border-gray-200 hover:border-gray-300'" :style="form.status === 'confirmed' ? 'border-color: #99C723' : ''">
                                <input type="radio" x-model="form.status" value="confirmed" name="status" class="w-4 h-4" style="accent-color: #99C723;">
                                <div>
                                    <p class="text-sm font-medium" style="color: #052734;">Confirmed</p>
                                    <p class="text-xs" style="color: #6D6E70;">Payment received</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Drawer Footer -->
            <div class="flex items-center gap-3 px-6 py-4 border-t border-gray-100 bg-gray-50">
                <button @click="showAddDrawer = false" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-all border border-gray-300 hover:bg-gray-100" style="color: #052734;">
                    Cancel
                </button>
                <button @click="submitBooking()" class="flex-1 px-4 py-2.5 rounded-lg text-white font-medium transition-all hover:opacity-90" style="background-color: #005991;">
                    <span x-text="editMode ? 'Update Booking' : 'Create Booking'"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Cancel Confirmation Modal -->
    <div x-show="showCancelModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" @keydown.escape.window="showCancelModal = false">
        <div x-show="showCancelModal" x-transition:enter="transition-opacity ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/50" @click="showCancelModal = false"></div>
        
        <div x-show="showCancelModal" x-transition:enter="transition-all ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full p-6">
            <div class="text-center">
                <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: rgba(201, 48, 44, 0.1);">
                    <svg class="w-8 h-8" style="color: #C9302C;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2" style="color: #052734;">Cancel Booking?</h3>
                <p class="text-sm mb-6" style="color: #6D6E70;">Are you sure you want to cancel this booking? This action cannot be undone and the customer will be notified.</p>
                <div class="flex items-center gap-3">
                    <button @click="showCancelModal = false" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-all border border-gray-300 hover:bg-gray-100" style="color: #052734;">
                        Keep Booking
                    </button>
                    <button @click="cancelBooking()" class="flex-1 px-4 py-2.5 rounded-lg text-white font-medium transition-all hover:opacity-90" style="background-color: #C9302C;">
                        Yes, Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function bookingsManager() {
    return {
        searchQuery: '',
        activeStatus: 'all',
        dateFrom: '',
        dateTo: '',
        showViewDrawer: false,
        showAddDrawer: false,
        showCancelModal: false,
        editMode: false,
        selectedBookingId: null,
        statuses: [
            { value: 'all', label: 'All', color: '#005991' },
            { value: 'pending', label: 'Pending', color: '#F59E0B' },
            { value: 'confirmed', label: 'Confirmed', color: '#99C723' },
            { value: 'completed', label: 'Completed', color: '#005991' },
            { value: 'cancelled', label: 'Cancelled', color: '#C9302C' }
        ],
        form: {
            firstName: '',
            lastName: '',
            email: '',
            phone: '',
            country: '',
            trek: '',
            startDate: '',
            travelers: 1,
            addons: {
                porter: false,
                insurance: false,
                privateRoom: false
            },
            specialRequests: '',
            status: 'pending'
        },
        
        openAddDrawer() {
            this.editMode = false;
            this.resetForm();
            this.showAddDrawer = true;
        },
        
        viewBooking(id) {
            this.selectedBookingId = id;
            this.showViewDrawer = true;
        },
        
        editBooking(id) {
            this.editMode = true;
            this.selectedBookingId = id;
            // In real app, fetch booking data and populate form
            this.showViewDrawer = false;
            this.showAddDrawer = true;
        },
        
        confirmCancel(id) {
            this.selectedBookingId = id;
            this.showCancelModal = true;
        },
        
        cancelBooking() {
            // In real app, send cancel request to server
            this.showCancelModal = false;
            // Show success notification
        },
        
        submitBooking() {
            // In real app, send form data to server
            this.showAddDrawer = false;
            this.resetForm();
        },
        
        resetForm() {
            this.form = {
                firstName: '',
                lastName: '',
                email: '',
                phone: '',
                country: '',
                trek: '',
                startDate: '',
                travelers: 1,
                addons: {
                    porter: false,
                    insurance: false,
                    privateRoom: false
                },
                specialRequests: '',
                status: 'pending'
            };
        }
    }
}
</script>
@endsection