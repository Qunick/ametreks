@extends('admin.layouts')

@section('title', 'Departure Dates - ' . $trek->title)

@section('content')
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Departure Dates</h2>
                <div class="flex items-center gap-2 mt-1">
                    <p class="text-gray-500">{{ $trek->title }}</p>
                    <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded-full">
                        {{ $departures->count() }} dates
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
                    <i class="fas fa-plus mr-2"></i> Add Date
                </button>
            </div>
        </div>
    </div>

    <div class="p-6">
        {{-- Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-blue-50 rounded-xl p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-blue-600 font-medium">Available</p>
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $departures->where('status', 'Available')->count() }}
                        </p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <i class="fas fa-check-circle text-blue-600"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-yellow-50 rounded-xl p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-yellow-600 font-medium">Limited</p>
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $departures->where('status', 'Limited')->count() }}
                        </p>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-lg">
                        <i class="fas fa-exclamation-triangle text-yellow-600"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-red-50 rounded-xl p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-red-600 font-medium">Sold Out</p>
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $departures->where('status', 'Sold Out')->count() }}
                        </p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-lg">
                        <i class="fas fa-times-circle text-red-600"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-green-50 rounded-xl p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-green-600 font-medium">Guaranteed</p>
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $departures->where('is_guaranteed', true)->count() }}
                        </p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-lg">
                        <i class="fas fa-shield-alt text-green-600"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Departure Dates Table --}}
        @if($departures->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Spots</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Guaranteed</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($departures as $departure)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="bg-blue-50 text-blue-600 w-12 h-12 rounded-xl flex flex-col items-center justify-center mr-4">
                                    <span class="text-xs font-semibold">{{ \Carbon\Carbon::parse($departure->departure_date)->format('M') }}</span>
                                    <span class="text-lg font-bold">{{ \Carbon\Carbon::parse($departure->departure_date)->format('d') }}</span>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">
                                        {{ \Carbon\Carbon::parse($departure->departure_date)->format('D, M d, Y') }}
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($departure->departure_date)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        
                        <td class="px-6 py-4">
                            <div>
                                <span class="font-bold text-lg text-gray-800">
                                    {{ $departure->currency }} {{ number_format($departure->price, 2) }}
                                </span>
                                <p class="text-sm text-gray-500">
                                    Base: {{ $trek->currency }} {{ number_format($trek->base_price, 2) }}
                                </p>
                            </div>
                        </td>
                        
                        <td class="px-6 py-4">
                            @if($departure->spots_left !== null)
                            <div class="inline-flex items-center">
                                <div class="w-32 bg-gray-200 rounded-full h-2 mr-3">
                                    <div class="bg-blue-600 h-2 rounded-full" 
                                         style="width: {{ min(100, ($departure->spots_left / ($trek->group_size ?? 20)) * 100) }}%"></div>
                                </div>
                                <span class="font-medium {{ $departure->spots_left < 5 ? 'text-red-600' : 'text-gray-700' }}">
                                    {{ $departure->spots_left }}
                                </span>
                            </div>
                            @else
                            <span class="text-gray-400">Not specified</span>
                            @endif
                        </td>
                        
                        <td class="px-6 py-4">
                            @php
                                $statusColors = [
                                    'Available' => 'bg-green-100 text-green-800',
                                    'Limited' => 'bg-yellow-100 text-yellow-800',
                                    'Sold Out' => 'bg-red-100 text-red-800'
                                ];
                            @endphp
                            <span class="px-3 py-1 rounded-full text-sm font-medium {{ $statusColors[$departure->status] }}">
                                {{ $departure->status }}
                            </span>
                        </td>
                        
                        <td class="px-6 py-4">
                            @if($departure->is_guaranteed)
                            <span class="inline-flex items-center bg-green-50 text-green-700 px-3 py-1.5 rounded-full text-sm font-medium">
                                <i class="fas fa-shield-alt mr-1.5"></i> Guaranteed
                            </span>
                            @else
                            <span class="text-gray-400">—</span>
                            @endif
                        </td>
                        
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <button onclick="openEditModal({{ json_encode($departure) }})"
                                        class="bg-blue-50 hover:bg-blue-100 text-blue-600 p-2.5 rounded-xl transition-colors">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.treks.departures.destroy', [$trek, $departure]) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Delete this departure date?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-50 hover:bg-red-100 text-red-600 p-2.5 rounded-xl transition-colors">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-12">
            <div class="text-gray-400 mb-4">
                <i class="fas fa-calendar-alt text-4xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-600 mb-2">No departure dates added yet</h3>
            <p class="text-gray-500 mb-4">Add departure dates to allow bookings for this tour</p>
            <button onclick="openAddModal()"
                    class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2.5 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition flex items-center mx-auto shadow-lg">
                <i class="fas fa-plus mr-2"></i> Add First Date
            </button>
        </div>
        @endif
    </div>
</div>

<!-- MODAL -->
<div id="departureModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full">
        <form id="departureForm" method="POST" action="{{ route('admin.treks.departures.store', $trek) }}" class="p-6">
            @csrf
            <input type="hidden" id="methodInput" name="_method" value="POST">
            
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800" id="modalTitle">Add Departure Date</h3>
                <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Departure Date</label>
                    <input type="date" 
                           name="departure_date" 
                           id="departureDate"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           required>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                        <input type="number" 
                               name="price" 
                               id="price"
                               step="0.01"
                               min="0"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               required>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Currency</label>
                        <select name="currency" 
                                id="currency"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                            <option value="AUD">AUD</option>
                            <option value="CAD">CAD</option>
                        </select>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Spots Left (optional)</label>
                    <input type="number" 
                           name="spots_left" 
                           id="spotsLeft"
                           min="0"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Leave empty for unlimited">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" 
                            id="status"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="Available">Available</option>
                        <option value="Limited">Limited</option>
                        <option value="Sold Out">Sold Out</option>
                    </select>
                </div>
                
                <div>
                    <label class="flex items-center">
                        <input type="checkbox" 
                               name="is_guaranteed" 
                               id="isGuaranteed"
                               value="1"
                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 mr-2">
                        <span class="text-sm text-gray-700">Guaranteed Departure</span>
                    </label>
                    <p class="text-xs text-gray-500 mt-1">This departure will run regardless of group size</p>
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
                    Save Date
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openAddModal() {
    const form = document.getElementById('departureForm');
    const methodInput = document.getElementById('methodInput');
    
    // Set to POST for create
    form.action = '{{ route("admin.treks.departures.store", $trek) }}';
    methodInput.value = 'POST';
    document.getElementById('modalTitle').textContent = 'Add Departure Date';
    
    // Reset form
    form.reset();
    
    // Set tomorrow as default
    const tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    document.getElementById('departureDate').value = tomorrow.toISOString().split('T')[0];
    document.getElementById('price').value = '{{ $trek->base_price }}';
    document.getElementById('currency').value = '{{ $trek->currency }}';
    document.getElementById('status').value = 'Available';
    document.getElementById('isGuaranteed').checked = false;
    
    // Show modal
    document.getElementById('departureModal').classList.remove('hidden');
    document.getElementById('departureModal').classList.add('flex');
}

function openEditModal(departure) {
    const form = document.getElementById('departureForm');
    const methodInput = document.getElementById('methodInput');
    
    // Set to PUT for update
    form.action = `/admin/treks/{{ $trek->id }}/departures/${departure.id}`;
    methodInput.value = 'PUT';
    document.getElementById('modalTitle').textContent = 'Edit Departure Date';
    
    // Populate form fields
    document.getElementById('departureDate').value = departure.departure_date.split('T')[0];
    document.getElementById('price').value = departure.price;
    document.getElementById('currency').value = departure.currency;
    document.getElementById('spotsLeft').value = departure.spots_left || '';
    document.getElementById('status').value = departure.status;
    document.getElementById('isGuaranteed').checked = departure.is_guaranteed;
    
    // Show modal
    document.getElementById('departureModal').classList.remove('hidden');
    document.getElementById('departureModal').classList.add('flex');
}

function closeModal() {
    document.getElementById('departureModal').classList.add('hidden');
    document.getElementById('departureModal').classList.remove('flex');
}

// Close on outside click
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('departureModal');
    
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });
    
    // Close on Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
    
    // Set min date to today
    document.getElementById('departureDate').min = new Date().toISOString().split('T')[0];
});
</script>
@endsection