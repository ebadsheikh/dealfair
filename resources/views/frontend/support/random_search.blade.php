@extends('frontend.layouts.master')
@section('content')
@section('styles')

@endsection
@livewire('frontend.support.random-search',['searchData' => $searchData,'title' => $title])
@endsection

@section('scripts')
@endsection
