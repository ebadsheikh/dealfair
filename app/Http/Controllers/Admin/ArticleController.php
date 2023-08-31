<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Article\StoreRequest;
use App\Http\Requests\Admin\Article\UpdateRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Scopes\PublishArticleScope;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.articles.index', ['articles' => Article::withoutGlobalScope(PublishArticleScope::class)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create', ['articleCateogories' => ArticleCategory::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            Article::create($request->validated());
            Session::flash('success', 'Stored Successfully');
            return redirect()->Route('admin.article.index');
        } catch (Exception $th) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', ['article' => $article, 'articleCateogories' => ArticleCategory::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Article $article)
    {
        try {
            $article->update($request->validated());
            Session::flash('success', 'Updated Successfully');
            return redirect()->Route('admin.article.index');
        } catch (Exception $th) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    /**
     * change article status
     */
    public function changeStatus(Article $article, $status)
    {
        $article->update([
            'status' => $status
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        Session::flash('success', 'Deleted Successfully');
        return redirect()->Route('admin.article.index');
    }

    public function uploadFile(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $file = $request->file('upload');

            try {
                $path = Storage::disk('s3')->put('images', $file);

                $url = Storage::disk('s3')->url($path);

                return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
            } catch (\Exception $e) {
                // Handle the exception if the upload fails
                return response()->json(['error' => $e->getMessage()]);
            }
        }
    }
}
