<?php

namespace App\Http\Requests\Api\Onboarding;

use Illuminate\Foundation\Http\FormRequest;

class StepThirdRequest extends FormRequest
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
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'state_code' => 'required',
            'zip' => 'required',
            'country_id' => 'required',
        ];
    }
}
