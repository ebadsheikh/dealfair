@extends('admin.layouts.master')
@section('title', 'Dealfair | Add Keyword')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Keywords</h1>
                    {{ Breadcrumbs::render('adminAddKeywordsPage') }}
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('admin.keywords.index') }}" class="btn btn-sm fw-bold btn-primary"><i
                            class="bi bi-arrow-left"></i>Go Back</a>
                </div>
            </div>
        </div>

        @livewire('admin.keywords.create-keyword')

    </div>
@endsection
