<!-- Sidebar -->
<aside class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
    <!-- Sidebar component -->
    <div class="flex flex-col flex-1 min-h-0 bg-gray-900">
        <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-blue-500 rounded-lg"></div>
                <span class="ml-3 text-xl font-bold text-white">Trek<span class="text-green-400">Admin</span></span>
            </div>
        </div>
        <div class="flex-1 flex flex-col overflow-y-auto">
            <nav class="flex-1 px-4 py-4 space-y-1">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" 
                   class="@if(request()->routeIs('admin.dashboard')) bg-gray-800 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <i class="fas fa-chart-line mr-3 flex-shrink-0"></i>
                    Dashboard
                </a>

                <!-- Bookings -->
                <a href="{{ route('admin.bookings.index') }}" 
                   class="@if(request()->routeIs('admin.bookings.*')) bg-gray-800 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <i class="fas fa-calendar-check mr-3 flex-shrink-0"></i>
                    Bookings
                    <span class="ml-auto bg-red-500 text-xs px-2 py-1 rounded-full">12</span>
                </a>

                <!-- Tours -->
                <a href="{{ route('admin.tours.index') }}" 
                   class="@if(request()->routeIs('admin.tours.*')) bg-gray-800 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <i class="fas fa-mountain mr-3 flex-shrink-0"></i>
                    Tours
                    <span class="ml-auto bg-green-500 text-xs px-2 py-1 rounded-full">24</span>
                </a>

                <!-- Blogs -->
                <a href="{{ route('admin.blogs.index') }}" 
                   class="@if(request()->routeIs('admin.blogs.*')) bg-gray-800 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <i class="fas fa-blog mr-3 flex-shrink-0"></i>
                    Blog Posts
                </a>

                <!-- Reviews -->
                <a href="{{ route('admin.reviews.index') }}" 
                   class="@if(request()->routeIs('admin.reviews.*')) bg-gray-800 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <i class="fas fa-star mr-3 flex-shrink-0"></i>
                    Reviews
                    <span class="ml-auto bg-yellow-500 text-xs px-2 py-1 rounded-full">48</span>
                </a>

                <!-- Settings -->
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <i class="fas fa-cog mr-3 flex-shrink-0"></i>
                    Settings
                </a>
            </nav>
        </div>
    </div>
</aside>

<!-- Mobile sidebar backdrop -->
<div x-show="sidebarOpen" @click="sidebarOpen = false" class="lg:hidden fixed inset-0 z-20 bg-gray-900 bg-opacity-50"></div>

<!-- Mobile sidebar -->
<div x-show="sidebarOpen" class="lg:hidden fixed inset-y-0 left-0 z-30 w-64 bg-gray-900 transform transition-transform">
    <!-- Same sidebar content as above -->
    <div class="flex flex-col flex-1 min-h-0">
        <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-blue-500 rounded-lg"></div>
                <span class="ml-3 text-xl font-bold text-white">Trek<span class="text-green-400">Admin</span></span>
            </div>
        </div>
        <!-- Same navigation links as above -->
    </div>
</div>