@extends('frontend.layouts.master')
@section('title', 'My Wishlist | Dealfair')
@section('content')
    <div id="home">
        <div style="background-color: #b9b9b9">
            <div class="min-h-150px py-5 px-2 d-flex align-items-center justify-content-center" >
                <div class="min-w-md-500px">
                    <div class="banner-txt text-uppercase text-center">My WishList</div>
                </div>
            </div>
        </div>
       @livewire('frontend.listing-wishlist.listing-wishlist-page')
    </div>
@endsection
