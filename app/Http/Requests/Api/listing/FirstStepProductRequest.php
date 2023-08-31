<?php

namespace App\Http\Requests\Api\listing;

use App\Enums\ProductConditionsEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class FirstStepProductRequest extends FormRequest
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
        $rules['title'] = ['required', 'min:5', 'max:80'];
        $rules['category_id'] = ['required'];
        $rules['product_condition'] = ['required', new Enum(ProductConditionsEnum::class)];
        $rules['description'] = ['required'];
        return $rules;
    }

    public function validationData()
    {
        return $this->input(); // Use the input data for validation
    }
}
