@extends('frontend.user-panel.layouts.master')
@section('title', 'Dealfair | Support Ticket')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <div class="page-title d-flex flex-column me-3">
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">Support Ticket</h1>
{{--            {{ Breadcrumbs::render('frontendShowTicketPage') }}--}}
        </div>

        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ route('ticket.index') }}" class="btn btn-sm fw-bold btn-primary"><i
                    class="bi bi-arrow-left"></i>Go Back</a>
        </div>
    </div>

    <div class="content flex-column-fluid" id="kt_content">
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
                                <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
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
                    <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages"
                         data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto"
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
                                            @if ($ticketreply->user ? $ticketreply->user?->getFirstMediaUrl('user_image') : $ticketreply->staff?->getFirstMediaUrl('user_image'))
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
                                                   class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">{{ $ticketreply->user ? $ticketreply->user?->full_name : $ticketreply->staff?->full_name }}</a>
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

                                            @if ($ticketreply->user->getFirstMediaUrl('user_image'))
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                         src="{{ asset($ticketreply->user->getFirstMediaUrl('user_image')) }}" />
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

                    <form action="{{ Route('ticketreply.store', $ticket->id) }}"
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
    </div>
@endsection
@section('scripts')
    @include('custom-scripts.show-tickets-attachment')

@endsection
