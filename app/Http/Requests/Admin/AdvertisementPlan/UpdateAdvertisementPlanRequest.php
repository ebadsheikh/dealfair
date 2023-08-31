<?php

namespace App\Http\Requests\Admin\AdvertisementPlan;

use App\Enums\AdvertisementPlanEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateAdvertisementPlanRequest extends FormRequest
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
            'views' => ['required','integer',Rule::unique('advertisement_plans')->ignore($this->advertisementPlan->id),'min:1'],
            'price' => 'required|integer|min:1',
            'status' => ['required', new Enum(AdvertisementPlanEnum::class)],
        ];
    }
}
