<?php

namespace App\Http\Livewire\Admin\TicketCategory;

use App\Enums\TicketCategoryStatusEnum;
use App\Models\TicketCategory;
use Livewire\Component;
use Livewire\WithPagination;

class TicketCategoryList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    /**
     * Declare a public property $searchName
     * @var string
     */
    public string $searchName;

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
        $this->searchStatus = TicketCategoryStatusEnum::ACTIVE->value;
    }

    public function render()
    {
        $ticketCategories = TicketCategory::when(!empty($this->searchName), function ($query) {
            $query->where('name', 'like', '%' . $this->searchName . '%');
        })->when(!empty($this->searchStatus), function ($query) {
            $query->whereStatus($this->searchStatus);
        })->paginate(10);

        return view('livewire.admin.ticket-category.ticket-category-list')->with('ticketCategories', $ticketCategories);
        ;
    }
}
