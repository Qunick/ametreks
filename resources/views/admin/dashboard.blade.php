@extends('admin.layouts')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Welcome back, Admin! Here\'s what\'s happening today.')

@section('content')
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
                <a href="{{ route('admin.bookings.index') }}" class="text-blue-600 text-sm font-medium hover:text-blue-800">View All</a>
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
@endsection