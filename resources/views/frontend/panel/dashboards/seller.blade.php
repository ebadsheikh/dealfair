@extends('frontend.panel.layouts.master')
@section('title', 'Dealfair | Seller Dashboard')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <div class="page-title d-flex flex-column me-3">
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">Seller Dashboard</h1>
            <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7 my-1">
                <li class="breadcrumb-item text-gray-600">
                    <a href="{{ route('seller.dashboard') }}" class="text-gray-600 text-hover-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item text-gray-600">Seller</li>
            </ul>
        </div>

        <div class="d-flex align-items-center py-2 py-md-1">
            <a href="{{ route('seller.listing.create') }}" class="btn btn-primary fw-bold">Add New Listing</a>
        </div>
    </div>

    <div class="content flex-column-fluid" id="kt_content">
        @livewire('frontend.panel.dashboards.seller')
    </div>
@endsection
@section('scripts')
    <script>
        $("#kt_datepicker_7").flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            mode: "range"
        });
    </script>

@endsection
