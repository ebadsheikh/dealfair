<div class="mb-10 mb-lg-20" id="home">
    <div class="bgi-no-repeat bgi-size-cover bgi-position-x-center landing-dark-bg">
        <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
            data-kt-sticky-offset="{default: '200px', lg: '300px'}">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    @include('frontend.layouts.top-nav-logo')
                    {{-- @include('frontend.layouts.top-nav-search') --}}
                    @include('frontend.layouts.top-nav-actions')
                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Landing hero-->
        <div class="container">
            <div class="card-body flex-column p-5">
                <!--begin::Hero content-->
                <div class="d-flex align-items-center h-lg-300px p-5 p-lg-15">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column align-items-start justift-content-center flex-equal me-5">
                        <!--begin::Title-->
                        <h1 class="fw-bold fs-4 fs-lg-1 text-white text-white-800 mb-5 mb-lg-10">How Can We Help You?
                        </h1>
                        <!--end::Title-->
                        <!--begin::Input group-->
                        <div class="position-relative w-100">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span
                                class="svg-icon svg-icon-2 svg-icon-primary position-absolute top-50 translate-middle ms-8">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text"
                                class="form-control fs-4 py-4 ps-14 text-gray-700 placeholder-gray-400 mw-500px"
                                name="search" wire:model="search" value="" placeholder="Ask a question" />
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Wrapper-->
                    <div class="flex-equal d-flex justify-content-center align-items-end ms-5">
                        <!--begin::Illustration-->
                        <img src="assets/media/illustrations/sketchy-1/4.png" alt=""
                            class="mw-100 mh-125px mh-lg-275px mb-lg-n12" />
                        <!--end::Illustration-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Hero content-->
            </div>
        </div>
        <!--end::Landing hero-->
    </div>
    <!--end::Wrapper-->
</div>
<!--begin::Row-->
<div class="container">
    <div class="row justify-content-lg-start gy-0 mb-6 mb-xl-12">
        <!--begin::Col-->
        <div class="col-md-12 ">
            <!--begin::Card-->
            <div class="card card-md-stretch ms-xl-3">
                <!--begin::Body-->
                <div class="card-body p-10 p-lg-15">
                    <!--begin::Header-->
                    <div class="d-flex flex-stack mb-10">
                        <!--begin::Title-->
                        <h1 class="fw-bold text-dark">Seller FAQs</h1>
                        <!--end::Title-->

                    </div>
                    <!--end::Header-->
                    <!--begin::Accordion-->
                    @foreach ($seller_faqs as $key => $seller_faq)
                    <div class="m-4">
                        <!--begin::Heading-->
                        <div class="d-flex align-items-center py-3 toggle mb-0">
                            <!--begin::Icon-->
                            <div class="ms-n1 me-5">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon toggle-on svg-icon-primary svg-icon-2">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                                        class="bi bi-play-fill" viewBox="0 0 16 16">
                                        <path
                                            d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                                <span class="svg-icon toggle-off svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                                        class="bi bi-play-fill" viewBox="0 0 16 16">
                                        <path
                                            d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Icon-->
                            <!--begin::Section-->
                            <div class="d-flex align-items-center flex-wrap">
                                <!--begin::Title-->
                                <a href="{{route('support.singlefaqs')}}"
                                    class="h3 text-gray-800 fw-bold cursor-pointer me-3 mb-0 ">{{ $seller_faq->question
                                    }}
                                </a>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Heading-->
                    </div>
                    @endforeach

                    <!--end::Body-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->

    </div>
</div>
<!--end::Row-->