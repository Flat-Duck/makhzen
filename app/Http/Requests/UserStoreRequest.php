<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'alpha'],
            'email' => ['required', 'unique:users,email', 'email'],
            'gender' => ['required'],
            'address' => ['required', 'string'],
            'password' => ['required'],
            'phone' => ['numeric','starts_with:09'],
            'roles' => 'array',
        ];
    }
}
