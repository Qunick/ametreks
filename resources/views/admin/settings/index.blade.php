@extends('admin.layout')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Home Page Settings</h1>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST"
        action="{{ $setting ? route('admin.home-settings.update', $setting) : route('admin.home-settings.store') }}">
        @csrf
        @if($setting) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Greeting Section --}}
            <div class="bg-white p-5 rounded shadow">
                <h2 class="font-semibold mb-4">Greeting Section</h2>

                <label class="flex items-center gap-2 mb-3">
                    <input type="checkbox" name="greeting_is_enabled"
                        {{ $setting?->greeting_is_enabled ? 'checked' : '' }}>
                    Enable Greeting
                </label>

                <input type="text" name="greeting_text"
                    value="{{ old('greeting_text', $setting?->greeting_text) }}"
                    class="w-full border rounded p-2"
                    placeholder="Greeting Text">
            </div>

            {{-- Company --}}
            <div class="bg-white p-5 rounded shadow">
                <h2 class="font-semibold mb-4">Company</h2>

                <input type="text" name="company_name"
                    value="{{ old('company_name', $setting?->company_name) }}"
                    class="w-full border rounded p-2 mb-3"
                    placeholder="Company Name">

                <label class="flex items-center gap-2">
                    <input type="checkbox" name="section_is_hide"
                        {{ $setting?->section_is_hide ? 'checked' : '' }}>
                    Hide Section
                </label>
            </div>

            {{-- Changing Text --}}
            <div class="bg-white p-5 rounded shadow col-span-full">
                <h2 class="font-semibold mb-2">Changing Text (JSON)</h2>
                <textarea name="changing_text" rows="3"
                    class="w-full border rounded p-2"
                    placeholder='["Explore Himalayas","Adventure Awaits"]'>{{ json_encode($setting?->changing_text, JSON_PRETTY_PRINT) }}</textarea>
            </div>

            {{-- FAQ --}}
            <div class="bg-white p-5 rounded shadow col-span-full">
                <h2 class="font-semibold mb-2">FAQ (JSON)</h2>
                <textarea name="faq_questions_answer" rows="5"
                    class="w-full border rounded p-2"
                    placeholder='[{"q":"Best season?","a":"Spring"}]'>{{ json_encode($setting?->faq_questions_answer, JSON_PRETTY_PRINT) }}</textarea>
            </div>

            {{-- Footer --}}
            <div class="bg-white p-5 rounded shadow col-span-full">
                <h2 class="font-semibold mb-2">Footer Text</h2>
                <textarea name="footer_text" rows="3"
                    class="w-full border rounded p-2">{{ old('footer_text', $setting?->footer_text) }}</textarea>
            </div>

            {{-- Social --}}
            <div class="bg-white p-5 rounded shadow col-span-full">
                <h2 class="font-semibold mb-2">Social Media Links (JSON)</h2>
                <textarea name="social_media_links" rows="3"
                    class="w-full border rounded p-2"
                    placeholder='{"facebook":"url","instagram":"url"}'>{{ json_encode($setting?->social_media_links, JSON_PRETTY_PRINT) }}</textarea>
            </div>
        </div>

        {{-- Actions --}}
        <div class="mt-6 flex gap-4">
            <button class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                {{ $setting ? 'Update Settings' : 'Save Settings' }}
            </button>

            @if($setting)
            <form method="POST" action="{{ route('admin.home-settings.destroy', $setting) }}">
                @csrf
                @method('DELETE')
                <button class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700"
                    onclick="return confirm('Delete all settings?')">
                    Delete
                </button>
            </form>
            @endif
        </div>
    </form>
</div>
@endsection
