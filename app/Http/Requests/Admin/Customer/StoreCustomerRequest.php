<?php

namespace App\Http\Requests\Admin\Customer;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
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
            'password' => $this->input('password') ? $this->input('password') : Str::random(8),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'username' => 'required|unique:user_profiles',
            'telephone' => 'required|unique:user_profiles',
            'date_of_birth' => [
                'required',
                'date',
                'before:' . Carbon::now()->subYears(18)->format('Y-m-d')
            ],
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country_id' => 'required',
            'image' => 'nullable',
        ];
    }
}
