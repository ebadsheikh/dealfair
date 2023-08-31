@php
    use App\Enums\MediaDirectoryNamesEnum;
@endphp

@extends('admin.layouts.master')

@section('title', 'Dealfair | Edit Category')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Edit Category</h1>
                    {{ Breadcrumbs::render('adminEditCategoryPage') }}
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('admin.category.index') }}" class="btn btn-sm fw-bold btn-primary"><i
                            class="bi bi-arrow-left"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <form class="form d-flex flex-column flex-lg-row"
                      action="{{ route('admin.category.update', $category->slug) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <div class="card card-flush">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Image</h2>
                                </div>
                            </div>
                            <div class="card-body text-center pt-0">
                                @if ($category->image_url)
                                    <style>
                                        .image-input-placeholder {
                                            background-image: url({{ $category->image_url }});
                                        }
                                    </style>
                                @else
                                    <style>
                                        .image-input-placeholder {
                                            background-image: url({{ asset('assets/media/svg/files/blank-image.svg') }});
                                        }
                                    </style>
                                @endif
                                <div
                                    class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <div class="image-input-wrapper w-150px h-150px"></div>
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="avatar_remove"/>
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                                <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg and
                                    *.jpeg
                                    image files are accepted
                                </div>
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
                                @if($category->category_id != null)
                                    <div class="mb-5 fv-row">
                                        <label class="col-form-label required fw-semibold fs-6">Parent Category</label>
                                        <input type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                                               value="{{ $category->parentCategory->name }}" disabled/>
                                    </div>
                                    <input type="hidden" name="category_id" value="{{$category->parentCategory->id}}"/>
                                @endif
                                <div class="mb-5 fv-row">
                                    <label class="col-form-label required fw-semibold fs-6">Category Name</label>
                                    <input type="text" name="name" class="form-control form-control-lg mb-3 mb-lg-0"
                                           placeholder="Enter category name here..." value="{{ $category->name }}"/>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
