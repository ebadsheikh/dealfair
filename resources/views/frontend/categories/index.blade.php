@php
    use App\Enums\MediaDirectoryNamesEnum;
@endphp
@extends('frontend.layouts.master')
@section('title', 'All Categories | Dealfair')
@section('content')
    <div id="home">
        <div style="background-color: #efefef">
            <div class="min-h-150px min-h-lg-250px py-5 px-2 d-flex align-items-center justify-content-center">
                <div class="min-w-md-500px">
                    <div class="banner-txt text-uppercase text-center">Shop By Category</div>
                </div>
            </div>
        </div>
        <div class="container dealfair-category-home mb-10">
            <div class="row flex-nowrap flex-lg-wrap gap-3 justify-content-lg-center">
                @foreach($categories as $category)
                    <div class="col-4 col-md-2">
                        <a href="{{route('category.details',$category->slug)}}">
                            <div class="h-100 align-items-center row bg-white px-2 py-2 border border-2 rounded-3">
                                <div class=" d-flex justify-content-center">
                                    <img class="w-50px w-lg-70px h-auto object-contain"
                                         src="{{ $category->image_url }}"
                                         onerror="this.onerror=null;this.src='{{asset('assets/media/svg/files/blank-image.svg') }}';"
                                         alt="{{$category->name}}">
                                </div>
                                <div
                                    class="text-center text-black fw-semibold df-fs-12 text-wrap mt-2">{{$category->name}}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
