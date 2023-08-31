<?php

namespace App\Http\Livewire\Frontend\Panel\UserAddresses;

use App\Helpers\GlobalHelper;
use App\Models\Country;
use App\Models\UserAddress;
use Livewire\Component;

class Index extends Component
{
    /**
     * Declare a public property $searchZip
     * @var string
     */
    public string $searchZip;

    public $countries;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchZip = '';
        $this->countries = Country::all();
    }


    public function render()
    {
        $user = GlobalHelper::getUser();
        $userAddresses = UserAddress::whereUserId($user->id)
            ->when($this->searchZip != '', function ($query) {
                $query->where('zip', 'like', '%' . $this->searchZip . '%');
            })->get();
        return view('livewire.frontend.panel.user-addresses.index')
            ->with('userAddresses', $userAddresses)
            ->with('countries', Country::all());
    }
}
