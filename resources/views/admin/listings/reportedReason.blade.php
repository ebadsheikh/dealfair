@extends('admin.layouts.master')

@section('title', 'Reported Product Reasons')

@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Products</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted">Reported Product Reasons</a>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <div class="d-flex align-items-center">
                    <!--begin::Primary button-->
                    <a href="{{ route('admin.reported.reason.create') }}" class="btn fw-bold btn-primary">Add Reason</a>
                    <!--end::Primary button-->
                </div>
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="card card-p-0 pb-3 card-flush">
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-4"></span>
                                    <input type="text" data-kt-filter="search"
                                        class="form-control form-control-solid w-250px ps-14" placeholder="Search type" />
                                </div>
                                <!--end::Search-->
                                <!--begin::Export buttons-->
                                <div id="kt_datatable_example_1_export" class="d-none"></div>
                                <!--end::Export buttons-->
                            </div>

                        </div>
                        <div class="card-body">
                            <table class="table align-middle border rounded table-row-dashed fs-6 g-5"
                                id="kt_datatable_example">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                                        <th class="text-center min-w-50px">ID</th>
                                        <th class="text-center min-w-100px">Reason Type</th>
                                        <th class="text-center min-w-200px">Action</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($reasons as $reason)
                                        <tr class="text-center">
                                            <td class="text-dark">{{ $loop->iteration }}</td>
                                            <td class="text-dark ">{{ $reason->type }}</td>
                                            <td class="text-dark ">
                                                <div class="">
                                                    <x-action-button id="1"
                                                        editUrl="{{ route('admin.reported.reason.edit', $reason->id) }}"
                                                        deleteUrl="{{ route('admin.reported.reason.delete', $reason->id) }}" />
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end::Row-->

            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

@endsection
