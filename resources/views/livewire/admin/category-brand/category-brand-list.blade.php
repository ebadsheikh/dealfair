<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <div class="card card-p-0 card-flush">
        <div class="card-body">
            @if ($categoryBrands->count() > 0)
                <table class="table align-middle border rounded table-row-dashed fs-6 g-5">
                    <thead>
                    <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                        <th class="text-center min-w-100px">Brand</th>
                        <th class="text-center min-w-100px">Category</th>
                        <th class="text-center min-w-200px">Action</th>
                    </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                    @foreach ($categoryBrands as $key => $categoryBrand)
                        <tr class="text-center">
                            <td class="text-dark">{{ $categoryBrand->brand->name }}</td>
                            <td class="text-dark">{{ $categoryBrand->category->name ?? '' }}</td>
                            <td>
                                <a href="{{ route('admin.category.brand.edit', $categoryBrand->id) }}"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Category Brand"
                                   class="btn btn-icon btn-success btn-sm mr-2"><i
                                        class="bi bi-pencil fs-4"></i></a>

                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Category Brand">
                                        <a class="btn btn-icon btn-danger btn-sm mr-2" data-bs-toggle="modal"
                                           data-bs-target="#delete{{ $categoryBrand->id }}"><i
                                                class="bi bi-trash fs-4"></i></a>
                               </span>
                            </td>
                        </tr>
                        <div class="modal fade" tabindex="-1" id="delete{{ $categoryBrand->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header pb-0 border-0">
                                        <div
                                            class="swal2-icon swal2-warning swal2-icon-show border-warning text-warning"
                                            style="display: flex;">
                                            <div class="swal2-icon-content" style="font-size: 70px">!</div>
                                        </div>
                                    </div>
                                    <div class="modal-body mx-auto">
                                        <p>Are you sure you want to delete category brand ?
                                        </p>
                                    </div>
                                    <div class="modal-footer justify-content-center border-0 pt-0">
                                        <a href="{{ route('admin.category.brand.destroy', $categoryBrand->id) }}"
                                           type="button" class="btn btn-danger">Yes, Delete</a>
                                        <button type="button" class="btn btn-active-light-primary"
                                                data-bs-dismiss="modal">No, Cancel
                                        </button>
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
                {{ $categoryBrands->links() }}
            </div>
        </div>
    </div>
</div>
