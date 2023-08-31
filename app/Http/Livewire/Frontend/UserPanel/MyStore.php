<?php

namespace App\Http\Livewire\Frontend\UserPanel;

use App\Helpers\GlobalHelper;
use App\Models\Store;
use Livewire\Component;

class MyStore extends Component
{
    public function render()
    {
        $user = GlobalHelper::getUser();
        $stores = Store::with('category')->withCount('listings')->whereUserId($user->id)->get();
        return view('livewire.frontend.user-panel.my-store')->with(['stores'=>$stores]);
    }
}
