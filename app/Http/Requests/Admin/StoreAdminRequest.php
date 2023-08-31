<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreAdminRequest extends FormRequest
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
            'password' => Str::random(8),
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
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'image' => 'nullable'
        ];
    }
}
