<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response as HttpResponse;

abstract class ParentRequest extends FormRequest
{
    abstract public function authorize(): bool;

    abstract public function rules(): array;

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException(
            response()->json([
                'status' => 'error',
                'message' => 'Validation Failed',
                'errors' => $errors,
            ], HttpResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
