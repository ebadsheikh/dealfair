@extends('frontend.layouts.master')
@section('title','All Communities | Dealfair')
@section('content')
    <div class="container mt-5 mt-md-8 mb-5">
        <div class="bg-secondary rounded px-5 py-2">
            {{ Breadcrumbs::render('frontendCommunitiesPage') }}
        </div>
    </div>
    <div class="container mb-4">
        <div class="row g-2 g-lg-3 g-xl-5">
            @livewire('frontend.community.community-filter-sidebar')
            @livewire('frontend.community.community-list')
        </div>
    </div>
@endsection
