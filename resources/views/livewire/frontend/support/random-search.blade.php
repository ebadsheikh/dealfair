<div class="mb-10 mb-lg-20" id="home">
    <div class="landing-header landing-dark-bg" data-kt-sticky="true" data-kt-sticky-name="landing-header"
        data-kt-sticky-offset="{default: '200px', lg: '300px'}" style="animation-duration: 0.3s; top: 0;">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                @include('frontend.layouts.top-nav-logo')
                {{-- @include('frontend.layouts.top-nav-search') --}}
                {{--                @include('frontend.layouts.top-nav-actions') --}}
                <div class="d-lg-block" id="kt_header_nav_wrapper">
                    <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                        data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                        data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                        data-kt-swapper-mode="prepend"
                        data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                        <!--begin::Menu-->
                        <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold"
                            id="kt_landing_menu">
                            <!--begin::Menu item-->
                            <div class="menu-item">
                                @if (!GlobalHelper::getUser())
                                    <a href="{{ route('auth.signin') }}"
                                        class="menu-link nav-link active py-3 px-4 px-xxl-6" style="color: #bdbdbd;"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Sign
                                        In</a>
                                @else
                                    @if (GlobalHelper::getUser()->hasRole(\App\Enums\RolesEnum::CUSTOMER->value))
                                        @include('frontend.layouts.user-menu')
                                    @endif
                                @endif
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Landing hero-->
    <div class="bg-light">
        <div class="container ">
            <div class="row align-items-center h-lg-350px">
                <div class="col-md-6">
                    <div class="d-flex flex-column align-items-start justift-content-center flex-equal me-5">
                        <!--begin::Title-->
                        <h1 class="lh-base fw-bolder fs-2x fs-lg-3x text-black mb-5 mb-lg-10">Hi, How Can We Help You?
                        </h1>
                        <!--end::Title-->
                        <!--begin::Input group-->
                        <div class="input-group shadow mb-12">
                            <input id="searchTitle" type="text" wire:model="searchTitle"
                                placeholder="Ask us a question.." class="form-control form-control-lg p-5"
                                wire:keyup="searchTitle" name="searchTitle" autocomplete="off"/>
                            <span class="input-group-text btn btn-primary p-5" wire:click="searchAll"
                                id="basic-addon2"><i class="fas fa-search"></i></span>

                        </div>
                        @if (!empty($titleSearchResult) && $showTitleSuggestion)
                            <ul id="titleSearchResult" class="listing-title-ul">
                                @foreach ($titleSearchResult as $record)
                                    <li class="listing-title-li text-dark font-weight-bolder font-size-lg"
                                        wire:click.prevent="searchArticle('{{ $record }}')">{{ $record }}
                                        </li>
                                @endforeach
                            </ul>
                        @endif
                        <!--end::Input group-->
                        {{--                        <p>Common topics: <span><a href="#" class="text-dark" style="text-decoration: underline;"> --}}
                        {{--                                    Purchase code</a>,&nbsp;</span><span><a href="#" class="text-dark" --}}
                        {{--                                    style="text-decoration: underline;"> --}}
                        {{--                                    Stylesheet</a>,&nbsp;</span><span><a href="#" class="text-dark" --}}
                        {{--                                    style="text-decoration: underline;"> --}}
                        {{--                                    Invoice</a>,&nbsp;</span><span><a href="#" class="text-dark" --}}
                        {{--                                    style="text-decoration: underline;"> --}}
                        {{--                                    Item support</a>,&nbsp;</span><span><a href="#" class="text-dark" --}}
                        {{--                                    style="text-decoration: underline;"> --}}
                        {{--                                    Template Kits</a>&nbsp;</span></p> --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="flex-equal d-flex justify-content-center align-items-end ms-5">
                        <!--begin::Illustration-->
                        <img src="{{ asset('assets/media/support-banner.png') }}" alt=""
                            class="mw-100 mh-125px mh-lg-275px mb-lg-n12" />
                        <!--end::Illustration-->
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end::Landing hero-->
    <!--end::Wrapper-->
</div>
<!--begin::Row-->
<div class="container">
    <div class="row justify-content-center g-10 mb-8 mb-xl-12">
        <div class="col-md-4">
            <h3 class="mb-4">Type</h3>
            <div class="form-check form-check-custom form-check-solid mb-4">
                <input class="form-check-input" type="radio"  />
                <label class="form-check-label" for="flexRadioDefault">
                    All Types (81)
                </label>
                <input class="form-check-input" type="radio"  />
                <label class="form-check-label" for="flexRadioDefault">
                    Articles
                </label>
            </div>

        </div>
        <div class="col-md-8">
            <h3>82 results for "{{$title}}"</h3>
            {{-- @if ($searchData) --}}
                @foreach ($searchData as $data)
                    <ul>
                        <li>{{$data->title}}</li>
                         <li>{{$data->description}}</li>
                    </ul>
                @endforeach
            {{-- @endif --}}

        </div>
    </div>
</div>
