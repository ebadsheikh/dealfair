<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <div class="card card-p-0 card-flush">
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
        <div class="row mb-5">
            <div class="col-md-6">
                <label class="col-form-label fw-semibold fs-6">Search By Name</label>
                <input wire:model="searchName" type="text"
                       class="form-control form-control-lg mb-3 mb-lg-0"
                       placeholder="Search by name here..."/>
            </div>
            <div class="col-md-6">
                <label class="col-form-label required fw-semibold fs-6">Search By Email</label>
                <input wire:model="searchEmail" type="text"
                       class="form-control form-control-lg mb-3 mb-lg-0"
                       placeholder="Search email here..."/>
            </div>
        </div>

        <div class="card-body">
            @if ($users->count() > 0)
                <table class="table table-striped align-middle border rounded table-row-dashed fs-6 g-5"
                       id="kt_ecommerce_category_table">
                    <thead>
                    <!--begin::Table row-->
                    <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                        <th class="text-center min-w-50px">#</th>
                        <th class="text-center min-w-100px">Name</th>
                        <th class="text-center min-w-100px">Email</th>
                        <th class="text-center min-w-200px">Action</th>
                    </tr>
                    <!--end::Table row-->
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <td class="text-dark">{{ $loop->iteration }}</td>
                            <td class="text-dark">{{ $user->name }}</td>
                            <td class="text-dark">{{ $user->email }}</td>
                            <td class="text-dark">
                                <div class="">
                                    <x-action-button id="{{ $user->id }}"
                                                     deleteUrl="{{ Route('admin.destroy', $user->id) }}"
                                                     editUrl="{{ Route('admin.edit', $user->id) }}"/>
                                </div>
                            </td>
                        </tr>
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
