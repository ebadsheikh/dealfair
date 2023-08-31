@extends('admin.layouts.master')

@section('title', 'FAQ')

@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        FAQ's</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.topics.index') }}" class="text-muted text-hover-primary">Faq Topics</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a class="text-muted text-hover-primary">Faqs</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Secondary button-->
                    <a href="{{ Route('admin.faqs.add.buyer.faq', $topic_id) }}" class="btn btn-sm fw-bold btn-primary">Add
                        Buyer</a>
                    <!--end::Secondary button-->
                    <!--begin::Primary button-->
                    <a href="{{ Route('admin.faqs.add.seller.faq', $topic_id) }}" class="btn btn-sm fw-bold btn-primary">Add
                        Seller</a>
                    <!--end::Primary button-->
                    <!--begin::Primary button-->
                    <a href="{{ route('admin.topics.index') }}" class="btn btn-sm fw-bold btn-info">Topics</a>
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="card card-p-0 card-flush">

                        <div class="card-body">
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                <!--begin::Nav item-->
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab"
                                        href="#buyer">Buyer</a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5 " data-bs-toggle="tab"
                                        href="#seller">Seller</a>
                                </li>
                                <!--end::Nav item-->

                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="buyer" role="tabpanel">
                                    <!--begin::Basic info-->
                                    <div class="card mb-5 mb-xl-10">
                                        <!--begin::Content-->
                                        <div id="kt_account_settings_profile_details" class="collapse show">
                                            <!--begin::Form-->

                                            <!--begin::Card body-->
                                            <div class="card-body border-top pt-5">
                                                @foreach ($buyer_faqs as $buyer_faq)
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="accordion mb-5" id="kt_accordion_1">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="kt_accordion_1_header_1">
                                                                        <button
                                                                            class="accordion-button fs-4 fw-semibold collapsed"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#kt_accordion_1_body_{{ $buyer_faq->id }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="kt_accordion_1_body_{{ $buyer_faq->id }}">
                                                                            &nbsp; Question: {{ $buyer_faq->question }}
                                                                        </button>
                                                                    </h2>
                                                                    <div id="kt_accordion_1_body_{{ $buyer_faq->id }}"
                                                                        class="accordion-collapse collapse "
                                                                        aria-labelledby="kt_accordion_1_header_1"
                                                                        data-bs-parent="#kt_accordion_1">
                                                                        <div class="accordion-body">
                                                                            <b>Answer :</b> {!! $buyer_faq->answer !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 mt-4">
                                                            <a href="{{ Route('admin.faqs.edit', $buyer_faq->id) }}"
                                                                class="btn btn-icon btn-success btn-sm mr-2"><i
                                                                    class="bi bi-pencil fs-4"></i></a>
                                                            <a class="btn btn-icon btn-danger btn-sm mr-2"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#kt_modal_{{ $buyer_faq->id }}"><i
                                                                    class="bi bi-trash fs-4"></i></a>

                                                        </div>

                                                    </div>
                                                    <div class="modal fade" tabindex="-1"
                                                        id="kt_modal_{{ $buyer_faq->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title">Delete Item</h3>

                                                                    <!--begin::Close-->
                                                                    <div class="btn btn-icon btn-sm btn-active-primary ms-2"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span class="svg-icon svg-icon-1"></span>
                                                                    </div>
                                                                    <!--end::Close-->
                                                                </div>

                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete ?</p>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <a href="{{ Route('admin.faqs.destroy', $buyer_faq->id) }}"
                                                                        type="button" class="btn btn-danger">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!--end::Card body-->

                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Basic info-->
                                </div>
                                <div class="tab-pane fade" id="seller" role="tabpanel">
                                    <!--begin::Basic info-->
                                    <div class="card mb-5 mb-xl-10">
                                        <!--begin::Card header-->
                                        <div id="kt_account_settings_profile_details" class="collapse show">
                                            <!--begin::Form-->
                                            <!--begin::Card body-->
                                            <div class="card-body border-top pt-5">
                                                @foreach ($seller_faqs as $seller_faq)
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="accordion mb-5" id="kt_accordion_1">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="kt_accordion_1_header_1">
                                                                        <button
                                                                            class="accordion-button fs-4 fw-semibold collapsed"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#kt_accordion_1_body_{{ $seller_faq->id }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="kt_accordion_1_body_{{ $seller_faq->id }}">
                                                                            &nbsp; Question: {{ $seller_faq->question }}
                                                                        </button>
                                                                    </h2>
                                                                    <div id="kt_accordion_1_body_{{ $seller_faq->id }}"
                                                                        class="accordion-collapse collapse "
                                                                        aria-labelledby="kt_accordion_1_header_1"
                                                                        data-bs-parent="#kt_accordion_1">
                                                                        <div class="accordion-body">
                                                                            <b>Answer :</b> {!! $seller_faq->answer !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 mt-4">
                                                            <a href="{{ Route('admin.faqs.edit', $seller_faq->id) }}"
                                                                class="btn btn-icon btn-success btn-sm mr-2"><i
                                                                    class="bi bi-pencil fs-4"></i></a>
                                                            <a class="btn btn-icon btn-danger btn-sm mr-2"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#kt_modal_{{ $seller_faq->id }}"><i
                                                                    class="bi bi-trash fs-4"></i></a>

                                                        </div>

                                                    </div>
                                                    <div class="modal fade" tabindex="-1"
                                                        id="kt_modal_{{ $seller_faq->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title">Delete Item</h3>

                                                                    <!--begin::Close-->
                                                                    <div class="btn btn-icon btn-sm btn-active-primary ms-2"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span class="svg-icon svg-icon-1"></span>
                                                                    </div>
                                                                    <!--end::Close-->
                                                                </div>

                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete ?</p>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <a href="{{ Route('admin.faqs.destroy', $seller_faq->id) }}"
                                                                        type="button" class="btn btn-danger">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Basic info-->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end::Row-->

                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
@endsection
