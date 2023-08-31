<?php

namespace App\Http\Livewire\Frontend\Support;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class RandomSearch extends Component
{
    public $title;
    public $searchTitle;
    public $showTitleSuggestion = false;
    public $titleSearchResult;
    public Collection $searchData;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount($searchData, $title): void
    {
        $this->searchTitle = '';
        $this->searchData = $searchData;
        $this->title = $title;
    }

    public function searchTitle()
    {
        if (!empty($this->searchTitle)) {
            $this->titleSearchResult = Article::where('title', 'like', '%' . $this->searchTitle . '%')
                ->limit(5)->pluck('title')
                ->toArray();
            $this->showTitleSuggestion = true;
        } else {
            $this->showTitleSuggestion = false;
        }
    }

    public function searchArticle($title)
    {
        $article = Article::where('title', 'like', '%' . $title . '%')->first();
        return redirect()->route('support.singlefaqs', $article->slug);
    }

    public function searchAll()
    {
        return redirect()->route('support.randomsearch', $this->searchTitle);
    }


    public function render()
    {
        return view('livewire.frontend.support.random-search')->with('searchData', $this->searchData)->with('title', $this->title);
    }
}
