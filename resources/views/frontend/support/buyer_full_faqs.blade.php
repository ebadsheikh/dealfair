@extends('frontend.layouts.master')
@section('content')
    @livewire('frontend.support.buyer-faq',['articleCategory' => $articleCategory])
@endsection
