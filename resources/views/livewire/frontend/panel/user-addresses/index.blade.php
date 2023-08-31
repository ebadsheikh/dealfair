<div class="card card-flush">
    <div class="row py-5 px-10">
        <h1 class="d-flex text-dark fw-bold my-1 fs-3 pb-2">Search By Zip</h1>
        <div class="col-md-4">
            <input class="form-control" wire:model="searchZip" placeholder="Search By Zip"/>
        </div>

    </div>
    <div class="card-body pt-0">
        <div class="row">
            @foreach ($userAddresses as $userAddress)
                <div class="col-md-6 col-xl-4">
                    <div class="d-flex justify-content-between rounded-4 p-5 mt-5" style="background-color: #5d6eb326; border: 2px solid #5D6EB3">
                        <div>
                            <div class="text-white py-1 px-2 rounded bg-primary df-fs-12 mb-3" style="width: fit-content">Home</div>
                            <div class="df-fs-13 fw-semibold">Deliver to: {{$userAddress->full_name}}</div>
                            <div class="df-fs-13 fw-semibold">{{ $userAddress->address }}</div>
                            <div class="df-fs-13 fw-semibold">Bill to the same address</div>
                        </div>
                        <div class="d-flex align-items-baseline gap-2">
                            <div>
                                <a class="fw-bold fs-5 border-0 bg-transparent text-primary" data-bs-toggle="modal" data-bs-target="#edit-shipping-address{{ $userAddress->id }}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                            </div>
                            <div>
                                <a data-bs-toggle="modal" data-bs-target="#destroy-shipping-address{{ $userAddress->id }}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#5D6EB3" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="modal fade" id="edit-shipping-address{{ $userAddress->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Address</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="py-5 px-5 px-lg-10">
                                        <form action="{{ route('shipping.address.update', $userAddress->id) }}" method="POST">
                                            @csrf
                                            <div class="row mb-6">
                                                <div class="col-md-6">
                                                    <label class="form-label required">Full Name</label>
                                                    <input name="full_name" value="{{ $userAddress->full_name }}"
                                                           placeholder="Enter full name here..." class="form-control form-control-lg" />
                                                    @error('full_name')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label required">Mobile Number</label>
                                                    <input name="telephone" value="{{ $userAddress->telephone }}"
                                                           placeholder="Enter mobile number here..." class="form-control form-control-lg" />
                                                    @error('telephone')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-6">
                                                <label class="form-label required">Address</label>
                                                <input id="autocomplete" name="address" value="{{ $userAddress->address }}"
                                                       placeholder="House no. / Street/ Building"
                                                       class="form-control form-control-lg"/>
                                                @error('address')
                                                <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="row mb-6">
                                                <div class="col-md-4">
                                                    <label class="form-label required">City</label>
                                                    <input id="city" name="city" value="{{ $userAddress->city }}"
                                                           placeholder="Enter city here..."
                                                           class="form-control form-control-lg"/>
                                                    @error('city')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-6">
                                                    <label class="form-label required">State</label>
                                                    <input id="state" name="state" value="{{ $userAddress->state }}"
                                                           placeholder="Enter state here..."
                                                           class="form-control form-control-lg"/>
                                                    @error('state')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-6">
                                                    <label class="form-label required">Zip code</label>
                                                    <input id="zip" name="zip" value="{{ $userAddress->zip }}" placeholder="Enter zip here..."
                                                           class="form-control form-control-lg"/>
                                                    @error('zip')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 mb-6">
                                                <label class="form-label required">Country</label>
                                                <select name="country_id" aria-label="Select a country..." id="country"
                                                        class="form-select form-select-lg">
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('country')
                                                <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" tabindex="-1" id="destroy-shipping-address{{ $userAddress->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Delete Address</h3>
                                        <div class="btn btn-icon btn-sm btn-active-primary ms-2" data-bs-dismiss="modal"
                                             aria-label="Close">
                                            <span class="svg-icon svg-icon-1"></span>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this address?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">Close
                                        </button>
                                        <a href="{{ route('shipping.address.destroy', $userAddress->id) }}" type="button"
                                           class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
