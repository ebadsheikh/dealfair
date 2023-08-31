<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CategoryBrand\StoreCategoryBrandAction;
use App\Actions\CategoryBrand\UpdateCategoryBrandAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryBrand\StoreCategoryBrandRequest;
use App\Http\Requests\Admin\CategoryBrand\UpdateCategoryBrandRequest;
use App\Models\Brand;
use App\Models\CategoryBrand;
use App\Services\Category\CategoryService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CategoryBrandController extends Controller
{
    private StoreCategoryBrandAction $storeCategoryBrandAction;

    private UpdateCategoryBrandAction $updateCategoryBrandAction;

    private CategoryService $categoryService;

    public function __construct(StoreCategoryBrandAction $storeCategoryBrandAction, UpdateCategoryBrandAction $updateCategoryBrandAction, CategoryService $categoryService)
    {
        $this->storeCategoryBrandAction = $storeCategoryBrandAction;
        $this->updateCategoryBrandAction = $updateCategoryBrandAction;
        $this->categoryService = $categoryService;
    }

    public function index(): View
    {
        return view('admin.category-brand.index');
    }

    public function create()
    {
        $categories = $this->categoryService->getLeafCategoriesWithoutOther();
        $brands = Brand::all();
        return view('admin.category-brand.create')->with('brands', $brands)->with('categories', $categories);
    }

    public function store(StoreCategoryBrandRequest $request): RedirectResponse
    {
        try {
            $this->storeCategoryBrandAction->handle($request->validated());
            Session::flash('success', 'Stored Successfully');
            return redirect()->route('admin.category.brand.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back()->withError($ex->getMessage());
        }
    }

    public function edit(CategoryBrand $categoryBrand): View
    {
        $categories = $this->categoryService->getLeafCategoriesWithoutOther();
        $brands = Brand::all();
        return view('admin.category-brand.edit')
            ->with('categories', $categories)
            ->with('brands', $brands)
            ->with('categoryBrand', $categoryBrand);
    }

    public function update(UpdateCategoryBrandRequest $request, CategoryBrand $categoryBrand): RedirectResponse
    {
        try {
            $this->updateCategoryBrandAction->handle($request->validated(), $categoryBrand);
            Session::flash('success', 'Brand Updated Successfully');
            return redirect()->route('admin.category.brand.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }

    public function destroy(CategoryBrand $categoryBrand): RedirectResponse
    {
        try {
            $categoryBrand->delete();
            Session::flash('success', 'Category Brand deleted successfully');
            return redirect()->route('admin.category.brand.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
    }
}
