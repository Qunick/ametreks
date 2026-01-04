<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trek Admin Dashboard - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @stack('styles')
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar-active { 
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        .stat-card { 
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            position: relative;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            border-radius: 8px 8px 0 0;
        }
        .stat-card.blue::before { background: #1d4ed8; }
        .stat-card.green::before { background: #047857; }
        .stat-card.purple::before { background: #7c3aed; }
        .stat-card.orange::before { background: #ea580c; }
        
        .table-row-hover { 
            transition: all 0.2s ease;
        }
        .table-row-hover:hover { 
            background-color: #f8fafc;
            transform: scale(1.002);
        }
        
        .toggle-switch { 
            position: relative;
            display: inline-flex;
            height: 28px;
            width: 52px;
            align-items: center;
            border-radius: 9999px;
            background-color: #d1d5db;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .toggle-switch.active { 
            background-color: #10b981;
        }
        .toggle-slider { 
            position: absolute;
            height: 22px;
            width: 22px;
            left: 3px;
            background-color: white;
            border-radius: 9999px;
            transition: transform 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .toggle-switch.active .toggle-slider { 
            transform: translateX(24px);
        }
        
        .modal-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            animation: fadeIn 0.2s ease;
        }
        
        .modal-content {
            animation: slideUp 0.3s ease;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .sidebar {
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        }
        
        .progress-bar {
            height: 8px;
            border-radius: 9999px;
            background-color: #e2e8f0;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            border-radius: 9999px;
            transition: width 1s ease;
        }
        
        .chart-container {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 16px;
            padding: 1.5rem;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .badge-confirmed {
            background-color: #d1fae5;
            color: #065f46;
        }
        
        .badge-pending {
            background-color: #fef3c7;
            color: #92400e;
        }
        
        .badge-completed {
            background-color: #dbeafe;
            color: #1e40af;
        }
        
        .badge-published {
            background-color: #d1fae5;
            color: #065f46;
        }
        
        .badge-draft {
            background-color: #f3f4f6;
            color: #4b5563;
        }
        
        .tab-content {
            animation: fadeIn 0.4s ease;
        }
        
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="sidebar w-64 text-white shadow-xl fixed h-full overflow-y-auto">
            <div class="p-6 border-b border-gray-800">
                <div class="flex items-center">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-2 rounded-xl mr-3">
                        <i class="fas fa-mountain text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold tracking-tight">TrekAdmin</h1>
                        <p class="text-sm text-blue-200 mt-1">Premium Trek Management</p>
                    </div>
                </div>
            </div>
            <nav class="p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="nav-item flex items-center p-3 rounded-lg hover:bg-gray-800 cursor-pointer transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'sidebar-active' : '' }}">
                    <i class="fas fa-chart-line w-5 mr-3 text-lg"></i> 
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="{{ route('admin.treks.index') }}" class="nav-item flex items-center p-3 rounded-lg hover:bg-gray-800 cursor-pointer transition-all duration-200 {{ request()->routeIs('admin.tours.*') ? 'sidebar-active' : '' }}">
                    <i class="fas fa-map-marked-alt w-5 mr-3 text-lg"></i> 
                    <span class="font-medium">Tours & Treks</span>
                </a>
                <a href="{{ route('admin.bookings.index') }}" class="nav-item flex items-center p-3 rounded-lg hover:bg-gray-800 cursor-pointer transition-all duration-200 {{ request()->routeIs('admin.bookings.*') ? 'sidebar-active' : '' }}">
                    <i class="fas fa-calendar-check w-5 mr-3 text-lg"></i> 
                    <span class="font-medium">Bookings</span>
                    <span class="ml-auto bg-blue-500 text-white text-xs px-2 py-1 rounded-full">24</span>
                </a>
                <a href="{{ route('admin.reviews.index') }}" class="nav-item flex items-center p-3 rounded-lg hover:bg-gray-800 cursor-pointer transition-all duration-200 {{ request()->routeIs('admin.reviews.*') ? 'sidebar-active' : '' }}">
                    <i class="fas fa-star w-5 mr-3 text-lg"></i> 
                    <span class="font-medium">Reviews</span>
                </a>
                <a href="{{ route('admin.blogs.index') }}" class="nav-item flex items-center p-3 rounded-lg hover:bg-gray-800 cursor-pointer transition-all duration-200 {{ request()->routeIs('admin.blogs.*') ? 'sidebar-active' : '' }}">
                    <i class="fas fa-blog w-5 mr-3 text-lg"></i> 
                    <span class="font-medium">Blog Posts</span>
                </a>
                <a href="{{ route('admin.users.index') }}" class="nav-item flex items-center p-3 rounded-lg hover:bg-gray-800 cursor-pointer transition-all duration-200 {{ request()->routeIs('admin.users.*') ? 'sidebar-active' : '' }}">
                    <i class="fas fa-users w-5 mr-3 text-lg"></i> 
                    <span class="font-medium">Users</span>
                </a>
                <div class="pt-6 mt-6 border-t border-gray-800">
                    <a href="" class="nav-item flex items-center p-3 rounded-lg hover:bg-gray-800 cursor-pointer transition-all duration-200 {{ request()->routeIs('admin.settings.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-cog w-5 mr-3 text-lg"></i> 
                        <span class="font-medium">Settings</span>
                    </a>
                </div>
            </nav>
            
            <div class="p-4 mt-auto">
                <div class="bg-gradient-to-r from-blue-900 to-indigo-900 rounded-xl p-4">
                    <p class="text-sm font-medium">Upgrade to Pro</p>
                    <p class="text-xs text-blue-200 mt-1">Get advanced analytics</p>
                    <button class="mt-3 bg-white text-blue-700 text-sm font-medium px-3 py-1.5 rounded-lg w-full hover:bg-blue-50 transition">
                        Upgrade Now
                    </button>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 flex-1 overflow-auto">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm sticky top-0 z-10">
                <div class="flex items-center justify-between p-4 px-6">
                    <div>
                        <h2 id="pageTitle" class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                        <p class="text-gray-500 text-sm">@yield('page-subtitle', 'Welcome back, Admin! Here\'s what\'s happening today.')</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <button class="relative p-2 text-gray-600 hover:text-gray-900">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-red-500 rounded-full border border-white"></span>
                        </button>
                        <div class="flex items-center space-x-3">
                            <div class="avatar">AD</div>
                            <div>
                                <p class="font-medium text-sm">Admin User</p>
                                <p class="text-xs text-gray-500">Super Admin</p>
                            </div>
                            <i class="fas fa-chevron-down text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-6">
                <!-- Main Content Area -->
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Modals -->
    @include('admin.partials.modals.tour-modal')
    {{-- @include('admin.partials.modals.blog-modal')
    @include('admin.partials.modals.greeting-card-modal') --}}
    
    <!-- JavaScript -->
    <script src="{{ asset('admin-assets/js/admin.js') }}"></script>
    <script>
        // Common JavaScript functions
        function switchTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.add('hidden');
            });
            document.getElementById(tabId).classList.remove('hidden');
            
            // Update active nav item
            document.querySelectorAll('.nav-item').forEach(nav => {
                nav.classList.remove('sidebar-active');
            });
            event.currentTarget.classList.add('sidebar-active');
            
            // Update page title
            const titles = {
                dashboard: 'Dashboard',
                tours: 'Tours & Treks',
                bookings: 'Bookings',
                reviews: 'Reviews',
                blogs: 'Blog Posts',
                users: 'Users',
                settings: 'Settings'
            };
            document.getElementById('pageTitle').textContent = titles[tabId];
        }

        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        function toggleStatus(event) {
            const toggle = event.currentTarget;
            toggle.classList.toggle('active');
            
            const statusText = toggle.nextElementSibling;
            statusText.textContent = toggle.classList.contains('active') ? 'Active' : 'Inactive';
            statusText.className = toggle.classList.contains('active') ? 
                'text-sm text-green-600 ml-2' : 'text-sm text-gray-500 ml-2';
        }

        function toggleFeature(event) {
            const toggle = event.currentTarget;
            toggle.classList.toggle('active');
        }

        function updateBookingStatus(event) {
            const select = event.currentTarget;
            const value = select.value;
            
            // Update class based on selected value
            select.className = 'px-3 py-1.5 border rounded-lg text-sm font-medium ';
            if (value === 'Confirmed') {
                select.classList.add('bg-green-50', 'text-green-700');
            } else if (value === 'Pending') {
                select.classList.add('bg-yellow-50', 'text-yellow-700');
            } else if (value === 'Completed') {
                select.classList.add('bg-blue-50', 'text-blue-700');
            } else if (value === 'Cancelled') {
                select.classList.add('bg-red-50', 'text-red-700');
            }
        }

        function toggleReview(event) {
            const toggle = event.currentTarget;
            toggle.classList.toggle('active');
        }

        function togglePublish(event) {
            const toggle = event.currentTarget;
            toggle.classList.toggle('active');
        }

        function toggleUser(event) {
            const toggle = event.currentTarget;
            toggle.classList.toggle('active');
            
            const statusText = toggle.nextElementSibling;
            statusText.textContent = toggle.classList.contains('active') ? 'Active' : 'Inactive';
            statusText.className = toggle.classList.contains('active') ? 
                'text-sm text-green-600 ml-2' : 'text-sm text-red-600 ml-2';
        }

        // Close modal when clicking outside
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.modal-overlay').forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        this.classList.add('hidden');
                    }
                });
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>