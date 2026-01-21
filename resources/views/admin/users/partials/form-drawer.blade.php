<div x-show="showFormDrawer" x-cloak class="fixed inset-0 z-50 overflow-hidden" @keydown.escape.window="showFormDrawer = false">
    <div x-show="showFormDrawer" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/50" @click="showFormDrawer = false"></div>
    
    <div x-show="showFormDrawer" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition-transform ease-in duration-200" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="absolute inset-y-0 right-0 w-full max-w-lg bg-white shadow-2xl flex flex-col">
        <!-- Drawer Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200" :class="editMode ? 'bg-blue-900' : 'bg-green-900'">
            <div>
                <h2 class="text-lg font-semibold text-white" x-text="editMode ? 'Edit User' : 'Add New User'"></h2>
                <p class="text-sm text-white/80" x-text="editMode ? 'Update user details' : 'Create a new user account'"></p>
            </div>
            <button @click="showFormDrawer = false" class="p-2 rounded-lg hover:bg-white/10 transition-colors">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Drawer Content -->
        <div class="flex-1 overflow-y-auto p-6">
            <form @submit.prevent="submitUserForm()" class="space-y-6">
                <!-- Profile Picture -->
                <div class="flex flex-col items-center">
                    <div class="relative w-24 h-24 rounded-full overflow-hidden mb-4">
                        <div x-show="!form.profile_picture" class="w-full h-full flex items-center justify-center text-white text-2xl font-bold" :style="'background-color: ' + form.avatar_color">
                            <span x-text="form.first_name ? form.first_name.charAt(0) : 'U'"></span>
                        </div>
                        <img x-show="form.profile_picture" :src="form.profile_picture" alt="Profile" class="w-full h-full object-cover">
                        <button type="button" @click="$refs.profileInput.click()" class="absolute bottom-0 right-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700">
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
                    <h4 class="text-sm font-semibold text-gray-900 mb-4">Basic Information</h4>
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1.5">First Name *</label>
                                <input type="text" x-model="form.first_name" required class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1.5">Last Name *</label>
                                <input type="text" x-model="form.last_name" required class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1.5">Email Address *</label>
                            <input type="email" x-model="form.email" required class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1.5">Phone Number</label>
                            <input type="tel" x-model="form.phone" class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Account Type -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-4">Account Type</h4>
                    <div class="grid grid-cols-2 gap-3">
                        <template x-for="type in userTypes" :key="type.value">
                            <label class="flex items-center gap-3 p-3 border-2 rounded-lg cursor-pointer transition-all" :class="form.user_type === type.value ? 'border-blue-500 bg-blue-50' : 'border-gray-200 hover:border-gray-300'">
                                <input type="radio" x-model="form.user_type" :value="type.value" name="user_type" class="w-4 h-4 text-blue-600">
                                <div>
                                    <p class="text-sm font-medium text-gray-900" x-text="type.label"></p>
                                    <p class="text-xs text-gray-500" x-text="type.description"></p>
                                </div>
                            </label>
                        </template>
                    </div>
                </div>

                <!-- Password (only for new users) -->
                <div x-show="!editMode">
                    <h4 class="text-sm font-semibold text-gray-900 mb-4">Password</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1.5">Password *</label>
                            <input type="password" x-model="form.password" required class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1.5">Confirm Password *</label>
                            <input type="password" x-model="form.password_confirmation" required class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Account Status -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-4">Account Status</h4>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                            <input type="checkbox" x-model="form.email_verified" class="w-4 h-4 text-green-600 rounded">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Email Verified</p>
                                <p class="text-xs text-gray-500">User can login immediately</p>
                            </div>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                            <input type="checkbox" x-model="form.active" class="w-4 h-4 text-green-600 rounded">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Active Account</p>
                                <p class="text-xs text-gray-500">User can access the platform</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Additional Information -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-4">Additional Information</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1.5">Country</label>
                            <select x-model="form.country" class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Select Country</option>
                                <option value="US">United States</option>
                                <option value="UK">United Kingdom</option>
                                <option value="AU">Australia</option>
                                <option value="CA">Canada</option>
                                <option value="NP">Nepal</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1.5">Notes</label>
                            <textarea x-model="form.notes" rows="3" class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none" placeholder="Any additional notes about this user..."></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Drawer Footer -->
        <div class="flex items-center gap-3 px-6 py-4 border-t border-gray-200 bg-gray-50">
            <button @click="showFormDrawer = false" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-colors border border-gray-300 text-gray-700 hover:bg-gray-100">
                Cancel
            </button>
            <button @click="submitUserForm()" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-colors text-white"
                    :class="editMode ? 'bg-blue-600 hover:bg-blue-700' : 'bg-green-600 hover:bg-green-700'"
                    x-text="editMode ? 'Update User' : 'Create User'">
            </button>
        </div>
    </div>
</div>