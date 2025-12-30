@extends('admin.layout')

@section('title', 'Tours Management - TrekAdmin')
@section('page-title', 'Tours Management')

@section('content')
<div class="space-y-6">
    <!-- Header with Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">All Tours</h2>
            <p class="text-gray-600 mt-1">Manage trekking and tour packages</p>
        </div>
        <a href="{{ route('admin.tours.create') }}" class="mt-4 md:mt-0 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
            <i class="fas fa-plus mr-2"></i> Add New Tour
        </a>
    </div>

    <!-- Tours Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Tour Card 1 -->
        <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-200">
            <div class="h-48 bg-gradient-to-r from-green-400 to-blue-500 relative">
                <div class="absolute top-3 right-3">
                    <span class="px-3 py-1 bg-white text-sm rounded-full">$1,250</span>
                </div>
                <div class="absolute bottom-3 left-3">
                    <span class="px-3 py-1 bg-green-500 text-white text-sm rounded-full">Active</span>
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-bold text-gray-900">Everest Base Camp</h3>
                <p class="text-gray-600 text-sm mt-1">14 days • Moderate Difficulty</p>
                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center">
                        <i class="fas fa-star text-yellow-500"></i>
                        <span class="ml-1 text-gray-700">4.8 (124)</span>
                    </div>
                    <div class="flex space-x-2">
                        <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg">
                            <i class="fas fa-edit"></i>
                        </button>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- More tour cards... -->
    </div>
</div>
@endsection