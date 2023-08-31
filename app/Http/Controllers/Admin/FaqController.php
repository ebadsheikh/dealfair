<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Faq\StoreFaqAction;
use App\Actions\Faq\UpdateFaqAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Faq\StoreFaqRequest;
use App\Http\Requests\Admin\Faq\UpdateFaqRequest;
use App\Models\Faq;
use App\Models\Topic;

class FaqController extends Controller
{
    private StoreFaqAction $storeFaqAction;

    private UpdateFaqAction $updateFaqAction;

    public function __construct(
        StoreFaqAction $storeFaqAction,
        UpdateFaqAction $updateFaqAction
    ) {
        $this->storeFaqAction = $storeFaqAction;
        $this->updateFaqAction = $updateFaqAction;
    }


    /**
     * Display a listing of the resource.
     */
    public function index($topic_id = null)
    {
        $buyer_faqs = Faq::buyer()->topic($topic_id)->get();
        $seller_faqs = Faq::seller()->topic($topic_id)->get();

        return view('admin.support.show', ['topic_id' => $topic_id,'buyer_faqs' => $buyer_faqs , 'seller_faqs' => $seller_faqs]);
    }

    /**
     * Display a listing of the resource.
     */
    public function addBuyer($topic_id = null)
    {
        return view('admin.support.addbuyer', ['topics' => Topic::all(), 'topic_id' => $topic_id]);
    }

    /**
     * Display a listing of the resource.
     */
    public function addSeller($topic_id = null)
    {
        return view('admin.support.addseller', ['topics' => Topic::all(), 'topic_id' => $topic_id]);
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
    public function store(StoreFaqRequest $request, $topic_id)
    {
        $this->storeFaqAction->handle($request->validated());

        return redirect()->Route('admin.faqs.index', $topic_id);
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
    public function edit(Faq $faq)
    {
        return view('admin.support.edit', ['faq' => $faq]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $this->updateFaqAction->handle($faq, $request->validated());
        return redirect()->Route('admin.faqs.index', $faq->topic_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->Route('admin.faqs.index', $faq->topic_id);
    }
}
