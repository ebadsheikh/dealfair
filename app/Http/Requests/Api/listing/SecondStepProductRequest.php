<?php

namespace App\Http\Requests\Api\listing;

use Illuminate\Foundation\Http\FormRequest;

class SecondStepProductRequest extends FormRequest
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
            'listingImages' => 'required',
            'listingVideo' => 'required',
        ];
    }
}
