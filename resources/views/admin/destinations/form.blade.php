@extends('layouts.admin')

@section('title', isset($destination) ? 'Edit Destination' : 'Add Destination')
@section('page-title', isset($destination) ? 'Edit Destination' : 'Add New Destination')
@section('page-description', 'Create or update destination information')

@section('content')
<div class="max-w-4xl mx-auto">
    <form action="{{ isset($destination) ? route('admin.destinations.update', $destination->id) : route('admin.destinations.store') }}" 
          method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if(isset($destination))
            @method('PUT')
        @endif

        <!-- Basic Information Card -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Basic Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Destination Name *</label>
                    <input type="text" name="name" value="{{ old('name', $destination->name ?? '') }}" 
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-transparent focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Enter destination name" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Slug *</label>
                    <input type="text" name="slug" value="{{ old('slug', $destination->slug ?? '') }}" 
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-transparent focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="e.g., paris-france" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Country *</label>
                    <select name="country" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-transparent focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <option value="">Select Country</option>
                        <option value="France">France</option>
                        <option value="Italy">Italy</option>
                        <option value="Japan">Japan</option>
                        <option value="USA">USA</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Thailand">Thailand</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">City *</label>
                    <input type="text" name="city" value="{{ old('city', $destination->city ?? '') }}" 
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-transparent focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Enter city name" required>
                </div>
            </div>
            
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description *</label>
                <textarea name="description" rows="4" 
                          class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-transparent focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                          placeholder="Describe this destination...">{{ old('description', $destination->description ?? '') }}</textarea>
            </div>
        </div>

        <!-- Images Card -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Images</h3>
            
            <div class="space-y-6">
                <!-- Featured Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Featured Image *</label>
                    <div class="mt-2 flex items-center space-x-6">
                        <div class="w-32 h-32 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-700 flex items-center justify-center bg-gray-50 dark:bg-gray-900">
                            <div class="text-center">
                                <i class="fas fa-camera text-3xl text-gray-400 mb-2"></i>
                                <p class="text-sm text-gray-500">Upload</p>
                            </div>
                        </div>
                        <div>
                            <input type="file" name="featured_image" class="hidden" id="featuredImage" accept="image/*">
                            <label for="featuredImage" class="px-4 py-2 bg-gray-800 dark:bg-gray-700 text-white rounded-lg hover:bg-gray-900 dark:hover:bg-gray-600 cursor-pointer">
                                Choose File
                            </label>
                            <p class="text-sm text-gray-500 mt-2">Recommended: 800x600px, JPG or PNG</p>
                        </div>
                    </div>
                </div>
                
                <!-- Gallery Images -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Gallery Images</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @for($i = 1; $i <= 4; $i++)
                        <div class="relative group">
                            <div class="w-full h-32 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-700 flex items-center justify-center bg-gray-50 dark:bg-gray-900">
                                <i class="fas fa-plus text-2xl text-gray-400"></i>
                            </div>
                            <input type="file" name="gallery[]" class="hidden" id="gallery{{ $i }}">
                            <label for="gallery{{ $i }}" class="absolute inset-0 cursor-pointer"></label>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- Location Card -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Location</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Latitude</label>
                    <input type="text" name="latitude" value="{{ old('latitude', $destination->latitude ?? '') }}" 
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-transparent focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="e.g., 48.8566">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Longitude</label>
                    <input type="text" name="longitude" value="{{ old('longitude', $destination->longitude ?? '') }}" 
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-transparent focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="e.g., 2.3522">
                </div>
            </div>
            
            <!-- Map Preview -->
            <div class="mt-6 h-48 rounded-lg bg-gradient-to-r from-blue-100 to-cyan-100 dark:from-blue-900/30 dark:to-cyan-900/30 flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-map-marked-alt text-4xl text-blue-500 mb-2"></i>
                    <p class="text-gray-600 dark:text-gray-400">Map preview will appear here</p>
                </div>
            </div>
        </div>

        <!-- Settings Card -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Settings</h3>
            
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Featured Destination</label>
                        <p class="text-sm text-gray-500">Show this destination as featured</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" class="sr-only peer" 
                               {{ old('is_featured', $destination->is_featured ?? false) ? 'checked' : '' }}>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    </label>
                </div>
                
                <div class="flex items-center justify-between">
                    <div>
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Active Status</label>
                        <p class="text-sm text-gray-500">Make this destination visible to users</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" class="sr-only peer" 
                               {{ old('is_active', $destination->is_active ?? true) ? 'checked' : '' }}>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                    </label>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.destinations.index') }}" 
               class="px-6 py-2 border border-gray-300 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                Cancel
            </a>
            <button type="submit" 
                    class="px-6 py-2 bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-lg hover:from-blue-600 hover:to-cyan-600 flex items-center space-x-2">
                <i class="fas fa-save"></i>
                <span>{{ isset($destination) ? 'Update Destination' : 'Create Destination' }}</span>
            </button>
        </div>
    </form>
</div>
@endsection