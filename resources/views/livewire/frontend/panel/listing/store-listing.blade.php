<div class="card card-flush">
    <div class="card-body">

        <div class="flex-row-fluid">

            <form class="form" wire:submit.prevent="storeListing">
                <div class="row">
                    <div class="mb-10 fv-row" wire:ignore>
                        <label class="d-flex align-items-center form-label mb-5 required">Product
                            Image</label>
                        <!--begin::Input group-->

                        <div class="fv-row w-100">
                            <!--begin::Dropzone-->
                            <div class="needsclick dropzone" id="kt_dropzonejs_example_2">
                                <!--begin::Message-->
                                <div class="dz-message needsclick ">
                                    <!--begin::Icon-->
                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>

                                    <!--end::Icon-->
                                    <!--begin::Info-->
                                    <div class="ms-4">
                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">
                                            {{ GlobalHelper::getSettingValue('listing_image_dropzone_description') ?? 'Drop file here or click to upload' }}.
                                        </h3>
                                        <span class="fs-7 fw-semibold text-gray-400">Upload file</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                            </div>
                        </div>
                        <div class="error text-danger" id="fileerror"></div>
                        <!-- Input element to capture the ID of the selected main photo -->

                    </div>
                    <input type="hidden" wire:model="selectedMainPhotoId">
                    <div class="mb-10 fv-row" wire:ignore>
                        <label class="d-flex align-items-center form-label mb-5 required">Product
                            Video</label>
                        <!--begin::Input group-->

                        <div class="fv-row w-100">
                            <!--begin::Dropzone-->
                            <div class="needsclick dropzone" id="kt_dropzonejs_example_1">
                                <!--begin::Message-->
                                <div class="dz-message needsclick ">
                                    <!--begin::Icon-->
                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>

                                    <!--end::Icon-->
                                    <!--begin::Info-->
                                    <div class="ms-4">
                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">
                                            {{ GlobalHelper::getSettingValue('listing_video_dropzone_description') ?? 'Drop file here or click to upload' }}
                                        </h3>
                                        <span class="fs-7 fw-semibold text-gray-400">Upload Video</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                            </div>
                            <!--end::Dropzone-->
                        </div>
                        <div class="error text-danger" id="videoerror"></div>


                    </div>

                    <div class="col-md-12 mb-6">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Listing Title</span>
                        </label>
                        <input id="listingTitle" type="text" class="form-control form-control-lg" name="listingTitle"
                            placeholder="Enter listing title here..." maxlength="80" wire:model="listingTitle"
                            autocomplete="off" wire:keyup="searchListingTitle" />
                        @if (!empty($listingTitleSearchResult) && $showListingTitleSuggestion)
                            <ul id="listingTitleSearchResult" class="listing-title-ul">
                                @foreach ($listingTitleSearchResult as $record)
                                    <li class="listing-title-li text-dark font-weight-bolder font-size-lg"
                                        wire:click.prevent="updateListingTitleValue('{{ $record }}')">
                                        {{ $record }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <span class="fs-7 text-muted">Enter item brand if known & what you are listing. (example: Dell
                            Laptop Like New!)</span>
                        @error('listingTitle')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-6">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Brand</span>
                        </label>
                        <input wire:model="brand" type="text" class="form-control form-control-lg" name="brand"
                            placeholder="Enter brand name here..." />
                        <span class="fs-7 text-muted">Adding a brand will help buyers find your item faster</span>
                        @error('brand')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-6">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Parent Category</span> &nbsp;<a href="javascript:void(0)"
                                wire:click="visibilityParentCategoryForm(true)">Add New</a>
                        </label>
                        <select id="parentCategory" name="parentCategory" wire:model="parentCategory"
                            class="form-select form-control-lg">
                            <option value="">Please Select Parent Category</option>
                            @foreach ($parentCategories as $parentCategoryData)
                                <option value="{{ $parentCategoryData->id }}">{{ $parentCategoryData->name }}</option>
                            @endforeach

                        </select>
                        @error('parentCategory')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-6">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Child Category</span> &nbsp;<a href="javascript:void(0)"
                                wire:click="visibilityChildCategoryForm(true)">Add New</a>
                        </label>
                        <select id="childCategory" wire:model="childCategory" class="form-select form-control-lg"
                            name="childCategory">
                            <option value="">Please Select Child Category</option>
                            @if (!is_null($parentCategory))
                                @foreach ($childCategories as $childCategoryData)
                                    <option value="{{ $childCategoryData->id }}">{{ $childCategoryData->name }}
                                    </option>
                                @endforeach
                            @endif

                        </select>
                        @error('childCategory')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror


                    </div>

                    <div class="col-md-3 mb-6" wire:ignore>
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Color</span>
                        </label>
                        <select id="color" wire:model="color" class="form-select form-control-lg" name="color">
                            <option>Please Select Color</option>
                            @foreach ($fetchColors as $fetchColor)
                                <option value="{{ $fetchColor->name }}">{{ $fetchColor->name }}</option>
                            @endforeach
                        </select>
                        @error('color')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6 {{ $showParentCategoryForm ? '' : 'd-none' }}">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <!--begin::Label-->
                                    <label class="col-form-label required fw-semibold fs-6">Parent Category
                                        Name</label>
                                    <!--end::Label-->
                                    <input wire:ignore type="text" name="newParentCategoryName"
                                        wire:model="newParentCategoryName"
                                        class="form-control form-control-lg mb-3 mb-lg-0"
                                        placeholder="Parent Category Name"
                                        value="{{ old('newParentCategoryName') }}" />
                                    @error('newParentCategoryName')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <a wire:click="visibilityParentCategoryForm(false)"
                                    class="btn btn-primary  mt-14">Close</a>
                                <button wire:click="storeNewParentCategory"
                                    class="btn btn-success  mt-14">Add</button>
                            </div>

                        </div>

                    </div>

                    <div class="mb-6 {{ $showChildCategoryForm ? '' : 'd-none' }}">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <!--begin::Label-->
                                    <label class="col-form-label required fw-semibold fs-6">Child Category Name</label>
                                    <!--end::Label-->
                                    <input wire:ignore type="text" name="newChildCategoryName"
                                        wire:model="newChildCategoryName"
                                        class="form-control form-control-lg mb-3 mb-lg-0"
                                        placeholder="Child Category Name"
                                        value="{{ old('newChildCategoryName') }}" />
                                    @error('newChildCategoryName')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-6">
                                    <label class="col-form-label required fw-semibold fs-6">Parent Category</label>
                                    <!--end::Label-->
                                    <select wire:ignore name="childParentCategoryId" id="childParentCategoryId"
                                        wire:model="childParentCategoryId" aria-label="Select "
                                        data-placeholder="Select a Parent Category..."
                                        class="form-select form-select-lg fw-semibold">
                                        <option value="">Select parent category</option>
                                        @foreach ($parentCategories as $parentCategory)
                                            <option value="{{ $parentCategory->id }}">{{ $parentCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('childParentCategoryId')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <a wire:click="visibilityChildCategoryForm(false)"
                                    class="btn btn-primary  mt-14">Close</a>
                                <button wire:click="storeNewChildCategory" class="btn btn-success  mt-14">Add</button>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-12" wire:ignore>
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Tags</span>
                        </label>
                        <input id="tags" wire:model.lazy="tags" wire:ignore
                            class="form-control form-control-lg" name="tags" placeholder="Enter tags here..." />
                        <span class="fs-7 text-muted">Adding "tags" will make your item more searchable.</span>

                    </div>
                    @error('tags')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-12 mb-6 mt-6">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Listing Details</span>
                        </label>
                        <textarea wire:model="listingDetails" class="form-control form-control-lg" name="listingDetails"></textarea>
                        <span class="fs-7 text-muted">Provide details about your listing item</span>
                        @error('listingDetails')
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
                            <input id="{{ \App\Enums\ProductConditionsEnum::NEW->value }}"
                                wire:model="productCondition" class="form-check-input" type="radio"
                                name="productCondition" value="{{ \App\Enums\ProductConditionsEnum::NEW->value }}" />
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
                            <input id="{{ \App\Enums\ProductConditionsEnum::LIKE_NEW->value }}"
                                wire:model="productCondition" class="form-check-input" type="radio"
                                name="productCondition"
                                value="{{ \App\Enums\ProductConditionsEnum::LIKE_NEW->value }}" />
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
                            <input id="{{ \App\Enums\ProductConditionsEnum::GOOD->value }}"
                                wire:model="productCondition" class="form-check-input" type="radio"
                                name="productCondition"
                                value="{{ \App\Enums\ProductConditionsEnum::GOOD->value }}" />
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
                            <input id="{{ \App\Enums\ProductConditionsEnum::FAIR->value }}"
                                wire:model="productCondition" class="form-check-input" type="radio"
                                name="productCondition"
                                value="{{ \App\Enums\ProductConditionsEnum::FAIR->value }}" />
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
                                <span class="fs-7 text-muted">Major flaws.May be damaged for parts.</span>
                            </span>
                        </span>
                        <span class="form-check form-check-custom form-check-solid">
                            <input id="{{ \App\Enums\ProductConditionsEnum::POOR->value }}"
                                wire:model="productCondition" class="form-check-input" type="radio"
                                name="productCondition"
                                value="{{ \App\Enums\ProductConditionsEnum::POOR->value }}" />
                        </span>
                    </label>

                    @error('productCondition')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror


                    <div class="col-md-12">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Listing Type</span>
                        </label>
                    </div>

                    <div class="col-md-4 mb-6">
                        <input id="listingType_option_1" wire:model="listingType" type="radio" class="btn-check"
                            name="listingType" value="{{ \App\Enums\ProductListingTypesEnum::AUCTION->value }}" />
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
                        <input id="listingType_option_2" wire:model="listingType" type="radio" class="btn-check"
                            name="listingType" value="{{ \App\Enums\ProductListingTypesEnum::SELL->value }}" />
                        <label
                            class="btn btn-outline btn-color-muted btn-active-primary p-7 d-flex align-items-center justify-content-center"
                            for="listingType_option_2">
                            <span class="d-block fw-semibold">
                                <span class="fw-bold d-block fs-3">Sell</span>
                            </span>
                        </label>
                    </div>
                    <div class="col-md-4 mb-6">
                        <input id="listingType_option_3" wire:model="listingType" type="radio" class="btn-check"
                            name="listingType" value="{{ \App\Enums\ProductListingTypesEnum::BOTH->value }}" />
                        <label
                            class="btn btn-outline btn-color-muted btn-active-primary p-7 d-flex align-items-center justify-content-center"
                            for="listingType_option_3">
                            <span class="d-block fw-semibold">
                                <span class="fw-bold d-block fs-3">Both</span>
                            </span>
                        </label>
                    </div>

                    <div
                        class="{{ $listingType === \App\Enums\ProductListingTypesEnum::SELL->value || $listingType === \App\Enums\ProductListingTypesEnum::BOTH->value ? '' : 'd-none' }}">
                        <div class="col-md-12 mb-6">
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span class="required">Price (USD)</span>
                            </label>
                            <input wire:model="productPrice" type="text" class="form-control form-control-lg"
                                name="productPrice" placeholder="Enter product price here..." />
                            <span class="fs-7 text-muted">Enter the value of your item</span>
                            @error('productPrice')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                            @if (
                                $listingType === \App\Enums\ProductListingTypesEnum::BOTH->value ||
                                    $listingType === \App\Enums\ProductListingTypesEnum::SELL->value)
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
                            class="col-md-12 mb-6 {{ $listingType === \App\Enums\ProductListingTypesEnum::BOTH->value ? 'd-none' : '' }}">
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                <span>Discounted Price (USD)</span>
                            </label>
                            <input wire:model="discountedProductPrice" type="text"
                                class="form-control form-control-lg" name="discountedProductPrice"
                                placeholder="Enter discounted product price here..." />
                            <span class="fs-7 text-muted">Enter reduced price of your item</span>
                            @error('discountedProductPrice')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-12 mb-6 {{ $discountedProductPrice ? '' : 'd-none' }}">
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
                        class="col-md-12 mb-3 {{ $listingType === \App\Enums\ProductListingTypesEnum::AUCTION->value || $listingType === \App\Enums\ProductListingTypesEnum::BOTH->value ? '' : 'd-none' }}">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Product Starting Bid (USD)</span>
                        </label>
                        <input wire:model="startingBid" type="text" class="form-control form-control-lg"
                            name="startingBid" placeholder="Enter product starting bid here..." />
                        <span class="fs-7 text-muted">Enter the value of your item to start bidding</span>
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

                    <div class="col-md-12">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Select Pick up Address</span> &nbsp;<a href="javascript:void(0)"
                                wire:click="visibilityPickUpAddressForm(true)">Add New</a>
                        </label>
                        <select class="form-select form-control-lg" name="pickUpAddress" wire:model="pickUpAddress">
                            <option value="">Please Select Pick Up Address</option>
                            @foreach ($fetchShippingAddress as $fetchaddress)
                                <option value="{{ $fetchaddress->id }}">{{ $fetchaddress->address }}</option>
                            @endforeach
                        </select>

                    </div>
                    @error('pickUpAddress')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-6 {{ $showPickUpAddressForm ? '' : 'd-none' }}">

                        <div class="fv-row form-group">
                            <label class="col-form-label required fw-semibold fs-6">Address</label>
                            <input wire:ignore type="text" id="autocomplete" wire:model.defer="address"
                                name="address" placeholder="Enter address here..."
                                class="form-control form-control-lg mb-3 mb-lg-0" />
                            @error('address')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-6">
                                <label class="col-form-label required fw-semibold fs-6">City</label>
                                <input wire:ignore type="text" id="city" wire:model.defer="city"
                                    name="city" class="form-control form-control-lg mb-3 mb-lg-0"
                                    placeholder="Enter city here" />
                                @error('city')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label required fw-semibold fs-6">State</label>
                                <input wire:ignore type="text" id="state" wire:model.defer="state"
                                    name="state" class="form-control form-control-lg mb-3 mb-lg-0"
                                    placeholder="Enter state here" />
                                @error('state')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-md-6">
                                <label class="col-form-label required fw-semibold fs-6">Zip</label>
                                <input wire:ignore type="text" id="zip" wire:model.defer="zip"
                                    name="zip" class="form-control form-control-lg mb-3 mb-lg-0"
                                    placeholder="Enter zip here" />
                                @error('zip')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-6">
                                <label class="col-form-label required fw-semibold fs-6">Country</label>
                                <!--end::Label-->
                                <select wire:ignore name="country_id" id="country_id" wire:model.defer="country_id"
                                    aria-label="Select " data-placeholder="Select a Country..."
                                    class="form-select form-select-lg fw-semibold">
                                    <option value="">Select country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="d-flex justify-content-end py-6 px-9">
                                <a wire:click="visibilityPickUpAddressForm(false)"
                                    class="btn btn-primary me-2">Close</a>
                                <button wire:click="storeNewPickupAddress" class="btn btn-success">Add</button>
                            </div>
                        </div>



                    </div>

                    <div class="col-md-12 mb-6 mt-6 {{ $pickUpAddress ? '' : 'd-none' }}">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Who is paying the shipping cost?</span>
                        </label>
                        <select wire:model="shippingCostPayer" class="form-select form-control-lg"
                            name="shippingCostPayer">
                            <option>Please Select Shipping Cost Payer</option>
                            <option value="{{ \App\Enums\ProductShippingCostPayerEnum::ME->value }}">Me</option>
                            <option value="{{ \App\Enums\ProductShippingCostPayerEnum::BUYER->value }}">Buyer</option>
                            <option value="{{ \App\Enums\ProductShippingCostPayerEnum::PICKUP_ONLY->value }}">Pick-Up
                                Only
                            </option>
                        </select>
                        <span class="fs-7 text-muted">Offering free shipping makes quicker sales</span>
                        @error('shippingCostPayer')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div
                        class="col-12 row {{ $shippingCostPayer === \App\Enums\ProductShippingCostPayerEnum::ME->value || $shippingCostPayer === \App\Enums\ProductShippingCostPayerEnum::BUYER->value ? '' : 'd-none' }}">
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
                                <input wire:model="weight" type="text" class="form-control" placeholder="1" />
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
                                <input wire:model="length" type="text" class="form-control" placeholder="1" />
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
                                <input wire:model="width" type="text" class="form-control" placeholder="1" />
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
                                <input wire:model="height" type="text" class="form-control" placeholder="1" />
                                <span class="input-group-text">inch</span>
                            </div>
                            @error('height')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div
                        class="col-md-12 mb-6  {{ $shippingCostPayer === \App\Enums\ProductShippingCostPayerEnum::PICKUP_ONLY->value ? '' : 'd-none' }}">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-14">
                            <span>Buyer can see from {{ $visibleRange }} miles</span>
                        </label>
                        <div id="buyerVisiblityRadiusSlider" wire:ignore>
                        </div>
                    </div>

                    <div class="col-md-12 mb-6 mt-5" wire:ignore>
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Communities</span>
                        </label>
                        <select wire:ignore wire:model.lazy="selectedCommunities" name="selectedCommunities[]"
                            id="selectedCommunities" data-control="select2" class="form-select form-control-lg"
                            data-allow-clear="false" data-placeholder="Select Communities" multiple>
                            @foreach ($fetchCommunities as $fetchCommunity)
                                <option value="{{ $fetchCommunity->id }}">{{ $fetchCommunity->name }}</option>
                            @endforeach
                        </select>
                        @error('selectedCommunities')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#selectedCommunities').on('change', function() {
                var selectedValues = $(this).val();
                Livewire.emit('selectedCommunitiesUpdated', selectedValues);
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.3.3/dist/sweetalert2.min.js"
        integrity="sha384-0xU6Mwv6yjU6HGj6iCr0q0jDfQ4Ui0PBAOQFCxjmdOv8epflj6zthiJ5F5O5KjZ" crossorigin="anonymous"></script>

    <script type="text/javascript">
        var myDropzone = new Dropzone("#kt_dropzonejs_example_2", {
            url: "{{ route('listing.upload.image') }}", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 12,
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            previewTemplate: `
                <div class="dz-preview dz-file-preview">
                    <div class="dz-image">
                        <img data-dz-thumbnail />
                    </div>
                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                    <div class="dz-success-mark"><span>✔</span></div>
                    <div class="dz-error-mark"><span>✘</span></div>
                    <!-- Add a radio button to select the main photo -->
                    <label>
                        <input type="radio" name="main_photo" data-dz-mainphoto />
                        Set as Main Photo
                    </label>
                </div>
            `,
            accept: function(file, done) {
                if (file.name == "wow.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            },
            removedfile: function(file) {
                removeFile(file);
            },
            init: function() {
                this.on("addedfile", function(file) {
                    // Get the checkbox element for the clicked image
                    const checkbox = file.previewElement.querySelector(
                        'input[type="radio"][data-dz-mainphoto]');

                    // Add a click event listener to the checkbox instead of the image
                    checkbox.addEventListener('click', function(event) {
                        event.stopPropagation();

                        // Clear the selection from other images
                        // Clear the selection from other images
                        if (checkbox.checked) {
                            const checkboxes = document.querySelectorAll(
                                'input[type="radio"][data-dz-mainphoto]');
                            checkboxes.forEach(function(item) {
                                if (item !== checkbox) {
                                    item.checked = false;
                                }
                            });

                            // Get the selected file name and emit it to the Livewire component
                            const selectedMainPhotoName = file.name;
                            console.log(selectedMainPhotoName);
                            Livewire.emit('updateSelectedMainPhotoId', selectedMainPhotoName);
                        }
                    });
                });
                this.on("maxfilesexceeded", function(file) {
                    myDropzone.removeFile(file);
                    Swal.fire({
                        title: 'Error !',
                        text: "You can't upload more than {{ \App\Helpers\GlobalHelper::getSettingValue('max_number_of_pictures') }} file !",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Remove Selected File'
                    }).then((result) => {
                        if (result.value) {
                            myDropzone.removeAllFiles();
                            Swal.fire(
                                'Removed!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    })

                });
            },
            error: function(file, errorMessage, xhr) {
                if (xhr) {
                    if (xhr.status === 422) {

                        console.log("in eror");
                        var response = JSON.parse(xhr.responseText);
                        var errors = response.errors;

                        if (errors && errors.file) {
                            displayErrorMessage(errors.file[0]);

                        }
                    } else {
                        console.log("in erdor");
                    }

                }
            },

        });


        function displayErrorMessage(errorMessage) {
            var errorElement = document.getElementById("fileerror");
            errorElement.textContent = errorMessage;
        }
    </script>
    <script type="text/javascript">
        var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
            url: "{{ route('listing.upload.video') }}", // Set the url for your upload script location
            paramName: "video", // The name that will be used to transfer the file
            maxFiles: 1,
            maxFilesize: 20, // MB
            addRemoveLinks: true,
            acceptedFiles: 'video/*',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            accept: function(file, done) {
                if (file.name == "wow.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            },
            removedfile: function(file) {
                removeFile(file);
            },
            init: function() {
                this.on("maxfilesexceeded", function(file) {
                    myDropzone.removeFile(file);
                    Swal.fire({
                        title: 'Error !',
                        text: "You can't upload more than 1 file !",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Remove Selected File'
                    }).then((result) => {
                        if (result.value) {
                            myDropzone.removeAllFiles();
                            Swal.fire(
                                'Removed!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    })

                });
            },
            error: function(file, errorMessage, xhr) {
                if (xhr) {
                    if (xhr.status === 422) {

                        var response = JSON.parse(xhr.responseText);
                        var errors = response.errors;
                        if (errors && errors.video) {
                            displayVideoErrorMessage(errors.video[0]);

                        }
                    } else {
                        console.log("in else");
                    }

                }
            },

        });


        function displayVideoErrorMessage(errorMessage) {
            var errorElement = document.getElementById("videoerror");
            errorElement.textContent = errorMessage;
        }
    </script>

    <script>
        function removeFile(file) {

            var deleteUrl = "{{ route('listing.remove.file') }}";
            $.ajax({
                url: deleteUrl,
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    fileUrl: file.url,
                    fileName: file.name,
                },
                success: function(response) {
                    // Remove the file element from the UI
                    file.previewElement.remove();
                    var errorElement = document.getElementById("videoerror");
                    errorElement.textContent = "";
                    var errorElement = document.getElementById("fileerror");
                    errorElement.textContent = "";
                },
                error: function(xhr, status, error) {
                    file.previewElement.remove()
                    var errorElement = document.getElementById("videoerror");
                    errorElement.textContent = "";
                    var errorElement = document.getElementById("fileerror");
                    errorElement.textContent = "";
                }
            });
        }
    </script>
    <!-- JavaScript -->
@endpush
