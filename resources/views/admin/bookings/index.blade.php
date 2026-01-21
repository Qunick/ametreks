{{-- resources/views/admin/bookings/index.blade.php --}}
@extends('admin.layouts')

@section('title', 'Manage Bookings')

@section('content')
<div x-data="bookingData()" class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Manage Bookings</h1>
            <p class="text-sm text-gray-600 mt-1">Track and manage all trek bookings</p>
        </div>
        <div class="flex items-center gap-3">
            <!-- Export Button -->
            <button @click="exportBookings()" class="hidden sm:flex items-center gap-2 px-4 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Export
            </button>
            <!-- Add Booking Button -->
            <button @click="openAddDrawer()" class="flex items-center gap-2 px-4 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors shadow-sm hover:shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add Booking
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
        <div class="bg-white rounded-xl p-4 shadow border border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-600">Total</p>
                    <p class="text-xl font-bold text-gray-900">{{ $stats['total'] ?? 248 }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow border border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-yellow-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-600">Pending</p>
                    <p class="text-xl font-bold text-yellow-600">{{ $stats['pending'] ?? 18 }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow border border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-green-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-600">Confirmed</p>
                    <p class="text-xl font-bold text-green-600">{{ $stats['confirmed'] ?? 156 }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow border border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-600">Completed</p>
                    <p class="text-xl font-bold text-blue-600">{{ $stats['completed'] ?? 62 }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow border border-gray-200 md:col-span-2 lg:col-span-1">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-red-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-600">Cancelled</p>
                    <p class="text-xl font-bold text-red-600">{{ $stats['cancelled'] ?? 12 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters & Search -->
    <div class="bg-white rounded-xl shadow border border-gray-200 p-4">
        <div class="flex flex-col lg:flex-row lg:items-center gap-4">
            <!-- Search -->
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" x-model="searchQuery" @input="debounceSearch()" placeholder="Search by name, email, booking ID..." class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
            </div>
            
            <!-- Status Filter -->
            <div class="flex flex-wrap gap-2">
                <template x-for="status in statuses" :key="status.value">
                    <button @click="activeStatus = status.value" :class="activeStatus === status.value ? 'text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'" :style="activeStatus === status.value ? 'background-color: ' + status.color : ''" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        <span x-text="status.label"></span>
                    </button>
                </template>
            </div>

            <!-- Date Range -->
            <div class="flex items-center gap-2">
                <input type="date" x-model="dateFrom" @change="filterByDate()" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <span class="text-gray-600">to</span>
                <input type="date" x-model="dateTo" @change="filterByDate()" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>
    </div>

    <!-- Bookings Table -->
    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">
        <!-- Desktop Table -->
        <div class="hidden lg:block overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left text-xs font-semibold text-gray-700 uppercase tracking-wider px-6 py-4">
                            <button @click="sortBy('id')" class="flex items-center gap-1 hover:text-gray-900">
                                Booking ID
                                <svg class="w-4 h-4" :class="sortField === 'id' ? 'text-blue-600' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                </svg>
                            </button>
                        </th>
                        <th class="text-left text-xs font-semibold text-gray-700 uppercase tracking-wider px-6 py-4">Customer</th>
                        <th class="text-left text-xs font-semibold text-gray-700 uppercase tracking-wider px-6 py-4">Trek</th>
                        <th class="text-left text-xs font-semibold text-gray-700 uppercase tracking-wider px-6 py-4">Date</th>
                        <th class="text-left text-xs font-semibold text-gray-700 uppercase tracking-wider px-6 py-4">Travelers</th>
                        <th class="text-left text-xs font-semibold text-gray-700 uppercase tracking-wider px-6 py-4">
                            <button @click="sortBy('amount')" class="flex items-center gap-1 hover:text-gray-900">
                                Amount
                                <svg class="w-4 h-4" :class="sortField === 'amount' ? 'text-blue-600' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                </svg>
                            </button>
                        </th>
                        <th class="text-left text-xs font-semibold text-gray-700 uppercase tracking-wider px-6 py-4">Status</th>
                        <th class="text-center text-xs font-semibold text-gray-700 uppercase tracking-wider px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <template x-for="booking in filteredBookings" :key="booking.id">
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <span class="font-mono text-sm font-semibold text-blue-600" x-text="'#' + booking.id"></span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-blue-500 flex items-center justify-center text-white text-sm font-semibold" x-text="booking.customer_name?.charAt(0) || '?'"></div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900" x-text="booking.customer_name"></p>
                                        <p class="text-xs text-gray-600" x-text="booking.customer_email"></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-medium text-gray-900" x-text="booking.trek_name"></p>
                                <p class="text-xs text-gray-600" x-text="booking.trek_duration"></p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-gray-900" x-text="formatDate(booking.trek_date)"></p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="text-sm text-gray-900" x-text="booking.travelers"></span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-semibold text-green-600" x-text="'$' + formatCurrency(booking.amount)"></p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium"
                                      :class="{
                                          'bg-yellow-100 text-yellow-800': booking.status === 'pending',
                                          'bg-green-100 text-green-800': booking.status === 'confirmed',
                                          'bg-blue-100 text-blue-800': booking.status === 'completed',
                                          'bg-red-100 text-red-800': booking.status === 'cancelled'
                                      }">
                                    <span class="w-1.5 h-1.5 rounded-full"
                                          :class="{
                                              'bg-yellow-500': booking.status === 'pending',
                                              'bg-green-500': booking.status === 'confirmed',
                                              'bg-blue-500': booking.status === 'completed',
                                              'bg-red-500': booking.status === 'cancelled'
                                          }"></span>
                                    <span x-text="capitalize(booking.status)"></span>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button @click="viewBooking(booking)" class="p-2 rounded-lg hover:bg-gray-100 transition-colors text-gray-600 hover:text-blue-600" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <button @click="editBooking(booking)" class="p-2 rounded-lg hover:bg-gray-100 transition-colors text-gray-600 hover:text-green-600" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button @click="confirmStatusChange(booking, 'cancelled')" x-show="booking.status !== 'cancelled'" class="p-2 rounded-lg hover:bg-red-50 transition-colors text-gray-600 hover:text-red-600" title="Cancel">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                    <button @click="deleteBooking(booking)" class="p-2 rounded-lg hover:bg-red-50 transition-colors text-gray-600 hover:text-red-600" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                    
                    <tr x-show="filteredBookings.length === 0">
                        <td colspan="8" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <p class="text-lg font-semibold text-gray-500">No bookings found</p>
                                <p class="text-sm text-gray-400 mt-1">Try adjusting your filters or create a new booking</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Mobile Cards -->
        <div class="lg:hidden divide-y divide-gray-200">
            <template x-for="booking in filteredBookings" :key="booking.id">
                <div class="p-4">
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <div>
                            <span class="font-mono text-sm font-semibold text-blue-600" x-text="'#' + booking.id"></span>
                            <p class="text-sm font-medium text-gray-900 mt-1" x-text="booking.customer_name"></p>
                        </div>
                        <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-medium"
                              :class="{
                                  'bg-yellow-100 text-yellow-800': booking.status === 'pending',
                                  'bg-green-100 text-green-800': booking.status === 'confirmed',
                                  'bg-blue-100 text-blue-800': booking.status === 'completed',
                                  'bg-red-100 text-red-800': booking.status === 'cancelled'
                              }">
                            <span x-text="capitalize(booking.status)"></span>
                        </span>
                    </div>
                    
                    <div class="space-y-2">
                        <p class="text-sm text-gray-900" x-text="booking.trek_name"></p>
                        <div class="flex items-center justify-between text-sm text-gray-600">
                            <span x-text="formatDate(booking.trek_date)"></span>
                            <span x-text="booking.travelers + ' travelers'"></span>
                            <span class="font-semibold text-green-600" x-text="'$' + formatCurrency(booking.amount)"></span>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-2 pt-3 mt-3 border-t border-gray-200">
                        <button @click="viewBooking(booking)" class="flex-1 px-3 py-2 text-sm font-medium text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                            View
                        </button>
                        <button @click="editBooking(booking)" class="flex-1 px-3 py-2 text-sm font-medium text-green-600 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                            Edit
                        </button>
                        <button @click="confirmStatusChange(booking, 'cancelled')" x-show="booking.status !== 'cancelled'" class="flex-1 px-3 py-2 text-sm font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                            Cancel
                        </button>
                    </div>
                </div>
            </template>
            
            <div x-show="filteredBookings.length === 0" class="p-6 text-center">
                <div class="flex flex-col items-center justify-center">
                    <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <p class="text-lg font-semibold text-gray-500">No bookings found</p>
                    <p class="text-sm text-gray-400 mt-1">Try adjusting your filters</p>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div x-show="filteredBookings.length > 0" class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-sm text-gray-600">
                Showing <span class="font-semibold text-gray-900" x-text="Math.min((currentPage - 1) * pageSize + 1, totalItems)"></span> to 
                <span class="font-semibold text-gray-900" x-text="Math.min(currentPage * pageSize, totalItems)"></span> of 
                <span class="font-semibold text-gray-900" x-text="totalItems"></span> bookings
            </p>
            <div class="flex items-center gap-2">
                <button @click="prevPage()" :disabled="currentPage === 1" :class="currentPage === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-200'" class="px-3 py-2 rounded-lg border border-gray-300 text-sm font-medium text-gray-700 transition-colors">
                    Previous
                </button>
                <template x-for="page in visiblePages" :key="page">
                    <button @click="goToPage(page)" :class="currentPage === page ? 'bg-blue-600 text-white' : 'border border-gray-300 text-gray-700 hover:bg-gray-50'" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors min-w-[40px]">
                        <span x-text="page"></span>
                    </button>
                </template>
                <button @click="nextPage()" :disabled="currentPage === totalPages" :class="currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-200'" class="px-3 py-2 rounded-lg border border-gray-300 text-sm font-medium text-gray-700 transition-colors">
                    Next
                </button>
            </div>
        </div>
    </div>

    <!-- Include Partial Components -->
    @include('admin.bookings.partials.view-drawer')
    @include('admin.bookings.partials.form-drawer')
    @include('admin.bookings.partials.status-modal')
</div>

<script>
function bookingData() {
    return {
        // Data
        searchQuery: '',
        activeStatus: 'all',
        dateFrom: '',
        dateTo: '',
        sortField: 'id',
        sortDirection: 'desc',
        currentPage: 1,
        pageSize: 10,
        totalItems: 0,
        totalPages: 1,
        selectedBooking: null,
        editMode: false,
        showViewDrawer: false,
        showFormDrawer: false,
        showStatusModal: false,
        newStatus: '',
        sendNotification: true,
        cancellationReason: '',
        customReason: '',
        searchTimeout: null,
        
        // Sample data
        bookings: [
            {
                id: 'TRK-2024-001',
                customer_name: 'John Smith',
                customer_email: 'john.smith@email.com',
                customer_phone: '+1 234 567 890',
                customer_country: 'US',
                trek_name: 'Everest Base Camp',
                trek_duration: '14 Days',
                trek_date: '2024-03-15',
                travelers: 2,
                amount: 2500,
                status: 'confirmed',
                payment_status: 'paid',
                special_requests: 'Vegetarian meals preferred',
                created_at: '2024-01-15'
            },
            {
                id: 'TRK-2024-002',
                customer_name: 'Sarah Johnson',
                customer_email: 'sarah.j@email.com',
                customer_phone: '+1 345 678 901',
                customer_country: 'UK',
                trek_name: 'Annapurna Circuit',
                trek_duration: '18 Days',
                trek_date: '2024-04-02',
                travelers: 4,
                amount: 4800,
                status: 'pending',
                payment_status: 'pending',
                special_requests: 'Celebrating anniversary',
                created_at: '2024-01-20'
            },
            {
                id: 'TRK-2024-003',
                customer_name: 'Mike Williams',
                customer_email: 'mike.w@email.com',
                customer_phone: '+1 456 789 012',
                customer_country: 'CA',
                trek_name: 'Langtang Valley',
                trek_duration: '10 Days',
                trek_date: '2024-02-28',
                travelers: 1,
                amount: 1200,
                status: 'completed',
                payment_status: 'paid',
                special_requests: '',
                created_at: '2024-01-10'
            }
        ],
        
        statuses: [
            { value: 'all', label: 'All', color: '#4B5563' },
            { value: 'pending', label: 'Pending', color: '#F59E0B' },
            { value: 'confirmed', label: 'Confirmed', color: '#10B981' },
            { value: 'completed', label: 'Completed', color: '#3B82F6' },
            { value: 'cancelled', label: 'Cancelled', color: '#EF4444' }
        ],
        
        // Computed properties
        get filteredBookings() {
            let filtered = this.bookings;
            
            // Filter by search query
            if (this.searchQuery) {
                const query = this.searchQuery.toLowerCase();
                filtered = filtered.filter(b => 
                    b.customer_name.toLowerCase().includes(query) ||
                    b.customer_email.toLowerCase().includes(query) ||
                    b.id.toLowerCase().includes(query) ||
                    b.trek_name.toLowerCase().includes(query)
                );
            }
            
            // Filter by status
            if (this.activeStatus !== 'all') {
                filtered = filtered.filter(b => b.status === this.activeStatus);
            }
            
            // Filter by date range
            if (this.dateFrom) {
                filtered = filtered.filter(b => b.trek_date >= this.dateFrom);
            }
            if (this.dateTo) {
                filtered = filtered.filter(b => b.trek_date <= this.dateTo);
            }
            
            // Sort
            filtered.sort((a, b) => {
                const aVal = a[this.sortField];
                const bVal = b[this.sortField];
                
                if (typeof aVal === 'string') {
                    return this.sortDirection === 'asc' 
                        ? aVal.localeCompare(bVal)
                        : bVal.localeCompare(aVal);
                }
                
                return this.sortDirection === 'asc'
                    ? aVal - bVal
                    : bVal - aVal;
            });
            
            // Pagination
            this.totalItems = filtered.length;
            this.totalPages = Math.ceil(this.totalItems / this.pageSize);
            
            const start = (this.currentPage - 1) * this.pageSize;
            const end = start + this.pageSize;
            
            return filtered.slice(start, end);
        },
        
        get visiblePages() {
            const pages = [];
            const maxVisible = 5;
            let start = Math.max(1, this.currentPage - Math.floor(maxVisible / 2));
            let end = Math.min(this.totalPages, start + maxVisible - 1);
            
            if (end - start + 1 < maxVisible) {
                start = Math.max(1, end - maxVisible + 1);
            }
            
            for (let i = start; i <= end; i++) {
                pages.push(i);
            }
            
            return pages;
        },
        
        // Methods
        sortBy(field) {
            if (this.sortField === field) {
                this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
            } else {
                this.sortField = field;
                this.sortDirection = 'desc';
            }
        },
        
        debounceSearch() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                this.currentPage = 1;
            }, 300);
        },
        
        filterByDate() {
            this.currentPage = 1;
        },
        
        prevPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
            }
        },
        
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
            }
        },
        
        goToPage(page) {
            this.currentPage = page;
        },
        
        formatDate(dateString) {
            if (!dateString) return 'N/A';
            return new Date(dateString).toLocaleDateString('en-US', {
                month: 'short',
                day: 'numeric',
                year: 'numeric'
            });
        },
        
        formatCurrency(amount) {
            return amount.toLocaleString('en-US');
        },
        
        capitalize(str) {
            if (!str) return '';
            return str.charAt(0).toUpperCase() + str.slice(1);
        },
        
        viewBooking(booking) {
            this.selectedBooking = { ...booking };
            this.showViewDrawer = true;
        },
        
        editBooking(booking) {
            // Split customer name for form
            const nameParts = booking.customer_name.split(' ');
            this.selectedBooking = {
                ...booking,
                firstName: nameParts[0] || '',
                lastName: nameParts.slice(1).join(' ') || ''
            };
            this.editMode = true;
            this.showFormDrawer = true;
        },
        
        openAddDrawer() {
            this.selectedBooking = {
                id: '',
                firstName: '',
                lastName: '',
                customer_name: '',
                customer_email: '',
                customer_phone: '',
                customer_country: '',
                trek_name: '',
                trek_duration: '',
                trek_date: '',
                travelers: 1,
                amount: 0,
                status: 'pending',
                payment_status: 'pending',
                special_requests: ''
            };
            this.editMode = false;
            this.showFormDrawer = true;
        },
        
        confirmStatusChange(booking, newStatus) {
            this.selectedBooking = booking;
            this.newStatus = newStatus;
            this.showStatusModal = true;
        },
        
        updateBookingStatus() {
            // Update booking status
            const index = this.bookings.findIndex(b => b.id === this.selectedBooking.id);
            if (index !== -1) {
                this.bookings[index].status = this.newStatus;
            }
            this.showStatusModal = false;
            this.showNotification('Booking status updated successfully!', 'success');
        },
        
        deleteBooking(booking) {
            if (confirm('Are you sure you want to delete this booking? This action cannot be undone.')) {
                this.bookings = this.bookings.filter(b => b.id !== booking.id);
                this.showNotification('Booking deleted successfully!', 'success');
            }
        },
        
        submitBookingForm() {
            // Combine first and last name
            const customer_name = `${this.selectedBooking.firstName || ''} ${this.selectedBooking.lastName || ''}`.trim();
            
            if (this.editMode) {
                // Update existing booking
                const index = this.bookings.findIndex(b => b.id === this.selectedBooking.id);
                if (index !== -1) {
                    this.bookings[index] = {
                        ...this.bookings[index],
                        ...this.selectedBooking,
                        customer_name: customer_name
                    };
                    this.showNotification('Booking updated successfully!', 'success');
                }
            } else {
                // Create new booking
                const newId = 'TRK-' + new Date().getFullYear() + '-' + String(this.bookings.length + 1).padStart(3, '0');
                const newBooking = {
                    ...this.selectedBooking,
                    id: newId,
                    customer_name: customer_name,
                    created_at: new Date().toISOString().split('T')[0]
                };
                
                this.bookings.unshift(newBooking);
                this.showNotification('Booking created successfully!', 'success');
            }
            
            this.showFormDrawer = false;
            this.selectedBooking = null;
        },
        
        exportBookings() {
            const data = JSON.stringify(this.filteredBookings, null, 2);
            const blob = new Blob([data], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'bookings-export.json';
            a.click();
            URL.revokeObjectURL(url);
        },
        
        sendConfirmation(booking) {
            this.showNotification('Confirmation email sent!', 'success');
        },
        
        showNotification(message, type = 'info') {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 px-4 py-3 rounded-lg shadow-lg text-white z-50 ${
                type === 'success' ? 'bg-green-600' :
                type === 'error' ? 'bg-red-600' :
                'bg-blue-600'
            }`;
            notification.innerHTML = `
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    }
}
</script>
@endsection