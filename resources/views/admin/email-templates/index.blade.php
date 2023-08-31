@extends('admin.layouts.master')

@section('title', 'Dealfair | Email Templates')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Email
                        Templates</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a class="text-muted text-hover-primary">Email Templates</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{route('admin.email-templates.create')}}" class="btn fw-bold btn-primary">Add Email Template</a>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="accordion">
                    @foreach($emailTemplates as $key => $emailTemplate)
                        <div class="accordion-item">
                            <div class="accordion-header d-flex justify-content-between">
                                <div class="d-flex align-items-center px-3">
                                    <i class="fa-solid fa-envelope-circle-check fs-2tx me-3"></i>
                                    <div class="page-title d-flex flex-column justify-content-center flex-wrap">
                                        <h3 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                            {{$emailTemplate->name}}</h3>
                                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                            <li class="breadcrumb-item text-muted">
                                                <span class="text-muted">{{$emailTemplate->subject}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a href="{{route('admin.email-templates.edit', $emailTemplate->key)}}"
                                           class="btn btn-icon btn-success btn-sm mr-2"><i
                                                class="bi bi-pencil fs-4"></i></a>
                                    </div>
                                    <button class="accordion-button fs-4 fw-semibold collapsed"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#kt_accordion_1_body_1_{{$key + 1}}"
                                            aria-expanded="false">
                                    </button>
                                </div>
                            </div>
                            <div id="kt_accordion_1_body_1_{{$key + 1}}"
                                 class="accordion-collapse collapse">
                                <div class="accordion-body border">
                                    <div class="p-4 mx-auto d-flex justify-content-center text-start"
                                         style="width:50%;">
                                        <div>
                                           {!! $emailTemplate->content !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
