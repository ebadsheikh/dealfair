<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Actions\Category\StoreCategoryAction;
use App\Actions\Category\UpdateCategoryAction;
use App\Services\Category\CategoryService;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    private StoreCategoryAction $storeCategoryAction;

    private UpdateCategoryAction $updateCategoryAction;

    private CategoryService $categoryService;


    public function __construct(
        StoreCategoryAction  $storeCategoryAction,
        UpdateCategoryAction $updateCategoryAction,
        CategoryService      $categoryService,
    ) {
        $this->storeCategoryAction = $storeCategoryAction;
        $this->updateCategoryAction = $updateCategoryAction;
        $this->categoryService = $categoryService;
    }

    public function index(Category $parentCategory = null): view
    {
        return view('admin.categories.index')->with('parentCategory', $parentCategory);
    }

    public function create(Category $parentCategory = null): View
    {
        return view('admin.categories.add')
            ->with('parentCategory', $parentCategory);
    }


    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        try {
            $this->storeCategoryAction->handle($request->validated());
            Session::flash('success', 'Stored Successfully');
            return redirect()->route('admin.category.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }


    public function edit(Category $category): View
    {
        return view('admin.categories.edit')
            ->with('category', $category)
            ->with('parentCategories', $this->categoryService->getCategoryTree());
    }


    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        try {
            $this->updateCategoryAction->handle($category, $request->validated());
            Session::flash('success', 'Category updated successfully');
            return redirect()->route('admin.category.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }


    public function destroy(Category $category): RedirectResponse
    {
        try {
            $category->delete();
            Session::flash('success', 'Category deleted successfully');
            return redirect()->route('admin.category.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }


    public function changeStatus(Category $category, string $status): RedirectResponse
    {
        try {
            $category->update([
                'status' => $status
            ]);
            Session::flash('success', 'Status updated successfully');
            return back();
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }
}
