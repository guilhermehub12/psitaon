<?php

namespace App\Http\Requests\Admin\ClienteData;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteDataRequest extends FormRequest
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
            'nome' => 'required|max:255',
            'data' => 'required|date_format:d/m/Y|max:255',
            'observacao' => 'nullable|max:510'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'nome' => 'Nome',
            'data' => 'Data',
            'observacao' => 'Observação',
        ];
    }
}
