@extends('admin.layouts')
@section('content')
<div x-data="companyAdmin()" class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold" style="color: #052734;">Company Administration</h1>
            <p class="text-sm mt-1" style="color: #6D6E70;">Manage employees, roles, and departments</p>
        </div>
        <div class="flex items-center gap-3">
            <button @click="exportEmployees()" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 border border-gray-300 rounded-lg font-medium transition-all hover:bg-gray-50" style="color: #052734;">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                </svg>
                Export
            </button>
            <button @click="openAddEmployeeDrawer()" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-white font-medium rounded-lg transition-all hover:opacity-90 shadow-lg hover:shadow-xl" style="background-color: #005991;">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add Employee
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(0, 89, 145, 0.1);">
                    <svg class="w-5 h-5" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Total Employees</p>
                    <p class="text-xl font-bold" style="color: #052734;">{{ $stats['total'] ?? 42 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(153, 199, 35, 0.1);">
                    <svg class="w-5 h-5" style="color: #99C723;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Active Today</p>
                    <p class="text-xl font-bold" style="color: #99C723;">{{ $stats['active_today'] ?? 28 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(77, 139, 178, 0.1);">
                    <svg class="w-5 h-5" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Managers</p>
                    <p class="text-xl font-bold" style="color: #4D8BB2;">{{ $stats['managers'] ?? 8 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(201, 48, 44, 0.1);">
                    <svg class="w-5 h-5" style="color: #C9302C;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">On Leave</p>
                    <p class="text-xl font-bold" style="color: #C9302C;">{{ $stats['on_leave'] ?? 3 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 col-span-2 lg:col-span-1">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(159, 122, 234, 0.1);">
                    <svg class="w-5 h-5" style="color: #9F7AEA;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Admins</p>
                    <p class="text-xl font-bold" style="color: #9F7AEA;">{{ $stats['admins'] ?? 5 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters & Search -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex flex-col lg:flex-row lg:items-center gap-4">
            <!-- Search -->
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5" style="color: #6D6E70;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" x-model="searchQuery" placeholder="Search by name, email, department..." class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 text-sm" style="--tw-ring-color: #005991;">
            </div>
            
            <!-- Department Filter -->
            <div>
                <select x-model="selectedDepartment" class="px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 w-full lg:w-auto" style="--tw-ring-color: #005991; color: #052734;">
                    <option value="">All Departments</option>
                    <option value="operations">Operations</option>
                    <option value="sales">Sales & Marketing</option>
                    <option value="guides">Guides & Logistics</option>
                    <option value="finance">Finance</option>
                    <option value="admin">Administration</option>
                    <option value="it">IT & Support</option>
                </select>
            </div>

            <!-- Role Filter -->
            <div>
                <select x-model="selectedRole" class="px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 w-full lg:w-auto" style="--tw-ring-color: #005991; color: #052734;">
                    <option value="">All Roles</option>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="staff">Staff</option>
                </select>
            </div>

            <!-- Status Filter -->
            <div class="flex flex-wrap gap-2">
                <template x-for="status in statuses" :key="status.value">
                    <button @click="activeStatus = status.value" :class="activeStatus === status.value ? 'text-white' : 'bg-gray-100 hover:bg-gray-200'" :style="activeStatus === status.value ? 'background-color: ' + status.color : 'color: #052734'" class="px-4 py-2 rounded-lg text-sm font-medium transition-all">
                        <span x-text="status.label"></span>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Employees Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead style="background-color: #052734;">
                    <tr>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Employee</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Department</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Role</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Joined</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Contact</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Status</th>
                        <th class="text-center text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php
                        $sampleEmployees = $employees ?? collect([
                            (object)[
                                'id' => 1,
                                'name' => 'Sarah Johnson',
                                'email' => 'sarah.j@ametreks.com',
                                'phone' => '+977 9841 234567',
                                'avatar_color' => '#4D8BB2',
                                'department' => 'operations',
                                'department_label' => 'Operations',
                                'role' => 'manager',
                                'role_label' => 'Operations Manager',
                                'joined_date' => 'Jan 15, 2022',
                                'employment_id' => 'AME-EMP-001',
                                'status' => 'active',
                                'last_active' => 'Online'
                            ],
                            (object)[
                                'id' => 2,
                                'name' => 'Mike Williams',
                                'email' => 'mike.w@ametreks.com',
                                'phone' => '+977 9841 765432',
                                'avatar_color' => '#005991',
                                'department' => 'guides',
                                'department_label' => 'Guides & Logistics',
                                'role' => 'manager',
                                'role_label' => 'Head Guide',
                                'joined_date' => 'Mar 10, 2021',
                                'employment_id' => 'AME-EMP-002',
                                'status' => 'active',
                                'last_active' => '2 hours ago'
                            ],
                            (object)[
                                'id' => 3,
                                'name' => 'Emma Davis',
                                'email' => 'emma.d@ametreks.com',
                                'phone' => '+977 9841 987654',
                                'avatar_color' => '#99C723',
                                'department' => 'sales',
                                'department_label' => 'Sales & Marketing',
                                'role' => 'supervisor',
                                'role_label' => 'Sales Supervisor',
                                'joined_date' => 'Jun 22, 2022',
                                'employment_id' => 'AME-EMP-003',
                                'status' => 'active',
                                'last_active' => 'Yesterday'
                            ],
                            (object)[
                                'id' => 4,
                                'name' => 'Robert Chen',
                                'email' => 'robert.c@ametreks.com',
                                'phone' => '+977 9841 456789',
                                'avatar_color' => '#C9302C',
                                'department' => 'finance',
                                'department_label' => 'Finance',
                                'role' => 'staff',
                                'role_label' => 'Accountant',
                                'joined_date' => 'Nov 05, 2022',
                                'employment_id' => 'AME-EMP-004',
                                'status' => 'on_leave',
                                'last_active' => '1 week ago'
                            ],
                            (object)[
                                'id' => 5,
                                'name' => 'Lisa Wang',
                                'email' => 'lisa.w@ametreks.com',
                                'phone' => '+977 9841 321654',
                                'avatar_color' => '#9F7AEA',
                                'department' => 'admin',
                                'department_label' => 'Administration',
                                'role' => 'admin',
                                'role_label' => 'System Admin',
                                'joined_date' => 'Feb 18, 2021',
                                'employment_id' => 'AME-EMP-005',
                                'status' => 'active',
                                'last_active' => 'Online'
                            ],
                            (object)[
                                'id' => 6,
                                'name' => 'David Wilson',
                                'email' => 'david.w@ametreks.com',
                                'phone' => '+977 9841 654987',
                                'avatar_color' => '#4D8BB2',
                                'department' => 'it',
                                'department_label' => 'IT & Support',
                                'role' => 'staff',
                                'role_label' => 'IT Support',
                                'joined_date' => 'Aug 30, 2023',
                                'employment_id' => 'AME-EMP-006',
                                'status' => 'inactive',
                                'last_active' => '1 month ago'
                            ]
                        ]);
                    @endphp

                    @forelse($sampleEmployees as $employee)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="relative">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-semibold" style="background-color: {{ $employee->avatar_color }};">
                                        {{ substr($employee->name, 0, 1) }}
                                    </div>
                                    @if($employee->last_active === 'Online')
                                    <div class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-500 rounded-full border border-white"></div>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-sm font-medium" style="color: #052734;">{{ $employee->name }}</p>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-xs px-2 py-0.5 rounded" style="background-color: rgba(0, 89, 145, 0.1); color: #005991;">
                                            {{ $employee->employment_id }}
                                        </span>
                                        <span class="text-xs" style="color: #6D6E70;">
                                            <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            {{ $employee->last_active }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium"
                                style="@if($employee->department === 'operations') background-color: rgba(77, 139, 178, 0.1); color: #4D8BB2;
                                       @elseif($employee->department === 'guides') background-color: rgba(153, 199, 35, 0.1); color: #99C723;
                                       @elseif($employee->department === 'sales') background-color: rgba(245, 158, 11, 0.1); color: #F59E0B;
                                       @elseif($employee->department === 'finance') background-color: rgba(159, 122, 234, 0.1); color: #9F7AEA;
                                       @elseif($employee->department === 'it') background-color: rgba(66, 153, 225, 0.1); color: #4299E1;
                                       @else background-color: rgba(160, 174, 192, 0.1); color: #A0AEC0;
                                       @endif">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                {{ $employee->department_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium"
                                style="@if($employee->role === 'admin') background-color: rgba(159, 122, 234, 0.1); color: #9F7AEA;
                                       @elseif($employee->role === 'manager') background-color: rgba(245, 101, 101, 0.1); color: #F56565;
                                       @elseif($employee->role === 'supervisor') background-color: rgba(237, 137, 54, 0.1); color: #ED8936;
                                       @else background-color: rgba(113, 128, 150, 0.1); color: #718096;
                                       @endif">
                                @if($employee->role === 'admin')
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                @elseif($employee->role === 'manager')
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                @else
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                @endif
                                {{ $employee->role_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-1">
                                <p class="text-sm" style="color: #052734;">{{ $employee->joined_date }}</p>
                                <p class="text-xs" style="color: #6D6E70;">{{ \Carbon\Carbon::parse($employee->joined_date)->diffForHumans() }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-1">
                                <p class="text-sm font-medium" style="color: #052734;">{{ $employee->email }}</p>
                                <p class="text-xs" style="color: #6D6E70;">{{ $employee->phone }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium"
                                    style="@if($employee->status === 'active') background-color: rgba(153, 199, 35, 0.1); color: #99C723;
                                           @elseif($employee->status === 'on_leave') background-color: rgba(245, 158, 11, 0.1); color: #F59E0B;
                                           @else background-color: rgba(160, 174, 192, 0.1); color: #A0AEC0;
                                           @endif">
                                    <span class="w-1.5 h-1.5 rounded-full"
                                        style="@if($employee->status === 'active') background-color: #99C723;
                                               @elseif($employee->status === 'on_leave') background-color: #F59E0B;
                                               @else background-color: #A0AEC0;
                                               @endif"></span>
                                    {{ ucfirst(str_replace('_', ' ', $employee->status)) }}
                                </span>
                                @if($employee->role === 'admin')
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs" style="background-color: rgba(159, 122, 234, 0.1); color: #9F7AEA;">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    Full Access
                                </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-1">
                                <button @click="viewEmployee({{ $employee->id }})" class="p-2 rounded-lg hover:bg-gray-100 transition-colors" title="View Profile">
                                    <svg class="w-4 h-4" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button @click="editEmployee({{ $employee->id }})" class="p-2 rounded-lg hover:bg-gray-100 transition-colors" title="Edit Employee">
                                    <svg class="w-4 h-4" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <button @click="managePermissions({{ $employee->id }})" class="p-2 rounded-lg hover:bg-purple-50 transition-colors" title="Manage Permissions">
                                    <svg class="w-4 h-4" style="color: #9F7AEA;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </button>
                                @if($employee->status === 'active')
                                <button @click="assignLeave({{ $employee->id }})" class="p-2 rounded-lg hover:bg-yellow-50 transition-colors" title="Assign Leave">
                                    <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </button>
                                @elseif($employee->status === 'on_leave')
                                <button @click="endLeave({{ $employee->id }})" class="p-2 rounded-lg hover:bg-green-50 transition-colors" title="End Leave">
                                    <svg class="w-4 h-4" style="color: #99C723;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </button>
                                @endif
                                <button @click="confirmDelete({{ $employee->id }})" class="p-2 rounded-lg hover:bg-red-50 transition-colors" title="Delete Employee">
                                    <svg class="w-4 h-4" style="color: #C9302C;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <p class="text-lg font-medium" style="color: #052734;">No employees found</p>
                                <p class="text-sm mt-1" style="color: #6D6E70;">Try adjusting your search or filters</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add/Edit Employee Drawer -->
    <div x-show="showDrawer" class="fixed inset-y-0 right-0 w-full sm:w-96 bg-white shadow-xl z-50 transform transition-transform duration-300 ease-in-out" :class="showDrawer ? 'translate-x-0' : 'translate-x-full'">
        <div class="h-full flex flex-col">
            <!-- Drawer Header -->
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold" style="color: #052734;" x-text="drawerTitle"></h3>
                    <button @click="closeDrawer()" class="p-1 hover:bg-gray-100 rounded-lg">
                        <svg class="w-5 h-5" style="color: #6D6E70;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Drawer Content -->
            <div class="flex-1 overflow-y-auto">
                <div class="p-6 space-y-4">
                    <form id="employeeForm">
                        <!-- Avatar Upload -->
                        <div class="flex flex-col items-center">
                            <div class="relative">
                                <div class="w-20 h-20 rounded-full flex items-center justify-center text-white text-2xl font-semibold" style="background-color: #005991;" x-show="!avatarPreview">
                                    <span x-text="employeeForm.name ? employeeForm.name.charAt(0).toUpperCase() : 'U'"></span>
                                </div>
                                <img :src="avatarPreview" alt="Avatar" class="w-20 h-20 rounded-full object-cover" x-show="avatarPreview">
                                <label for="avatar-upload" class="absolute bottom-0 right-0 bg-white rounded-full p-1.5 shadow-md border border-gray-200 cursor-pointer">
                                    <svg class="w-4 h-4" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <input type="file" id="avatar-upload" accept="image/*" class="hidden" @change="handleAvatarUpload">
                                </label>
                            </div>
                        </div>

                        <!-- Basic Information -->
                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm font-medium mb-1" style="color: #052734;">Full Name</label>
                                <input type="text" x-model="employeeForm.name" placeholder="John Doe" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
                            </div>
                            
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-sm font-medium mb-1" style="color: #052734;">Email</label>
                                    <input type="email" x-model="employeeForm.email" placeholder="john@ametreks.com" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1" style="color: #052734;">Phone</label>
                                    <input type="tel" x-model="employeeForm.phone" placeholder="+977 9841 000000" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
                                </div>
                            </div>
                        </div>

                        <!-- Job Details -->
                        <div class="space-y-3">
                            <h4 class="text-sm font-semibold" style="color: #052734;">Job Details</h4>
                            
                            <div>
                                <label class="block text-sm font-medium mb-1" style="color: #052734;">Department</label>
                                <select x-model="employeeForm.department" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
                                    <option value="">Select Department</option>
                                    <option value="operations">Operations</option>
                                    <option value="sales">Sales & Marketing</option>
                                    <option value="guides">Guides & Logistics</option>
                                    <option value="finance">Finance</option>
                                    <option value="admin">Administration</option>
                                    <option value="it">IT & Support</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium mb-1" style="color: #052734;">Role</label>
                                <select x-model="employeeForm.role" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="manager">Manager</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium mb-1" style="color: #052734;">Employment ID</label>
                                <input type="text" x-model="employeeForm.employment_id" placeholder="AME-EMP-001" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium mb-1" style="color: #052734;">Join Date</label>
                                <input type="date" x-model="employeeForm.joined_date" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
                            </div>
                        </div>

                        <!-- Permissions -->
                        <div class="space-y-3" x-show="employeeForm.role === 'admin'">
                            <h4 class="text-sm font-semibold" style="color: #052734;">Admin Permissions</h4>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" x-model="employeeForm.permissions.view_all" class="rounded border-gray-300" style="color: #005991;">
                                    <span class="ml-2 text-sm" style="color: #052734;">View All Data</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" x-model="employeeForm.permissions.edit_all" class="rounded border-gray-300" style="color: #005991;">
                                    <span class="ml-2 text-sm" style="color: #052734;">Edit All Records</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" x-model="employeeForm.permissions.manage_users" class="rounded border-gray-300" style="color: #005991;">
                                    <span class="ml-2 text-sm" style="color: #052734;">Manage Users</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" x-model="employeeForm.permissions.system_settings" class="rounded border-gray-300" style="color: #005991;">
                                    <span class="ml-2 text-sm" style="color: #052734;">System Settings</span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Drawer Footer -->
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <button type="button" @click="closeDrawer()" class="px-4 py-2 text-sm font-medium border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors" style="color: #052734;">
                        Cancel
                    </button>
                    <button type="button" @click="saveEmployee()" class="px-4 py-2 text-sm font-medium text-white rounded-lg hover:opacity-90 transition-all" style="background-color: #005991;">
                        <span x-text="isEditing ? 'Update Employee' : 'Add Employee'"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Leave Modal -->
    <div x-show="showLeaveModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold" style="color: #052734;">Assign Leave</h3>
            </div>
            
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1" style="color: #052734;">Leave Type</label>
                    <select x-model="leaveForm.type" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
                        <option value="">Select Leave Type</option>
                        <option value="annual">Annual Leave</option>
                        <option value="sick">Sick Leave</option>
                        <option value="personal">Personal Leave</option>
                        <option value="maternity">Maternity Leave</option>
                        <option value="paternity">Paternity Leave</option>
                    </select>
                </div>
                
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: #052734;">Start Date</label>
                        <input type="date" x-model="leaveForm.start_date" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: #052734;">End Date</label>
                        <input type="date" x-model="leaveForm.end_date" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2" style="--tw-ring-color: #005991;">
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium mb-1" style="color: #052734;">Reason (Optional)</label>
                    <textarea x-model="leaveForm.reason" rows="3" placeholder="Reason for leave..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 resize-none" style="--tw-ring-color: #005991;"></textarea>
                </div>
            </div>
            
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <button @click="showLeaveModal = false" class="px-4 py-2 text-sm font-medium border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors" style="color: #052734;">
                        Cancel
                    </button>
                    <button @click="submitLeave()" class="px-4 py-2 text-sm font-medium text-white rounded-lg hover:opacity-90 transition-all" style="background-color: #005991;">
                        Assign Leave
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-show="showDeleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold" style="color: #052734;">Delete Employee</h3>
            </div>
            
            <div class="p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-white" style="background-color: #C9302C;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.998-.833-2.732 0L4.346 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium" style="color: #052734;">Confirm Deletion</p>
                        <p class="text-sm mt-1" style="color: #6D6E70;">This action cannot be undone.</p>
                    </div>
                </div>
                
                <p class="text-sm" style="color: #052734;">Are you sure you want to delete <span class="font-semibold" x-text="employeeToDelete?.name"></span>? This will permanently remove all associated data.</p>
            </div>
            
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-end gap-3">
                    <button @click="showDeleteModal = false" class="px-4 py-2 text-sm font-medium border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors" style="color: #052734;">
                        Cancel
                    </button>
                    <button @click="deleteEmployee()" class="px-4 py-2 text-sm font-medium text-white rounded-lg hover:opacity-90 transition-all" style="background-color: #C9302C;">
                        Delete Employee
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Alpine.js Component -->
<script>
function companyAdmin() {
    return {
        searchQuery: '',
        selectedDepartment: '',
        selectedRole: '',
        activeStatus: 'all',
        
        showDrawer: false,
        showLeaveModal: false,
        showDeleteModal: false,
        isEditing: false,
        
        employeeForm: {
            id: null,
            name: '',
            email: '',
            phone: '',
            department: '',
            role: '',
            employment_id: '',
            joined_date: new Date().toISOString().split('T')[0],
            permissions: {
                view_all: false,
                edit_all: false,
                manage_users: false,
                system_settings: false
            }
        },
        
        leaveForm: {
            employee_id: null,
            type: '',
            start_date: '',
            end_date: '',
            reason: ''
        },
        
        employeeToDelete: null,
        avatarPreview: null,
        
        statuses: [
            { label: 'All', value: 'all', color: '#005991' },
            { label: 'Active', value: 'active', color: '#99C723' },
            { label: 'On Leave', value: 'on_leave', color: '#F59E0B' },
            { label: 'Inactive', value: 'inactive', color: '#6D6E70' }
        ],
        
        get drawerTitle() {
            return this.isEditing ? 'Edit Employee' : 'Add New Employee';
        },
        
        openAddEmployeeDrawer() {
            this.isEditing = false;
            this.resetEmployeeForm();
            this.showDrawer = true;
        },
        
        viewEmployee(id) {
            // In a real application, you would fetch employee data by ID
            console.log('View employee:', id);
            // You could open a view-only drawer or navigate to profile page
        },
        
        editEmployee(id) {
            this.isEditing = true;
            // In a real application, fetch employee data by ID
            const employee = {
                id: id,
                name: 'Sample Employee',
                email: 'employee@ametreks.com',
                phone: '+977 9841 000000',
                department: 'operations',
                role: 'staff',
                employment_id: 'AME-EMP-007',
                joined_date: '2023-01-15',
                permissions: {
                    view_all: false,
                    edit_all: false,
                    manage_users: false,
                    system_settings: false
                }
            };
            
            this.employeeForm = { ...employee };
            this.showDrawer = true;
        },
        
        managePermissions(id) {
            console.log('Manage permissions for employee:', id);
            // Open permissions management modal
        },
        
        assignLeave(id) {
            this.leaveForm.employee_id = id;
            this.leaveForm.start_date = new Date().toISOString().split('T')[0];
            this.showLeaveModal = true;
        },
        
        endLeave(id) {
            if (confirm('End leave for this employee?')) {
                console.log('End leave for:', id);
                // API call to update employee status
            }
        },
        
        confirmDelete(id) {
            // In a real application, fetch employee data
            this.employeeToDelete = { id: id, name: 'Sample Employee' };
            this.showDeleteModal = true;
        },
        
        deleteEmployee() {
            if (this.employeeToDelete) {
                console.log('Delete employee:', this.employeeToDelete.id);
                // API call to delete employee
                this.showDeleteModal = false;
                this.employeeToDelete = null;
            }
        },
        
        submitLeave() {
            if (this.leaveForm.type && this.leaveForm.start_date && this.leaveForm.end_date) {
                console.log('Submit leave:', this.leaveForm);
                // API call to assign leave
                this.showLeaveModal = false;
                this.resetLeaveForm();
            } else {
                alert('Please fill all required fields');
            }
        },
        
        saveEmployee() {
            if (this.validateEmployeeForm()) {
                console.log('Save employee:', this.employeeForm);
                // API call to save/update employee
                this.closeDrawer();
                this.resetEmployeeForm();
            } else {
                alert('Please fill all required fields');
            }
        },
        
        validateEmployeeForm() {
            return this.employeeForm.name &&
                   this.employeeForm.email &&
                   this.employeeForm.phone &&
                   this.employeeForm.department &&
                   this.employeeForm.role &&
                   this.employeeForm.employment_id;
        },
        
        handleAvatarUpload(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.avatarPreview = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        
        exportEmployees() {
            console.log('Export employees');
            // Implement export functionality
            // Could export to CSV, Excel, or PDF
        },
        
        resetEmployeeForm() {
            this.employeeForm = {
                id: null,
                name: '',
                email: '',
                phone: '',
                department: '',
                role: '',
                employment_id: '',
                joined_date: new Date().toISOString().split('T')[0],
                permissions: {
                    view_all: false,
                    edit_all: false,
                    manage_users: false,
                    system_settings: false
                }
            };
            this.avatarPreview = null;
        },
        
        resetLeaveForm() {
            this.leaveForm = {
                employee_id: null,
                type: '',
                start_date: '',
                end_date: '',
                reason: ''
            };
        },
        
        closeDrawer() {
            this.showDrawer = false;
            this.resetEmployeeForm();
        }
    };
}
</script>
@endsection