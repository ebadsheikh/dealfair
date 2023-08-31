@extends('frontend.auth.master')
@section('title', 'Dealfair | Reset Password')
@section('content')
    <div class="col-md-6">
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-10">
            <div class=" w-100 w-md-400px py-10">
                <form class="form w-100" method="POST" action="{{ Route('auth.update.password') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="text-center mb-10">
                        <h1 class="text-dark fw-bolder mb-3">Setup New Password</h1>
                        <div class="text-gray-500 fw-semibold fs-6">Have you already reset the password ?
                            <a href="#" class="link-primary fw-bold">Sign in</a>
                        </div>
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

                    <div class="fv-row mb-8" data-kt-password-meter="true">
                        <div class="mb-1">
                            <div class="position-relative mb-3">
                                <input class="form-control bg-transparent" type="password" placeholder="Password"
                                       name="password" autocomplete="off" />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                      data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                            </div>


                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                        </div>
                        <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
                        @if ($errors->has('password'))
                            <div class="text-danger">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="fv-row mb-8">
                        <input type="password" placeholder="Repeat Password" name="confirm_password" autocomplete="off"
                               class="form-control bg-transparent" />
                        @if ($errors->has('confirm_password'))
                            <div class="text-danger">
                                {{ $errors->first('confirm_password') }}
                            </div>
                        @endif
                    </div>

                    <div class="d-grid mb-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
