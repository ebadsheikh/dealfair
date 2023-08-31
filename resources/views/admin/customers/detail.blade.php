@extends('admin.layouts.master')

@section('title', 'Dealfair | Customer Detail')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Customer Details</h1>
                    {{ Breadcrumbs::render('adminDetailCustomerPage') }}
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{Route('admin.customers.index')}}" class="btn btn-sm fw-bold btn-primary">
                        <i class="bi bi-arrow-left"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10">
                    @include('admin.customer-details.index')
                </div>
            </div>
        </div>

    </div>

@endsection
