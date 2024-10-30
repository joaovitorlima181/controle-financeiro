<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class StoreEntryTypeRequest extends FormRequest
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
        Log::debug('Creating EntryType REquest: ' . json_encode($this->all()));
        return [
            'name' => ['required', 'string', 'max:50', 'unique:entry_types,name'],
            'description' => ['string', 'max: 100', 'nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nome da Entrada é obrigatório',
            'name.unique' => 'Nome da Entrada deve ser unico',
            'name.max' => 'Nome da Entrada deve ter no maximo 20 caracteres',
            'description.max' => 'Descrição deve ter no maximo 100 caracteres',
            'description.string' => 'Descrição deve ser uma string',
        ];
    }
}
