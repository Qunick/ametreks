<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Trekking Adventures') - {{ config('app.name', 'Laravel') }}</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=montserrat:400,500,600,700|open-sans:400,500,600" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="font-body text-gray-800 bg-trek-light">
    <div id="app">
        @include('layouts.header')
        <main class="min-h-screen">
            @yield('content')
        </main>
        @include('layouts.footer')
        <a href="#" id="backToTop" class="hidden fixed bottom-8 right-8 bg-trek-accent text-green p-3 rounded-full shadow-lg hover:bg-orange-600 transition-all duration-300 z-50">
            <i class="bi bi-arrow-up text-xl"></i>
        </a>
    </div>

    @stack('scripts')
    <script src="{{ asset('js/home.js') }}" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const backToTop = document.getElementById('backToTop');
            
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTop.classList.remove('hidden');
                } else {
                    backToTop.classList.add('hidden');
                }
            });
            
            backToTop.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });
    </script>
</body>
</html>