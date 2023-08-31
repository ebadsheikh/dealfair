@php
    use App\Enums\BrandStatusEnum;
@endphp
<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <div class="card card-p-0 card-flush">
        <div class="row mb-5">
            <div class="col-md-6">
                <label class="col-form-label fw-semibold fs-6">Search By Name</label>
                <input wire:model="searchName" type="text"
                       class="form-control form-control-lg mb-3 mb-lg-0"
                       placeholder="Search by Name here..."/>
            </div>
            <div class="col-md-6">
                <label class="col-form-label fw-semibold fs-6">Search By Status</label>
                <select wire:model="searchStatus" id="searchStatus"
                        class="form-select form-select-lg fw-semibold">
                    <option value="">Show All</option>
                    @foreach(BrandStatusEnum::toArray() as $brandStatus)
                        <option value="{{$brandStatus}}" {{$brandStatus == $searchStatus ? 'selected' : ''}}>
                            Show {{ucwords($brandStatus->value )}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-body">
            @if (count($brands) > 0)
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example">
                    <thead>
                    <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                        <th class="text-center min-w-50px">#</th>
                        <th class="text-center min-w-50px">Name</th>
                        <th class="text-center min-w-100px">Status</th>
                        <th class="text-center min-w-200px">Action</th>
                    </tr>
                    </thead>

                    <tbody class="fw-semibold text-gray-600">
                    @foreach ($brands as  $brand)
                        <tr class="text-center">
                            <td class="text-dark">{{ $loop->iteration }}</td>
                            <td class="text-dark">{{ $brand->name }}</td>
                            <td class="text-dark">
                                <span class="btn-group">
                                    <button type="button"
                                            class="btn btn-sm {{ $brand->status == BrandStatusEnum::ACTIVE->value ? 'btn-primary' : 'btn-danger' }} dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ ucwords($brand->status) }}
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{ route('admin.brands.update.status', [$brand->id, BrandStatusEnum::ACTIVE->value]) }}">{{ ucfirst(BrandStatusEnum::ACTIVE->value) }}</a>
                                        <a class="dropdown-item"
                                           href="{{ route('admin.brands.update.status', [$brand->id, BrandStatusEnum::DRAFT->value]) }}">{{ ucfirst(BrandStatusEnum::DRAFT->value) }}</a>
                                    </div>
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.brands.edit', $brand->id) }}"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Brand"
                                   class="btn btn-icon btn-success btn-sm mr-2"><i
                                        class="bi bi-pencil fs-4"></i></a>

                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Brand">
                                        <a class="btn btn-icon btn-danger btn-sm mr-2" data-bs-toggle="modal"
                                           data-bs-target="#delete{{ $brand->id }}"><i
                                                class="bi bi-trash fs-4"></i></a>
                               </span>
                            </td>
                        </tr>

                        <div class="modal fade" tabindex="-1" id="delete{{ $brand->id }}">
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
                                        <p>Are you sure you want to delete category <b>{{ $brand->name ?? '' }}</b> ?
                                        </p>
                                    </div>
                                    <div class="modal-footer justify-content-center border-0 pt-0">
                                        <a href="{{ route('admin.brands.destroy', $brand->id) }}"
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
                {{ $brands->links() }}
            </div>
        </div>
    </div>
</div>
