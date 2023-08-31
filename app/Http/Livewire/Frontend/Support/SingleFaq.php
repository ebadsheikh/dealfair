<?php

namespace App\Http\Livewire\Frontend\Support;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleLikeDislikeTracker;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SingleFaq extends Component
{
    public $articleId;
    public $helpfulCount = 0;
    public $notHelpfulCount = 0;

    public $searchTitle;

    public $showTitleSuggestion = false;
    public $titleSearchResult;
    public $isLike;
    public $disLike;
    public $isLoggedIn;


    public function mount($articleId): void
    {
        $article = ArticleLikeDislikeTracker::whereArticleId($articleId)->first();
        $this->articleId = $articleId;
        $this->searchTitle = "";
        $this->helpfulCount = Article::whereId($articleId)->where('like_count', 1)->count();
        $this->notHelpfulCount = Article::whereId($articleId)->where('dislike_count', 1)->count();
        $this->isLike = $article?->is_like;
        $this->disLike = !$article?->is_like;
        $this->isLoggedIn = Auth::check();
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


    public function searchArticle()
    {
        $article = Article::where('title', 'like', '%' . $this->searchTitle . '%')->first();
        return redirect()->route('support.singlefaqs', $article->slug);
    }

    public function render()
    {
        $article = Article::whereId($this->articleId)->first();
        $articleCategories = ArticleCategory::with(['articles'])->whereId($article->category_id)->first();

        return view('livewire.frontend.support.single-faq')->with('article', $article)
            ->with('articleCategories', $articleCategories)
            ->with('isLike', $this->isLike)->with('disLike', $this->disLike)
            ->with('isLoggedIn', $this->isLoggedIn);
    }

    public function incrementHelpfulCount()
    {
        if (Auth::check()) {
            $this->storeFeedback(true);
            $this->isLike = true;
            $this->disLike = false;
        } else {
            return redirect()->Route('auth.signin');
        }
    }

    public function incrementNotHelpfulCount()
    {
        if (Auth::check()) {
            $this->storeFeedback(false);
            $this->disLike = true;
            $this->isLike = false;
        } else {
            return redirect()->Route('auth.signin');
        }
    }

    private function storeFeedback($isLike)
    {
        $userId = Auth::id();

        $existingVote = ArticleLikeDislikeTracker::where('article_id', $this->articleId)
            ->where('user_id', $userId)
            ->first();

        if ($existingVote) {
            // User has already provided feedback for this article
            if ($existingVote->is_like == $isLike) {
                // User is trying to submit the same feedback again
                // You can handle this case based on your application requirements
                $existingVote->update(['is_like' => $isLike]);
                if ($isLike == true) {
                    Article::whereId($this->articleId)->update([
                        'like_count' => ArticleLikeDislikeTracker::where('article_id', $this->articleId)->where('is_like', true)->count(),
                        'dislike_count' => ArticleLikeDislikeTracker::where('article_id', $this->articleId)->where('is_like', false)->count()
                    ]);
                } else {
                    Article::whereId($this->articleId)->update([
                        'like_count' => ArticleLikeDislikeTracker::where('article_id', $this->articleId)->where('is_like', true)->count(),
                        'dislike_count' => ArticleLikeDislikeTracker::where('article_id', $this->articleId)->where('is_like', false)->count()
                    ]);
                }

                $this->helpfulCount = Article::whereId($this->articleId)->where('like_count', 1)->count();
                $this->notHelpfulCount = Article::whereId($this->articleId)->where('dislike_count', 1)->count();
            } else {
                // User is changing their feedback from like to dislike or vice versa
                $existingVote->update(['is_like' => $isLike]);
                if ($isLike == true) {
                    Article::whereId($this->articleId)->update([
                        'like_count' => ArticleLikeDislikeTracker::where('article_id', $this->articleId)->where('is_like', true)->count(),
                        'dislike_count' => ArticleLikeDislikeTracker::where('article_id', $this->articleId)->where('is_like', false)->count()
                    ]);
                } else {
                    Article::whereId($this->articleId)->update([
                        'like_count' => ArticleLikeDislikeTracker::where('article_id', $this->articleId)->where('is_like', true)->count(),
                        'dislike_count' => ArticleLikeDislikeTracker::where('article_id', $this->articleId)->where('is_like', false)->count()
                    ]);
                }

                $this->helpfulCount = Article::whereId($this->articleId)->where('like_count', 1)->count();
                $this->notHelpfulCount = Article::whereId($this->articleId)->where('dislike_count', 1)->count();
            }
        } else {
            // User has not provided feedback for this article, create a new record
            ArticleLikeDislikeTracker::create([
                'article_id' => $this->articleId,
                'user_id' => $userId,
                'is_like' => $isLike,
            ]);

            if ($isLike == true) {
                Article::whereId($this->articleId)->update([
                    'like_count' => ArticleLikeDislikeTracker::where('article_id', $this->articleId)->where('is_like', true)->count(),
                    'dislike_count' => ArticleLikeDislikeTracker::where('article_id', $this->articleId)->where('is_like', false)->count()
                ]);
            } else {
                Article::whereId($this->articleId)->update([
                    'like_count' => ArticleLikeDislikeTracker::where('article_id', $this->articleId)->where('is_like', true)->count(),
                    'dislike_count' => ArticleLikeDislikeTracker::where('article_id', $this->articleId)->where('is_like', false)->count()
                ]);
            }

            $this->helpfulCount = Article::whereId($this->articleId)->where('like_count', 1)->count();
            $this->notHelpfulCount = Article::whereId($this->articleId)->where('dislike_count', 1)->count();
        }
    }
}
