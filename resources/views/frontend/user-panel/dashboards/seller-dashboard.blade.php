@extends('frontend.user-panel.layouts.master')

@section('title', 'Seller Dashboard | Dealfair')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Seller Dashboard
                    </h1>
                    <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7 my-1">
                        <li class="breadcrumb-item text-gray-600">
                            <a href="{{ route('seller.dashboard') }}"
                               class="text-gray-600 text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-gray-600">Seller</li>
                    </ul>
                </div>

                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="#" class="btn fw-bold btn-primary">Button here</a>
                </div>

            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold px-3">
                    <li class="nav-item">
                        <a class="nav-link text-active-primary ms-0 me-5 me-md-10 pt-5 pb-2 active"
                           data-bs-toggle="tab"
                           href="#kt_tab_pane_1">My Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-primary ms-0 me-5 me-md-10 pt-5 pb-2"
                           data-bs-toggle="tab"
                           href="#kt_tab_pane_2">Sales Report</a>
                    </li>
                </ul>
                <div class="my-5">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                            <div class="bg-white rounded-4 p-4 p-md-8">
                                <div class="row gy-8 gx-lg-8 align-items-center">
                                    <div class="col-xl-8">
                                        <div class="card card-flush overflow-hidden shadow h-md-100">
                                            <div class="card-header py-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bold text-dark">Sales This Months</span>
                                                </h3>
                                            </div>
                                            <div class=" d-flex justify-content-between flex-column pb-1 px-0">
                                                <div class="px-9 mb-5">
                                                    <div class="d-flex mb-2">
                                                                <span
                                                                    class="fs-4 fw-semibold text-gray-400 me-1">$</span>
                                                        <span
                                                            class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">14,094</span>
                                                    </div>
                                                </div>
                                                <div id="kt_charts_widget_3" class="min-h-auto ps-4 pe-6"
                                                     style="height: 300px"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 h-xl-100 ">
                                        <div class="d-flex flex-column flex-md-row flex-xl-column gap-3">
                                            <div class="col-12 col-md-6 h-100 h-lg-auto col-xl-12">
                                                <div
                                                    class="border border-2 border-gray-200 rounded-4 card bgi-no-repeat card-xl-stretch mb-xl-8"
                                                    style="background-position: right top; background-size: 30% auto; background-image: url('{{asset('assets/media/svg/shapes/abstract-4.svg')}}')">
                                                    <div class="card-body">
                                                        <div>
                                                            <div class="fw-bolder fs-2">Account Balance</div>
                                                            <div
                                                                class="fs-2hx fw-bold text-gray-800 lh-1 ls-n2">
                                                                $ 14,094
                                                            </div>
                                                            <div class="text-muted df-fs-12 fw-semibold">In
                                                                Process
                                                                $14.92
                                                            </div>
                                                            <div class="d-block mt-5">
                                                                <button type="button" class="btn btn-primary">
                                                                    Withdraw
                                                                    Balance
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 h-100 h-lg-auto col-xl-12">
                                                <div
                                                    class="border border-2 border-gray-200 rounded-4 card bgi-no-repeat card-xl-stretch mb-xl-8"
                                                    style="background-position: right top; background-size: 30% auto; background-image: url('{{asset('assets/media/svg/shapes/abstract-3.svg')}}')">
                                                    <div class="card-body">
                                                        <div>
                                                            <div class="fw-bolder fs-2">Active Listings</div>
                                                            <div
                                                                class="fs-2hx fw-bold text-gray-800 lh-1 ls-n2">
                                                                7
                                                            </div>
                                                            <div class="text-muted df-fs-12 fw-semibold">5
                                                                Inactive Listings
                                                            </div>
                                                            <div class="d-block mt-5">
                                                                <button type="button" class="btn btn-primary">
                                                                    List more
                                                                    Items
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="fw-bolder fs-2 mb-4">Account Statistics</div>
                                    <div class="row g-5">
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                            <span
                                                                class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">$7,467.00</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Revenue</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                            <span
                                                                class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">$7,067.00</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Profit</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                            <span
                                                                class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">$7,067.00</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Items Listed</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                            <span
                                                                class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">55</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Completed Sales</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="fw-bolder fs-2 mb-4">Performance</div>
                                    <div class="row g-5">
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                                <span
                                                                    class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">$86.08/item</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">AOV</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                            <span
                                                                class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">$186.08/item</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">ALV</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                            <span
                                                                class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">55%</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">STR</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                            <span
                                                                class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">15%</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Search CTR</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                            <span
                                                                class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">$7,467.00</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Impressions</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                            <span
                                                                class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">$7,067.00</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Item Views</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                            <span
                                                                class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">$7,067.00</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Item Liked</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                            <span
                                                                class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">55</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Return Ratio</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                            <span
                                                                class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">0%</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Cancellations</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                            <span
                                                                class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">28.65 hours</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Shipping Time</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                            <span
                                                                class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">98%</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Response Rate</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-3 px-6 py-8">
                                                <div class="m-0">
                                                            <span
                                                                class="text-gray-700 fw-bolder d-block fs-2 lh-1 ls-n1 mb-2">4.98/5</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Seller Rating</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="kt_tab_pane_2" role="tabpanel">
                            <div class="bg-white rounded-4 p-4 p-md-8">
                                <div class="fw-bold fs-4 text-black">Sales Reports</div>
                                <div class="df-fs-14 text-black">You can generate your sales report by selecting a date
                                    range and what orders to include.
                                </div>
                                <div class="fw-bold fs-4 text-black mt-5">Data Range</div>
                                <form class="d-flex gap-4">
                                    <div>
                                        <label class="form-label">From</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div>
                                        <label for="inputEmail4" class="form-label">To</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </form>
                                <div class="fw-bold fs-4 text-black mt-8">Yearly Reports</div>
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                                        <thead>
                                        <tr class=" text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th>Document Name</th>
                                            <th>Tax Year</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                        <tr>
                                            <td>
                                                <span class="fw-bold"> 2022_sales_report.csv</span>
                                            </td>
                                            <td>
                                                <span class="fw-bold">2022</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="#ffffff" class="bi bi-download" viewBox="0 0 16 16">
                                                        <path
                                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                        <path
                                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                    </svg>
                                                    Download</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="fw-bold"> 2022_sales_report.csv</span>
                                            </td>
                                            <td>
                                                <span class="fw-bold">2022</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="#ffffff" class="bi bi-download" viewBox="0 0 16 16">
                                                        <path
                                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                        <path
                                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                    </svg>
                                                    Download</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="fw-bold"> 2022_sales_report.csv</span>
                                            </td>
                                            <td>
                                                <span class="fw-bold">2022</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="#ffffff" class="bi bi-download" viewBox="0 0 16 16">
                                                        <path
                                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                        <path
                                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                    </svg>
                                                    Download</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
@endpush
