{{-- Add/Edit Booking Drawer --}}
<div x-show="showFormDrawer" x-cloak class="fixed inset-0 z-50 overflow-hidden" @keydown.escape.window="showFormDrawer = false">
    <div x-show="showFormDrawer" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/50" @click="showFormDrawer = false"></div>
    
    <div x-show="showFormDrawer" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition-transform ease-in duration-200" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="absolute inset-y-0 right-0 w-full max-w-lg bg-white shadow-2xl flex flex-col">
        <!-- Drawer Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200" :class="editMode ? 'bg-blue-900' : 'bg-green-900'">
            <div>
                <h2 class="text-lg font-semibold text-white" x-text="editMode ? 'Edit Booking' : 'Add New Booking'"></h2>
                <p class="text-sm text-white/80" x-text="editMode ? 'Update booking details' : 'Create a new trek booking'"></p>
            </div>
            <button @click="showFormDrawer = false" class="p-2 rounded-lg hover:bg-white/10 transition-colors">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Drawer Content -->
        <div class="flex-1 overflow-y-auto p-6">
            <form @submit.prevent="submitBookingForm()" class="space-y-6">
                <!-- Customer Information -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Customer Information
                    </h3>
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1.5">First Name *</label>
                                <input type="text" x-model="selectedBooking.customer_name.split(' ')[0]" required 
                                       class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="John">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1.5">Last Name *</label>
                                <input type="text" x-model="selectedBooking.customer_name.split(' ').slice(1).join(' ')" required 
                                       class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="Smith">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1.5">Email Address *</label>
                            <input type="email" x-model="selectedBooking.customer_email" required 
                                   class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="john@example.com">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1.5">Phone Number *</label>
                                <input type="tel" x-model="selectedBooking.customer_phone" required 
                                       class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="+1 234 567 890">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1.5">Country *</label>
                                <select x-model="selectedBooking.customer_country" required 
                                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="">Select Country</option>
                                    <option value="US">United States</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="CA">Canada</option>
                                    <option value="AU">Australia</option>
                                    <option value="NP">Nepal</option>
                                    <option value="IN">India</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trek Details -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Trek Details
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1.5">Select Trek *</label>
                            <select x-model="selectedBooking.trek_name" required 
                                    class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Choose a trek</option>
                                <option value="Everest Base Camp">Everest Base Camp - 14 Days</option>
                                <option value="Annapurna Circuit">Annapurna Circuit - 18 Days</option>
                                <option value="Langtang Valley">Langtang Valley - 10 Days</option>
                                <option value="Manaslu Circuit">Manaslu Circuit - 16 Days</option>
                                <option value="Gokyo Lakes">Gokyo Lakes - 12 Days</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1.5">Start Date *</label>
                                <input type="date" x-model="selectedBooking.trek_date" required 
                                       class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1.5">Travelers *</label>
                                <div class="flex items-center gap-2">
                                    <button type="button" @click="selectedBooking.travelers > 1 ? selectedBooking.travelers-- : null" 
                                            class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-lg hover:bg-gray-50">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                        </svg>
                                    </button>
                                    <input type="number" x-model="selectedBooking.travelers" min="1" max="20" required 
                                           class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm text-center focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <button type="button" @click="selectedBooking.travelers++" 
                                            class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-lg hover:bg-gray-50">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1.5">Amount (USD) *</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">$</span>
                                <input type="number" x-model="selectedBooking.amount" min="0" step="0.01" required 
                                       class="w-full pl-8 pr-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="0.00">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Status -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Booking Status
                    </h3>
                    <div class="grid grid-cols-2 gap-3">
                        <template x-for="status in statuses.filter(s => s.value !== 'all')" :key="status.value">
                            <label class="flex items-center gap-3 p-3 border-2 rounded-lg cursor-pointer transition-all"
                                   :class="selectedBooking.status === status.value 
                                           ? 'border-blue-500 bg-blue-50' 
                                           : 'border-gray-200 hover:border-gray-300'">
                                <input type="radio" x-model="selectedBooking.status" :value="status.value" name="status" class="w-4 h-4 text-blue-600">
                                <div>
                                    <p class="text-sm font-medium text-gray-900 capitalize" x-text="status.label"></p>
                                    <p class="text-xs text-gray-500" 
                                       x-text="status.value === 'pending' ? 'Awaiting payment' 
                                             : status.value === 'confirmed' ? 'Payment received'
                                             : status.value === 'completed' ? 'Trek completed'
                                             : 'Booking cancelled'"></p>
                                </div>
                            </label>
                        </template>
                    </div>
                </div>

                <!-- Payment Status -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Payment Status
                    </h3>
                    <div class="grid grid-cols-3 gap-3">
                        <label class="flex items-center gap-2 p-3 border rounded-lg cursor-pointer hover:bg-gray-50"
                               :class="selectedBooking.payment_status === 'pending' ? 'border-yellow-400 bg-yellow-50' : 'border-gray-200'">
                            <input type="radio" x-model="selectedBooking.payment_status" value="pending" class="w-4 h-4 text-yellow-600">
                            <span class="text-sm text-gray-700">Pending</span>
                        </label>
                        <label class="flex items-center gap-2 p-3 border rounded-lg cursor-pointer hover:bg-gray-50"
                               :class="selectedBooking.payment_status === 'paid' ? 'border-green-400 bg-green-50' : 'border-gray-200'">
                            <input type="radio" x-model="selectedBooking.payment_status" value="paid" class="w-4 h-4 text-green-600">
                            <span class="text-sm text-gray-700">Paid</span>
                        </label>
                        <label class="flex items-center gap-2 p-3 border rounded-lg cursor-pointer hover:bg-gray-50"
                               :class="selectedBooking.payment_status === 'failed' ? 'border-red-400 bg-red-50' : 'border-gray-200'">
                            <input type="radio" x-model="selectedBooking.payment_status" value="failed" class="w-4 h-4 text-red-600">
                            <span class="text-sm text-gray-700">Failed</span>
                        </label>
                    </div>
                </div>

                <!-- Special Requests -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                        </svg>
                        Special Requests
                    </h3>
                    <textarea x-model="selectedBooking.special_requests" rows="3" 
                              class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                              placeholder="Any dietary requirements, medical conditions, or special requests..."></textarea>
                </div>
            </form>
        </div>

        <!-- Drawer Footer -->
        <div class="flex items-center gap-3 px-6 py-4 border-t border-gray-200 bg-gray-50">
            <button @click="showFormDrawer = false" 
                    class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-colors border border-gray-300 text-gray-700 hover:bg-gray-100">
                Cancel
            </button>
            <button @click="submitBookingForm()" 
                    class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-colors text-white"
                    :class="editMode ? 'bg-blue-600 hover:bg-blue-700' : 'bg-green-600 hover:bg-green-700'"
                    x-text="editMode ? 'Update Booking' : 'Create Booking'">
            </button>
        </div>
    </div>
</div>