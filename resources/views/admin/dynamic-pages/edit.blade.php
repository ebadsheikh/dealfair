@extends('admin.layouts.master')

@section('title', 'Edit Dynamic Pages')

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
                        Dynamic Pages</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a class="text-muted text-hover-primary">Edit Dynamic Page</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ url()->previous() }}" class="btn btn-sm fw-bold btn-primary"><i class="bi bi-arrow-left"></i>Go Back</a>
                </div>
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
                                <div class="form-group">
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger">
                                            {{ Session('error') }}
                                        </div>
                                    @endif
                                    @if (Session::has('message'))
                                        <div class="alert alert-success">
                                            {{ Session('message') }}
                                        </div>
                                    @endif
                                </div>
                                <form class="row g-5 pt-5" method="POST" enctype="multipart/form-data" action="{{ Route('admin.dynamic-pages.update',$dynamic_page->id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label required fw-semibold fs-6">Title</label>
                                            <!--end::Label-->
                                            <input type="text" name="title"
                                                class="form-control form-control-lg mb-3 mb-lg-0" placeholder="Title"
                                                value="{{ old('title', $dynamic_page->title) }}" />
                                            @error('title')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label required fw-semibold fs-6">Short Title</label>
                                            <!--end::Label-->
                                            <input type="text" name="short_title"
                                                class="form-control form-control-lg mb-3 mb-lg-0" placeholder="Short Title"
                                                value="{{ old('short_title', $dynamic_page->short_title) }}" />
                                        </div>
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label required fw-semibold fs-6">Permalink</label>
                                            <!--end::Label-->
                                            <input type="text" name="permalink"
                                                class="form-control form-control-lg mb-3 mb-lg-0" placeholder="Permalink"
                                                value="{{ old('permalink', $dynamic_page->permalink) }}" />
                                        </div>
                                        <div class="col-md-12 mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label required fw-semibold fs-6">Content</label>
                                            <!--end::Label-->
                                            <textarea name="content" id="kt_docs_ckeditor_classic">
                                                            <p>{{ old('content', $dynamic_page->content) }}</p>
                                                        </textarea>
                                            @error('content')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
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

@section('custom-scripts')
    <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script>
        ClassicEditor.create(document.querySelector('#kt_docs_ckeditor_classic'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
