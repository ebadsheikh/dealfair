<?php

namespace App\Http\Requests\Admin\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Adjusts the input for validation.
     *
     * Replaces any spaces in the input's "name" field with empty space "" and
     * appends a random 3-digit integer to it.
     * Generates a random password of 8 characters length for the user.
     */
    public function prepareForValidation()
    {
        $this->merge([
            'username' => strtolower(str_replace(' ', '', $this->input('name')) . mt_rand(100, 999)),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'telephone' => 'required',
            'date_of_birth' => 'required',
            'image' => 'nullable',
        ];
    }
}
