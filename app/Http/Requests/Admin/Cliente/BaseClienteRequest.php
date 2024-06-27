<?php

namespace App\Http\Requests\Admin\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class BaseClienteRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'data_nascimento' => 'nullable|date_format:d/m/Y|max:255',
            'telefone' => 'nullable|max:255',
            'celular' => 'nullable|max:255',
            'instagram' => 'nullable|max:255',
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
            'email' => 'E-mail',
            'data_nascimento' => 'Data Nascimento',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'instagram' => 'Instagram'
        ];
    }
}
