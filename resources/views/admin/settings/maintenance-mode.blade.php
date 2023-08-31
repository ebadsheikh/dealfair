@extends('admin.layouts.master')

@section('title', 'Dealfair | Maintenance Mode')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Settings</h1>
                    {{ Breadcrumbs::render('adminMaintenanceSettingPage') }}
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
                                    action="{{ route('admin.settings.enable.maintenance.mode') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="col-form-label required fw-semibold fs-6">Enable Maintenance
                                                Mode</label>
                                            <select class="form-select" name="enable_maintenance_mode">
                                                <option>Please Select Mode</option>
                                                <option value="1"
                                                    {{ old('enable_maintenance_mode', GlobalHelper::getSettingValue('enable_maintenance_mode') === '1' ? 'selected' : '') }}>
                                                    Yes</option>
                                                <option value="0"
                                                    {{ old('enable_maintenance_mode', GlobalHelper::getSettingValue('enable_maintenance_mode') === '0' ? 'selected' : '') }}>
                                                    No</option>
                                            </select>
                                            @if ($errors->has('enable_maintenance_mode'))
                                                <div class="text-danger">
                                                    {{ $errors->first('enable_maintenance_mode') }}
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
