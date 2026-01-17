{{-- resources/views/admin/reviews/index.blade.php --}}
@extends('admin.layouts')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold" style="color: #052734;">Reviews Management</h1>
            <p class="text-sm mt-1" style="color: #6D6E70;">Manage and moderate customer reviews</p>
        </div>
        <div class="flex items-center gap-3">
            {{-- Search --}}
            <div class="relative">
                <input type="text"
                       id="searchInput"
                       placeholder="Search reviews..."
                       class="w-full sm:w-64 pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent transition-all"
                       style="--tw-ring-color: #005991;">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4" style="color: #6D6E70;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            {{-- Export Button --}}
            <button class="hidden sm:flex items-center gap-2 px-4 py-2 border border-gray-200 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors" style="color: #052734;">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Export
            </button>
            {{-- Added Add Review button --}}
            <button onclick="openAddReviewDrawer()"
                    class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium text-white shadow-md hover:shadow-lg transition-all"
                    style="background-color: #005991;">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span class="hidden sm:inline">Add Review</span>
            </button>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium" style="color: #6D6E70;">Total Reviews</p>
                    <p class="text-2xl font-bold mt-1" style="color: #052734;">{{ $reviews->total() ?? 0 }}</p>
                </div>
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(0, 89, 145, 0.1);">
                    <svg class="w-5 h-5" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium" style="color: #6D6E70;">Pending</p>
                    <p class="text-2xl font-bold mt-1" style="color: #052734;">{{ $pendingCount ?? 0 }}</p>
                </div>
                <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-yellow-50">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium" style="color: #6D6E70;">Approved</p>
                    <p class="text-2xl font-bold mt-1" style="color: #99C723;">{{ $approvedCount ?? 0 }}</p>
                </div>
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(153, 199, 35, 0.1);">
                    <svg class="w-5 h-5" style="color: #99C723;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium" style="color: #6D6E70;">Rejected</p>
                    <p class="text-2xl font-bold mt-1" style="color: #C9302C;">{{ $rejectedCount ?? 0 }}</p>
                </div>
                <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(201, 48, 44, 0.1);">
                    <svg class="w-5 h-5" style="color: #C9302C;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Filters --}}
    <div class="flex flex-wrap items-center gap-2 mb-6">
        <span class="text-sm font-medium mr-2" style="color: #6D6E70;">Filter:</span>
        <a href="{{ route('admin.reviews.index') }}?status=all"
           class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ !request('status') || request('status') == 'all' ? 'text-white shadow-md' : 'bg-gray-100 hover:bg-gray-200' }}"
           style="{{ !request('status') || request('status') == 'all' ? 'background-color: #005991;' : 'color: #052734;' }}">
            All Reviews
        </a>
        <a href="{{ route('admin.reviews.index') }}?status=pending"
           class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request('status') == 'pending' ? 'bg-yellow-500 text-white shadow-md' : 'bg-yellow-50 text-yellow-700 hover:bg-yellow-100' }}">
            <span class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full {{ request('status') == 'pending' ? 'bg-white' : 'bg-yellow-500' }}"></span>
                Pending
            </span>
        </a>
        <a href="{{ route('admin.reviews.index') }}?status=approved"
           class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request('status') == 'approved' ? 'text-white shadow-md' : 'hover:opacity-80' }}"
           style="{{ request('status') == 'approved' ? 'background-color: #99C723;' : 'background-color: rgba(153, 199, 35, 0.1); color: #99C723;' }}">
            <span class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full" style="background-color: {{ request('status') == 'approved' ? '#fff' : '#99C723' }};"></span>
                Approved
            </span>
        </a>
        <a href="{{ route('admin.reviews.index') }}?status=rejected"
           class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request('status') == 'rejected' ? 'text-white shadow-md' : 'hover:opacity-80' }}"
           style="{{ request('status') == 'rejected' ? 'background-color: #C9302C;' : 'background-color: rgba(201, 48, 44, 0.1); color: #C9302C;' }}">
            <span class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full" style="background-color: {{ request('status') == 'rejected' ? '#fff' : '#C9302C' }};"></span>
                Rejected
            </span>
        </a>
    </div>

    {{-- Reviews Table --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        {{-- Desktop Table --}}
        <div class="hidden lg:block overflow-x-auto">
            <table class="w-full">
                <thead style="background-color: #f8fbfc;">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider" style="color: #6D6E70;">Reviewer</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider" style="color: #6D6E70;">Trek</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider" style="color: #6D6E70;">Rating</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider" style="color: #6D6E70;">Review</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider" style="color: #6D6E70;">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider" style="color: #6D6E70;">Date</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider" style="color: #6D6E70;">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($reviews as $review)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-semibold text-sm" style="background-color: #005991;">
                                    {{ strtoupper(substr($review->name, 0, 2)) }}
                                </div>
                                <div>
                                    <div class="font-semibold" style="color: #052734;">{{ $review->name }}</div>
                                    <div class="text-sm" style="color: #6D6E70;">{{ $review->email }}</div>
                                    @if($review->location)
                                    <div class="text-xs flex items-center gap-1 mt-0.5" style="color: #4D8BB2;">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        {{ $review->location }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium" style="color: #052734;">{{ $review->trek->name ?? 'N/A' }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 {{ $i < $review->rating ? '' : 'opacity-30' }}" style="color: #f59e0b;" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                                <span class="ml-2 text-sm font-medium" style="color: #052734;">{{ $review->rating }}.0</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 max-w-xs">
                            <p class="text-sm truncate" style="color: #6D6E70;">{{ Str::limit($review->comment, 60) }}</p>
                        </td>
                        <td class="px-6 py-4">
                            @if($review->status == 'pending')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-medium bg-yellow-50 text-yellow-700 rounded-full">
                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                                    Pending
                                </span>
                            @elseif($review->status == 'approved')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-medium rounded-full" style="background-color: rgba(153, 199, 35, 0.1); color: #99C723;">
                                    <span class="w-1.5 h-1.5 rounded-full" style="background-color: #99C723;"></span>
                                    Approved
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-medium rounded-full" style="background-color: rgba(201, 48, 44, 0.1); color: #C9302C;">
                                    <span class="w-1.5 h-1.5 rounded-full" style="background-color: #C9302C;"></span>
                                    Rejected
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm" style="color: #052734;">{{ $review->created_at->format('M d, Y') }}</div>
                            <div class="text-xs" style="color: #6D6E70;">{{ $review->created_at->format('h:i A') }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-1">
                                @if($review->status == 'pending')
                                    <form action="{{ route('admin.reviews.status', $review) }}" method="POST" class="inline">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="p-2 rounded-lg hover:bg-green-50 transition-colors group" title="Approve">
                                            <svg class="w-5 h-5 text-gray-400 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.reviews.status', $review) }}" method="POST" class="inline">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="p-2 rounded-lg hover:bg-red-50 transition-colors group" title="Reject">
                                            <svg class="w-5 h-5 text-gray-400 group-hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                                <button onclick="openReviewDrawer({{ $review->id }})"
                                        class="p-2 rounded-lg hover:bg-blue-50 transition-colors group" title="View Details">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this review?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg hover:bg-red-50 transition-colors group" title="Delete">
                                        <svg class="w-5 h-5 text-gray-400 group-hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <svg class="w-12 h-12 mx-auto mb-4" style="color: #6D6E70;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                            <p class="text-lg font-medium" style="color: #052734;">No reviews found</p>
                            <p class="text-sm mt-1" style="color: #6D6E70;">Reviews will appear here once customers submit them.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Mobile Cards --}}
        <div class="lg:hidden divide-y divide-gray-100">
            @forelse($reviews as $review)
            <div class="p-4">
                <div class="flex items-start justify-between gap-3 mb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-semibold text-sm flex-shrink-0" style="background-color: #005991;">
                            {{ strtoupper(substr($review->name, 0, 2)) }}
                        </div>
                        <div>
                            <div class="font-semibold" style="color: #052734;">{{ $review->name }}</div>
                            <div class="text-xs" style="color: #6D6E70;">{{ $review->created_at->format('M d, Y') }}</div>
                        </div>
                    </div>
                    @if($review->status == 'pending')
                        <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-medium bg-yellow-50 text-yellow-700 rounded-full">
                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                            Pending
                        </span>
                    @elseif($review->status == 'approved')
                        <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-medium rounded-full" style="background-color: rgba(153, 199, 35, 0.1); color: #99C723;">
                            <span class="w-1.5 h-1.5 rounded-full" style="background-color: #99C723;"></span>
                            Approved
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-medium rounded-full" style="background-color: rgba(201, 48, 44, 0.1); color: #C9302C;">
                            <span class="w-1.5 h-1.5 rounded-full" style="background-color: #C9302C;"></span>
                            Rejected
                        </span>
                    @endif
                </div>

                <div class="mb-3">
                    <div class="text-sm font-medium mb-1" style="color: #005991;">{{ $review->trek->name ?? 'N/A' }}</div>
                    <div class="flex items-center gap-1 mb-2">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 {{ $i < $review->rating ? '' : 'opacity-30' }}" style="color: #f59e0b;" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <p class="text-sm line-clamp-2" style="color: #6D6E70;">{{ $review->comment }}</p>
                </div>

                <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                    @if($review->status == 'pending')
                        <form action="{{ route('admin.reviews.status', $review) }}" method="POST" class="flex-1">
                            @csrf @method('PUT')
                            <input type="hidden" name="status" value="approved">
                            <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 text-sm font-medium rounded-lg transition-colors" style="background-color: rgba(153, 199, 35, 0.1); color: #99C723;">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Approve
                            </button>
                        </form>
                        <form action="{{ route('admin.reviews.status', $review) }}" method="POST" class="flex-1">
                            @csrf @method('PUT')
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 text-sm font-medium rounded-lg transition-colors" style="background-color: rgba(201, 48, 44, 0.1); color: #C9302C;">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Reject
                            </button>
                        </form>
                    @endif
                    <button onclick="openReviewDrawer({{ $review->id }})"
                            class="flex-1 flex items-center justify-center gap-2 px-3 py-2 text-sm font-medium rounded-lg transition-colors" style="background-color: rgba(0, 89, 145, 0.1); color: #005991;">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        View
                    </button>
                </div>
            </div>
            @empty
            <div class="px-6 py-12 text-center">
                <svg class="w-12 h-12 mx-auto mb-4" style="color: #6D6E70;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
                <p class="text-lg font-medium" style="color: #052734;">No reviews found</p>
                <p class="text-sm mt-1" style="color: #6D6E70;">Reviews will appear here once customers submit them.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($reviews->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-sm" style="color: #6D6E70;">
                Showing <span class="font-medium" style="color: #052734;">{{ $reviews->firstItem() }}</span> to
                <span class="font-medium" style="color: #052734;">{{ $reviews->lastItem() }}</span> of
                <span class="font-medium" style="color: #052734;">{{ $reviews->total() }}</span> reviews
            </p>
            <div class="flex items-center gap-2">
                {{ $reviews->links() }}
            </div>
        </div>
        @endif
    </div>
</div>

{{-- View Review Drawer --}}
{{-- @include('admin.reviews.partials.show') --}}

{{-- Added Add Review Drawer --}}
{{-- Add Review Drawer --}}
<div id="addReviewDrawer" class="fixed inset-0 z-50 hidden">
    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-black/50 transition-opacity" onclick="closeAddReviewDrawer()"></div>

    {{-- Drawer Panel --}}
    <div class="absolute right-0 top-0 h-full w-full max-w-lg bg-white shadow-2xl transform translate-x-full transition-transform duration-300" id="addReviewPanel">
        {{-- Header --}}
        <div class="sticky top-0 z-10 bg-white border-b border-gray-100 px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold" style="color: #052734;">Add New Review</h2>
                    <p class="text-sm" style="color: #6D6E70;">Create a customer review manually</p>
                </div>
                <button onclick="closeAddReviewDrawer()" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5" style="color: #6D6E70;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Form --}}
        <form action="" method="POST" enctype="multipart/form-data" class="p-6 space-y-5 overflow-y-auto" style="max-height: calc(100vh - 80px);">
            @csrf

            {{-- Customer Info Section --}}
            <div class="space-y-4">
                <h3 class="text-sm font-semibold uppercase tracking-wider" style="color: #6D6E70;">Customer Information</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1.5" style="color: #052734;">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" required
                               class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent transition-all"
                               style="--tw-ring-color: #005991;"
                               placeholder="John Doe">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1.5" style="color: #052734;">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" name="email" required
                               class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent transition-all"
                               style="--tw-ring-color: #005991;"
                               placeholder="john@example.com">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1.5" style="color: #052734;">Phone Number</label>
                        <input type="tel" name="phone"
                               class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent transition-all"
                               style="--tw-ring-color: #005991;"
                               placeholder="+1 234 567 890">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1.5" style="color: #052734;">Location</label>
                        <input type="text" name="location"
                               class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent transition-all"
                               style="--tw-ring-color: #005991;"
                               placeholder="New York, USA">
                    </div>
                </div>
            </div>

            {{-- Divider --}}
            <div class="border-t border-gray-100"></div>

            {{-- Trek & Rating Section --}}
            <div class="space-y-4">
                <h3 class="text-sm font-semibold uppercase tracking-wider" style="color: #6D6E70;">Review Details</h3>

                <div>
                    <label class="block text-sm font-medium mb-1.5" style="color: #052734;">Select Trek <span class="text-red-500">*</span></label>
                    <select name="trek_id" required
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent transition-all appearance-none bg-white"
                            style="--tw-ring-color: #005991;">
                        <option value="">Choose a trek...</option>
                        @foreach($treks ?? [] as $trek)
                            <option value="{{ $trek->id }}">{{ $trek->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2" style="color: #052734;">Rating <span class="text-red-500">*</span></label>
                    <div class="flex items-center gap-1" id="ratingStars">
                        @for($i = 1; $i <= 5; $i++)
                            <button type="button" onclick="setRating({{ $i }})" class="rating-star p-1 transition-transform hover:scale-110">
                                <svg class="w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 20 20" data-star="{{ $i }}">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </button>
                        @endfor
                        <input type="hidden" name="rating" id="ratingInput" value="5" required>
                        <span class="ml-3 text-sm font-medium" style="color: #052734;" id="ratingText">5 Stars</span>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1.5" style="color: #052734;">Review Title</label>
                    <input type="text" name="title"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent transition-all"
                           style="--tw-ring-color: #005991;"
                           placeholder="Amazing trekking experience!">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1.5" style="color: #052734;">Review Comment <span class="text-red-500">*</span></label>
                    <textarea name="comment" rows="4" required
                              class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent transition-all resize-none"
                              style="--tw-ring-color: #005991;"
                              placeholder="Write the customer's review here..."></textarea>
                    <p class="text-xs mt-1" style="color: #6D6E70;">Minimum 20 characters</p>
                </div>
            </div>

            {{-- Divider --}}
            <div class="border-t border-gray-100"></div>

            {{-- Photos Section --}}
            <div class="space-y-4">
                <h3 class="text-sm font-semibold uppercase tracking-wider" style="color: #6D6E70;">Photos (Optional)</h3>

                <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-gray-300 transition-colors" id="dropZone">
                    <input type="file" name="photos[]" multiple accept="image/*" class="hidden" id="photoInput" onchange="handlePhotoUpload(this)">
                    <svg class="w-10 h-10 mx-auto mb-3" style="color: #6D6E70;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-sm font-medium" style="color: #052734;">Drop photos here or <button type="button" onclick="document.getElementById('photoInput').click()" class="underline" style="color: #005991;">browse</button></p>
                    <p class="text-xs mt-1" style="color: #6D6E70;">PNG, JPG up to 5MB each (max 5 photos)</p>
                </div>

                {{-- Photo Preview Grid --}}
                <div id="photoPreview" class="grid grid-cols-3 gap-3 hidden"></div>
            </div>

            {{-- Divider --}}
            <div class="border-t border-gray-100"></div>

            {{-- Status Section --}}
            <div class="space-y-4">
                <h3 class="text-sm font-semibold uppercase tracking-wider" style="color: #6D6E70;">Publication Status</h3>

                <div class="flex flex-wrap gap-3">
                    <label class="flex items-center gap-2 px-4 py-2.5 border-2 rounded-lg cursor-pointer transition-all status-option" data-status="approved">
                        <input type="radio" name="status" value="approved" class="hidden">
                        <span class="w-4 h-4 rounded-full border-2 flex items-center justify-center transition-colors status-radio">
                            <span class="w-2 h-2 rounded-full scale-0 transition-transform status-dot"></span>
                        </span>
                        <span class="text-sm font-medium">Publish Now</span>
                    </label>
                    <label class="flex items-center gap-2 px-4 py-2.5 border-2 rounded-lg cursor-pointer transition-all status-option" data-status="pending">
                        <input type="radio" name="status" value="pending" class="hidden" checked>
                        <span class="w-4 h-4 rounded-full border-2 flex items-center justify-center transition-colors status-radio">
                            <span class="w-2 h-2 rounded-full scale-0 transition-transform status-dot"></span>
                        </span>
                        <span class="text-sm font-medium">Save as Draft</span>
                    </label>
                </div>
            </div>

            {{-- Submit Buttons --}}
            <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="closeAddReviewDrawer()"
                        class="flex-1 px-4 py-3 border border-gray-200 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors"
                        style="color: #052734;">
                    Cancel
                </button>
                <button type="submit"
                        class="flex-1 px-4 py-3 rounded-lg text-sm font-medium text-white shadow-md hover:shadow-lg transition-all"
                        style="background-color: #99C723;">
                    <span class="flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Save Review
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Search functionality
document.getElementById('searchInput').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});

// Review Drawer
function openReviewDrawer(id) {
    const drawer = document.getElementById('reviewDrawer');
    const panel = document.getElementById('drawerPanel');
    const content = document.getElementById('drawerContent');
    const loading = document.getElementById('drawerLoading');

    drawer.classList.remove('hidden');
    document.body.style.overflow = 'hidden';

    // Show loading
    loading.style.display = 'flex';

    // Animate in
    setTimeout(() => {
        panel.classList.remove('translate-x-full');
    }, 10);

    // Fetch content
    fetch(`/admin/reviews/${id}/show`)
        .then(response => response.text())
        .then(html => {
            loading.style.display = 'none';
            content.innerHTML = html;
        })
        .catch(error => {
            loading.style.display = 'none';
            content.innerHTML = `
                <div class="text-center py-12">
                    <svg class="w-12 h-12 mx-auto mb-4" style="color: #C9302C;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p style="color: #052734;">Failed to load review details</p>
                </div>
            `;
        });
}

function closeReviewDrawer() {
    const drawer = document.getElementById('reviewDrawer');
    const panel = document.getElementById('drawerPanel');

    panel.classList.add('translate-x-full');
    document.body.style.overflow = '';

    setTimeout(() => {
        drawer.classList.add('hidden');
        document.getElementById('drawerContent').innerHTML = `
            <div class="flex items-center justify-center h-full" id="drawerLoading">
                <div class="animate-spin rounded-full h-8 w-8 border-2 border-gray-200" style="border-top-color: #005991;"></div>
            </div>
        `;
    }, 300);
}

// Close on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeReviewDrawer();
    }
});


function openAddReviewDrawer() {
    const drawer = document.getElementById('addReviewDrawer');
    const panel = document.getElementById('addReviewPanel');
    drawer.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    setTimeout(() => {
        panel.classList.remove('translate-x-full');
    }, 10);
    // Initialize rating to 5 stars
    setRating(5);
    // Initialize status selection
    updateStatusSelection();
}

function closeAddReviewDrawer() {
    const drawer = document.getElementById('addReviewDrawer');
    const panel = document.getElementById('addReviewPanel');
    panel.classList.add('translate-x-full');
    setTimeout(() => {
        drawer.classList.add('hidden');
        document.body.style.overflow = '';
    }, 300);
}

function setRating(rating) {
    document.getElementById('ratingInput').value = rating;
    document.getElementById('ratingText').textContent = rating + (rating === 1 ? ' Star' : ' Stars');

    const stars = document.querySelectorAll('#ratingStars svg');
    stars.forEach((star, index) => {
        if (index < rating) {
            star.style.color = '#f59e0b';
        } else {
            star.style.color = '#d1d5db';
        }
    });
}

function handlePhotoUpload(input) {
    const preview = document.getElementById('photoPreview');
    preview.innerHTML = '';

    if (input.files && input.files.length > 0) {
        preview.classList.remove('hidden');

        Array.from(input.files).slice(0, 5).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'relative aspect-square rounded-lg overflow-hidden group';
                div.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-full object-cover">
                    <button type="button" onclick="removePhoto(${index})"
                            class="absolute top-1 right-1 w-6 h-6 rounded-full bg-black/60 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                `;
                preview.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    } else {
        preview.classList.add('hidden');
    }
}

function updateStatusSelection() {
    const options = document.querySelectorAll('.status-option');
    options.forEach(option => {
        const input = option.querySelector('input[type="radio"]');
        const radio = option.querySelector('.status-radio');
        const dot = option.querySelector('.status-dot');
        const status = option.dataset.status;

        if (input.checked) {
            if (status === 'approved') {
                option.style.borderColor = '#99C723';
                option.style.backgroundColor = 'rgba(153, 199, 35, 0.05)';
                radio.style.borderColor = '#99C723';
                dot.style.backgroundColor = '#99C723';
            } else {
                option.style.borderColor = '#005991';
                option.style.backgroundColor = 'rgba(0, 89, 145, 0.05)';
                radio.style.borderColor = '#005991';
                dot.style.backgroundColor = '#005991';
            }
            dot.style.transform = 'scale(1)';
        } else {
            option.style.borderColor = '#e5e7eb';
            option.style.backgroundColor = 'transparent';
            radio.style.borderColor = '#d1d5db';
            dot.style.transform = 'scale(0)';
        }
    });
}

// Add event listeners for status options
document.querySelectorAll('.status-option input[type="radio"]').forEach(input => {
    input.addEventListener('change', updateStatusSelection);
});

// Drag and drop for photos
const dropZone = document.getElementById('dropZone');
if (dropZone) {
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('border-blue-400', 'bg-blue-50');
    });
    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('border-blue-400', 'bg-blue-50');
    });
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('border-blue-400', 'bg-blue-50');
        const photoInput = document.getElementById('photoInput');
        photoInput.files = e.dataTransfer.files;
        handlePhotoUpload(photoInput);
    });
}

// Close drawer on Escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeAddReviewDrawer();
    }
});
</script>
@endsection
