<?php

namespace App\Http\Livewire\Frontend\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class TicketList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    /**
     * Declare a public property $searchTicketNumber
     * @var string
     */
    public string $searchTicketNumber;

    /**
     * Declare a public property $searchStatus
     * @var string
     */
    public $searchStatus;

    /**
     * Declare a public property $searchTopic
     * @var string
     */
    public string $searchTopic;


    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchTicketNumber = '';
        $this->searchStatus = "";
        $this->searchTopic = '';
    }

    /**
     * Lifecycle method that returns a View object
     * @return View
     */
    public function render()
    {
        $user = Auth::user();
        $tickets = Ticket::with('ticketCategory')
            ->where('user_id', $user->id)
            ->whereHas('ticketCategory', function ($query) {
                $query->when($this->searchTopic != '', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchTopic . '%');
                });
            })
            ->when($this->searchTicketNumber != '', function ($query) {
                $query->where('ticket_number', 'like', '%' . $this->searchTicketNumber . '%');
            })->when(!empty($this->searchStatus), function ($query) {
                $query->whereStatus($this->searchStatus);
            })
            ->latest('created_at')->paginate(10);
        return view('livewire.frontend.ticket.ticket-list')->with('tickets', $tickets);
    }
}
