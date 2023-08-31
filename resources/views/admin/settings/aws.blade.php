@extends('admin.layouts.master')

@section('title', 'Dealfair | AWS Settings')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Settings</h1>
                    {{ Breadcrumbs::render('adminAwsSettingPage') }}
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
                                    action="{{ route('admin.settings.storeupdate') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mt-6 mb-6">
                                            <div class="d-flex flex-column flex-wrap me-3">
                                                <h2 class="d-flex fs-3 flex-column justify-content-center my-0">
                                                    Production AWS Settings</h2>
                                                <span class="text-muted bold text-dark">This settings will be used when
                                                    website is in production mode</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Aws Access Key
                                                Id</label>
                                            <input type="text" name="aws_access_key_id"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter aws access key id here..."
                                                value="{{ old('aws_access_key_id', GlobalHelper::getSettingValue('aws_access_key_id')) }}" />
                                            @if ($errors->has('aws_access_key_id'))
                                                <div class="text-danger">
                                                    {{ $errors->first('aws_access_key_id') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Aws Secret Access
                                                Key</label>
                                            <input type="text" name="aws_secret_access_key"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter aws secret access key here..."
                                                value="{{ old('aws_secret_access_key', GlobalHelper::getSettingValue('aws_secret_access_key')) }}" />
                                            @if ($errors->has('aws_secret_access_key'))
                                                <div class="text-danger">
                                                    {{ $errors->first('aws_secret_access_key') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Aws Default
                                                Region</label>
                                            <input type="text" name="aws_default_region"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter aws default region here..."
                                                value="{{ old('aws_default_region', GlobalHelper::getSettingValue('aws_default_region')) }}" />
                                            @if ($errors->has('aws_default_region'))
                                                <div class="text-danger">
                                                    {{ $errors->first('aws_default_region') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Aws Bucket</label>
                                            <input type="text" name="aws_bucket"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter aws bucket here..."
                                                value="{{ old('aws_bucket', GlobalHelper::getSettingValue('aws_bucket')) }}" />
                                            @if ($errors->has('aws_bucket'))
                                                <div class="text-danger">
                                                    {{ $errors->first('aws_bucket') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Aws Use Path Style
                                                Endpoint</label>
                                            <select class="form-select form-control-lg mb-3 mb-lg-0"
                                                name="aws_use_path_style_endpoint">
                                                <option value="true"
                                                    {{ old(
                                                        'aws_use_path_style_endpoint',
                                                        GlobalHelper::getSettingValue('aws_use_path_style_endpoint') === 'true' ? 'selected' : '',
                                                    ) }}>
                                                    True
                                                </option>
                                                <option value="false"
                                                    {{ old(
                                                        'aws_use_path_style_endpoint',
                                                        GlobalHelper::getSettingValue('aws_use_path_style_endpoint') === 'false' ? 'selected' : '',
                                                    ) }}>
                                                    false
                                                </option>
                                            </select>
                                            @if ($errors->has('aws_use_path_style_endpoint'))
                                                <div class="text-danger">
                                                    {{ $errors->first('aws_use_path_style_endpoint') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-md-12 mt-6 mb-6">
                                            <h2 class="d-flex fs-3 flex-column justify-content-center my-0">Development
                                                AWS Settings</h2>
                                            <span class="text-muted bold text-dark">This settings will be used when website
                                                is in development mode</span>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Aws Access
                                                Key
                                                Id</label>
                                            <input type="text" name="development_aws_access_key_id"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter development aws access key id here..."
                                                value="{{ old('development_aws_access_key_id', GlobalHelper::getSettingValue('development_aws_access_key_id')) }}" />
                                            @if ($errors->has('development_aws_access_key_id'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_aws_access_key_id') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Aws Secret
                                                Access
                                                Key</label>
                                            <input type="text" name="development_aws_secret_access_key"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter development aws secret access key here..."
                                                value="{{ old('development_aws_secret_access_key', GlobalHelper::getSettingValue('development_aws_secret_access_key')) }}" />
                                            @if ($errors->has('development_aws_secret_access_key'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_aws_secret_access_key') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Aws Default
                                                Region</label>
                                            <input type="text" name="development_aws_default_region"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter development aws default region here..."
                                                value="{{ old('development_aws_default_region', GlobalHelper::getSettingValue('development_aws_default_region')) }}" />
                                            @if ($errors->has('development_aws_default_region'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_aws_default_region') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Aws
                                                Bucket</label>
                                            <input type="text" name="development_aws_bucket"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter development aws bucket here..."
                                                value="{{ old('development_aws_bucket', GlobalHelper::getSettingValue('development_aws_bucket')) }}" />
                                            @if ($errors->has('development_aws_bucket'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_aws_bucket') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Aws Use
                                                Path Style
                                                Endpoint</label>
                                            <select class="form-select form-control-lg mb-3 mb-lg-0"
                                                name="development_aws_use_path_style_endpoint">
                                                <option value="true"
                                                    {{ old(
                                                        'development_aws_use_path_style_endpoint',
                                                        GlobalHelper::getSettingValue('development_aws_use_path_style_endpoint') === 'true' ? 'selected' : '',
                                                    ) }}>
                                                    True
                                                </option>
                                                <option value="false"
                                                    {{ old(
                                                        'development_aws_use_path_style_endpoint',
                                                        GlobalHelper::getSettingValue('development_aws_use_path_style_endpoint') === 'false' ? 'selected' : '',
                                                    ) }}>
                                                    false
                                                </option>
                                            </select>
                                            @if ($errors->has('development_aws_use_path_style_endpoint'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_aws_use_path_style_endpoint') }}
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
