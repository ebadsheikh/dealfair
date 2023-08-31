<?php

namespace App\Http\Livewire\Admin\Keywords;

use App\Models\Keyword;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class KeywordList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $searchKeyword;
    public string $searchCategory;
    public string $searchStatus;

    public function mount(): void
    {
        $this->searchKeyword = '';
        $this->searchCategory = '';
        $this->searchStatus = '';
    }

    public function render(): View
    {
        $keywords = Keyword::with(['brand', 'category', 'keywordTags'])
            ->whereHas('category', function ($query) {
                $query->when($this->searchCategory != '', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchCategory . '%');
                });
            })->when(!empty($this->searchKeyword), function ($query) {
                $query->where('keyword', 'like', '%' . $this->searchKeyword . '%');
            })->when(!empty($this->searchStatus), function ($query) {
                $query->whereStatus($this->searchStatus);
            })->orderBy('updated_at', 'DESC')->paginate(10);
        return view('livewire.admin.keywords.keyword-list')->with('keywords', $keywords);
    }
}
