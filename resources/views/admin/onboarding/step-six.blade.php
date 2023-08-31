@extends('admin.layouts.master')

@section('title', 'Dealfair | Onboarding Step Six')

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
                            <a class="text-muted text-hover-primary">Step Six</a>
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
                                            <h2>OnBoarding Setting Step Six</h2>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Step Six Left Side
                                                Title</label>
                                            <input type="text" name="step_six_left_side_title"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter step six left side title here..."
                                                   value="{{ old('step_six_left_side_title',GlobalHelper::getSettingValue('step_six_left_side_title')) }}"/>
                                            @if ($errors->has('step_six_left_side_title'))
                                                <div class="text-danger">
                                                    {{ $errors->first('step_six_left_side_title') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Step Six Left Side
                                                SubTitle</label>
                                            <input type="text" name="step_six_left_side_subtitle"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter step six left side subtitle here..."
                                                   value="{{ old('step_six_left_side_subtitle',GlobalHelper::getSettingValue('step_six_left_side_subtitle')) }}"/>
                                            @if ($errors->has('step_six_left_side_subtitle'))
                                                <div class="text-danger">
                                                    {{ $errors->first('step_six_left_side_subtitle') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Step Six Form
                                                Title</label>
                                            <input type="text" name="step_six_form_title"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter step five form title here..."
                                                   value="{{ old('step_six_form_title',GlobalHelper::getSettingValue('step_six_form_title')) }}"/>
                                            @if ($errors->has('step_six_form_title'))
                                                <div class="text-danger">
                                                    {{ $errors->first('step_six_form_title') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Step Six Form
                                                SubTitle</label>
                                            <input type="text" name="step_six_form_subtitle"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter step six form subtitle here..."
                                                   value="{{ old('step_six_form_subtitle',GlobalHelper::getSettingValue('step_six_form_subtitle')) }}"/>
                                            @if ($errors->has('step_six_form_subtitle'))
                                                <div class="text-danger">
                                                    {{ $errors->first('step_six_form_subtitle') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <label class="col-form-label required fw-semibold fs-6">Step Six Seller Video</label>
                                            <input type="file" name="step_six_seller_video"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   value="{{ old('step_six_seller_video',GlobalHelper::getSettingValue('step_six_seller_video')) }}"/>
                                            <a href="{{GlobalHelper::getSettingValue('step_six_seller_video')}}" target="_blank">{{GlobalHelper::getSettingValue('step_six_seller_video')}}</a>
                                            @if($errors->has('step_six_seller_video'))
                                                <div class="text-danger">
                                                    {{ $errors->first('step_six_seller_video') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <label class="col-form-label required fw-semibold fs-6">Step Six Buyer Video</label>
                                            <input type="file" name="step_six_buyer_video"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   value="{{ old('step_six_buyer_video',GlobalHelper::getSettingValue('step_six_buyer_video')) }}"/>
                                            <a href="{{GlobalHelper::getSettingValue('step_six_buyer_video')}}" target="_blank">{{GlobalHelper::getSettingValue('step_six_buyer_video')}}</a>
                                            @if ($errors->has('step_six_buyer_video'))
                                                <div class="text-danger">
                                                    {{ $errors->first('step_six_buyer_video') }}
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
