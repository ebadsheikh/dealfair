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
                <label class="col-form-label fw-semibold fs-6">Search By Title</label>
                <input wire:model="searchTitle" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                    placeholder="Search by Title here..." />
            </div>
            <div class="col-md-6">
                <label class="col-form-label required fw-semibold fs-6">Search By ShortTitle</label>
                <input wire:model="searchShortTitle" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                    placeholder="Search short title here..." />
            </div>
        </div>
        <div class="card-body">
            @if ($data->count() > 0)
                <table class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example">
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                            <th class="text-center min-w-50px">#</th>
                            <th class="text-center min-w-100px">Title</th>
                            <th class="text-center min-w-100px">Short Title</th>
                            <th class="text-center min-w-200px">Action</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($data as $item)
                            <tr class="text-center">
                                <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                <td class="text-center text-dark">{{ $item->title }}</td>
                                <td class="text-center text-dark">{{ $item->short_title }}</td>
                                <td class="text-center">
                                    <x-action-button editUrl="{{ Route('admin.dynamic-pages.edit', $item->id) }}"
                                        deleteUrl="{{ Route('admin.dynamic-pages.destroy', $item->id) }}"
                                        id="{{ $item->id }}" />
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
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
