@extends('frontend.panel.layouts.master')
@section('title', 'Dealfair | Store Listing')
@section('styles')
    <style>

        .listing-title-ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .listing-title-ul .listing-title-li {
            padding: 10px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            cursor: pointer;
        }

        .listing-title-ul .listing-title-li:hover {
            background-color: #e9e9e9;
        }

        #listingTitleSearchResult {
            position: absolute;
            z-index: 999;
            width: 95%;
            max-height: 150px;
            /* set a fixed height */
            overflow-y: scroll;
            /* enable vertical scrolling */
            background-color: #fff;
            border: 1px solid #ced4da;
            border-top: none;
        }

        /*#listingTitleSearchResult li {*/
        /*    padding: 5px;*/
        /*    cursor: pointer;*/
        /*}*/

        /*#listingTitleSearchResult li:hover {*/
        /*    background-color: #f2f2f2;*/
        /*}*/
    </style>
@endsection
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <div class="page-title d-flex flex-column me-3">
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">Add New Listing</h1>
            <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7 my-1">
                <li class="breadcrumb-item text-gray-600">
                    <a href="{{ route('seller.dashboard') }}" class="text-gray-600 text-hover-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item text-gray-600">Listing</li>
            </ul>
        </div>
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        @livewire('frontend.panel.listing.store-listing')
    </div>
@endsection
@section('scripts')
<script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('map.google_map_api_key') }}&libraries=places&callback=Function.prototype">
    </script>

    @include('custom-scripts.autocomplete')
    <script>
        function tagsSelection() {
            // The DOM elements you wish to replace with Tagify
            const tags = document.querySelector("#tags");

            // Check if the input element has already been Tagified
            if (tags.tagify) {
                return;
            }

            // Initialize Tagify components on the above inputs
            tags.tagify = new Tagify(tags);
        }

        function buyerVisiblityRadiusSlider() {
            const buyerVisiblityRadiusSlider = document.querySelector("#buyerVisiblityRadiusSlider");
            // Check if the slider has already been initialized
            if (buyerVisiblityRadiusSlider.noUiSlider) {
                return;
            }
            const format = {
                from: function (formattedValue) {
                    return Number(formattedValue);
                },
                to: function (value) {
                    return Math.round(value);
                }
            };

            noUiSlider.create(buyerVisiblityRadiusSlider, {
                start: [25],
                format: format,
                tooltips: true,
                range: {
                    "min": 1,
                    "max": 100
                },
            });

            buyerVisiblityRadiusSlider.noUiSlider.on('change', function (values) {
                Livewire.emit('setVisibleRange', values[0]);
            });
        }


        $(document).ready(function () {
            tagsSelection();
            buyerVisiblityRadiusSlider();
            $('#listingTitle').maxlength({
                warningClass: "badge badge-primary",
                limitReachedClass: "badge badge-danger"
            });

            Livewire.on('updatedFetchCommunities', function (communities) {
                const select = $('#selectedCommunities');
                select.empty();

                $.each(communities, function(index, community) {
                    select.append($('<option></option>')
                        .attr('value', community.id)
                        .text(community.name));
                });
            });
        });
    </script>
@endsection
