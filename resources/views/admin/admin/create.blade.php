@extends('admin.layouts.master')

@section('title', 'Dealfair | Add Admin')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Admin</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a class="text-muted text-hover-primary">Add Admin</a>
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
                                <form action="{{ Route('admin.store') }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group mb-6">
                                            <label class="col-form-label fw-semibold fs-6">Avatar</label>
                                            <div class="form-group">
                                                <div class="image-input image-input-outline" data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                         style="background-image: url({{ asset('assets/media/svg/avatars/blank.svg') }})">
                                                    </div>
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <input type="file" name="image"/>
                                                        <input type="hidden" name="avatar_remove"/>
                                                    </label>
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                </div>
                                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-6">
                                            <label class="col-form-label required fw-semibold fs-6">Full Name</label>
                                            <input type="text" name="name"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter full name here"
                                                   value="{{ old('name') }}"/>
                                            @error('name')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-6">
                                            <label class="col-form-label required fw-semibold fs-6">Email</label>
                                            <input type="text" name="email" class="form-control form-control-lg"
                                                   placeholder="Enter email here" value="{{ old('email') }}"/>
                                            @error('email')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <a href="" class="btn btn-lightbtn-active-light-primary me-2">Back</a>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
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
