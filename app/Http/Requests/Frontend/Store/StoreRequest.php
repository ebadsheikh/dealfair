<?php

namespace App\Http\Requests\Frontend\Store;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'store_logo' => 'required|image',
            'store_thumbnail' => 'required|image',
            'store_name' => 'required',
            'category_id' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'state_code' => 'nullable',
            'zip' => 'required',
            'country_id' => 'required'
        ];
    }
}
