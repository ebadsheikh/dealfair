<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <div class="card card-p-0 card-flush">

        <div class="card-body pt-5">
            <div class="table-responsive">
                @if($stores->count() > 0)

                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                        <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class=" min-w-100px">Store Logo</th>
                            <th class=" min-w-100px">Store Thumbnail</th>
                            <th class=" min-w-100px">Store Name</th>
                            <th class="text-center min-w-100px">Email</th>
                            <th class="text-center min-w-100px">Category</th>
                            <th class="text-center min-w-100px">Telephone</th>
                            <th class="text-center min-w-100px">Listings</th>
                            <th class="text-center min-w-100px">Status</th>
                            <th class="text-center min-w-200px">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                        @foreach ($stores as $store)
                            <tr class="text-center">
                                <td class="text-dark"><span class="symbol symbol-50px">
                                    <img class="symbol-label"
                                         src="{{$store->getFirstMediaUrl('store_logo') != null ? $store->getFirstMediaUrl('store_logo') : asset('assets/media/svg/files/blank-image.svg')}}"
                                         alt="{{$store->store_name}}"/>
                                </span></td>
                                <td class="text-dark"><span class="symbol symbol-50px">
                                    <img class="symbol-label"
                                         src="{{$store->getFirstMediaUrl('store_thumbnail') != null ? $store->getFirstMediaUrl('store_thumbnail') : asset('assets/media/svg/files/blank-image.svg')}}"
                                         alt="{{$store->store_name}}"/>
                                </span></td>
                                <td class="text-dark">{{ $store->store_name }}</td>
                                <td class="text-dark">{{ $store->email }}</td>
                                <td class="text-dark">{{ $store->category->name }}</td>
                                <td class="text-dark">{{ $store->telephone }}</td>
                                <td class="text-dark">
                                    <a href="{{route('seller.my.listing',['store' => $store->slug])}}">
                                        {{ $store->listings_count }}
                                    </a>
                                </td>
                                <td class="text-dark">
                                    @if ($store->status == 'pending')
                                        <span class="badge badge-primary">{{ ucwords($store->status) }}</span>
                                    @elseif($store->status == 'active')
                                        <span class="badge badge-success">{{ ucwords($store->status) }}</span>
                                    @elseif($store->status == 'inprogress')
                                        <span class="badge badge-success">{{ ucwords($store->status) }}</span>
                                    @elseif($store->status == 'hold')
                                        <span class="badge badge-success">{{ ucwords($store->status) }}</span>
                                    @elseif($store->status == 'closed')
                                        <span class="badge badge-success">{{ ucwords($store->status) }}</span>
                                    @endif
                                </td>
                                <td class="text-dark">
                                    <div class="">
                                        <a href="{{route('seller.create.listing.for.store',$store->slug)}}" class="btn btn-sm btn-primary">
                                            Add New Listing
                                        </a>
                                        <a href="{{route('seller.edit.store',$store->slug)}}"
                                           data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Store"
                                           class="btn btn-icon btn-success btn-sm mr-2"><i
                                                class="bi bi-pencil fs-4"></i></a>
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Store">
                                            <a class="btn btn-icon btn-danger btn-sm mr-2" data-bs-toggle="modal"
                                               data-bs-target="#delete{{ $store->slug }}"><i
                                                    class="bi bi-trash fs-4"></i></a>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" tabindex="-1" id="delete{{ $store->slug }}">
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
                                            <p>Are you sure you want to delete store <b>{{ $store->store_name ?? '' }}</b> ?
                                            </p>
                                        </div>
                                        <div class="modal-footer justify-content-center border-0 pt-0">
                                            <a href="{{ route('seller.delete.store', $store->slug) }}"
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
                    <h3 class="text-center">No Stores Found</h3>
                @endif

            </div>
        </div>
    </div>
</div>

