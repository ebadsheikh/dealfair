@extends('admin.layouts.master')

@section('title', 'Dealfair | Advertisement Plans')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Advertisement Plans</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a class="text-muted text-hover-primary">Advertisement Plans</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{route('admin.advertisement-plans.create')}}" class="btn fw-bold btn-primary">Add
                        Advertisement Plans</a>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="card card-p-0 card-flush">
                        <div class="form-group mt-5">
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session('error') }}
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session('success') }}
                                </div>
                            @endif
                        </div>

                        <div class="card-body">
                            <table class="table table-striped align-middle border rounded table-row-dashed fs-6 g-5">
                                <thead>
                                <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                                    <th class="text-center min-w-50px">#</th>
                                    <th class="text-center min-w-100px">Views</th>
                                    <th class="text-center min-w-100px">Price</th>
                                    <th class="text-center min-w-100px">Active Users</th>
                                    <th class="text-center min-w-100px">Status</th>
                                    <th class="text-center min-w-100px">Earnings</th>
                                    <th class="text-center min-w-200px">Action</th>
                                </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                @foreach ($advertisementPlans as $advertisementPlan)
                                    <tr class="text-center">
                                        <td class="text-dark">{{ $loop->iteration }}</td>
                                        <td class="text-dark">{{ $advertisementPlan->views }}</td>
                                        <td class="text-dark">$ {{ $advertisementPlan->price }}</td>
                                        <td class="text-dark">0</td>
                                        <td>
                                            <span class="badge badge-{{$advertisementPlan->status === \App\Enums\AdvertisementPlanEnum::ACTIVE->value ? 'success' : 'danger'}}">{{ucwords($advertisementPlan->status)}}</span>
                                        </td>
                                        <td class="text-dark">$ 0.00</td>

                                        <td class="text-dark">
                                            <div>
                                                <x-action-button id="{{ $advertisementPlan->id }}"
                                                                 deleteUrl="{{ Route('admin.advertisement-plans.destroy', $advertisementPlan->id) }}"
                                                                 editUrl="{{ Route('admin.advertisement-plans.edit', $advertisementPlan->id) }}">
                                                </x-action-button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
