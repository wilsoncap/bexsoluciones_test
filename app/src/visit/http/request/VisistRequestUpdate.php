<?php

namespace App\src\visit\http\request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\src\utils\ApiResponse;
use Illuminate\Contracts\Validation\Validator;

class VisistRequestUpdate extends FormRequest
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
        return [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email:rfc,dns',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ];
    }

     protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            ApiResponse::error(
                data: $validator->errors(), // Pasa los errores de validación aquí
                message: 'Los datos proporcionados son inválidos.',
                code: 422 // El código de error estándar para validación fallida
            )
        ); // Código de estado HTTP 422 (Unprocessable Entity)
    }
}
