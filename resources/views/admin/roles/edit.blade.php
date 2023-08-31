@extends('admin.layouts.master')

@section('title', 'Dealfair | Edit Role')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Roles</h1>
                    {{ Breadcrumbs::render('adminEditRolePage') }}
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-sm fw-bold btn-primary"><i class="bi bi-arrow-left"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="card">
                            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                                @csrf
                                <div class="card-body row">
                                    <div class="col-lg-6">
                                        <label class="col-form-label required fw-bold fs-6">Name</label>
                                        <input type="text" name="name" placeholder="Name" value="{{ old('name', $role->name) }}"
                                               class="form-control form-control-lg mb-3 mb-lg-0">
                                        @if ($errors->has('name'))
                                            <div class="error text-danger">{{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="col-form-label fw-bold fs-6">Guard Name</label>
                                        <input readonly type="text" name="guard_name" value="web"
                                               placeholder="Guard Name"
                                               class="form-control form-control-lg mb-3 mb-lg-0">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('admin.roles.index') }}" class="btn btn-light me-5">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @livewire('admin.permission.permission-list',['role' => $role])
            </div>
        </div>
    </div>
@endsection
