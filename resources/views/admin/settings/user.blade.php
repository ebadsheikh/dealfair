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
                        User</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">User Setting</a>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
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
                    <div class="card card-p-0 card-flush">
                        <div class="card-body">
                            <div class="card card-flush py-4">
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Users Authentication</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <select name="currnecy" aria-label="Select a Currency" data-control="select2"
                                                data-placeholder="Select "
                                                class="form-select form-select-lg">
                                                <option value="">Enabled</option>
                                                <option value="">Disabled</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Users Confirmation Method</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <select name="currnecy" aria-label="Select a Currency" data-control="select2"
                                                data-placeholder=""
                                                class="form-select form-select-lg">
                                                <option value="">User must activate their own account</option>
                                                <option value="">The admin must activate each account</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Users Confirmation Method</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <select name="currnecy" aria-label="Select a Currency" data-control="select2"
                                                data-placeholder=""
                                                class="form-select form-select-lg">
                                                <option value="">User must activate their own account</option>
                                                <option value="">The admin must activate each account</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Facebook login</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <select name="currnecy" aria-label="Select a Currency" data-control="select2"
                                                data-placeholder=""
                                                class="form-select form-select-lg">
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Facebook app id</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row">
                                                    <input type="text" name="name"
                                                        class="form-control form-control-lg mb-3 mb-lg-0"
                                                        placeholder="Delete auction older then" value="533772507740818" />
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Facebook app secret</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row">
                                                    <input type="text" name="name"
                                                        class="form-control form-control-lg mb-3 mb-lg-0"
                                                        placeholder="Delete auction older then" value="0986f7f226960b46a89b6bcbf45f2f97" />
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Google login</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <select name="currnecy" aria-label="Select a Currency" data-control="select2"
                                                data-placeholder=""
                                                class="form-select form-select-lg">
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Google app id</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row">
                                                    <input type="text" name="name"
                                                        class="form-control form-control-lg mb-3 mb-lg-0"
                                                        placeholder="Delete auction older then" value="1060389322188-prtk14rnfoj2cm39pagh3rqvn5dpiem7.apps.googleusercontent.com" />
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Google app secret</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-12 fv-row">
                                                    <input type="text" name="name"
                                                        class="form-control form-control-lg mb-3 mb-lg-0"
                                                        placeholder="Delete auction older then" value="T8CrpqM6NfRq2FhNwXa7Qfxi" />
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                </div>
                                <!--end::Card body-->

                            </div>
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
    <script src="{{ asset('assets/js/custom/account/settings/signin-methods.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/profile-details.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/deactivate-account.js') }}"></script>
@endsection
