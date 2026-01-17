@extends('admin.layouts')

@section('title', 'Manage Itinerary - ' . $trek->title)

@section('content')
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Itinerary Management</h2>
                <div class="flex items-center gap-2 mt-1">
                    <p class="text-gray-500">{{ $trek->title }}</p>
                    <span class="text-xs bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-3 py-1 rounded-full font-medium">
                        {{ $itineraries->count() }} days
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.treks.index') }}" 
                   class="text-gray-600 hover:text-gray-800 flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-gray-50 transition-colors">
                    <i class="fas fa-arrow-left"></i>
                    <span class="hidden sm:inline">Back to Tours</span>
                </a>
                <button id="addDayBtn"
                        class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2.5 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 flex items-center gap-2 shadow-lg hover:shadow-xl">
                    <i class="fas fa-plus"></i>
                    <span>Add Day</span>
                </button>
            </div>
        </div>
    </div>

    <div class="p-6">
        @if($itineraries->count() > 0)
        <div class="space-y-4">
            @foreach($itineraries as $day)
            <div class="border border-gray-200 rounded-2xl overflow-hidden hover:border-blue-300 transition-all duration-300 hover:shadow-md bg-gradient-to-r from-white to-gray-50/50">
                <div class="px-6 py-5 border-b border-gray-200/50 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div class="bg-gradient-to-br from-blue-500 to-indigo-600 text-white w-20 h-12 rounded-xl flex items-center justify-center font-bold text-lg shadow-md">
                            Day {{ $day->day }}
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-lg text-gray-800">{{ $day->title }}</h3>
                            <div class="flex flex-wrap items-center gap-3 text-sm text-gray-600 mt-1">
                                @if($day->altitude)
                                <span class="flex items-center gap-1.5 bg-blue-50 px-3 py-1 rounded-lg">
                                    <i class="fas fa-mountain text-blue-500"></i>
                                    <span>{{ $day->altitude }}</span>
                                </span>
                                @endif
                                @if($day->location)
                                <span class="flex items-center gap-1.5 bg-green-50 px-3 py-1 rounded-lg">
                                    <i class="fas fa-map-marker-alt text-green-500"></i>
                                    <span>{{ $day->location }}</span>
                                </span>
                                @endif
                                @if($day->meal)
                                <span class="flex items-center gap-1.5 bg-amber-50 px-3 py-1 rounded-lg">
                                    <i class="fas fa-utensils text-amber-500"></i>
                                    <span>{{ $day->meal }}</span>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <button onclick="openEditModal({{ json_encode($day) }})"
                                class="bg-blue-50 hover:bg-blue-100 text-blue-600 p-3 rounded-xl transition-all duration-300 hover:scale-105 active:scale-95">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('admin.treks.itinerary.destroy', [$trek, $day]) }}" 
                              method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this day?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-50 hover:bg-red-100 text-red-600 p-3 rounded-xl transition-all duration-300 hover:scale-105 active:scale-95">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="px-6 py-4">
                    <p class="text-gray-600 line-clamp-2">{{ Str::limit($day->description, 150) }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16">
            <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gradient-to-br from-blue-50 to-indigo-50 mb-6">
                <i class="fas fa-route text-4xl text-blue-500"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-700 mb-3">No itinerary added yet</h3>
            <p class="text-gray-500 mb-6 max-w-md mx-auto">Start by adding the first day of your tour itinerary to create an engaging journey for your travelers</p>
            <button id="addFirstDayBtn"
                    class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 flex items-center gap-2 shadow-lg hover:shadow-xl mx-auto">
                <i class="fas fa-plus"></i>
                <span>Add First Day</span>
            </button>
        </div>
        @endif
    </div>
</div>

<div id="itineraryModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4 backdrop-blur-sm">
    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl">
        <form id="itineraryForm" method="POST" class="p-6">
            @csrf
            <input type="hidden" id="methodInput" name="_method" value="POST">
            
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800" id="modalTitle">Add Day</h3>
                <button type="button" onclick="closeItineraryModal()" class="text-gray-400 hover:text-gray-600 p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Day Number</label>
                    <input type="number" 
                           name="day" 
                           id="day"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                           min="1"
                           required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" 
                           name="title" 
                           id="title"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                           placeholder="e.g., Arrival in Kathmandu"
                           required>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Altitude</label>
                    <input type="text" 
                           name="altitude" 
                           id="altitude"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                           placeholder="e.g., 2,800m">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                    <input type="text" 
                           name="location" 
                           id="location"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                           placeholder="e.g., Kathmandu to Lukla">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meal Plan</label>
                    <input type="text" 
                           name="meal" 
                           id="meal"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                           placeholder="e.g., B, L, D">
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Duration</label>
                    <input type="text" 
                           name="duration" 
                           id="duration"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                           placeholder="e.g., 6 hours">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Distance</label>
                    <input type="text" 
                           name="distance" 
                           id="distance"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                           placeholder="e.g., 10 km">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Overnight</label>
                    <input type="text" 
                           name="overnight" 
                           id="overnight"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                           placeholder="e.g., Lodge, Camp">
                </div>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" 
                          id="description"
                          rows="4"
                          class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                          placeholder="Detailed description of the day..."
                          required></textarea>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Highlights</label>
                <div id="highlightContainer" class="space-y-2 mb-3">
                    <div class="flex items-center gap-2">
                        <input type="text" 
                               name="highlights[]"
                               class="flex-1 border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                               placeholder="Add a highlight...">
                        <button type="button" onclick="addDynamicField('highlightContainer', 'highlights', 'Add a highlight...')" class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white p-3 rounded-xl hover:from-blue-600 hover:to-indigo-600 transition-all duration-300">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Activities</label>
                <div id="activitiesContainer" class="space-y-2 mb-3">
                    <div class="flex items-center gap-2">
                        <input type="text" 
                               name="activities[]"
                               class="flex-1 border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                               placeholder="Add an activity...">
                        <button type="button" onclick="addDynamicField('activitiesContainer', 'activities', 'Add an activity...')" class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white p-3 rounded-xl hover:from-blue-600 hover:to-indigo-600 transition-all duration-300">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Pro Tip</label>
                <input type="text" 
                       name="pro_tip" 
                       id="proTip"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                       placeholder="Expert advice for this day...">
            </div>
            
            <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                <button type="button" 
                        onclick="closeItineraryModal()"
                        class="px-5 py-3 border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors font-medium">
                    Cancel
                </button>
                <button type="submit" 
                        class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-3 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 font-medium shadow-md hover:shadow-lg">
                    Save Day
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('itineraryModal');
    
    if (!modal) {
        alert('Error: Modal not found. Please contact support.');
        return;
    }
    
    const addDayBtn = document.getElementById('addDayBtn');
    const addFirstDayBtn = document.getElementById('addFirstDayBtn');
    
    if (addDayBtn) addDayBtn.addEventListener('click', openAddModal);
    if (addFirstDayBtn) addFirstDayBtn.addEventListener('click', openAddModal);
    
    setupModalEvents();
});

function setupModalEvents() {
    const modal = document.getElementById('itineraryModal');
    if (!modal) return;
    
    modal.addEventListener('click', function(e) {
        if (e.target === modal) closeItineraryModal();
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeItineraryModal();
    });
}

function openAddModal() {
    const modal = document.getElementById('itineraryModal');
    const form = document.getElementById('itineraryForm');
    const methodInput = document.getElementById('methodInput');
    
    if (!modal || !form || !methodInput) return;
    
    form.action = '{{ route("admin.treks.itinerary.store", $trek) }}';
    methodInput.value = 'POST';
    document.getElementById('modalTitle').textContent = 'Add Day';
    form.reset();
    document.getElementById('day').value = {{ $itineraries->count() }} + 1;
    
    clearDynamicFields();
    openItineraryModal();
}

function openEditModal(dayData) {
    const modal = document.getElementById('itineraryModal');
    const form = document.getElementById('itineraryForm');
    const methodInput = document.getElementById('methodInput');
    
    if (!modal || !form || !methodInput) return;
    
    form.action = `/admin/treks/{{ $trek->id }}/itinerary/${dayData.id}`;
    methodInput.value = 'PUT';
    document.getElementById('modalTitle').textContent = 'Edit Day ' + dayData.day;
    
    document.getElementById('day').value = dayData.day;
    document.getElementById('title').value = dayData.title || '';
    document.getElementById('altitude').value = dayData.altitude || '';
    document.getElementById('location').value = dayData.location || '';
    document.getElementById('meal').value = dayData.meal || '';
    document.getElementById('description').value = dayData.description || '';
    document.getElementById('proTip').value = dayData.pro_tip || '';
    document.getElementById('duration').value = dayData.duration || '';
    document.getElementById('distance').value = dayData.distance || '';
    document.getElementById('overnight').value = dayData.overnight || '';
    
    clearDynamicFields();
    
    if (dayData.activities) {
        try {
            const activities = JSON.parse(dayData.activities);
            if (Array.isArray(activities) && activities.length > 0) {
                const firstActivityInput = document.querySelector('#activitiesContainer input');
                if (firstActivityInput) firstActivityInput.value = activities[0] || '';
                for (let i = 1; i < activities.length; i++) {
                    if (activities[i]) addActivityField(activities[i]);
                }
            }
        } catch (e) {}
    }
    
    if (dayData.highlights) {
        try {
            const highlights = JSON.parse(dayData.highlights);
            if (Array.isArray(highlights) && highlights.length > 0) {
                const firstHighlightInput = document.querySelector('#highlightContainer input');
                if (firstHighlightInput) firstHighlightInput.value = highlights[0] || '';
                for (let i = 1; i < highlights.length; i++) {
                    if (highlights[i]) addHighlightField(highlights[i]);
                }
            }
        } catch (e) {}
    }
    
    openItineraryModal();
}

function clearDynamicFields() {
    document.querySelectorAll('.dynamic-field').forEach(field => field.remove());
    document.querySelectorAll('#activitiesContainer input').forEach(input => input.value = '');
    document.querySelectorAll('#highlightContainer input').forEach(input => input.value = '');
}

function addDynamicField(containerId, inputName, placeholder = '') {
    const container = document.getElementById(containerId);
    if (!container) return;

    const div = document.createElement('div');
    div.className = 'flex items-center gap-2 dynamic-field';

    div.innerHTML = `
        <input type="text"
               name="${inputName}[]"
               class="flex-1 border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
               placeholder="${placeholder}">
        <button type="button"
                onclick="removeDynamicField(this)"
                class="bg-red-100 text-red-600 p-3 rounded-xl hover:bg-red-200 transition-colors">
            <i class="fas fa-times"></i>
        </button>
    `;

    container.appendChild(div);
}

function addActivityField(value = '') {
    const container = document.getElementById('activitiesContainer');
    if (!container) return;

    const div = document.createElement('div');
    div.className = 'flex items-center gap-2 dynamic-field';

    div.innerHTML = `
        <input type="text"
               name="activities[]"
               class="flex-1 border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
               placeholder="Add an activity..."
               value="${value}">
        <button type="button"
                onclick="removeDynamicField(this)"
                class="bg-red-100 text-red-600 p-3 rounded-xl hover:bg-red-200 transition-colors">
            <i class="fas fa-times"></i>
        </button>
    `;

    container.appendChild(div);
}

function addHighlightField(value = '') {
    const container = document.getElementById('highlightContainer');
    if (!container) return;

    const div = document.createElement('div');
    div.className = 'flex items-center gap-2 dynamic-field';

    div.innerHTML = `
        <input type="text"
               name="highlights[]"
               class="flex-1 border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
               placeholder="Add a highlight..."
               value="${value}">
        <button type="button"
                onclick="removeDynamicField(this)"
                class="bg-red-100 text-red-600 p-3 rounded-xl hover:bg-red-200 transition-colors">
            <i class="fas fa-times"></i>
        </button>
    `;

    container.appendChild(div);
}

function removeDynamicField(button) {
    button.closest('.dynamic-field')?.remove();
}

function openItineraryModal() {
    const modal = document.getElementById('itineraryModal');
    if (!modal) return;
    
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeItineraryModal() {
    const modal = document.getElementById('itineraryModal');
    if (!modal) return;
    
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = '';
}
</script>
@endsection