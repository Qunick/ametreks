<!-- Header -->
<header class="bg-white shadow-sm z-10">
    <div class="px-6 py-4">
        <div class="flex items-center justify-between">
            <!-- Left: Menu button and breadcrumb -->
            <div class="flex items-center">
                <button @click="sidebarOpen = true" class="lg:hidden p-2 rounded-md text-gray-500 hover:text-gray-900 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <div class="ml-4">
                    <h1 class="text-2xl font-semibold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                </div>
            </div>

            <!-- Right: User menu and notifications -->
            <div class="flex items-center space-x-4">
                <!-- Dark mode toggle -->
                <button @click="darkMode = !darkMode" class="p-2 rounded-full text-gray-500 hover:text-gray-900">
                    <i class="fas" :class="darkMode ? 'fa-sun' : 'fa-moon'"></i>
                </button>

                <!-- Notifications -->
                <div class="relative">
                    <button class="p-2 rounded-full text-gray-500 hover:text-gray-900">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                </div>

                <!-- User dropdown -->
                <div class="relative">
                    <button class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100">
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=10B981&color=fff" 
                             alt="Admin" 
                             class="w-8 h-8 rounded-full">
                        <span class="hidden md:inline text-gray-700">Admin User</span>
                        <i class="fas fa-chevron-down text-gray-500"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>