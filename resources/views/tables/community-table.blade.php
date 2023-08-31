<table class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-200px">Community</th>
            <th class="text-center min-w-100px">Members</th>
            <th class="text-center min-w-70px">Products</th>
            <th class="text-center min-w-100px">Sold</th>
            <th class="text-center min-w-100px">Total Sales</th>
            @if (Request::route()->getName() != 'admin.customers.details')
                @canany(['Edit Community', 'Delete Community', 'Leave Community'])
                    <th class="text-center min-w-100px">Actions</th>
                @endcanany
            @endif
        </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
        @foreach ($communities as $community)
            <tr>
                <td>
                    <span class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $community->zip }}</span>
                    <span class="text-muted fw-semibold d-block">{{ $community->name }}</span>
                </td>
                <td class="text-center pe-0">
                    <span class="fw-bold">{{ $community->members_count }}</span>
                </td>
                <td class="text-center pe-0">
                    <span class="fw-bold">{{ $community->products_count }}</span>
                </td>
                <td class="text-center pe-0">
                    <span class="fw-bold">{{ $community->sold_products_count }}</span>
                </td>
                <td class="text-center pe-0">
                    <span class="fw-bold">$0</span>
                </td>
                @role('superadmin')
                    @if (Request::route()->getName() != 'admin.customers.details')
                        <td class="text-center text-dark">

                            @can('Edit Community')
                                <a href="{{ route('admin.communities.edit', $community->id) }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Edit Community"
                                    class="btn btn-icon btn-success btn-sm mr-2"><i class="bi bi-pencil fs-4"></i></a>
                            @endcan

                            @can('Delete Community')
                                <a href="#" class="btn btn-icon btn-danger btn-sm mr-2" data-bs-toggle="modal"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Community"
                                    data-bs-target="#delete{{ $community->id }}"><i class="bi bi-trash fs-4"></i></a>
                            @endcan

                        </td>
                    @endif
                @else
                    @can('Leave Community')
                        <td class="text-center">
                            <button wire:click.prevent="leaveCommunity({{ $community->id }})"
                                class="btn btn-sm btn-danger fs-8 fw-bold">Leave</button>
                        </td>
                    @endcan
                @endrole
            </tr>
            <div class="modal fade" tabindex="-1" id="delete{{ $community->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Delete</h3>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete ?</p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            <a href="{{ Route('admin.communities.destroy', $community->id) }}" type="button"
                                class="btn btn-danger">Ok</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </tbody>
</table>
