@extends('admin.layouts')
@section('title','Create Trek')

@section('content')
<h1 class="text-2xl font-bold mb-6">Create Trek</h1>

<form action="{{ route('admin.treks.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
    @csrf
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block font-bold">Title</label>
            <input type="text" name="title" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block font-bold">Slug</label>
            <input type="text" name="slug" class="w-full border p-2 rounded">
        </div>
        <div>
            <label class="block font-bold">Region</label>
            <input type="text" name="region" class="w-full border p-2 rounded">
        </div>
        <div>
            <label class="block font-bold">Duration (Days)</label>
            <input type="number" name="duration_days" class="w-full border p-2 rounded">
        </div>
        <div>
            <label class="block font-bold">Difficulty</label>
            <select name="difficulty" class="w-full border p-2 rounded">
                <option value="Easy">Easy</option>
                <option value="Moderate">Moderate</option>
                <option value="Hard">Hard</option>
            </select>
        </div>
        <div>
            <label class="block font-bold">Base Price</label>
            <input type="number" name="base_price" step="0.01" class="w-full border p-2 rounded">
        </div>
        <div>
            <label class="block font-bold">Main Image</label>
            <input type="file" name="main_image" class="w-full border p-2 rounded">
        </div>
        <div>
            <label class="block font-bold">Video URL</label>
            <input type="text" name="video_url" class="w-full border p-2 rounded">
        </div>
    </div>

    <div class="mt-4">
        <label class="block font-bold">Short Description</label>
        <textarea name="short_desc" class="w-full border p-2 rounded"></textarea>
    </div>

    <div class="mt-4">
        <label class="block font-bold">Overview</label>
        <textarea name="overview" class="w-full border p-2 rounded h-32"></textarea>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Save Trek</button>
</form>
@endsection
