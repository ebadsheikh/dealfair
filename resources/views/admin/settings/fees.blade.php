@extends('admin.layouts.master')

@section('title', 'Dealfair | Fees Settings')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Settings</h1>
                    {{ Breadcrumbs::render('adminFeeSettingPage') }}
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
                                            <h2>Fees Settings</h2>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Community Admin Commission (%)</label>
                                            <input type="text" name="community_admin_commission"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter community admin commission (%) here..."
                                                   value="{{ old('community_admin_commission',GlobalHelper::getSettingValue('community_admin_commission')) }}"/>
                                            @if ($errors->has('community_admin_commission'))
                                                <div class="text-danger">
                                                    {{ $errors->first('community_admin_commission') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Selling Fees (%)</label>
                                            <input type="text" name="selling_fees"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter selling fees (%) here..."
                                                   value="{{ old('selling_fees',GlobalHelper::getSettingValue('selling_fees')) }}"/>
                                            @if ($errors->has('selling_fees'))
                                                <div class="text-danger">
                                                    {{ $errors->first('selling_fees') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Payment Charges (%)</label>
                                            <input type="text" name="payment_charges_percentage"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter payment charges (%) here..."
                                                   value="{{ old('payment_charges_percentage',GlobalHelper::getSettingValue('payment_charges_percentage')) }}"/>
                                            <div class="text-muted fs-7">Charge a percentage of the sale amount as payment processing fee for every successful sale.</div>
                                            @if ($errors->has('payment_charges_percentage'))
                                                <div class="text-danger">
                                                    {{ $errors->first('payment_charges_percentage') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Payment Charges (Fixed)</label>
                                            <input type="text" name="payment_charges_fixed"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter payment charges (Fixed) here..."
                                                   value="{{ old('payment_charges_fixed',GlobalHelper::getSettingValue('payment_charges_fixed')) }}"/>
                                            <div class="text-muted fs-7">For every successful sale, charge customers a fixed price as payment processing fee, in addition to a percentage of the sale amount.</div>
                                            @if ($errors->has('payment_charges_fixed'))
                                                <div class="text-danger">
                                                    {{ $errors->first('payment_charges_fixed') }}
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
