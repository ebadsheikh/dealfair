@extends('admin.layouts.master')

@section('title', 'Dealfair | Onboarding Step Four')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Onboarding Settings</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a class="text-muted text-hover-primary">Onboarding</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a class="text-muted text-hover-primary">Step Four</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="card card-p-0 card-flush">
                        <div class="card-body">
                            <div class="card card-flush py-4">
                                @if (Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session('error') }}
                                    </div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session('success') }}
                                    </div>
                                @endif
                                <form class="row g-5 pt-5" method="POST" enctype="multipart/form-data"
                                      action="{{route('admin.settings.storeupdate')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mt-6 mb-6">
                                            <h2>OnBoarding Setting Step Four</h2>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Step Four Left Side
                                                Title</label>
                                            <input type="text" name="step_four_left_side_title"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter step four left side title here..."
                                                   value="{{ old('step_four_left_side_title',GlobalHelper::getSettingValue('step_four_left_side_title')) }}"/>
                                            @if ($errors->has('step_four_left_side_title'))
                                                <div class="text-danger">
                                                    {{ $errors->first('step_four_left_side_title') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Step Four Left Side
                                                SubTitle</label>
                                            <input type="text" name="step_four_left_side_subtitle"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter step four left side subtitle here..."
                                                   value="{{ old('step_four_left_side_subtitle',GlobalHelper::getSettingValue('step_four_left_side_subtitle')) }}"/>
                                            @if ($errors->has('step_four_left_side_subtitle'))
                                                <div class="text-danger">
                                                    {{ $errors->first('step_four_left_side_subtitle') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Step Four Form
                                                Title</label>
                                            <input type="text" name="step_four_form_title"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter step four form title here..."
                                                   value="{{ old('step_four_form_title',GlobalHelper::getSettingValue('step_four_form_title')) }}"/>
                                            @if ($errors->has('step_four_form_title'))
                                                <div class="text-danger">
                                                    {{ $errors->first('step_four_form_title') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Step Four Form
                                                SubTitle</label>
                                            <input type="text" name="step_four_form_subtitle"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter step four form subtitle here..."
                                                   value="{{ old('step_four_form_subtitle',GlobalHelper::getSettingValue('step_four_form_subtitle')) }}"/>
                                            @if ($errors->has('step_four_form_subtitle'))
                                                <div class="text-danger">
                                                    {{ $errors->first('step_four_form_subtitle') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-12 d-flex justify-content-end mt-6">
                                            <a href="{{ url()->previous() }}" class="btn btn-light me-5">Back</a>
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
