@extends('admin.layouts')

@section('title', 'Tours & Treks')
@section('page-title', 'Tours & Treks')
@section('page-subtitle', 'Create, edit, and manage your trekking tours')

@section('content')
<div id="tours" class="tab-content">
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="p-6 border-b flex justify-between items-center">
            <div>
                <h3 class="text-xl font-semibold text-gray-800">Manage Tours & Treks</h3>
                <p class="text-gray-500 text-sm mt-1">Create, edit, and manage your trekking tours</p>
            </div>
            <a href="{{ route('admin.treks.create') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2.5 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition flex items-center shadow">
                <i class="fas fa-plus mr-2"></i> Add New Tour
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Tour Name</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Region</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Duration</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Price</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Bookings</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($treks as $trek)
                    <tr class="table-row-hover">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="bg-blue-50 p-2 rounded-lg mr-3">
                                    <i class="fas fa-mountain text-blue-500"></i>
                                </div>
                                <div>
                                    <p class="font-medium">{{ $trek->title }}</p>
                                    <p class="text-sm text-gray-500">{{ $trek->region ?? 'N/A' }} • {{ $trek->difficulty ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ $trek->region ?? '-' }}</td>
                        <td class="px-6 py-4 font-medium">{{ $trek->duration_days ?? '-' }} days</td>
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-800">{{ $trek->currency }} {{ number_format($trek->base_price ?? 0, 2) }}</span>
                        </td>
                        <td class="px-6 py-4 flex items-center">
                            <form action="{{ route('admin.treks.toggle', $trek->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="toggle-switch {{ $trek->is_active ? 'active' : '' }}">
                                    <span class="toggle-slider"></span>
                                </button>
                            </form>
                            <span class="text-sm {{ $trek->is_active ? 'text-green-600' : 'text-red-600' }} ml-2">
                                {{ $trek->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-medium">{{ $trek->bookings_count ?? 0 }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.treks.edit', $trek->id) }}" class="bg-blue-50 text-blue-600 p-2 rounded-lg hover:bg-blue-100 transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.treks.destroy', $trek->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-50 text-red-600 p-2 rounded-lg hover:bg-red-100 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">No tours found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="p-4 border-t bg-gray-50 flex justify-between items-center">
            <p class="text-sm text-gray-500">Showing {{ $treks->firstItem() ?? 0 }} of {{ $treks->total() ?? 0 }} tours</p>
            <div class="flex space-x-2">
                {{ $treks->links() }}
            </div>
        </div>
    </div>
</div>

{{-- Optional: Modal for creating/editing tours --}}
@include('admin.partials.modals.tour-modal')
@endsection
