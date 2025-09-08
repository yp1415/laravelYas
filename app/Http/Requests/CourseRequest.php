<?php

namespace App\Http\Requests;
use App\Http\Requests\ParentRequest;

class CourseRequest extends ParentRequest
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
            'image'             => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'title'             => ['required', 'string', 'max:255'],
            'about'             => ['required', 'string', 'min:10'],
            'price'             => ['required', 'numeric', 'min:0'],
            'time'              => ['required', 'string'],
            'days'              => ['required', 'string', 'max:100'],
            'start_of_class'    => ['required', 'date', 'after_or_equal:today'],
            'is_active'         => ['sometimes', 'boolean'],
            'sessions_count'    => ['nullable', 'integer'],
            'students_count'    => ['sometimes', 'integer', 'min:0'],
            'prerequisite'      => ['nullable', 'string', 'max:500']
        ];
    }
}
