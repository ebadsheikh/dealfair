<?php

namespace App\Http\Livewire\Frontend\Support;

use App\Models\Faq;
use Livewire\Component;

class SellerFaq extends Component
{
    /**
     * Declare a public property $search
     * @var string
     */
    public string $search;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->search = '';
    }

    public function render()
    {
        $sellerFaqs = Faq::seller()->get();
        return view('livewire.frontend.support.seller-faq')->with('seller_faqs', $sellerFaqs) ;
    }
}
