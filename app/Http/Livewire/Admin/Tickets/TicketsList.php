<?php

namespace App\Http\Livewire\Admin\Tickets;

use App\Models\Ticket;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class TicketsList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    /**
     * Declare a public property $searchTicketNumber
     * @var string
     */
    public string $searchTicketNumber;

    /**
     * Declare a public property $searchUsername
     * @var string
     */
    public string $searchUsername;

    /**
     * Declare a public property $searchTopic
     * @var string
     */
    public string $searchTopic;

    /**
     * Declare a public property $searchStatus
     * @var string
     */
    public $searchStatus;


    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchTicketNumber = '';
        $this->searchUsername = '';
        $this->searchTopic = '';
        $this->searchStatus = '';
    }

    /**
     * Lifecycle method that returns a View object
     * @return View
     */
    public function render(): View
    {
        $tickets = Ticket::with('user', 'ticketCategory', 'assigneeUser')
            ->whereHas('user', function ($query) {
                $query->when($this->searchUsername != '', function ($q) {
                    $q->where('first_name', 'like', '%' . $this->searchUsername . '%');
                    $q->orWhere('last_name', 'like', '%' . $this->searchUsername . '%');
                });
            })
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

        return view('livewire.admin.tickets.tickets-list')->with('tickets', $tickets);
    }
}
