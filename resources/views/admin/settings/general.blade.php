@extends('admin.layouts.master')

@section('title', 'Dealfair | General Settings')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Settings</h1>
                    {{ Breadcrumbs::render('adminGeneralSettingPage') }}
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
                                            <h2>Website Settings</h2>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Website Name</label>
                                            <input type="text" name="website_name"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter website name here..."
                                                   value="{{ old('website_name',GlobalHelper::getSettingValue('website_name')) }}"/>
                                            @if ($errors->has('website_name'))
                                                <div class="text-danger">
                                                    {{ $errors->first('website_name') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Website Copyright Text</label>
                                            <input type="text" name="website_copyright"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter website copyright here..."
                                                   value="{{ old('website_copyright',GlobalHelper::getSettingValue('website_copyright')) }}"/>
                                            @if ($errors->has('website_copyright'))
                                                <div class="text-danger">
                                                    {{ $errors->first('website_copyright') }}
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
