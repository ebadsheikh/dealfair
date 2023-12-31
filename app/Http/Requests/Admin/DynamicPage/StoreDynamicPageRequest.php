<?php

namespace App\Http\Requests\Admin\DynamicPage;

use Illuminate\Foundation\Http\FormRequest;

class StoreDynamicPageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|unique:dynamic_pages,title',
            'short_title' => 'nullable',
            'permalink' => 'nullable',
            'content' => 'required',
        ];
    }
}
