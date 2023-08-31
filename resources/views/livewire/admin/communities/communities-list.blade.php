@php
    use App\Helpers\GlobalHelper;
    use App\Enums\MediaDirectoryNamesEnum;
@endphp
<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <div class="card card-p-0 card-flush">
        <div class="row mb-5">
            <div class="col-md-4">
                <label class="col-form-label fw-semibold fs-6">Search By Zip code</label>
                <input wire:model="searchByZip" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                       placeholder="Search by zip code here..."/>
            </div>
            <div class="col-md-4">
                <label class="col-form-label fw-semibold fs-6">Search By Sold Items</label>
                <select id="searchBySoldItems" name="searchBySoldItems" wire:model="searchBySoldItems"
                        class="form-select form-control-lg">
                    <option value="">Show All</option>
                    <option value="higherSoldItems">Higher Sold Items</option>
                    <option value="lowerSoldItems">Lowest Sold Items</option>

                </select>
            </div>
            <div class="col-md-4">
                <label class="col-form-label fw-semibold fs-6">Search By Members </label>
                <select id="searchByMembers" name="searchByMembers" wire:model="searchByMembers"
                        class="form-select form-control-lg">
                    <option value="">Show All</option>
                    <option value="higherSoldItems">Higher Members</option>
                    <option value="lowerSoldItems">Lowest Members</option>

                </select>
            </div>
            <div class="col-md-4">
                <label class="col-form-label fw-semibold fs-6">Search By Sales </label>
                <select id="searchBySales" name="searchBySales" wire:model="searchBySales"
                        class="form-select form-control-lg">
                    <option value="">Show All</option>
                    <option value="higherSoldItems">Higher Sales</option>
                    <option value="lowerSoldItems">Lowest Sales</option>

                </select>
            </div>
            <div class="col-md-4">
                <label class="col-form-label fw-semibold fs-6">Search By State </label>
                <select id="searchByState" name="searchByState" wire:model="searchByState"
                        class="form-select form-control-lg">
                    <option value="" selected>Show All</option>
                    @foreach ($states as $state)
                        <option value="{{$state}}">{{$state}}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-4">
                <label class="col-form-label fw-semibold fs-6">Search By Listing Type</label>
                <select id="searchByListingType" name="searchByListingType" wire:model="searchByListingType"
                        class="form-select form-control-lg">
                    <option value="">Show All</option>
                    @foreach($listingTypes as $listingType)
                        <option value="{{$listingType['type']}}">{{Str::upper($listingType['type'])}}
                            ({{$listingType['counts']}})
                        </option>
                    @endforeach


                </select>
            </div>
        </div>
        <div class="card-body">
            @if (count($communities) > 0)
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-200px">Community</th>
                        <th class="text-center min-w-100px">Members</th>
                        <th class="text-center min-w-70px">Products</th>
                        <th class="text-center min-w-100px">Sold</th>
                        <th class="text-center min-w-100px">Total Sales</th>
                        <th class="text-center min-w-100px">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                    @foreach ($communities as $community)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                <span class="symbol symbol-50px">
                                    <img class="symbol-label"
                                         src="{{ $community->getFirstMediaUrl(MediaDirectoryNamesEnum::COMMUNITY_IMAGES->value) ? $community->getFirstMediaUrl(MediaDirectoryNamesEnum::COMMUNITY_IMAGES->value) : asset('assets/media/svg/files/blank-image.svg') }}"
                                         alt="{{ $community->getFirstMediaUrl(MediaDirectoryNamesEnum::COMMUNITY_IMAGES->value) ? $community->name : 'Default Community Image' }}"/>
                                </span>
                                    <div class="ms-5">
                                        <span
                                            class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $community->zip }}</span>
                                        <span class="text-muted fw-semibold d-block">{{ $community->short_name }}</span>
                                    </div>
                                </div>

                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">{{ $community->members_count }}</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">{{ $community->listings_count }}</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">{{ $community->sold_products_count }}</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">{{GlobalHelper::formatPrice(0)}}</span>
                            </td>
                            <td class="text-center text-dark">
                                <a href="{{ route('admin.communities.edit', $community->id) }}"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="top" title="Edit Community"
                                   class="btn btn-icon btn-success btn-sm mr-2"><i
                                        class="bi bi-pencil fs-4"></i></a>
                                <a href="#" class="btn btn-icon btn-danger btn-sm mr-2" data-bs-toggle="modal"
                                   data-bs-placement="top" title="Delete Community"
                                   data-bs-target="#delete{{ $community->id }}"><i class="bi bi-trash fs-4"></i></a>
                            </td>
                        </tr>

                        <div class="modal fade" tabindex="-1" id="delete{{ $community->id }}">
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
                                        <p>Are you sure you want to delete category <b>{{$community->name}}</b> ?
                                        </p>
                                    </div>
                                    <div class="modal-footer justify-content-center border-0 pt-0">
                                        <a href="{{ route('admin.communities.destroy', $community->id) }}"
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
                {{ $communities->links() }}
            </div>
        </div>
    </div>
</div>
