@extends('admin.layouts.master')

@section('title', 'Dealfair | Media Settings')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Settings</h1>
                    {{ Breadcrumbs::render('adminMediaSettingPage') }}
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
                                                <h2>Default Media Settings</h2>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label required fw-semibold fs-6">Default Avatar Image</label>
                                                <div class="input-group mb-5">
                                                    <input type="text" name="website_default_avatar_image" class="form-control form-control-lg mb-3 mb-lg-0" placeholder="2"
                                                           value="{{ old('website_default_avatar_image',GlobalHelper::getSettingValue('website_default_avatar_image')) }}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label required fw-semibold fs-6">Default Listing Image</label>
                                                <div class="input-group mb-5">
                                                    <input type="text" name="website_default_listing_image" class="form-control form-control-lg mb-3 mb-lg-0" placeholder="2"
                                                           value="{{ old('website_default_listing_image',GlobalHelper::getSettingValue('website_default_listing_image')) }}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label required fw-semibold fs-6">Default Community Image</label>
                                                <div class="input-group mb-5">
                                                    <input type="text" name="website_default_community_image" class="form-control form-control-lg mb-3 mb-lg-0"
                                                           value="{{ old('website_default_community_image',GlobalHelper::getSettingValue('website_default_community_image')) }}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label required fw-semibold fs-6">Default Store Thumbnail</label>
                                                <div class="input-group mb-5">
                                                    <input type="text" name="website_default_store_thumbnail" class="form-control form-control-lg mb-3 mb-lg-0"
                                                           value="{{ old('website_default_store_thumbnail',GlobalHelper::getSettingValue('website_default_store_thumbnail')) }}"/>
                                                </div>
                                            </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Default Store
                                                Logo</label>
                                            <div class="input-group mb-5">
                                                <input type="text" name="website_default_store_Logo"
                                                       class="form-control form-control-lg mb-3 mb-lg-0" placeholder="2"
                                                       value="{{ old('website_default_store_Logo',GlobalHelper::getSettingValue('website_default_store_Logo')) }}"/>
                                            </div>
                                        </div>
                                        </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-6 mb-6">
                                            <h2>Media Validation Settings</h2>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Max. Picture size (mb)</label>

                                            <div class="input-group mb-5">
                                                <input type="number" name="max_picture_size" class="form-control form-control-lg mb-3 mb-lg-0" placeholder="2" aria-label="2" aria-describedby="basic-addon2"
                                                       value="{{ old('max_picture_size',GlobalHelper::getSettingValue('max_picture_size')) }}"/>
                                                <span class="input-group-text" id="basic-addon2">number</span>
                                            </div>
                                            @if ($errors->has('max_picture_size'))
                                                <div class="text-danger">
                                                    {{ $errors->first('max_picture_size') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Max. Video duration</label>

                                            <div class="input-group mb-5">
                                                <input type="number" name="max_video_duration" class="form-control form-control-lg mb-3 mb-lg-0" placeholder="60" aria-label="60" aria-describedby="basic-addon2"
                                                       value="{{ old('max_video_duration',GlobalHelper::getSettingValue('max_video_duration')) }}"/>
                                                <span class="input-group-text" id="basic-addon2">seconds</span>
                                            </div>
                                            @if ($errors->has('max_video_duration'))
                                                <div class="text-danger">
                                                    {{ $errors->first('max_video_duration') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Max. Video size (mb)</label>

                                            <div class="input-group mb-5">
                                                <input type="number" name="max_video_size" class="form-control form-control-lg mb-3 mb-lg-0" placeholder="20" aria-label="20" aria-describedby="basic-addon2"
                                                       value="{{ old('max_video_size',GlobalHelper::getSettingValue('max_video_size')) }}"/>
                                                <span class="input-group-text" id="basic-addon2">number</span>
                                            </div>
                                            @if ($errors->has('max_video_size'))
                                                <div class="text-danger">
                                                    {{ $errors->first('max_video_size') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Allowed Picture Types</label>
                                            <input type="text" name="allowed_picture_types"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="png,jpeg,gif,jpg"
                                                   value="{{ old('allowed_picture_types',GlobalHelper::getSettingValue('allowed_picture_types')) }}"/>
                                            @if ($errors->has('allowed_picture_types'))
                                                <div class="text-danger">
                                                    {{ $errors->first('allowed_picture_types') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Max Number Of Pictures</label>
                                            <input type="text" name="max_number_of_pictures"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="1"
                                                   value="{{ old('max_number_of_pictures',GlobalHelper::getSettingValue('max_number_of_pictures')) }}"/>
                                            @if ($errors->has('max_number_of_pictures'))
                                                <div class="text-danger">
                                                    {{ $errors->first('max_number_of_pictures') }}
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
