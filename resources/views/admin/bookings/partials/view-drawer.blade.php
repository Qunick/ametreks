{{-- View Booking Drawer --}}
<div x-show="showViewDrawer" x-cloak class="fixed inset-0 z-50 overflow-hidden" @keydown.escape.window="showViewDrawer = false">
    <div x-show="showViewDrawer" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/50" @click="showViewDrawer = false"></div>
    
    <div x-show="showViewDrawer" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition-transform ease-in duration-200" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="absolute inset-y-0 right-0 w-full max-w-lg bg-white shadow-2xl flex flex-col">
        <!-- Drawer Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 bg-gray-900">
            <div>
                <h2 class="text-lg font-semibold text-white">Booking Details</h2>
                <p class="text-sm text-gray-300" x-text="'#' + selectedBooking?.id"></p>
            </div>
            <button @click="showViewDrawer = false" class="p-2 rounded-lg hover:bg-gray-800 transition-colors">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Drawer Content -->
        <div class="flex-1 overflow-y-auto p-6 space-y-6" x-show="selectedBooking">
            <!-- Status & Amount Banner -->
            <div class="p-4 rounded-xl border"
                 :class="{
                     'bg-yellow-50 border-yellow-200': selectedBooking.status === 'pending',
                     'bg-green-50 border-green-200': selectedBooking.status === 'confirmed',
                     'bg-blue-50 border-blue-200': selectedBooking.status === 'completed',
                     'bg-red-50 border-red-200': selectedBooking.status === 'cancelled'
                 }">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center"
                             :class="{
                                 'bg-yellow-100': selectedBooking.status === 'pending',
                                 'bg-green-100': selectedBooking.status === 'confirmed',
                                 'bg-blue-100': selectedBooking.status === 'completed',
                                 'bg-red-100': selectedBooking.status === 'cancelled'
                             }">
                            <svg class="w-5 h-5"
                                 :class="{
                                     'text-yellow-600': selectedBooking.status === 'pending',
                                     'text-green-600': selectedBooking.status === 'confirmed',
                                     'text-blue-600': selectedBooking.status === 'completed',
                                     'text-red-600': selectedBooking.status === 'cancelled'
                                 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold capitalize" 
                               :class="{
                                   'text-yellow-800': selectedBooking.status === 'pending',
                                   'text-green-800': selectedBooking.status === 'confirmed',
                                   'text-blue-800': selectedBooking.status === 'completed',
                                   'text-red-800': selectedBooking.status === 'cancelled'
                               }" x-text="selectedBooking.status"></p>
                            <p class="text-xs" 
                               :class="{
                                   'text-yellow-600': selectedBooking.status === 'pending',
                                   'text-green-600': selectedBooking.status === 'confirmed',
                                   'text-blue-600': selectedBooking.status === 'completed',
                                   'text-red-600': selectedBooking.status === 'cancelled'
                               }">
                                <span x-text="selectedBooking.payment_status === 'paid' ? 'Payment received' : 'Awaiting payment'"></span>
                            </p>
                        </div>
                    </div>
                    <span class="text-lg font-bold text-green-600" x-text="'$' + formatCurrency(selectedBooking.amount)"></span>
                </div>
            </div>

            <!-- Customer Information -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Customer Information
                </h3>
                <div class="bg-gray-50 rounded-xl p-4 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold text-lg" 
                             x-text="selectedBooking.customer_name.charAt(0)"></div>
                        <div>
                            <p class="font-semibold text-gray-900" x-text="selectedBooking.customer_name"></p>
                            <p class="text-sm text-gray-600" x-text="selectedBooking.customer_email"></p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-200">
                        <div>
                            <p class="text-xs text-gray-500">Phone</p>
                            <p class="text-sm font-medium text-gray-900" x-text="selectedBooking.customer_phone"></p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Country</p>
                            <p class="text-sm font-medium text-gray-900" x-text="selectedBooking.customer_country"></p>
                        </div>
                        <div class="col-span-2">
                            <p class="text-xs text-gray-500">Booking Date</p>
                            <p class="text-sm font-medium text-gray-900" x-text="formatDate(selectedBooking.created_at)"></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trek Details -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Trek Details
                </h3>
                <div class="bg-gray-50 rounded-xl overflow-hidden border border-gray-200">
                    <div class="p-4 space-y-3">
                        <div>
                            <p class="font-semibold text-gray-900" x-text="selectedBooking.trek_name"></p>
                            <p class="text-sm text-gray-600" x-text="selectedBooking.trek_duration"></p>
                        </div>
                        <div class="grid grid-cols-2 gap-4 pt-3 border-t border-gray-200">
                            <div>
                                <p class="text-xs text-gray-500">Start Date</p>
                                <p class="text-sm font-medium text-gray-900" x-text="formatDate(selectedBooking.trek_date)"></p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Travelers</p>
                                <p class="text-sm font-medium text-gray-900" x-text="selectedBooking.travelers + ' person(s)'"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Summary -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Payment Summary
                </h3>
                <div class="bg-gray-50 rounded-xl p-4 space-y-3">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Trek Cost</span>
                        <span class="text-sm font-medium text-gray-900" 
                              x-text="'$' + formatCurrency(selectedBooking.amount / (selectedBooking.travelers || 1) * (selectedBooking.travelers || 1))"></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Payment Status</span>
                        <span class="text-sm font-medium capitalize"
                              :class="{
                                  'text-green-600': selectedBooking.payment_status === 'paid',
                                  'text-yellow-600': selectedBooking.payment_status === 'pending',
                                  'text-red-600': selectedBooking.payment_status === 'failed'
                              }"
                              x-text="selectedBooking.payment_status"></span>
                    </div>
                    <div class="flex justify-between pt-3 border-t border-gray-300">
                        <span class="font-semibold text-gray-900">Total Paid</span>
                        <span class="font-bold text-green-600" x-text="'$' + formatCurrency(selectedBooking.amount)"></span>
                    </div>
                </div>
            </div>

            <!-- Special Requests -->
            <div x-show="selectedBooking.special_requests">
                <h3 class="text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                    </svg>
                    Special Requests
                </h3>
                <div class="bg-gray-50 rounded-xl p-4">
                    <p class="text-sm text-gray-700" x-text="selectedBooking.special_requests"></p>
                </div>
            </div>
        </div>

        <!-- Drawer Footer -->
        <div class="flex items-center gap-3 px-6 py-4 border-t border-gray-200 bg-gray-50">
            <button @click="editBooking(selectedBooking)" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-colors border-2 border-blue-600 text-blue-600 hover:bg-blue-50">
                Edit Booking
            </button>
            <button @click="sendConfirmation(selectedBooking)" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-colors bg-blue-600 text-white hover:bg-blue-700">
                Send Confirmation
            </button>
        </div>
    </div>
</div>