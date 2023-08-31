@extends('admin.layouts.master')
@section('title', 'Dealfair | Categories')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Categories</h1>
                    @if($parentCategory)
                        {{ Breadcrumbs::render('adminCategoriesPage', $parentCategory) }}
                    @else
                        {{ Breadcrumbs::render('adminCategoriesPage') }}
                    @endif
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    @can('Create Category')
                        @if($parentCategory)
                            <a href="{{ route('admin.category.add',$parentCategory->id) }}" type="button"
                               class="btn btn-primary"
                               data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                            </span>Add New Category</a>
                        @else
                            <a href="{{ route('admin.category.add') }}" type="button"
                               class="btn btn-primary"
                               data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                            </span>Add New Category</a>
                        @endif
                    @endcan
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                @if($parentCategory)
                    @livewire('admin.category.categories-list',['parentCategory' => $parentCategory->id])
                @else
                    @livewire('admin.category.categories-list')
                @endif
            </div>
        </div>
    </div>
@endsection
