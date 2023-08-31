@extends('frontend.layouts.master')
@section('title', $store->store_name . ' | Dealfair')
@section('content')
    @livewire('frontend.store.store-detail',['storeSlug' => $store->slug])
@endsection
