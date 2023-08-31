@php
    use App\Enums\CommunityMemberFiltersEnum;
    use App\Enums\SortProductsEnum;
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
                            Search By Zip code
                        </button>
                    </h2>
                    <div id="collapseSearch" class="accordion-collapse collapse show"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="input-group">
                                <input wire:model="selected.searchByZipCode" type="text" class="form-control"
                                       placeholder="Search By Zip Code"
                                       aria-label="Search By Zip Code"/>
                                <span class="input-group-text bg-primary">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg" width="16"
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
                                data-bs-target="#collapseSearchByName" aria-expanded="true"
                                aria-controls="collapseSearchByName">
                            Search By Name
                        </button>
                    </h2>
                    <div id="collapseSearchByName" class="accordion-collapse collapse show"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="input-group">
                                <input wire:model="selected.searchByName" type="text" class="form-control"
                                       placeholder="Search By Name"
                                       aria-label="Enter name here.."/>
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
                                data-bs-target="#collapseNearest" aria-expanded="true"
                                aria-controls="collapseNearest">
                            Show By Nearest To Me
                        </button>
                    </h2>
                    <div id="collapseNearest" class="accordion-collapse collapse show"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="nearByMeSliderDesktop" wire:ignore></div>
                        </div>
                    </div>
                </div>
                <hr class="text-gray-600 my-2 mx-4">
            </div>
            <div class="accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseState" aria-expanded="true"
                                aria-controls="collapseState">
                            Show By State
                        </button>
                    </h2>
                    <div id="collapseState" class="accordion-collapse collapse show"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body" wire:ignore>
                            <select id="stateDropdownDesktop" class="form-select" data-control="select2">
                                <option value="">All States</option>
                                @foreach($states as $state)
                                    <option value="{{$state}}">{{$state}}</option>
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
                                data-bs-target="#collapseCommunityMembers" aria-expanded="true"
                                aria-controls="collapseCommunityMembers">
                            Show By Community Members
                        </button>
                    </h2>
                    <div id="collapseCommunityMembers" class="accordion-collapse collapse show"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <select class="form-select" wire:model="selected.searchByCommunitySize">
                                <option value="">Search By Community Size</option>
                                @foreach(CommunityMemberFiltersEnum::cases() as $communityMemberFilter)
                                    <option
                                        value="{{$communityMemberFilter->name}}">{{$communityMemberFilter->value}}</option>
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
                                data-bs-target="#collapseProducts" aria-expanded="true"
                                aria-controls="collapseProducts">
                            Sort By Products
                        </button>
                    </h2>
                    <div id="collapseProducts" class="accordion-collapse collapse show"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <select class="form-select" wire:model="selected.sortByProducts">
                                <option value="{{SortProductsEnum::HIGH_TO_LOW->name}}">{{SortProductsEnum::HIGH_TO_LOW->value}}</option>
                                <option value="{{SortProductsEnum::LOW_TO_HIGH->name}}">{{SortProductsEnum::LOW_TO_HIGH->value}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-fullscreen mv-filter-modal" id="staticBackdropCommunity" data-bs-backdrop="static"
         data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header py-5">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Filter</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="card card-body">
                        <div class="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseSearch" aria-expanded="true"
                                            aria-controls="collapseSearch">
                                        Search By Zip code
                                    </button>
                                </h2>
                                <div id="collapseSearch" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="input-group">
                                            <input wire:model="selected.searchByZipCode" type="text" class="form-control"
                                                   placeholder="Search By Zip Code"
                                                   aria-label="Search By Zip Code"/>
                                            <span class="input-group-text bg-primary">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg" width="16"
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
                                            data-bs-target="#collapseSearchByName" aria-expanded="true"
                                            aria-controls="collapseSearchByName">
                                        Search By Name
                                    </button>
                                </h2>
                                <div id="collapseSearchByName" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="input-group">
                                            <input wire:model="selected.searchByName" type="text" class="form-control"
                                                   placeholder="Search By Name"
                                                   aria-label="Enter name here.."/>
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
                                            data-bs-target="#collapseNearest" aria-expanded="true"
                                            aria-controls="collapseNearest">
                                        Show By Nearest To Me
                                    </button>
                                </h2>
                                <div id="collapseNearest" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div id="nearByMeSliderMobile" wire:ignore></div>
                                    </div>
                                </div>
                            </div>
                            <hr class="text-gray-600 my-2 mx-4">
                        </div>
                        <div class="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseState" aria-expanded="true"
                                            aria-controls="collapseState">
                                        Show By State
                                    </button>
                                </h2>
                                <div id="collapseState" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body" wire:ignore>
                                        <select id="stateDropdownMobile" class="form-select" data-control="select2">
                                            <option value="">All States</option>
                                            @foreach($states as $state)
                                                <option value="{{$state}}">{{$state}}</option>
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
                                            data-bs-target="#collapseCommunityMembers" aria-expanded="true"
                                            aria-controls="collapseCommunityMembers">
                                        Show By Community Members
                                    </button>
                                </h2>
                                <div id="collapseCommunityMembers" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <select class="form-select" wire:model="selected.searchByCommunitySize">
                                            <option value="">Search By Community Size</option>
                                            @foreach(CommunityMemberFiltersEnum::cases() as $communityMemberFilter)
                                                <option
                                                    value="{{$communityMemberFilter->name}}">{{$communityMemberFilter->value}}</option>
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
                                            data-bs-target="#collapseProducts" aria-expanded="true"
                                            aria-controls="collapseProducts">
                                        Sort By Products
                                    </button>
                                </h2>
                                <div id="collapseProducts" class="accordion-collapse collapse show"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <select class="form-select" wire:model="selected.sortByProducts">
                                            <option value="{{SortProductsEnum::HIGH_TO_LOW->name}}">{{SortProductsEnum::HIGH_TO_LOW->value}}</option>
                                            <option value="{{SortProductsEnum::LOW_TO_HIGH->name}}">{{SortProductsEnum::LOW_TO_HIGH->value}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-5 d-flex justify-content-center">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">
                            Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener("livewire:load", () => {
            stateDropdownDesktop();
            nearByMeSliderDesktop();

            stateDropdownMobile();
            nearByMeSliderMobile();
        })

        function stateDropdownDesktop() {
            let stateDropdownDesktop = $('#stateDropdownDesktop');

            stateDropdownDesktop.select2();
            stateDropdownDesktop.on('change', function (e) {
                const data = stateDropdownDesktop.select2("val");
                @this.
                set('selected.searchByState', data);
            });
        }

        function nearByMeSliderDesktop() {
            const nearByMeSliderDesktop = document.querySelector(".nearByMeSliderDesktop");
            // Check if the slider has already been initialized
            if (nearByMeSliderDesktop.noUiSlider) {
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

            noUiSlider.create(nearByMeSliderDesktop, {
                start: [0],
                format: format,
                tooltips: true,
                range: {
                    "min": 0,
                    "max": 100
                },
            });

            nearByMeSliderDesktop.noUiSlider.on('change', function (values) {
                @this.
                set('selected.searchByNearest', values[0]);
            });
        }

        function stateDropdownMobile() {
            let stateDropdownMobile = $('#stateDropdownMobile');

            stateDropdownMobile.select2();
            stateDropdownMobile.on('change', function (e) {
                const data = stateDropdownMobile.select2("val");
                @this.
                set('selected.searchByState', data);
            });
        }

        function nearByMeSliderMobile() {
            const nearByMeSliderMobile = document.querySelector("#nearByMeSliderMobile");
            // Check if the slider has already been initialized
            if (nearByMeSliderMobile.noUiSlider) {
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

            noUiSlider.create(nearByMeSliderMobile, {
                start: [0],
                format: format,
                tooltips: true,
                range: {
                    "min": 0,
                    "max": 100
                },
            });

            nearByMeSliderMobile.noUiSlider.on('change', function (values) {
                @this.
                set('selected.searchByNearest', values[0]);
            });
        }
    </script>
@endpush
