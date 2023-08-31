@extends('frontend.user-panel.layouts.master')
@section('title', 'Dealfair | Shipping Addresses')
@push('custom-styles')
    <style>
        .pac-container {
            z-index: 10000 !important;
        }
    </style>
@endpush
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Shipping Addresses
                    </h1>
                    <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7 my-1">
                        <li class="breadcrumb-item text-gray-600">
                            <a href="{{ route('seller.dashboard') }}" class="text-gray-600 text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-gray-600">Shipping Addresses</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="#" class="btn btn-primary fw-bold" data-bs-toggle="modal"
                       data-bs-target="#add-shipping-address">Add New Address</a>
                </div>
                <div class="modal fade" tabindex="-1" id="add-shipping-address">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Add Address</h3>
                                <div class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span class="svg-icon svg-icon-1"></span>
                                </div>
                            </div>
                            <form action="{{ route('shipping.address.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="row mb-6">
                                            <div class="col-md-6">
                                                <label class="form-label required">Full Name</label>
                                                <input name="full_name" value="{{ old('full_name') }}"
                                                       placeholder="Enter full name here..." class="form-control form-control-lg" />
                                                @error('full_name')
                                                <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label required">Mobile Number</label>
                                                <input name="telephone" value="{{ old('telephone') }}"
                                                       placeholder="Enter mobile number here..." class="form-control form-control-lg" />
                                                @error('telephone')
                                                <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="fv-row mb-6">
                                            <label class="form-label required">Address</label>
                                            <input id="autocomplete" name="address" placeholder="Enter address here..."
                                                   class="form-control form-control-lg" value="{{ old('address') }}" />
                                            @error('address')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row mb-6">
                                            <div class="col-md-4">
                                                <label class="form-label required">City</label>
                                                <input id="city" name="city" value="{{ old('city') }}"
                                                       placeholder="Enter city here..." class="form-control form-control-lg" />
                                                @error('city')
                                                <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label required">State</label>
                                                <input id="state" name="state" value="{{ old('state') }}"
                                                       placeholder="Enter state here..." class="form-control form-control-lg" />
                                                @error('state')
                                                <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label required">Zip</label>
                                                <input id="zip" name="zip" value="{{ old('zip') }}"
                                                       placeholder="Enter zip here..." class="form-control form-control-lg" />
                                                @error('zip')
                                                <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="fv-row mb-6">
                                            <label class="form-label required">Country</label>
                                            <select name="country_id" aria-label="Select a country..." data-control="select2"
                                                    id="country" data-placeholder="Select a country..."
                                                    class="form-select form-select-lg">
                                                @if (!is_null($countries))
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('country_id')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
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
                @livewire('frontend.panel.user-addresses.index')
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('map.google_map_api_key') }}&libraries=places&callback=Function.prototype"> </script>
    @include('custom-scripts.standard-autocomplete')
    <script>
        $(document).ready(function() {
            $('#add-user-addresses').modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    </script>
    @if (count($errors) > 0)
        <script type="text/javascript">
            $(document).ready(function() {
                $('#add-user-addresses').modal('show');
            });
        </script>
    @endif
@endpush
