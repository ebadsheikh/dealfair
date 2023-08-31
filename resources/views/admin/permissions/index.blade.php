@extends('admin.layouts.master')

@section('title', 'Dealfair | Permissions')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Permissions</h1>
                    {{ Breadcrumbs::render('adminRolesAndPermissionsPage') }}
                </div>
                {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ Route('admin.staff.create') }}" type="button" class="btn btn-primary"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-1 position-absolute ms-4">
                        </span>Add New Role</a>
                </div> --}}
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="d-flex flex-column gap-7 col-3 gap-lg-10 mb-7 me-lg-10">
                        @include('admin.layouts.role_permission_sidebar')
                    </div>
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="card">
                            <div class="form-group mt-5">
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

                            <div class="card-body">
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example">
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                                            <th class="text-center min-w-50px">#</th>
                                            <th class="text-center min-w-100px">Name</th>
                                            <th class="text-center min-w-100px">Guard Name</th>
                                            @foreach ($roles as $role)
                                                <th class="text-center min-w-80px">
                                                    {{ $role->name }}
                                                </th>
                                            @endforeach
                                            {{-- <th class="text-center min-w-200px">Action</th> --}}
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($permissions as $key => $permission)
                                            <tr class="text-center">
                                                <td class="text-dark">{{ $loop->iteration }}</td>
                                                <td class="text-dark">{{ $permission->name }}</td>
                                                <td class="text-dark">{{ $permission->guard_name }}</td>
                                                @foreach ($roles as $role)
                                                    <td class="text-dark ">
                                                        @if ($role->name == "superadmin")
                                                            <input class="form-check-input" type="checkbox" disabled checked
                                                                value="1" />
                                                        @elseif ($permission->hasRole($role))
                                                            <input class="form-check-input" type="checkbox" disabled checked
                                                                value="1" />
                                                        @else
                                                            <input class="form-check-input" type="checkbox" disabled
                                                                value="0" />
                                                        @endif
                                                    </td>
                                                @endforeach
                                                {{-- <td class="text-dark">
                                                <div class="">
                                                    <x-action-button id="{{ $role->id }}"
                                                        deleteUrl="#"
                                                        editUrl="{{ Route('admin.roles.edit',$role->id) }}" />
                                                </div>
                                            </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

@endsection
