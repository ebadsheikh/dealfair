<div class="tab-pane fade show active" id="listing" role="tabpanel">
    <div class="card mb-5 mb-xl-10">
        <div id="kt_account_settings_profile_details" class="collapse show">
            <div class="card-body">
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                    <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class=" min-w-200px">Listing Title</th>
                        <th class="text-center min-w-100px min-w-md-150px">Brand</th>
                        <th class="text-center min-w-100px">Category</th>
                        <th class="text-center min-w-100px min-w-md-150px">Listing Type</th>
                        <th class="text-center min-w-100px min-w-md-150px">Date</th>
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
                                 src="{{ asset('assets/frontend/panel/media/stock/ecommerce/1.gif') }}" alt=""/>
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
                        class="fw-bold badge {{ $listing->listing_type === \App\Enums\ProductListingTypesEnum::AUCTION->value
                            ? 'badge-success'
                            : ($listing->listing_type === \App\Enums\ProductListingTypesEnum::SELL->value
                                ? 'badge-primary'
                                : ($listing->listing_type === \App\Enums\ProductListingTypesEnum::BOTH->value
                                    ? 'badge-warning'
                                    : '')) }}">{{ $listing->listing_type }}</span>


                            </td>
                            <td class="text-center">
                                <span class="fw-bold">{{ $listing->created_at->format('Y-m-d') }}</span>
                            </td>
                            <td class="text-center">
                                @role('superadmin')
                                <span class="btn-group">
                            <button type="button" class="btn btn-sm {{ $listing->status === \App\Enums\ProductStatusEnum::PUBLISHED->value
                            ? 'btn-primary'
                            : ($listing->status === \App\Enums\ProductStatusEnum::DRAFT->value
                                ? 'btn-info'
                                : ($listing->status === \App\Enums\ProductStatusEnum::SOLD->value
                                    ? 'btn-success'
                                    : ($listing->status === \App\Enums\ProductStatusEnum::BLOCKED->value
                                    ? 'btn-danger'
                                    : ''))) }} dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                {{ ucfirst($listing->status) }}
                            </button>
                            <div class="dropdown-menu">
                                @foreach (\App\Enums\ProductStatusEnum::toArray() as $listingStatus)
                                    <a class="dropdown-item"
                                       href="{{ route('admin.listing.change.status', [$listing->slug, $listingStatus->value]) }}">{{ ucfirst($listingStatus->value) }}</a>
                                @endforeach
                            </div>
                        </span>
                                @else
                                    <span class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                {{ ucfirst($listing->status) }}
                            </button>
                            <div class="dropdown-menu">
                                @foreach (\App\Enums\ProductStatusEnum::toArray() as $listingStatus)
                                    <a class="dropdown-item"
                                       href="{{ route('product.change.status', [$listing->slug, $listingStatus->value]) }}">{{ ucfirst($listingStatus->value) }}</a>
                                @endforeach
                            </div>
                        </span>
                                    @endrole
                            </td>
                            <td class="text-center">

                                <a href="{{ Route('admin.product.destroy', $listing->slug) }}" data-toggle="tooltip"
                                   data-placement="top"
                                   title="Delete Product" class="btn btn-sm btn-danger fs-8 fw-bold"><i
                                        class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
