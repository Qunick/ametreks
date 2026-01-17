<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trek Admin - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('styles')
    
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        :root {
            --primary-dark: #052734;
            --primary-blue: #005991;
            --accent-blue: #4D8BB2;
            --grey: #6D6E70;
            --trail-red: #C9302C;
            --trail-green: #99C723;
        }
        
        body {
            background: #f8fafc;
        }
        
        /* Sidebar */
        .sidebar {
            background: var(--primary-dark);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .sidebar-link {
            color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            margin: 4px 12px;
            padding: 12px 16px;
            transition: all 0.2s ease;
            position: relative;
        }
        
        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        .sidebar-link.active {
            background: var(--primary-blue);
            color: white;
        }
        
        .sidebar-link.active::before {
            content: '';
            position: absolute;
            left: -12px;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 24px;
            background: var(--trail-green);
            border-radius: 0 4px 4px 0;
        }
        
        .sidebar-icon {
            width: 20px;
            text-align: center;
            font-size: 1rem;
        }
        
        /* Mobile overlay */
        .sidebar-overlay {
            background: rgba(5, 39, 52, 0.5);
            backdrop-filter: blur(4px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        /* Cards */
        .card {
            background: white;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            transition: all 0.2s ease;
        }
        
        .card:hover {
            box-shadow: 0 4px 12px rgba(5, 39, 52, 0.08);
            border-color: var(--accent-blue);
        }
        
        /* Table */
        .data-table {
            background: white;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }
        
        .data-table thead {
            background: #f8fafc;
        }
        
        .data-table th {
            font-weight: 600;
            color: var(--primary-dark);
            text-transform: uppercase;
            font-size: 0.7rem;
            letter-spacing: 0.05em;
            padding: 14px 16px;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .data-table td {
            padding: 14px 16px;
            border-bottom: 1px solid #f1f5f9;
        }
        
        .data-table tbody tr {
            transition: background-color 0.15s ease;
        }
        
        .data-table tbody tr:hover {
            background: #f8fafc;
        }
        
        .data-table tbody tr:last-child td {
            border-bottom: none;
        }
        
        /* Badges */
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .badge-success {
            background: rgba(153, 199, 35, 0.15);
            color: #6b8c12;
        }
        
        .badge-warning {
            background: rgba(245, 158, 11, 0.15);
            color: #b45309;
        }
        
        .badge-danger {
            background: rgba(201, 48, 44, 0.15);
            color: var(--trail-red);
        }
        
        .badge-info {
            background: rgba(0, 89, 145, 0.15);
            color: var(--primary-blue);
        }
        
        .badge-neutral {
            background: #f1f5f9;
            color: var(--grey);
        }
        
        /* Buttons */
        .btn {
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
        }
        
        .btn-primary {
            background: var(--primary-blue);
            color: white;
        }
        
        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 89, 145, 0.3);
        }
        
        .btn-secondary {
            background: white;
            color: var(--primary-dark);
            border: 1px solid #e2e8f0;
        }
        
        .btn-secondary:hover {
            background: #f8fafc;
            border-color: var(--accent-blue);
        }
        
        .btn-success {
            background: var(--trail-green);
            color: white;
        }
        
        .btn-success:hover {
            background: #7ba81a;
        }
        
        .btn-danger {
            background: var(--trail-red);
            color: white;
        }
        
        .btn-danger:hover {
            background: #a82420;
        }
        
        .btn-sm {
            padding: 6px 12px;
            font-size: 0.8rem;
        }
        
        /* Inputs */
        .form-input {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px 14px;
            transition: all 0.2s ease;
            background: white;
            width: 100%;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(0, 89, 145, 0.1);
        }
        
        /* Dropdown */
        .dropdown-menu {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(5, 39, 52, 0.15);
            min-width: 220px;
            z-index: 50;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.2s ease;
        }
        
        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            color: var(--grey);
            transition: all 0.15s ease;
        }
        
        .dropdown-item:hover {
            background: #f8fafc;
            color: var(--primary-dark);
        }
        
        .dropdown-item:first-child {
            border-radius: 12px 12px 0 0;
        }
        
        .dropdown-item:last-child {
            border-radius: 0 0 12px 12px;
        }
        
        .dropdown-divider {
            height: 1px;
            background: #e2e8f0;
            margin: 4px 0;
        }
        
        /* Toggle */
        .toggle {
            width: 48px;
            height: 26px;
            background: #e2e8f0;
            border-radius: 13px;
            position: relative;
            cursor: pointer;
            transition: background 0.2s ease;
        }
        
        .toggle.active {
            background: var(--trail-green);
        }
        
        .toggle::after {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }
        
        .toggle.active::after {
            transform: translateX(22px);
        }
        
        /* Progress */
        .progress {
            height: 8px;
            background: #e2e8f0;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--primary-blue), var(--accent-blue));
            border-radius: 4px;
            transition: width 0.5s ease;
        }
        
        /* Status dot */
        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
        }
        
        .status-online { background: var(--trail-green); }
        .status-offline { background: #9ca3af; }
        .status-busy { background: var(--trail-red); }
        
        /* Notification badge */
        .notification-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            width: 18px;
            height: 18px;
            background: var(--trail-red);
            color: white;
            font-size: 0.65rem;
            font-weight: 700;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
        }
        
        /* Search */
        .search-box {
            position: relative;
        }
        
        .search-box input {
            padding-left: 44px;
            background: #f8fafc;
            border: 1px solid transparent;
        }
        
        .search-box input:focus {
            background: white;
            border-color: var(--primary-blue);
        }
        
        .search-box i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--grey);
        }
        
        /* Stats grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        
        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--accent-blue);
            border-radius: 3px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-blue);
        }
        
        /* Responsive */
        @media (max-width: 1280px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 1024px) {
            .sidebar {
                position: fixed;
                left: 0;
                top: 0;
                bottom: 0;
                z-index: 50;
                transform: translateX(-100%);
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
        }
        
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .header-actions {
                display: none;
            }
            
            .mobile-search {
                display: block;
            }
        }
        
        @media (max-width: 640px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 16px;
            }
        }
        
        /* Loading skeleton */
        .skeleton {
            background: linear-gradient(90deg, #f1f5f9 25%, #e2e8f0 50%, #f1f5f9 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            border-radius: 8px;
        }
        
        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
        
        /* Pulse animation for notifications */
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
    </style>
</head>
<body>
    <!-- Mobile sidebar overlay -->
    <div class="sidebar-overlay fixed inset-0 z-40 lg:hidden" id="sidebarOverlay"></div>
    
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="sidebar w-72 flex-shrink-0 flex flex-col z-50" id="sidebar">
            <!-- Logo -->
            <div class="p-6">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-xl flex items-center justify-center" style="background: var(--primary-blue);">
                        <i class="fas fa-mountain text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">TrekAdmin</h1>
                        <p class="text-xs text-white/50">Management Portal</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="flex-1 py-4 overflow-y-auto">
                <div class="px-4 mb-2">
                    <span class="text-xs font-semibold text-white/40 uppercase tracking-wider">Main Menu</span>
                </div>
                
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center gap-3 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="sidebar-icon fas fa-chart-pie"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                
                <a href="{{ route('admin.treks.index') }}" class="sidebar-link flex items-center gap-3 {{ request()->routeIs('admin.treks.*') ? 'active' : '' }}">
                    <i class="sidebar-icon fas fa-route"></i>
                    <span class="font-medium">Tours & Treks</span>
                </a>
                
                <a href="{{ route('admin.bookings.index') }}" class="sidebar-link flex items-center gap-3 {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                    <i class="sidebar-icon fas fa-calendar-check"></i>
                    <span class="font-medium">Bookings</span>
                    <span class="ml-auto text-xs font-bold px-2 py-1 rounded-full text-white" style="background: var(--trail-red);">24</span>
                </a>
                
                <a href="{{ route('admin.reviews.index') }}" class="sidebar-link flex items-center gap-3 {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                    <i class="sidebar-icon fas fa-star"></i>
                    <span class="font-medium">Reviews</span>
                </a>
                
                <a href="{{ route('admin.blogs.index') }}" class="sidebar-link flex items-center gap-3 {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                    <i class="sidebar-icon fas fa-newspaper"></i>
                    <span class="font-medium">Blog Posts</span>
                </a>
                
                <div class="px-2" x-data="{ open: {{ request()->routeIs('admin.users.*') ? 'true' : 'false' }} }">
    <button
        @click="open = !open"
        class="sidebar-link flex items-center gap-3
        {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
    >
        <div class="flex items-center gap-3">
            <i class="sidebar-icon fas fa-users"></i>
            <span class="font-medium">Users</span>
        </div>
        <i class="fas fa-chevron-down text-xs transition-transform"
           :class="open ? 'rotate-180' : ''"></i>
    </button>

    <div x-show="open" x-collapse class="ml-6 mt-1 space-y-1">
       <a href="{{ route('admin.loggedin-users.index') }}"
   class="sidebar-link flex items-center gap-3 !py-2 text-sm
   {{ request()->routeIs('admin.loggedin-users.*') ? 'active' : '' }}">
    <i class="fas fa-user"></i>
    Logged-in Users
</a>

<a href="{{ route('admin.guest-users.index') }}"
   class="sidebar-link flex items-center gap-3 !py-2 text-sm
   {{ request()->routeIs('admin.guest-users.*') ? 'active' : '' }}">
    <i class="fas fa-user-slash"></i>
    Guest Users
</a>
    </div>
</div>

<div class="px-2"
     x-data="{ open: {{ request()->routeIs(
        'admin.company.admin.*',
        'admin.company.guides.*'
     ) ? 'true' : 'false' }} }">

    <button
        type="button"
        @click="open = !open"
        class="sidebar-link flex items-center gap-3
        {{ request()->routeIs(
            'admin.company.admin.*',
            'admin.company.guides.*'
        ) ? 'active' : '' }}"
    >
        <div class="flex items-center gap-3">
            <i class="sidebar-icon fas fa-building"></i>
            <span class="font-medium">Company</span>
        </div>

        <i class="fas fa-chevron-down text-xs transition-transform"
           :class="open ? 'rotate-180' : ''"></i>
    </button>

    <div x-show="open" x-collapse class="ml-6 mt-1 space-y-1">
        {{-- Administrator --}}
        <a href="{{ route('admin.administration.index') }}"
           class="sidebar-link flex items-center gap-3 !py-2 text-sm
           {{ request()->routeIs('admin.company.admin.*') ? 'active' : '' }}">
            <i class="fas fa-user-shield"></i>
            Administrator
        </a>

        {{-- Guides / Porters --}}
        <a href="{{ route('admin.non-administration.index') }}"
           class="sidebar-link flex items-center gap-3 !py-2 text-sm
           {{ request()->routeIs('admin.company.guides.*') ? 'active' : '' }}">
            <i class="fas fa-hiking"></i>
            Guides / Porters
        </a>
            </div>
                </div>

                <div class="px-4 mt-8 mb-2">
                    <span class="text-xs font-semibold text-white/40 uppercase tracking-wider">Settings</span>
                </div>
                
                <a href="#" class="sidebar-link flex items-center gap-3">
                    <i class="sidebar-icon fas fa-cog"></i>
                    <span class="font-medium">Settings</span>
                </a>
                
                <a href="#" class="sidebar-link flex items-center gap-3">
                    <i class="sidebar-icon fas fa-life-ring"></i>
                    <span class="font-medium">Help Center</span>
                </a>
            </nav>
            
            <!-- User section -->
            <div class="p-4 border-t border-white/10">
                <div class="flex items-center gap-3 p-3 rounded-xl bg-white/5">
                    <div class="relative">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center" style="background: var(--accent-blue);">
                            <span class="font-semibold text-white text-sm">AD</span>
                        </div>
                        <div class="status-dot status-online absolute -bottom-0.5 -right-0.5 border-2" style="border-color: var(--primary-dark);"></div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-white truncate">Admin User</p>
                        <p class="text-xs text-white/50 truncate">admin@trekking.com</p>
                    </div>
                    <button class="text-white/50 hover:text-white transition-colors">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
            </div>
        </aside>
        
        <!-- Main content -->
        <main class="flex-1 flex flex-col min-h-screen">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 sticky top-0 z-30">
                <div class="px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex items-center justify-between page-header">
                        <div class="flex items-center gap-4">
                            <!-- Mobile menu toggle -->
                            <button class="lg:hidden w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100 hover:bg-gray-200 transition-colors" id="mobileMenuToggle">
                                <i class="fas fa-bars" style="color: var(--primary-dark);"></i>
                            </button>
                            
                            <div>
                                <h1 class="text-xl sm:text-2xl font-bold" style="color: var(--primary-dark);">@yield('page-title', 'Dashboard')</h1>
                                <p class="text-sm mt-0.5" style="color: var(--grey);">@yield('page-subtitle', 'Overview of your trekking business')</p>
                            </div>
                        </div>
                        
                        <div class="header-actions flex items-center gap-3">
                            <!-- Search -->
                            <div class="search-box hidden md:block">
                                <i class="fas fa-search"></i>
                                <input type="text" placeholder="Search anything..." class="form-input w-64">
                            </div>
                            
                            <!-- Notifications -->
                            <button class="relative w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100 hover:bg-gray-200 transition-colors" id="notificationBtn">
                                <i class="fas fa-bell" style="color: var(--grey);"></i>
                                <span class="notification-badge pulse">3</span>
                            </button>
                            
                            <!-- User dropdown -->
                            <div class="relative" id="userDropdownContainer">
                                <button class="flex items-center gap-3 p-2 rounded-xl hover:bg-gray-100 transition-colors" id="userDropdownBtn">
                                    <div class="w-9 h-9 rounded-full flex items-center justify-center" style="background: var(--primary-blue);">
                                        <span class="font-semibold text-white text-sm">AD</span>
                                    </div>
                                    <div class="hidden sm:block text-left">
                                        <p class="text-sm font-semibold" style="color: var(--primary-dark);">Admin</p>
                                        <p class="text-xs" style="color: var(--grey);">Super Admin</p>
                                    </div>
                                    <i class="fas fa-chevron-down text-xs hidden sm:block" style="color: var(--grey);"></i>
                                </button>
                                
                                <!-- Dropdown menu -->
                                <div class="dropdown-menu" id="userDropdown">
                                    <div class="p-4 border-b border-gray-100">
                                        <p class="font-semibold" style="color: var(--primary-dark);">Admin User</p>
                                        <p class="text-sm" style="color: var(--grey);">admin@trekking.com</p>
                                    </div>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-user" style="color: var(--accent-blue);"></i>
                                        <span>My Profile</span>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-cog" style="color: var(--accent-blue);"></i>
                                        <span>Account Settings</span>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-bell" style="color: var(--accent-blue);"></i>
                                        <span>Notifications</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('logout') }}" class="dropdown-item" style="color: var(--trail-red);">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Mobile search (shown on small screens) -->
                    <div class="mobile-search hidden mt-4 md:hidden">
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" placeholder="Search..." class="form-input w-full">
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page content -->
            <div class="flex-1 p-4 sm:p-6 lg:p-8">
                @yield('content')
            </div>
            
            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 py-4 px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-2">
                    <p class="text-sm" style="color: var(--grey);">
                        © 2026 <span class="font-semibold" style="color: var(--primary-dark);">TrekAdmin</span>. All rights reserved.
                    </p>
                    <div class="flex items-center gap-4">
                        <a href="#" class="text-sm hover:underline" style="color: var(--accent-blue);">Privacy</a>
                        <a href="#" class="text-sm hover:underline" style="color: var(--accent-blue);">Terms</a>
                        <span class="text-xs px-2 py-1 rounded-full" style="background: rgba(0, 89, 145, 0.1); color: var(--primary-blue);">v2.1.0</span>
                    </div>
                </div>
            </footer>
        </main>
    </div>
    
    <!-- Notification panel -->
    <div class="fixed top-20 right-4 w-80 bg-white rounded-xl shadow-xl border border-gray-200 z-50 opacity-0 invisible transform translate-y-2 transition-all duration-200" id="notificationPanel">
        <div class="p-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-semibold" style="color: var(--primary-dark);">Notifications</h3>
            <button class="text-sm font-medium" style="color: var(--primary-blue);">Mark all read</button>
        </div>
        <div class="max-h-80 overflow-y-auto">
            <a href="#" class="flex gap-3 p-4 hover:bg-gray-50 border-l-4" style="border-color: var(--trail-green);">
                <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0" style="background: rgba(153, 199, 35, 0.15);">
                    <i class="fas fa-calendar-check" style="color: var(--trail-green);"></i>
                </div>
                <div>
                    <p class="text-sm font-medium" style="color: var(--primary-dark);">New booking received</p>
                    <p class="text-xs" style="color: var(--grey);">Everest Base Camp - 2 pax</p>
                    <p class="text-xs mt-1" style="color: var(--accent-blue);">2 min ago</p>
                </div>
            </a>
            <a href="#" class="flex gap-3 p-4 hover:bg-gray-50 border-l-4" style="border-color: var(--primary-blue);">
                <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0" style="background: rgba(0, 89, 145, 0.15);">
                    <i class="fas fa-star" style="color: var(--primary-blue);"></i>
                </div>
                <div>
                    <p class="text-sm font-medium" style="color: var(--primary-dark);">New 5-star review</p>
                    <p class="text-xs" style="color: var(--grey);">Annapurna Circuit Trek</p>
                    <p class="text-xs mt-1" style="color: var(--accent-blue);">15 min ago</p>
                </div>
            </a>
            <a href="#" class="flex gap-3 p-4 hover:bg-gray-50 border-l-4" style="border-color: var(--trail-red);">
                <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0" style="background: rgba(201, 48, 44, 0.15);">
                    <i class="fas fa-exclamation-triangle" style="color: var(--trail-red);"></i>
                </div>
                <div>
                    <p class="text-sm font-medium" style="color: var(--primary-dark);">Payment pending</p>
                    <p class="text-xs" style="color: var(--grey);">Booking #TRK-2024-089</p>
                    <p class="text-xs mt-1" style="color: var(--accent-blue);">1 hour ago</p>
                </div>
            </a>
        </div>
        <div class="p-3 border-t border-gray-100">
            <a href="#" class="block text-center text-sm font-medium py-2 rounded-lg hover:bg-gray-50" style="color: var(--primary-blue);">
                View all notifications
            </a>
        </div>
    </div>

    @stack('modals')

    <script>
        // Mobile sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        
        function openSidebar() {
            sidebar.classList.add('open');
            sidebarOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closeSidebar() {
            sidebar.classList.remove('open');
            sidebarOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }
        
        mobileMenuToggle.addEventListener('click', openSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar);
        
        // Close sidebar on window resize to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                closeSidebar();
            }
        });
        
        // User dropdown
        const userDropdownBtn = document.getElementById('userDropdownBtn');
        const userDropdown = document.getElementById('userDropdown');
        const userDropdownContainer = document.getElementById('userDropdownContainer');
        
        userDropdownBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            userDropdown.classList.toggle('show');
            notificationPanel.classList.remove('opacity-100', 'visible', 'translate-y-0');
            notificationPanel.classList.add('opacity-0', 'invisible', 'translate-y-2');
        });
        
        // Notification panel
        const notificationBtn = document.getElementById('notificationBtn');
        const notificationPanel = document.getElementById('notificationPanel');
        
        notificationBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            const isVisible = notificationPanel.classList.contains('opacity-100');
            
            if (isVisible) {
                notificationPanel.classList.remove('opacity-100', 'visible', 'translate-y-0');
                notificationPanel.classList.add('opacity-0', 'invisible', 'translate-y-2');
            } else {
                notificationPanel.classList.remove('opacity-0', 'invisible', 'translate-y-2');
                notificationPanel.classList.add('opacity-100', 'visible', 'translate-y-0');
                userDropdown.classList.remove('show');
            }
        });
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!userDropdownContainer.contains(e.target)) {
                userDropdown.classList.remove('show');
            }
            if (!notificationBtn.contains(e.target) && !notificationPanel.contains(e.target)) {
                notificationPanel.classList.remove('opacity-100', 'visible', 'translate-y-0');
                notificationPanel.classList.add('opacity-0', 'invisible', 'translate-y-2');
            }
        });
        
        // Close dropdowns on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                userDropdown.classList.remove('show');
                notificationPanel.classList.remove('opacity-100', 'visible', 'translate-y-0');
                notificationPanel.classList.add('opacity-0', 'invisible', 'translate-y-2');
                closeSidebar();
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>
