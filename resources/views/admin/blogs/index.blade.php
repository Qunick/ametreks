@extends('admin.layouts')

@section('title', 'Manage Blogs')

@section('content')
<div x-data="blogsManager()" class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold" style="color: #052734;">Manage Blogs</h1>
            <p class="text-sm mt-1" style="color: #6D6E70;">Create and manage blog articles</p>
        </div>
        <button @click="openAddDrawer()" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-white font-medium rounded-lg transition-all hover:opacity-90 shadow-lg hover:shadow-xl" style="background-color: #005991;">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            New Blog
        </button>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(0, 89, 145, 0.1);">
                    <svg class="w-5 h-5" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.801 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.801 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Total Articles</p>
                    <p class="text-xl font-bold" style="color: #052734;">{{ $stats['total'] ?? 48 }}</p>
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
                    <p class="text-xs font-medium" style="color: #6D6E70;">Published</p>
                    <p class="text-xl font-bold" style="color: #99C723;">{{ $stats['published'] ?? 36 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(255, 193, 7, 0.1);">
                    <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Draft</p>
                    <p class="text-xl font-bold text-yellow-600">{{ $stats['draft'] ?? 8 }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(77, 139, 178, 0.1);">
                    <svg class="w-5 h-5" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #6D6E70;">Featured</p>
                    <p class="text-xl font-bold" style="color: #4D8BB2;">{{ $stats['featured'] ?? 12 }}</p>
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
                <input type="text" x-model="searchQuery" placeholder="Search by title, author, content..." class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 text-sm" style="--tw-ring-color: #005991;">
            </div>
            
            <!-- Status Filter -->
            <div class="flex flex-wrap gap-2">
                <template x-for="status in statuses" :key="status.value">
                    <button @click="activeStatus = status.value" :class="activeStatus === status.value ? 'text-white' : 'bg-gray-100 hover:bg-gray-200'" :style="activeStatus === status.value ? 'background-color: ' + status.color : 'color: #052734'" class="px-4 py-2 rounded-lg text-sm font-medium transition-all">
                        <span x-text="status.label"></span>
                    </button>
                </template>
            </div>

            <!-- Category Filter -->
            <div>
                <select x-model="selectedCategory" class="px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 w-full lg:w-auto" style="--tw-ring-color: #005991; color: #052734;">
                    <option value="">All Categories</option>
                    <option value="trekking">Trekking</option>
                    <option value="expedition">Expedition</option>
                    <option value="travel-tips">Travel Tips</option>
                    <option value="gear-guides">Gear Guides</option>
                    <option value="sustainability">Sustainability</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Blogs Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead style="background-color: #052734;">
                    <tr>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Article</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Author</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Category</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Date</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Views</th>
                        <th class="text-left text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Status</th>
                        <th class="text-center text-xs font-semibold text-white uppercase tracking-wider px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php
                        $sampleBlogs = $blogs ?? collect([
                            (object)[
                                'id' => 1,
                                'title' => 'Everest Base Camp Trek: A Complete Guide',
                                'excerpt' => 'Everything you need to know about trekking to Everest Base Camp',
                                'image' => 'https://images.unsplash.com/photo-1581779166116-e72e7c510541',
                                'author_name' => 'Sarah Johnson',
                                'author_role' => 'Lead Guide',
                                'category' => 'trekking',
                                'date' => 'Mar 15, 2024',
                                'views' => 2450,
                                'status' => 'published',
                                'featured' => true
                            ],
                            (object)[
                                'id' => 2,
                                'title' => 'Packing List for Annapurna Circuit',
                                'excerpt' => 'Essential gear and clothing for your Annapurna adventure',
                                'image' => 'https://images.unsplash.com/photo-1551632811-561732d1e306',
                                'author_name' => 'Mike Williams',
                                'author_role' => 'Equipment Specialist',
                                'category' => 'gear-guides',
                                'date' => 'Mar 10, 2024',
                                'views' => 1820,
                                'status' => 'published',
                                'featured' => true
                            ],
                            (object)[
                                'id' => 3,
                                'title' => 'Sustainable Trekking Practices',
                                'excerpt' => 'How to minimize your environmental impact while trekking',
                                'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5',
                                'author_name' => 'Emma Davis',
                                'author_role' => 'Sustainability Coordinator',
                                'category' => 'sustainability',
                                'date' => 'Mar 5, 2024',
                                'views' => 1560,
                                'status' => 'published',
                                'featured' => false
                            ],
                            (object)[
                                'id' => 4,
                                'title' => 'High Altitude Acclimatization Tips',
                                'excerpt' => 'Understanding and preparing for high altitude challenges',
                                'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4',
                                'author_name' => 'Dr. Robert Chen',
                                'author_role' => 'Medical Advisor',
                                'category' => 'travel-tips',
                                'date' => 'Feb 28, 2024',
                                'views' => 3120,
                                'status' => 'published',
                                'featured' => true
                            ],
                            (object)[
                                'id' => 5,
                                'title' => 'Langtang Valley: The Hidden Gem',
                                'excerpt' => 'Exploring the beautiful Langtang region of Nepal',
                                'image' => 'https://images.unsplash.com/photo-1519681393784-d120267933ba',
                                'author_name' => 'Alex Thompson',
                                'author_role' => 'Tour Leader',
                                'category' => 'trekking',
                                'date' => 'Feb 20, 2024',
                                'views' => 890,
                                'status' => 'draft',
                                'featured' => false
                            ]
                        ]);
                    @endphp

                    @forelse($sampleBlogs as $blog)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-lg overflow-hidden flex-shrink-0">
                                    <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="text-sm font-medium" style="color: #052734;">
                                        {{ $blog->title }}
                                        @if($blog->featured)
                                        <span class="inline-flex items-center gap-1 ml-2 px-2 py-0.5 rounded-full text-xs font-medium" style="background-color: rgba(77, 139, 178, 0.1); color: #4D8BB2;">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            Featured
                                        </span>
                                        @endif
                                    </p>
                                    <p class="text-xs mt-1" style="color: #6D6E70; max-width: 300px;">{{ Str::limit($blog->excerpt, 60) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xs font-semibold" style="background-color: #4D8BB2;">
                                    {{ substr($blog->author_name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-medium" style="color: #052734;">{{ $blog->author_name }}</p>
                                    <p class="text-xs" style="color: #6D6E70;">{{ $blog->author_role }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium capitalize" 
                                  style="background-color: rgba(0, 89, 145, 0.1); color: #005991;">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                {{ $blog->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm" style="color: #052734;">{{ $blog->date }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" style="color: #6D6E70;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <span class="text-sm font-medium" style="color: #052734;">{{ number_format($blog->views) }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @php $status = $blog->status ?? 'published'; @endphp
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium
                                @if($status == 'draft') bg-yellow-100 text-yellow-700
                                @elseif($status == 'published') text-white
                                @else bg-red-100 text-red-700
                                @endif"
                                @if($status == 'published') style="background-color: #99C723;"
                                @endif>
                                <span class="w-1.5 h-1.5 rounded-full 
                                    @if($status == 'draft') bg-yellow-500
                                    @elseif($status == 'published') bg-white
                                    @else bg-red-500
                                    @endif"></span>
                                {{ ucfirst($status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-1">
                                <a href="{{ route('blog.show', $blog->id) }}" target="_blank" class="p-2 rounded-lg hover:bg-gray-100 transition-colors" title="View">
                                    <svg class="w-4 h-4" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                <button @click="editBlog({{ $blog->id }})" class="p-2 rounded-lg hover:bg-gray-100 transition-colors" title="Edit">
                                    <svg class="w-4 h-4" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <button @click="toggleFeature({{ $blog->id }})" class="p-2 rounded-lg hover:bg-purple-50 transition-colors" title="{{ $blog->featured ? 'Remove Feature' : 'Mark as Featured' }}">
                                    <svg class="w-4 h-4" style="color: {{ $blog->featured ? '#9C27B0' : '#6D6E70' }};" fill="{{ $blog->featured ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                    </svg>
                                </button>
                                <button @click="confirmDelete({{ $blog->id }})" class="p-2 rounded-lg hover:bg-red-50 transition-colors" title="Delete">
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.801 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.801 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/>
                                </svg>
                                <p class="text-lg font-semibold text-gray-500">No blog articles found</p>
                                <p class="text-sm text-gray-400 mt-1">Start by creating your first blog post</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-white rounded-xl shadow-sm border border-gray-100 px-6 py-4">
        <p class="text-sm" style="color: #6D6E70;">Showing <span class="font-semibold" style="color: #052734;">1-5</span> of <span class="font-semibold" style="color: #052734;">48</span> articles</p>
        <div class="flex items-center gap-2">
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors disabled:opacity-50" style="color: #052734;" disabled>
                Previous
            </button>
            <button class="px-3 py-2 rounded-lg text-sm font-medium text-white" style="background-color: #005991;">1</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">2</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">3</button>
            <span style="color: #6D6E70;">...</span>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">10</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">
                Next
            </button>
        </div>
    </div>

    <!-- Add/Edit Blog Drawer -->
    <div x-show="showAddDrawer" x-cloak class="fixed inset-0 z-50 overflow-hidden" @keydown.escape.window="showAddDrawer = false">
        <div x-show="showAddDrawer" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/50" @click="showAddDrawer = false"></div>
        
        <div x-show="showAddDrawer" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition-transform ease-in duration-200" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="absolute inset-y-0 right-0 w-full max-w-2xl bg-white shadow-2xl flex flex-col">
            <!-- Drawer Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100" style="background-color: #052734;">
                <div>
                    <h2 class="text-lg font-semibold text-white" x-text="editMode ? 'Edit Blog Article' : 'Create New Blog Article'"></h2>
                    <p class="text-sm text-white/70" x-text="editMode ? 'Update blog article details' : 'Write a new blog article'"></p>
                </div>
                <button @click="showAddDrawer = false" class="p-2 rounded-lg hover:bg-white/10 transition-colors">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Drawer Content -->
            <div class="flex-1 overflow-y-auto p-6">
                <form @submit.prevent="submitBlog()" class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Article Title *</label>
                        <input type="text" x-model="form.title" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;" placeholder="Enter article title">
                    </div>

                    <!-- Excerpt -->
                    <div>
                        <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Short Description *</label>
                        <textarea x-model="form.excerpt" rows="2" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent resize-none" style="--tw-ring-color: #005991;" placeholder="Brief description of the article"></textarea>
                    </div>

                    <!-- Featured Image -->
                    <div>
                        <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Featured Image *</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                            <div x-show="!form.featured_image" class="py-8">
                                <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <p class="mt-2 text-sm text-gray-600">Drag and drop an image, or click to browse</p>
                                <p class="text-xs text-gray-500 mt-1">Recommended: 1200x630px, JPG or PNG</p>
                            </div>
                            <div x-show="form.featured_image" class="relative">
                                <img :src="form.featured_image" alt="Featured Image" class="w-full h-48 object-cover rounded-lg">
                                <button @click="form.featured_image = ''" type="button" class="absolute top-2 right-2 p-1 bg-red-500 text-white rounded-full hover:bg-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                            <input type="file" accept="image/*" class="hidden" @change="handleImageUpload($event)">
                            <button type="button" @click="$el.previousElementSibling.click()" class="mt-4 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-sm font-medium transition-colors" style="color: #052734;">
                                Choose Image
                            </button>
                        </div>
                    </div>

                    <!-- Category & Tags -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Category *</label>
                            <select x-model="form.category" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;">
                                <option value="">Select Category</option>
                                <option value="trekking">Trekking</option>
                                <option value="expedition">Expedition</option>
                                <option value="travel-tips">Travel Tips</option>
                                <option value="gear-guides">Gear Guides</option>
                                <option value="sustainability">Sustainability</option>
                                <option value="culture">Local Culture</option>
                                <option value="adventure">Adventure Stories</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Tags</label>
                            <input type="text" x-model="form.tagsInput" @keydown.enter.prevent="addTag()" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;" placeholder="Press Enter to add tags">
                            <div class="flex flex-wrap gap-1 mt-2">
                                <template x-for="(tag, index) in form.tags" :key="index">
                                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs" style="background-color: rgba(0, 89, 145, 0.1); color: #005991;">
                                        <span x-text="tag"></span>
                                        <button type="button" @click="removeTag(index)" class="text-gray-500 hover:text-gray-700">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Author -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Author Name *</label>
                            <input type="text" x-model="form.author_name" required class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;" placeholder="Author name">
                        </div>
                        <div>
                            <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Author Role</label>
                            <input type="text" x-model="form.author_role" class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent" style="--tw-ring-color: #005991;" placeholder="e.g., Lead Guide, Editor">
                        </div>
                    </div>

                    <!-- Content -->
                    <div>
                        <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Article Content *</label>
                        <div class="border border-gray-200 rounded-lg overflow-hidden">
                            <!-- Simple WYSIWYG Toolbar -->
                            <div class="bg-gray-50 border-b border-gray-200 p-2 flex items-center gap-1">
                                <button type="button" class="p-2 rounded hover:bg-gray-200" title="Bold">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </button>
                                <button type="button" class="p-2 rounded hover:bg-gray-200" title="Italic">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                                    </svg>
                                </button>
                                <button type="button" class="p-2 rounded hover:bg-gray-200" title="List">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                                    </svg>
                                </button>
                            </div>
                            <textarea x-model="form.content" rows="12" required class="w-full px-3 py-3 border-none text-sm focus:outline-none resize-none" placeholder="Write your article content here..."></textarea>
                        </div>
                    </div>

                    <!-- SEO Settings -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="text-sm font-semibold mb-3" style="color: #052734;">SEO Settings</h4>
                        <div class="space-y-3">
                            <div>
                                <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">SEO Title</label>
                                <input type="text" x-model="form.seo_title" class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-1 focus:border-transparent" style="--tw-ring-color: #005991;">
                            </div>
                            <div>
                                <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Meta Description</label>
                                <textarea x-model="form.meta_description" rows="2" class="w-full px-3 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:ring-1 focus:border-transparent resize-none" style="--tw-ring-color: #005991;"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Status & Featured -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium mb-1.5" style="color: #6D6E70;">Status *</label>
                            <div class="flex gap-2">
                                <label class="flex items-center gap-2 p-2 border rounded-lg cursor-pointer" :class="form.status === 'draft' ? 'border-yellow-400 bg-yellow-50' : 'border-gray-200'">
                                    <input type="radio" x-model="form.status" value="draft" name="status" class="w-4 h-4" style="accent-color: #F59E0B;">
                                    <span class="text-sm" style="color: #052734;">Draft</span>
                                </label>
                                <label class="flex items-center gap-2 p-2 border rounded-lg cursor-pointer" :class="form.status === 'published' ? 'border-green-400 bg-green-50' : 'border-gray-200'">
                                    <input type="radio" x-model="form.status" value="published" name="status" class="w-4 h-4" style="accent-color: #99C723;">
                                    <span class="text-sm" style="color: #052734;">Publish</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="flex items-center gap-2 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" x-model="form.featured" class="w-4 h-4" style="accent-color: #4D8BB2;">
                                <div>
                                    <p class="text-sm font-medium" style="color: #052734;">Featured Article</p>
                                    <p class="text-xs" style="color: #6D6E70;">Display on homepage</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Drawer Footer -->
            <div class="flex items-center gap-3 px-6 py-4 border-t border-gray-100 bg-gray-50">
                <button @click="showAddDrawer = false" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-all border border-gray-300 hover:bg-gray-100" style="color: #052734;">
                    Cancel
                </button>
                <button @click="submitBlog()" class="flex-1 px-4 py-2.5 rounded-lg text-white font-medium transition-all hover:opacity-90" style="background-color: #005991;">
                    <span x-text="editMode ? 'Update Article' : 'Publish Article'"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" @keydown.escape.window="showDeleteModal = false">
        <div x-show="showDeleteModal" x-transition:enter="transition-opacity ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/50" @click="showDeleteModal = false"></div>
        
        <div x-show="showDeleteModal" x-transition:enter="transition-all ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full p-6">
            <div class="text-center">
                <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: rgba(201, 48, 44, 0.1);">
                    <svg class="w-8 h-8" style="color: #C9302C;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2" style="color: #052734;">Delete Article?</h3>
                <p class="text-sm mb-6" style="color: #6D6E70;">Are you sure you want to delete this blog article? This action cannot be undone.</p>
                <div class="flex items-center gap-3">
                    <button @click="showDeleteModal = false" class="flex-1 px-4 py-2.5 rounded-lg font-medium transition-all border border-gray-300 hover:bg-gray-100" style="color: #052734;">
                        Cancel
                    </button>
                    <button @click="deleteBlog()" class="flex-1 px-4 py-2.5 rounded-lg text-white font-medium transition-all hover:opacity-90" style="background-color: #C9302C;">
                        Yes, Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function blogsManager() {
    return {
        searchQuery: '',
        activeStatus: 'all',
        selectedCategory: '',
        showAddDrawer: false,
        showDeleteModal: false,
        editMode: false,
        selectedBlogId: null,
        statuses: [
            { value: 'all', label: 'All', color: '#005991' },
            { value: 'published', label: 'Published', color: '#99C723' },
            { value: 'draft', label: 'Draft', color: '#F59E0B' }
        ],
        form: {
            title: '',
            excerpt: '',
            featured_image: '',
            category: '',
            tags: [],
            tagsInput: '',
            author_name: '',
            author_role: '',
            content: '',
            seo_title: '',
            meta_description: '',
            status: 'draft',
            featured: false
        },
        
        openAddDrawer() {
            this.editMode = false;
            this.resetForm();
            this.showAddDrawer = true;
        },
        
        editBlog(id) {
            this.editMode = true;
            this.selectedBlogId = id;
            
            // In real app, fetch blog data and populate form
            // For demo, populate with sample data
            const sampleData = {
                title: 'Sample Blog Article',
                excerpt: 'This is a sample blog article for editing.',
                featured_image: 'https://images.unsplash.com/photo-1581779166116-e72e7c510541',
                category: 'trekking',
                tags: ['everest', 'trekking', 'adventure'],
                author_name: 'John Doe',
                author_role: 'Editor',
                content: 'Sample content here...',
                seo_title: 'Sample SEO Title',
                meta_description: 'Sample meta description',
                status: 'published',
                featured: true
            };
            
            this.form = { ...this.form, ...sampleData };
            this.form.tagsInput = '';
            this.showAddDrawer = true;
        },
        
        toggleFeature(id) {
            // In real app, send request to toggle featured status
            console.log('Toggle feature for blog:', id);
        },
        
        confirmDelete(id) {
            this.selectedBlogId = id;
            this.showDeleteModal = true;
        },
        
        deleteBlog() {
            // In real app, send delete request to server
            console.log('Delete blog:', this.selectedBlogId);
            this.showDeleteModal = false;
            // Show success notification
        },
        
        submitBlog() {
            // In real app, send form data to server
            console.log('Submit blog:', this.form);
            this.showAddDrawer = false;
            this.resetForm();
            // Show success notification
        },
        
        addTag() {
            if (this.form.tagsInput.trim()) {
                this.form.tags.push(this.form.tagsInput.trim());
                this.form.tagsInput = '';
            }
        },
        
        removeTag(index) {
            this.form.tags.splice(index, 1);
        },
        
        handleImageUpload(event) {
            const file = event.target.files[0];
            if (file) {
                // In real app, upload file to server and get URL
                // For demo, create object URL
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.form.featured_image = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        
        resetForm() {
            this.form = {
                title: '',
                excerpt: '',
                featured_image: '',
                category: '',
                tags: [],
                tagsInput: '',
                author_name: '',
                author_role: '',
                content: '',
                seo_title: '',
                meta_description: '',
                status: 'draft',
                featured: false
            };
        }
    }
}
</script>
@endsection