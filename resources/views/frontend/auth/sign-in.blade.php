@extends('frontend.auth.master')
@section('title', 'Dealfair | Signin')
@section('content')
    <div class="col-md-6">
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-10">
            <div class=" w-100 w-md-400px py-10">
                <form class="form w-100" method="POST" action="{{route('auth.signin')}}">
                    @csrf
                    <div class="text-center mb-11">
                        <h1 class="text-dark fw-bolder mb-3">Sign In Dealfair</h1>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12 text-center">
                            @if(GlobalHelper::getSettingValue('enable_facebook_login'))
                                <a href="{{ route('social.auth.signin.redirect','facebook') }}"
                                   class="btn btn-icon btn-facebook {{GlobalHelper::getSettingValue('enable_google_login') ? 'me-5' : ''}}"><i
                                        class="fab fa-facebook-f fs-4"></i></a>
                            @endif
                            @if(GlobalHelper::getSettingValue('enable_google_login'))
                                <a href="{{ route('social.auth.signin.redirect','google') }}"
                                   class="btn btn-icon btn-google {{GlobalHelper::getSettingValue('enable_apple_login') ? 'me-5' : ''}}"><i
                                        class="fab fa-google fs-4"></i></a>
                            @endif
                            @if(GlobalHelper::getSettingValue('enable_apple_login'))
                                <a href="{{ route('social.auth.signin.redirect','apple') }}"
                                   class="btn btn-icon btn-dark me-5"><i class="fab fa-apple fs-4"></i></a>
                            @endif
                        </div>
                    </div>

                    <div class="separator separator-content my-14">
                        <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                    </div>
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
                    <div class="mb-8">
                        <input type="email" placeholder="Enter email here..." name="email" inputmode="email" autocomplete="off"
                               class="form-control bg-transparent"/>
                        @if ($errors->has('email'))
                            <div class="text-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <input type="password" placeholder="Enter password here..." name="password" autocomplete="off"
                               class="form-control bg-transparent"/>
                        @if ($errors->has('password'))
                            <div class="text-danger">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                        <div></div>
                        <a href="{{ Route('auth.forgot.password') }}" class="link-primary">Forgot Password ?</a>
                    </div>

                    <div class="d-grid mb-10">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>

                    <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                        <a href="{{route('auth.signup')}}" class="link-primary">Sign up</a></div>
                </form>
            </div>
        </div>
    </div>
@endsection
