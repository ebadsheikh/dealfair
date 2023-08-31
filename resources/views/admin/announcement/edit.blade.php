@extends('admin.layouts.master')

@section('title', 'Add Announcement')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Announcement</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a class="text-muted text-hover-primary">Edit Announcement</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ url()->previous() }}" class="btn btn-sm fw-bold btn-primary"><i class="bi bi-arrow-left"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="card card-p-0 card-flush">
                        <div class="card-body">
                            <div class="card card-flush py-4">
                                <form class="row g-5 pt-5" method="POST" enctype="multipart/form-data" action="{{Route('admin.announcement.update', $announcement->id)}}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group row mb-6">
                                            <div class="col-md-6">
                                                <label class="col-form-label required fw-semibold fs-6">Title</label>
                                                <input type="text" name="title" class="form-control form-control-lg mb-3 mb-lg-0" placeholder="Title" value="{{$announcement->title}}" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label required fw-semibold fs-6">Status</label>
                                                <select name="status" aria-label="Select" data-placeholder="Select status" class="form-select form-select-lg fw-semibold">
                                                    <option value="selected">Select status</option>
                                                    <option value="published" {{$announcement->status == 'published'? 'selected': ''}}>Published</option>
                                                    <option value="unpublished" {{$announcement->status == 'unpublished'? 'selected': ''}}>Unpublished</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-6">
                                            <div class="col-md-6">
                                                <label class="col-form-label required fw-semibold fs-6">Start Date</label>
                                                <input type="date" name="start_date" class="form-control form-control-lg mb-3 mb-lg-0" placeholder="Short Title" value="{{$announcement->start_date}}" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label required fw-semibold fs-6">End Date</label>
                                                <input type="date" name="end_date" class="form-control form-control-lg mb-3 mb-lg-0" placeholder="Short Title" value="{{$announcement->end_date}}" />
                                            </div>
                                        </div>
                                        <div class="form-group row mb-6">
                                            <div class="col-md-12 mb-6">
                                            <label class="col-form-label required fw-semibold fs-6">Description</label>
                                            <textarea name="description" id="kt_docs_ckeditor_classic">{{$announcement->description}}</textarea>
                                        </div>
                                        {{-- <div class="col-md-2 mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label required fw-semibold fs-6">Show Alert</label>
                                            <!--end::Label-->
                                            <label class="form-check form-check-custom form-check-inline form-check-solid me-3"> <input class="form-check-input" name="alert" type="checkbox" value="1" {{$announcement->alert == 1? 'checked' : ''}}>
                                        </div> --}}
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ url()->previous() }}" id="kt_ecommerce_edit_order_cancel"
                                            class="btn btn-light me-5">Cancel</a>
                                        <button type="submit" id="kt_ecommerce_edit_order_submit" class="btn btn-primary">
                                            <span class="indicator-label">Update</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
