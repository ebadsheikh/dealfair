<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Enums\ArticleStatusEnum;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Component;

class ArticleList extends Component
{
    /**
     * Declare a public property $searchName
     * @var string
     */
    public string $searchName;

    /**
     * Declare a public property $searchStatus
     * @var string
     */
    public $searchStatus;

    /**
     * Declare a public property $articleCategoryId
     * @var int
     */
    public int $articleCategoryId;

    /**
     * Declare a public property $searchArticleCategory
     * @var string
     */
    public $searchArticleCategory;


    /**
     * Lifecycle method that is called when the component is initialized
     * @return void
     */
    public function mount($articleCategoryId = null): void
    {
        $this->searchName = '';
        $this->searchStatus = ArticleStatusEnum::PUBLISH->value;
        if ($articleCategoryId) {
            $this->articleCategoryId = $articleCategoryId;
        }
    }

    /**
     * Lifecycle method that returns a View object
     * @return View
     */
    public function render()
    {
        $articleCategories = ArticleCategory::orderBy('name', 'ASC')->get();
        $articles = Article::when($this->searchName != '', function ($query) {
            $query->where('title', 'like', '%' . $this->searchName . '%');
        })
            ->when(isset($this->searchArticleCategory) != '', function ($query) {
                $query->where('category_id', $this->searchArticleCategory);
            })
            ->where(function ($query) {
                if (empty($this->searchStatus)) {
                    $query->whereIn('status', ArticleStatusEnum::toArray());
                } else {
                    $query->where('status', $this->searchStatus);
                }
            })->with(['articleCategory'])->paginate(10);

        Log::info($articles);

        return view('livewire.admin.articles.article-list')->with('articles', $articles)->with('articleCategories', $articleCategories);
    }
}
