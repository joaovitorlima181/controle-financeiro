<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEntryTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name.required' => 'Nomeda Entrada é obrigatório',
            'name.unique' => 'Nomeda Entrada deve ser unico',
            'name.max' => 'Nomeda Entrada deve ter no maximo 20 caracteres',
        ];
    }
}
