@extends('admin.layouts.master')

@section('title', 'Dealfair | Add Email Template')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Email Template</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a class="text-muted text-hover-primary">Add Email Templates</a>
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
                                <form class="row g-5 pt-5" method="POST" enctype="multipart/form-data"
                                      action="{{route('admin.email-templates.update', $emailTemplate->key)}}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group row mb-6">
                                            <div class="col-md-12">
                                                <label class="col-form-label required fw-semibold fs-6">Template Name</label>
                                                <input type="text" name="name" class="form-control form-control-lg mb-3 mb-lg-0"
                                                       placeholder="Enter template name here..."
                                                       value="{{ old('name', $emailTemplate->name) }}"/>
                                                @if ($errors->has('name'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('name') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-12">
                                                <label class="col-form-label required fw-semibold fs-6">Subject</label>
                                                <input type="text" name="subject" class="form-control form-control-lg mb-3 mb-lg-0"
                                                       placeholder="Enter subject here..."
                                                       value="{{ old('subject', $emailTemplate->subject) }}"/>
                                                @if ($errors->has('subject'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('subject') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="col-form-label required fw-semibold fs-6">Template Content</label>
                                                <textarea class="form-control tinymce_editor" name="content" rows="10">{{old('content', $emailTemplate->content)}}</textarea>
                                                @if ($errors->has('content'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('content') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-12 d-flex justify-content-end">
                                                <a href="{{ url()->previous() }}" class="btn btn-light me-5">Back</a>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>

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
@push('custom-scripts')
    <script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    @include('custom-scripts.tinymce')
@endpush
