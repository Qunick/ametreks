@extends('admin.layouts')
@section('title', 'Edit Trek: ' . $trek->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Edit Trek</h1>
            <p class="text-gray-600 mt-2">{{ $trek->title }}</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.treks.show', $trek) }}" target="_blank" class="px-4 py-2 bg-green-100 text-green-800 rounded-md hover:bg-green-200 transition duration-200">
                View Live
            </a>
            <a href="{{ route('admin.treks.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition duration-200">
                ← Back to Treks
            </a>
        </div>
    </div>

    <form action="{{ route('admin.treks.update', $trek) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md overflow-hidden">
        @csrf
        @method('PUT')
        
        <!-- Status & Visibility Section -->
        <div class="border-b border-gray-200 p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Status & Visibility</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="flex items-center">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $trek->is_active) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500">
                    <label for="is_active" class="ml-2 text-gray-700">Active</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $trek->is_featured) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500">
                    <label for="is_featured" class="ml-2 text-gray-700">Featured</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="is_bookable" name="is_bookable" value="1" {{ old('is_bookable', $trek->is_bookable) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500">
                    <label for="is_bookable" class="ml-2 text-gray-700">Bookable</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="noindex" name="noindex" value="1" {{ old('noindex', $trek->noindex) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500">
                    <label for="noindex" class="ml-2 text-gray-700">No Index (SEO)</label>
                </div>
            </div>
        </div>

        <!-- Basic Information Section -->
        <div class="border-b border-gray-200 p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Basic Information</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" id="title" name="title" required value="{{ old('title', $trek->title) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug *</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500">/treks/</span>
                        <input type="text" id="slug" name="slug" required value="{{ old('slug', $trek->slug) }}" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-r-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    </div>
                    <p class="mt-1 text-sm text-gray-500">Auto-generates from title. Edit if needed.</p>
                    @error('slug')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Trip Type -->
                <div>
                    <label for="trip_type" class="block text-sm font-medium text-gray-700 mb-2">Trip Type *</label>
                    <select id="trip_type" name="trip_type" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                        <option value="">Select Trip Type</option>
                        <option value="trekking" {{ old('trip_type', $trek->trip_type) == 'trekking' ? 'selected' : '' }}>Trek</option>
                        <option value="peak_climbing" {{ old('trip_type', $trek->trip_type) == 'peak_climbing' ? 'selected' : '' }}>Climbing</option>
                        <option value="tour" {{ old('trip_type', $trek->trip_type) == 'tour' ? 'selected' : '' }}>Tour</option>
                        <option value="expedition" {{ old('trip_type', $trek->trip_type) == 'expedition' ? 'selected' : '' }}>Expedition</option>
                    </select>
                    @error('trip_type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Region -->
                <div>
                    <label for="region" class="block text-sm font-medium text-gray-700 mb-2">Region *</label>
                    <select id="region" name="region" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                        <option value="">Select Region</option>
                        <option value="everest" {{ old('region', $trek->region) == 'everest' ? 'selected' : '' }}>Everest Region</option>
                        <option value="annapurna" {{ old('region', $trek->region) == 'annapurna' ? 'selected' : '' }}>Annapurna Region</option>
                        <option value="langtang" {{ old('region', $trek->region) == 'langtang' ? 'selected' : '' }}>Langtang Region</option>
                        <option value="manaslu" {{ old('region', $trek->region) == 'manaslu' ? 'selected' : '' }}>Manaslu Region</option>
                        <option value="mustang" {{ old('region', $trek->region) == 'mustang' ? 'selected' : '' }}>Mustang Region</option>
                        <option value="kanchenjunga" {{ old('region', $trek->region) == 'kanchenjunga' ? 'selected' : '' }}>Kanchenjunga Region</option>
                    </select>
                    @error('region')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Trek Details Section -->
        <div class="border-b border-gray-200 p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Trek Details</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Duration -->
                <div>
                    <label for="duration_days" class="block text-sm font-medium text-gray-700 mb-2">Duration (Days) *</label>
                    <input type="number" id="duration_days" name="duration_days" required min="1" value="{{ old('duration_days', $trek->duration_days) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('duration_days')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Difficulty -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Difficulty *</label>
                    <div class="flex space-x-6">
                        <div class="flex items-center">
                            <input type="radio" id="difficulty_easy" name="difficulty" value="easy" {{ old('difficulty', $trek->difficulty) == 'easy' ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                            <label for="difficulty_easy" class="ml-2 text-gray-700">Easy</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="difficulty_moderate" name="difficulty" value="moderate" {{ old('difficulty', $trek->difficulty) == 'moderate' ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                            <label for="difficulty_moderate" class="ml-2 text-gray-700">Moderate</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="difficulty_hard" name="difficulty" value="hard" {{ old('difficulty', $trek->difficulty) == 'hard' ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                            <label for="difficulty_hard" class="ml-2 text-gray-700">Hard</label>
                        </div>
                    </div>
                    @error('difficulty')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Max Altitude -->
                <div>
                    <label for="max_altitude" class="block text-sm font-medium text-gray-700 mb-2">Max Altitude (meters)</label>
                    <input type="number" id="max_altitude" name="max_altitude" value="{{ old('max_altitude', $trek->max_altitude) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    @error('max_altitude')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Best Season -->
                <div>
                    <label for="best_season" class="block text-sm font-medium text-gray-700 mb-2">Best Season</label>
                    <select id="best_season" name="best_season" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                        <option value="">Select Best Season</option>
                        <option value="spring" {{ old('best_season', $trek->best_season) == 'spring' ? 'selected' : '' }}>Spring (Mar-May)</option>
                        <option value="autumn" {{ old('best_season', $trek->best_season) == 'autumn' ? 'selected' : '' }}>Autumn (Sep-Nov)</option>
                        <option value="winter" {{ old('best_season', $trek->best_season) == 'winter' ? 'selected' : '' }}>Winter (Dec-Feb)</option>
                        <option value="monsoon" {{ old('best_season', $trek->best_season) == 'monsoon' ? 'selected' : '' }}>Monsoon (Jun-Aug)</option>
                        <option value="all_year" {{ old('best_season', $trek->best_season) == 'all_year' ? 'selected' : '' }}>All Year Round</option>
                    </select>
                    @error('best_season')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Pricing Section -->
        <div class="border-b border-gray-200 p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Pricing</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Base Price -->
                <div>
                    <label for="base_price" class="block text-sm font-medium text-gray-700 mb-2">Base Price *</label>
                    <div class="flex">
                        <select id="currency" name="currency" required class="px-4 py-2 border border-r-0 border-gray-300 rounded-l-md bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                            <option value="USD" {{ old('currency', $trek->currency) == 'USD' ? 'selected' : '' }}>USD</option>
                            <option value="EUR" {{ old('currency', $trek->currency) == 'EUR' ? 'selected' : '' }}>EUR</option>
                            <option value="GBP" {{ old('currency', $trek->currency) == 'GBP' ? 'selected' : '' }}>GBP</option>
                        </select>
                        <input type="number" id="base_price" name="base_price" required min="0" step="0.01" value="{{ old('base_price', $trek->base_price) }}" class="flex-1 min-w-0 block w-full px-4 py-2 rounded-r-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    </div>
                    @error('base_price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @error('currency')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Content Sections -->
        <div class="border-b border-gray-200 p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Content</h2>
            
            <!-- Short Description -->
            <div class="mb-6">
                <label for="short_desc" class="block text-sm font-medium text-gray-700 mb-2">Short Description *</label>
                <div id="short_desc_editor" class="min-h-[120px] border border-gray-300 rounded-md focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 transition duration-200">
                    <!-- Toolbar for short description -->
                    <div class="border-b border-gray-200 bg-gray-50 p-2 rounded-t-md flex space-x-2">
                        <button type="button" class="p-1 hover:bg-gray-200 rounded" onclick="formatText('short_desc', 'bold')" title="Bold">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M8.333 4.667h4.083a3.25 3.25 0 010 6.5H8.333V4.667zM8.333 11.167h3.667a3.25 3.25 0 010 6.5H8.333v-6.5zM7.5 3.5v13h5.417a4.75 4.75 0 000-9.5H9.167a1.667 1.667 0 010-3.333H7.5z"></path></svg>
                        </button>
                        <button type="button" class="p-1 hover:bg-gray-200 rounded" onclick="formatText('short_desc', 'italic')" title="Italic">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M15 4.5V6H11.625L9.375 14H12.5V15.5H5V14H8.375L10.625 6H7.5V4.5H15z"></path></svg>
                        </button>
                        <button type="button" class="p-1 hover:bg-gray-200 rounded" onclick="formatText('short_desc', 'underline')" title="Underline">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3.5h10V5H5V3.5zM9.167 5.667v5.416a2.083 2.083 0 104.166 0V5.667h1.25v5.416a3.333 3.333 0 11-6.666 0V5.667h1.25zM4.375 15.5h11.25v1.25H4.375V15.5z"></path></svg>
                        </button>
                    </div>
                    <textarea id="short_desc" name="short_desc" rows="4" required class="w-full px-4 py-3 border-0 focus:ring-0 resize-none">{{ old('short_desc', $trek->short_desc) }}</textarea>
                </div>
                <p class="mt-1 text-sm text-gray-500">Brief introduction (max 250 characters)</p>
                <div class="text-right mt-1">
                    <span id="short_desc_count" class="text-sm text-gray-500">{{ strlen($trek->short_desc) }}/250</span>
                </div>
                @error('short_desc')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Overview - Rich Text Editor -->
            <div>
                <label for="overview" class="block text-sm font-medium text-gray-700 mb-2">Overview *</label>
                <div id="overview_editor" class="border border-gray-300 rounded-md focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 transition duration-200">
                    <!-- Toolbar -->
                    <div class="border-b border-gray-200 bg-gray-50 p-2 rounded-t-md flex flex-wrap gap-1">
                        <!-- Formatting buttons -->
                        <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execCommand('bold')" title="Bold">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M8.333 4.667h4.083a3.25 3.25 0 010 6.5H8.333V4.667zM8.333 11.167h3.667a3.25 3.25 0 010 6.5H8.333v-6.5zM7.5 3.5v13h5.417a4.75 4.75 0 000-9.5H9.167a1.667 1.667 0 010-3.333H7.5z"></path></svg>
                        </button>
                        <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execCommand('italic')" title="Italic">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M15 4.5V6H11.625L9.375 14H12.5V15.5H5V14H8.375L10.625 6H7.5V4.5H15z"></path></svg>
                        </button>
                        <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execCommand('underline')" title="Underline">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3.5h10V5H5V3.5zM9.167 5.667v5.416a2.083 2.083 0 104.166 0V5.667h1.25v5.416a3.333 3.333 0 11-6.666 0V5.667h1.25zM4.375 15.5h11.25v1.25H4.375V15.5z"></path></svg>
                        </button>
                        <div class="w-px h-6 bg-gray-300 mx-1"></div>
                        <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execCommand('formatBlock', '<h2>')" title="Heading 2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M4.167 4.667V15.5h1.666V10.5h5V15.5h1.666V4.667H10.833v5H5.833v-5H4.167zM15 12.333a2.333 2.333 0 00-2.333 2.334v.5h1.666v-.5a.667.667 0 011.334 0 .667.667 0 01-1.334 0v-.5H13.5a2.333 2.333 0 012.333-2.334c1.05 0 1.934.75 2.167 1.75H17.5a1.167 1.167 0 00-1.167-1.166A1.167 1.167 0 0015.167 15v.333h1.666V15a2.333 2.333 0 012.334-2.333c1.284 0 2.333 1.05 2.333 2.333v3.5h-1.666V15a.667.667 0 00-1.334 0v.333H17.5V15a1.167 1.167 0 011.166-1.167A1.167 1.167 0 0119.833 15v.333H21.5V15a2.333 2.333 0 00-2.333-2.333 2.333 2.333 0 00-2.334 2.333v3.5h-1.666V15a2.333 2.333 0 00-2.334-2.333z"></path></svg>
                        </button>
                        <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execCommand('formatBlock', '<h3>')" title="Heading 3">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M4.167 4.667V15.5h1.666V10.5h5V15.5h1.666V4.667H10.833v5H5.833v-5H4.167zM15 12.333a2.333 2.333 0 00-2.333 2.334v.5h1.666v-.5a.667.667 0 011.334 0 .667.667 0 01-1.334 0v-.5H13.5a2.333 2.333 0 012.333-2.334c1.05 0 1.934.75 2.167 1.75H17.5a1.167 1.167 0 00-1.167-1.166A1.167 1.167 0 0015.167 15v.333h1.666V15a2.333 2.333 0 012.334-2.333c1.284 0 2.333 1.05 2.333 2.333v3.5h-1.666V15a.667.667 0 00-1.334 0v.333H17.5V15a1.167 1.167 0 011.166-1.167A1.167 1.167 0 0119.833 15v.333H21.5V15a2.333 2.333 0 00-2.333-2.333 2.333 2.333 0 00-2.334 2.333v3.5h-1.666V15a2.333 2.333 0 00-2.334-2.333z"></path></svg>
                        </button>
                        <div class="w-px h-6 bg-gray-300 mx-1"></div>
                        <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execCommand('insertUnorderedList')" title="Bullet List">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M4.167 5.333a1.167 1.167 0 100-2.333 1.167 1.167 0 000 2.333zM7.5 4.5h10v1.666H7.5V4.5zm-3.333 4.667a1.167 1.167 0 100-2.334 1.167 1.167 0 000 2.334zM7.5 8.333h10V10H7.5V8.333zm-3.333 4.667a1.167 1.167 0 100-2.334 1.167 1.167 0 000 2.334zM7.5 12.333h10v1.667H7.5v-1.667z"></path></svg>
                        </button>
                        <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execCommand('insertOrderedList')" title="Numbered List">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M5.833 4.667V3.5H4.167v1.167h.833v7h-1.25V12.5h4.583v-1.666H5.833v-6.167zm-1.666 8.166v.834H4.167v.833H3.333v.834h.834v.833H3.333v1.667h1.667v-.834h.833v-.833h-.833v-.834h.833v-1.666H4.167zm.833 4.167h-.833v.834h.833v-.834zM7.5 4.5h10v1.666H7.5V4.5zm0 4.167h10v1.666H7.5V8.667zm0 4.166h10v1.667H7.5v-1.667z"></path></svg>
                        </button>
                        <div class="w-px h-6 bg-gray-300 mx-1"></div>
                        <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execCommand('createLink', prompt('Enter URL:'))" title="Insert Link">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M12.5 7.5a3.333 3.333 0 00-3.333 3.333.833.833 0 11-1.667 0 5 5 0 015-5 .833.833 0 110 1.667zm-5 5a3.333 3.333 0 003.333 3.333.833.833 0 110 1.667 5 5 0 01-5-5 .833.833 0 111.667 0zm7.5-2.5a.833.833 0 00-1.667 0 3.333 3.333 0 01-3.333 3.333.833.833 0 000 1.667 5 5 0 005-5zm-5-2.5a.833.833 0 000 1.667 3.333 3.333 0 013.333 3.333.833.833 0 101.667 0 5 5 0 00-5-5z"></path></svg>
                        </button>
                        <button type="button" class="p-1.5 hover:bg-gray-200 rounded" onclick="execCommand('unlink')" title="Remove Link">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M12.5 7.5a3.333 3.333 0 00-3.333 3.333.833.833 0 11-1.667 0 5 5 0 015-5 .833.833 0 110 1.667zm-5 5a3.333 3.333 0 003.333 3.333.833.833 0 110 1.667 5 5 0 01-5-5 .833.833 0 111.667 0zm7.5-2.5a.833.833 0 00-1.667 0 3.333 3.333 0 01-3.333 3.333.833.833 0 000 1.667 5 5 0 005-5zm-5-2.5a.833.833 0 000 1.667 3.333 3.333 0 013.333 3.333.833.833 0 101.667 0 5 5 0 00-5-5zM5.833 4.167l10 10-1.166 1.166-10-10 1.166-1.166z"></path></svg>
                        </button>
                    </div>
                    <!-- Editable div for rich text -->
                    <div id="overview_content" class="min-h-[300px] px-4 py-3 overflow-auto" contenteditable="true">
                        {!! old('overview', $trek->overview) !!}
                    </div>
                    <!-- Hidden input to store HTML -->
                    <textarea id="overview" name="overview" class="hidden">{{ old('overview', $trek->overview) }}</textarea>
                </div>
                @php
                    $wordCount = str_word_count(strip_tags($trek->overview));
                @endphp
                <div class="text-right mt-1">
                    <span id="overview_count" class="text-sm text-gray-500">{{ $wordCount }} words</span>
                </div>
                @error('overview')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Media Section -->
        <div class="border-b border-gray-200 p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Media</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Current Image Preview -->
                @if($trek->main_image)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                    <div class="mb-3">
                        <img src="{{ Storage::url($trek->main_image) }}" alt="{{ $trek->image_alt }}" class="w-full max-w-md h-auto rounded-lg shadow-md">
                        <p class="text-sm text-gray-600 mt-2">{{ basename($trek->main_image) }}</p>
                        <div class="flex items-center mt-2">
                            <input type="checkbox" id="remove_image" name="remove_image" value="1" class="h-4 w-4 text-red-600 rounded">
                            <label for="remove_image" class="ml-2 text-sm text-red-600">Remove current image</label>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Main Image Upload -->
                <div>
                    <label for="main_image" class="block text-sm font-medium text-gray-700 mb-2">Update Main Image</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-blue-500 transition duration-200">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="main_image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                    <span>Upload new image</span>
                                    <input id="main_image" name="main_image" type="file" accept="image/*" class="sr-only" onchange="previewImage(event)">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, WebP up to 5MB</p>
                            <p class="text-xs text-gray-500 mt-2">Leave empty to keep current image</p>
                        </div>
                    </div>
                    <div id="image_preview" class="mt-4 hidden">
                        <img id="preview" class="max-w-full h-48 rounded-md shadow-sm">
                    </div>
                    @error('main_image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Alt Text -->
                <div>
                    <label for="image_alt" class="block text-sm font-medium text-gray-700 mb-2">Image Alt Text</label>
                    <input type="text" id="image_alt" name="image_alt" value="{{ old('image_alt', $trek->image_alt) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    <p class="mt-1 text-sm text-gray-500">Description for SEO and accessibility</p>
                    @error('image_alt')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Video URL -->
                <div class="lg:col-span-2">
                    <label for="video_url" class="block text-sm font-medium text-gray-700 mb-2">Video URL</label>
                    <input type="url" id="video_url" name="video_url" value="{{ old('video_url', $trek->video_url) }}" placeholder="https://youtube.com/embed/..." class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    <p class="mt-1 text-sm text-gray-500">YouTube or Vimeo embed URL</p>
                    @error('video_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- SEO Section -->
        <div class="p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">SEO Settings</h2>
            <div class="space-y-6">
                <!-- Meta Title -->
                <div>
                    <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                    <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $trek->meta_title) }}" maxlength="60" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    <div class="flex justify-between mt-1">
                        <p class="text-sm text-gray-500">Recommended: 50-60 characters</p>
                        <span id="meta_title_count" class="text-sm text-gray-500">{{ strlen($trek->meta_title) }}/60</span>
                    </div>
                    @error('meta_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Description -->
                <div>
                    <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                    <textarea id="meta_description" name="meta_description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">{{ old('meta_description', $trek->meta_description) }}</textarea>
                    <div class="flex justify-between mt-1">
                        <p class="text-sm text-gray-500">Recommended: 150-160 characters</p>
                        <span id="meta_description_count" class="text-sm text-gray-500">{{ strlen($trek->meta_description) }}/160</span>
                    </div>
                    @error('meta_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Keywords -->
                <div>
                    <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                    <input type="text" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $trek->meta_keywords) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                    <p class="mt-1 text-sm text-gray-500">Separate keywords with commas</p>
                    @error('meta_keywords')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <div>
                    <span class="text-sm text-gray-600">Last updated: {{ $trek->updated_at->format('M d, Y H:i') }}</span>
                </div>
                <div class="flex space-x-3">
                    <button type="button" onclick="window.location.href='{{ route('admin.treks.index') }}'" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-100 transition duration-200">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                        Update Trek
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    // Function to execute commands on the overview editor
    function execCommand(command, value = null) {
        document.getElementById('overview_content').focus();
        if (command === 'createLink' && value) {
            document.execCommand(command, false, value);
        } else if (command === 'formatBlock') {
            document.execCommand(command, false, value);
        } else {
            document.execCommand(command, false, null);
        }
        updateOverviewContent();
    }

    // Update hidden input with overview content
    function updateOverviewContent() {
        const content = document.getElementById('overview_content').innerHTML;
        document.getElementById('overview').value = content;
        updateWordCount('overview_content', 'overview_count');
    }

    // Format text for short description
    function formatText(field, format) {
        const textarea = document.getElementById(field);
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const selectedText = textarea.value.substring(start, end);
        
        let formattedText = '';
        switch(format) {
            case 'bold':
                formattedText = `<strong>${selectedText}</strong>`;
                break;
            case 'italic':
                formattedText = `<em>${selectedText}</em>`;
                break;
            case 'underline':
                formattedText = `<u>${selectedText}</u>`;
                break;
        }
        
        textarea.value = textarea.value.substring(0, start) + formattedText + textarea.value.substring(end);
        updateCharacterCount('short_desc', 'short_desc_count');
    }

    // Character count for short description
    function updateCharacterCount(textareaId, counterId) {
        const textarea = document.getElementById(textareaId);
        const counter = document.getElementById(counterId);
        const length = textarea.value.length;
        counter.textContent = `${length}/250`;
        
        if (length > 250) {
            counter.classList.remove('text-gray-500');
            counter.classList.add('text-red-600');
        } else {
            counter.classList.remove('text-red-600');
            counter.classList.add('text-gray-500');
        }
    }

    // Word count for overview
    function updateWordCount(contentId, counterId) {
        const content = document.getElementById(contentId);
        const text = content.textContent || content.innerText;
        const words = text.trim().split(/\s+/).filter(word => word.length > 0);
        const counter = document.getElementById(counterId);
        counter.textContent = `${words.length} words`;
    }

    // Image preview
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('image_preview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                // Hide remove image checkbox when uploading new image
                const removeCheckbox = document.getElementById('remove_image');
                if (removeCheckbox) {
                    removeCheckbox.checked = false;
                }
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function() {
        const title = this.value;
        const slugInput = document.getElementById('slug');
        
        if (!slugInput.dataset.manual) {
            const slug = title
                .toLowerCase()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/--+/g, '-')
                .trim();
            slugInput.value = slug;
        }
    });

    // Mark slug as manually edited
    document.getElementById('slug').addEventListener('input', function() {
        this.dataset.manual = true;
    });

    // Character counters
    document.getElementById('short_desc').addEventListener('input', function() {
        updateCharacterCount('short_desc', 'short_desc_count');
    });

    document.getElementById('meta_title').addEventListener('input', function() {
        const counter = document.getElementById('meta_title_count');
        counter.textContent = `${this.value.length}/60`;
    });

    document.getElementById('meta_description').addEventListener('input', function() {
        const counter = document.getElementById('meta_description_count');
        counter.textContent = `${this.value.length}/160`;
    });

    // Update overview content on input
    document.getElementById('overview_content').addEventListener('input', updateOverviewContent);
    document.getElementById('overview_content').addEventListener('blur', updateOverviewContent);

    // Remove image checkbox handler
    const removeImageCheckbox = document.getElementById('remove_image');
    if (removeImageCheckbox) {
        removeImageCheckbox.addEventListener('change', function() {
            if (this.checked) {
                // Clear file input if remove is checked
                const fileInput = document.getElementById('main_image');
                if (fileInput) {
                    fileInput.value = '';
                    document.getElementById('image_preview').classList.add('hidden');
                }
            }
        });
    }

    // Initialize counters on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateCharacterCount('short_desc', 'short_desc_count');
        updateWordCount('overview_content', 'overview_count');
        
        const metaTitle = document.getElementById('meta_title');
        document.getElementById('meta_title_count').textContent = `${metaTitle.value.length}/60`;
        
        const metaDesc = document.getElementById('meta_description');
        document.getElementById('meta_description_count').textContent = `${metaDesc.value.length}/160`;
    });
</script>

<style>
    #overview_content:focus {
        outline: none;
    }
    
    #overview_content h2 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-top: 1rem;
        margin-bottom: 0.5rem;
        color: #1f2937;
    }
    
    #overview_content h3 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-top: 0.75rem;
        margin-bottom: 0.5rem;
        color: #374151;
    }
    
    #overview_content ul {
        list-style-type: disc;
        padding-left: 1.5rem;
        margin: 0.5rem 0;
    }
    
    #overview_content ol {
        list-style-type: decimal;
        padding-left: 1.5rem;
        margin: 0.5rem 0;
    }
    
    #overview_content a {
        color: #2563eb;
        text-decoration: underline;
    }
    
    #overview_content a:hover {
        color: #1d4ed8;
    }
</style>
@endsection