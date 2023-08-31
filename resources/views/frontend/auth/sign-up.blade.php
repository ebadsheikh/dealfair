@extends('frontend.auth.master')
@section('title', 'Dealfair | Signup')
@section('content')
    <div class="col-md-6">
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-10">
            <div class=" w-100 w-md-400px py-10">
                <form class="form w-100" method="POST" action="{{route('auth.signup')}}">
                    @csrf
                    <div class="text-center mb-6">
                        <h1 class="text-dark fw-bolder mb-3">Sign Up Dealfair</h1>
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
                    <div class="fv-row mb-8">
                        <input type="text" placeholder="Enter first name here..." name="first_name" autocomplete="off"
                               value="{{old('first_name')}}" class="form-control bg-transparent"/>
                        @if ($errors->has('first_name'))
                            <div class="text-danger">
                                {{ $errors->first('first_name') }}
                            </div>
                        @endif
                    </div>

                    <div class="fv-row mb-8">
                        <input type="text" placeholder="Enter last name here..." name="last_name" autocomplete="off"
                               value="{{old('last_name')}}" class="form-control bg-transparent"/>
                        @if ($errors->has('last_name'))
                            <div class="text-danger">
                                {{ $errors->first('last_name') }}
                            </div>
                        @endif
                    </div>

                    <div class="fv-row mb-8">
                        <input type="email" placeholder="Enter email here..." name="email" autocomplete="off"
                               value="{{old('email')}}" class="form-control bg-transparent"/>
                        @if ($errors->has('email'))
                            <div class="text-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="fv-row mb-8" data-kt-password-meter="true">
                        <div class="mb-1">
                            <div class="position-relative mb-3">
                                <input class="form-control bg-transparent" type="password" placeholder="Enter password here..."
                                       name="password" autocomplete="off"/>
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
                        <input placeholder="Enter repeat password here..." name="password_confirmation" type="password" autocomplete="off"
                               class="form-control bg-transparent"/>
                        @if ($errors->has('password_confirmation'))
                            <div class="text-danger">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>
                    <div class="fv-row mb-8">
                        <div class="form-check form-check-custom">
                            <input class="form-check-input" type="checkbox" name="agree" value="1"/>
                            <label class="form-check-label">
                                By creating an account, you agree to our <br><a href="#">Terms & Conditions</a>
                            </label>
                        </div>
                        @if ($errors->has('agree'))
                            <div class="text-danger">
                                {{ $errors->first('agree') }}
                            </div>
                        @endif
                    </div>

                    <div class="d-grid mb-10">
                        <button type="submit" class="btn btn-primary">Sign up</button>
                    </div>
                    <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account?
                        <a href="{{route('auth.signin')}}" class="link-primary fw-semibold">Sign in</a></div>
                </form>
            </div>
        </div>
    </div>
@endsection
