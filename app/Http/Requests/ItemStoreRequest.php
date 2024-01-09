<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'code' => ['required', 'max:255', 'string', 'unique:items,code'],
            'type' => ['required', 'max:255', 'string'],
            'color' => ['required'],
            'quantity' => ['required', 'numeric'],
            'description' => ['required', 'max:255', 'string'],
            'ex_date' => ['required', 'date', 'after:today'],
        ];
    }
}
