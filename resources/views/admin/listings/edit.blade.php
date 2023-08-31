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
                        Products</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Edit Products</a>
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
                            <div class="card card-flush py-4">
                                <form class="row g-5 pt-5" method="POST" enctype="multipart/form-data" action="">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-6 col-form-label required fw-bold fs-6">Listing Title</label>
                                            <input type="text" name="listing_title" class="form-control"
                                                placeholder="Listing Title">
                                            @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>


                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-6 col-form-label required fw-bold fs-6">Listing
                                                Type</label>
                                            <input type="text" name="listing_type" class="form-control"
                                                placeholder="Listing Type" value="Direct Sell">
                                            @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>

                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-6 col-form-label required fw-bold fs-6">Category</label>
                                                <select id="my-select" class="form-control" name="">

                                                    <option>Electronics</option>
                                                    <option>Office</option>
                                                    <option>Sporting</option>
                                                    <option>Home</option>
                                                </select>
                                            @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-6 col-form-label required fw-bold fs-6">Sub Category</label>
                                                <select id="my-select" class="form-control" name="">
                                                    <option value="">Select Sub Category</option>
                                                    <option>Electronics</option>
                                                    <option>Office</option>
                                                    <option>Sporting</option>
                                                    <option>Home</option>
                                                </select>
                                            @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-6 col-form-label required fw-bold fs-6">Community</label>
                                                <select id="my-select" class="form-control" name="">
                                                    <option value="">Select Community</option>
                                                    <option>Electronics</option>
                                                    <option>Office</option>
                                                    <option>Sporting</option>
                                                    <option>Home</option>
                                                </select>
                                            @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-6 col-form-label required fw-bold fs-6">User</label>
                                                <select id="my-select" class="form-control" name="">
                                                    <option value="">Select User</option>
                                                    <option>Electronics</option>
                                                    <option>Office</option>
                                                    <option>Sporting</option>
                                                    <option>Home</option>
                                                </select>
                                            @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-6 col-form-label required fw-bold fs-6">Brand</label>
                                            <input type="text" name="listing_title" class="form-control"
                                                placeholder="Brand">
                                            @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-6 col-form-label required fw-bold fs-6">#Tags</label>
                                            <input type="text" name="listing_title" class="form-control"
                                                placeholder="Tags">
                                            @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-6 col-form-label required fw-bold fs-6">Tell us about your listings</label>
                                            <textarea type="text" name="listing_title" class="form-control"
                                                placeholder="Tell us about your listings"></textarea>
                                            @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-6 col-form-label required fw-bold fs-6">Start Date</label>
                                            <input type="datetime" name="listing_title" class="form-control"
                                                placeholder="Brand">
                                            @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-6 col-form-label required fw-bold fs-6">End Date</label>
                                            <input type="datetime" name="listing_title" class="form-control"
                                                placeholder="Brand">
                                            @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-6 col-form-label required fw-bold fs-6">Status</label>
                                                <select id="my-select" class="form-control" name="">
                                                    <option value="">Select Status</option>
                                                    <option>Created</option>
                                                    <option>Published</option>
                                                    <option>Unpublish</option>
                                                    <option>Blocked</option>
                                                </select>
                                            @if ($errors->has('name'))
                                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>


                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-12 col-form-label required fw-bold fs-6">Image</label>
                                            @include('admin.partials.dropzone')
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Button-->
                                        <a href="{{ url()->previous() }}" id="kt_ecommerce_edit_order_cancel"
                                            class="btn btn-light me-5">Cancel</a>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        <button type="submit" id="kt_ecommerce_edit_order_submit" class="btn btn-primary">
                                            <span class="indicator-label">{{ __('Save') }}</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </form>
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
