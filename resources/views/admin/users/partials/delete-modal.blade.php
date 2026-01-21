<div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" @keydown.escape.window="showDeleteModal = false">
    <div x-show="showDeleteModal" x-transition:enter="transition-opacity ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/50" @click="showDeleteModal = false"></div>
    
    <div x-show="showDeleteModal" x-transition:enter="transition-all ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="relative bg-white rounded-xl shadow-2xl max-w-md w-full p-6">
        <div class="text-center">
            <div class="w-16 h-16 rounded-full bg-red-50 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Delete User?</h3>
            <p class="text-sm text-gray-600 mb-6">
                Are you sure you want to delete <span class="font-medium" x-text="selectedUser?.name"></span>? 
                This action cannot be undone and all associated data will be removed.
            </p>
            <div class="flex items-center gap-3">
                <button @click="showDeleteModal = false" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-colors border border-gray-300 text-gray-700 hover:bg-gray-100">
                    Cancel
                </button>
                <button @click="deleteUser()" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-colors bg-red-600 text-white hover:bg-red-700">
                    Yes, Delete
                </button>
            </div>
        </div>
    </div>
</div>