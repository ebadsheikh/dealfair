@extends('admin.layouts.master')

@section('title', 'Dealfair | Mail Settings')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Settings</h1>
                    {{ Breadcrumbs::render('adminMailSettingPage') }}
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
                                            <div class="d-flex flex-column flex-wrap me-3">
                                                <h2 class="d-flex fs-3 flex-column justify-content-center my-0">
                                                    Production Email Settings</h2>
                                                <span class="text-muted bold text-dark">This settings will be used when website is in production mode</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Mail Mailer</label>
                                            <select class="form-select form-control-lg mb-3 mb-lg-0" name="mail_mailer">
                                                <option value="smtp">smtp</option>
                                            </select>
                                            @if ($errors->has('mail_mailer'))
                                                <div class="text-danger">
                                                    {{ $errors->first('mail_mailer') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Mail Host</label>
                                            <input type="text" name="mail_host"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter mail host here..."
                                                   value="{{ old('mail_host',GlobalHelper::getSettingValue('mail_host')) }}"/>
                                            @if ($errors->has('mail_host'))
                                                <div class="text-danger">
                                                    {{ $errors->first('mail_host') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Mail Port</label>
                                            <input type="number" name="mail_port"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter mail port here..."
                                                   value="{{ old('mail_port',GlobalHelper::getSettingValue('mail_port')) }}"/>
                                            @if ($errors->has('mail_port'))
                                                <div class="text-danger">
                                                    {{ $errors->first('mail_port') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Mail
                                                Username</label>
                                            <input type="text" name="mail_username"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter mail username here..."
                                                   value="{{ old('mail_username',GlobalHelper::getSettingValue('mail_username')) }}"/>
                                            @if ($errors->has('mail_username'))
                                                <div class="text-danger">
                                                    {{ $errors->first('mail_username') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Mail
                                                Password</label>
                                            <input type="text" name="mail_password"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter mail password here..."
                                                   value="{{ old('mail_password',GlobalHelper::getSettingValue('mail_password')) }}"/>
                                            @if ($errors->has('mail_password'))
                                                <div class="text-danger">
                                                    {{ $errors->first('mail_password') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Mail
                                                Encryption</label>
                                            <select class="form-select form-control-lg mb-3 mb-lg-0"
                                                    name="mail_encryption">
                                                <option
                                                    value="tls" {{ old('mail_encryption', GlobalHelper::getSettingValue('mail_encryption')  === 'tls' ? 'selected' : '') }}>
                                                    tls
                                                </option>
                                                <option
                                                    value="ssl" {{ old('mail_encryption', GlobalHelper::getSettingValue('mail_encryption')  === 'ssl' ? 'selected' : '') }}>
                                                    ssl
                                                </option>
                                            </select>
                                            @if ($errors->has('mail_encryption'))
                                                <div class="text-danger">
                                                    {{ $errors->first('mail_encryption') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Mail From
                                                Address</label>
                                            <input type="email" name="mail_from_address"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter mail from address here..."
                                                   value="{{ old('mail_from_address',GlobalHelper::getSettingValue('mail_from_address')) }}"/>
                                            @if ($errors->has('mail_from_address'))
                                                <div class="text-danger">
                                                    {{ $errors->first('mail_from_address') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Mail From
                                                Name</label>
                                            <input type="text" name="mail_from_name"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter mail from name here..."
                                                   value="{{ old('mail_from_name',GlobalHelper::getSettingValue('mail_from_name')) }}"/>
                                            @if ($errors->has('mail_from_name'))
                                                <div class="text-danger">
                                                    {{ $errors->first('mail_from_name') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-md-12 mt-6 mb-6">
                                            <h2 class="d-flex fs-3 flex-column justify-content-center my-0">Development
                                                Email Settings</h2>
                                            <span class="text-muted bold text-dark">This settings will be used when website is in development mode</span>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Mail Mailer</label>
                                            <select class="form-select form-control-lg mb-3 mb-lg-0" name="development_mail_mailer">
                                                <option value="smtp">smtp</option>
                                            </select>
                                            @if ($errors->has('development_mail_mailer'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_mail_mailer') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Mail Host</label>
                                            <input type="text" name="development_mail_host"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter development mail host here..."
                                                   value="{{ old('development_mail_host',GlobalHelper::getSettingValue('development_mail_host')) }}"/>
                                            @if ($errors->has('development_mail_host'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_mail_host') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Mail
                                                Port</label>
                                            <input type="number" name="development_mail_port"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter mail port here..."
                                                   value="{{ old('development_mail_port',GlobalHelper::getSettingValue('development_mail_port')) }}"/>
                                            @if ($errors->has('development_mail_port'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_mail_port') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Mail
                                                Username</label>
                                            <input type="text" name="development_mail_username"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter mail username here..."
                                                   value="{{ old('development_mail_username',GlobalHelper::getSettingValue('development_mail_username')) }}"/>
                                            @if ($errors->has('development_mail_username'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_mail_username') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Mail
                                                Password</label>
                                            <input type="text" name="development_mail_password"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter mail password here..."
                                                   value="{{ old('development_mail_password',GlobalHelper::getSettingValue('development_mail_password')) }}"/>
                                            @if ($errors->has('development_mail_password'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_mail_password') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Mail
                                                Encryption</label>
                                            <select class="form-select form-control-lg mb-3 mb-lg-0"
                                                    name="development_mail_encryption">
                                                <option
                                                    value="tls" {{ old('development_mail_encryption', GlobalHelper::getSettingValue('development_mail_encryption') === 'tls' ? 'selected' : '') }}>
                                                    tls
                                                </option>
                                                <option
                                                    value="ssl" {{ old('development_mail_encryption', GlobalHelper::getSettingValue('development_mail_encryption') === 'ssl' ? 'selected' : '') }}>
                                                    ssl
                                                </option>
                                            </select>
                                            @if ($errors->has('development_mail_encryption'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_mail_encryption') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Mail
                                                From Address</label>
                                            <input type="email" name="development_mail_from_address"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter mail from address here..."
                                                   value="{{ old('development_mail_from_address',GlobalHelper::getSettingValue('development_mail_from_address')) }}"/>
                                            @if ($errors->has('development_mail_from_address'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_mail_from_address') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Development Mail
                                                From Name</label>
                                            <input type="text" name="development_mail_from_name"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter mail from name here..."
                                                   value="{{ old('development_mail_from_name',GlobalHelper::getSettingValue('development_mail_from_name')) }}"/>
                                            @if ($errors->has('development_mail_from_name'))
                                                <div class="text-danger">
                                                    {{ $errors->first('development_mail_from_name') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-md-12 mt-6 mb-6">
                                            <h2 class="d-flex fs-3 flex-column justify-content-center my-0">Miscellaneous Email Settings</h2>
                                            <span class="text-muted bold text-dark">Extra settings related to email configuration</span>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="col-form-label required fw-semibold fs-6">Test Email Receiver</label>
                                            <input type="text" name="test_email_receiver"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter test email receiver here..."
                                                   value="{{ old('test_email_receiver',GlobalHelper::getSettingValue('test_email_receiver')) }}"/>
                                            <div class="text-muted fs-7">This email received all emails when website is in development.</div>
                                            @if ($errors->has('test_email_receiver'))
                                                <div class="text-danger">
                                                    {{ $errors->first('test_email_receiver') }}
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
