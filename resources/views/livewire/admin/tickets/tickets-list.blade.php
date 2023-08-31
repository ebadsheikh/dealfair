<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <div class="card card-p-0 card-flush">

        <div class="row mb-5">
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Ticket Number</label>
                <input wire:model="searchTicketNumber" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                    placeholder="Search ticket number here..." />
            </div>
            <div class="col-md-3">
                <label class="col-form-label required fw-semibold fs-6">Search By User Name</label>
                <input wire:model="searchUsername" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                    placeholder="Search username here..." />
            </div>
            <div class="col-md-3">
                <label class="col-form-label required fw-semibold fs-6">Search By Topic</label>
                <input wire:model="searchTopic" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                    placeholder="Search Topic here..." />
            </div>
            <div class="col-md-3">
                <label class="col-form-label fw-semibold fs-6">Search By Status</label>
                <select wire:model="searchStatus" id="searchStatus" class="form-select form-select-lg fw-semibold">
                    <option value="">Show All</option>
                    @foreach (\App\Enums\TicketStatusEnum::toArray() as $ticketStatus)
                        <option value="{{ $ticketStatus }}" {{ $ticketStatus == $searchStatus ? 'selected' : '' }}>Show
                            {{ ucwords($ticketStatus->value) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-body">
            @if ($tickets->count() > 0)
                <table class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example">
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                            <th class="text-center min-w-50px">#</th>
                            <th class="text-center min-w-100px">Ticket Number</th>
                            <th class="text-center min-w-100px">User Name</th>
                            <th class="text-center min-w-100px">Assignee</th>
                            <th class="text-center min-w-100px">Subject</th>
                            <th class="text-center min-w-100px">Category</th>
                            <th class="text-center min-w-100px">Status</th>
                            @can('View Ticket Detail')
                                <th class="text-center min-w-200px">Action</th>
                            @endcan

                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($tickets as $ticket)
                            @if (Auth::user()->hasRole('superadmin'))
                                <tr class="text-center">
                                    <td class="text-dark">{{ $loop->iteration }}</td>
                                    <td class="text-dark">{{ $ticket->ticket_number }}</td>
                                    <td class="text-dark">
                                        <a href="{{ route('admin.customers.details', $ticket->user->id) }}">
                                            {{ $ticket->user->full_name }}</a>
                                    </td>
                                    <td class="text-dark">
                                        @if ($ticket->assigneeUser)
                                            {{ $ticket->assigneeUser->full_name }}
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td class="text-dark">{{ $ticket->subject }}</td>
                                    <td class="text-dark">{{ $ticket->ticketCategory->name }}</td>
                                    <td class="text-dark">
                                        @if ($ticket->status == 'pending')
                                            <span class="badge badge-primary">{{ ucwords($ticket->status) }}</span>
                                        @elseif($ticket->status == 'active')
                                            <span class="badge badge-success">{{ ucwords($ticket->status) }}</span>
                                        @elseif($ticket->status == 'inprogress')
                                            <span class="badge badge-success">{{ ucwords($ticket->status) }}</span>
                                        @elseif($ticket->status == 'hold')
                                            <span class="badge badge-success">{{ ucwords($ticket->status) }}</span>
                                        @elseif($ticket->status == 'closed')
                                            <span class="badge badge-success">{{ ucwords($ticket->status) }}</span>
                                        @endif
                                    </td>
                                    <td class="text-dark">
                                        <div class="">
                                            @can('View Ticket Detail')
                                                <a href="{{ route('admin.tickets.show', $ticket->id) }}"
                                                    class="btn btn-icon btn-success btn-sm mr-2"><i
                                                        class="bi bi-eye-fill fs-4"></i></a>
                                            @endcan

                                        </div>
                                    </td>
                                </tr>
                            @elseif($ticket->assignee == Auth::user()->id)
                                <tr class="text-center">
                                    <td class="text-dark">{{ $loop->iteration }}</td>
                                    <td class="text-dark">{{ $ticket->ticket_number }}</td>
                                    <td class="text-dark">{{ $ticket->user->full_name }}</td>
                                    <td class="text-dark">
                                        @if (isset($ticket->assigneeUser->full_name))
                                            {{ $ticket->assigneeUser->full_name }}
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td class="text-dark">{{ $ticket->subject }}</td>
                                    <td class="text-dark">{{ $ticket->ticketCategory->name }}</td>
                                    <td class="text-dark">
                                        @if ($ticket->status == 'pending')
                                            <span class="badge badge-primary">{{ ucwords($ticket->status) }}</span>
                                        @elseif($ticket->status == 'active')
                                            <span class="badge badge-success">{{ ucwords($ticket->status) }}</span>
                                        @elseif($ticket->status == 'inprogress')
                                            <span class="badge badge-success">{{ ucwords($ticket->status) }}</span>
                                        @elseif($ticket->status == 'hold')
                                            <span class="badge badge-success">{{ ucwords($ticket->status) }}</span>
                                        @elseif($ticket->status == 'closed')
                                            <span class="badge badge-success">{{ ucwords($ticket->status) }}</span>
                                        @endif
                                    </td>
                                    <td class="text-dark">
                                        <div class="">
                                            @can('View Ticket Detail')
                                                <a href="{{ route('admin.tickets.show', $ticket->id) }}"
                                                    class="btn btn-icon btn-success btn-sm mr-2"><i
                                                        class="bi bi-eye-fill fs-4"></i></a>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="text-center m-5">
                    <h4>No Data Found</h4>
                </div>
            @endif

        </div>
        <div class="card-footer m-4">
            <div class="d-flex justify-content-end">
                {{ $tickets->links() }}
            </div>
        </div>
    </div>
</div>
