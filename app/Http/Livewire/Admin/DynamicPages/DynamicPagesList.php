<?php

namespace App\Http\Livewire\Admin\DynamicPages;

use App\Models\DynamicPage;
use Illuminate\View\View;
use Livewire\Component;

class DynamicPagesList extends Component
{
    /**
     * Declare a public property $searchTitle
     * @var string
     */
    public string $searchTitle;

    /**
     * Declare a public property $searchShortTitle
     * @var string
     */
    public string $searchShortTitle;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchTitle = '';
        $this->searchShortTitle = '';
    }

    /**
     * Lifecycle method that returns a View object
     * @return View
     */
    public function render(): View
    {
        $data = DynamicPage::when($this->searchTitle != '', function ($query) {
            $query->where('title', 'like', '%' . $this->searchTitle . '%');
        })
            ->when($this->searchShortTitle != '', function ($query) {
                $query->where('short_title', 'like', '%' . $this->searchShortTitle . '%');
            })
            ->paginate(10);


        return view('livewire.admin.dynamic-pages.dynamic-pages-list')->with('data', $data);
    }
}
