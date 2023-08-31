@extends('frontend.user-panel.layouts.master')

@section('title', 'Edit Store | Dealfair')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Edit Store
                    </h1>
                    {{ Breadcrumbs::render('sellerEditStorePage') }}
                </div>

                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{route('seller.my.stores')}}" class="btn btn-sm fw-bold btn-primary">Go Back</a>
                </div>

            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <form class="form d-flex flex-column flex-lg-row" action="{{route('seller.update.storedata',$store->slug)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-700px mb-7 me-lg-12">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3>Store Logo</h3>
                                </div>
                            </div>
                            <div class="card-body text-center pt-0">
                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                     style="background-image: url('{{ asset('assets/media/svg/files/blank-image.svg') }}')">
                                    <!--begin::Preview existing avatar-->
                                    @if($store->getFirstMediaUrl('store_logo'))
                                        <div class="image-input-wrapper w-125px h-125px"
                                             style="background-image: url({{ $store->getFirstMediaUrl('store_logo') }})">
                                        </div>
                                    @else
                                        <div class="image-input-wrapper w-125px h-125px"
                                             style="background-image: url({{ asset('assets/media/svg/files/blank-image.svg') }})">
                                        </div>
                                    @endif


                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="store_logo"/>
                                        <input type="hidden" name="store_logo_remove"/>
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
                                <div class="text-muted fs-7 pt-2">
                                    {{ __('set the thumbnail. Only *.png, *.jpg and *.jpeg image files are accepted') }}
                                </div>
                                @if ($errors->has('store_logo'))
                                    <div class="text-danger">{{ $errors->first('store_logo') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3>Store Thumbnail</h3>
                                </div>
                            </div>
                            <div class="card-body text-center pt-0">
                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                     style="background-image: url('{{ asset('assets/media/svg/files/blank-image.svg') }}')">
                                    <!--begin::Preview existing avatar-->

                                    @if($store->getFirstMediaUrl('store_thumbnail'))
                                        <div class="image-input-wrapper w-125px h-125px"
                                             style="background-image: url({{ $store->getFirstMediaUrl('store_thumbnail') }})">
                                        </div>

                                    @else
                                        <div class="image-input-wrapper w-125px h-125px"
                                             style="background-image: url({{ asset('assets/media/svg/files/blank-image.svg') }})">
                                        </div>
                                    @endif

                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="store_thumbnail"/>
                                        <input type="hidden" name="store_thumbnail_remove"/>
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
                                <div class="text-muted fs-7 pt-2">
                                    {{ __('set the thumbnail. Only *.png, *.jpg and *.jpeg image files are accepted') }}
                                </div>
                                @if ($errors->has('store_logo'))
                                    <div class="text-danger">{{ $errors->first('store_logo') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>General</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-lg-6 ">
                                        <label class="col-lg-12 col-form-label required fw-bold fs-6">Store
                                            Name</label>
                                        <input type="text" name="store_name" class="form-control"
                                               placeholder="Enter Store Name"
                                               value="{{ old('store_name',$store->store_name) }}">
                                        @if ($errors->has('store_name'))
                                            <div class="text-danger">{{ $errors->first('store_name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 ">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">Category</label>
                                        <select name="category_id" aria-label="Select " data-control="select2"
                                                data-placeholder="Select a Category..."
                                                class="form-select form-select-lg fw-semibold">
                                            <option value="">Select category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{$category->id == $store->category_id ? 'selected' : ""}}>{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <div class="text-danger">{{ $errors->first('category_id') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 ">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">Email</label>
                                        <input type="text" name="email" class="form-control"
                                               placeholder="Enter Email"
                                               value="{{ old('email',$store->email) }}">
                                        @if ($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 ">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">Telephone</label>
                                        <input type="text" name="telephone" class="form-control"
                                               placeholder="Enter Telephone"
                                               value="{{ old('telephone',$store->telephone) }}">
                                        @if ($errors->has('telephone'))
                                            <div class="text-danger">{{ $errors->first('telephone') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="seperator my-7"></div>
                                    <div class="col-md-12 mt-6 mb-6">
                                        <h2 class="d-flex fs-3 flex-column justify-content-center my-0">Address
                                            Details</h2>
                                    </div>
                                    <div class="col-lg-12 ">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">Address</label>
                                        <input id="autocomplete" name="address"
                                               placeholder="Enter address here..."
                                               class="form-control form-control-lg"
                                               value="{{ old('address',$store->address) }}"/>
                                        @if ($errors->has('address'))
                                            <div class="text-danger">{{ $errors->first('address') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 ">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">City</label>
                                        <input id="city" name="city" value="{{ old('city',$store->city) }}"
                                               placeholder="Enter city here..."
                                               class="form-control form-control-lg"/>
                                        @if ($errors->has('city'))
                                            <div class="text-danger">{{ $errors->first('city') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 ">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">State</label>
                                        <input id="state" type="text" name="state"
                                               class="form-control form-control-lg"
                                               placeholder="Enter state here..." value="{{ old('state',$store->state) }}">
                                        @if ($errors->has('state'))
                                            <div class="text-danger">{{ $errors->first('state') }}
                                            </div>
                                        @endif
                                    </div>
                                    <input type="hidden" id="state_code" name="state_code" value="{{$store->state_code}}">
                                    <div class="col-lg-6 ">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">Zip</label>
                                        <input id="zip" name="zip" value="{{ old('zip',$store->zip) }}"
                                               placeholder="Enter zip here..."
                                               class="form-control form-control-lg"/>
                                        @if ($errors->has('zip'))
                                            <div class="text-danger">{{ $errors->first('zip') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 ">
                                        <label
                                            class="col-lg-12 col-form-label required fw-bold fs-6">Country</label>
                                        <select name="country_id" aria-label="Select a country..."
                                                data-control="select2"
                                                id="country" data-placeholder="Select a country..."
                                                class="form-select form-select-lg">
                                            @if (!is_null($countries))
                                                @foreach ($countries as $country)
                                                    <option
                                                        value="{{ $country->id }}" {{$country->id == $store->caountry_id ? 'selected' : ""}}>{{ $country->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <div class="text-danger">{{ $errors->first('category_id') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('admin.category.index') }}" class="btn btn-light me-5">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('map.google_map_api_key') }}&libraries=places&callback=Function.prototype">
    </script>
    @include('custom-scripts.standard-autocomplete')
@endpush
