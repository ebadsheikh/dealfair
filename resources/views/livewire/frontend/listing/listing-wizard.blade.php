@php
    use App\Enums\ProductConditionsEnum;
    use App\Enums\ProductListingTypesEnum;
    use App\Enums\ProductShippingCostPayerEnum;
@endphp
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column stepper-multistep" id="kt_create_account_stepper">
        <div class="d-flex flex-column flex-lg-row-auto w-lg-350px w-xl-500px">
            <div class="d-flex flex-column position-lg-fixed top-0 bottom-0 w-lg-350px w-xl-500px scroll-y bgi-size-cover bgi-position-center" style="background-image: url({{asset('assets/media/misc/auth-bg.png')}})">
                <div class="d-flex flex-center mt-4">
                    <a href="{{route('home')}}">
                        <img alt="Logo" src="{{asset('assets/media/logos/custom-1.png')}}" class="h-70px"/>
                    </a>
                </div>

                <div class="d-flex flex-row-fluid justify-content-center p-10 mt-4">
                    <div class="stepper-nav">
                        <div class="stepper-item {{ $step === 1 ? 'current' : '' }}" data-kt-stepper-element="nav">
                            <div class="stepper-wrapper">
                                <div class="stepper-icon rounded-3">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">1</span>
                                </div>
                                <div class="stepper-label">
                                    <h3 class="stepper-title fs-2">Listing Info</h3>
                                    <div class="stepper-desc fw-normal">Details & Description</div>
                                </div>
                            </div>
                            <div class="stepper-line h-40px"></div>
                        </div>

                        <div class="stepper-item {{ $step === 2 ? 'current' : '' }}" data-kt-stepper-element="nav">
                            <div class="stepper-wrapper">
                                <div class="stepper-icon rounded-3">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">2</span>
                                </div>
                                <div class="stepper-label">
                                    <h3 class="stepper-title fs-2">Media</h3>
                                    <div class="stepper-desc fw-normal">Images & Video</div>
                                </div>
                            </div>
                            <div class="stepper-line h-40px"></div>
                        </div>

                        <div class="stepper-item {{ $step === 3 ? 'current' : '' }}" data-kt-stepper-element="nav">
                            <div class="stepper-wrapper">
                                <div class="stepper-icon">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">3</span>
                                </div>
                                <div class="stepper-label">
                                    <h3 class="stepper-title fs-2">Pricing</h3>
                                    <div class="stepper-desc fw-normal">Set Listing Price</div>
                                </div>
                            </div>
                            <div class="stepper-line h-40px"></div>
                        </div>

                        <div class="stepper-item {{ $step === 4 ? 'current' : '' }}" data-kt-stepper-element="nav">
                            <div class="stepper-wrapper">
                                <div class="stepper-icon">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">4</span>
                                </div>
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Listing Specs</h3>
                                    <div class="stepper-desc fw-normal">Provide your listing Specs</div>
                                </div>
                            </div>
                            <div class="stepper-line h-40px"></div>
                        </div>

                        <div class="stepper-item {{ $step === 5 ? 'current' : '' }}" data-kt-stepper-element="nav">
                            <div class="stepper-wrapper">
                                <div class="stepper-icon">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">5</span>
                                </div>
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Delivery & Shipping</h3>
                                    <div class="stepper-desc fw-normal">You're almost done</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-center flex-wrap px-5 py-10">
                    <!--begin::Links-->
                    <div class="d-flex fw-normal">
                        <a href="https://keenthemes.com" class="text-success px-5" target="_blank">Terms</a>
                        <a href="https://devs.keenthemes.com" class="text-success px-5" target="_blank">Plans</a>
                        <a href="https://1.envato.market/EA4JP" class="text-success px-5" target="_blank">Contact Us</a>
                    </div>
                    <!--end::Links-->
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-lg-row-fluid py-10">
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <div class="w-lg-650px w-xl-700px p-6 p-md-10 p-lg-15 mx-auto">
                    <form class="my-auto pb-5">
                        <div class="{{ $step === 1 ? 'current' : '' }}" data-kt-stepper-element="content">
                            <div class="w-100">
                                <div class="pb-10 pb-lg-15">
                                    <h2 class="fw-bold d-flex align-items-center text-dark">Listing Info</h2>
                                    <div class="text-muted fw-semibold fs-6">Details & Description</div>
                                </div>

                                <div class="fv-row">
                                    <div class="row">
                                        <div class="col-md-12 mb-6">
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">Listing Title</span>
                                            </label>
                                            <input id="listingTitle" type="text" class="form-control form-control-lg"
                                                   name="listingTitle"
                                                   placeholder="Enter listing title here..." maxlength="80"
                                                   wire:model="listingTitle"
                                                   autocomplete="off" wire:keyup="searchListingTitle"/>
                                            @if (!empty($listingTitleSearchResult) && $showListingTitleSuggestion)
                                                <ul id="listingTitleSearchResult" class="listing-title-ul">
                                                    @foreach ($listingTitleSearchResult as $record)
                                                        <li class="listing-title-li text-dark font-weight-bolder font-size-lg"
                                                            wire:click.prevent="updateListingTitleValue('{{ $record }}')">
                                                            {{ $record }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            <span class="fs-7 text-muted">Enter item brand if known & what you are listing. (example: Dell Laptop Like New!)</span>
                                            @error('listingTitle')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-6">
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">Category</span>
                                            </label>
                                            <div wire:ignore>
                                                <select id="categoryDropdown"
                                                        class="form-select form-select-lg fw-semibold"
                                                        data-control="select2"
                                                        data-placeholder="Please select category">
                                                    <option></option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category['id'] }}">
                                                            {{ $category['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('category')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-6">
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">Listing Details</span>
                                            </label>
                                            <textarea wire:model="description" class="form-control form-control-lg"
                                                      name="listingDetails"></textarea>
                                            <span class="fs-7 text-muted">Provide details about your listing item</span>
                                            @error('description')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                                            <span class="required">Product Condition</span>
                                        </label>

                                        <label class="d-flex flex-stack cursor-pointer mb-5">
                                            <span class="d-flex align-items-center me-2">
                                                <span class="symbol symbol-50px me-6">
                                                    <span class="symbol-label bg-light-warning">
                                                        <i class="ki-duotone ki-crown fs-2x text-warning">
                                                            <i class="path1"></i>
                                                            <i class="path2"></i>
                                                        </i>
                                                    </span>
                                                </span>
                                                <span class="d-flex flex-column">
                                                    <span class="fw-bold fs-6">New</span>
                                                    <span class="fs-7 text-muted">New with tags(NWT). Unopened packagin. Unsused.</span>
                                                </span>
                                            </span>

                                            <span class="form-check form-check-custom form-check-solid">
                                                <input id="{{ ProductConditionsEnum::NEW->value }}"
                                                       wire:model="productCondition" class="form-check-input"
                                                       type="radio"
                                                       name="productCondition"
                                                       value="{{ ProductConditionsEnum::NEW->value }}"/>
                                            </span>
                                        </label>

                                        <label class="d-flex flex-stack cursor-pointer mb-5">
                                            <span class="d-flex align-items-center me-2">
                                                <span class="symbol symbol-50px me-6">
                                                    <span class="symbol-label bg-light-success">
                                                        <i class="ki-duotone ki-shield fs-2x text-success">
                                                            <i class="path1"></i>
                                                            <i class="path2"></i>
                                                        </i>
                                                    </span>
                                                </span>
                                                <span class="d-flex flex-column">
                                                    <span class="fw-bold fs-6">Like New</span>
                                                    <span class="fs-7 text-muted">New without tags(NWOT). No signs of wear.Unused.</span>
                                                </span>
                                            </span>

                                            <span class="form-check form-check-custom form-check-solid">
                                                <input id="{{ ProductConditionsEnum::LIKE_NEW->value }}"
                                                       wire:model="productCondition" class="form-check-input"
                                                       type="radio"
                                                       name="productCondition"
                                                       value="{{ ProductConditionsEnum::LIKE_NEW->value }}"/>
                                            </span>
                                        </label>

                                        <label class="d-flex flex-stack cursor-pointer mb-5">
                                            <span class="d-flex align-items-center me-2">
                                                <span class="symbol symbol-50px me-6">
                                                    <span class="symbol-label bg-light-primary">
                                                       <i class="ki-duotone ki-grid-2 fs-2x text-primary">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                </span>
                                                <span class="d-flex flex-column">
                                                    <span class="fw-bold fs-6">Good</span>
                                                    <span class="fs-7 text-muted">Gently used. One/few minor flaws.Functional.</span>
                                                </span>
                                            </span>
                                            <span class="form-check form-check-custom form-check-solid">
                                                <input id="{{ ProductConditionsEnum::GOOD->value }}"
                                                       wire:model="productCondition" class="form-check-input"
                                                       type="radio"
                                                       name="productCondition"
                                                       value="{{ ProductConditionsEnum::GOOD->value }}"/>
                                            </span>
                                        </label>

                                        <label class="d-flex flex-stack cursor-pointer mb-5">
                                            <span class="d-flex align-items-center me-2">
                                                <span class="symbol symbol-50px me-6">
                                                    <span class="symbol-label bg-light-danger">
                                                        <i class="ki-duotone ki-kanban fs-2x text-danger">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                </span>
                                                <span class="d-flex flex-column">
                                                    <span class="fw-bold fs-6">Fair</span>
                                                    <span class="fs-7 text-muted">Used,functional,multiple flaws/defects.</span>
                                                </span>
                                            </span>
                                            <span class="form-check form-check-custom form-check-solid">
                                                <input id="{{ ProductConditionsEnum::FAIR->value }}"
                                                       wire:model="productCondition" class="form-check-input"
                                                       type="radio"
                                                       name="productCondition"
                                                       value="{{ ProductConditionsEnum::FAIR->value }}"/>
                                            </span>
                                        </label>

                                        <label class="d-flex flex-stack cursor-pointer mb-5">
                                            <span class="d-flex align-items-center me-2">
                                                <span class="symbol symbol-50px me-6">
                                                    <span class="symbol-label bg-light-dark">
                                                        <i class="ki-duotone ki-element-2 fs-2x text-dark">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                </span>
                                                <span class="d-flex flex-column">
                                                    <span class="fw-bold fs-6">Poor</span>
                                                    <span
                                                        class="fs-7 text-muted">Major flaws.May be damaged for parts.</span>
                                                </span>
                                            </span>
                                            <span class="form-check form-check-custom form-check-solid">
                                                <input id="{{ ProductConditionsEnum::POOR->value }}"
                                                       wire:model="productCondition" class="form-check-input"
                                                       type="radio"
                                                       name="productCondition"
                                                       value="{{ ProductConditionsEnum::POOR->value }}"/>
                                            </span>
                                        </label>

                                        @error('productCondition')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="{{ $step === 2 ? 'current' : '' }}" data-kt-stepper-element="content">
                            <div class="w-100">
                                <div class="pb-10 pb-lg-15">
                                    <h2 class="fw-bold d-flex align-items-center text-dark">Media</h2>
                                    <div class="text-muted fw-semibold fs-6">Images & Video</div>
                                </div>

                                <div class="fv-row">
                                    <div class="row">
                                        <div wire:ignore
                                             x-data
                                             x-init="() => {
                                                FilePond.create($refs.filepond, {
                                                        imagePreviewHeight: 150,
                                                        allowMultiple: true,
                                                        acceptedFileTypes: ['image/*'],
                                                        server: {
                                                            load: (source, load, error, progress, abort, headers) => {
                                                                const myRequest = new Request(source);
                                                                fetch(myRequest).then((res) => {
                                                                    return res.blob();
                                                                }).then(load);
                                                            },
                                                             process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                                @this.upload('listingImages', file, load, error, progress);
                                                            },
                                                            revert: (filename, load) => {
                                                                @this.removeUpload('listingImages', filename, load)
                                                            }
                                                        },
                                                        onreorderfiles: (files) => {
                                                            const newOrder = [];
                                                            files.forEach((file) => {
                                                                newOrder.push(file.serverId);
                                                            });
                                                            @this.reOrderImages(newOrder);
                                                        }
                                                    })
                                                 }">
                                            <input multiple
                                                   data-allow-reorder="true"
                                                   data-max-file-size="2MB"
                                                   data-max-files="12" class="filepond custom-width"
                                                   name="filepond" type="file" x-ref="filepond"/>
                                            <span
                                                class="fs-7 text-muted">Upload upto 12 images. Max file size 2MB</span>
                                        </div>
                                        @error('listingImages')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row mt-6">
                                        <div wire:ignore
                                             x-data
                                             x-init="() => {
                                                const maxDurationInSec = 60; // Maximum allowed duration in seconds
                                                FilePond.create($refs.listingVideo, {
                                                        acceptedFileTypes: ['video/*'],
                                                        server: {
                                                            load: (source, load, error, progress, abort, headers) => {
                                                                const myRequest = new Request(source);
                                                                fetch(myRequest).then((res) => {
                                                                    return res.blob();
                                                                }).then(load);
                                                            },
                                                            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                            const video = document.createElement('video');
                                                            video.preload = 'metadata';

                                                            video.onloadedmetadata = () => {
                                                                window.URL.revokeObjectURL(video.src); // Clean up
                                                                if (video.duration <= maxDurationInSec) {
                                                                    // Video duration is valid, proceed with upload
                                                                    @this.upload('listingVideo', file, load, error, progress);
                                                                } else {
                                                                    // Video duration exceeds the allowed limit, trigger an error
                                                                    error(`Video duration should not exceed ${maxDurationInSec} seconds.`);
                                                                    abort();
                                                                }
                                                            };

                                                            video.onerror = () => {
                                                                window.URL.revokeObjectURL(video.src); // Clean up
                                                                error('Error loading video.');
                                                                abort();
                                                            };

                                                            video.src = URL.createObjectURL(file);
                                                            },
                                                            revert: (filename, load) => {
                                                                @this.removeUpload('listingVideo', filename, load)
                                                            }
                                                        },
                                                    })
                                                 }">
                                            <input data-max-file-size="2MB" id="listingVideo"
                                                   name="listingVideo" type="file" x-ref="listingVideo"/>
                                            <span class="fs-7 text-muted">Video is optional. You can upload up to 60 seconds of video.</span>
                                        </div>
                                        @error('listingVideo')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="{{ $step === 3 ? 'current' : '' }}" data-kt-stepper-element="content">
                            <div class="w-100">
                                <div class="pb-10 pb-lg-15">
                                    <h2 class="fw-bold d-flex align-items-center text-dark">Pricing</h2>
                                    <div class="text-muted fw-semibold fs-6">Set Listing Price</div>
                                </div>

                                <div class="fv-row">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">Listing Type</span>
                                            </label>
                                        </div>

                                        <div class="col-md-4 mb-6">
                                            <input id="listingType_option_1" wire:model="listingType" type="radio"
                                                   class="btn-check"
                                                   name="listingType"
                                                   value="{{ ProductListingTypesEnum::AUCTION->value }}"/>
                                            <label
                                                class="btn btn-outline btn-color-muted btn-active-primary p-7 d-flex align-items-center justify-content-center"
                                                for="listingType_option_1">
                            <span class="d-block fw-semibold">
                                <span class="fw-bold d-block fs-3">Auction</span>
                            </span>
                                            </label>
                                            @error('listingType')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-6">
                                            <input id="listingType_option_2" wire:model="listingType" type="radio"
                                                   class="btn-check"
                                                   name="listingType"
                                                   value="{{ ProductListingTypesEnum::SELL->value }}"/>
                                            <label
                                                class="btn btn-outline btn-color-muted btn-active-primary p-7 d-flex align-items-center justify-content-center"
                                                for="listingType_option_2">
                            <span class="d-block fw-semibold">
                                <span class="fw-bold d-block fs-3">Sell</span>
                            </span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 mb-6">
                                            <input id="listingType_option_3" wire:model="listingType" type="radio"
                                                   class="btn-check"
                                                   name="listingType"
                                                   value="{{ ProductListingTypesEnum::BOTH->value }}"/>
                                            <label
                                                class="btn btn-outline btn-color-muted btn-active-primary p-7 d-flex align-items-center justify-content-center"
                                                for="listingType_option_3">
                            <span class="d-block fw-semibold">
                                <span class="fw-bold d-block fs-3">Both</span>
                            </span>
                                            </label>
                                        </div>

                                        <div
                                            class="{{ $listingType === ProductListingTypesEnum::SELL->value || $listingType === ProductListingTypesEnum::BOTH->value ? '' : 'd-none' }}">
                                            <div class="col-md-12 mb-6">
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span class="required">Price (USD)</span>
                                                </label>
                                                <input wire:model="productPrice" type="text"
                                                       class="form-control form-control-lg"
                                                       name="productPrice" placeholder="Enter product price here..."/>
                                                <span class="fs-7 text-muted">Enter the value of your item</span>
                                                @error('productPrice')
                                                <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                                @if (
                                                    $listingType === ProductListingTypesEnum::BOTH->value ||
                                                        $listingType === ProductListingTypesEnum::SELL->value)
                                                    <div class="col-md-12 mb-6 {{ $productPrice ? '' : 'd-none' }}">
                                                        <div class="d-flex flex-stack align-items-center">
                                                            <div>
                                                                <span class="fs-5 fw-bold">Selling Fee</span>
                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                      title="Selling fee is {{ GlobalHelper::getSettingValue('selling_fees') }}% + ${{ GlobalHelper::getSettingValue('payment_charges_fixed') }} of sold price"
                                                                      wire:ignore>
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                                            </div>
                                                            <div class="fs-2 fw-bold">${{ $sellSellingFee }}</div>
                                                        </div>
                                                        <div class="d-flex flex-stack align-items-center">
                                                            <div>
                                                                <span class="fs-6 fw-bold">Processing Fee</span>
                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                      title="Processing Fee is {{ GlobalHelper::getSettingValue('payment_charges_percentage') }}% of sold price"
                                                                      wire:ignore>
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                                            </div>
                                                            <div class="fs-2 fw-bold">${{ $sellProcessingFee }}</div>
                                                        </div>
                                                        <div class="d-flex flex-stack align-items-center">
                                                            <div>
                                                                <span class="fs-6 fw-bold">Potential Earning</span>
                                                            </div>
                                                            <div class="fs-2 fw-bold">${{ $sellYouEarn }}</div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div
                                                class="col-md-12 mb-6 {{ $listingType === ProductListingTypesEnum::BOTH->value ? 'd-none' : '' }}">
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span>Discounted Price (USD)</span>
                                                </label>
                                                <input wire:model="discountedProductPrice" type="text"
                                                       class="form-control form-control-lg"
                                                       name="discountedProductPrice"
                                                       placeholder="Enter discounted product price here..."/>
                                                <span class="fs-7 text-muted">Enter reduced price of your item</span>
                                                @error('discountedProductPrice')
                                                <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                                <div
                                                    class="col-md-12 mb-6 {{ $discountedProductPrice ? '' : 'd-none' }}">
                                                    <div class="d-flex flex-stack align-items-center">
                                                        <div>
                                                            <span class="fs-5 fw-bold">Selling Fee</span>
                                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                                  title="Selling fee is {{ GlobalHelper::getSettingValue('selling_fees') }}% + ${{ GlobalHelper::getSettingValue('payment_charges_fixed') }} of sold price"
                                                                  wire:ignore>
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span>
                                                        </div>
                                                        <div class="fs-2 fw-bold">${{ $discountedSellingFee }}</div>
                                                    </div>
                                                    <div class="d-flex flex-stack align-items-center">
                                                        <div>
                                                            <span class="fs-6 fw-bold">Processing Fee</span>
                                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                                  title="Processing Fee is {{ GlobalHelper::getSettingValue('payment_charges_percentage') }}% of sold price"
                                                                  wire:ignore>
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span>
                                                        </div>
                                                        <div class="fs-2 fw-bold">${{ $discountedProcessingFee }}</div>
                                                    </div>
                                                    <div class="d-flex flex-stack align-items-center">
                                                        <div>
                                                            <span class="fs-6 fw-bold">Potential Earning</span>
                                                        </div>
                                                        <div class="fs-2 fw-bold">${{ $discountedYouEarn }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="col-md-12 mb-3 {{ $listingType === ProductListingTypesEnum::AUCTION->value || $listingType === ProductListingTypesEnum::BOTH->value ? '' : 'd-none' }}">
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">Product Starting Bid (USD)</span>
                                            </label>
                                            <input wire:model="startingBid" type="text"
                                                   class="form-control form-control-lg"
                                                   name="startingBid" placeholder="Enter product starting bid here..."/>
                                            <span
                                                class="fs-7 text-muted">Enter the value of your item to start bidding</span>
                                            @error('startingBid')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror

                                            <div class="col-md-12 mb-6 {{ $startingBid ? '' : 'd-none' }}">
                                                <div class="d-flex flex-stack align-items-center">
                                                    <div>
                                                        <span class="fs-5 fw-bold">Selling Fee</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip"
                                                              title="Selling fee is {{ GlobalHelper::getSettingValue('selling_fees') }}% + ${{ GlobalHelper::getSettingValue('payment_charges_fixed') }} of sold price"
                                                              wire:ignore>
                                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </span>
                                                    </div>
                                                    <div class="fs-2 fw-bold">${{ $auctionSellingFee }}</div>
                                                </div>
                                                <div class="d-flex flex-stack align-items-center">
                                                    <div>
                                                        <span class="fs-6 fw-bold">Processing Fee</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip"
                                                              title="Processing Fee is {{ GlobalHelper::getSettingValue('payment_charges_percentage') }}% of sold price"
                                                              wire:ignore>
                                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </span>
                                                    </div>
                                                    <div class="fs-2 fw-bold">${{ $auctionProcessingFee }}</div>
                                                </div>
                                                <div class="d-flex flex-stack align-items-center">
                                                    <div>
                                                        <span class="fs-6 fw-bold">Potential Earning</span>
                                                    </div>
                                                    <div class="fs-2 fw-bold">${{ $auctionYouEarn }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="{{ $step === 4 ? 'current' : '' }}" data-kt-stepper-element="content">
                            <div class="w-100">
                                <div class="pb-10 pb-lg-15">
                                    <h2 class="fw-bold d-flex align-items-center text-dark">Listing Specifications</h2>
                                    <div class="text-muted fw-semibold fs-6">Provide your listing Specifications</div>
                                </div>

                                <div class="fv-row">
                                    <div class="row">
                                        <div class="col-md-4 mb-6">
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">Brand</span>
                                            </label>
                                            <div wire:ignore>
                                                <select class="form-control form-select" data-control="select2"
                                                        data-placeholder="Select brand..."
                                                        id="brandDropdown">
                                                    <option></option>
                                                </select>
                                            </div>
                                            @error('brand')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-6">
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">Color</span>
                                            </label>
                                            <div wire:ignore>
                                                <select class="form-control form-select" data-control="select2"
                                                        data-placeholder="Select colors..."
                                                        id="colorDropdown" multiple>
                                                    <option></option>
                                                    @foreach($colorList as $color)
                                                        <option value="{{$color->name}}">{{$color->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('colors')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-6">
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span>Quantity</span>
                                            </label>
                                            <input type="number" class="form-control form-control-lg"
                                                   placeholder="Enter quantity default 1"
                                                   wire:model="quantity"/>
                                            @error('quantity')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-6">
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">Tags</span>
                                            </label>
                                            <div wire:ignore>
                                                <input id="listingTags" class="form-control form-control-lg" name="tags"
                                                       placeholder="Type tags here and separate with comma or press enter on each tag"/>
                                                <div class="fs-7 text-muted">Adding "tags" will make your item more searchable. You can add upto 10 tags. Minimum 5 characters & Maximum 15 characters for each tag allowed.</div>
                                            </div>
                                            @error('listingTags')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="{{ $step === 5 ? 'current' : '' }}" data-kt-stepper-element="content">
                            <div class="w-100">
                                <div class="pb-10 pb-lg-15">
                                    <h2 class="fw-bold d-flex align-items-center text-dark">Delivery & Shipping</h2>
                                    <div class="text-muted fw-semibold fs-6">You're almost done</div>
                                </div>

                                <div class="fv-row">
                                    <div class="row">
                                        <div class="col-md-12 mb-6">
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">Select Pick up Address</span>
                                                <a href="javascript:void(0)" wire:click="newPickUpAddressForm(true)">Add
                                                    New</a>
                                            </label>
                                            <select class="form-select form-control-lg" wire:model="pickUpAddress">
                                                <option value="">Please Select Pick Up Address</option>
                                                @foreach ($fetchShippingAddress as $fetchaddress)
                                                    <option
                                                        value="{{ $fetchaddress->id }}">{{ $fetchaddress->address }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('pickUpAddress')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="mb-6 {{ $showPickUpAddressForm ? '' : 'd-none' }}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label
                                                        class="col-form-label required fw-semibold fs-6">Address</label>
                                                    <div wire:ignore>
                                                        <input type="text" id="autocomplete"
                                                               name="address" placeholder="Enter address here..."
                                                               class="form-control form-control-sm mb-3 mb-lg-0"/>
                                                    </div>
                                                    @error('address')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-form-label required fw-semibold fs-6">City</label>
                                                    <div wire:ignore>
                                                        <input type="text" id="city"
                                                               name="city"
                                                               class="form-control form-control-sm mb-3 mb-lg-0"
                                                               placeholder="Enter city here"/>
                                                    </div>
                                                    @error('city')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label
                                                        class="col-form-label required fw-semibold fs-6">State</label>
                                                    <div wire:ignore>
                                                        <input type="text" id="state"
                                                               name="state"
                                                               class="form-control form-control-sm mb-3 mb-lg-0"
                                                               placeholder="Enter state here"/>
                                                    </div>
                                                    @error('state')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-form-label required fw-semibold fs-6">Zip</label>
                                                    <div wire:ignore>
                                                        <input type="text" id="zip"
                                                               name="zip"
                                                               class="form-control form-control-sm mb-3 mb-lg-0"
                                                               placeholder="Enter zip here"/>
                                                    </div>
                                                    @error('zip')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label
                                                        class="col-form-label required fw-semibold fs-6">Country</label>
                                                    <div wire:ignore>
                                                        <select name="country_id" id="country"
                                                                class="form-select form-select-sm fw-semibold">
                                                            <option value="">Select country</option>
                                                            @foreach ($countries as $country)
                                                                <option
                                                                    value="{{ $country->id }}">{{ $country->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('country')
                                                    <div class="error text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="d-flex justify-content-end mt-2">
                                                    <a wire:click="newPickUpAddressForm(false)"
                                                       class="btn btn-sm btn-primary me-2">Close</a>
                                                    <button type="button" class="btn btn-sm btn-success"
                                                            wire:click="storeNewPickUpAddress()">Add
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-6 {{ $pickUpAddress ? '' : 'd-none' }}">
                                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                <span class="required">Who is paying the shipping cost?</span>
                                            </label>
                                            <select wire:model="shippingCostPayer" class="form-select form-control-lg"
                                                    name="shippingCostPayer">
                                                <option>Please Select Shipping Cost Payer</option>
                                                <option value="{{ ProductShippingCostPayerEnum::ME->value }}">Me
                                                </option>
                                                <option value="{{ ProductShippingCostPayerEnum::BUYER->value }}">Buyer
                                                </option>
                                                @if(empty($store))
                                                    <option value="{{ ProductShippingCostPayerEnum::PICKUP_ONLY->value }}">
                                                        Pick-Up
                                                        Only
                                                    </option>
                                                @endif
                                            </select>
                                            <span
                                                class="fs-7 text-muted">Offering free shipping makes quicker sales</span>
                                            @error('shippingCostPayer')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div
                                            class="col-12 row {{ $shippingCostPayer === ProductShippingCostPayerEnum::ME->value || $shippingCostPayer === ProductShippingCostPayerEnum::BUYER->value ? '' : 'd-none' }}">
                                            <div class="col-md-3">
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span class="required">Weight</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                          title="Weight (round up to the nearest pound)">
                                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <div class="input-group mb-5">
                                                    <input wire:model="weight" type="text" class="form-control"
                                                           placeholder="1"/>
                                                    <span class="input-group-text">lbs</span>
                                                </div>
                                                @error('weight')
                                                <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span class="required">Length</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                          title="Length (round up to the nearest length)">
                                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <div class="input-group mb-5">
                                                    <input wire:model="length" type="text" class="form-control"
                                                           placeholder="1"/>
                                                    <span class="input-group-text">inch</span>
                                                </div>
                                                @error('length')
                                                <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span class="required">Width</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                          title="Width (round up to the nearest width)">
                                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <div class="input-group mb-5">
                                                    <input wire:model="width" type="text" class="form-control"
                                                           placeholder="1"/>
                                                    <span class="input-group-text">inch</span>
                                                </div>
                                                @error('width')
                                                <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span class="required">Height</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                          title="Height (round up to the nearest height)">
                                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span>
                                                </label>
                                                <div class="input-group mb-5">
                                                    <input wire:model="height" type="text" class="form-control"
                                                           placeholder="1"/>
                                                    <span class="input-group-text">inch</span>
                                                </div>
                                                @error('height')
                                                <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div
                                            class="{{ $shippingCostPayer === ProductShippingCostPayerEnum::PICKUP_ONLY->value ? '' : 'd-none' }}">
                                            <div
                                                class="col-md-12 mb-6  {{ $shippingCostPayer === ProductShippingCostPayerEnum::PICKUP_ONLY->value ? '' : 'd-none' }}">
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-14">
                                                    <span>Buyer can see from {{ $visibleRange }} miles</span>
                                                </label>
                                                <div id="buyerVisiblityRadiusSlider" wire:ignore>
                                                </div>
                                            </div>
                                            @if(!empty($communities))
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span>Your listing will be shown into below communities</span>
                                                </label>
                                                @foreach($communities as $community)
                                                    <span class="badge badge-primary badge-square badge-lg p-4 mb-2">{{$community->city}},{{$community->state}} {{$community->zip}}</span>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex col-md-12 justify-content-end">
                            <button type="button" class="btn btn-lg btn-primary" wire:click.prevent="nextStep">
                                {{$step === 5 ? 'Completed' : 'Continue'}}
                                <span class="svg-icon svg-icon-4 ms-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                              transform="rotate(-180 18 13)" fill="currentColor"/>
                                        <path
                                            d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                            fill="currentColor"/>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        let categoryDropdown = $('#categoryDropdown');
        let brandDropdown = $('#brandDropdown');
        let listingTagify;
        document.addEventListener("livewire:load", () => {
            listingCategory();

            listingBrand();

            listingTags();

            listingColors();

            buyerVisiblityRadiusSlider();

            Livewire.on('brandsUpdated', function (brandsData) {
                brandDropdown.empty();
                brandsData.forEach(brand => {
                    brandDropdown.append(`<option value="${brand.name}">${brand.name}</option>`);
                });
                brandDropdown.append(`<option value="Unknown">Unknown</option>`);
                brandDropdown.val("").trigger('change');
            });

            Livewire.on('autoCompletedListingFields', function (data) {
                categoryDropdown.val(data['autoFillCategory']).trigger('change');
                brandDropdown.empty();
                data['brandList'].forEach(brand => {
                    brandDropdown.append(`<option value="${brand.name}">${brand.name}</option>`);
                });
                brandDropdown.append(`<option value="Unknown">Unknown</option>`);
                brandDropdown.val(data['autoFillBrand']).trigger('change');
                const autoFillTags = data['autoFillListingTags'];
                if (autoFillTags && autoFillTags.length > 0) {
                    autoFillTags.forEach(tag => {
                        listingTagify.addTags([tag]);
                    });
                }
            })
        })

        function listingCategory() {
            categoryDropdown.select2();
            categoryDropdown.on('change', function (e) {
                const data = categoryDropdown.select2("val");
                @this.
                set('category', data);
            });
        }

        function listingBrand() {

            brandDropdown.select2();
            brandDropdown.on('change', function (e) {
                const data = brandDropdown.select2("val");
                @this.
                set('brand', data);
            });
        }

        function listingColors() {
            let colorDropdown = $('#colorDropdown');
            colorDropdown.select2();

            colorDropdown.on('change', function (e) {
                const data = colorDropdown.select2("val");
                @this.
                set('colors', data);
            });
        }

        function listingTags() {
            let listingTagInput = document.querySelector("#listingTags");

            listingTagify = new Tagify(listingTagInput, {
                maxTags: 10,
                delimiters: ',',
                pattern: /^.{2,15}$/
            });

            listingTagify.on('add', function (e) {
                // remove last added tag if the total length exceeds
                if (e.detail.data.value > 15)
                    listingTagify.removeTag(e.detail.data.value); // removes the last added tag
            });

            listingTagify.on('change', function (e) {
                const data = e.detail.value;
                @this.
                set('listingTags', data);
            });
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
                    "min": 5,
                    "max": 100
                },
            });

            buyerVisiblityRadiusSlider.noUiSlider.on('change', function (values) {
                @this.
                set('visibleRange', values[0]);
            });
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('map.google_map_api_key') }}&libraries=places&callback=Function.prototype">
    </script>
    @include('custom-scripts.autocomplete')
@endpush
