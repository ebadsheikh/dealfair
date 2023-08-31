@extends('admin.layouts.master')

@section('title', 'Tickets')

@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Tickets</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a class="text-muted text-hover-primary">Ticket View</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('admin.tickets.index') }}" class="btn btn-sm fw-bold btn-primary"><i class="bi bi-arrow-left"></i>Go Back</a>
                </div>
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row">
{{--                    @role('superadmin')--}}
                    <div class="col-3">
                        <!--begin::Status-->
                        <div class="card card-flush">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Status</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="rounded-circle
                                              {{ $ticket->status === 'pending' ? 'bg-primary' :
                                              ($ticket->status === 'active' ? 'bg-success' :
                                              ($ticket->status === 'inprogress' ? 'bg-info' :
                                              ($ticket->status === 'hold' ? 'bg-warning' :
                                              'bg-danger'))) }}
                                              w-15px h-15px">
                                    </div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <span class="btn-group w-100">\
                                    @can('Update Ticket Status')
                                    <button type="button"
                                             class="btn btn-sm {{ $ticket->status === 'pending' ? 'btn-primary' :
                                                                  ($ticket->status === 'active' ? 'btn-success' :
                                                                  ($ticket->status === 'inprogress' ? 'btn-info' :
                                                                  ($ticket->status === 'hold' ? 'btn-warning' :
                                                                  'btn-danger'))) }} dropdown-toggle"
                                             data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         {{ ucfirst($ticket->status) }}
                                     </button>
                                    @else
                                     <button type="button"
                                             class="btn btn-sm {{ $ticket->status === 'pending' ? 'btn-primary' :
                                                                  ($ticket->status === 'active' ? 'btn-success' :
                                                                  ($ticket->status === 'inprogress' ? 'btn-info' :
                                                                  ($ticket->status === 'hold' ? 'btn-warning' :
                                                                  'btn-danger'))) }} dropdown-toggle"
                                             data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                                         {{ ucfirst($ticket->status) }}
                                     </button>
                                    @endcan

                                     <div class="dropdown-menu w-100">
                                         <a class="dropdown-item"
                                            href="{{ route('admin.tickets.change-status', [$ticket->id, \App\Enums\TicketStatusEnum::PENDING->value]) }}">{{ ucfirst(\App\Enums\TicketStatusEnum::PENDING->value) }}</a>
                                         <a class="dropdown-item"
                                            href="{{ route('admin.tickets.change-status', [$ticket->id, \App\Enums\TicketStatusEnum::ACTIVE->value]) }}">{{ ucfirst(\App\Enums\TicketStatusEnum::ACTIVE->value) }}</a>
                                         <a class="dropdown-item"
                                            href="{{ route('admin.tickets.change-status', [$ticket->id, \App\Enums\TicketStatusEnum::INPROGRESS->value]) }}">{{ ucfirst(\App\Enums\TicketStatusEnum::INPROGRESS->value) }}</a>
                                         <a class="dropdown-item"
                                            href="{{ route('admin.tickets.change-status', [$ticket->id, \App\Enums\TicketStatusEnum::HOLD->value]) }}">{{ ucfirst(\App\Enums\TicketStatusEnum::HOLD->value) }}</a>
                                         <a class="dropdown-item"
                                            href="{{ route('admin.tickets.change-status', [$ticket->id, \App\Enums\TicketStatusEnum::CLOSED->value]) }}">{{ ucfirst(\App\Enums\TicketStatusEnum::CLOSED->value) }}</a>
                                     </div>
                                 </span>
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the Ticket status.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Status-->
                        @can('Change Assignee')
                        <!--begin::assignee-->
                        <div class="card card-flush py-4 mt-5">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Assignee</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <form action="{{ route('admin.tickets.change-assignee', [$ticket->id]) }}" method="POST">
                                    @csrf
                                    <!--begin::Select2-->
                                    <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an assignee" name="assignee">
                                        <option></option>
                                        @foreach ($staffUsers as $user)
                                            <option value="{{ $user->id}}"{{ $user->id === $ticket->assignee ? 'selected' : ''}}>{{ $user->full_name }}</option>
                                        @endforeach
                                    </select>
                                    <div>
                                        <button type="submit" class="btn btn-primary p-2 mt-3" style="float: right">Assign</button>
                                    </div>
                                    <!--end::Select2-->
                                </form>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::assignee-->
                        @endcan
                        <!--begin::Card-->
                        <div class="card mb-5 mt-5 mb-xl-8">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Details toggle-->
                                <div class="d-flex flex-stack fs-4">
                                    <div class="fw-bold">Ticket Information</div>
                                </div>
                                <!--end::Details toggle-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--begin::Details content-->
                                <div class="pb-5 fs-6">
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Ticket No.</div>
                                    <div class="text-gray-600">{{ $ticket->ticket_number }}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Submitted</div>
                                    <div class="text-gray-600">
                                        {{ \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }}
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">User Name</div>
                                    <div class="text-gray-600">{{ $ticket->user->full_name }}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Email</div>
                                    <div class="text-gray-600">{{ $ticket->user->email }}</div>
                                    <!--begin::Details item-->
                                </div>
                                <!--end::Details content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
{{--                    @endrole--}}
                    <div class="col-9">
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid ">
                            <!--begin::Messenger-->
                            <div class="card" id="kt_chat_messenger">
                                <!--begin::Card header-->
                                <div class="card-header" id="kt_chat_messenger_header">
                                    <!--begin::Title-->
                                    <div class="card-title">
                                        <!--begin::User-->
                                        <div class="d-flex justify-content-center flex-column me-3">
                                            @if ($ticket->user_id == Auth::user()->id)
                                                <a href="#"
                                                   class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{ $ticket->subject }}</a>
                                            @else
                                                <a href="#"
                                                   class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{ $ticket->subject }}</a>
                                            @endif

                                            <!--begin::Info-->
                                            <div class="mb-0 lh-1">
                                                <span class="badge  {{ $ticket->status === 'pending' ? 'badge-primary' :
                                              ($ticket->status === 'active' ? 'badge-success' :
                                              ($ticket->status === 'inprogress' ? 'badge-info' :
                                              ($ticket->status === 'hold' ? 'badge-warning' :
                                              'badge-danger'))) }}   badge-circle w-10px h-10px me-1"></span>
                                                <span class="fs-7 fw-semibold text-muted">{{ ucwords($ticket->status) }}</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body" id="kt_chat_messenger_body">

                                    <!--begin::Messages-->
                                    <div class="scroll-y me-n5 pe-5" data-kt-element="messages"
                                         data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                         data-kt-scroll-max-height="80vh"
                                         data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_app_toolbar, #kt_toolbar, #kt_footer, #kt_app_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer"
                                         data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_messenger_body"
                                         data-kt-scroll-offset="5px" id="my-scrollable-card">
                                        <!--begin::Message(in)-->
                                        @if ($ticket->user_id != Auth::user()->id)
                                            <!--begin::Message(in)-->
                                            <div class="d-flex justify-content-start mb-10">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-column align-items-start">
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center mb-2">
                                                        <!--begin::Avatar-->
                                                        @if ($ticket->user->getFirstMediaUrl('user_image'))
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic"
                                                                     src="{{ asset($ticket->user->getFirstMediaUrl('user_image')) }}" />
                                                            </div>
                                                        @else
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic"
                                                                     src="{{ asset('assets/media/avatars/blank.png') }}" />
                                                            </div>
                                                        @endif
                                                        <!--end::Avatar-->
                                                        <!--begin::Details-->
                                                        <div class="ms-3">
                                                            <a href="#"
                                                               class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">{{ $ticket->user->full_name }}</a>
                                                            <span
                                                                class="text-muted fs-7 mb-1">{{ \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }}</span>
                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Text-->
                                                    <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                                         data-kt-element="message-text">{!! $ticket->description !!}</div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                        @else
                                            <!--begin::Message(out)-->
                                            <div class="d-flex justify-content-end mb-10">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-column align-items-end">
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center mb-2">
                                                        <!--begin::Details-->
                                                        <div class="me-3">
                                                    <span
                                                        class="text-muted fs-7 mb-1">{{ \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }}</span>
                                                            <a href="#"
                                                               class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Avatar-->
                                                        @if ($ticket->user->getFirstMediaUrl('user_image'))
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic"
                                                                     src="{{ asset($ticket->user->getFirstMediaUrl('user_image')) }}" />
                                                            </div>
                                                        @else
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic"
                                                                     src="{{ asset('assets/media/avatars/blank.png') }}" />
                                                            </div>
                                                        @endif

                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Text-->
                                                    <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                                         data-kt-element="message-text">{!! $ticket->description !!}</div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Message(out)-->
                                        @endif
                                        @foreach ($ticket->ticketsReply as $ticketreply)
                                            @if ($ticketreply->user_id ? ($ticketreply->user_id != Auth::user()->id) : ($ticketreply->staff_id != Auth::user()->id))
                                                <!--begin::Message(in)-->
                                                <div class="d-flex justify-content-start mb-10">
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex flex-column align-items-start">
                                                        <!--begin::User-->
                                                        <div class="d-flex align-items-center mb-2">
                                                            <!--begin::Avatar-->
                                                            @if ($ticketreply->user ? $ticketreply->user->getFirstMediaUrl('user_image') : $ticketreply->staff->getFirstMediaUrl('user_image'))
                                                                <div class="symbol symbol-35px symbol-circle">
                                                                    <img alt="Pic"
                                                                         src="{{ asset($ticketreply->user ? $ticketreply->user->getFirstMediaUrl('user_image') : $ticketreply->staff->getFirstMediaUrl('user_image')) }}" />
                                                                </div>
                                                            @else
                                                                <div class="symbol symbol-35px symbol-circle">
                                                                    <img alt="Pic"
                                                                         src="{{ asset('assets/media/avatars/blank.png') }}" />
                                                                </div>
                                                            @endif

                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-3">
                                                                <a href="#"
                                                                   class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">{{ $ticketreply->user ? $ticketreply->user->full_name : $ticketreply->staff->full_name }}</a>
                                                                <span
                                                                    class="text-muted fs-7 mb-1">{{ \Carbon\Carbon::parse($ticketreply->created_at)->diffForHumans() }}</span>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::User-->
                                                        <!--begin::Text-->
                                                        <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                                             data-kt-element="message-text">{{ $ticketreply->description }}</div>
                                                        @if ($ticketreply->getFirstMediaUrl('ticketreply_image'))
                                                            @if (strpos($ticketreply->getFirstMedia('ticketreply_image')->mime_type, 'image') === 0)
                                                                <div class="m-5">
                                                                    <img alt="Pic"
                                                                         src="{{ asset($ticketreply->getFirstMediaUrl('ticketreply_image')) }}"
                                                                         height="80" width="80" />
                                                                </div>
                                                            @else
                                                                <a href="{{ $ticketreply->getFirstMediaUrl('ticketreply_image') }}"
                                                                   target="_blank"><i class="fa fa-file"></i>
                                                                    <span
                                                                        style="font-weight: bold;">{{ $ticketreply->getFirstMedia('ticketreply_image')->file_name }}</span>
                                                                </a>
                                                            @endif
                                                        @endif
                                                        <!--end::Text-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                            @else
                                                <!--begin::Message(out)-->
                                                <div class="d-flex justify-content-end mb-10">
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex flex-column align-items-end">
                                                        <!--begin::User-->
                                                        <div class="d-flex align-items-center mb-2">
                                                            <!--begin::Details-->
                                                            <div class="me-3">
                                                        <span
                                                            class="text-muted fs-7 mb-1">{{ \Carbon\Carbon::parse($ticketreply->created_at)->diffForHumans() }}</span>
                                                                <a href="#"
                                                                   class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                                            </div>
                                                            <!--end::Details-->
                                                            <!--begin::Avatar-->

                                                            @if ($ticketreply->user?->getFirstMediaUrl('user_image'))
                                                                <div class="symbol symbol-35px symbol-circle">
                                                                    <img alt="Pic"
                                                                         src="{{ asset($ticketreply->user?->getFirstMediaUrl('user_image')) }}" />
                                                                </div>
                                                            @else
                                                                <div class="symbol symbol-35px symbol-circle">
                                                                    <img alt="Pic"
                                                                         src="{{ asset('assets/media/avatars/blank.png') }}" />
                                                                </div>
                                                            @endif
                                                            <!--end::Avatar-->
                                                        </div>
                                                        <!--end::User-->
                                                        <!--begin::Text-->
                                                        <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                                             data-kt-element="message-text">{{ $ticketreply->description }}</div>
                                                        @if ($ticketreply->getFirstMediaUrl('ticketreply_image'))
                                                            @if (strpos($ticketreply->getFirstMedia('ticketreply_image')->mime_type, 'image') === 0)
                                                                <div class="m-5">
                                                                    <img alt="Pic"
                                                                         src="{{ asset($ticketreply->getFirstMediaUrl('ticketreply_image')) }}"
                                                                         height="80" width="80" />
                                                                </div>
                                                            @else
                                                                <a href="{{ $ticketreply->getFirstMediaUrl('ticketreply_image') }}"
                                                                   target="_blank"><i class="fa fa-file"></i>
                                                                    <span
                                                                        style="font-weight: bold;">{{ $ticketreply->getFirstMedia('ticketreply_image')->file_name }}</span>
                                                                </a>
                                                            @endif
                                                        @endif

                                                        <!--end::Text-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Message(out)-->
                                            @endif
                                        @endforeach
                                        <!--end::Message(in)-->

                                    </div>
                                    <!--end::Messages-->
                                    <div id="selected-file" style="display:none">
                                        <object id="selected-file-object" data="" type=""></object>
                                    </div>

                                </div>
                                <!--end::Card body-->
                                <!--begin::Card footer-->
                                <div class="card-footer fixed pt-4" id="kt_chat_messenger_footer">

                                    <form action="{{ Route('admin.ticketreply.store', $ticket->id) }}"
                                          enctype="multipart/form-data" method="post">
                                        @csrf
                                        <!--begin:Toolbar-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Actions-->
                                            <div class="d-flex align-items-center me-2">
                                                <button id="file-explorer-button"
                                                        class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                                        onclick="document.getElementById('file-explorer-input').click()">
                                                    <i class="bi bi-paperclip fs-3"></i>
                                                </button>
                                                <input id="file-explorer-input" type="file" style="display:none"
                                                       name="image" onchange="showAttachment()">
                                                <div id="attachment-preview"></div>
                                            </div>
                                            <!--end::Actions-->
                                            <!--begin::Input-->
                                            <textarea name="description" class="form-control form-control m-2" rows="1" data-kt-element="input"
                                                      placeholder="Type a message"></textarea>
                                            <!--end::Input-->
                                            <!--begin::Send-->
                                            <button class="btn btn-primary " type="submit" data-kt-element="send">Send</button>
                                            <!--end::Send-->
                                        </div>
                                        <!--end::Toolbar-->
                                        @error('message')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror

                                    </form>

                                </div>
                                <!--end::Card footer-->
                            </div>
                            <!--end::Messenger-->
                        </div>
                        <!--end::Content-->
                    </div>
                </div>

            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

@endsection
@push('custom-scripts')
    @include('custom-scripts.show-tickets-attachment')
@endpush
