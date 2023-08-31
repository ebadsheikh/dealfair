@php
    use App\Enums\ProductStatusEnum;
    use App\Helpers\StatusCssClassHelper;
    use App\Enums\MediaDirectoryNamesEnum;
@endphp
<div class="card card-flush py-5">
    <h1 class="text-dark fw-bold mb-6 fs-3 px-5">Search In Listing</h1>
    <div class="d-flex flex-column flex-md-row gap-3 px-5">
        <div class="col-md-4">
            <input type="text" wire:model="searchByTitle" class="form-control" placeholder="Search By Title"/>
        </div>
        <div class="col-md-4">
            <select class="form-select" wire:model="searchByStatus">
                <option value="">Search By Status</option>
                @foreach(ProductStatusEnum::cases() as $status)
                    <option value="{{$status->value}}">{{$status->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-select" wire:model="searchByStore">
                <option value="">Search By Store</option>
                @foreach($stores as $store)
                    <option value="{{$store->slug}}">{{$store->store_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="card-body pt-5">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class=" min-w-200px">Listing Title</th>
                    <th class="text-center min-w-100px min-w-md-150px">Brand</th>
                    <th class="text-center min-w-100px">Category</th>
                    <th class="text-center min-w-100px min-w-md-150px">Listing Type</th>
                    <th class="text-center min-w-100px min-w-md-150px">Last Updated</th>
                    <th class="text-center min-w-md-150px">Status</th>
                    <th class="text-center min-w-200px">Actions</th>
                </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                @foreach ($listings as $listing)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="symbol symbol-50px">
                                    <img class="symbol-label"
                                         src="{{ $listing->getFirstMediaUrl(MediaDirectoryNamesEnum::PRODUCT_IMAGES->value) ? $listing->getFirstMediaUrl(MediaDirectoryNamesEnum::PRODUCT_IMAGES->value) : asset('assets/media/svg/files/blank-image.svg') }}"
                                         alt="{{ $listing->getFirstMediaUrl(MediaDirectoryNamesEnum::PRODUCT_IMAGES->value) ? $listing->title : 'Default Listing Image' }}"/>
                                </span>
                                <div class="ms-5">
                                    <span class="text-gray-800 fs-5 fw-bold">{{ $listing->title }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="fw-bold">{{ $listing->brand }}</span>
                        </td>
                        <td class="text-center">
                            <span class="fw-bold">{{ $listing->category->name }}</span>
                        </td>
                        <td class="text-center">
                            <span
                                class="fw-bold badge {{ StatusCssClassHelper::listingTypeCssClass($listing->listing_type,'badge') }}">
                                {{ Str::upper($listing->listing_type) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="fw-bold">{{ $listing->updated_at->diffForHumans() }}</span>
                        </td>
                        <td class="text-center">

                            <span class="btn-group">
                                <button type="button"
                                        class="btn btn-sm {{ StatusCssClassHelper::listingStatusCssClass($listing->status,'btn') }} dropdown-toggle"
                                        data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    {{ ucfirst($listing->status) }}
                                </button>
                                <div class="dropdown-menu">
                                    @foreach (\App\Enums\ProductStatusEnum::toArray() as $productStatus)
                                        <a class="dropdown-item"
                                           href="{{ route('admin.listing.change.status', [$listing->slug, $productStatus->value]) }}">{{ ucfirst($productStatus->value) }}</a>
                                    @endforeach
                                </div>
                            </span>

                        </td>
                        <td class="text-center">
                            <a href="{{ Route('listing.details', $listing->slug) }}" data-toggle="tooltip"
                               data-placement="top"
                               title="View Product" class="btn btn-icon btn-primary btn-sm mr-2"><i
                                    class="fa fa-eye"></i></a>
                            <span data-toggle="tooltip" data-placement="top"
                                  title="Delete Listing">
                                                    <a href="{{ Route('admin.listing.destroy', $listing->slug) }}"
                                                       class="btn btn-icon btn-danger btn-sm mr-2" data-bs-toggle="modal"
                                                       data-bs-target="#delete{{ $store->slug }}"><i
                                                            class="fa fa-trash"></i></a>
                                                </span>

                        </td>
                    </tr>
                    <div class="modal fade" tabindex="-1" id="delete{{ $listing->slug }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header pb-0 border-0">
                                    <div class="swal2-icon swal2-warning swal2-icon-show border-warning text-warning"
                                         style="display: flex;">
                                        <div class="swal2-icon-content" style="font-size: 70px">!</div>
                                    </div>
                                </div>
                                <div class="modal-body mx-auto">
                                    <p>Are you sure you want to delete listing <b>{{ $listing->title ?? '' }}</b> ?</p>
                                </div>
                                <div class="modal-footer justify-content-center border-0 pt-0">
                                    <a href="#"
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
            {{$listings->links()}}
        </div>
    </div>
</div>
