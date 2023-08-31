@php
    use App\Enums\MediaDirectoryNamesEnum;
@endphp

@extends('frontend.layouts.master')
@section('title','All Stores | Dealfair')
@section('content')
    <div style="background-color: #b9b9b9">
        <div class="min-h-150px py-5 px-2 d-flex align-items-center justify-content-center" >
            <div class="min-w-md-500px">
                <div class="banner-txt text-uppercase text-center">All Stores</div>
            </div>
        </div>
    </div>
    <div class="container my-5 my-md-12" >
        <div class="row g-3 g-md-4">
            @foreach($stores as $store)
                <div class="col-6 col-md-2">
                    <div class="card" style="border: 2px solid #f6f6f6">
                        <div class="h-100px h-lg-100px min-h-100px min-h-lg-150px bg-gray-200 rounded-2">
                            <img class="store-cover-image" src="{{$store->getFirstMediaUrl(MediaDirectoryNamesEnum::STORE_THUMBNAIL->value) ? $store->getFirstMediaUrl(MediaDirectoryNamesEnum::STORE_THUMBNAIL->value) : asset('assets/media/svg/files/blank-image.svg')}}">
                        </div>
                        <div class="pt-1 pb-3 px-3 lh-lg">
                            <div class=" d-flex justify-content-center" style="margin-top: -21px;">
                                <div class="brand-logo position-relative bg-white">
                                    <img src="{{ $store->getFirstMediaUrl(MediaDirectoryNamesEnum::STORE_LOGO->value) ? $store->getFirstMediaUrl(MediaDirectoryNamesEnum::STORE_LOGO->value) : asset('assets/media/svg/files/blank-image.svg') }}" alt=""/>
                                    <div class="position-absolute" style="bottom: -4px; right: 0;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                             fill="#5D6EB3" class="bi bi-check-circle-fill"
                                             viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="product-title text-center my-2">
                                <a href="{{route('store.details',$store->slug)}}" class="text-dark fw-bolder" style="font-size: 15px;">{{$store->store_name}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
