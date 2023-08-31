<?php

namespace App\Http\Livewire\Frontend\Support;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleLikeDislikeTracker;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class BuyerFaq extends Component
{
    /**
     * Declare a public property $search
     * @var string
     */
    public string $searchTitle;
    public $showTitleSuggestion = false;
    public $titleSearchResult;
    public $articleCategory;

    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount($articleCategory): void
    {
        //        Log::info($articleCategory);
        $this->articleCategory = $articleCategory;
        $articles = Article::where('category_id', $this->articleCategory->id)->get();
        $this->articles = $articles;
        $this->searchTitle = '';
    }

    public function searchTitle()
    {
        if (!empty($this->searchTitle)) {
            $this->titleSearchResult = Article::with('articleCategory')
                ->where('title', 'like', '%' . $this->searchTitle . '%')
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
        $articleCategoryName = ArticleCategory::all();
        $articles = $this->articles->map(function ($article) {
            $article->likeCount = ArticleLikeDislikeTracker::where('article_id', $article->id)
                ->where('is_like', true)
                ->count();
            return $article;
        });
        return view('livewire.frontend.support.buyer-faq')->with('articleCategory', $this->articleCategory)
            ->with('articles', $articles)
            ->with('articleCategoryName', $articleCategoryName);

    }
}
