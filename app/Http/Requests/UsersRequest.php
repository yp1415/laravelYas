<?php

namespace App\Http\Requests;
use App\Http\Requests\ParentRequest;

class UsersRequest extends ParentRequest
{

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
        return [
            'name'        => ['required', 'string', 'max:255'],
            'lastname'    => ['required', 'string', 'max:255'],
            'role'        => ['required', 'string'],
            'national_id' => ['required', 'string', 'size:10', 'unique:users,national_id'],
            'mobile'      => ['required', 'string', 'regex:/^09\d{9}$/', 'unique:users,mobile'],
            'password'    => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
