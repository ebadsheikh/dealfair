<div class="tab-pane fade show active" id="profile" role="tabpanel">
<!--begin::Update Password-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_signin_method">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Update Password</h3>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Content-->
    <div id="kt_account_settings_signin_method" class="collapse show">
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <form action="{{ Route('admin.customers.update-password',$user->id) }}" method="post">
                @csrf
                <div class="card card-flush py-4">
                    <div class="card-body pt-0">
                        <div class="form-group row">

                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <label class="col-lg-12 col-form-label required fw-bold fs-6">New
                                    Password</label>
                                <input type="text" name="new_password" class="form-control"
                                    placeholder="New Password" value="{{ old('new_password') }}">
                                @if ($errors->has('new_password'))
                                    <div class="text-danger">{{ $errors->first('new_password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <label class="col-lg-12 col-form-label required fw-bold fs-6">Confirm
                                    Password</label>
                                <input type="text" name="confirm_password" class="form-control"
                                    placeholder="Confirm Password" value="{{ old('confirm_password') }}">
                                @if ($errors->has('confirm_password'))
                                    <div class="text-danger">{{ $errors->first('confirm_password') }}
                                    </div>
                                @endif
                            </div>

                        </div>


                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ url()->previous() }}" class="btn btn-light me-5">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end::Content-->
</div>
<!--end::Update Password-->

</div>

