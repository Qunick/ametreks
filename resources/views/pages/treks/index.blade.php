@extends('admin.layouts')
@section('title','Treks')

@section('content')
<h1 class="text-3xl font-bold mb-6">All Treks</h1>

<div class="grid md:grid-cols-3 gap-6">
    @foreach($treks as $trek)
    <div class="bg-white rounded shadow overflow-hidden">
        <img src="{{ asset('storage/'.$trek->main_image) }}" alt="{{ $trek->image_alt }}" class="w-full h-48 object-cover">
        <div class="p-4">
            <h2 class="text-xl font-bold">{{ $trek->title }}</h2>
            <p class="text-gray-600">{{ $trek->region }} • {{ $trek->duration_days }} days</p>
            <p class="text-gray-700 mt-2">{{ Str::limit($trek->short_desc, 100) }}</p>
            <div class="mt-4 flex justify-between items-center">
                <span class="font-bold">{{ $trek->currency }} {{ number_format($trek->base_price,2) }}</span>
                <a href="{{ route('pages.treks.show',$trek->slug) }}" class="bg-blue-500 text-white px-3 py-1 rounded">View</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-6">{{ $treks->links() }}</div>
@endsection
