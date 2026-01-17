@extends('admin.layouts')

@section('title', 'Manage Tags - ' . $trek->title)

@section('content')
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Manage Tags</h2>
                <div class="flex items-center gap-2 mt-1">
                    <p class="text-gray-500">{{ $trek->title }}</p>
                    <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded-full">
                        {{ ($trek->tags ?? collect())->count() }} tags
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.treks.index') }}" 
                   class="text-gray-600 hover:text-gray-800 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Tours
                </a>
                <button onclick="openAddModal()"
                        class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2.5 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition flex items-center shadow-lg">
                    <i class="fas fa-plus mr-2"></i> Add Custom Tag
                </button>
            </div>
        </div>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            {{-- Available Tags --}}
            <div class="bg-gray-50 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Available Tags</h3>
                <p class="text-sm text-gray-500 mb-6">Select tags to add to this tour</p>
                
                @if($tags->count() > 0)
                <div class="space-y-3 max-h-96 overflow-y-auto pr-2">
                    @foreach($tags as $tag)
                    @if(!$trek->tags->contains($tag))
                    <form action="{{ route('admin.treks.tags.store', $trek) }}" method="POST" class="w-full">
                        @csrf
                        <input type="hidden" name="tag_id" value="{{ $tag->id }}">
                        <button type="submit" 
                                class="w-full flex items-center justify-between p-4 bg-white border border-gray-200 rounded-xl hover:shadow-md transition-shadow group">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3" 
                                     style="background-color: {{ $tag->color }}20">
                                    @if($tag->icon)
                                    <i class="{{ $tag->icon }} text-sm" style="color: {{ $tag->color }}"></i>
                                    @else
                                    <i class="fas fa-tag text-sm" style="color: {{ $tag->color }}"></i>
                                    @endif
                                </div>
                                <div class="text-left">
                                    <span class="font-medium text-gray-800 block">{{ $tag->name }}</span>
                                    @if($tag->description)
                                    <span class="text-xs text-gray-500">{{ Str::limit($tag->description, 40) }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="text-blue-600 opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="fas fa-plus"></i>
                            </div>
                        </button>
                    </form>
                    @endif
                    @endforeach
                </div>
                @else
                <div class="text-center py-8 bg-white rounded-xl border border-dashed border-gray-300">
                    <div class="text-gray-400 mb-3">
                        <i class="fas fa-tags text-3xl"></i>
                    </div>
                    <p class="text-gray-500">No tags available</p>
                    <p class="text-sm text-gray-400 mt-1">Create some tags first</p>
                </div>
                @endif
            </div>

            {{-- Selected Tags --}}
            <div class="bg-blue-50/50 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Selected Tags</h3>
                <p class="text-sm text-gray-500 mb-6">Tags currently assigned to this tour</p>
                
                @if(($trek->tags ?? collect())->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach($trek->tags as $tag)
                    <div class="bg-white border border-blue-100 rounded-xl p-4 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3" 
                                     style="background-color: {{ $tag->color }}20">
                                    @if($tag->icon)
                                    <i class="{{ $tag->icon }} text-sm" style="color: {{ $tag->color }}"></i>
                                    @else
                                    <i class="fas fa-tag text-sm" style="color: {{ $tag->color }}"></i>
                                    @endif
                                </div>
                                <span class="font-medium text-gray-800">{{ $tag->name }}</span>
                            </div>
                            <form action="{{ route('admin.treks.tags.destroy', [$trek, $tag]) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Remove this tag?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-500 hover:text-red-700 p-1 rounded-lg hover:bg-red-50 transition-colors">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-8 bg-white rounded-xl border border-dashed border-gray-300">
                    <div class="text-gray-400 mb-3">
                        <i class="fas fa-tag text-3xl"></i>
                    </div>
                    <p class="text-gray-500">No tags selected yet</p>
                    <p class="text-sm text-gray-400 mt-1">Add tags from the left panel</p>
                </div>
                @endif
            </div>
        </div>

        {{-- Current Tags Preview --}}
        <div class="mt-8 bg-white border border-gray-200 rounded-xl p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Preview</h3>
    <div class="flex flex-wrap gap-2">
        @if($trek->tags && $trek->tags->count() > 0)
            @foreach($trek->tags as $tag)
            <span class="px-3 py-1.5 rounded-full text-sm font-medium flex items-center" 
                  style="background-color: {{ $tag->color }}20; color: {{ $tag->color }}">
                @if($tag->icon)
                <i class="{{ $tag->icon }} mr-1.5"></i>
                @else
                <i class="fas fa-hashtag mr-1.5"></i>
                @endif
                {{ $tag->name }}
            </span>
            @endforeach
        @else
            <span class="text-gray-400 italic">No tags to preview</span>
        @endif
    </div>
</div>
    </div>
</div>

{{-- Add New Tag Modal --}}
<div id="addTagModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full">
        <form action="{{ route('admin.treks.tags.store', $trek) }}" method="POST" class="p-6">
            @csrf
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Add New Tag</h3>
                <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tag Name *</label>
                    <input type="text" 
                           name="name" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="e.g., Family Friendly"
                           required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Color *</label>
                    <div class="flex items-center space-x-2">
                        <input type="color" 
                               name="color" 
                               value="#3B82F6"
                               class="w-12 h-12 cursor-pointer rounded-lg">
                        <input type="text" 
                               name="color_hex" 
                               value="#3B82F6"
                               class="flex-1 border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="#3B82F6"
                               pattern="^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$">
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Icon (optional)</label>
                    <input type="text" 
                           name="icon" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="fas fa-tag"
                           value="fas fa-tag">
                    <p class="text-xs text-gray-500 mt-1">Font Awesome icon class</p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description (optional)</label>
                    <textarea name="description" 
                              rows="2"
                              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              placeholder="Brief description of this tag..."></textarea>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 pt-6 mt-6 border-t">
                <button type="button" 
                        onclick="closeModal()"
                        class="px-4 py-2.5 border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">
                    Cancel
                </button>
                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2.5 rounded-xl hover:bg-blue-700 transition-colors">
                    Add Tag
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openAddModal() {
    document.getElementById('addTagModal').classList.remove('hidden');
    document.getElementById('addTagModal').classList.add('flex');
}

function closeModal() {
    document.getElementById('addTagModal').classList.add('hidden');
    document.getElementById('addTagModal').classList.remove('flex');
}

// Sync color picker with text input
const colorPicker = document.querySelector('input[name="color"]');
const colorInput = document.querySelector('input[name="color_hex"]');

colorPicker.addEventListener('input', function() {
    colorInput.value = this.value;
});

colorInput.addEventListener('input', function() {
    if (this.value.match(/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/)) {
        colorPicker.value = this.value;
    }
});

// Close modal on outside click
document.getElementById('addTagModal').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});
</script>
@endsection