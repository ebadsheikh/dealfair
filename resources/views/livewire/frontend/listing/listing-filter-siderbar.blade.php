@php
    use App\Enums\ProductListingTypesEnum;
    use App\Enums\ListingPriceFiltersEnum;
    use App\Enums\ProductConditionsEnum;
    use App\Enums\ProductShippingCostPayerEnum;
    use App\Helpers\GlobalHelper;
@endphp
<div class="col-lg-3">
    <div class="d-none d-lg-block">
        <div class="p-4 rounded-3 bg-white">
            <h2 class="mx-4 mb-3">Filter</h2>
            <div class="accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSearch" aria-expanded="true"
                                aria-controls="collapseSearch">
                            Search Listing By Title
                        </button>
                    </h2>
                    <div id="collapseSearch" class="accordion-collapse collapse show"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="input-group">
                                <input wire:model="searchByListingTitle" type="text" class="form-control"
                                       placeholder="Search Listing By Title"
                                       aria-label="Search Listing By Title"/>
                                <span class="input-group-text bg-primary"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="#ffffff" class="bi bi-search"
                                        viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg></span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="text-gray-600 my-2 mx-4">
            </div>
            <div class="accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseListing" aria-expanded="true"
                                aria-controls="collapseListing">
                            Listing type
                        </button>
                    </h2>
                    <div id="collapseListing" class="accordion-collapse collapse show"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <select wire:model="searchByListingType" class="form-select">
                                <option value="">All Listing Type</option>
                                <option value="{{ProductListingTypesEnum::SELL->value}}">Buy Now</option>
                                <option value="{{ProductListingTypesEnum::AUCTION->value}}">Auction</option>
                                <option value="{{ProductListingTypesEnum::BOTH->value}}">Auction/Buy Now</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr class="text-gray-600 my-2 mx-4">
            </div>
            <div class="accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsePrice" aria-expanded="true"
                                aria-controls="collapsePrice">
                            Search By Price Range
                        </button>
                    </h2>
                    <div id="collapsePrice" class="accordion-collapse collapse show"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <select class="form-select" wire:model="searchByListingPriceRange">
                                <option value="">All Price Ranges</option>
                                @foreach(ListingPriceFiltersEnum::cases() as $listingPriceFilter)
                                    <option
                                        value="{{$listingPriceFilter->name}}">{{$listingPriceFilter->value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <hr class="text-gray-600 my-2 mx-4">
            </div>
            <div class="accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseShipping" aria-expanded="true"
                                aria-controls="collapseShipping">
                            Shipping Cost Payer
                        </button>
                    </h2>
                    <div id="collapseShipping" class="accordion-collapse collapse show"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <select class="form-select" wire:model="searchByShippingCostPayer">
                                <option value="">All</option>
                                <option value="{{ProductShippingCostPayerEnum::ME->value}}">Free Delivery</option>
                                <option value="{{ProductShippingCostPayerEnum::BUYER->value}}">Buyer</option>
                                <option value="{{ProductShippingCostPayerEnum::PICKUP_ONLY->value}}">Pickup Only</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr class="text-gray-600 my-2 mx-4">
            </div>
            <div class="accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseCondition" aria-expanded="true"
                                aria-controls="collapseCondition">
                            Listing Condition
                        </button>
                    </h2>
                    <div id="collapseCondition" class="accordion-collapse collapse show"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <select class="form-select" wire:model="searchByListingCondition">
                                <option value="">All</option>
                                @foreach(ProductConditionsEnum::cases() as $productcondition)
                                    <option
                                        value="{{$productcondition->value}}">{{GlobalHelper::formatEnumValue($productcondition->value)}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-fullscreen mv-filter-modal" id="staticBackdrop" data-bs-backdrop="static"
         data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content ">
                <div class="modal-header py-5">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Filter</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 ">
                    <div class="card card-body">
                        <div class="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseSearch" aria-expanded="true"
                                            aria-controls="collapseSearch">
                                        Search Listing By Title
                                    </button>
                                </h2>
                                <div id="collapseSearch" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="input-group">
                                            <input wire:model="searchByListingTitle" type="text" class="form-control"
                                                   placeholder="Search Listing By Title"
                                                   aria-label="Search Listing By Title"/>
                                            <span class="input-group-text bg-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                     height="16" fill="#ffffff" class="bi bi-search"
                                                     viewBox="0 0 16 16">
                                                    <path
                                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="text-gray-600 my-2 mx-4">
                        </div>
                        <div class="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseListing" aria-expanded="true"
                                            aria-controls="collapseListing">
                                        Listing type
                                    </button>
                                </h2>
                                <div id="collapseListing" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <select wire:model="searchByListingType" class="form-select">
                                            <option value="">All</option>
                                            <option value="{{ProductListingTypesEnum::SELL->value}}">Buy Now</option>
                                            <option value="{{ProductListingTypesEnum::AUCTION->value}}">Auction</option>
                                            <option value="{{ProductListingTypesEnum::BOTH->value}}">Auction/Buy Now
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr class="text-gray-600 my-2 mx-4">
                        </div>
                        <div class="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapsePrice" aria-expanded="true"
                                            aria-controls="collapsePrice">
                                        Search By Price Range
                                    </button>
                                </h2>
                                <div id="collapsePrice" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <select class="form-select" wire:model="searchByListingPriceRange">
                                            <option value="">All Price Ranges</option>
                                            @foreach(ListingPriceFiltersEnum::cases() as $listingPriceFilter)
                                                <option
                                                    value="{{$listingPriceFilter->name}}">{{$listingPriceFilter->value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr class="text-gray-600 my-2 mx-4">
                        </div>
                        <div class="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseShipping" aria-expanded="true"
                                            aria-controls="collapseShipping">
                                        Shipping Cost Payer
                                    </button>
                                </h2>
                                <div id="collapseShipping" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <select class="form-select" wire:model="searchByShippingCostPayer">
                                            <option value="">All</option>
                                            <option value="{{ProductShippingCostPayerEnum::ME->value}}">Free Delivery</option>
                                            <option value="{{ProductShippingCostPayerEnum::BUYER->value}}">Buyer</option>
                                            <option value="{{ProductShippingCostPayerEnum::PICKUP_ONLY->value}}">Pickup Only</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr class="text-gray-600 my-2 mx-4">
                        </div>
                        <div class="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseCondition" aria-expanded="true"
                                            aria-controls="collapseCondition">
                                        Listing Condition
                                    </button>
                                </h2>
                                <div id="collapseCondition" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <select class="form-select" wire:model="searchByListingCondition">
                                            <option value="">All</option>
                                            @foreach(ProductConditionsEnum::cases() as $productcondition)
                                                <option
                                                    value="{{$productcondition->value}}">{{GlobalHelper::formatEnumValue($productcondition->value)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
