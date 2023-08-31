@extends('frontend.layouts.master')
@section('content')
@section('styles')
<style>
    .ckeditor-container img {
        max-width: 100%;
        height: auto;
    }
    .article-image img {
        max-width: 100%; /* Limit the width to the container */
        height: auto; /* Maintain the aspect ratio */
    }
</style>
@endsection
@livewire('frontend.support.single-faq', ['articleId' => $article->id])

@endsection
@section('scripts')
    <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
@endsection
