<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('seo_title', trim($__env->yieldContent('title', 'Trekking Adventures')) . ' | ' . config('app.name'))
    </title>

    <meta name="description" content="@yield('seo_description', 'Explore the best trekking adventures in Nepal with experienced local guides.')">
    <meta name="robots" content="@yield('seo_robots', 'index, follow')">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="author" content="Adventure Mountain Explore Treks">
    <meta name="content-last-updated" content="{{ now()->format('Y-m-d') }}">
    <link rel="alternate" hreflang="en" href="{{ url('en/' . request()->path()) }}">
    <link rel="alternate" hreflang="ar-sa" href="{{ url('ar/' . request()->path()) }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=montserrat:400,500,600,700|open-sans:400,500,600" rel="stylesheet" />
    
    @if(app()->getLocale() === 'ar')
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
        <style>body { font-family: 'Cairo', sans-serif; }</style>
    @endif

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('schema')
    @stack('styles')
</head>

<body class="font-body antialiased bg-trek-light text-gray-800 scroll-smooth">
<div id="app">
    @include('layouts.header')

    <main class="min-h-screen pt-10" data-ai-section="main">
        @yield('content')
        @yield('conversion')
    </main>

    @include('layouts.footer')

    <a href="#" id="backToTop" class="hidden fixed bottom-8 {{ app()->getLocale() === 'ar' ? 'left-8' : 'right-8' }} bg-trek-accent p-3 rounded-full shadow-lg hover:bg-orange-600 transition z-50">
        <i class="bi bi-arrow-up text-xl"></i>
    </a>
</div>

@stack('scripts')

<script>

    document.addEventListener('DOMContentLoaded', function () {
    const backToTop = document.getElementById('backToTop');
    window.addEventListener('scroll', () => {
        backToTop.classList.toggle('hidden', window.scrollY < 300);
    });
    backToTop.addEventListener('click', e => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});
const currentPage = window.location.href;
let startTime = Date.now();

// Track page visit
navigator.sendBeacon('/track/page-visit', JSON.stringify({
   visitor_id: localStorage.getItem('visitor_id'),
    page: currentPage,
    referrer: document.referrer

}));

// Track duration when user leaves the page
window.addEventListener('beforeunload', function () {
    let duration = Math.round((Date.now() - startTime) / 1000);

    navigator.sendBeacon('/track/page-duration', JSON.stringify({
        page: currentPage,
        duration: duration
    }));
});

// Example: Track page switch (if you have tabs or SPA-like behavior)
document.querySelectorAll('[data-track-switch]').forEach(el => {
    el.addEventListener('click', e => {
        let toPage = e.target.getAttribute('data-track-switch');

        fetch('/track/page-switch', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                from_page: currentPage,
                to_page: toPage
            })
        });
    });
});
</script>

</body>
</html>
