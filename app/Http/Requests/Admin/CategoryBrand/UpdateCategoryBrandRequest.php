<?php

namespace App\Http\Requests\Admin\CategoryBrand;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'brand_id' => [
                'required',
                Rule::unique('category_brands')->where(function ($query) {
                    return $query->whereCategoryId($this->category_id);
                })->ignore($this->categoryBrand->id)
            ],
            'category_id' => [
                'required',
                Rule::unique('category_brands')->where(function ($query) {
                    return $query->whereBrandId($this->brand_id);
                })->ignore($this->categoryBrand->id)
            ],
        ];
    }
}
