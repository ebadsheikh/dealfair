@php
    use App\Enums\TicketCategoryStatusEnum;
@endphp
<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <div class="card card-p-0 card-flush">
        <div class="row mb-5">
            <div class="col-md-6">
                <label class="col-form-label fw-semibold fs-6">Search By Name</label>
                <input wire:model="searchName" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                    placeholder="Search by name here..." />
            </div>
            <div class="col-md-6">
                <label class="col-form-label fw-semibold fs-6">Search By Status</label>
                <select wire:model="searchStatus" id="searchStatus" class="form-select form-select-lg fw-semibold">
                    <option value="">Show All</option>
                    @foreach (TicketCategoryStatusEnum::toArray() as $ticketStatus)
                        <option value="{{ $ticketStatus }}" {{ $ticketStatus == $searchStatus ? 'selected' : '' }}>Show
                            {{ ucwords($ticketStatus->value) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="card-body">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example">
                    <thead>
                        <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                            <th class="text-center min-w-50px">#</th>
                            <th class="text-center min-w-50px">Name</th>
                            <th class="text-center min-w-100px">Status</th>
                            @canany(['Edit Ticket Category', 'Delete Ticket Category'])
                            <th class="text-center min-w-100px">Action</th>
                            @endcanany

                        </tr>
                    </thead>

                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($ticketCategories as $category)
                            <tr class="text-center">
                                <td class="text-dark">{{ $loop->iteration }}</td>
                                <td class="text-dark">{{ $category->name }}</td>
                                <td>
                                    <span class="btn-group">
                                        @can('Update Ticket Category Status')
                                            <button type="button"
                                                class="btn btn-sm {{ $category->status == 'active' ? 'btn-primary' : 'btn-danger' }} dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ ucfirst($category->status) }}
                                            </button>
                                        @else
                                            <button type="button"
                                                class="btn btn-sm {{ $category->status == 'active' ? 'btn-primary' : 'btn-danger' }} dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                disabled>
                                                {{ ucfirst($category->status) }}
                                            </button>
                                        @endcan

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.ticket.category.update.status', [$category->slug, TicketCategoryStatusEnum::ACTIVE->value]) }}">{{ ucfirst(TicketCategoryStatusEnum::ACTIVE->value) }}</a>
                                            <a class="dropdown-item"
                                                href="{{ route('admin.ticket.category.update.status', [$category->slug, TicketCategoryStatusEnum::DRAFT->value]) }}">{{ ucfirst(TicketCategoryStatusEnum::DRAFT->value) }}</a>
                                        </div>
                                    </span>
                                </td>
                                <td class="text-dark">
                                    <div>
                                        @can('Edit Ticket Category')
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <a class="btn btn-icon btn-success btn-sm mr-2" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_{{ $category->id }}"><i
                                                        class="bi bi-pencil fs-4"></i></a>
                                            </span>
                                        @endcan

                                        @can('Delete Ticket Category')
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <a class="btn btn-icon btn-danger btn-sm mr-2" data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $category->id }}"><i
                                                        class="bi bi-trash fs-4"></i></a>
                                            </span>
                                        @endcan


                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" tabindex="-1" id="kt_modal_{{ $category->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Edit Category</h3>
                                            <!--begin::Close-->
                                            <div class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <span class="svg-icon svg-icon-1"></span>
                                            </div>
                                            <!--end::Close-->

                                        </div>
                                        <form action="{{ route('admin.ticket.category.update', $category->id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="fv-row mb-10">
                                                        <label class="form-label required">Name</label>
                                                        <input name="name" placeholder="Enter name here..."
                                                            class="form-control form-control-lg"
                                                            value="{{ old('name', $category->name) }}" />
                                                        @error('name')
                                                            <div class="error text-danger">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" tabindex="-1" id="delete{{ $category->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header pb-0 border-0">
                                            <div class="swal2-icon swal2-warning swal2-icon-show border-warning text-warning"
                                                style="display: flex;">
                                                <div class="swal2-icon-content" style="font-size: 70px">!</div>
                                            </div>
                                        </div>
                                        <div class="modal-body mx-auto">
                                            <p>Are you sure you want to delete <b>{{ $category->name ?? '' }}</b> ?</p>
                                        </div>
                                        <div class="modal-footer justify-content-center border-0 pt-0">
                                            <a href="{{ route('admin.ticket.category.destroy', $category->id) }}"
                                                type="button" class="btn btn-danger">Yes, Delete</a>
                                            <button type="button" class="btn btn-active-light-primary"
                                                data-bs-dismiss="modal">No,
                                                Cancel</button>
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
