<?php

namespace App\Http\Livewire\Admin\Keywords;

use App\Actions\Keyword\StoreKeywordAction;
use App\Models\Category;
use App\Services\Category\CategoryService;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateKeyword extends Component
{
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

    public function mount(): void
    {
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

    public function storeKeyword()
    {
        $this->validate([
            'keyword' => [
                'required',
                'min:3',
                'max:80',
                Rule::unique('keywords')
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

        (new StoreKeywordAction())->handle([
            'keyword' => $this->keyword,
            'brand_id' => $this->brand,
            'category_id' => $this->category,
            'keywordTags' => json_decode($this->keywordTags),
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'weight' => $this->weight,
        ]);

        Session::flash('success', 'Keyword stored successfully');

        return redirect()->route('admin.keywords.index');

    }

    public function render()
    {
        return view('livewire.admin.keywords.create-keyword');
    }
}
