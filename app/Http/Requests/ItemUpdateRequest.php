<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'max:255', 'string'],
            'type' => ['required', 'max:255', 'string'],
            'color' => ['required'],
            'quantity' => ['required', 'numeric'],
            'description' => ['required', 'max:255', 'string'],
            'ex_date' => ['required', 'date'],
        ];
    }
}
