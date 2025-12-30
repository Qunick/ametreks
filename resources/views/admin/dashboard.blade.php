<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trek Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="{{ asset('admin-assets/js/admin.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                <a onclick="switchTab('dashboard')" class="nav-item sidebar-active flex items-center p-3 rounded-lg cursor-pointer transition-all duration-200">
                    <i class="fas fa-chart-line w-5 mr-3 text-lg"></i> 
                    <span class="font-medium">Dashboard</span>
                </a>
                <a onclick="switchTab('tours')" class="nav-item flex items-center p-3 rounded-lg hover:bg-gray-800 cursor-pointer transition-all duration-200">
                    <i class="fas fa-map-marked-alt w-5 mr-3 text-lg"></i> 
                    <span class="font-medium">Tours & Treks</span>
                </a>
                <a onclick="switchTab('bookings')" class="nav-item flex items-center p-3 rounded-lg hover:bg-gray-800 cursor-pointer transition-all duration-200">
                    <i class="fas fa-calendar-check w-5 mr-3 text-lg"></i> 
                    <span class="font-medium">Bookings</span>
                    <span class="ml-auto bg-blue-500 text-white text-xs px-2 py-1 rounded-full">24</span>
                </a>
                <a onclick="switchTab('reviews')" class="nav-item flex items-center p-3 rounded-lg hover:bg-gray-800 cursor-pointer transition-all duration-200">
                    <i class="fas fa-star w-5 mr-3 text-lg"></i> 
                    <span class="font-medium">Reviews</span>
                </a>
                <a onclick="switchTab('blogs')" class="nav-item flex items-center p-3 rounded-lg hover:bg-gray-800 cursor-pointer transition-all duration-200">
                    <i class="fas fa-blog w-5 mr-3 text-lg"></i> 
                    <span class="font-medium">Blog Posts</span>
                </a>
                <a onclick="switchTab('users')" class="nav-item flex items-center p-3 rounded-lg hover:bg-gray-800 cursor-pointer transition-all duration-200">
                    <i class="fas fa-users w-5 mr-3 text-lg"></i> 
                    <span class="font-medium">Users</span>
                </a>
                <div class="pt-6 mt-6 border-t border-gray-800">
                    <a onclick="switchTab('settings')" class="nav-item flex items-center p-3 rounded-lg hover:bg-gray-800 cursor-pointer transition-all duration-200">
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
                        <h2 id="pageTitle" class="text-2xl font-bold text-gray-800">Dashboard</h2>
                        <p class="text-gray-500 text-sm">Welcome back, Admin! Here's what's happening today.</p>
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
                <!-- Dashboard Section -->
                <div id="dashboard" class="tab-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="stat-card blue" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-blue-100 text-sm font-medium">Total Bookings</p>
                                    <p class="text-4xl font-bold mt-2">1,245</p>
                                    <p class="text-blue-200 text-xs mt-2"><i class="fas fa-arrow-up mr-1"></i> 12% from last month</p>
                                </div>
                                <div class="bg-blue-500 bg-opacity-30 p-3 rounded-xl">
                                    <i class="fas fa-calendar-check text-3xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="stat-card green" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-green-100 text-sm font-medium">Revenue</p>
                                    <p class="text-4xl font-bold mt-2">$45.2K</p>
                                    <p class="text-green-200 text-xs mt-2"><i class="fas fa-arrow-up mr-1"></i> 8.5% from last month</p>
                                </div>
                                <div class="bg-green-500 bg-opacity-30 p-3 rounded-xl">
                                    <i class="fas fa-dollar-sign text-3xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="stat-card purple" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-purple-100 text-sm font-medium">Active Tours</p>
                                    <p class="text-4xl font-bold mt-2">24</p>
                                    <p class="text-purple-200 text-xs mt-2"><i class="fas fa-plus mr-1"></i> 3 new this month</p>
                                </div>
                                <div class="bg-purple-500 bg-opacity-30 p-3 rounded-xl">
                                    <i class="fas fa-mountain text-3xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="stat-card orange" style="background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-orange-100 text-sm font-medium">Reviews</p>
                                    <p class="text-4xl font-bold mt-2">487</p>
                                    <p class="text-orange-200 text-xs mt-2">Avg. rating: <span class="font-bold">4.7/5</span></p>
                                </div>
                                <div class="bg-orange-500 bg-opacity-30 p-3 rounded-xl">
                                    <i class="fas fa-star text-3xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                        <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-lg font-semibold text-gray-800">Recent Bookings</h3>
                                <a href="#" class="text-blue-600 text-sm font-medium hover:text-blue-800">View All</a>
                            </div>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center p-4 border border-gray-100 rounded-xl hover:border-blue-200 transition">
                                    <div class="flex items-center">
                                        <div class="bg-blue-50 p-2 rounded-lg mr-4">
                                            <i class="fas fa-mountain text-blue-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Everest Base Camp</p>
                                            <p class="text-sm text-gray-500">John Doe • Dec 20, 2024</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <span class="badge badge-confirmed">Confirmed</span>
                                        <span class="font-semibold">$2,500</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center p-4 border border-gray-100 rounded-xl hover:border-yellow-200 transition">
                                    <div class="flex items-center">
                                        <div class="bg-yellow-50 p-2 rounded-lg mr-4">
                                            <i class="fas fa-map-marked-alt text-yellow-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Annapurna Circuit</p>
                                            <p class="text-sm text-gray-500">Jane Smith • Dec 18, 2024</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <span class="badge badge-pending">Pending</span>
                                        <span class="font-semibold">$1,800</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center p-4 border border-gray-100 rounded-xl hover:border-blue-200 transition">
                                    <div class="flex items-center">
                                        <div class="bg-green-50 p-2 rounded-lg mr-4">
                                            <i class="fas fa-hiking text-green-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Manaslu Trek</p>
                                            <p class="text-sm text-gray-500">Mike Johnson • Dec 15, 2024</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <span class="badge badge-completed">Completed</span>
                                        <span class="font-semibold">$2,200</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-6">Top Rated Tours</h3>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center p-4 bg-gradient-to-r from-gray-50 to-white rounded-xl border border-gray-100">
                                    <div>
                                        <p class="font-medium">Khumbu Trek</p>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <span class="text-sm text-gray-600 ml-2">4.9/5 (156 reviews)</span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="progress-bar w-24">
                                            <div class="progress-fill bg-yellow-500" style="width: 98%"></div>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">98% positive</p>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center p-4 bg-gradient-to-r from-gray-50 to-white rounded-xl border border-gray-100">
                                    <div>
                                        <p class="font-medium">Poon Hill Trek</p>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span class="text-sm text-gray-600 ml-2">4.8/5 (142 reviews)</span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="progress-bar w-24">
                                            <div class="progress-fill bg-green-500" style="width: 96%"></div>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">96% positive</p>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center p-4 bg-gradient-to-r from-gray-50 to-white rounded-xl border border-gray-100">
                                    <div>
                                        <p class="font-medium">Langtang Trek</p>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <span class="text-sm text-gray-600 ml-2">4.7/5 (98 reviews)</span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="progress-bar w-24">
                                            <div class="progress-fill bg-blue-500" style="width: 94%"></div>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">94% positive</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Monthly Booking Trends</h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-sm bg-blue-50 text-blue-600 rounded-lg font-medium">This Year</button>
                                <button class="px-3 py-1 text-sm text-gray-600 hover:text-blue-600 rounded-lg font-medium">Last Year</button>
                            </div>
                        </div>
                        <div class="chart-container">
                            <div class="flex items-end h-48 space-x-4">
                                <div class="flex-1 flex flex-col items-center">
                                    <div class="bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg w-10" style="height: 80%;"></div>
                                    <span class="text-xs text-gray-500 mt-2">Jan</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center">
                                    <div class="bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg w-10" style="height: 65%;"></div>
                                    <span class="text-xs text-gray-500 mt-2">Feb</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center">
                                    <div class="bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg w-10" style="height: 50%;"></div>
                                    <span class="text-xs text-gray-500 mt-2">Mar</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center">
                                    <div class="bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg w-10" style="height: 70%;"></div>
                                    <span class="text-xs text-gray-500 mt-2">Apr</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center">
                                    <div class="bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg w-10" style="height: 90%;"></div>
                                    <span class="text-xs text-gray-500 mt-2">May</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center">
                                    <div class="bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg w-10" style="height: 100%;"></div>
                                    <span class="text-xs text-gray-500 mt-2">Jun</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center">
                                    <div class="bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg w-10" style="height: 95%;"></div>
                                    <span class="text-xs text-gray-500 mt-2">Jul</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center">
                                    <div class="bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg w-10" style="height: 85%;"></div>
                                    <span class="text-xs text-gray-500 mt-2">Aug</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center">
                                    <div class="bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg w-10" style="height: 75%;"></div>
                                    <span class="text-xs text-gray-500 mt-2">Sep</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center">
                                    <div class="bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg w-10" style="height: 60%;"></div>
                                    <span class="text-xs text-gray-500 mt-2">Oct</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center">
                                    <div class="bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg w-10" style="height: 55%;"></div>
                                    <span class="text-xs text-gray-500 mt-2">Nov</span>
                                </div>
                                <div class="flex-1 flex flex-col items-center">
                                    <div class="bg-gradient-to-t from-blue-500 to-blue-300 rounded-t-lg w-10" style="height: 40%;"></div>
                                    <span class="text-xs text-gray-500 mt-2">Dec</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tours & Treks Section -->
                <div id="tours" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow overflow-hidden">
                        <div class="p-6 border-b flex justify-between items-center">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">Manage Tours & Treks</h3>
                                <p class="text-gray-500 text-sm mt-1">Create, edit, and manage your trekking tours</p>
                            </div>
                            <button onclick="openModal('tourModal')" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2.5 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition flex items-center shadow">
                                <i class="fas fa-plus mr-2"></i> Add New Tour
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Tour Name</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Duration</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Price</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Bookings</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    <tr class="table-row-hover">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                                    <i class="fas fa-mountain text-blue-500"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium">Everest Base Camp</p>
                                                    <p class="text-sm text-gray-500">Nepal • Difficult</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-medium">14 days</td>
                                        <td class="px-6 py-4">
                                            <span class="font-semibold text-gray-800">$2,500</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="toggle-switch active" onclick="toggleStatus(event)"><span class="toggle-slider"></span></span>
                                            <span class="text-sm text-green-600 ml-2">Active</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="font-medium">145</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex space-x-2">
                                                <button class="bg-blue-50 text-blue-600 p-2 rounded-lg hover:bg-blue-100 transition">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="bg-red-50 text-red-600 p-2 rounded-lg hover:bg-red-100 transition">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="table-row-hover">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="bg-green-50 p-2 rounded-lg mr-3">
                                                    <i class="fas fa-map-marked-alt text-green-500"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium">Annapurna Circuit</p>
                                                    <p class="text-sm text-gray-500">Nepal • Moderate</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-medium">21 days</td>
                                        <td class="px-6 py-4">
                                            <span class="font-semibold text-gray-800">$1,800</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="toggle-switch active" onclick="toggleStatus(event)"><span class="toggle-slider"></span></span>
                                            <span class="text-sm text-green-600 ml-2">Active</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="font-medium">89</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex space-x-2">
                                                <button class="bg-blue-50 text-blue-600 p-2 rounded-lg hover:bg-blue-100 transition">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="bg-red-50 text-red-600 p-2 rounded-lg hover:bg-red-100 transition">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="table-row-hover">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="bg-purple-50 p-2 rounded-lg mr-3">
                                                    <i class="fas fa-hiking text-purple-500"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium">Manaslu Trek</p>
                                                    <p class="text-sm text-gray-500">Nepal • Challenging</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-medium">18 days</td>
                                        <td class="px-6 py-4">
                                            <span class="font-semibold text-gray-800">$2,200</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="toggle-switch" onclick="toggleStatus(event)"><span class="toggle-slider"></span></span>
                                            <span class="text-sm text-gray-500 ml-2">Inactive</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="font-medium">56</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex space-x-2">
                                                <button class="bg-blue-50 text-blue-600 p-2 rounded-lg hover:bg-blue-100 transition">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="bg-red-50 text-red-600 p-2 rounded-lg hover:bg-red-100 transition">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-4 border-t bg-gray-50 flex justify-between items-center">
                            <p class="text-sm text-gray-500">Showing 3 of 24 tours</p>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1.5 border rounded-lg text-sm hover:bg-gray-100">Previous</button>
                                <button class="px-3 py-1.5 bg-blue-600 text-white rounded-lg text-sm">1</button>
                                <button class="px-3 py-1.5 border rounded-lg text-sm hover:bg-gray-100">2</button>
                                <button class="px-3 py-1.5 border rounded-lg text-sm hover:bg-gray-100">3</button>
                                <button class="px-3 py-1.5 border rounded-lg text-sm hover:bg-gray-100">Next</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bookings Section -->
                <div id="bookings" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow">
                        <div class="p-6 border-b">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800">All Bookings</h3>
                                    <p class="text-gray-500 text-sm mt-1">Manage and track customer bookings</p>
                                </div>
                                <div class="flex space-x-3">
                                    <button class="px-4 py-2 border rounded-xl text-sm font-medium hover:bg-gray-50">Export</button>
                                    <button class="px-4 py-2 bg-blue-600 text-white rounded-xl text-sm font-medium hover:bg-blue-700">Filter</button>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Booking ID</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Customer</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Tour</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Date</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Amount</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    <tr class="table-row-hover">
                                        <td class="px-6 py-4 font-medium text-blue-600">#BK001</td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="avatar mr-3">JD</div>
                                                <div>
                                                    <p class="font-medium">John Doe</p>
                                                    <p class="text-sm text-gray-500">john@example.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-medium">Everest Base Camp</td>
                                        <td class="px-6 py-4">
                                            <p>Dec 20, 2024</p>
                                            <p class="text-sm text-gray-500">14 days</p>
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-800">$2,500</td>
                                        <td class="px-6 py-4">
                                            <select onchange="updateBookingStatus(event)" class="px-3 py-1.5 border rounded-lg text-sm font-medium bg-green-50 text-green-700">
                                                <option selected>Confirmed</option>
                                                <option>Pending</option>
                                                <option>Completed</option>
                                                <option>Cancelled</option>
                                            </select>
                                        </td>
                                        <td class="px-6 py-4">
                                            <button class="bg-gray-100 text-gray-700 p-2 rounded-lg hover:bg-gray-200 transition">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="table-row-hover">
                                        <td class="px-6 py-4 font-medium text-blue-600">#BK002</td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="avatar mr-3">JS</div>
                                                <div>
                                                    <p class="font-medium">Jane Smith</p>
                                                    <p class="text-sm text-gray-500">jane@example.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-medium">Annapurna Circuit</td>
                                        <td class="px-6 py-4">
                                            <p>Dec 18, 2024</p>
                                            <p class="text-sm text-gray-500">21 days</p>
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-800">$1,800</td>
                                        <td class="px-6 py-4">
                                            <select onchange="updateBookingStatus(event)" class="px-3 py-1.5 border rounded-lg text-sm font-medium bg-yellow-50 text-yellow-700">
                                                <option>Confirmed</option>
                                                <option selected>Pending</option>
                                                <option>Completed</option>
                                                <option>Cancelled</option>
                                            </select>
                                        </td>
                                        <td class="px-6 py-4">
                                            <button class="bg-gray-100 text-gray-700 p-2 rounded-lg hover:bg-gray-200 transition">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Reviews Section -->
                <div id="reviews" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow">
                        <div class="p-6 border-b">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800">Customer Reviews</h3>
                                    <p class="text-gray-500 text-sm mt-1">Manage and moderate customer reviews</p>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="text-lg font-semibold text-gray-800">4.7</span>
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="text-sm text-gray-500">(487 reviews)</span>
                                </div>
                            </div>
                        </div>
                        <div class="divide-y">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex items-start">
                                        <div class="avatar mr-4">JD</div>
                                        <div>
                                            <p class="font-semibold">Excellent Trek Experience</p>
                                            <p class="text-sm text-gray-500">By John Doe on Everest Base Camp • Dec 20, 2024</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div class="flex text-yellow-400">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="toggle-switch active" onclick="toggleReview(event)"><span class="toggle-slider"></span></span>
                                    </div>
                                </div>
                                <p class="text-gray-700 mb-4 pl-16">"Amazing experience! The guides were professional and the scenery was breathtaking. The organization was flawless from start to finish. Highly recommended for anyone looking for an authentic trekking adventure!"</p>
                                <div class="flex space-x-3 pl-16">
                                    <button class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-sm font-medium hover:bg-red-100 transition">
                                        <i class="fas fa-trash mr-1"></i> Delete
                                    </button>
                                    <button class="px-3 py-1.5 bg-blue-50 text-blue-600 rounded-lg text-sm font-medium hover:bg-blue-100 transition">
                                        <i class="fas fa-reply mr-1"></i> Reply
                                    </button>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex items-start">
                                        <div class="avatar mr-4">SW</div>
                                        <div>
                                            <p class="font-semibold">Good But Challenging</p>
                                            <p class="text-sm text-gray-500">By Sarah Wilson on Annapurna Circuit • Dec 18, 2024</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div class="flex text-yellow-400">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <span class="toggle-switch active" onclick="toggleReview(event)"><span class="toggle-slider"></span></span>
                                    </div>
                                </div>
                                <p class="text-gray-700 mb-4 pl-16">"Great trek with stunning views. Physical conditioning is important for this one. The food and accommodation were good, though some lodges were basic. Overall a rewarding experience."</p>
                                <div class="flex space-x-3 pl-16">
                                    <button class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-sm font-medium hover:bg-red-100 transition">
                                        <i class="fas fa-trash mr-1"></i> Delete
                                    </button>
                                    <button class="px-3 py-1.5 bg-blue-50 text-blue-600 rounded-lg text-sm font-medium hover:bg-blue-100 transition">
                                        <i class="fas fa-reply mr-1"></i> Reply
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blogs Section -->
                <div id="blogs" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow">
                        <div class="p-6 border-b flex justify-between items-center">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">Blog Posts</h3>
                                <p class="text-gray-500 text-sm mt-1">Manage your trekking blog content</p>
                            </div>
                            <button onclick="openModal('blogModal')" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2.5 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition flex items-center shadow">
                                <i class="fas fa-plus mr-2"></i> New Post
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Title</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Author</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Date</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Publish</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    <tr class="table-row-hover">
                                        <td class="px-6 py-4">
                                            <div>
                                                <p class="font-medium">5 Best Treks in Nepal for 2024</p>
                                                <p class="text-sm text-gray-500">Adventure • 5 min read</p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="avatar mr-3">AD</div>
                                                <span class="font-medium">Admin</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <p>Dec 20, 2024</p>
                                            <p class="text-sm text-gray-500">3:45 PM</p>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="badge badge-published">Published</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="toggle-switch active" onclick="togglePublish(event)"><span class="toggle-slider"></span></span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex space-x-2">
                                                <button class="bg-blue-50 text-blue-600 p-2 rounded-lg hover:bg-blue-100 transition">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="bg-green-50 text-green-600 p-2 rounded-lg hover:bg-green-100 transition">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </button>
                                                <button class="bg-red-50 text-red-600 p-2 rounded-lg hover:bg-red-100 transition">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="table-row-hover">
                                        <td class="px-6 py-4">
                                            <div>
                                                <p class="font-medium">Ultimate Trekking Gear Guide</p>
                                                <p class="text-sm text-gray-500">Guide • 8 min read</p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="avatar mr-3">AD</div>
                                                <span class="font-medium">Admin</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <p>Dec 18, 2024</p>
                                            <p class="text-sm text-gray-500">11:20 AM</p>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="badge badge-draft">Draft</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="toggle-switch" onclick="togglePublish(event)"><span class="toggle-slider"></span></span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex space-x-2">
                                                <button class="bg-blue-50 text-blue-600 p-2 rounded-lg hover:bg-blue-100 transition">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="bg-green-50 text-green-600 p-2 rounded-lg hover:bg-green-100 transition">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </button>
                                                <button class="bg-red-50 text-red-600 p-2 rounded-lg hover:bg-red-100 transition">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Users Section -->
                <div id="users" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow">
                        <div class="p-6 border-b">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800">Manage Users</h3>
                                    <p class="text-gray-500 text-sm mt-1">View and manage registered users</p>
                                </div>
                                <div class="flex space-x-3">
                                    <button class="px-4 py-2 border rounded-xl text-sm font-medium hover:bg-gray-50">Export Users</button>
                                    <button class="px-4 py-2 bg-blue-600 text-white rounded-xl text-sm font-medium hover:bg-blue-700">Add User</button>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Name</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Email</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Joined</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Bookings</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    <tr class="table-row-hover">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="avatar mr-3">JD</div>
                                                <div>
                                                    <p class="font-medium">John Doe</p>
                                                    <p class="text-sm text-gray-500">Premium Member</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-medium">john@example.com</td>
                                        <td class="px-6 py-4">
                                            <p>Nov 15, 2024</p>
                                            <p class="text-sm text-gray-500">35 days ago</p>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="font-semibold text-blue-600">3</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <span class="toggle-switch active" onclick="toggleUser(event)"><span class="toggle-slider"></span></span>
                                                <span class="text-sm text-green-600 ml-2">Active</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex space-x-2">
                                                <button class="bg-blue-50 text-blue-600 p-2 rounded-lg hover:bg-blue-100 transition">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="bg-red-50 text-red-600 p-2 rounded-lg hover:bg-red-100 transition">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="table-row-hover">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="avatar mr-3">JS</div>
                                                <div>
                                                    <p class="font-medium">Jane Smith</p>
                                                    <p class="text-sm text-gray-500">Standard Member</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-medium">jane@example.com</td>
                                        <td class="px-6 py-4">
                                            <p>Oct 20, 2024</p>
                                            <p class="text-sm text-gray-500">61 days ago</p>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="font-semibold text-blue-600">5</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <span class="toggle-switch active" onclick="toggleUser(event)"><span class="toggle-slider"></span></span>
                                                <span class="text-sm text-green-600 ml-2">Active</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex space-x-2">
                                                <button class="bg-blue-50 text-blue-600 p-2 rounded-lg hover:bg-blue-100 transition">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="bg-red-50 text-red-600 p-2 rounded-lg hover:bg-red-100 transition">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Settings Section -->
                <div id="settings" class="tab-content hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">
                            <h3 class="text-xl font-semibold mb-6">General Settings</h3>
                            <div class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium mb-2">Site Name</label>
                                        <input type="text" value="Trek Adventures" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-2">Contact Email</label>
                                        <input type="email" value="contact@trekadventures.com" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">Phone Number</label>
                                    <input type="tel" value="+977 123456789" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">Site Description</label>
                                    <textarea rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">Premium trekking adventures in the Himalayas</textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-xl font-medium hover:from-blue-700 hover:to-indigo-700 transition shadow">
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow p-6">
                            <h3 class="text-xl font-semibold mb-6">Feature Toggles</h3>
                            <div class="space-y-6">
                                <div class="flex justify-between items-center p-4 border border-gray-100 rounded-xl">
    <div>
        <span class="text-sm font-medium block">Enable Greeting Card</span>
        <span id="greetingStatusMessage" class="text-xs text-green-600 hidden mt-1">
            Greeting card enabled successfully
        </span>
    </div>

    <span
        class="toggle-switch {{ $siteSettings->is_greetingCard_enabled ? 'active' : '' }}"
        data-field="is_greetingCard_enabled"
        onclick="toggleFeature(this)"
    >
        <span class="toggle-slider"></span>
    </span>
</div>

                                <div class="flex justify-between items-center p-4 border border-gray-100 rounded-xl">
                                    <div>
                                        <span class="text-sm font-medium block">Enable Bookings</span>
                                    </div>
                                    <span class="toggle-switch active" onclick="toggleFeature(event)"><span class="toggle-slider"></span></span>
                                </div>
                                <div class="flex justify-between items-center p-4 border border-gray-100 rounded-xl">
                                    <div>
                                        <span class="text-sm font-medium block">Enable Reviews</span>
                                    </div>
                                    <span class="toggle-switch active" onclick="toggleFeature(event)"><span class="toggle-slider"></span></span>
                                </div>
                                <div class="flex justify-between items-center p-4 border border-gray-100 rounded-xl">
                                    <div>
                                        <span class="text-sm font-medium block">Enable Blog</span>
                                    </div>
                                    <span class="toggle-switch active" onclick="toggleFeature(event)"><span class="toggle-slider"></span></span>
                                </div>
                                <div class="flex justify-between items-center p-4 border border-gray-100 rounded-xl">
                                    <div>
                                        <span class="text-sm font-medium block">Maintenance Mode</span>
                                    </div>
                                    <span class="toggle-switch" onclick="toggleFeature(event)"><span class="toggle-slider"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Tour Modal -->
    <div id="tourModal" class="hidden modal-overlay fixed inset-0 flex items-center justify-center z-50 p-4">
        <div class="modal-content bg-white rounded-xl p-6 w-full max-w-2xl">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Add New Tour</h3>
                <button onclick="closeModal('tourModal')" class="text-gray-500 hover:text-gray-700 transition">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Tour Name</label>
                    <input type="text" placeholder="Enter tour name" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">Duration (days)</label>
                        <input type="number" placeholder="7" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Price ($)</label>
                        <input type="number" placeholder="1000" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Description</label>
                    <textarea placeholder="Tour description" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">Difficulty</label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option>Easy</option>
                            <option>Moderate</option>
                            <option>Challenging</option>
                            <option>Difficult</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Location</label>
                        <input type="text" placeholder="Country/Region" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                </div>
                <div class="flex space-x-4 pt-4">
                    <button onclick="closeModal('tourModal')" class="flex-1 px-4 py-3 border border-gray-300 rounded-xl font-medium hover:bg-gray-50 transition">Cancel</button>
                    <button class="flex-1 px-4 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-medium hover:from-blue-700 hover:to-indigo-700 transition shadow">Create Tour</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Modal -->
    <div id="blogModal" class="hidden modal-overlay fixed inset-0 flex items-center justify-center z-50 p-4">
        <div class="modal-content bg-white rounded-xl p-6 w-full max-w-2xl">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Create Blog Post</h3>
                <button onclick="closeModal('blogModal')" class="text-gray-500 hover:text-gray-700 transition">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Title</label>
                    <input type="text" placeholder="Blog post title" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Content</label>
                    <textarea placeholder="Write your blog content here..." rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">Category</label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option>Travel Tips</option>
                            <option>Adventure</option>
                            <option>Guide</option>
                            <option>Review</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Featured Image</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <p class="text-sm text-gray-600">Drop your image here or click to browse</p>
                            <input type="file" class="hidden">
                        </div>
                    </div>
                </div>
                <div class="flex space-x-4 pt-4">
                    <button onclick="closeModal('blogModal')" class="flex-1 px-4 py-3 border border-gray-300 rounded-xl font-medium hover:bg-gray-50 transition">Cancel</button>
                    <button class="flex-1 px-4 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-medium hover:from-blue-700 hover:to-indigo-700 transition shadow">Create Post</button>
                </div>
            </div>
        </div>
    </div>
<!-- Greeting Card Modal -->
<div id="greetingCardModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-xl shadow-lg p-6 w-96 relative">
        <h2 class="text-lg font-semibold mb-4">Add Greeting Card</h2>
        <form id="greetingCardForm" action="{{ route('admin.greeting-card.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Image</label>
                <input type="file" name="image" accept="image/*" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Text</label>
                <textarea name="text" class="w-full border rounded px-2 py-1" rows="3" required></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('greetingCardModal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
            </div>
        </form>
        <button onclick="closeModal('greetingCardModal')" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 font-bold">&times;</button>
    </div>
</div>
</body>
</html>