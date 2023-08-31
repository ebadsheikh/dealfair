@extends('admin.layouts.master')

@section('title', 'Dealfair | Wallet Settings')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Settings</h1>
                    {{ Breadcrumbs::render('adminWalletSettingPage') }}
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
                                <form class="row g-5 pt-5" method="POST" action="{{route('admin.settings.storeupdate')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mt-6 mb-6">
                                            <h2>Wallet Settings</h2>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Max Wallet Limit ($)</label>
                                            <input type="number" name="max_wallet_limit"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter max wallet limit ($) here..."
                                                   value="{{ old('max_wallet_limit',GlobalHelper::getSettingValue('max_wallet_limit')) }}"/>
                                            @if ($errors->has('max_wallet_limit'))
                                                <div class="text-danger">
                                                    {{ $errors->first('max_wallet_limit') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Minimum Community Admin Withdraw Amount ($)</label>
                                            <input type="number" name="minimum_community_admin_withdraw_amount"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter minimum community admin withdraw amount ($) here..."
                                                   value="{{ old('minimum_community_admin_withdraw_amount',GlobalHelper::getSettingValue('minimum_community_admin_withdraw_amount')) }}"/>
                                            @if ($errors->has('minimum_community_admin_withdraw_amount'))
                                                <div class="text-danger">
                                                    {{ $errors->first('minimum_community_admin_withdraw_amount') }}
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
