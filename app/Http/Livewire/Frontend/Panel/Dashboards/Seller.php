<?php

namespace App\Http\Livewire\Frontend\Panel\Dashboards;

use App\Helpers\GlobalHelper;
use App\Models\Product;
use Livewire\Component;

class Seller extends Component
{
    public function render()
    {
        $user = GlobalHelper::getUser();
        $products = Product::whereUserId($user->id)->with(['brand', 'parentCategory', 'childCategory'])->get();
        return view('livewire.frontend.panel.dashboards.seller')->with('products', $products);
    }
}
