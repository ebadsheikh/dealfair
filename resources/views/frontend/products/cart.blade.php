@extends('frontend.layouts.master')
@section('content')
    <div id="home">
        <div class="py-10">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-7">
                        <div class="bg-white rounded-4 p-5">
                            <div class="d-flex justify-content-between gap-2">
                                <div class="form-check form-check-custom form-check-light form-check-sm">
                                    <input class="form-check-input" type="checkbox" id="selectAll" aria-label="Select All">
                                    <label class="text-muted text-uppercase fw-400 df-fs-12 ms-2">Select All</label>
                                </div>
                                <div>
                                    <a class="d-flex align-items-center cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="#a1a5b7" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                        </svg>
                                        <div class="text-muted text-uppercase fw-400 df-fs-12 ms-2">Delete</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-4 p-5 mt-5">
                            <div >
                                <div class="fw-semibold df-fs-13">Huda Beauty (Seller Or Brand Name)</div>
                                <div class="my-3" style="width:100%; height: 2px; background-color: #4a55621c"></div>
                                <div class="flex-column flex-md-row d-flex justify-content-between py-2">
                                    <div class="d-flex gap-2">
                                        <div class="form-check form-check-custom form-check-light form-check-sm">
                                            <input class="form-check-input product-checkbox" type="checkbox" value="Product 1" aria-label="...">
                                        </div>
                                        <img class="border border-2 border-gray-300 rounded-3" width="80px"
                                             height="80px" src="{{asset('assets/media/products/20.png')}}">
                                        <div>
                                            <div class="fw-semibold">Cheeky Tint Blush Stick</div>
                                            <small class="text-muted">Watch Strap Color:Black golden</small>
                                            <a class="d-flex align-items-center text-gray-800 gap-3 mt-3 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="#a1a5b7" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                </svg>
                                                <div>Remove from cart</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="fw-bolder text-center text-md-end fs-5">
                                            $ 7382
                                        </div>
                                        <div class="input-group w-auto w-md-150px justify-content-center justify-content-md-end align-items-center mt-2">
                                            <input type="button" value="-"
                                                   class="button-minus p-5 bg-primary text-white border-0 lh-0 icon-shape icon-sm "
                                                   data-field="quantity">
                                            <input type="number" step="1" max="10" value="1" name="quantity"
                                                   class="quantity-field border-0 text-center w-25">
                                            <input type="button" value="+"
                                                   class="button-plus p-5 bg-primary text-white border-0 lh-0 icon-shape icon-sm  "
                                                   data-field="quantity">
                                        </div>
                                    </div>
                                </div>
                                <div class="my-3" style="width:100%; height: 1px; background-color: #9ba4ae1c"></div>
                                <div class="flex-column flex-md-row d-flex justify-content-between py-2 mt-2">
                                    <div class="d-flex gap-2">
                                        <div class="form-check form-check-custom form-check-light form-check-sm">
                                            <input class="form-check-input product-checkbox" type="checkbox" value="Product 2" aria-label="...">
                                        </div>
                                        <img class="border border-2 border-gray-300 rounded-3" width="80px"
                                             height="80px" src="{{asset('assets/media/products/20.png')}}">
                                        <div>
                                            <div class="fw-semibold">E.l.f. Skin Holy Hydration! Face Cream, Moisturizer
                                                For Nourishing & Plumping Sk
                                            </div>
                                            <small class="text-muted">Watch Strap Color:Black golden</small>
                                            <a class="d-flex align-items-center text-gray-800 gap-3 mt-3 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="#a1a5b7" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                </svg>
                                                <div>Remove from cart</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="fw-bolder text-center text-md-end fs-5">
                                            $ 7382
                                        </div>
                                        <div class="input-group w-auto w-md-150px justify-content-center justify-content-md-end align-items-center mt-2">
                                            <input type="button" value="-"
                                                   class="button-minus p-5 bg-primary text-white border-0 lh-0 icon-shape icon-sm "
                                                   data-field="quantity">
                                            <input type="number" step="1" max="10" value="1" name="quantity"
                                                   class="quantity-field border-0 text-center w-25">
                                            <input type="button" value="+"
                                                   class="button-plus p-5 bg-primary text-white border-0 lh-0 icon-shape icon-sm  "
                                                   data-field="quantity">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3" style="width:100%; height: 2px; background-color: #9ba4ae1c"></div>
                            <div >
                                <div class="fw-semibold df-fs-13">Dior</div>
                                <div class="my-3" style="width:100%; height: 2px; background-color: #4a55621c"></div>
                                <div class="flex-column flex-md-row d-flex justify-content-between py-2">
                                    <div class="d-flex gap-2">
                                        <div class="form-check form-check-custom form-check-light form-check-sm">
                                            <input class="form-check-input product-checkbox" type="checkbox" value="Product 3" aria-label="...">
                                        </div>
                                        <img class="border border-2 border-gray-300 rounded-3" width="80px"
                                             height="80px" src="{{asset('assets/media/products/20.png')}}">
                                        <div>
                                            <div class="fw-semibold">Baby Ice Bear Classic T-shirt</div>
                                            <small class="text-muted">Clothing T-shirts</small>
                                            <a class="d-flex align-items-center text-gray-800 gap-3 mt-3 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="#a1a5b7" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                </svg>
                                                <div>Remove from cart</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="fw-bolder text-center text-md-end fs-5">
                                            $ 7382
                                        </div>
                                        <div class="input-group w-auto w-md-150px justify-content-center justify-content-md-end align-items-center mt-2">
                                            <input type="button" value="-"
                                                   class="button-minus p-5 bg-primary text-white border-0 lh-0 icon-shape icon-sm "
                                                   data-field="quantity">
                                            <input type="number" step="1" max="10" value="1" name="quantity"
                                                   class="quantity-field border-0 text-center w-25">
                                            <input type="button" value="+"
                                                   class="button-plus p-5 bg-primary text-white border-0 lh-0 icon-shape icon-sm  "
                                                   data-field="quantity">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="bg-white rounded-4 p-5 ">
                            <div class="fw-bold fs-5 mb-5">Order Summary</div>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="text-muted df-fs-13">Subtotal (0 items)</div>
                                <div class="fw-bold">$ 12.00</div>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="text-muted df-fs-13">Shipping Cost</div>
                                <div class="fw-bold">$ 12.00</div>
                            </div>
                            <div class="my-3" style="width:100%; height: 2px; background-color: #9ba4ae1c"></div>
                            <div class="d-flex justify-content-between mb-5">
                                <div class="text-muted df-fs-13">Total</div>
                                <div class="fw-bold">$ 24.00</div>
                            </div>
                            <div class="d-block mt-2">
                                <a href="{{route('checkout')}}"
                                   class="btn btn-sm btn-primary text-center text-uppercase d-flex justify-content-center align-items-center">
                                    Proceed To checkout
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
        $(document).ready(function () {
            // When the "Select All" checkbox is clicked
            $("#selectAll").click(function () {
                // Get the checked status of the "Select All" checkbox
                var isChecked = $(this).prop("checked");

                // Set all product checkboxes to the same checked status
                $(".product-checkbox").prop("checked", isChecked);
            });

            // When an individual product checkbox is clicked
            $(".product-checkbox").click(function () {
                // Check if all product checkboxes are checked
                var allChecked = $(".product-checkbox").length === $(".product-checkbox:checked").length;

                // Update the "Select All" checkbox status
                $("#selectAll").prop("checked", allChecked);
            });
        });

    </script>
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
