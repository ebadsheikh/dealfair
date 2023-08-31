@extends('frontend.layouts.master')
@section('title', $listing->title.' | Dealfair')
@section('content')
    <div>
        <div class="container p-lg-0 my-5">
            <div class="bg-secondary rounded px-5 py-2">
                {{ Breadcrumbs::render('frontendListingDetailsPage', $listing) }}
            </div>
        </div>
        @livewire('frontend.listing.listing-details',['listing' => $listing])
        <div class="container mb-6 p-lg-0">
            <div class="custom-box-shadow bg-white rounded-4 p-4 p-md-8">
                <div class="text-center my-8" style="font-size: 20px; font-weight: 800;">Ratings & Reviews
                    of {{$listing->title}}</div>
                <div class="row mt-8">
                    <div class="col-md-3 pb-8">
                        <div class="d-flex flex-column text-center">
                            <div class="mb-4">
                                <div class="shadow rounded-3 p-2">
                                    <div class="d-flex align-items-baseline justify-content-center gap-5">
                                        <h6>5 Star</h6>
                                        <div>
                                            <span class="fa fa-star star-active mx-1"></span>
                                            <span class="fa fa-star star-active mx-1"></span>
                                            <span class="fa fa-star star-active mx-1"></span>
                                            <span class="fa fa-star star-active mx-1"></span>
                                            <span class="fa fa-star star-active mx-1"></span>
                                        </div>
                                        <h6>123</h6>
                                    </div>
                                    <div class="d-flex align-items-baseline justify-content-center gap-5">
                                        <h6>4 Star</h6>
                                        <div>
                                            <span class="fa fa-star star-active mx-1"></span>
                                            <span class="fa fa-star star-active mx-1"></span>
                                            <span class="fa fa-star star-active mx-1"></span>
                                            <span class="fa fa-star star-active mx-1"></span>
                                            <span class="fa fa-star star-inactive mx-1"></span>
                                        </div>
                                        <h6>123</h6>
                                    </div>
                                    <div class="d-flex align-items-baseline justify-content-center gap-5">
                                        <h6>3 Star</h6>
                                        <div>
                                            <span class="fa fa-star star-active mx-1"></span>
                                            <span class="fa fa-star star-active mx-1"></span>
                                            <span class="fa fa-star star-active mx-1"></span>
                                            <span class="fa fa-star star-inactive mx-1"></span>
                                            <span class="fa fa-star star-inactive mx-1"></span>
                                        </div>
                                        <h6>123</h6>
                                    </div>
                                    <div class="d-flex align-items-baseline justify-content-center gap-5">
                                        <h6>2 Star</h6>
                                        <div>
                                            <span class="fa fa-star star-active mx-1"></span>
                                            <span class="fa fa-star star-active mx-1"></span>
                                            <span class="fa fa-star star-inactive mx-1"></span>
                                            <span class="fa fa-star star-inactive mx-1"></span>
                                            <span class="fa fa-star star-inactive mx-1"></span>
                                        </div>
                                        <h6>123</h6>
                                    </div>
                                    <div class="d-flex align-items-baseline justify-content-center gap-5">
                                        <h6>1 Star</h6>
                                        <div>
                                            <span class="fa fa-star star-active mx-1"></span>
                                            <span class="fa fa-star star-inactive mx-1"></span>
                                            <span class="fa fa-star star-inactive mx-1"></span>
                                            <span class="fa fa-star star-inactive mx-1"></span>
                                            <span class="fa fa-star star-inactive mx-1"></span>
                                        </div>
                                        <h6>123</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-box">
                                <h1 class="pt-4 text-white">4.0</h1>
                                <p class="text-white">out of 5</p>
                            </div>
                            <div class="mt-2">
                                <span class="fa fa-star star-active mx-1"></span>
                                <span class="fa fa-star star-active mx-1"></span>
                                <span class="fa fa-star star-active mx-1"></span>
                                <span class="fa fa-star star-active mx-1"></span>
                                <span class="fa fa-star star-inactive mx-1"></span>
                            </div>
                            <small class="text-center">1034 Ratings</small>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="mt-8">
                            <div class="d-flex align-items-start pe-2">
                                <div class="symbol symbol-35px symbol-circle me-3">
                                    <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt=""/>
                                </div>
                                <div>
                                    <a href="../../demo1/dist/pages/profile/overview.html">
                                        <p class="fw-bolder fs-5 text-dark mb-0">Chris Morgan</p>
                                    </a>
                                    <div class="d-flex gap-2">
                                        <div class="fa fa-star star-active"></div>
                                        <div class="fa fa-star star-active"></div>
                                        <div class="fa fa-star star-inactive"></div>
                                        <div class="fa fa-star star-inactive"></div>
                                        <div class="fa fa-star star-inactive"></div>
                                    </div>
                                    <p class="my-3 fs-6">Purchaced to use for laundry and it works great for that. I am
                                        buying
                                        another
                                        to use to keep throw blankets in to keep them for easy access and to look nice
                                        at the
                                        same
                                        time.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
