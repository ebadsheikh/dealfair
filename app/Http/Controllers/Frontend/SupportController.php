<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;

class SupportController extends Controller
{
    public function index()
    {
        return view('frontend.support.support');
    }

    public function buyerFaq(ArticleCategory $articleCategory)
    {
        return view('frontend.support.buyer_full_faqs', ['articleCategory' => $articleCategory->load(['articles'])]);
    }

    public function sellerFaq()
    {
        return view('frontend.support.seller_full_faqs');
    }

    public function singleFaq(Article $article)
    {
        return view('frontend.support.single_faq', ['article'=> $article]);
    }

    public function randomSearch($search)
    {
        $searchData = Article::where('description', 'like', '%' . $search . '%')->get();
        return view('frontend.support.random_search', ['searchData' => $searchData,'title' => $search]);
    }

}
