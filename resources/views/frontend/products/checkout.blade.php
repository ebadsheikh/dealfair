@extends('frontend.layouts.master')
@section('content')
    <div id="home">
        <div class="py-10">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-7">
                        <div class="bg-white rounded-4 p-5">
                            <div class="d-flex justify-content-center">
                                <button type="button" class="fw-bold df-fs-14 border-0 bg-transparent"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    + Add new Delivery Address
                                </button>
                            </div>
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                 data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Address</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="py-5 px-5 px-lg-10">
                                            <form method="POST">
                                                <div class="row mb-5">
                                                    <div class="col-md-6">
                                                        <label class="form-label required">Full Name</label>
                                                        <input id="autocomplete" name="name"
                                                               placeholder="Enter full name"
                                                               class="form-control form-control-lg"/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label required">Address</label>
                                                        <input id="autocomplete" name="address"
                                                               placeholder="House no. / Street/ Building"
                                                               class="form-control form-control-lg"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div class="col-md-4">
                                                        <label class="form-label required">City</label>
                                                        <input id="city" name="city"
                                                               placeholder="Enter city here..."
                                                               class="form-control form-control-lg"/>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label required">State</label>
                                                        <input id="state" name="state"
                                                               placeholder="Enter state here..."
                                                               class="form-control form-control-lg"/>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label required">Zip code</label>
                                                        <input id="zip" name="zip" placeholder="Enter zip here..."
                                                               class="form-control form-control-lg"/>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-5">
                                                    <label class="form-label required">Country</label>
                                                    <select name="country_id" aria-label="Select a country..."
                                                            data-control="select2"
                                                            id="country" data-placeholder="Select a country..."
                                                            class="form-select form-select-lg">
                                                        <option value="UN">country name</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between rounded-4 p-5 mt-5"
                                 style="background-color: #5d6eb326; border: 2px solid #5D6EB3">
                                <div>
                                    <div class="text-white py-1 px-2 rounded bg-primary df-fs-12 mb-3"
                                         style="width: fit-content">Home
                                    </div>
                                    <div class="df-fs-13 fw-semibold">Deliver to: Muneeba</div>
                                    <div class="df-fs-13 fw-semibold">Bhattai colony D-298, Korangi Industrial Area,
                                        Karachi - Korangi, Sindh
                                    </div>
                                    <div class="df-fs-13 fw-semibold">Bill to the same address</div>
                                </div>
                                <div>
                                    <button type="button" class="fw-bold fs-5 border-0 bg-transparent text-primary"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-bs-whatever="@edit">Edit
                                    </button>
                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Address</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="py-5 px-5 px-lg-10">
                                                <form method="POST">
                                                    <div class="row mb-5">
                                                        <div class="col-md-6">
                                                            <label class="form-label required">Full Name</label>
                                                            <input id="autocomplete" name="name"
                                                                   placeholder="Enter full name"
                                                                   class="form-control form-control-lg"/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label required">Address</label>
                                                            <input id="autocomplete" name="address"
                                                                   placeholder="House no. / Street/ Building"
                                                                   class="form-control form-control-lg"/>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-5">
                                                        <div class="col-md-4">
                                                            <label class="form-label required">City</label>
                                                            <input id="city" name="city"
                                                                   placeholder="Enter city here..."
                                                                   class="form-control form-control-lg"/>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label required">State</label>
                                                            <input id="state" name="state"
                                                                   placeholder="Enter state here..."
                                                                   class="form-control form-control-lg"/>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label required">Zip code</label>
                                                            <input id="zip" name="zip" placeholder="Enter zip here..."
                                                                   class="form-control form-control-lg"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-5">
                                                        <label class="form-label required">Country</label>
                                                        <select name="country_id" aria-label="Select a country..."
                                                                data-control="select2"
                                                                id="country" data-placeholder="Select a country..."
                                                                class="form-select form-select-lg">
                                                            <option value="UN">country name</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-4 p-5 mt-5">
                            <div>
                                <div class="fw-semibold df-fs-13">Huda Beauty (Seller Or Brand Name)</div>
                                <div class="my-3" style="width:100%; height: 2px; background-color: #4a55621c"></div>
                                <div class="d-flex justify-content-between py-2">
                                    <div class="col-9">
                                        <div class="d-flex gap-2">
                                            <img class="border border-2 border-gray-300 rounded-3" width="80px"
                                                 height="80px" src="{{asset('assets/media/products/20.png')}}">
                                            <div>
                                                <div class="fw-semibold">Cheeky Tint Blush Stick</div>
                                                <small class="text-muted">Watch Strap Color:Black golden</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div>
                                            <div class="fw-bolder text-end fs-5">
                                                $ 7382
                                            </div>
                                            <div class="fw-semibold text-end fs-5">
                                                Qty: 2
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-3" style="width:100%; height: 1px; background-color: #9ba4ae1c"></div>
                                <div class="d-flex justify-content-between py-2 mt-2">
                                    <div class="col-9">
                                        <div class="d-flex gap-2">
                                            <img class="border border-2 border-gray-300 rounded-3" width="80px"
                                                 height="80px" src="{{asset('assets/media/products/20.png')}}">
                                            <div>
                                                <div class="fw-semibold">E.l.f. Skin Holy Hydration! Face Cream,
                                                    Moisturizer
                                                    For Nourishing & Plumping Sk
                                                </div>
                                                <small class="text-muted">Watch Strap Color:Black golden</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="fw-bolder text-end fs-5">
                                            $ 7382
                                        </div>
                                        <div class="fw-semibold text-end fs-5">
                                            Qty: 2
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3" style="width:100%; height: 2px; background-color: #9ba4ae1c"></div>
                            <div>
                                <div class="fw-semibold df-fs-13">Dior</div>
                                <div class="my-3" style="width:100%; height: 2px; background-color: #4a55621c"></div>
                                <div class="d-flex justify-content-between py-2">
                                    <div class="col-9">
                                        <div class="d-flex gap-2">
                                            <img class="border border-2 border-gray-300 rounded-3" width="80px"
                                                 height="80px" src="{{asset('assets/media/products/20.png')}}">
                                            <div>
                                                <div class="fw-semibold">Baby Ice Bear Classic T-shirt</div>
                                                <small class="text-muted">Clothing T-shirts</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="fw-bolder text-end fs-5">
                                            $ 7382
                                        </div>
                                        <div class="fw-semibold text-end fs-5">
                                            Qty: 2
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="bg-white rounded-4 p-5">
                            <div class="fw-bold fs-5 mb-5">Order Summary</div>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="text-muted df-fs-13">Subtotal (0 items)</div>
                                <div class="fw-bold">$ 12.00</div>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="text-muted df-fs-13">Shipping Cost</div>
                                <div class="fw-bold">$ 12.00</div>
                            </div>
                            <div class="d-flex justify-content-between mb-5">
                                <div class="text-muted df-fs-13">Total</div>
                                <div class="fw-bold">$ 24.00</div>
                            </div>
                            <div class="my-5" style="width:100%; height: 2px; background-color: #9ba4ae1c"></div>
                            <div class="fw-bold fs-5 mb-5">Payment Details</div>
                            <form class="row g-3 px-3">
                                <div class="col-md-6">
                                    <label class="form-label">Name on Card</label>
                                    <input type="email" class="form-control" placeholder="Enter name on card">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Card Number</label>
                                    <input type="text" class="form-control" placeholder="Enter card number">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputCity" class="form-label">Card Expiry Month</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Card Expiry Year</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputZip" class="form-label">Card CVV Number</label>
                                    <input type="text" class="form-control" placeholder="..">
                                </div>
                            </form>
                            <div class="d-block mt-4">
                                <a href="{{route('thankYou')}}"
                                   class="btn btn-sm btn-primary text-center text-uppercase d-flex justify-content-center align-items-center">
                                    Confirm Order
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                 Empty Cart code--}}
                {{--                <div class="bg-white rounded-3 p-3 p-md-5">--}}
                {{--                    <div class="d-flex justify-content-center">--}}
                {{--                        <div class="px-3 py-10 py-md-15">--}}
                {{--                            <img class="d-flex justify-content-center mx-auto df-data-nf-svg"--}}
                {{--                                 src="https://s3.us-east-2.amazonaws.com/dealfair.app/dataNotFoundImages/EmptyCart.svg">--}}
                {{--                            <div class="d-flex justify-content-center">--}}
                {{--                                <div class="text-center">--}}
                {{--                                    <div style="font-size:2.5rem;font-weight:700;">--}}
                {{--                                        OOPS!--}}
                {{--                                    </div>--}}
                {{--                                    <div class="text-muted" style="font-size:12px; font-weight: 600">--}}
                {{--                                        Your cart's feeling light! <br> Discover fantastic products and add a dose of happiness.--}}
                {{--                                    </div>--}}
                {{--                                    <a class="btn btn-sm btn-primary text-center text-uppercase mt-3" href="#">Continue shopping</a>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function incrementValue(e) {
            e.preventDefault();
            var fieldName = $(e.target).data('field');
            var parent = $(e.target).closest('div');
            var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

            if (!isNaN(currentVal)) {
                parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
            } else {
                parent.find('input[name=' + fieldName + ']').val(0);
            }
        }

        function decrementValue(e) {
            e.preventDefault();
            var fieldName = $(e.target).data('field');
            var parent = $(e.target).closest('div');
            var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

            if (!isNaN(currentVal) && currentVal > 0) {
                parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
            } else {
                parent.find('input[name=' + fieldName + ']').val(0);
            }
        }

        $('.input-group').on('click', '.button-plus', function (e) {
            incrementValue(e);
        });

        $('.input-group').on('click', '.button-minus', function (e) {
            decrementValue(e);
        });
    </script>
@endpush
