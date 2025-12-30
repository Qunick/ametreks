@extends('admin.layout')

@section('title', 'Destinations')
@section('page-title', 'Destinations Management')
@section('page-description', 'Manage all travel destinations')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">All Destinations</h2>
        <p class="text-gray-600 dark:text-gray-400">Manage your travel destinations</p>
    </div>
    <a href="{{ route('admin.destinations.create') }}" 
       class="px-4 py-2 bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-lg hover:from-blue-600 hover:to-cyan-600 flex items-center space-x-2">
        <i class="fas fa-plus"></i>
        <span>Add Destination</span>
    </a>
</div>

<!-- Filters -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 mb-6 border border-gray-200 dark:border-gray-700">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Search</label>
            <input type="text" placeholder="Search destinations..." 
                   class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-transparent focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Country</label>
            <select class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-transparent">
                <option value="">All Countries</option>
                <option>France</option>
                <option>Italy</option>
                <option>Japan</option>
                <option>USA</option>
                <option>Indonesia</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
            <select class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-transparent">
                <option value="">All Status</option>
                <option>Active</option>
                <option>Inactive</option>
                <option>Featured</option>
            </select>
        </div>
        <div class="flex items-end">
            <button class="w-full px-4 py-2 bg-gray-800 dark:bg-gray-700 text-white rounded-lg hover:bg-gray-900 dark:hover:bg-gray-600">
                Apply Filters
            </button>
        </div>
    </div>
</div>

<!-- Destinations Table -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow border border-gray-200 dark:border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 dark:bg-gray-900">
                <tr>
                    <th class="px-6 py-4 text-left">
                        <input type="checkbox" class="rounded border-gray-300">
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Destination</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Country</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tours</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Featured</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach([
                    ['name' => 'Paris', 'country' => 'France', 'tours' => 12, 'status' => 'active', 'featured' => true, 'image' => 'https://images.unsplash.com/photo-150260289...'],
                    ['name' => 'Bali', 'country' => 'Indonesia', 'tours' => 8, 'status' => 'active', 'featured' => true, 'image' => 'https://images.unsplash.com/photo-1537953...'],
                    ['name' => 'Tokyo', 'country' => 'Japan', 'tours' => 6, 'status' => 'active', 'featured' => false, 'image' => 'https://images.unsplash.com/photo-154095973...'],
                    ['name' => 'New York', 'country' => 'USA', 'tours' => 15, 'status' => 'active', 'featured' => true, 'image' => 'https://images.unsplash.com/photo-1496442...'],
                    ['name' => 'Rome', 'country' => 'Italy', 'tours' => 9, 'status' => 'inactive', 'featured' => false, 'image' => 'https://images.unsplash.com/photo-1552832...'],
                ] as $destination)
                <tr>
                    <td class="px-6 py-4">
                        <input type="checkbox" class="rounded border-gray-300">
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 rounded-lg bg-gradient-to-r from-blue-400 to-cyan-300 flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-800 dark:text-white">{{ $destination['name'] }}</p>
                                <p class="text-sm text-gray-500">5.0 ★ (24 reviews)</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-flag text-gray-400"></i>
                            <span class="text-gray-800 dark:text-white">{{ $destination['country'] }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 rounded-full text-sm">
                            {{ $destination['tours'] }} tours
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-sm {{ 
                            $destination['status'] == 'active' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200'
                        }}">
                            {{ ucfirst($destination['status']) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        @if($destination['featured'])
                        <i class="fas fa-star text-yellow-500"></i>
                        @else
                        <i class="far fa-star text-gray-400"></i>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-2">
                            <button class="p-2 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30 rounded-lg">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="p-2 text-green-600 hover:bg-green-50 dark:hover:bg-green-900/30 rounded-lg">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-lg">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex items-center justify-between">
        <div class="text-sm text-gray-500 dark:text-gray-400">
            Showing 1 to 5 of 24 destinations
        </div>
        <div class="flex items-center space-x-2">
            <button class="px-3 py-1 rounded-lg border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                Previous
            </button>
            <button class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600">1</button>
            <button class="px-3 py-1 rounded-lg border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">2</button>
            <button class="px-3 py-1 rounded-lg border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">3</button>
            <button class="px-3 py-1 rounded-lg border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                Next
            </button>
        </div>
    </div>
</div>

<!-- Bulk Actions -->
<div class="mt-6 bg-white dark:bg-gray-800 rounded-xl shadow p-6 border border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <select class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-transparent">
                <option>Bulk Actions</option>
                <option>Delete Selected</option>
                <option>Mark as Active</option>
                <option>Mark as Inactive</option>
                <option>Add to Featured</option>
            </select>
            <button class="px-4 py-2 bg-gray-800 dark:bg-gray-700 text-white rounded-lg hover:bg-gray-900 dark:hover:bg-gray-600">
                Apply
            </button>
        </div>
        <div class="text-sm text-gray-500 dark:text-gray-400">
            5 destinations selected
        </div>
    </div>
</div>
@endsection