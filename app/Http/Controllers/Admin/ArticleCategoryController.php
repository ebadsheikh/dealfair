<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleCategory\StoreRequest;
use App\Http\Requests\Admin\ArticleCategory\UpdateRequest;
use App\Models\ArticleCategory;
use Exception;
use Illuminate\Support\Facades\Session;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.article-categories.index', ['articleCategories' => ArticleCategory::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            ArticleCategory::create($request->validated());
            Session::flash('success', 'Stored Successfully');
            return back();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, ArticleCategory $category)
    {
        try {
            $category->update([
                'name' => $request->name,
                'icon' => $request->icon
            ]);
            Session::flash('success', 'Updated Successfully');
            return back();
        } catch (Exception $th) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleCategory $category)
    {
        $category->delete();
        Session::flash('success', 'Deleted Successfully');
        return back();
    }
}
