<div class="row g-xl-10 mb-5 mb-xl-10">
    <div class="card card-p-0 card-flush">
        <div class="row mb-5">
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By First Name</label>
                <input wire:model="searchByFirstName" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                    placeholder="Search by first name here..." />
            </div>
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Last Name</label>
                <input wire:model="searchByLastName" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                    placeholder="Search by last name here..." />
            </div>
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Email</label>
                <input wire:model="searchByEmail" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                    placeholder="Search email here..." />
            </div>
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Status</label>
                <select id="searchByStatus" name="searchByStatus" wire:model="searchByStatus"
                    class="form-select form-control-lg">
                    <option value="">Show All</option>
                    @foreach (\App\Enums\UserStatusEnum::toArray() as $userStatus)
                        <option value="{{ $userStatus->value }}">
                            {{ ucfirst($userStatus->value) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By SignUp</label>
                <select id="searchBySignup" name="searchBySignup" wire:model="searchBySignup"
                    class="form-select form-control-lg">
                    <option value="">Show All</option>
                    @foreach ($signupTypes as $signupType)
                        <option value="{{ $signupType['type'] }}"
                            {{ $signupType['type'] == $searchByStatus ? 'selected' : '' }}>
                            {{ ucfirst($signupType['type']) }} ({{ $signupType['counts'] }})</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By List</label>
                <select id="searchByList" name="searchByList" wire:model="searchByList"
                    class="form-select form-control-lg">
                    <option value="">Show All</option>
                    <option value="highest">Highest Listing</option>
                    <option value="lowest">Lowest Listing</option>

                </select>
            </div>
            {{-- <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Buyer</label>
                <select id="searchByBuyer" name="searchByBuyer"
                    class="form-select form-control-lg">
                    <option value="">Select To Filter By Buyer</option>
                    <option value="">Show All</option>
                    <option value="highest">Highest Buyer</option>
                    <option value="lowest">Lowest Buyer</option>

                </select>
            </div>
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Seller</label>
                <select id="searchBySeller" name="searchBySeller"
                    class="form-select form-control-lg">
                    <option value="">Select To Filter By Seller</option>
                    <option value="">Show All</option>
                    <option value="highest">Highest Seller</option>
                    <option value="lowest">Lowest Seller</option>

                </select>
            </div> --}}
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By State</label>
                <select id="searchByState" name="searchByState" wire:model="searchByState"
                    class="form-select form-control-lg">
                    <option value="">Show All</option>
                    @foreach ($allStates as $state)
                        <option value="{{ $state }}">{{ $state }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Community</label>
                <select id="searchByCommunity" name="searchByCommunity" wire:model="searchByCommunity"
                    class="form-select form-control-lg">
                    <option value="">Show All</option>
                    <option value="0-5">Less than 5</option>
                    <option value="6-10">6-10</option>
                    <option value="11-15">11-15</option>
                    <option value="15-20">15-20</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Verification</label>
                <select id="searchByVerification" name="searchByVerification" wire:model="searchByVerification"
                    class="form-select form-control-lg">
                    <option value="">Show All</option>
                    <option value="1">Verified</option>
                    <option value="0">Not Verified</option>

                </select>
            </div>
        </div>

        <div class="card-body">
            @if (count($users) > 0)
                <table class="table align-middle  table-row-dashed fs-6 gy-5" id="kt_datatable_example">
                    <thead>
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="text-center">Avatar</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Products</th>
                            <th class="text-center">Communities</th>
                            <th class="text-center">Verification</th>
                            <th class="text-center">Status</th>
                            <th class="text-center ">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">

                        @foreach ($users as $user)
                            <tr class="text-center">
                                <td>
                                    <a href="#" class="symbol symbol-50px">
                                        <span class="symbol-label"
                                            style="background-image:url({{ $user->getFirstMediaUrl('user_image') ? $user->getFirstMediaUrl('user_image') : asset('assets/media/svg/avatars/blank.svg') }});"></span>
                                    </a>
                                </td>
                                <td>
                                    {{ $user->full_name }}
                                </td>
                                <td>
                                    {{ $user->userProfile->username }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->listings_count }}
                                </td>
                                <td>
                                    {{ $user->communities_count }}
                                </td>
                                <td>
                                    <span
                                        class="badge {{ $user->userProfile->is_verification_badge_allowed == 1 ? 'badge-success' : 'badge-danger' }}">{{ $user->userProfile->is_verification_badge_allowed == 1 ? 'Verified' : 'Not Verified' }}</span>
                                </td>
                                <td>
                                    <span class="btn-group">
                                        @can('Update Customer Status')
                                            <button type="button"
                                                class="btn btn-sm {{ $user->userProfile->status == 'active'
                                                    ? 'btn-primary'
                                                    : ($user->userProfile->status == 'suspended'
                                                        ? 'btn-success'
                                                        : ($user->userProfile->status == 'deactivated'
                                                            ? 'btn-warning'
                                                            : ($user->userProfile->status == 'blocked'
                                                                ? 'btn-danger'
                                                                : ''))) }} dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ ucfirst($user->userProfile->status) }}
                                            </button>
                                        @else
                                            <button type="button"
                                                class="btn btn-sm {{ $user->userProfile->status == 'active'
                                                    ? 'btn-primary'
                                                    : ($user->userProfile->status == 'suspended'
                                                        ? 'btn-success'
                                                        : ($user->userProfile->status == 'deactivated'
                                                            ? 'btn-warning'
                                                            : ($user->userProfile->status == 'blocked'
                                                                ? 'btn-danger'
                                                                : ''))) }} dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                disabled>
                                                {{ ucfirst($user->userProfile->status) }}
                                            </button>
                                        @endcan

                                        <div class="dropdown-menu">
                                            @foreach (\App\Enums\UserStatusEnum::toArray() as $userStatus)
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.customers.change.status', [$user->id, $userStatus->value]) }}">{{ ucfirst($userStatus->value) }}</a>
                                            @endforeach
                                        </div>
                                    </span>
                                </td>
                                <td>
                                    @can('View Customer Details')
                                        <a href="{{ route('admin.customers.details', $user->id) }}"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Customer Detail"
                                            class="btn btn-icon btn-warning btn-sm mr-2"><i
                                                class="bi bi-eye-fill fs-4"></i></a>
                                    @endcan

                                    @can('Delete Customer')
                                        <a href="#" class="btn btn-icon btn-danger btn-sm mr-2"
                                            data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Delete Customer" data-bs-target="#delete{{ $user->id }}"><i
                                                class="bi bi-trash fs-4"></i></a>
                                    @endcan
                                </td>
                            </tr>
                            <div class="modal fade" tabindex="-1" id="delete{{ $user->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3>Delete</h3>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete ?</p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="{{ Route('admin.customers.destroy', $user->id) }}"
                                                type="button" class="btn btn-danger">Ok</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>

                </table>
            @else
                <div class="mx-auto d-flex justify-content-center mt-6 mb-5">
                    <h4>No Users Found</h4>
                </div>

            @endif

        </div>
        <div class="card-footer m-4">
            <div class="d-flex justify-content-end">
                {{ $users->links() }}
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
