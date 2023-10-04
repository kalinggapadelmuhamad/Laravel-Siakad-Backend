<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $userId = $this->user->id;

        return [
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,'. $userId,
            'roles' => 'string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ];
    }
}
