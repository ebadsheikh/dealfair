<?php

namespace App\Http\Requests\Frontend\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'subject' => 'required|unique:tickets,subject|min:5|max:80',
            'description' => 'required',
            'ticket_category_id' => 'required'
        ];
    }
}
