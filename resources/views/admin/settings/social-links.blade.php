@extends('admin.layouts.master')

@section('title', 'Dealfair | Social Links Settings')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Settings</h1>
                    {{ Breadcrumbs::render('adminSocialLinkSettingPage') }}
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
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Facebook
                                                Link</label>
                                            <input type="url" name="facebook_link"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="https://www.facebook.com/username"
                                                   value="{{ old('facebook_link', GlobalHelper::getSettingValue('facebook_link')) }}"/>
                                            @if ($errors->has('facebook_link'))
                                                <div class="text-danger">
                                                    {{ $errors->first('facebook_link') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Twitter
                                                Link</label>
                                            <input type="url" name="twitter_link"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="https://twitter.com/username"
                                                   value="{{ old('twitter_link',GlobalHelper::getSettingValue('twitter_link')) }}"/>
                                            @if ($errors->has('twitter_link'))
                                                <div class="text-danger">
                                                    {{ $errors->first('twitter_link') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Youtube Link</label>
                                            <input type="url" name="youtube_link"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="https://www.youtube.com/username"
                                                   value="{{ old('youtube_link', GlobalHelper::getSettingValue('youtube_link')) }}"/>
                                            @if ($errors->has('youtube_link'))
                                                <div class="text-danger">
                                                    {{ $errors->first('youtube_link') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Linkedin Link</label>
                                            <input type="url" name="linkedin_link"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="https://linkedin.com/username"
                                                   value="{{ old('linkedin_link',GlobalHelper::getSettingValue('linkedin_link')) }}"/>
                                            @if ($errors->has('linkedin_link'))
                                                <div class="text-danger">
                                                    {{ $errors->first('linkedin_link') }}
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
