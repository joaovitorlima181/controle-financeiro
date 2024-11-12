<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class UpdateOutflowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if (Str::contains($this->amount, ',')) {
            $this->amount = str_replace(',', '.', $this->amount);
        }

        $this->merge([
            'amount' => floatval($this->amount),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50',
            'description' => 'string|max: 100|nullable',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O Título é obrigatório.',
            'title.max' => 'O Título deve ter no maximo 50 caracteres.',
            'description.max' => 'A Descricao deve ter no maximo 100 caracteres.',
            'amount.required' => 'O Valor deve ser informado.',
            'amount.numeric' => 'O Valor deve ser um valor numerico.',
            'date.required' => 'A Data deve ser informada.',
            'date.date' => 'A Data deve ser uma data.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        $this->validateRequest($validator);
    }

    /*
     * this will handle the errors and sends back 400 bad request if validation fails
     * you can place this method in a helper file or create a trait
     * to easy access in all the form requests
     */
    public function validateRequest(Validator $validator)
    {
        $errors = [];
        $fails  = (new ValidationException($validator))->errors();
        foreach ($fails as $key => $error) {
            $errors[$key] = $error[0];
        }

        if (count($errors) > 0) {
            $logName = explode('\\', get_class($this));

            // log the errors for debug
            Log::error(Str::snake(end($logName)), $errors);

            // sends back an error message
            throw new HttpResponseException(
                response([
                    'status' => false,
                    'message' => 'validation failed',
                    'errors' => $errors
                ], Response::HTTP_BAD_REQUEST)
            );
        }
    }
}
