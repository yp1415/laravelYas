<?php

namespace App\Http\Requests;
use App\Http\Requests\ParentRequest;

class UserRequest extends ParentRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch ($this->route()->getName()) {
            case 'login':
                return [
                    'email'    => ['required', 'email'],
                    'password' => ['required'],
                ];
            case 'register':
            return [
                'name'        => ['required', 'string', 'max:255'],
                'email'       => ['required', 'string', 'email', 'unique:users,email'],
                'password'    => ['required', 'string', 'min:8', 'confirmed'],
            ];
                default:
                return [];
        }
    }
}
