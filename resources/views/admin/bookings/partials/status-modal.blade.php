{{-- Status Change Modal --}}
<div x-show="showStatusModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" @keydown.escape.window="showStatusModal = false">
    <div x-show="showStatusModal" x-transition:enter="transition-opacity ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/50" @click="showStatusModal = false"></div>
    
    <div x-show="showStatusModal" x-transition:enter="transition-all ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="relative bg-white rounded-xl shadow-2xl max-w-md w-full p-6">
        <!-- Modal Icon -->
        <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4"
             :class="{
                 'bg-yellow-100': newStatus === 'pending',
                 'bg-green-100': newStatus === 'confirmed',
                 'bg-blue-100': newStatus === 'completed',
                 'bg-red-100': newStatus === 'cancelled'
             }">
            <svg class="w-8 h-8"
                 :class="{
                     'text-yellow-600': newStatus === 'pending',
                     'text-green-600': newStatus === 'confirmed',
                     'text-blue-600': newStatus === 'completed',
                     'text-red-600': newStatus === 'cancelled'
                 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
        </div>

        <!-- Modal Content -->
        <div class="text-center">
            <h3 class="text-lg font-semibold text-gray-900 mb-2" x-text="'Change Booking Status?'"></h3>
            <p class="text-sm text-gray-600 mb-6">
                <span x-text="'Change booking #' + selectedBooking?.id + ' from '"></span>
                <span class="font-medium capitalize" x-text="selectedBooking?.status"></span>
                <span x-text="' to '"></span>
                <span class="font-medium capitalize" x-text="newStatus"></span>
                <span x-show="newStatus === 'cancelled'">. This action will notify the customer.</span>
            </p>

            <!-- Reason Input (for cancellations) -->
            <div x-show="newStatus === 'cancelled'" class="mb-6">
                <label class="block text-left text-xs font-medium text-gray-700 mb-2">Cancellation Reason</label>
                <select x-model="cancellationReason" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Select a reason</option>
                    <option value="customer_request">Customer Request</option>
                    <option value="payment_failed">Payment Failed</option>
                    <option value="trek_cancelled">Trek Cancelled</option>
                    <option value="weather_conditions">Weather Conditions</option>
                    <option value="other">Other</option>
                </select>
                <textarea x-show="cancellationReason === 'other'" x-model="customReason" rows="2" class="w-full mt-2 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none" placeholder="Please specify..."></textarea>
            </div>

            <!-- Notification Options -->
            <div class="mb-6">
                <label class="flex items-center gap-2 mb-2">
                    <input type="checkbox" x-model="sendNotification" class="w-4 h-4 text-blue-600 rounded">
                    <span class="text-sm text-gray-700">Send notification to customer</span>
                </label>
                <p class="text-xs text-gray-500 text-left">The customer will receive an email about the status change.</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-3">
                <button @click="showStatusModal = false" 
                        class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-colors border border-gray-300 text-gray-700 hover:bg-gray-100">
                    Keep Current
                </button>
                <button @click="updateBookingStatus()" 
                        class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-colors text-white"
                        :class="{
                            'bg-yellow-600 hover:bg-yellow-700': newStatus === 'pending',
                            'bg-green-600 hover:bg-green-700': newStatus === 'confirmed',
                            'bg-blue-600 hover:bg-blue-700': newStatus === 'completed',
                            'bg-red-600 hover:bg-red-700': newStatus === 'cancelled'
                        }">
                    <span x-text="newStatus === 'cancelled' ? 'Confirm Cancel' : 'Update Status'"></span>
                </button>
            </div>
        </div>
    </div>
</div>