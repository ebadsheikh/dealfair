<?php

namespace App\Http\Livewire\Admin\AffiliatedUsers;

use App\Models\CommunityMember;
use Illuminate\View\View;
use Livewire\Component;

class AffiliatedUsersList extends Component
{
    /**
     * Declare a public property $searchName
     * @var string
     */
    public string $searchName;

    /**
     * Declare a public property $searchEmail
     * @var string
     */
    public string $searchEmail;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchName = '';
        $this->searchEmail = '';
    }

    /**
     * Lifecycle method that returns a View object
     * @return View
     */
    public function render(): View
    {
        $franchise_affiliates = CommunityMember::whereIsAdmin(1)
            ->with(['community', 'user'])
            ->whereHas('user', function ($query) {
                $query->when($this->searchName != '', function ($q) {
                    $q->where('first_name', 'like', '%' . $this->searchName . '%')
                        ->orWhere('last_name', 'like', '%' . $this->searchName . '%');
                })->when($this->searchEmail != '', function ($q) {
                    $q->where('email', 'like', '%' . $this->searchEmail . '%');
                });
            })
            ->paginate(10);

        return view('livewire.admin.affiliated-users.affiliated-users-list')->with('franchise_affiliates', $franchise_affiliates);
    }
}
