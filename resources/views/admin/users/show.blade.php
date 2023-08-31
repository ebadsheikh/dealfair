@extends('admin.layouts.master')

@section('title', 'User')

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
                            <a href="#" class="text-mute">All Users</a>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
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
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-4"></span>
                                    <input type="text" data-kt-filter="search"
                                        class="form-control form-control-solid w-250px ps-14" placeholder="Search " />
                                </div>
                                <!--end::Search-->
                                <!--begin::Export buttons-->
                                <div id="kt_datatable_example_1_export" class="d-none"></div>
                                <!--end::Export buttons-->
                            </div>
                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                <!--begin::Export dropdown-->
                                <a href="{{ Route('admin.user.add') }}" type="button" class="btn btn-primary"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                    </span>Add New Staff</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($users as $user)
                                        <tr>
                                            <!--begin::Category=-->
                                            <td class="w-50">
                                                <div class="d-flex">
                                                    <!--begin::Thumbnail-->

                                                    @if ($user->getFirstMediaUrl('user_image'))
                                                        <a href="#" class="symbol symbol-50px">
                                                            <span class="symbol-label"
                                                                style="background-image:url({{ $user->getFirstMediaUrl('user_image') }});"></span>
                                                        </a>
                                                    @else
                                                        <a href="#" class="symbol symbol-50px">
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
                                                        <div class="text-muted fs-7 fw-bold"><a
                                                                href="">{{ $user->email }}</a>
                                                            <a href="" class="m-5"><i class="fa fa-user "></i>
                                                                user</a>
                                                            <a href=""><i class="fa fa-wallet"></i> $23</a>
                                                        </div>
                                                        <div class="text-muted fs-7 fw-bold">
                                                            <div class="progress mt-5">
                                                                <div class="progress-bar bg-primary" role="progressbar"
                                                                    style="width: 75%; color:white" aria-valuenow="75"
                                                                    aria-valuemin="0" aria-valuemax="100">75%
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Description-->
                                                    </div>
                                                </div>
                                            </td>
                                            <!--end::Category=-->
                                            <!--begin::Type=-->
                                            <td class="float-end">
                                                <!--begin::Badges-->
                                                <a href="{{ Route('admin.user.edit', $user->id) }}"
                                                    class="btn btn-icon btn-success btn-sm mr-2"><i
                                                        class="bi bi-pencil fs-4"></i></a>
                                                <a href="#" class="btn btn-icon btn-warning btn-sm mr-2"
                                                    data-bs-toggle="modal" data-bs-target="#deactivate"><i
                                                        class="bi bi-eye-fill fs-4"></i></a>

                                                <a href="#" class="btn btn-icon btn-primary btn-sm mr-2"
                                                    data-bs-toggle="modal" data-bs-target="#block"><i
                                                        class="bi bi-check-circle-fill fs-4"></i></a>
                                                <a href="#" class="btn btn-icon btn-danger btn-sm mr-2"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $user->id }}"><i
                                                        class="bi bi-trash fs-4"></i></a>
                                                <a href="#" class="btn btn-icon btn-success btn-sm mr-2"
                                                    data-bs-toggle="modal" data-bs-target="#admin"><i
                                                        class="bi bi-people-fill fs-4"></i></a>
                                                <a href="#" class="btn btn-info btn-sm mr-2" data-bs-toggle="modal"
                                                    data-bs-target="#verify">Verify</a>
                                                <a href="{{ Route('login.user.admin', $user->id) }}"
                                                    class="btn btn-secondary btn-sm mr-2">Login</a>

                                                <a href="#" class="btn btn-dark btn-sm mr-2">product</a>
                                                <!--end::Badges-->
                                            </td>
                                            <!--end::Type=-->

                                        </tr>
                                        <div class="modal fade" tabindex="-1" id="verify">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3>Verify</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to verify ?</p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-danger">Ok</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" tabindex="-1" id="delete{{ $user->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3>Delete</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete ?</p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <a href="{{ Route('admin.user.destroy', $user->id) }}"
                                                            type="button" class="btn btn-danger">Ok</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" tabindex="-1" id="deactivate">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3>Deactivate</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to deactivate?</p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-danger">Ok</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" tabindex="-1" id="block">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3>Block</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to Block ?</p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-danger">Ok</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" tabindex="-1" id="admin">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3>Admin User</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to add Admin User ?</p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-danger">Ok</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!--begin::Table row-->

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
