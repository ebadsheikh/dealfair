@php
    use App\Enums\MediaDirectoryNamesEnum;
@endphp
@extends('frontend.layouts.master')
@section('title', $parentCategory->name.' | Dealfair')
@section('content')
    <div id="home">
        <div class="container bgi-size-cover bgi-position-center rounded-4 mt-5"
             style="background-image: url('{{asset('assets/media/DealfairBanner-09.jpg')}}')">
            <div class="min-h-150px min-h-lg-250px py-5 px-2 d-flex align-items-center justify-content-center">
                <div class="min-w-md-500px">
                    <div class="text-center"
                         style="font-weight: 800; color: white; font-size: 1.75rem; letter-spacing: 1px;">Find Best
                        Women's Coats <br> Jackets & Vests
                    </div>
                </div>
            </div>
        </div>

        @if(count($childCategories) > 0)
            <div class="container mt-5 mt-lg-8">
                <div class="owl-carousel-wrapper">
                    <div class="owl-carousel carousel-category owl-theme">
                        @foreach($childCategories as $childCategory)
                            <div class="item">
                                <a href="{{route('category.details',$childCategory->slug)}}">
                                    <div
                                        class="h-100 align-items-center row bg-white px-2 py-2 border border-2 rounded-3">
                                        <div class=" d-flex justify-content-center">
                                            <img
                                                class="w-50px w-lg-70px h-auto object-contain"
                                                src="{{ $childCategory->image_url }}"
                                                onerror="this.onerror=null;this.src='{{asset('assets/media/svg/files/blank-image.svg') }}';"
                                                alt="{{$childCategory->name}}">
                                        </div>
                                        <div
                                            class="text-center text-black fw-semibold df-fs-12 text-wrap mt-2">{{$childCategory->name}}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <div class="container p-lg-0 my-5">
            <div class="bg-secondary rounded px-5 py-2">
                {{ Breadcrumbs::render('frontendCategoryDetailsPage', $parentCategory) }}
            </div>
        </div>
        <div class="container my-5">
            <div class="row g-2 g-lg-3 g-xl-5">
                @livewire('frontend.listing.listing-filter-siderbar')
                @livewire('frontend.listing.listing-list',['categorySlug' => $parentCategory->slug])
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/owl-carousel/owl.carousel.js')}}"></script>
    <script src="{{asset('assets/js/home-page-carousel.js')}}"></script>
@endpush
