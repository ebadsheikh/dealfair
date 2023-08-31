@extends('frontend.auth.master')
@section('title', 'Dealfair | Forgot Password')
@section('content')
    <div class="col-md-6">
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-10">
            <div class=" w-100 w-md-400px py-10">
                <form class="form w-100" method="POST" action="{{ Route('auth.verify.email') }}">
                    @csrf
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
                    <div class="text-center mb-10">
                        <h1 class="text-dark fw-bolder mb-3">Forgot Password ?</h1>
                        <div class="text-gray-500 fw-semibold fs-6">Enter your email to reset your password.</div>
                    </div>
                    <div class="fv-row mb-8">
                        <input type="text" placeholder="Email" name="email" autocomplete="off"
                               class="form-control bg-transparent"/>
                        @if ($errors->has('email'))
                            <div class="text-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                        <button type="submit" class="btn btn-primary me-4">Submit</button>
                        <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
