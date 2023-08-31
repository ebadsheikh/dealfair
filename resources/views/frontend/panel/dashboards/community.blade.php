@extends('frontend.panel.layouts.master')
@section('title','Dealfair | Community Dashboard')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <div class="page-title d-flex flex-column me-3">
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">Community Dashboard</h1>
            <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7 my-1">
                <li class="breadcrumb-item text-gray-600">
                    <a href="{{route('community.dashboard')}}" class="text-gray-600 text-hover-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item text-gray-600">Communities</li>
            </ul>
        </div>
    </div>

    <div class="content flex-column-fluid" id="kt_content">
        @livewire('frontend.panel.dashboards.community')
    </div>
@endsection
