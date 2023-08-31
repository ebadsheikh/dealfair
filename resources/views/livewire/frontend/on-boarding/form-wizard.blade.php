<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column stepper-multistep"
         id="kt_create_account_stepper">
        <div class="d-flex flex-column flex-lg-row-auto w-lg-350px w-xl-500px">
            <div
                class="d-flex flex-column position-lg-fixed top-0 bottom-0 w-lg-350px w-xl-500px scroll-y bgi-size-cover bgi-position-center"
                style="background-image: url(assets/media/misc/auth-bg.png)">
                <div class="d-flex flex-center py-10 py-lg-20">
                    <img alt="Logo" src="{{ asset('assets/media/logos/custom-1.png') }}" class="h-70px"/>
                </div>

                <div class="d-flex flex-row-fluid justify-content-center p-10">
                    <div class="stepper-nav">
                        <div class="stepper-item {{ $step === 1 ? 'current' : '' }}" data-kt-stepper-element="nav">
                            <div class="stepper-wrapper">
                                <div class="stepper-icon rounded-3">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">1</span>
                                </div>

                                <div class="stepper-label">
                                    <h3 class="stepper-title fs-2">
                                        {{ GlobalHelper::getSettingValue('step_one_left_side_title') }}</h3>
                                    <div class="stepper-desc fw-normal">
                                        {{ GlobalHelper::getSettingValue('step_one_left_side_subtitle') }}</div>
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
                                    <h3 class="stepper-title fs-2">
                                        {{ GlobalHelper::getSettingValue('step_two_left_side_title') }}</h3>
                                    <div class="stepper-desc fw-normal">
                                        {{ GlobalHelper::getSettingValue('step_two_left_side_subtitle') }}</div>
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
                                    <h3 class="stepper-title fs-2">
                                        {{ GlobalHelper::getSettingValue('step_three_left_side_title') }}</h3>
                                    <div class="stepper-desc fw-normal">
                                        {{ GlobalHelper::getSettingValue('step_three_left_side_subtitle') }}</div>
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
                                    <h3 class="stepper-title">
                                        {{ GlobalHelper::getSettingValue('step_four_left_side_title') }}</h3>
                                    <div class="stepper-desc fw-normal">
                                        {{ GlobalHelper::getSettingValue('step_four_left_side_subtitle') }}</div>
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
                                    <h3 class="stepper-title">
                                        {{ GlobalHelper::getSettingValue('step_five_left_side_title') }}</h3>
                                    <div class="stepper-desc fw-normal">
                                        {{ GlobalHelper::getSettingValue('step_five_left_side_subtitle') }}</div>
                                </div>
                            </div>
                            <div class="stepper-line h-40px"></div>
                        </div>

                        <div class="stepper-item {{ $step === 6 ? 'current' : '' }}" data-kt-stepper-element="nav">
                            <div class="stepper-wrapper">
                                <div class="stepper-icon">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">6</span>
                                </div>
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        {{ GlobalHelper::getSettingValue('step_six_left_side_title') }}</h3>
                                    <div class="stepper-desc fw-normal">
                                        {{ GlobalHelper::getSettingValue('step_six_left_side_subtitle') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-lg-row-fluid py-10">
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <div class="w-lg-650px w-xl-700px p-10 p-lg-15 mx-auto">
                    <form class="my-auto pb-5" enctype="multipart/form-data">
                        <div class="{{ $step === 1 ? 'current' : '' }}" data-kt-stepper-element="content">
                            <div class="w-100">
                                <div class="pb-10 pb-lg-15">
                                    <h2 class="fw-bold d-flex align-items-center text-dark">
                                        {{ GlobalHelper::getSettingValue('step_one_form_title') }}</h2>
                                    <div class="text-muted fw-semibold fs-6">
                                        {{ GlobalHelper::getSettingValue('step_one_form_subtitle') }}</div>
                                </div>
                                <div class="fv-row">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <video width="100%" height="240" controls>
                                                <source
                                                    src="{{ GlobalHelper::getSettingValue('step_one_welcome_video') }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="{{ $step === 2 ? 'current' : '' }}" data-kt-stepper-element="content">
                            <div class="w-100">
                                <div class="pb-10 pb-lg-15">
                                    <h2 class="fw-bold text-dark">
                                        {{ GlobalHelper::getSettingValue('step_two_form_title') }}</h2>
                                    <div class="text-muted fw-semibold fs-6">
                                        {{ GlobalHelper::getSettingValue('step_two_form_subtitle') }}</div>
                                </div>
                                <div class="mb-10 fv-row">
                                    <label class="d-flex align-items-center form-label mb-5 required">Profile
                                        Image</label>
                                    <div
                                        class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                        data-kt-image-input="true">

                                        <div class="image-input-wrapper w-125px h-125px" wire:ignore></div>

                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            aria-label="Change profile image" data-kt-initialized="1">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input wire:model.lazy="image" type="file" name="image"
                                                   accept=".png, .jpg, .jpeg">
                                            <input type="hidden" name="image_remove">
                                        </label>

                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            aria-label="Cancel profile image" data-kt-initialized="1">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>

                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            aria-label="Remove profile image" data-kt-initialized="1">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                    </div>
                                    @error('image')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-6 row">
                                    <div class="col-6">
                                        <label class="d-flex align-items-center form-label mb-5 required">First
                                            Name</label>
                                        <input type="text" class="form-control form-control-lg"
                                               placeholder="Enter first name here..." name="first_name"
                                               value="{{ auth()->user()->first_name }}" disabled/>
                                    </div>
                                    <div class="col-6">
                                        <label class="d-flex align-items-center form-label mb-5 required">Last
                                            Name</label>
                                        <input type="text" class="form-control form-control-lg"
                                               placeholder="Enter last name here..." name="last_name"
                                               value="{{ auth()->user()->last_name }}" disabled/>
                                    </div>

                                </div>
                                <div class="mb-6 fv-row">
                                    <label class="d-flex align-items-center form-label mb-5 required">Email</label>
                                    <input type="text" class="form-control form-control-lg"
                                           placeholder="Enter email here..." name="email"
                                           value="{{ auth()->user()->email }}" disabled/>
                                </div>
                                <div class="mb-6 fv-row">
                                    <label class="d-flex align-items-center form-label mb-5 required">User Name</label>
                                    <input type="text" wire:model.lazy="username" class="form-control form-control-lg"
                                           placeholder="Enter user name here..." name="username"/>
                                    @error('username')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-6 fv-row">
                                    <label class="d-flex align-items-center form-label mb-5 required">Phone
                                        Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <select wire:model.defer="phoneCode" class="form-control">
                                                <option value="+1">+1</option>
                                            </select>
                                        </div>
                                        <input id="telephone" type="number" wire:model.lazy="telephone"
                                               maxlength="10" class="form-control" name="telephone"
                                               placeholder="Enter phone number">
                                    </div>
                                    @error('telephone')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-6 fv-row">
                                    <label class="d-flex align-items-center form-label mb-5 required">Date Of
                                        Birth</label>
                                    <input type="date" wire:model.lazy="date_of_birth"
                                           class="form-control form-control-lg" name="date_of_birth"/>
                                    @error('date_of_birth')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="{{ $step === 3 ? 'current' : '' }}" data-kt-stepper-element="content">
                            <div class="w-100">
                                <div class="pb-10 pb-lg-12">
                                    <h2 class="fw-bold text-dark">
                                        {{ GlobalHelper::getSettingValue('step_three_form_title') }}</h2>
                                    <div class="text-muted fw-semibold fs-6">
                                        {{ GlobalHelper::getSettingValue('step_three_form_subtitle') }}</div>
                                </div>

                                <div class="fv-row mb-10">
                                    <label class="form-label required">Address</label>
                                    <div wire:ignore>
                                        <input id="autocomplete" name="address"
                                               placeholder="Enter address here..."
                                               class="form-control form-control-lg"/>
                                    </div>
                                    @error('address')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row mb-10">
                                    <div class="col-md-4">
                                        <label class="form-label required">City</label>
                                        <div wire:ignore>
                                            <input id="city" name="city" placeholder="Enter city here..."
                                                   class="form-control form-control-lg"/>
                                        </div>
                                        @error('city')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label required">State</label>
                                        <div wire:ignore>
                                            <input id="state" name="state"
                                                   placeholder="Enter state here..."
                                                   class="form-control form-control-lg"/>
                                        </div>
                                        @error('state')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label required">Zip</label>
                                        <div wire:ignore>
                                            <input id="zip" name="zip"
                                                   placeholder="Enter zip here..."
                                                   class="form-control form-control-lg"/>
                                        </div>
                                        @error('zip')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fv-row mb-10">
                                    <label class="form-label required">Country</label>
                                    <select wire:model.defer="country_id" aria-label="Select a country..."
                                            data-control="select2" id="country" data-placeholder="Select a country..."
                                            class="form-select form-select-lg">
                                        @if (!is_null($countries))
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('country_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="{{ $step === 4 ? 'current' : '' }}" data-kt-stepper-element="content">
                            <div class="w-100">
                                <div class="pb-10 pb-lg-15">
                                    <h2 class="fw-bold text-dark">
                                        {{ GlobalHelper::getSettingValue('step_four_form_title') }}</h2>
                                    <div class="text-muted fw-semibold fs-6">
                                        {{ GlobalHelper::getSettingValue('step_four_form_subtitle') }}</div>
                                </div>
                                <div class="mb-10 fv-row">
                                    <div class="row">
                                            <label class="d-flex align-items-center form-label mt-5">Government ID</label>
                                            <div wire:ignore
                                                 x-data
                                                 x-init="() => {
                                                FilePond.create($refs.governmentVerificationImage, {
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
                                                                @this.upload('governmentVerificationImage', file, load, error, progress);
                                                            },
                                                            revert: (filename, load) => {
                                                                @this.removeUpload('governmentVerificationImage', filename, load)
                                                            }
                                                        }
                                                    })
                                                 }">
                                                <input data-max-file-size="2MB" class="filepond custom-width"
                                                       name="governmentVerificationImage" type="file" x-ref="governmentVerificationImage"/>
                                                <span
                                                    class="fs-7 text-muted">Add Government ID (i.e A Driver
                                                        License). Only *.png, *.jpg and *.jpeg image files are accepted</span>
                                            </div>
                                            @error('governmentVerificationImage')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    <div class="row">
                                        <label class="d-flex align-items-center form-label mt-5">Address ID</label>
                                        <div wire:ignore
                                             x-data
                                             x-init="() => {
                                                FilePond.create($refs.addressVerificationImage, {
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
                                                                @this.upload('addressVerificationImage', file, load, error, progress);
                                                            },
                                                            revert: (filename, load) => {
                                                                @this.removeUpload('addressVerificationImage', filename, load)
                                                            }
                                                        }
                                                    })
                                                 }">
                                            <input data-max-file-size="2MB" class="filepond custom-width"
                                                   name="addressVerificationImage" type="file" x-ref="addressVerificationImage"/>
                                            <span
                                                class="fs-7 text-muted">Add current bill showing your Address
                                                        ID. Only *.png, *.jpg and *.jpeg image files are accepted</span>
                                        </div>
                                        @error('addressVerificationImage')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="{{ $step === 5 ? 'current' : '' }}" data-kt-stepper-element="content">
                            <div class="w-100">
                                <div class="pb-10 pb-lg-15">
                                    <h2 class="fw-bold text-dark">
                                        {{ GlobalHelper::getSettingValue('step_five_form_title') }}</h2>
                                    <div class="text-muted fw-semibold fs-6">
                                        {{ GlobalHelper::getSettingValue('step_five_form_subtitle') }}</div>
                                </div>

                                <div class="d-flex flex-column mb-7 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">Search
                                        Community</label>
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                      height="2" rx="1"
                                                      transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                                <path
                                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <input wire:model="searchCommunity" type="text" class="form-control ps-14"
                                               placeholder="Search by zip code..."/>
                                    </div>
                                </div>

                                @if (!is_null($homeCommunity))
                                    <div class="d-flex flex-stack mb-10">
                                        <div class="me-5">
                                            <i class="fa fa-home text-success fs-2hx"></i>
                                        </div>
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1 me-2">
                                                <h5 class="fw-bold text-dark mb-0">{{ $homeCommunity->name }}</h5>
                                                <span
                                                    class="text-muted fw-semibold d-block fs-5">{{ $homeCommunity->members_count }}
                                                    {{ Str::plural('Follower', $homeCommunity->members_count) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if (!is_null($communities))
                                    @foreach ($communities as $community)
                                        <div class="d-flex flex-stack mb-10">
                                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                <div class="flex-grow-1 me-2">
                                                    <h5 class="fw-bold text-dark mb-0">{{ $community->name }}</h5>
                                                    <span
                                                        class="text-muted fw-semibold d-block fs-5">{{ $community->members_count }}
                                                        {{ Str::plural('Follower', $community->members_count) }}</span>
                                                </div>
                                                @if ($community->is_joined)
                                                    <button wire:click.prevent="leaveCommunity({{ $community->id }})"
                                                            class="btn btn-sm btn-danger fs-8 fw-bold">Leave
                                                    </button>
                                                @else
                                                    <button wire:click.prevent="followCommunity({{ $community->id }})"
                                                            class="btn btn-sm btn-primary fs-8 fw-bold">Follow
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="{{ $step === 6 ? 'current' : '' }}" data-kt-stepper-element="content">
                            <div class="w-100">
                                <div class="pb-10 pb-lg-15">
                                    <h2 class="fw-bold d-flex align-items-center text-dark">
                                        {{ GlobalHelper::getSettingValue('step_six_form_title') }}</h2>
                                    <div class="text-muted fw-semibold fs-6">
                                        {{ GlobalHelper::getSettingValue('step_six_form_subtitle') }}</div>
                                </div>
                                <div class="fv-row">
                                    <div class="row mb-10">
                                        <h2 class="fw-bold d-flex align-items-center text-dark">Seller Video</h2>
                                        <div class="col-lg-12">
                                            <video width="100%" height="240" controls>
                                                <source
                                                    src="{{ GlobalHelper::getSettingValue('step_six_seller_video') }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h2 class="fw-bold d-flex align-items-center text-dark">Buyer Video</h2>
                                        <div class="col-lg-12">
                                            <video width="100%" height="240" controls>
                                                <source
                                                    src="{{ GlobalHelper::getSettingValue('step_six_buyer_video') }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-stack pt-15">
                            <div class="mr-2">

                            </div>
                            <div>
                                <button type="button" wire:click="completed"
                                        class="btn btn-lg btn-primary {{ $step === 6 ? '' : 'd-none' }}">
                                    <span class="indicator-label">Completed
                                        <span class="svg-icon svg-icon-4 ms-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="18" y="13" width="13"
                                                      height="2" rx="1" transform="rotate(-180 18 13)"
                                                      fill="currentColor"/>
                                                <path
                                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                    fill="currentColor"/>
                                            </svg>
                                        </span>
                                    </span>
                                </button>

                                <button type="button" wire:click.prevent="nextStep" wire:loading.attr="disabled"
                                        class="btn btn-lg btn-primary {{ $step === 6 ? 'd-none' : '' }}">Continue
                                    <span class="svg-icon svg-icon-4 ms-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="18" y="13" width="13"
                                                  height="2" rx="1" transform="rotate(-180 18 13)"
                                                  fill="currentColor"/>
                                            <path
                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                fill="currentColor"/>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function () {
            $('#telephone').on('input', function () {
                const phone = $(this).val().replace(/\D/g, ''); // remove non-digits
                if (phone.length > 10) {
                    $(this).val(phone.substr(0, 10)); // limit to 10 digits
                }
            });
        });
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{config('map.google_map_api_key')}}&libraries=places&callback=Function.prototype"></script>
    @include('custom-scripts.autocomplete')
@endpush
