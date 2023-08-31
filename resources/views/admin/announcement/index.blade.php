@extends('admin.layouts.master')

@section('title', 'Announcements')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Announcements</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a class="text-muted text-hover-primary">Announcements</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="card card-p-0 card-flush">
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <div class="card-title">
                                <div class="d-flex align-items-center position-relative my-1">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                fill="currentColor" />
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <input type="text" data-kt-filter="search"
                                        class="form-control form-control-solid w-250px ps-15" placeholder="Search Announcements" />
                                </div>
                                <div id="kt_datatable_example_1_export" class="d-none"></div>
                            </div>
                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                <a href="{{Route('admin.announcement.create')}}" type="button" class="btn btn-primary" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                    </span>Add New Announcement</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table align-middle border rounded table-row-dashed fs-6 g-5"
                                id="kt_datatable_example">
                                <thead>
                                    <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                                        <th class="text-center min-w-50px">#</th>
                                        <th class="text-center min-w-100px">Title</th>
                                        <th class="text-center min-w-100px">Show Alert</th>
                                        <th class="text-center min-w-100px">Start Date</th>
                                        <th class="text-center min-w-100px">End Date</th>
                                        <th class="text-center min-w-200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($announcements as $key => $announcement)
                                    <tr class="text-center">
                                        <td class="text-dark">{{ $key+1 }}</td>
                                        <td class="text-dark">{{ $announcement->title }}</td>
                                        <td class="text-dark">{{ $announcement->alert }}</td>
                                        <td class="text-dark">{{ $announcement->start_date }}</td>
                                        <td class="text-dark">{{ $announcement->end_date }}</td>
                                        <td class="text-dark">
                                                <x-action-button id="{{$announcement->id}}" editUrl="{{Route('admin.announcement.edit', $announcement->id)}}" deleteUrl="{{Route('admin.announcement.delete', $announcement->id)}}"/>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
