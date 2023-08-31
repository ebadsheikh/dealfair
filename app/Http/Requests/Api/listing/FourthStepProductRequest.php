<?php

namespace App\Http\Requests\Api\listing;

use Illuminate\Foundation\Http\FormRequest;

class FourthStepProductRequest extends FormRequest
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
        $rules['brand'] = ['required'];
        $rules['listingTags'] = ['required'];
        $rules['colors'] = ['required'];
        $rules['quantity'] = ['required', 'integer', 'gt:0', 'lt:1000000'];
        return $rules;
    }

    public function validationData()
    {
        return $this->input();
    }
}
