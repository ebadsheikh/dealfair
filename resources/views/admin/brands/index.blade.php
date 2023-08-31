@extends('admin.layouts.master')
@section('title', 'Dealfair | Brands')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Brands</h1>
                    {{ Breadcrumbs::render('adminBrandsPage') }}
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                     <a href="{{Route('admin.brands.create')}}" class="btn fw-bold btn-primary">Add New Brand</a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                @livewire('admin.brand.brand-list')
            </div>
        </div>
    </div>
@endsection
