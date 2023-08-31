@extends('admin.layouts.master')

@section('title', 'Dealfair | Map Settings')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Map Settings</h1>
                    {{ Breadcrumbs::render('adminMapSettingPage') }}
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
                                <form class="row g-5 pt-5" method="POST" action="{{route('admin.settings.storeupdate')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mt-6 mb-6">
                                            <div class="d-flex flex-column flex-wrap me-3">
                                                <h2 class="d-flex fs-3 flex-column justify-content-center my-0">Production
                                                    Map
                                                    Settings</h2>
                                                <span class="text-muted bold text-dark">This settings will be used when
                                                    website is in production mode</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Enable Google Map</label>
                                            <select class="form-select form-control-lg mb-3 mb-lg-0" name="enable_google_map">
                                                <option value="1" {{GlobalHelper::getSettingValue('enable_google_map') === '1' ? 'selected' : ''}}>Yes</option>
                                                <option value="0" {{GlobalHelper::getSettingValue('enable_google_map') === '0' ? 'selected' : ''}}>No</option>
                                            </select>
                                            @if ($errors->has('enable_google_map'))
                                                <div class="text-danger">
                                                    {{ $errors->first('enable_google_map') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Google Map Api Key</label>
                                            <input type="text" name="google_map_api_key"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter google map API key here..."
                                                   value="{{ old('google_map_api_key',GlobalHelper::getSettingValue('google_map_api_key')) }}"/>
                                            @if ($errors->has('google_map_api_key'))
                                                <div class="text-danger">
                                                    {{ $errors->first('google_map_api_key') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Map Key Account Reference</label>
                                            <input type="text" name="map_key_account_reference"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter map key account reference here..."
                                                   value="{{ old('map_key_account_reference',GlobalHelper::getSettingValue('map_key_account_reference')) }}"/>
                                            @if ($errors->has('map_key_account_reference'))
                                                <div class="text-danger">
                                                    {{ $errors->first('map_key_account_reference') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="seperator my-7"></div>
                                        <div class="col-md-12 mt-6 mb-6">
                                            <div class="d-flex flex-column flex-wrap me-3">
                                                <h2 class="d-flex fs-3 flex-column justify-content-center my-0">Development
                                                    Map
                                                    Settings</h2>
                                                <span class="text-muted bold text-dark">This settings will be used when
                                                    website is in developement mode</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Enable Google Map</label>
                                            <select class="form-select form-control-lg mb-3 mb-lg-0" name="development_enable_google_map">
                                                <option value="1" {{GlobalHelper::getSettingValue('development_enable_google_map') === '1' ? 'selected' : ''}}>Yes</option>
                                                <option value="0" {{GlobalHelper::getSettingValue('development_enable_google_map') === '0' ? 'selected' : ''}}>No</option>
                                            </select>
                                            @if ($errors->has('development_enable_google_map'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_enable_google_map') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Google Map Api Key</label>
                                            <input type="text" name="development_google_map_api_key"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter google map API key here..."
                                                   value="{{ old('development_google_map_api_key',GlobalHelper::getSettingValue('development_google_map_api_key')) }}"/>
                                            @if ($errors->has('development_google_map_api_key'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_google_map_api_key') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Map Key Account Reference</label>
                                            <input type="text" name="development_map_key_account_reference"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter map key account reference here..."
                                                   value="{{ old('development_map_key_account_reference',GlobalHelper::getSettingValue('development_map_key_account_reference')) }}"/>
                                            @if ($errors->has('development_map_key_account_reference'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_map_key_account_reference') }}
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
