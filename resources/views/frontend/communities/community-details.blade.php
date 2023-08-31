@extends('frontend.layouts.master')
@section('title', $community->name. ' | Dealfair')
@section('content')
    <div class="container mt-5 mt-md-8 mb-5 mb-md-0">
        <div class="bg-secondary rounded px-5 py-2">
            {{ Breadcrumbs::render('frontendCommunityDetailsPage', $community) }}
        </div>
    </div>
    @livewire('frontend.community.community-detail', ['communitySlug' => $community->slug])
@endsection
