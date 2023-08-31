<?php

namespace App\Http\Controllers\Admin;

use App\Actions\DynamicPage\StoreDynamicPageAction;
use App\Actions\DynamicPage\UpdateDynamicPageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DynamicPage\StoreDynamicPageRequest;
use App\Http\Requests\Admin\DynamicPage\UpdateDynamicPageRequest;
use App\Models\DynamicPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DynamicPageController extends Controller
{
    private StoreDynamicPageAction $storeDynamicPageAction;

    private UpdateDynamicPageAction $updateDynamicPageAction;

    public function __construct(
        StoreDynamicPageAction $storeDynamicPageAction,
        UpdateDynamicPageAction $updateDynamicPageAction
    ) {
        $this->storeDynamicPageAction = $storeDynamicPageAction;
        $this->updateDynamicPageAction = $updateDynamicPageAction;
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        return view('admin.dynamic-pages.show');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('admin.dynamic-pages.add');
    }

    /**
     * Store a newly created resource in storage.
     * @return RedirectResponse
     */
    public function store(StoreDynamicPageRequest $request): RedirectResponse
    {
        $this->storeDynamicPageAction->handle($request->validated());

        return redirect()->Route('admin.dynamic-pages.index');
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
     * @return View
     */
    public function edit(DynamicPage $page): View
    {
        return view('admin.dynamic-pages.edit', ['dynamic_page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     * @return RedirectResponse
     */
    public function update(UpdateDynamicPageRequest $request, DynamicPage $page): RedirectResponse
    {
        $this->updateDynamicPageAction->handle($request->validated(), $page);

        return redirect()->Route('admin.dynamic-pages.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return RedirectResponse
     */
    public function destroy(DynamicPage $page): RedirectResponse
    {
        $page->delete();

        return redirect()->Route('admin.dynamic-pages.index');
    }
}
