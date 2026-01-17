@extends('admin.layouts')

@section('title', 'Create New Trek')
@section('page-title', 'Create New Trek')
@section('page-subtitle', 'Add a new trekking adventure')

@section('content')
<div x-data="trekForm()" class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold" style="color: #052734;">Create New Trek</h1>
            <p class="text-sm mt-1" style="color: #6D6E70;">Add a new trekking adventure to your portfolio</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.treks.index') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 border border-gray-300 rounded-lg font-medium transition-all hover:bg-gray-50" style="color: #052734;">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Treks
            </a>
        </div>
    </div>

    <form action="{{ route('admin.treks.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <!-- Status & Visibility -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold mb-4" style="color: #052734;">Status & Visibility</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:border-[#005991] transition-all">
                    <input type="checkbox" id="is_active" name="is_active" value="1" checked class="w-4 h-4" style="accent-color: #99C723;">
                    <div>
                        <p class="text-sm font-medium" style="color: #052734;">Active</p>
                        <p class="text-xs" style="color: #6D6E70;">Visible on website</p>
                    </div>
                </label>
                
                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:border-[#005991] transition-all">
                    <input type="checkbox" id="is_featured" name="is_featured" value="1" class="w-4 h-4" style="accent-color: #4D8BB2;">
                    <div>
                        <p class="text-sm font-medium" style="color: #052734;">Featured</p>
                        <p class="text-xs" style="color: #6D6E70;">Show on homepage</p>
                    </div>
                </label>
                
                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:border-[#005991] transition-all">
                    <input type="checkbox" id="is_bookable" name="is_bookable" value="1" checked class="w-4 h-4" style="accent-color: #99C723;">
                    <div>
                        <p class="text-sm font-medium" style="color: #052734;">Bookable</p>
                        <p class="text-xs" style="color: #6D6E70;">Allow bookings</p>
                    </div>
                </label>
                
                <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:border-[#005991] transition-all">
                    <input type="checkbox" id="noindex" name="noindex" value="1" class="w-4 h-4" style="accent-color: #C9302C;">
                    <div>
                        <p class="text-sm font-medium" style="color: #052734;">No Index</p>
                        <p class="text-xs" style="color: #6D6E70;">Hide from search engines</p>
                    </div>
                </label>
            </div>
        </div>

        <!-- Basic Information -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold mb-4" style="color: #052734;">Basic Information</h3>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Title -->
                <div>
                    <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Trek Title *</label>
                    <input type="text" name="title" required value="{{ old('title') }}" 
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:border-transparent text-sm" 
                           style="--tw-ring-color: #005991;" 
                           placeholder="Everest Base Camp Trek">
                    @error('title')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">URL Slug *</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 border border-r-0 border-gray-200 rounded-l-lg text-sm" style="background-color: #F9FAFB; color: #6D6E70;">
                            /treks/
                        </span>
                        <input type="text" name="slug" required value="{{ old('slug') }}" 
                               class="flex-1 px-3 py-3 border border-gray-200 rounded-r-lg focus:outline-none focus:ring-2 focus:border-transparent text-sm" 
                               style="--tw-ring-color: #005991;" 
                               placeholder="everest-base-camp-trek">
                    </div>
                    @error('slug')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Trip Type -->
                <div>
                    <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Trip Type *</label>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach(['trekking' => 'Trek', 'peak_climbing' => 'Climbing', 'tour' => 'Tour', 'expedition' => 'Expedition'] as $value => $label)
                        <label class="flex items-center gap-2 p-3 border border-gray-200 rounded-lg cursor-pointer hover:border-[#005991] transition-all">
                            <input type="radio" name="trip_type" value="{{ $value }}" {{ old('trip_type') == $value ? 'checked' : '' }} required 
                                   class="w-4 h-4" style="accent-color: #005991;">
                            <span class="text-sm" style="color: #052734;">{{ $label }}</span>
                        </label>
                        @endforeach
                    </div>
                    @error('trip_type')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Region -->
                <div>
                    <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Region *</label>
                    <select name="region" required 
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:border-transparent text-sm" 
                            style="--tw-ring-color: #005991; color: #052734;">
                        <option value="">Select Region</option>
                        @foreach(['everest' => 'Everest Region', 'annapurna' => 'Annapurna Region', 'langtang' => 'Langtang Region', 'manaslu' => 'Manaslu Region', 'mustang' => 'Mustang Region', 'kanchenjunga' => 'Kanchenjunga Region'] as $value => $label)
                        <option value="{{ $value }}" {{ old('region') == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('region')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Trek Details -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold mb-4" style="color: #052734;">Trek Details</h3>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Duration -->
                <div>
                    <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Duration (Days) *</label>
                    <div class="flex items-center gap-2">
                        <input type="number" name="duration_days" required min="1" value="{{ old('duration_days') }}" 
                               class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:border-transparent text-sm" 
                               style="--tw-ring-color: #005991;">
                        <span class="text-sm" style="color: #6D6E70;">days</span>
                    </div>
                    @error('duration_days')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Difficulty -->
                <div>
                    <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Difficulty Level *</label>
                    <div class="grid grid-cols-3 gap-2">
                        @foreach(['easy' => 'Easy', 'moderate' => 'Moderate', 'hard' => 'Hard'] as $value => $label)
                        <label class="flex flex-col items-center gap-2 p-3 border-2 rounded-lg cursor-pointer transition-all" 
                               :class="difficulty == '{{ $value }}' ? 'border-[#005991] bg-blue-50' : 'border-gray-200 hover:border-gray-300'">
                            <input type="radio" name="difficulty" value="{{ $value }}" 
                                   x-model="difficulty" required class="w-4 h-4" style="accent-color: #005991;">
                            <span class="text-sm font-medium" style="color: #052734;">{{ $label }}</span>
                        </label>
                        @endforeach
                    </div>
                    @error('difficulty')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Max Altitude -->
                <div>
                    <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Maximum Altitude</label>
                    <div class="flex items-center gap-2">
                        <input type="number" name="max_altitude" value="{{ old('max_altitude') }}" 
                               class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:border-transparent text-sm" 
                               style="--tw-ring-color: #005991;" 
                               placeholder="5545">
                        <span class="text-sm" style="color: #6D6E70;">meters</span>
                    </div>
                    @error('max_altitude')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Best Season -->
                <div>
                    <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Best Season</label>
                    <select name="best_season" 
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:border-transparent text-sm" 
                            style="--tw-ring-color: #005991; color: #052734;">
                        <option value="">Select Best Season</option>
                        @foreach(['spring' => 'Spring (Mar-May)', 'autumn' => 'Autumn (Sep-Nov)', 'winter' => 'Winter (Dec-Feb)', 'monsoon' => 'Monsoon (Jun-Aug)', 'all_year' => 'All Year Round'] as $value => $label)
                        <option value="{{ $value }}" {{ old('best_season') == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('best_season')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Pricing -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold mb-4" style="color: #052734;">Pricing</h3>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Base Price -->
                <div>
                    <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Base Price *</label>
                    <div class="flex">
                        <select name="currency" required 
                                class="px-4 py-3 border border-r-0 border-gray-200 rounded-l-lg focus:outline-none focus:ring-2 focus:border-transparent text-sm" 
                                style="--tw-ring-color: #005991; background-color: #F9FAFB; color: #052734;">
                            <option value="USD" {{ old('currency', 'USD') == 'USD' ? 'selected' : '' }}>USD</option>
                            <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
                            <option value="GBP" {{ old('currency') == 'GBP' ? 'selected' : '' }}>GBP</option>
                        </select>
                        <input type="number" name="base_price" required min="0" step="0.01" value="{{ old('base_price') }}" 
                               class="flex-1 px-4 py-3 border border-gray-200 rounded-r-lg focus:outline-none focus:ring-2 focus:border-transparent text-sm" 
                               style="--tw-ring-color: #005991;" 
                               placeholder="2500.00">
                    </div>
                    @error('base_price')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                    @error('currency')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold mb-4" style="color: #052734;">Content</h3>
            
            <!-- Short Description -->
            <div class="mb-6">
                <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Short Description *</label>
                <div class="border border-gray-200 rounded-lg overflow-hidden focus-within:ring-2 focus-within:border-transparent" style="--tw-ring-color: #005991;">
                    <div class="border-b border-gray-100 bg-gray-50 p-2 flex gap-1">
                        <button type="button" @click="formatText('short_desc', 'bold')" class="p-1.5 rounded hover:bg-gray-200 transition-colors" title="Bold">
                            <svg class="w-4 h-4" style="color: #052734;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.333 4.667h4.083a3.25 3.25 0 010 6.5H8.333V4.667zM8.333 11.167h3.667a3.25 3.25 0 010 6.5H8.333v-6.5zM7.5 3.5v13h5.417a4.75 4.75 0 000-9.5H9.167a1.667 1.667 0 010-3.333H7.5z"/>
                            </svg>
                        </button>
                        <button type="button" @click="formatText('short_desc', 'italic')" class="p-1.5 rounded hover:bg-gray-200 transition-colors" title="Italic">
                            <svg class="w-4 h-4" style="color: #052734;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4.5V6H11.625L9.375 14H12.5V15.5H5V14H8.375L10.625 6H7.5V4.5H15z"/>
                            </svg>
                        </button>
                    </div>
                    <textarea id="short_desc" name="short_desc" rows="4" required 
                              x-model="shortDesc" @input="updateShortDescCount"
                              class="w-full px-4 py-3 border-0 focus:ring-0 resize-none text-sm" 
                              placeholder="Brief introduction (max 250 characters)...">{{ old('short_desc') }}</textarea>
                </div>
                <div class="flex justify-between mt-1">
                    <p class="text-xs" style="color: #6D6E70;">Brief introduction for listings</p>
                    <span id="short_desc_count" class="text-xs" style="color: #6D6E70;">0/250</span>
                </div>
                @error('short_desc')
                    <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Overview - WYSIWYG Editor -->
            <div>
                <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Detailed Overview *</label>
                <div class="border border-gray-200 rounded-lg overflow-hidden focus-within:ring-2 focus-within:border-transparent" style="--tw-ring-color: #005991;">
                    <!-- Toolbar -->
                    <div class="border-b border-gray-100 bg-gray-50 p-2 flex flex-wrap gap-1">
                        <button type="button" @click="execCommand('bold')" class="p-1.5 rounded hover:bg-gray-200 transition-colors" title="Bold">
                            <svg class="w-4 h-4" style="color: #052734;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </button>
                        <button type="button" @click="execCommand('italic')" class="p-1.5 rounded hover:bg-gray-200 transition-colors" title="Italic">
                            <svg class="w-4 h-4" style="color: #052734;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                            </svg>
                        </button>
                        <button type="button" @click="execCommand('underline')" class="p-1.5 rounded hover:bg-gray-200 transition-colors" title="Underline">
                            <svg class="w-4 h-4" style="color: #052734;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3.5h10V5H5V3.5zM9.167 5.667v5.416a2.083 2.083 0 104.166 0V5.667h1.25v5.416a3.333 3.333 0 11-6.666 0V5.667h1.25zM4.375 15.5h11.25v1.25H4.375V15.5z"/>
                            </svg>
                        </button>
                        <div class="w-px h-4 bg-gray-300 mx-1"></div>
                        <button type="button" @click="execCommand('formatBlock', '<h2>')" class="p-1.5 rounded hover:bg-gray-200 transition-colors" title="Heading 2">
                            <span class="text-sm font-bold" style="color: #052734;">H2</span>
                        </button>
                        <button type="button" @click="execCommand('formatBlock', '<h3>')" class="p-1.5 rounded hover:bg-gray-200 transition-colors" title="Heading 3">
                            <span class="text-sm font-bold" style="color: #052734;">H3</span>
                        </button>
                        <div class="w-px h-4 bg-gray-300 mx-1"></div>
                        <button type="button" @click="execCommand('insertUnorderedList')" class="p-1.5 rounded hover:bg-gray-200 transition-colors" title="Bullet List">
                            <svg class="w-4 h-4" style="color: #052734;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </button>
                        <button type="button" @click="execCommand('insertOrderedList')" class="p-1.5 rounded hover:bg-gray-200 transition-colors" title="Numbered List">
                            <svg class="w-4 h-4" style="color: #052734;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </button>
                        <button type="button" @click="insertLink()" class="p-1.5 rounded hover:bg-gray-200 transition-colors" title="Insert Link">
                            <svg class="w-4 h-4" style="color: #052734;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Editor Content -->
                    <div id="overview_content" 
                         contenteditable="true"
                         @input="updateOverviewContent"
                         @blur="updateOverviewContent"
                         class="min-h-[300px] px-4 py-3 overflow-auto text-sm focus:outline-none">
                        {!! old('overview', '<p>Write detailed overview of the trek here...</p>') !!}
                    </div>
                    
                    <!-- Hidden Input -->
                    <textarea id="overview" name="overview" class="hidden">{{ old('overview') }}</textarea>
                </div>
                <div class="flex justify-between mt-1">
                    <p class="text-xs" style="color: #6D6E70;">Detailed description with formatting</p>
                    <span id="overview_count" class="text-xs" style="color: #6D6E70;">0 words</span>
                </div>
                @error('overview')
                    <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Media -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold mb-4" style="color: #052734;">Media</h3>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Main Image -->
                <div>
                    <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Main Image *</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-[#005991] transition-colors cursor-pointer"
                         @click="$refs.mainImage.click()">
                        <input type="file" id="main_image" name="main_image" x-ref="mainImage" class="hidden" @change="previewImage($event)">
                        <svg class="w-12 h-12 mx-auto mb-3" style="color: #6D6E70;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-sm" style="color: #052734;">Click to upload image</p>
                        <p class="text-xs mt-1" style="color: #6D6E70;">PNG, JPG, WebP up to 5MB</p>
                    </div>
                    
                    <!-- Image Preview -->
                    <div x-show="imagePreview" class="mt-4">
                        <img :src="imagePreview" class="w-full h-48 object-cover rounded-lg">
                    </div>
                    
                    @error('main_image')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Alt Text -->
                <div>
                    <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Image Alt Text</label>
                    <input type="text" name="image_alt" value="{{ old('image_alt') }}" 
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:border-transparent text-sm" 
                           style="--tw-ring-color: #005991;" 
                           placeholder="Everest Base Camp trekking group at Kala Patthar">
                    <p class="text-xs mt-1" style="color: #6D6E70;">For SEO and accessibility</p>
                    @error('image_alt')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Video URL -->
                <div class="lg:col-span-2">
                    <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Video URL</label>
                    <input type="url" name="video_url" value="{{ old('video_url') }}" 
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:border-transparent text-sm" 
                           style="--tw-ring-color: #005991;" 
                           placeholder="https://youtube.com/embed/...">
                    <p class="text-xs mt-1" style="color: #6D6E70;">YouTube or Vimeo embed URL</p>
                    @error('video_url')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- SEO Settings -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold mb-4" style="color: #052734;">SEO Settings</h3>
            <div class="space-y-6">
                <!-- Meta Title -->
                <div>
                    <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title') }}" maxlength="60" 
                           x-model="metaTitle" @input="updateMetaTitleCount"
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:border-transparent text-sm" 
                           style="--tw-ring-color: #005991;" 
                           placeholder="Everest Base Camp Trek - 14 Days Himalayan Adventure">
                    <div class="flex justify-between mt-1">
                        <p class="text-xs" style="color: #6D6E70;">Recommended: 50-60 characters</p>
                        <span id="meta_title_count" class="text-xs" style="color: #6D6E70;">0/60</span>
                    </div>
                    @error('meta_title')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Description -->
                <div>
                    <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Meta Description</label>
                    <textarea name="meta_description" rows="3" 
                              x-model="metaDescription" @input="updateMetaDescriptionCount"
                              class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:border-transparent text-sm" 
                              style="--tw-ring-color: #005991;" 
                              placeholder="Experience the ultimate Himalayan adventure with our 14-day Everest Base Camp Trek. Join expert guides, stay at comfortable tea houses, and witness breathtaking views of the world's highest peaks.">{{ old('meta_description') }}</textarea>
                    <div class="flex justify-between mt-1">
                        <p class="text-xs" style="color: #6D6E70;">Recommended: 150-160 characters</p>
                        <span id="meta_description_count" class="text-xs" style="color: #6D6E70;">0/160</span>
                    </div>
                    @error('meta_description')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Keywords -->
                <div>
                    <label class="block text-xs font-medium mb-2" style="color: #6D6E70;">Meta Keywords</label>
                    <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" 
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:border-transparent text-sm" 
                           style="--tw-ring-color: #005991;" 
                           placeholder="everest base camp, trekking nepal, himalayan adventure, kalapatthar">
                    <p class="text-xs mt-1" style="color: #6D6E70;">Separate keywords with commas</p>
                    @error('meta_keywords')
                        <p class="mt-2 text-sm" style="color: #C9302C;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center gap-3 p-6 bg-white rounded-xl shadow-sm border border-gray-100">
            <button type="button" onclick="window.location.href='{{ route('admin.treks.index') }}'" 
                    class="flex-1 px-4 py-3 border border-gray-300 rounded-lg font-medium transition-all hover:bg-gray-50" 
                    style="color: #052734;">
                Cancel
            </button>
            <button type="submit" 
                    class="flex-1 px-4 py-3 text-white font-medium rounded-lg transition-all hover:opacity-90" 
                    style="background-color: #005991;">
                Create Trek
            </button>
        </div>
    </form>
</div>

<script>
function trekForm() {
    return {
        difficulty: '{{ old("difficulty", "moderate") }}',
        shortDesc: '{{ old("short_desc") }}',
        metaTitle: '{{ old("meta_title") }}',
        metaDescription: '{{ old("meta_description") }}',
        imagePreview: null,
        
        // WYSIWYG Editor Functions
        execCommand(command, value = null) {
            document.getElementById('overview_content').focus();
            if (command === 'createLink' && value) {
                document.execCommand(command, false, value);
            } else if (command === 'formatBlock') {
                document.execCommand(command, false, value);
            } else {
                document.execCommand(command, false, null);
            }
            this.updateOverviewContent();
        },
        
        insertLink() {
            const url = prompt('Enter URL:');
            if (url) {
                this.execCommand('createLink', url);
            }
        },
        
        updateOverviewContent() {
            const content = document.getElementById('overview_content').innerHTML;
            document.getElementById('overview').value = content;
            this.updateWordCount();
        },
        
        updateWordCount() {
            const content = document.getElementById('overview_content');
            const text = content.textContent || content.innerText;
            const words = text.trim().split(/\s+/).filter(word => word.length > 0);
            document.getElementById('overview_count').textContent = `${words.length} words`;
        },
        
        // Format text for short description
        formatText(field, format) {
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
            }
            
            textarea.value = textarea.value.substring(0, start) + formattedText + textarea.value.substring(end);
            this.updateShortDescCount();
        },
        
        updateShortDescCount() {
            const textarea = document.getElementById('short_desc');
            const counter = document.getElementById('short_desc_count');
            const length = textarea.value.length;
            counter.textContent = `${length}/250`;
            
            if (length > 250) {
                counter.style.color = '#C9302C';
            } else {
                counter.style.color = '#6D6E70';
            }
        },
        
        updateMetaTitleCount() {
            const counter = document.getElementById('meta_title_count');
            counter.textContent = `${this.metaTitle.length}/60`;
            
            if (this.metaTitle.length > 60) {
                counter.style.color = '#C9302C';
            } else {
                counter.style.color = '#6D6E70';
            }
        },
        
        updateMetaDescriptionCount() {
            const counter = document.getElementById('meta_description_count');
            counter.textContent = `${this.metaDescription.length}/160`;
            
            if (this.metaDescription.length > 160) {
                counter.style.color = '#C9302C';
            } else {
                counter.style.color = '#6D6E70';
            }
        },
        
        // Image preview
        previewImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = (e) => {
                    this.imagePreview = e.target.result;
                };
                
                reader.readAsDataURL(input.files[0]);
            }
        },
        
        // Auto-generate slug from title
        initSlugGenerator() {
            const titleInput = document.querySelector('input[name="title"]');
            const slugInput = document.querySelector('input[name="slug"]');
            
            if (titleInput && slugInput) {
                titleInput.addEventListener('input', () => {
                    if (!slugInput.dataset.manual) {
                        const slug = titleInput.value
                            .toLowerCase()
                            .replace(/[^\w\s-]/g, '')
                            .replace(/\s+/g, '-')
                            .replace(/--+/g, '-')
                            .trim();
                        slugInput.value = slug;
                    }
                });
                
                slugInput.addEventListener('input', () => {
                    slugInput.dataset.manual = true;
                });
            }
        }
    };
}

// Initialize on page load
document.addEventListener('alpine:init', () => {
    Alpine.data('trekForm', trekForm);
    
    // Initialize slug generator
    const titleInput = document.querySelector('input[name="title"]');
    const slugInput = document.querySelector('input[name="slug"]');
    
    if (titleInput && slugInput) {
        titleInput.addEventListener('input', () => {
            if (!slugInput.dataset.manual) {
                const slug = titleInput.value
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/--+/g, '-')
                    .trim();
                slugInput.value = slug;
            }
        });
        
        slugInput.addEventListener('input', () => {
            slugInput.dataset.manual = true;
        });
    }
});
</script>

<style>
/* Rich Text Editor Styles */
#overview_content:focus {
    outline: none;
}

#overview_content h2 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
    color: #052734;
}

#overview_content h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-top: 1.25rem;
    margin-bottom: 0.5rem;
    color: #052734;
}

#overview_content p {
    margin-bottom: 1rem;
    line-height: 1.6;
}

#overview_content ul {
    list-style-type: disc;
    padding-left: 1.5rem;
    margin-bottom: 1rem;
}

#overview_content ol {
    list-style-type: decimal;
    padding-left: 1.5rem;
    margin-bottom: 1rem;
}

#overview_content li {
    margin-bottom: 0.25rem;
}

#overview_content a {
    color: #005991;
    text-decoration: underline;
}

#overview_content a:hover {
    color: #052734;
}

#overview_content strong {
    font-weight: 600;
    color: #052734;
}

#overview_content em {
    font-style: italic;
}

/* Custom scrollbar for editor */
#overview_content::-webkit-scrollbar {
    width: 6px;
}

#overview_content::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

#overview_content::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 10px;
}

#overview_content::-webkit-scrollbar-thumb:hover {
    background: #a1a1a1;
}
</style>
@endsection