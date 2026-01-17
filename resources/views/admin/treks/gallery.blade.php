@extends('admin.layouts')

@section('title', 'Manage Images - ' . $trek->title)

@section('content')
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Manage Images</h2>
                <div class="flex items-center gap-2 mt-1">
                    <p class="text-gray-500">{{ $trek->title }}</p>
                    <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded-full">
                        {{ $images->count() }} images
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.treks.index') }}" 
                   class="text-gray-600 hover:text-gray-800 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Tours
                </a>
            </div>
        </div>
    </div>

    <div class="p-6">
        {{-- Upload Form --}}
        <div class="bg-gray-50 rounded-xl p-6 mb-8">
            <form action="{{ route('admin.treks.images.store', $trek) }}" 
                  method="POST" 
                  enctype="multipart/form-data"
                  class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Upload Images
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-blue-500 transition-colors">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="images" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                                    <span>Upload files</span>
                                    <input id="images" name="images[]" type="file" multiple class="sr-only" accept="image/*">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB each</p>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" 
                            class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2.5 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition flex items-center justify-center shadow-lg">
                        <i class="fas fa-upload mr-2"></i> Upload Images
                    </button>
                </div>
            </form>
        </div>

        {{-- Gallery Grid --}}
        @if($images->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($images as $image)
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="relative">
                    <img src="{{ Storage::url($image->image_path) }}" 
                         alt="{{ $image->alt_text ?? $trek->title }}"
                         class="w-full h-48 object-cover">
                    
                    <div class="absolute top-3 right-3 flex space-x-1">
                        <button onclick="editImage({{ $image->id }}, '{{ $image->alt_text }}')"
                                class="bg-white/90 hover:bg-white text-gray-700 p-2 rounded-lg transition-colors">
                            <i class="fas fa-edit text-sm"></i>
                        </button>
                        
                        <form action="{{ route('admin.treks.images.destroy', [$trek, $image]) }}" 
                              method="POST" 
                              onsubmit="return confirm('Delete this image?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-white/90 hover:bg-white text-red-600 p-2 rounded-lg transition-colors">
                                <i class="fas fa-trash text-sm"></i>
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="p-4">
                    <p class="text-sm text-gray-600 truncate">
                        {{ $image->alt_text ?: 'No alt text' }}
                    </p>
                    <p class="text-xs text-gray-400 mt-1">
                        Order: {{ $image->sort_order + 1 }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <div class="text-gray-400 mb-4">
                <i class="fas fa-images text-4xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-600 mb-2">No images yet</h3>
            <p class="text-gray-500">Upload some images to showcase this tour</p>
        </div>
        @endif
    </div>
</div>

{{-- Edit Modal --}}
<div id="editModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full p-6">
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Edit Image Details</h3>
                <p class="text-sm text-gray-500">Update alt text for SEO and accessibility</p>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Alt Text</label>
                <input type="text" 
                       name="alt_text" 
                       id="altText"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="Describe this image...">
            </div>
            
            <div class="flex justify-end space-x-3">
                <button type="button" 
                        onclick="closeModal()"
                        class="px-4 py-2.5 border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">
                    Cancel
                </button>
                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2.5 rounded-xl hover:bg-blue-700 transition-colors">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function editImage(id, altText) {
    const form = document.getElementById('editForm');
    const modal = document.getElementById('editModal');
    const altTextInput = document.getElementById('altText');
    
    form.action = `/admin/treks/{{ $trek->id }}/images/${id}`;
    altTextInput.value = altText || '';
    
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    const modal = document.getElementById('editModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Close modal on outside click
document.getElementById('editModal').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});
</script>
@endsection