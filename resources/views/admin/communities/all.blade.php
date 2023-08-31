@extends('admin.layouts.master')
@section('title', 'Communities')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Communities</h1>
                    {{ Breadcrumbs::render('adminCommunitiesPage') }}
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10">
                    <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10 bg-light">
                        <div class="row g-5 g-xl-4">
                            <div class="col-lg-3 col-6">
                                <div class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                                    <div class="card-body">
                                        <div class="page-title flex-column flex-wrap">
                                            <h1 class="text-white flex-column">{{$todayCount}}</h1>
                                        </div>
                                        <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">Today
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                                    <div class="card-body">
                                        <div class="page-title flex-column flex-wrap">
                                            <h1 class="text-white flex-column">{{$yesterdayCount}}</h1>
                                        </div>
                                        <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">Yesterday
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="card bg-success hoverable card-xl-stretch mb-xl-8">
                                    <div class="card-body">
                                        <div class="page-title flex-column flex-wrap">
                                            <h1 class="text-white flex-column">{{$thisMonthCount}}</h1>
                                        </div>
                                        <div class="text-white fw-bold fs-2 mb-2 mt-5">This Month
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="card bg-warning hoverable card-xl-stretch mb-5 mb-xl-8">
                                    <div class="card-body">
                                        <div class="page-title flex-column flex-wrap">
                                            <h1 class="text-white flex-column">{{$thisYearCount}}</h1>
                                        </div>
                                        <div class="text-white fw-bold fs-2 mb-2 mt-5">This Year
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @livewire('admin.communities.communities-list')
            </div>
        </div>
    </div>
@endsection
