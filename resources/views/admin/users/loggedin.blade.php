{{-- resources/views/admin/users/index.blade.php --}}
@extends('admin.layouts')

@section('title', 'Manage Users')

@section('content')
<div x-data="usersManager()" class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">User Management</h1>
            <p class="text-sm text-gray-600 mt-1">Manage registered users and their accounts</p>
        </div>
        <div class="flex items-center gap-3">
            <button @click="exportUsers()" class="hidden sm:flex items-center gap-2 px-4 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Export
            </button>
            <button @click="openAddDrawer()" class="flex items-center gap-2 px-4 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors shadow-sm hover:shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add User
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
        <div class="bg-white rounded-xl p-4 shadow border border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-600">Total Users</p>
                    <p class="text-xl font-bold text-gray-900">{{ $stats['total'] ?? 1428 }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow border border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-green-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-600">Active Today</p>
                    <p class="text-xl font-bold text-green-600">{{ $stats['active_today'] ?? 86 }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow border border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-600">With Bookings</p>
                    <p class="text-xl font-bold text-blue-600">{{ $stats['with_bookings'] ?? 324 }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow border border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-600">Verified</p>
                    <p class="text-xl font-bold text-blue-600">{{ $stats['verified'] ?? 1250 }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow border border-gray-200 md:col-span-2 lg:col-span-1">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-yellow-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-600">Pending</p>
                    <p class="text-xl font-bold text-yellow-600">{{ $stats['pending'] ?? 178 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters & Search -->
    <div class="bg-white rounded-xl shadow border border-gray-200 p-4">
        <div class="flex flex-col lg:flex-row lg:items-center gap-4">
            <!-- Search -->
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" x-model="searchQuery" @input="debounceSearch()" placeholder="Search by name, email, phone..." class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
            </div>
            
            <!-- Status Filter -->
            <div class="flex flex-wrap gap-2">
                <template x-for="status in statuses" :key="status.value">
                    <button @click="activeStatus = status.value" :class="activeStatus === status.value ? 'text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'" :style="activeStatus === status.value ? 'background-color: ' + status.color : ''" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        <span x-text="status.label"></span>
                    </button>
                </template>
            </div>

            <!-- User Type Filter -->
            <div>
                <select x-model="selectedUserType" @change="filterByType()" class="px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent w-full lg:w-auto">
                    <option value="">All Types</option>
                    <option value="customer">Customer</option>
                    <option value="premium">Premium</option>
                    <option value="guide">Guide</option>
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <!-- Date Range -->
            <div class="flex items-center gap-2">
                <input type="date" x-model="dateFrom" @change="filterByDate()" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <span class="text-gray-600">to</span>
                <input type="date" x-model="dateTo" @change="filterByDate()" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">
        <!-- Desktop Table -->
        <div class="hidden lg:block overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left text-xs font-semibold text-gray-700 uppercase tracking-wider px-6 py-4">
                            <button @click="sortBy('name')" class="flex items-center gap-1 hover:text-gray-900">
                                User
                                <svg class="w-4 h-4" :class="sortField === 'name' ? 'text-blue-600' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                </svg>
                            </button>
                        </th>
                        <th class="text-left text-xs font-semibold text-gray-700 uppercase tracking-wider px-6 py-4">Contact</th>
                        <th class="text-left text-xs font-semibold text-gray-700 uppercase tracking-wider px-6 py-4">Type</th>
                        <th class="text-left text-xs font-semibold text-gray-700 uppercase tracking-wider px-6 py-4">Joined</th>
                        <th class="text-left text-xs font-semibold text-gray-700 uppercase tracking-wider px-6 py-4">Bookings</th>
                        <th class="text-left text-xs font-semibold text-gray-700 uppercase tracking-wider px-6 py-4">Status</th>
                        <th class="text-center text-xs font-semibold text-gray-700 uppercase tracking-wider px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <template x-for="user in filteredUsers" :key="user.id">
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="relative">
                                        <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm font-semibold" :style="'background-color: ' + user.avatar_color">
                                            <span x-text="user.name.charAt(0)"></span>
                                        </div>
                                        <div x-show="user.last_active === 'Online'" class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900" x-text="user.name"></p>
                                        <p class="text-xs text-gray-600 flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span x-text="user.last_active"></span>
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-900" x-text="user.email"></p>
                                    <p class="text-xs text-gray-600" x-text="user.phone"></p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium"
                                      :class="{
                                          'bg-green-100 text-green-800': user.type === 'guide',
                                          'bg-red-100 text-red-800': user.type === 'staff',
                                          'bg-blue-100 text-blue-800': user.type === 'admin',
                                          'bg-gray-100 text-gray-800': user.type === 'customer',
                                          'bg-purple-100 text-purple-800': user.type === 'premium'
                                      }">
                                    <span x-text="user.type_label"></span>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-900" x-text="formatDate(user.joined_date)"></p>
                                    <p class="text-xs text-gray-600" x-text="timeAgo(user.joined_date)"></p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900" x-text="user.total_bookings"></p>
                                        <p class="text-xs text-gray-600">bookings</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium"
                                          :class="{
                                              'bg-green-100 text-green-800': user.status === 'active',
                                              'bg-red-100 text-red-800': user.status === 'inactive',
                                              'bg-yellow-100 text-yellow-800': user.status === 'suspended'
                                          }">
                                        <span class="w-1.5 h-1.5 rounded-full"
                                              :class="{
                                                  'bg-green-500': user.status === 'active',
                                                  'bg-red-500': user.status === 'inactive',
                                                  'bg-yellow-500': user.status === 'suspended'
                                              }"></span>
                                        <span x-text="capitalize(user.status)"></span>
                                    </span>
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs"
                                          :class="{
                                              'bg-blue-100 text-blue-800': user.verified,
                                              'bg-yellow-100 text-yellow-800': !user.verified
                                          }">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                        <span x-text="user.verified ? 'Verified' : 'Unverified'"></span>
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button @click="viewUser(user)" class="p-2 rounded-lg hover:bg-gray-100 transition-colors text-gray-600 hover:text-blue-600" title="View Profile">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <button @click="editUser(user)" class="p-2 rounded-lg hover:bg-gray-100 transition-colors text-gray-600 hover:text-green-600" title="Edit User">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button @click="sendMessage(user)" class="p-2 rounded-lg hover:bg-blue-50 transition-colors text-gray-600 hover:text-blue-600" title="Send Message">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                    </button>
                                    <button @click="toggleUserStatus(user)" x-show="user.status !== 'suspended'" class="p-2 rounded-lg hover:bg-yellow-50 transition-colors text-gray-600 hover:text-yellow-600" title="Suspend User">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                        </svg>
                                    </button>
                                    <button @click="toggleUserStatus(user)" x-show="user.status === 'suspended'" class="p-2 rounded-lg hover:bg-green-50 transition-colors text-gray-600 hover:text-green-600" title="Activate User">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </button>
                                    <button @click="confirmDelete(user)" class="p-2 rounded-lg hover:bg-red-50 transition-colors text-gray-600 hover:text-red-600" title="Delete User">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                    
                    <tr x-show="filteredUsers.length === 0">
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <p class="text-lg font-semibold text-gray-500">No users found</p>
                                <p class="text-sm text-gray-400 mt-1">Try adjusting your filters or add a new user</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Mobile Cards -->
        <div class="lg:hidden divide-y divide-gray-200">
            <template x-for="user in filteredUsers" :key="user.id">
                <div class="p-4">
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <div class="flex items-center gap-3">
                            <div class="relative">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-semibold" :style="'background-color: ' + user.avatar_color">
                                    <span x-text="user.name.charAt(0)"></span>
                                </div>
                                <div x-show="user.last_active === 'Online'" class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900" x-text="user.name"></p>
                                <p class="text-xs text-gray-600" x-text="user.email"></p>
                            </div>
                        </div>
                        <div class="flex flex-col items-end gap-1">
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-medium"
                                  :class="{
                                      'bg-green-100 text-green-800': user.status === 'active',
                                      'bg-red-100 text-red-800': user.status === 'inactive',
                                      'bg-yellow-100 text-yellow-800': user.status === 'suspended'
                                  }">
                                <span x-text="capitalize(user.status)"></span>
                            </span>
                            <span class="text-xs text-gray-600" x-text="user.type_label"></span>
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <div class="grid grid-cols-2 gap-2 text-sm text-gray-600">
                            <div>
                                <p class="text-xs text-gray-500">Joined</p>
                                <p x-text="formatDate(user.joined_date)"></p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Bookings</p>
                                <p x-text="user.total_bookings"></p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between pt-2">
                            <span class="text-xs flex items-center gap-1 text-gray-600">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span x-text="user.last_active"></span>
                            </span>
                            <span class="text-xs px-2 py-1 rounded"
                                  :class="{
                                      'bg-blue-100 text-blue-800': user.verified,
                                      'bg-yellow-100 text-yellow-800': !user.verified
                                  }">
                                <span x-text="user.verified ? 'Verified' : 'Unverified'"></span>
                            </span>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-2 pt-3 mt-3 border-t border-gray-200">
                        <button @click="viewUser(user)" class="flex-1 px-3 py-2 text-sm font-medium text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                            View
                        </button>
                        <button @click="editUser(user)" class="flex-1 px-3 py-2 text-sm font-medium text-green-600 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                            Edit
                        </button>
                        <button @click="confirmDelete(user)" class="flex-1 px-3 py-2 text-sm font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                            Delete
                        </button>
                    </div>
                </div>
            </template>
            
            <div x-show="filteredUsers.length === 0" class="p-6 text-center">
                <div class="flex flex-col items-center justify-center">
                    <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <p class="text-lg font-semibold text-gray-500">No users found</p>
                    <p class="text-sm text-gray-400 mt-1">Try adjusting your filters</p>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div x-show="filteredUsers.length > 0" class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-sm text-gray-600">
                Showing <span class="font-semibold text-gray-900" x-text="Math.min((currentPage - 1) * pageSize + 1, totalItems)"></span> to 
                <span class="font-semibold text-gray-900" x-text="Math.min(currentPage * pageSize, totalItems)"></span> of 
                <span class="font-semibold text-gray-900" x-text="totalItems"></span> users
            </p>
            <div class="flex items-center gap-2">
                <button @click="prevPage()" :disabled="currentPage === 1" :class="currentPage === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-200'" class="px-3 py-2 rounded-lg border border-gray-300 text-sm font-medium text-gray-700 transition-colors">
                    Previous
                </button>
                <template x-for="page in visiblePages" :key="page">
                    <button @click="goToPage(page)" :class="currentPage === page ? 'bg-blue-600 text-white' : 'border border-gray-300 text-gray-700 hover:bg-gray-50'" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors min-w-[40px]">
                        <span x-text="page"></span>
                    </button>
                </template>
                <button @click="nextPage()" :disabled="currentPage === totalPages" :class="currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-200'" class="px-3 py-2 rounded-lg border border-gray-300 text-sm font-medium text-gray-700 transition-colors">
                    Next
                </button>
            </div>
        </div>
    </div>

    <!-- Include Partial Components -->
    @include('admin.users.partials.form-drawer')
    @include('admin.users.partials.delete-modal')
</div>

<script>
function usersManager() {
    return {
        // Data
        searchQuery: '',
        activeStatus: 'all',
        selectedUserType: '',
        dateFrom: '',
        dateTo: '',
        sortField: 'name',
        sortDirection: 'desc',
        currentPage: 1,
        pageSize: 10,
        totalItems: 0,
        totalPages: 1,
        selectedUser: null,
        editMode: false,
        showFormDrawer: false,
        showDeleteModal: false,
        searchTimeout: null,
        
        // Sample data
        users: [
            {
                id: 1,
                name: 'John Smith',
                email: 'john.smith@email.com',
                phone: '+1 234 567 890',
                avatar_color: '#4D8BB2',
                type: 'customer',
                type_label: 'Customer',
                joined_date: '2023-01-15',
                last_active: '2 hours ago',
                total_bookings: 3,
                status: 'active',
                verified: true
            },
            {
                id: 2,
                name: 'Sarah Johnson',
                email: 'sarah.j@email.com',
                phone: '+1 987 654 321',
                avatar_color: '#005991',
                type: 'premium',
                type_label: 'Premium Member',
                joined_date: '2022-11-22',
                last_active: '1 day ago',
                total_bookings: 7,
                status: 'active',
                verified: true
            },
            {
                id: 3,
                name: 'Mike Williams',
                email: 'mike.w@email.com',
                phone: '+44 7890 123456',
                avatar_color: '#99C723',
                type: 'guide',
                type_label: 'Lead Guide',
                joined_date: '2022-03-10',
                last_active: '5 minutes ago',
                total_bookings: 42,
                status: 'active',
                verified: true
            },
            {
                id: 4,
                name: 'Emma Davis',
                email: 'emma.d@email.com',
                phone: '+61 412 345 678',
                avatar_color: '#C9302C',
                type: 'staff',
                type_label: 'Operations',
                joined_date: '2023-02-28',
                last_active: 'Online',
                total_bookings: 0,
                status: 'active',
                verified: true
            },
            {
                id: 5,
                name: 'Robert Chen',
                email: 'robert.c@email.com',
                phone: '+86 138 0013 8000',
                avatar_color: '#4D8BB2',
                type: 'customer',
                type_label: 'Customer',
                joined_date: '2023-12-05',
                last_active: '1 week ago',
                total_bookings: 0,
                status: 'inactive',
                verified: false
            },
            {
                id: 6,
                name: 'Lisa Wang',
                email: 'lisa.w@email.com',
                phone: '+65 9123 4567',
                avatar_color: '#005991',
                type: 'customer',
                type_label: 'VIP Member',
                joined_date: '2022-08-18',
                last_active: '3 hours ago',
                total_bookings: 12,
                status: 'active',
                verified: true
            }
        ],
        
        statuses: [
            { value: 'all', label: 'All', color: '#4B5563' },
            { value: 'active', label: 'Active', color: '#10B981' },
            { value: 'inactive', label: 'Inactive', color: '#F59E0B' },
            { value: 'suspended', label: 'Suspended', color: '#EF4444' }
        ],
        
        userTypes: [
            { value: 'customer', label: 'Customer', description: 'Regular user account' },
            { value: 'premium', label: 'Premium Member', description: 'VIP customer with benefits' },
            { value: 'guide', label: 'Guide', description: 'Tour guide account' },
            { value: 'staff', label: 'Staff', description: 'Company staff member' },
            { value: 'admin', label: 'Admin', description: 'Administrator with full access' }
        ],
        
        form: {
            first_name: '',
            last_name: '',
            email: '',
            phone: '',
            profile_picture: '',
            avatar_color: '#4D8BB2',
            user_type: 'customer',
            password: '',
            password_confirmation: '',
            email_verified: true,
            active: true,
            country: '',
            notes: ''
        },
        
        // Computed properties
        get filteredUsers() {
            let filtered = this.users;
            
            // Filter by search query
            if (this.searchQuery) {
                const query = this.searchQuery.toLowerCase();
                filtered = filtered.filter(user => 
                    user.name.toLowerCase().includes(query) ||
                    user.email.toLowerCase().includes(query) ||
                    user.phone?.toLowerCase().includes(query)
                );
            }
            
            // Filter by status
            if (this.activeStatus !== 'all') {
                filtered = filtered.filter(user => user.status === this.activeStatus);
            }
            
            // Filter by user type
            if (this.selectedUserType) {
                filtered = filtered.filter(user => user.type === this.selectedUserType);
            }
            
            // Filter by date range
            if (this.dateFrom) {
                filtered = filtered.filter(user => user.joined_date >= this.dateFrom);
            }
            if (this.dateTo) {
                filtered = filtered.filter(user => user.joined_date <= this.dateTo);
            }
            
            // Sort
            filtered.sort((a, b) => {
                const aVal = a[this.sortField];
                const bVal = b[this.sortField];
                
                if (typeof aVal === 'string') {
                    return this.sortDirection === 'asc' 
                        ? aVal.localeCompare(bVal)
                        : bVal.localeCompare(aVal);
                }
                
                return this.sortDirection === 'asc'
                    ? aVal - bVal
                    : bVal - aVal;
            });
            
            // Pagination
            this.totalItems = filtered.length;
            this.totalPages = Math.ceil(this.totalItems / this.pageSize);
            
            const start = (this.currentPage - 1) * this.pageSize;
            const end = start + this.pageSize;
            
            return filtered.slice(start, end);
        },
        
        get visiblePages() {
            const pages = [];
            const maxVisible = 5;
            let start = Math.max(1, this.currentPage - Math.floor(maxVisible / 2));
            let end = Math.min(this.totalPages, start + maxVisible - 1);
            
            if (end - start + 1 < maxVisible) {
                start = Math.max(1, end - maxVisible + 1);
            }
            
            for (let i = start; i <= end; i++) {
                pages.push(i);
            }
            
            return pages;
        },
        
        // Methods
        sortBy(field) {
            if (this.sortField === field) {
                this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
            } else {
                this.sortField = field;
                this.sortDirection = 'desc';
            }
        },
        
        debounceSearch() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                this.currentPage = 1;
            }, 300);
        },
        
        filterByType() {
            this.currentPage = 1;
        },
        
        filterByDate() {
            this.currentPage = 1;
        },
        
        prevPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
            }
        },
        
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
            }
        },
        
        goToPage(page) {
            this.currentPage = page;
        },
        
        formatDate(dateString) {
            if (!dateString) return 'N/A';
            return new Date(dateString).toLocaleDateString('en-US', {
                month: 'short',
                day: 'numeric',
                year: 'numeric'
            });
        },
        
        timeAgo(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            const now = new Date();
            const diffInDays = Math.floor((now - date) / (1000 * 60 * 60 * 24));
            
            if (diffInDays === 0) return 'Today';
            if (diffInDays === 1) return 'Yesterday';
            if (diffInDays < 30) return `${diffInDays} days ago`;
            if (diffInDays < 365) return `${Math.floor(diffInDays / 30)} months ago`;
            return `${Math.floor(diffInDays / 365)} years ago`;
        },
        
        capitalize(str) {
            if (!str) return '';
            return str.charAt(0).toUpperCase() + str.slice(1);
        },
        
        viewUser(user) {
            // In real app, redirect to user profile
            console.log('View user:', user.id);
            this.showNotification('Redirecting to user profile...', 'info');
        },
        
        editUser(user) {
            // Split name for form
            const nameParts = user.name.split(' ');
            this.selectedUser = user;
            this.form = {
                first_name: nameParts[0] || '',
                last_name: nameParts.slice(1).join(' ') || '',
                email: user.email,
                phone: user.phone || '',
                profile_picture: '',
                avatar_color: user.avatar_color,
                user_type: user.type,
                password: '',
                password_confirmation: '',
                email_verified: user.verified,
                active: user.status === 'active',
                country: '',
                notes: ''
            };
            this.editMode = true;
            this.showFormDrawer = true;
        },
        
        openAddDrawer() {
            this.selectedUser = null;
            this.resetForm();
            this.editMode = false;
            this.showFormDrawer = true;
        },
        
        sendMessage(user) {
            console.log('Send message to:', user.email);
            this.showNotification(`Opening message to ${user.name}...`, 'info');
        },
        
        toggleUserStatus(user) {
            const newStatus = user.status === 'suspended' ? 'active' : 'suspended';
            const index = this.users.findIndex(u => u.id === user.id);
            if (index !== -1) {
                this.users[index].status = newStatus;
                this.showNotification(`User ${newStatus === 'suspended' ? 'suspended' : 'activated'} successfully!`, 'success');
            }
        },
        
        confirmDelete(user) {
            this.selectedUser = user;
            this.showDeleteModal = true;
        },
        
        deleteUser() {
            if (this.selectedUser) {
                this.users = this.users.filter(u => u.id !== this.selectedUser.id);
                this.showNotification('User deleted successfully!', 'success');
            }
            this.showDeleteModal = false;
        },
        
        submitUserForm() {
            if (this.editMode && this.selectedUser) {
                // Update existing user
                const index = this.users.findIndex(u => u.id === this.selectedUser.id);
                if (index !== -1) {
                    const name = `${this.form.first_name || ''} ${this.form.last_name || ''}`.trim();
                    this.users[index] = {
                        ...this.users[index],
                        name: name,
                        email: this.form.email,
                        phone: this.form.phone,
                        type: this.form.user_type,
                        type_label: this.userTypes.find(t => t.value === this.form.user_type)?.label || 'Customer',
                        verified: this.form.email_verified,
                        status: this.form.active ? 'active' : 'inactive',
                        avatar_color: this.form.avatar_color
                    };
                    this.showNotification('User updated successfully!', 'success');
                }
            } else {
                // Create new user
                const newId = Math.max(...this.users.map(u => u.id), 0) + 1;
                const name = `${this.form.first_name || ''} ${this.form.last_name || ''}`.trim();
                const newUser = {
                    id: newId,
                    name: name,
                    email: this.form.email,
                    phone: this.form.phone,
                    avatar_color: this.form.avatar_color,
                    type: this.form.user_type,
                    type_label: this.userTypes.find(t => t.value === this.form.user_type)?.label || 'Customer',
                    joined_date: new Date().toISOString().split('T')[0],
                    last_active: 'Just now',
                    total_bookings: 0,
                    status: this.form.active ? 'active' : 'inactive',
                    verified: this.form.email_verified
                };
                
                this.users.unshift(newUser);
                this.showNotification('User created successfully!', 'success');
            }
            
            this.showFormDrawer = false;
            this.selectedUser = null;
            this.resetForm();
        },
        
        exportUsers() {
            const data = JSON.stringify(this.filteredUsers, null, 2);
            const blob = new Blob([data], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'users-export.json';
            a.click();
            URL.revokeObjectURL(url);
            this.showNotification('Users exported successfully!', 'success');
        },
        
        handleProfileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.form.profile_picture = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        
        resetForm() {
            this.form = {
                first_name: '',
                last_name: '',
                email: '',
                phone: '',
                profile_picture: '',
                avatar_color: '#4D8BB2',
                user_type: 'customer',
                password: '',
                password_confirmation: '',
                email_verified: true,
                active: true,
                country: '',
                notes: ''
            };
        },
        
        showNotification(message, type = 'info') {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 px-4 py-3 rounded-lg shadow-lg text-white z-50 ${
                type === 'success' ? 'bg-green-600' :
                type === 'error' ? 'bg-red-600' :
                'bg-blue-600'
            }`;
            notification.innerHTML = `
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    }
}
</script>
@endsection