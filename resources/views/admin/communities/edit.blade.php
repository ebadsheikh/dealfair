@php
    use App\Enums\MediaDirectoryNamesEnum;
@endphp

@extends('admin.layouts.master')

@section('title', 'Edit Community')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Community</h1>
                    {{ Breadcrumbs::render('adminEditCommunitiesPage') }}
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('admin.communities.index') }}" class="btn btn-sm fw-bold btn-primary"><i
                            class="bi bi-arrow-left"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="form d-flex flex-column flex-lg-row">
                    <!--begin::Aside column-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <form action="{{ route('admin.communities.update-image', $community_member->community_id) }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Thumbnail settings-->
                            <div class="card card-flush">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Image</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body text-center pt-0">
                                    <!--begin::Image input-->
                                    <!--begin::Image input placeholder-->
                                    @if ($community_member->community->getFirstMediaUrl(MediaDirectoryNamesEnum::COMMUNITY_IMAGES->value))
                                        <style>
                                            .image-input-placeholder {
                                                background-image: url({{ $community_member->community->getFirstMediaUrl(MediaDirectoryNamesEnum::COMMUNITY_IMAGES->value) }});
                                            }
                                        </style>
                                    @else
                                        <style>
                                            .image-input-placeholder {
                                                background-image: url({{ asset('assets/media/svg/files/blank-image.svg') }});
                                            }
                                        </style>
                                    @endif
                                    <!--end::Image input placeholder-->
                                    <!--begin::Image input-->
                                    <div
                                        class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                        data-kt-image-input="true">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-150px h-150px"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <!--begin::Icon-->
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--end::Icon-->
                                            <!--begin::Inputs-->
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
                                            <input type="hidden" name="avatar_remove"/>
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
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg and
                                        *.jpeg
                                        image files are accepted
                                    </div>
                                    <!--end::Description-->

                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Update Image</button>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Thumbnail settings-->
                        </form>
                    </div>
                    <!--end::Aside column-->
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Edit Community</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <form action="{{ route('admin.communities.update', $community_member->community_id) }}"
                                  method="POST" enctype="multipart/form-data">
                                @csrf
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="form-group row">
                                        <div class="col-md-6 mb-6">
                                            <label class="col-form-label required fw-semibold fs-6">Zip</label>
                                            <input type="text" name="zip" disabled
                                                   class="form-control form-control-lg mb-3 mb-lg-0" placeholder="Zip"
                                                   value="{{ old('zip', $community_member->community->zip) }}"/>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="col-form-label required fw-semibold fs-6">Community
                                                Name</label>
                                            <input type="text" name="address" disabled
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Address"
                                                   value="{{ old('address', $community_member->community->short_name) }}"/>
                                        </div>

                                        <div class="col-md-12 mb-6">
                                            <label class="col-form-label required fw-semibold fs-6">Admin</label>
                                            <div class="border rounded">
                                                <select id="kt_docs_select2_rich_content"
                                                        class="form-select form-select-transparent" name="user_id"
                                                        data-placeholder="Select Admin">
                                                    <option value="">Select User</option>
                                                    <option value="{{ Auth::id() }}"
                                                            {{ Auth::id() == $community_member->user_id ? 'selected' : '' }}
                                                            data-kt-rich-content-subcontent="{{ Auth::user()->email }}"
                                                            data-kt-rich-content-icon="{{ Auth::user()->getFirstMediaUrl('user_image') ? Auth::user()->getFirstMediaUrl('user_image') : asset('assets/media/avatars/blank.png') }}">
                                                        {{ Auth::user()->name }}</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}"
                                                                {{ $customer->id == $community_member->user_id ? 'selected' : '' }}
                                                                data-kt-rich-content-subcontent="{{ $customer->email }}"
                                                                data-kt-rich-content-icon="{{ $customer->getFirstMediaUrl('user_image') ? $customer->getFirstMediaUrl('user_image') : asset('assets/media/avatars/blank.png') }}">
                                                            {{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <div class="card-footer d-flex justify-content-end">
                                    <a href="{{ route('admin.communities.index') }}"
                                       class="btn btn-light me-5">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <!--end::General options-->

                    </div>
                    <!--end::Main column-->
                </div>
            </div>
        </div>
    </div>

@endsection
@push('custom-scripts')
    <script>
        // Format options
        const optionFormat = (item) => {
            if (!item.id) {
                return item.text;
            }

            var span = document.createElement('span');
            var template = '';

            template += '<div class="d-flex align-items-center">';
            template += '<img src="' + item.element.getAttribute('data-kt-rich-content-icon') +
                '" class="rounded-circle h-40px me-3" alt="' + item.text + '"/>';
            template += '<div class="d-flex flex-column">'
            template += '<span class="fs-4 fw-bold lh-1">' + item.text + '</span>';
            template += '<span class="text-muted fs-5">' + item.element.getAttribute(
                'data-kt-rich-content-subcontent') + '</span>';
            template += '</div>';
            template += '</div>';

            span.innerHTML = template;

            return $(span);
        }

        // Init Select2 --- more info: https://select2.org/
        $('#kt_docs_select2_rich_content').select2({
            placeholder: "Select an option",
            minimumResultsForSearch: Infinity,
            templateSelection: optionFormat,
            templateResult: optionFormat
        });
    </script>
@endpush
