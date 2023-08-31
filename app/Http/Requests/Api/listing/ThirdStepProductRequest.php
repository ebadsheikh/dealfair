<?php

namespace App\Http\Requests\Api\listing;

use App\Enums\ProductListingTypesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ThirdStepProductRequest extends FormRequest
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
        $listingType = $this->input('listingType');

        $rules['listingType'] = [
            'required',
            new Enum(ProductListingTypesEnum::class)
        ];

        if (in_array($listingType, [ProductListingTypesEnum::AUCTION->value, ProductListingTypesEnum::BOTH->value])) {
            $startingBidValidation = 'required|numeric|gt:0';
            if ($listingType === ProductListingTypesEnum::BOTH->value) {
                $startingBidValidation = $startingBidValidation . '|lt:productPrice';
            }
            $rules['startingBid'] = $startingBidValidation;
        }

        if (in_array($listingType, [ProductListingTypesEnum::SELL->value, ProductListingTypesEnum::BOTH->value])) {
            $rules['productPrice'] = ['required', 'numeric', 'gt:0'];
        }

        if ($listingType === ProductListingTypesEnum::SELL->value) {
            $rules['discountedProductPrice'] = ['nullable', 'numeric', 'gt:0', 'lt:productPrice'];
        }

        return $rules;
    }

    public function validationData()
    {
        return $this->input();
    }
}
