<?php

namespace App\Http\Livewire\Frontend\Support;

use App\Models\Article;
use App\Models\ArticleCategory;
use Livewire\Component;

class Faq extends Component
{
    /**
     * Declare a public property $search
     * @var string
     */
    public $searchTitle;
    public $showTitleSuggestion = false;
    public $titleSearchResult;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount(): void
    {
        $this->searchTitle = '';
    }

    public function searchTitle()
    {
        if (!empty($this->searchTitle)) {
            $this->titleSearchResult = Article::with('articleCategory')->where('title', 'like', '%' . $this->searchTitle . '%')
                ->limit(5)
                ->get();
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
        $articleCategegories = ArticleCategory::with(['articles'])
            ->whereHas('articles', function ($query) {
                $query->when($this->searchTitle != '', function ($q) {
                    $q->where('title', 'like', '%' . $this->searchTitle . '%');
                });
            })->limit(5)->get();
        return view('livewire.frontend.support.faq')->with('articleCategegories', $articleCategegories);
    }
}
