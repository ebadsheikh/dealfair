<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
            'name' => [
                'required',
                'min:3',
                'max:30',
                Rule::unique('categories')->where(function ($query) {
                    return $query->whereCategoryId($this->category_id);
                })->ignore($this->category->id)
            ],
            'category_id' => [
                'nullable',
                Rule::unique('categories')->where(function ($query) {
                    return $query->whereName($this->name);
                })->ignore($this->category->id)
            ],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ];
    }
}
