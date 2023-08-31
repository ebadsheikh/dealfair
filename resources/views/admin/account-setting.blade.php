@extends('admin.layouts.master')

@section('title', 'Account Settings')

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
                        Setting</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a class="text-muted text-hover-primary">Account Settings</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container ">
                <form class="form " method="POST" enctype="multipart/form-data"
                      action="{{ Route('admin.update', $user->id) }}">
                    @csrf
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Profile Picture</h2>
                                    </div>
                                </div>
                                <div class="card-body text-center pt-0">
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                         style="background-image: url('{{ asset('assets/media/svg/avatars/blank.svg') }}')">
                                        <!--begin::Preview existing avatar-->
                                        @if ($user->getFirstMediaUrl('user_image'))
                                            <div class="image-input-wrapper w-125px h-125px"
                                                 style="background-image: url({{ $user->getFirstMediaUrl('user_image') }})">
                                            </div>
                                        @else
                                            <div class="image-input-wrapper w-125px h-125px"
                                                 style="background-image: url({{ asset('assets/media/svg/avatars/blank.svg') }})">
                                            </div>
                                        @endif

                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="image"/>
                                            <input type="hidden" name="avatar_remove"/>
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Remove-->
                                    </div>
                                    <div class="text-muted fs-7 pt-2">
                                        {{ __('set the thumbnail. Only *.png, *.jpg and *.jpeg image files are accepted') }}
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Update Image</button>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Profile Detail</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="form-group row">
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-12 col-form-label required fw-bold fs-6">First
                                                Name</label>
                                            <input type="text" name="first_name" class="form-control"
                                                   placeholder="Enter First Name"
                                                   value="{{ old('first_name', $user->first_name) }}">
                                            @if ($errors->has('first_name'))
                                                <div class="text-danger">{{ $errors->first('first_name') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-12 col-form-label required fw-bold fs-6">Last
                                                Name</label>
                                            <input type="text" name="last_name" class="form-control"
                                                   placeholder="Enter Last Name"
                                                   value="{{ old('last_name', $user->last_name) }}">
                                            @if ($errors->has('last_name'))
                                                <div class="text-danger">{{ $errors->first('last_name') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <label class="col-lg-12 col-form-label required fw-bold fs-6">Email</label>
                                            <input type="text" name="email" class="form-control"
                                                   placeholder="Enter Email"
                                                   value="{{ old('email', $user->email) }}">
                                            @if ($errors->has('email'))
                                                <div class="text-danger">{{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>

                                    </div>


                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <a href="{{ url()->previous() }}" class="btn btn-light me-5">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </div>

                        </div>
                    </div>


                    <!--begin::Update Password-->
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                             data-bs-target="#kt_account_signin_method">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Update Password</h3>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Content-->
                        <div id="kt_account_settings_signin_method" class="collapse show">
                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                <form action="{{ Route('admin.account-settings.change-password') }}" method="post">
                                    @csrf
                                    <div class="card card-flush py-4">
                                        <div class="card-body pt-0">
                                            <div class="form-group row">
                                                <div class="col-lg-4 fv-row fv-plugins-icon-container">
                                                    <label class="col-lg-12 col-form-label required fw-bold fs-6">Current
                                                        Password</label>
                                                    <input type="text" name="current_password" class="form-control"
                                                           placeholder="Current Password"
                                                           value="{{ old('current_password') }}">
                                                    @if ($errors->has('current_password'))
                                                        <div
                                                            class="text-danger">{{ $errors->first('current_password') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-4 fv-row fv-plugins-icon-container">
                                                    <label class="col-lg-12 col-form-label required fw-bold fs-6">New
                                                        Password</label>
                                                    <input type="text" name="new_password" class="form-control"
                                                           placeholder="New Password" value="{{ old('new_password') }}">
                                                    @if ($errors->has('new_password'))
                                                        <div class="text-danger">{{ $errors->first('new_password') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-4 fv-row fv-plugins-icon-container">
                                                    <label class="col-lg-12 col-form-label required fw-bold fs-6">Confirm
                                                        Password</label>
                                                    <input type="text" name="confirm_password" class="form-control"
                                                           placeholder="Confirm Password"
                                                           value="{{ old('confirm_password') }}">
                                                    @if ($errors->has('confirm_password'))
                                                        <div
                                                            class="text-danger">{{ $errors->first('confirm_password') }}
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>


                                        </div>
                                        <div class="card-footer d-flex justify-content-end">
                                            <a href="{{ url()->previous() }}" class="btn btn-light me-5">Cancel</a>
                                            <button type="submit" class="btn btn-primary">Update Password</button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Update Password-->
                </form>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
@endsection
