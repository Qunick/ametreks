@extends('layouts.app')

@section('title', 'Dashboard - AME Treks')

@section('content')
<div x-data="dashboard()" class="space-y-6">
    <!-- Welcome Header -->
    <div class="bg-gradient-to-r from-[#005991] to-[#4D8BB2] rounded-2xl p-6 text-white shadow-lg">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" 
                     class="w-16 h-16 rounded-full border-4 border-white/20 shadow-lg">
                <div>
                    <h1 class="text-2xl font-bold">Welcome back, {{ $user->name }}!</h1>
                    <div class="flex items-center gap-3 mt-2">
                        <span class="flex items-center gap-1 text-sm bg-white/20 px-3 py-1 rounded-full">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $user->country ? country_name($user->country) : 'Unknown' }}
                        </span>
                        <span class="text-sm">{{ $user->experience_level ? ucfirst($user->experience_level) : 'Not set' }}</span>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <a href="{{ route('user.profile') }}" class="inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 px-4 py-2 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Complete Profile
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background-color: rgba(0, 89, 145, 0.1);">
                    <svg class="w-6 h-6" style="color: #005991;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Treks Interested</p>
                    <p class="text-xl font-bold text-gray-900">{{ count($userInterests) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background-color: rgba(153, 199, 35, 0.1);">
                    <svg class="w-6 h-6" style="color: #99C723;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Potential Matches</p>
                    <p class="text-xl font-bold text-gray-900">{{ $suggestedMatches->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background-color: rgba(77, 139, 178, 0.1);">
                    <svg class="w-6 h-6" style="color: #4D8BB2;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Last Active</p>
                    <p class="text-xl font-bold text-gray-900">{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background-color: rgba(159, 122, 234, 0.1);">
                    <svg class="w-6 h-6" style="color: #9F7AEA;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Profile Complete</p>
                    <p class="text-xl font-bold text-gray-900">{{ $user->is_profile_complete ? '100%' : '40%' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column - Profile & Interests -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Your Interests -->
            <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Your Trek Interests</h3>
                    <a href="{{ route('user.profile') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                        Edit Interests
                    </a>
                </div>
                
                @if(count($userInterests) > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                    @foreach($userInterests as $interest)
                    <div class="border border-gray-200 rounded-lg p-4 text-center hover:border-blue-300 hover:shadow-sm transition-all">
                        <div class="w-10 h-10 mx-auto mb-2 rounded-full flex items-center justify-center" style="background-color: {{ $interest['color'] }}20;">
                            {!! $trekTypes->firstWhere('id', $interest['id'])?->icon_svg !!}
                        </div>
                        <h4 class="font-medium text-gray-900">{{ $interest['name'] }}</h4>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-8">
                    <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                    <p class="mt-3 text-gray-600">You haven't selected any interests yet.</p>
                    <a href="{{ route('user.profile') }}" class="mt-2 inline-block text-blue-600 hover:text-blue-800 font-medium">
                        Add your trekking interests →
                    </a>
                </div>
                @endif
            </div>

            <!-- Find Similar Trekkers -->
            <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Find Similar Trekkers</h3>
                    <a href="{{ route('user.find.matches') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                        View All
                    </a>
                </div>
                
                @if($suggestedMatches->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($suggestedMatches as $match)
                    <div class="border border-gray-200 rounded-xl p-4 hover:border-blue-300 hover:shadow-sm transition-all">
                        <div class="flex items-start gap-3">
                            <img src="{{ $match->avatar_url }}" alt="{{ $match->name }}" 
                                 class="w-12 h-12 rounded-full border-2 border-white shadow">
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900">{{ $match->name }}</h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-700">
                                        {{ $match->country ? country_name($match->country) : 'Unknown' }}
                                    </span>
                                    <span class="text-xs px-2 py-1 rounded-full bg-blue-100 text-blue-700">
                                        {{ ucfirst($match->gender) }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 mt-2 line-clamp-2">{{ $match->bio }}</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    @foreach($match->formatted_interests as $interest)
                                    <span class="text-xs px-2 py-1 rounded" style="background-color: {{ $interest['color'] }}20; color: {{ $interest['color'] }}">
                                        {{ $interest['name'] }}
                                    </span>
                                    @endforeach
                                </div>
                                <button @click="sendConnectionRequest({{ $match->id }})" class="text-xs px-3 py-1.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                    Connect
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-8">
                    <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-6.201a9 9 0 01-4.5 7.745"/>
                    </svg>
                    <p class="mt-3 text-gray-600">No matches found based on your interests.</p>
                    <p class="text-sm text-gray-500">Update your profile to find better matches.</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Right Column - Quick Actions -->
        <div class="space-y-6">
            <!-- Complete Profile Card -->
            @if(!$user->is_profile_complete)
            <div class="bg-gradient-to-br from-amber-50 to-orange-50 border border-amber-200 rounded-xl p-5">
                <h3 class="text-lg font-semibold text-amber-900 mb-3">Complete Your Profile</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-amber-700">Profile Progress</span>
                        <span class="text-sm font-medium text-amber-900">40%</span>
                    </div>
                    <div class="w-full bg-amber-200 rounded-full h-2">
                        <div class="bg-amber-600 h-2 rounded-full" style="width: 40%"></div>
                    </div>
                    <ul class="space-y-2 text-sm text-amber-800">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 {{ $user->gender ? 'text-green-500' : 'text-amber-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if($user->gender)
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                @else
                                <circle cx="12" cy="12" r="10"/>
                                @endif
                            </svg>
                            Add Gender
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 {{ $user->interests ? 'text-green-500' : 'text-amber-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if($user->interests)
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                @else
                                <circle cx="12" cy="12" r="10"/>
                                @endif
                            </svg>
                            Select Trek Interests
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 {{ $user->experience_level ? 'text-green-500' : 'text-amber-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if($user->experience_level)
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                @else
                                <circle cx="12" cy="12" r="10"/>
                                @endif
                            </svg>
                            Set Experience Level
                        </li>
                    </ul>
                    <a href="{{ route('user.profile') }}" class="block w-full mt-4 py-2.5 bg-amber-600 text-white text-center rounded-lg font-medium hover:bg-amber-700 transition-colors">
                        Complete Profile Now
                    </a>
                </div>
            </div>
            @endif

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl border border-gray-100 p-5 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-2">
                    <a href="{{ route('user.profile') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-blue-100 group-hover:bg-blue-200 transition-colors">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="font-medium text-gray-900">Edit Profile</span>
                            <p class="text-sm text-gray-500">Update your information</p>
                        </div>
                    </a>
                    
                    <a href="{{ route('user.find.matches') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-green-100 group-hover:bg-green-200 transition-colors">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-6.201a9 9 0 01-4.5 7.745"/>
                            </svg>
                        </div>
                        <div>
                            <span class="font-medium text-gray-900">Find Trekkers</span>
                            <p class="text-sm text-gray-500">Connect with similar interests</p>
                        </div>
                    </a>
                    
                    <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-purple-100 group-hover:bg-purple-200 transition-colors">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <span class="font-medium text-gray-900">Browse Treks</span>
                            <p class="text-sm text-gray-500">Find your next adventure</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Trek Types -->
            <div class="bg-white rounded-xl border border-gray-100 p-5 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Trek Categories</h3>
                <div class="space-y-3">
                    @foreach($trekTypes as $type)
                    <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background-color: {{ $type->color }}20;">
                                {!! $type->icon_svg !!}
                            </div>
                            <span class="font-medium text-gray-900">{{ $type->name }}</span>
                        </div>
                        <button @click="toggleInterest({{ $type->id }})" class="text-sm px-3 py-1 rounded-full border transition-colors"
                                :class="interests.includes({{ $type->id }}) 
                                    ? 'border-transparent text-white' 
                                    : 'border-gray-300 text-gray-600 hover:border-blue-500 hover:text-blue-600'"
                                :style="interests.includes({{ $type->id }}) 
                                    ? 'background-color: {{ $type->color }}' 
                                    : ''">
                            {{ in_array($type->id, $user->interests ?? []) ? 'Interested' : 'Add' }}
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function dashboard() {
    return {
        interests: @json($user->interests ?? []),
        
        toggleInterest(trekTypeId) {
            if (this.interests.includes(trekTypeId)) {
                this.interests = this.interests.filter(id => id !== trekTypeId);
            } else {
                this.interests.push(trekTypeId);
            }
            
            // Update via AJAX
            fetch('{{ route("user.profile.update") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    interests: this.interests
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    this.showToast('Interests updated successfully!');
                    location.reload(); // Refresh to show updated interests
                }
            });
        },
        
        sendConnectionRequest(userId) {
            // Show loading state
            const button = event.target;
            const originalText = button.textContent;
            button.textContent = 'Sending...';
            button.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                button.textContent = 'Request Sent';
                button.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                button.classList.add('bg-green-600', 'cursor-not-allowed');
                
                this.showToast('Connection request sent successfully!');
            }, 1000);
        },
        
        showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg animate-fade-in z-50';
            toast.textContent = message;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.classList.add('animate-fade-out');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
    }
}
</script>
@endsection