@extends('admin.layouts.master')

@section('title', 'Dealfair | Pusher Settings')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Settings</h1>
                    {{ Breadcrumbs::render('adminPusherSettingPage') }}
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
                                    action="{{ route('admin.settings.storeupdate') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mt-6 mb-6">
                                            <div class="d-flex flex-column flex-wrap me-3">
                                                <h2 class="d-flex fs-3 flex-column justify-content-center my-0">Production
                                                    Pusher
                                                    Settings</h2>
                                                <span class="text-muted bold text-dark">This settings will be used when
                                                    website is in production mode</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Pusher App
                                                Id</label>
                                            <input type="text" name="pusher_app_id"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter pusher app id here..."
                                                value="{{ old('pusher_app_id', GlobalHelper::getSettingValue('pusher_app_id')) }}" />
                                            @if ($errors->has('pusher_app_id'))
                                                <div class="text-danger">
                                                    {{ $errors->first('pusher_app_id') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Pusher App
                                                Key</label>
                                            <input type="text" name="pusher_app_key"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter pusher app key here..."
                                                value="{{ old('pusher_app_key', GlobalHelper::getSettingValue('pusher_app_key')) }}" />
                                            @if ($errors->has('pusher_app_key'))
                                                <div class="text-danger">
                                                    {{ $errors->first('pusher_app_key') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Pusher App
                                                Secret</label>
                                            <input type="text" name="pusher_app_secret"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter pusher app secret here..."
                                                value="{{ old('pusher_app_secret', GlobalHelper::getSettingValue('pusher_app_secret')) }}" />
                                            @if ($errors->has('pusher_app_secret'))
                                                <div class="text-danger">
                                                    {{ $errors->first('pusher_app_secret') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Pusher Port</label>
                                            <input type="number" name="pusher_port"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter pusher port here..."
                                                value="{{ old('pusher_port', GlobalHelper::getSettingValue('pusher_port')) }}" />
                                            @if ($errors->has('pusher_port'))
                                                <div class="text-danger">
                                                    {{ $errors->first('pusher_port') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Pusher
                                                Scheme</label>
                                            <select class="form-select form-control-lg mb-3 mb-lg-0" name="pusher_scheme">
                                                <option value="http"
                                                    {{ old('pusher_scheme', GlobalHelper::getSettingValue('pusher_scheme') === 'http' ? 'selected' : '') }}>
                                                    http
                                                </option>
                                                <option value="https"
                                                    {{ old('pusher_scheme', GlobalHelper::getSettingValue('pusher_scheme') === 'https' ? 'selected' : '') }}>
                                                    https
                                                </option>
                                            </select>
                                            @if ($errors->has('pusher_scheme'))
                                                <div class="text-danger">
                                                    {{ $errors->first('pusher_scheme') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Pusher App
                                                Cluster</label>
                                            <input type="text" name="pusher_app_cluster"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter pusher app cluster here..."
                                                value="{{ old('pusher_app_cluster', GlobalHelper::getSettingValue('pusher_app_cluster')) }}" />
                                            @if ($errors->has('pusher_app_cluster'))
                                                <div class="text-danger">
                                                    {{ $errors->first('pusher_app_cluster') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="seperator my-7"></div>
                                        <div class="col-md-12 mt-6 mb-6">
                                            <div class="d-flex flex-column flex-wrap me-3">
                                                <h2 class="d-flex fs-3 flex-column justify-content-center my-0">Development
                                                    Pusher
                                                    Settings</h2>
                                                <span class="text-muted bold text-dark">This settings will be used when
                                                    website is in developement mode</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Pusher App
                                                Id</label>
                                            <input type="text" name="development_pusher_app_id"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter development pusher app id here..."
                                                value="{{ old('development_pusher_app_id', GlobalHelper::getSettingValue('development_pusher_app_id')) }}" />
                                            @if ($errors->has('development_pusher_app_id'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_pusher_app_id') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Pusher App
                                                Key</label>
                                            <input type="text" name="development_pusher_app_key"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter development pusher app key here..."
                                                value="{{ old('development_pusher_app_key', GlobalHelper::getSettingValue('development_pusher_app_key')) }}" />
                                            @if ($errors->has('development_pusher_app_key'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_pusher_app_key') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Pusher App
                                                Secret</label>
                                            <input type="text" name="development_pusher_app_secret"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter development pusher app secret here..."
                                                value="{{ old('development_pusher_app_secret', GlobalHelper::getSettingValue('development_pusher_app_secret')) }}" />
                                            @if ($errors->has('development_pusher_app_secret'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_pusher_app_secret') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Pusher
                                                Port</label>
                                            <input type="number" name="development_pusher_port"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter development pusher port here..."
                                                value="{{ old('development_pusher_port', GlobalHelper::getSettingValue('development_pusher_port')) }}" />
                                            @if ($errors->has('development_pusher_port'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_pusher_port') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Pusher
                                                Scheme</label>
                                            <select class="form-select form-control-lg mb-3 mb-lg-0"
                                                name="development_pusher_scheme">
                                                <option value="http"
                                                    {{ old('development_pusher_scheme', GlobalHelper::getSettingValue('development_pusher_scheme') === 'http' ? 'selected' : '') }}>
                                                    http
                                                </option>
                                                <option value="https"
                                                    {{ old('development_pusher_scheme', GlobalHelper::getSettingValue('development_pusher_scheme') === 'https' ? 'selected' : '') }}>
                                                    https
                                                </option>
                                            </select>
                                            @if ($errors->has('development_pusher_scheme'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_pusher_scheme') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Pusher App
                                                Cluster</label>
                                            <input type="text" name="development_pusher_app_cluster"
                                                class="form-control form-control-lg mb-3 mb-lg-0"
                                                placeholder="Enter development pusher app cluster here..."
                                                value="{{ old('development_pusher_app_cluster', GlobalHelper::getSettingValue('development_pusher_app_cluster')) }}" />
                                            @if ($errors->has('development_pusher_app_cluster'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_pusher_app_cluster') }}
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
