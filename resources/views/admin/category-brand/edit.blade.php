@extends('admin.layouts.master')
@section('title', 'Dealfair | Edit Category Brand')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Category Brand</h1>
                    {{ Breadcrumbs::render('adminEditCategoryBrandPage') }}
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('admin.category.brand.index') }}" class="btn btn-sm fw-bold btn-primary"><i
                            class="bi bi-arrow-left"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="card card-p-0 card-flush">
                        <div class="card-body">
                            <div class="card card-flush py-4">
                                <form class="row g-5 pt-5" method="POST"
                                      action="{{route('admin.category.brand.update', $categoryBrand->id)}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label required fw-semibold fs-6">Brands</label>
                                            <select class="form-select" name="brand_id" data-control="select2"
                                                    data-placeholder="Please select brand">
                                                <option></option>
                                                @foreach($brands as $brand)
                                                    <option
                                                        value="{{$brand->id}}" {{ $categoryBrand->brand->id == $brand->id ? 'selected' : '' }}>{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                            @error ('brand_id')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label required fw-semibold fs-6">Category</label>
                                            <select name="category_id" class="form-select form-select-lg fw-semibold"
                                                    data-control="select2" data-placeholder="Please select category">
                                                <option></option>
                                                @foreach ($categories as $category)
                                                    <option
                                                        value="{{ GlobalHelper::generateCategoryTree($category)['id'] }}"
                                                        {{old('category_id',$categoryBrand->category_id) == $category->id ? 'selected' : ''}}>
                                                        {{ GlobalHelper::generateCategoryTree($category)['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error ('category_id')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 d-flex justify-content-end mt-6">
                                            <a href="{{ route('admin.category.brand.index') }}" class="btn btn-light me-5">Cancel</a>
                                            <button type="submit" class="btn btn-primary">Update</button>
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
