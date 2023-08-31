@extends('admin.layouts.master')

@section('title', 'Dealfair | Roles')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Roles</h1>
                    {{ Breadcrumbs::render('adminRolesPage') }}
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('admin.roles.create') }}" type="button" class="btn btn-primary"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-1 position-absolute ms-4">
                        </span>Add New Role</a>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="card card-p-0 card-flush">
                        <div class="card-body">
                            <table class="table align-middle border rounded table-row-dashed fs-6 g-5 mt-3">
                                <thead>
                                    <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                                        <th class="text-center min-w-100px">Role Name</th>
                                        <th class="text-center min-w-100px">Guard Name</th>
                                        <th class="text-center min-w-100px">Permissions</th>
                                        <th class="text-center min-w-200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($roles as $key => $role)
                                        <tr class="text-center">
                                            <td class="text-dark">{{ $role->name }}</td>
                                            <td class="text-dark">{{ $role->guard_name }}</td>
                                            <td class="text-dark">
                                                @if ($role->name === 'superadmin')
                                                    {{ 'ALL' }}
                                                @else
                                                    {{ $role->permissions_count }}
                                                @endif
                                            </td>

                                            <td class="text-dark">
                                                @if (!in_array($role->name, array_values(\App\Enums\RolesEnum::toValuesArray())))
                                                    <div>
                                                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit Role "
                                                            class="btn btn-icon btn-success btn-sm mr-2"><i
                                                                class="bi bi-pencil fs-4"></i></a>

                                                        <a href="#" class="btn btn-icon btn-danger btn-sm mr-2"
                                                            data-bs-toggle="modal" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete Role"
                                                            data-bs-target="#delete{{ $role->id }}"><i
                                                                class="bi bi-trash fs-4"></i></a>

                                                    </div>
                                                @else
                                                    --
                                                @endif
                                            </td>
                                        </tr>
                                        <div class="modal fade" tabindex="-1" id="delete{{ $role->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3>Delete</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete ?</p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <a href="{{ route('admin.roles.destroy', $role->id) }}"
                                                            type="button" class="btn btn-danger">Ok</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
