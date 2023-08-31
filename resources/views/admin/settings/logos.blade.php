@extends('admin.layouts.master')

@section('title', 'Dealfair | Logo Settings')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Settings</h1>
                    {{ Breadcrumbs::render('adminLogoSettingPage') }}
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
                                      action="{{route('admin.settings.storeupdate')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mt-6 mb-6">
                                            <h2>Website Logo Settings</h2>
                                        </div>
                                        <div class="col-8 mb-6">
                                            <label class="col-form-label fw-semibold fs-6">Fav icon</label>
                                            <input type="text" name="website_favicon"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter website favicon link here..."
                                                   value="{{ old('website_favicon',GlobalHelper::getSettingValue('website_favicon')) }}"/>
                                        </div>
                                        <div class="col-4 mb-6 mt-15">
                                            @if(GlobalHelper::getSettingValue('website_favicon'))
                                                <img class="shadow bg-white rounded-2 p-2" style="background-color: white;" src="{{asset(GlobalHelper::getSettingValue('website_favicon'))}}" height="40px" width="40px">
                                            @else
                                                <img class="shadow bg-white rounded-2 p-2" style="background-color: white;" src="{{asset('assets/media/svg/files/blank-image.svg')}}" height="70px" width="200px">
                                            @endif
                                        </div>

                                        <div class="col-8 mb-6">
                                            <label class="col-form-label fw-semibold fs-6">Only logo for light mode</label>
                                            <input type="text" name="website_only_logo_for_light_mode"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter website only logo light mode link here..."
                                                   value="{{ old('website_only_logo_for_light_mode',GlobalHelper::getSettingValue('website_only_logo_for_light_mode')) }}"/>
                                        </div>
                                        <div class="col-4 mb-6 mt-14">
                                            @if(GlobalHelper::getSettingValue('website_only_logo_for_light_mode'))
                                                <img class="shadow rounded-2 p-2" style="background-color: white;" src="{{asset(GlobalHelper::getSettingValue('website_only_logo_for_light_mode'))}}" height="50px" >
                                            @else
                                                <img class="shadow rounded-2 p-2" style="background-color: white;" src="{{asset('assets/media/svg/files/blank-image.svg')}}" height="70px" width="200px">
                                            @endif
                                        </div>

                                        <div class="col-8 mb-6">
                                            <label class="col-form-label fw-semibold fs-6">Only logo for dark mode</label>
                                            <input type="text" name="website_only_logo_for_dark_mode"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter website only logo dark mode link here..."
                                                   value="{{ old('website_only_logo_for_dark_mode',GlobalHelper::getSettingValue('website_only_logo_for_dark_mode')) }}"/>
                                        </div>
                                        <div class="col-4 mb-6 mt-10">
                                            @if(GlobalHelper::getSettingValue('website_only_logo_for_dark_mode'))
                                                <img class="shadow rounded-2 p-2" style="background-color: #bfb5ff;" src="{{asset(GlobalHelper::getSettingValue('website_only_logo_for_dark_mode'))}}" height="50px" >
                                            @else
                                                <img class="shadow rounded-2 p-2" style="background-color: #bfb5ff;" src="{{asset('assets/media/svg/files/blank-image.svg')}}" height="70px" width="200px">
                                            @endif
                                        </div>

                                        <div class="col-8 mb-6">
                                            <label class="col-form-label fw-semibold fs-6">Full logo for light mode</label>
                                            <input type="text" name="website_full_logo_for_light_mode"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter website full logo light mode link here..."
                                                   value="{{ old('website_full_logo_for_light_mode',GlobalHelper::getSettingValue('website_full_logo_for_light_mode')) }}"/>
                                        </div>
                                        <div class="col-4 mb-6 mt-10">
                                            @if(GlobalHelper::getSettingValue('website_full_logo_for_light_mode'))
                                                <img class="shadow rounded-2 p-2" src="{{asset(GlobalHelper::getSettingValue('website_full_logo_for_light_mode'))}}" height="70px" width="200px">
                                            @else
                                                <img class="shadow rounded-2 p-2" style="background-color: #bfb5ff;" src="{{asset('assets/media/svg/files/blank-image.svg')}}" height="70px" width="200px">
                                            @endif
                                        </div>

                                        <div class="col-8 mb-6">
                                            <label class="col-form-label fw-semibold fs-6">Full logo for dark mode</label>
                                            <input type="text" name="website_full_logo_for_dark_mode"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter website full logo dark mode link here..."
                                                   value="{{ old('website_full_logo_for_dark_mode',GlobalHelper::getSettingValue('website_full_logo_for_dark_mode')) }}"/>
                                        </div>
                                        <div class="col-4 mb-6 mt-10">
                                            @if(GlobalHelper::getSettingValue('website_full_logo_for_dark_mode'))
                                                <img class="shadow rounded-2 p-2" style="background-color: #bfb5ff;" src="{{asset(GlobalHelper::getSettingValue('website_full_logo_for_dark_mode'))}}" height="70px" width="200px">
                                            @else
                                                <img class="shadow rounded-2 p-2" style="background-color: #bfb5ff;" src="{{asset('assets/media/svg/files/blank-image.svg')}}" height="70px" width="200px">
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
