@php
    use App\Enums\TicketStatusEnum;
@endphp
<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <div class="card card-flush py-5 ">
        <div class="row">
            <div class="col-md-4">
                <label class="col-form-label fw-semibold fs-6">Search By Ticket Number</label>
                <input wire:model="searchTicketNumber" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                    placeholder="Search ticket number here..." />
            </div>
            <div class="col-md-4">
                <label class="col-form-label required fw-semibold fs-6">Search By Category</label>
                <input wire:model="searchTopic" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                    placeholder="Search Topic here..." />
            </div>
            <div class="col-md-4">
                <label class="col-form-label fw-semibold fs-6">Search By Status</label>
                <select wire:model="searchStatus" id="searchStatus" class="form-select form-select-lg fw-semibold">
                    <option value="">Show All</option>
                    @foreach (TicketStatusEnum::toArray() as $ticketStatus)
                        <option value="{{ $ticketStatus }}" {{ $ticketStatus == $searchStatus ? 'selected' : '' }}>Show
                            {{ ucwords($ticketStatus->value) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-body pt-5">
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class=" min-w-100px">S.No</th>
                            <th class="text-center min-w-100px">Ticket Number</th>
                            <th class="text-center min-w-100px">Ticket Category</th>
                            <th class="text-center min-w-100px">Status</th>
                            <th class="text-center min-w-100px">Created At</th>
                            <th class="text-center min-w-100px">Updated At</th>
                            <th class="text-center min-w-200px">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($tickets as $ticket)
                            <tr class="text-center">
                                <td class="text-dark">{{ $loop->iteration }}</td>
                                <td class="text-dark">{{ $ticket->ticket_number }}</td>
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
                                <td class="text-dark">{{ $ticket->created_at->diffForHumans() }}</td>
                                <td class="text-dark">{{ $ticket->updated_at->diffForHumans() }}</td>

                                <td class="text-dark">
                                    <div class="">
                                        <a href="{{ route('ticket.show', $ticket->id) }}"
                                            class="btn btn-icon btn-success btn-sm mr-2"><i
                                                class="bi bi-eye-fill fs-4"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
