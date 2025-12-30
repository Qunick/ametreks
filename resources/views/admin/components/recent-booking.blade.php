<div class="bg-white rounded-xl shadow p-6">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-semibold text-gray-900">Recent Bookings</h3>
        <a href="{{ route('admin.bookings.index') }}" class="text-sm text-blue-500 hover:text-blue-700">
            View all →
        </a>
    </div>
    <div class="space-y-4">
        <!-- Booking Item 1 -->
        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user text-blue-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">John Doe</p>
                    <p class="text-sm text-gray-500">Everest Base Camp</p>
                </div>
            </div>
            <div class="text-right">
                <p class="font-medium text-gray-900">$1,250</p>
                <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Confirmed</span>
            </div>
        </div>

        <!-- Booking Item 2 -->
        <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user text-purple-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Sarah Smith</p>
                    <p class="text-sm text-gray-500">Annapurna Circuit</p>
                </div>
            </div>
            <div class="text-right">
                <p class="font-medium text-gray-900">$980</p>
                <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded-full">Pending</span>
            </div>
        </div>

        <!-- Booking Item 3 -->
        <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user text-green-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Mike Johnson</p>
                    <p class="text-sm text-gray-500">Langtang Valley</p>
                </div>
            </div>
            <div class="text-right">
                <p class="font-medium text-gray-900">$750</p>
                <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Confirmed</span>
            </div>
        </div>
    </div>
</div>