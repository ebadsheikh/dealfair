@extends('frontend.auth.master')
@section('title', 'Dealfair | Signin')
@section('content')
    <div class="col-md-6">
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-10">
            <div class=" w-100 w-md-400px py-10">
                <form class="form w-100 mb-13" id="email-verification-form" method="POST"
                      action="{{route('auth.verify.email.verification.code')}}">
                    @csrf
                    <div class="text-center mb-10">
                        <img alt="Logo" class="mh-125px" src="{{asset('assets/media/svg/misc/smartphone-2.svg')}}"/>
                    </div>
                    <div class="text-center mb-10">
                        <h1 class="text-dark mb-3">Email Verification</h1>
                        <div class="text-muted fw-semibold fs-5 mb-5">Enter the verification code we sent to</div>
                        <div class="fw-bold text-dark fs-3">{{GlobalHelper::getUser()->email}}</div>
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
                    <div class="mb-10">
                        <div class="fw-bold text-start text-dark fs-6 mb-1 ms-1">Type your 6 digit security code</div>
                        <div class="row g-1 g-md-2">
                            <div class="col-2">
                                <input type="text" name="code_1" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-md-60px fs-2qx text-center my-2">
                            </div>
                            <div class="col-2">
                                <input type="text" name="code_2" data-inputmask="'mask': '9', 'placeholder': ''"
                                       maxlength="1" class="form-control bg-transparent h-md-60px fs-2qx text-center my-2">
                            </div>
                            <div class="col-2">
                                <input type="text" name="code_3" data-inputmask="'mask': '9', 'placeholder': ''"
                                       maxlength="1" class="form-control bg-transparent8601
                                        h-md-60px fs-2qx text-center my-2">
                            </div>
                            <div class="col-2">
                                <input type="text" name="code_4" data-inputmask="'mask': '9', 'placeholder': ''"
                                       maxlength="1" class="form-control bg-transparent h-md-60px fs-2qx text-center my-2">
                            </div>
                            <div class="col-2">
                                <input type="text" name="code_5" data-inputmask="'mask': '9', 'placeholder': ''"
                                       maxlength="1" class="form-control bg-transparent h-md-60px fs-2qx text-center my-2">
                            </div>
                            <div class="col-2">
                                <input type="text" name="code_6" data-inputmask="'mask': '9', 'placeholder': ''"
                                       maxlength="1" class="form-control bg-transparent h-md-60px fs-2qx text-center my-2">
                            </div>
                        </div>
                        @if ($errors->has('code'))
                            <div class="text-danger">
                                {{ $errors->first('code') }}
                            </div>
                        @endif
                    </div>
                    <div class="d-flex flex-center">
                        <button type="submit" class="btn btn-primary">Verify</button>
                    </div>
                </form>
                <div class="text-center fw-semibold fs-5">
                    <span class="text-muted me-1">Didn’t get the code ?</span>
                    <a href="#" class="link-primary fs-5 me-1">Resend</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-scripts')
    <script src="{{asset('assets/js/custom/authentication/sign-in/custom-two-steps.js')}}"></script>
@endsection
