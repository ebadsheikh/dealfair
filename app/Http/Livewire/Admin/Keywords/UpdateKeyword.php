<?php

namespace App\Http\Livewire\Admin\Keywords;

use App\Actions\Keyword\UpdateKeywordAction;
use App\Models\Category;
use App\Models\Keyword;
use App\Services\Category\CategoryService;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateKeyword extends Component
{
    public Keyword $editKeyword;
    public $keyword;
    public $categories;
    public $brands;
    public $category;
    public $brand;
    public $keywordTags;
    public $length;
    public $width;
    public $height;
    public $weight;

    public function mount(Keyword $editKeyword): void
    {
        $this->editKeyword = $editKeyword;

        $editKeyword->load('keywordTags');

        $this->keyword = $editKeyword->keyword;
        $this->category = $editKeyword->category_id;
        $this->brand = $editKeyword->brand_id;
        $this->length = $editKeyword->length;
        $this->width = $editKeyword->width;
        $this->height = $editKeyword->height;
        $this->weight = $editKeyword->weight;
        $this->keywordTags = $editKeyword->keywordTags->pluck('tag');
        $this->categories = (new CategoryService())->getLeafCategoriesWithoutOther();
    }

    public function updatedCategory($value)
    {
        $fetchBrands = Category::with('brands')->whereId($value)->first();
        if ($fetchBrands) {
            $this->brands = $fetchBrands->brands;
            $this->emit('brandsUpdated', $this->brands);
        }
    }

    public function updateKeyword()
    {
        $this->validate([
            'keyword' => [
                'required',
                'min:3',
                'max:80',
                Rule::unique('keywords')->ignore($this->editKeyword->id)
            ],
            'brand' => ['required'],
            'category' => ['required'],
            'keywordTags' => ['required'],
            'length' => ['nullable', 'numeric', 'min:0'],
            'width' => ['nullable', 'numeric', 'min:0'],
            'height' => ['nullable', 'numeric', 'min:0'],
            'weight' => ['nullable', 'numeric', 'min:0'],
        ]);

        if ($this->getErrorBag()->any()) {
            return null;
        }

        (new UpdateKeywordAction())->handle($this->editKeyword, [
            'keyword' => $this->keyword,
            'brand_id' => $this->brand,
            'category_id' => $this->category,
            'keywordTags' => json_decode($this->keywordTags, true),
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'weight' => $this->weight,
        ]);

        Session::flash('success', 'Keyword updated successfully');

        return redirect()->route('admin.keywords.index');

    }

    public function render()
    {
        return view('livewire.admin.keywords.update-keyword');
    }
}
