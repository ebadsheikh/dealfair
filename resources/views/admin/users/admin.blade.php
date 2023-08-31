@extends('admin.layouts.master')

@section('title', 'Products')

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
                       Users</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-mute">Admin  Users</a>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Secondary button-->
                    <a href="#" class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary"
                        data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Rollover</a>
                    <!--end::Secondary button-->
                    <!--begin::Primary button-->
                    <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_new_target">Add Target</a>
                    <!--end::Primary button-->
                </div> --}}
                <!--end::Actions-->
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
                    <div class="card card-p-0 card-flush">

                        <div class="card-body">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">

                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                    <!--begin::Table row-->
                                    @foreach ($users as $user)
                                    <tr>
                                        <!--begin::Category-->
                                        <td>
                                            <div class="d-flex">
                                                <!--begin::Thumbnail-->
                                                @if ($user->getFirstMediaUrl('user_image'))
                                                    <a href="#"
                                                    class="symbol symbol-50px">
                                                    <span class="symbol-label"
                                                        style="background-image:url({{ asset($user->getFirstMediaUrl('user_image')) }});"></span>
                                                </a>
                                                @else
                                                <a href="#"
                                                    class="symbol symbol-50px">
                                                    <span class="symbol-label"
                                                        style="background-image:url({{ asset('assets/media/svg/avatars/blank.svg') }});"></span>
                                                </a>
                                                @endif

                                                <!--end::Thumbnail-->
                                                <div class="ms-5">
                                                    <!--begin::Title-->
                                                    <a href="#"
                                                        class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                                                        data-kt-ecommerce-category-filter="category_name">{{ $user->name }}</a>
                                                    <!--end::Title-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7 fw-bold">{{ $user->email }}
                                                        <span class="m-5"><i class="fa fa-user"></i> {{ $user->roles()->first()->name }}</span>
                                                        <span><i class="fa fa-wallet"></i> $23</span>
                                                    </div>
                                                    <div class="text-muted mt-5 fs-7 fw-bold d-flex">
                                                            <label class="form-check form-check-custom form-check-inline form-check-solid me-3">
																	<input class="form-check-input" name="communication" type="checkbox" value="1">
																	<span class="fw-semibold ps-2 fs-6">Auction</span>
																</label>
                                                                <label class="form-check form-check-custom form-check-inline form-check-solid me-3">
																	<input class="form-check-input" name="communication" type="checkbox" value="1">
																	<span class="fw-semibold ps-2 fs-6">User</span>
																</label>
                                                                <label class="form-check form-check-custom form-check-inline form-check-solid me-3">
																	<input class="form-check-input" name="communication" type="checkbox" value="1">
																	<span class="fw-semibold ps-2 fs-6">Categories</span>
																</label>
                                                                <label class="form-check form-check-custom form-check-inline form-check-solid me-3">
																	<input class="form-check-input" name="communication" type="checkbox" value="1">
																	<span class="fw-semibold ps-2 fs-6">Custom Fields</span>
																</label>
                                                    </div>
                                                    <!--end::Description-->
                                                </div>
                                            </div>
                                        </td>
                                        <!--end::Category=-->
                                        <!--begin::Type=-->
                                        <td class="float-end mr-10">
                                            <!--begin::Badges-->
                                            <a href="#" class="btn btn-icon btn-success btn-sm mr-2"><i class="bi bi-pencil fs-4"></i></a>
                                            <a href="#" class="btn btn-icon btn-danger btn-sm mr-2"><i class="bi bi-trash fs-4"></i></a>
                                            <a href="#" class="btn btn-icon btn-success btn-sm mr-2"><i class="bi bi-people-fill fs-4"></i></a>

                                            <!--end::Badges-->
                                        </td>
                                        <!--end::Type=-->

                                    </tr>

                                    @endforeach


                                    <!--end::Table row-->
                                </tbody>
                                <!--end::Table body-->
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

@section('custom-scripts')
    <script src="{{ asset('assets/js/custom/apps/ecommerce/catalog/categories.js') }}"></script>
@endsection
