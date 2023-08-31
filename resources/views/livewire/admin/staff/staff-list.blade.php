<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <div class="card card-p-0 card-flush">


        <div class="row mb-5">
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By First Name</label>
                <input wire:model="searchByFirstName" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                    placeholder="Search by first name here..." />
            </div>
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Last Name</label>
                <input wire:model="searchByLastName" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                    placeholder="Search by last name here..." />
            </div>
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Email</label>
                <input wire:model="searchByEmail" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                    placeholder="Search email here..." />
            </div>
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Status</label>
                <select id="searchByStatus" name="searchByStatus" wire:model="searchByStatus"
                    class="form-select form-control-lg">
                    <option value="">Show All</option>
                    @foreach (\App\Enums\UserStatusEnum::toArray() as $userStatus)
                        <option value="{{ $userStatus->value }}">
                            {{ ucfirst($userStatus->value) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Role</label>
                <select id="searchByRole" name="searchByRole" wire:model="searchByRole"
                    class="form-select form-control-lg">
                    <option value="">Show All</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $role->name == $searchByRole ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card-body">
            @if ($users->count() > 0)
                <table class="table table-striped align-middle border rounded table-row-dashed fs-6 g-5"
                    id="kt_datatable_example">
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                            <th class="text-center min-w-50px">#</th>
                            <th class="text-center min-w-100px">Name</th>
                            <th class="text-center min-w-100px">Email</th>
                            <th class="text-center min-w-100px">Role</th>
                            <th class="text-center min-w-100px">Status</th>
                            @canany(['View Staff Detail', 'Delete Staff'])
                            <th class="text-center min-w-200px">Action</th>
                            @endcanany

                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($users as $user)
                            <tr class="text-center">
                                <td class="text-dark">{{ $loop->iteration }}</td>
                                <td class="text-dark">{{ $user->full_name }}</td>
                                <td class="text-dark">{{ $user->email }}</td>
                                {{-- <td class="text-dark">{{ ucfirst($user->roles->first()->name) }}</td> --}}
                                <td>
                                    <span class="btn-group">
                                        @can('Update Role')
                                        <button type="button"
                                            class="btn btn-sm {{ $user->roles->first()->name == 'superadmin'
                                                ? 'btn-primary'
                                                : ($user->roles->first()->name == 'admin'
                                                    ? 'btn-success'
                                                    : ($user->roles->first()->name == 'staff'
                                                        ? 'btn-info'
                                                        : '')) }} dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ ucfirst($user->roles->first()->name) }}
                                        </button>
                                        @else
                                        <button type="button"
                                            class="btn btn-sm {{ $user->roles->first()->name == 'superadmin'
                                                ? 'btn-primary'
                                                : ($user->roles->first()->name == 'admin'
                                                    ? 'btn-success'
                                                    : ($user->roles->first()->name == 'staff'
                                                        ? 'btn-info'
                                                        : '')) }} dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                                            {{ ucfirst($user->roles->first()->name) }}
                                        </button>

                                        @endcan

                                        <div class="dropdown-menu">
                                            @foreach ($roles as $role)
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.staff.change-role', [$user->id, $role->id]) }}">{{ ucfirst($role->name) }}</a>
                                            @endforeach
                                        </div>
                                    </span>
                                </td>
                                <td>
                                    <span class="btn-group">
                                        @can('Update Staff Status')
                                            <button type="button"
                                                class="btn btn-sm {{ $user->userProfile->status == 'active'
                                                    ? 'btn-primary'
                                                    : ($user->userProfile->status == 'suspended'
                                                        ? 'btn-success'
                                                        : ($user->userProfile->status == 'deactivated'
                                                            ? 'btn-warning'
                                                            : ($user->userProfile->status == 'blocked'
                                                                ? 'btn-danger'
                                                                : ''))) }} dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ ucfirst($user->userProfile->status) }}
                                            </button>
                                        @else
                                            <button type="button"
                                                class="btn btn-sm {{ $user->userProfile->status == 'active'
                                                    ? 'btn-primary'
                                                    : ($user->userProfile->status == 'suspended'
                                                        ? 'btn-success'
                                                        : ($user->userProfile->status == 'deactivated'
                                                            ? 'btn-warning'
                                                            : ($user->userProfile->status == 'blocked'
                                                                ? 'btn-danger'
                                                                : ''))) }} dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                                                {{ ucfirst($user->userProfile->status) }}
                                            </button>
                                        @endcan

                                        <div class="dropdown-menu">
                                            @foreach (\App\Enums\UserStatusEnum::toArray() as $userStatus)
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.customers.change.status', [$user->id, $userStatus->value]) }}">{{ ucfirst($userStatus->value) }}</a>
                                            @endforeach
                                        </div>
                                    </span>
                                </td>
                                <td class="text-dark">
                                    @can('View Staff Detail')
                                        <a href="{{ route('admin.staff.details', $user->id) }}" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Staff Detail"
                                            class="btn btn-icon btn-warning btn-sm mr-2"><i
                                                class="bi bi-eye-fill fs-4"></i></a>
                                    @endcan

                                    @can('Delete Staff')
                                        <a href="#" class="btn btn-icon btn-danger btn-sm mr-2" data-bs-toggle="modal"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Staff"
                                            data-bs-target="#delete{{ $user->id }}"><i
                                                class="bi bi-trash fs-4"></i></a>
                                    @endcan

                                </td>
                            </tr>
                            <div class="modal fade" tabindex="-1" id="delete{{ $user->id }}">
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
                                            <a href="{{ Route('admin.staff.destroy', $user->id) }}" type="button"
                                                class="btn btn-danger">Ok</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>

                </table>
            @else
                <div class="text-center m-5">
                    <h4>No Data Found</h4>
                </div>
            @endif

        </div>
        <div class="card-footer m-4">
            <div class="d-flex justify-content-end">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@push('custom-scripts')
    <!-- scripts for dropdown button -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
@endpush
