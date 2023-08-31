@extends('admin.layouts.master')

@section('title', 'Dealfair | Social Auth Settings')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Settings</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a class="text-muted text-hover-primary">Social Auth Settings</a>
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
                                <form class="row g-5 pt-5" method="POST"
                                      action="{{route('admin.settings.storeupdate')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mt-6 mb-6">
                                            <div class="d-flex flex-column flex-wrap me-3">
                                                <h2 class="d-flex fs-3 flex-column justify-content-center my-0">
                                                    Facebook Auth Settings</h2>
                                                <span class="text-muted bold text-dark">This settings will be used for facebook authentication.</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="col-form-label required fw-semibold fs-6">Enable Facebook
                                                Login</label>
                                            <select class="form-select form-control-lg mb-3 mb-lg-0"
                                                    name="enable_facebook_login">
                                                <option
                                                    value="1" {{ old('enable_facebook_login', GlobalHelper::getSettingValue('enable_facebook_login')) === '1' ? 'selected' : '' }}>
                                                    Yes
                                                </option>
                                                <option
                                                    value="0" {{ old('enable_facebook_login', GlobalHelper::getSettingValue('enable_facebook_login')) === '0' ? 'selected' : '' }}>
                                                    No
                                                </option>
                                            </select>
                                            @if ($errors->has('enable_facebook_login'))
                                                <div class="text-danger">
                                                    {{ $errors->first('enable_facebook_login') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Facebook App
                                                Id</label>
                                            <input type="text" name="facebook_app_id"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter facebook app id here..."
                                                   value="{{ old('facebook_app_id',GlobalHelper::getSettingValue('facebook_app_id')) }}"/>
                                            @if ($errors->has('facebook_app_id'))
                                                <div class="text-danger">
                                                    {{ $errors->first('facebook_app_id') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Facebook App
                                                Secret</label>
                                            <input type="text" name="facebook_app_secret"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter facebook app secret here..."
                                                   value="{{ old('facebook_app_secret',GlobalHelper::getSettingValue('facebook_app_secret')) }}"/>
                                            @if ($errors->has('facebook_app_secret'))
                                                <div class="text-danger">
                                                    {{ $errors->first('facebook_app_secret') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-md-12 mt-6 mb-6">
                                            <h2 class="d-flex fs-3 flex-column justify-content-center my-0">Google Auth
                                                Settings</h2>
                                            <span class="text-muted bold text-dark">This settings will be used for Google authentication.</span>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="col-form-label required fw-semibold fs-6">Enable Google
                                                Login</label>
                                            <select class="form-select form-control-lg mb-3 mb-lg-0"
                                                    name="enable_google_login">
                                                <option
                                                    value="1" {{ old('enable_google_login', GlobalHelper::getSettingValue('enable_google_login')) === '1' ? 'selected' : '' }}>
                                                    Yes
                                                </option>
                                                <option
                                                    value="0" {{ old('enable_google_login', GlobalHelper::getSettingValue('enable_google_login')) === '0' ? 'selected' : '' }}>
                                                    No
                                                </option>
                                            </select>
                                            @if ($errors->has('enable_google_login'))
                                                <div class="text-danger">
                                                    {{ $errors->first('enable_google_login') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Google App
                                                Id</label>
                                            <input type="text" name="google_app_id"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter google app id here..."
                                                   value="{{ old('google_app_id',GlobalHelper::getSettingValue('google_app_id')) }}"/>
                                            @if ($errors->has('google_app_id'))
                                                <div class="text-danger">
                                                    {{ $errors->first('google_app_id') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Google App
                                                Secret</label>
                                            <input type="text" name="google_app_secret"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter google app secret here..."
                                                   value="{{ old('google_app_secret',GlobalHelper::getSettingValue('google_app_secret')) }}"/>
                                            @if ($errors->has('google_app_secret'))
                                                <div class="text-danger">
                                                    {{ $errors->first('google_app_secret') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-md-12 mt-6 mb-6">
                                            <h2 class="d-flex fs-3 flex-column justify-content-center my-0">Apple Auth
                                                Settings</h2>
                                            <span class="text-muted bold text-dark">This settings will be used for Apple authentication.</span>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="col-form-label required fw-semibold fs-6">Enable Apple
                                                Login</label>
                                            <select class="form-select form-control-lg mb-3 mb-lg-0"
                                                    name="enable_apple_login">
                                                <option
                                                    value="1" {{ old('enable_apple_login', GlobalHelper::getSettingValue('enable_apple_login')) === '1' ? 'selected' : '' }}>
                                                    Yes
                                                </option>
                                                <option
                                                    value="0" {{ old('enable_apple_login', GlobalHelper::getSettingValue('enable_apple_login')) === '0' ? 'selected' : '' }}>
                                                    No
                                                </option>
                                            </select>
                                            @if ($errors->has('enable_apple_login'))
                                                <div class="text-danger">
                                                    {{ $errors->first('enable_apple_login') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Apple App Id</label>
                                            <input type="text" name="apple_app_id"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter apple app id here..."
                                                   value="{{ old('apple_app_id',GlobalHelper::getSettingValue('apple_app_id')) }}"/>
                                            @if ($errors->has('apple_app_id'))
                                                <div class="text-danger">
                                                    {{ $errors->first('apple_app_id') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Apple App
                                                Secret</label>
                                            <input type="text" name="apple_app_secret"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter apple app secret here..."
                                                   value="{{ old('apple_app_secret',GlobalHelper::getSettingValue('apple_app_secret')) }}"/>
                                            @if ($errors->has('apple_app_secret'))
                                                <div class="text-danger">
                                                    {{ $errors->first('apple_app_secret') }}
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
