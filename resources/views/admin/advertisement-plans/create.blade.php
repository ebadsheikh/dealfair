@extends('admin.layouts.master')

@section('title', 'Dealfair | Add Advertisement Plan')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Advertisement Plan</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a class="text-muted text-hover-primary">Add Advertisement Plan</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ url()->previous() }}" class="btn btn-sm fw-bold btn-primary"><i class="bi bi-arrow-left"></i>Go Back</a>
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
                                <form class="row g-5 pt-5" method="POST" action="{{route('admin.advertisement-plans.store')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Views</label>
                                            <input type="number" name="views"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter views here..."
                                                   value="{{ old('views') }}"/>
                                            @if ($errors->has('views'))
                                                <div class="text-danger">
                                                    {{ $errors->first('views') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label required fw-semibold fs-6">Price</label>
                                            <input type="number" name="price"
                                                   class="form-control form-control-lg mb-3 mb-lg-0"
                                                   placeholder="Enter price here ($)..."
                                                   value="{{ old('price') }}"/>
                                            @if ($errors->has('price'))
                                                <div class="text-danger">
                                                    {{ $errors->first('price') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <label class="col-form-label required fw-semibold fs-6">Status</label>
                                            <select name="status" class="form-select form-control-lg mb-3 mb-lg-0">
                                                <option value="" {{old('status') === '' ? 'selected' : ''}}>Please Select Status</option>
                                                <option value="active" {{old('status') === 'active' ? 'selected' : ''}}>Active</option>
                                                <option value="inactive" {{old('status') === 'inactive' ? 'selected' : ''}}>Inactive</option>
                                            </select>
                                            @if ($errors->has('status'))
                                                <div class="text-danger">
                                                    {{ $errors->first('status') }}
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
