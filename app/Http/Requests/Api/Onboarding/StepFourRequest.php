<?php

namespace App\Http\Requests\Api\Onboarding;

use Illuminate\Foundation\Http\FormRequest;

class StepFourRequest extends FormRequest
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
            'addressVerificationImage' => 'required',
            'governmentVerificationImage' => 'required'
        ];
    }
}
