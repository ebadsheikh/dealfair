@extends('admin.layouts.master')

@section('title', 'Add Users')

@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Users</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Add User</a>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="card card-p-0 card-flush">
                        <div class="card-body">
                            <div class="card card-flush py-4">
                                <div class="form-group">
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger">
                                            {{ Session('error') }}
                                        </div>
                                    @endif
                                    @if (Session::has('message'))
                                        <div class="alert alert-success">
                                            {{ Session('message') }}
                                        </div>
                                    @endif
                                </div>
                                <form action="{{ Route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                                    <!--begin::Card body-->
                                    @csrf
                                    <div class="card-body border-top p-9">
                                        <!--begin::Input group-->
                                        <div class="form-group mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label fw-semibold fs-6">Avatar</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="form-group">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                    style="background-image: url('{{ asset('assets/media/svg/avatars/blank.svg') }}')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url({{ asset('assets/media/avatars/300-1.jpg') }})">
                                                    </div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="image" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->
                                                <!--begin::Hint-->
                                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                <!--end::Hint-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label required fw-semibold fs-6">Full
                                                Name</label>
                                            <!--end::Label-->
                                            <input type="text" name="name"
                                                class="form-control form-control-lg mb-3 mb-lg-0" placeholder="Full name"
                                                value="{{ old('name') }}" />
                                            @error('name')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label required fw-semibold fs-6">Username</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <input type="text" name="username" class="form-control form-control-lg "
                                                placeholder="Username" value="{{ old('username') }}" />
                                            @error('username')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label fw-semibold fs-6">Password</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <input type="tel" name="password" class="form-control form-control-lg "
                                                placeholder="Password" value="{{ old('password') }}" />
                                            @error('password')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label fw-semibold fs-6">Email</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <input type="text" name="email" class="form-control form-control-lg "
                                                placeholder="Email" value="{{ old('email') }}" />
                                            @error('email')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label fw-semibold fs-6">Date OF Birth</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <input type="date" name="date_of_birth"
                                                class="form-control form-control-lg " />
                                            @error('date_of_birth')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label fw-semibold fs-6">Telephone</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <input type="text" name="telephone" class="form-control form-control-lg "
                                                placeholder="Telephone" value="{{ old('telephone') }}" />
                                            <!--end::Col-->
                                            @error('telephone')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--begin::Input group-->
                                        <div class="form-group mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label required fw-semibold fs-6">Address</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <input type="text" name="address"
                                                class="form-control form-control-lg mb-3 mb-lg-0" id="autocomplete"
                                                placeholder="Address" value="{{ old('address') }}" />
                                            @error('address')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label required fw-semibold fs-6">City</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <input type="text" name="city" class="form-control form-control-lg "
                                                placeholder="City" value="{{ old('city') }}" id="city" />
                                            @error('city')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label fw-semibold fs-6">State</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <input type="text" name="state" class="form-control form-control-lg "
                                                placeholder="State" value="{{ old('state') }}" id="state" />
                                            @error('state')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="form-group mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label fw-semibold fs-6">Zip</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <input type="text" name="zip" class="form-control form-control-lg "
                                                placeholder="Zip" value="{{ old('zip') }}" id="zip" />
                                            @error('zip')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <div class="form-group mb-6">
                                            <!--begin::Label-->
                                            <label class="col-form-label fw-semibold fs-6">Country</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <select name="country_id" aria-label="Select " data-control="select2"
                                                id="country" data-placeholder="Select a country..."
                                                class="form-select form-select-lg fw-semibold">
                                                <option value="1" selected>United States</option>
                                                {{-- @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach --}}
                                            </select>
                                            @error('country_id')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                            <!--end::Col-->
                                        </div>

                                    </div>
                                    <!--end::Card body-->
                                    <!--begin::Actions-->
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button type="reset"
                                            class="btn btn-lightbtn-active-light-primary me-2">Discard</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Row-->

            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

@endsection

@section('custom-scripts')
    <script src="{{ asset('assets/js/custom/account/settings/signin-methods.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/profile-details.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/deactivate-account.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVDDEcMczzZVbGjpYtU67TQjO6leA93sE&libraries=places&callback=Function.prototype">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        window.addEventListener('load', initialize);

        function initialize() {
            var input = document.getElementById('autocomplete');
            var options = {
                componentRestrictions: {
                    country: 'us'
                }
            };
            var autocomplete = new google.maps.places.Autocomplete(input, options);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place);
                var request = {
                    placeId: place.place_id,
                    fields: ['address_components']
                };
                var service = new google.maps.places.PlacesService(document.createElement('div'));
                service.getDetails(request, function(result, status) {
                    if (status == google.maps.places.PlacesServiceStatus.OK) {
                        $('#city').val(getAddressComponent(result, /locality/i));
                        $('#state').val(getAddressComponent(result, /administrative_area_level_1/i));
                        $('#zip').val(getAddressComponent(result, /postal_code/i));
                    }
                });
            });
        }

        function getAddressComponent(place, regex) {
            for (var i = 0; i < place.address_components.length; i++) {
                var component = place.address_components[i];
                if (regex.test(component.types)) {
                    return component.long_name;
                }
            }
            return '';
        }
    </script>
@endsection
