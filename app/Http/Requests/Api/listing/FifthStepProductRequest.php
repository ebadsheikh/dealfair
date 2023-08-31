<?php

namespace App\Http\Requests\Api\listing;

use App\Enums\ProductShippingCostPayerEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class FifthStepProductRequest extends FormRequest
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
        $rules['shippingCostPayer'] = ['required', new Enum(ProductShippingCostPayerEnum::class)];
        $rules['visibleRange'] = ['required', 'integer', 'gt:0'];
        $rules['pickUpAddress'] = ['required'];

        if (in_array($this->input('shippingCostPayer'), [ProductShippingCostPayerEnum::ME->value, ProductShippingCostPayerEnum::BUYER->value])) {
            $rules['weight'] = 'required|numeric|gt:0';
            $rules['length'] = 'required|numeric|gt:0';
            $rules['width'] = 'required|numeric|gt:0';
            $rules['height'] = 'required|numeric|gt:0';
        }

        return $rules;
    }

    public function validationData()
    {
        return $this->input();
    }
}
