@extends('frontend.layouts.master')
@section('content')
    <div class="container my-5">
        <div class="bg-secondary rounded px-5 py-2">
            {{ Breadcrumbs::render('frontendListingsPage') }}
        </div>
    </div>
    <div class="container mb-4">
        <div class="row g-2 g-lg-3 g-xl-5">
            @livewire('frontend.listing.listing-filter-siderbar')
            @livewire('frontend.listing.listing-list')
        </div>
    </div>
@endsection
