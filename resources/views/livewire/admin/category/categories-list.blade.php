@php
    use App\Enums\CategoryStatusEnum;
    use App\Enums\MediaDirectoryNamesEnum;
@endphp
<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <div class="card card-p-0 card-flush">
        <div class="row mb-5">
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Name</label>
                <input wire:model="searchName" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                       placeholder="Search by name here..."/>
            </div>
            <div class="col-md-3">
                <label class="col-form-label required fw-semibold fs-6">Search By Slug</label>
                <input wire:model="searchSlug" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                       placeholder="Search slug here..."/>
            </div>
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Status</label>
                <select wire:model="searchStatus" id="searchStatus" class="form-select form-select-lg fw-semibold">
                    <option value="">Show All</option>
                    @foreach (CategoryStatusEnum::toArray() as $categoryStatus)
                        <option value="{{ $categoryStatus }}" {{ $categoryStatus == $searchStatus ? 'selected' : '' }}>
                            Show {{ ucwords($categoryStatus->value) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Image</label>
                <select wire:model="searchByImage" id="searchByImage" class="form-select form-select-lg fw-semibold">
                    <option value="">Show All</option>
                    <option value="havingImage">Having Image</option>
                    <option value="notHavingImage">Not Having Image</option>
                </select>
            </div>
        </div>
        <div class="card-body">
            @if (count($categories) > 0)
                <table class="table align-middle border rounded table-row-dashed fs-6 g-5">
                    <thead>
                    <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                        <th class="text-center">Image</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Slug</th>
                        <th class="text-center">Child Count</th>
                        <th class="text-center">Status</th>
                        @canany(['Edit Category', 'Delete Category'])
                            <th class="text-center ">Action</th>
                        @endcanany

                    </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                    @foreach ($categories as $category)
                        <tr class="text-center">
                            <td>
                                <span class="symbol symbol-50px">
                                    <img class="symbol-label"
                                         src="{{$category->image_url != null ? $category->image_url : asset('assets/media/svg/files/blank-image.svg')}}"
                                         alt="{{$category->name}}"/>
                                </span>
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <a href="{{route('admin.category.index', $category->id)}}">
                                    {{ $category->children_categories_count }}
                                </a>
                            </td>
                            <td>
                                <span class="btn-group">
                                    @can('Update Category Status')
                                        <button type="button"
                                                class="btn btn-sm {{ $category->status == 'active' ? 'btn-primary' : 'btn-danger' }} dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
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
                                           href="{{ route('admin.category.change-status', [$category->slug, CategoryStatusEnum::ACTIVE->value]) }}">{{ ucfirst(CategoryStatusEnum::ACTIVE->value) }}</a>
                                        <a class="dropdown-item"
                                           href="{{ route('admin.category.change-status', [$category->slug, CategoryStatusEnum::DRAFT->value]) }}">{{ ucfirst(CategoryStatusEnum::DRAFT->value) }}</a>
                                    </div>
                                </span>
                            </td>
                            <td>
                                @can('Edit Category')
                                    <a href="{{ route('admin.category.edit', $category->slug) }}"
                                       data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Category"
                                       class="btn btn-icon btn-success btn-sm mr-2"><i
                                            class="bi bi-pencil fs-4"></i></a>
                                @endcan
                                @can('Delete Category')
                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Category">
                                            <a class="btn btn-icon btn-danger btn-sm mr-2" data-bs-toggle="modal"
                                               data-bs-target="#delete{{ $category->slug }}"><i
                                                    class="bi bi-trash fs-4"></i></a>
                                        </span>
                                @endcan
                            </td>

                        </tr>
                        <div class="modal fade" tabindex="-1" id="delete{{ $category->slug }}">
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
                                        <p>Are you sure you want to delete category <b>{{ $category->name ?? '' }}</b> ?
                                        </p>
                                    </div>
                                    <div class="modal-footer justify-content-center border-0 pt-0">
                                        <a href="{{ route('admin.category.delete', $category->slug) }}"
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
    </div>
</div>
