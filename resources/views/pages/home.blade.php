@extends('layouts.app')

@section('title', 'Home - Trekking Adventures')

@section('content')
    

    <!-- Hero Section -->
    @include('sections.home.hero')

    @include('sections.home.ame-main-destination')
    
    @include('sections.home.featured-treks')

    @include('sections.home.why-ametreks')
 
    {{-- @include('sections.home.why-choose-us') --}}

    {{-- @include('sections.home.trending-travel-videos') --}}

    @include('sections.home.testimonials')

    @include('sections.home.upcoming-departures')

    @include('sections.home.faq')

    @include('sections.home.recent-blogs')

    @include('sections.home.ame-awards-and-association')

   @if($siteSettings && $siteSettings->is_greetingCard_enabled)
    @include('sections.home.greeting-modal')
@endif

@endsection