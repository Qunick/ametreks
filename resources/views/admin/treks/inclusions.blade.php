@extends('admin.layouts')

@section('title', 'Trip Inclusions - ' . $trek->title)

@section('content')
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Trip Inclusions</h2>
                <div class="flex items-center gap-2 mt-1">
                    <p class="text-gray-500">{{ $trek->title }}</p>
                    <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded-full">
                        {{ $inclusions->count() }} items
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.treks.index') }}" 
                   class="text-gray-600 hover:text-gray-800 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Tours
                </a>
                <button onclick="openAddModal()"
                        class="bg-gradient-to-r from-green-600 to-emerald-600 text-white px-5 py-2.5 rounded-xl hover:from-green-700 hover:to-emerald-700 transition flex items-center shadow-lg">
                    <i class="fas fa-plus mr-2"></i> Add Inclusion
                </button>
            </div>
        </div>
    </div>

    <div class="p-6">
        @if($inclusions->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($inclusions as $inclusion)
            <div class="bg-green-50/50 border border-green-100 rounded-2xl p-6 hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-start">
                        <div class="bg-green-100 text-green-600 p-3 rounded-xl mr-4">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">{{ $inclusion->title }}</h3>
                            @if($inclusion->description)
                            <p class="text-gray-600 mt-2">{{ $inclusion->description }}</p>
                            @endif
                        </div>
                    </div>
                    <form action="{{ route('admin.treks.inclusions.destroy', [$trek, $inclusion]) }}" 
                          method="POST" 
                          onsubmit="return confirm('Delete this inclusion?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="text-red-500 hover:text-red-700 p-2 rounded-lg hover:bg-red-50 transition-colors">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                
                <div class="flex items-center text-sm text-gray-500">
                    <i class="fas fa-sort mr-1"></i>
                    Order: {{ $inclusion->sort_order + 1 }}
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <div class="text-gray-400 mb-4">
                <i class="fas fa-check-circle text-4xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-600 mb-2">No inclusions added yet</h3>
            <p class="text-gray-500 mb-4">Add what's included in the tour package</p>
            <button onclick="openAddModal()"
                    class="bg-gradient-to-r from-green-600 to-emerald-600 text-white px-5 py-2.5 rounded-xl hover:from-green-700 hover:to-emerald-700 transition flex items-center mx-auto shadow-lg">
                <i class="fas fa-plus mr-2"></i> Add First Inclusion
            </button>
        </div>
        @endif
    </div>
</div>

{{-- Add Modal --}}
<div id="addModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full">
        <form action="{{ route('admin.treks.inclusions.store', $trek) }}" method="POST" class="p-6">
            @csrf
            
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Add Inclusion</h3>
                <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" 
                           name="title" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent"
                           placeholder="e.g., Accommodation, Meals, Guide..."
                           required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description (optional)</label>
                    <textarea name="description" 
                              rows="3"
                              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent"
                              placeholder="Additional details..."></textarea>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 pt-6 mt-6 border-t">
                <button type="button" 
                        onclick="closeModal()"
                        class="px-4 py-2.5 border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">
                    Cancel
                </button>
                <button type="submit" 
                        class="bg-green-600 text-white px-4 py-2.5 rounded-xl hover:bg-green-700 transition-colors">
                    Add Inclusion
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openAddModal() {
    document.getElementById('addModal').classList.remove('hidden');
    document.getElementById('addModal').classList.add('flex');
}

function closeModal() {
    document.getElementById('addModal').classList.add('hidden');
    document.getElementById('addModal').classList.remove('flex');
}

// Close modal on outside click
document.getElementById('addModal').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});
</script>
@endsection