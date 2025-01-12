<?php

namespace App\Http\Requests\Paciente\Responsavel;

use Illuminate\Foundation\Http\FormRequest;

class BaseResponsavelRequest extends FormRequest
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
            'contato' => 'nullable|max:255',
            'email' => 'required|email|max:255',
            'grau_parentesco' => 'required|max:255',
            'tipo_responsavel_id' => 'required'
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
            'contato' => 'Contato',
            'email' => 'E-mail',
            'grau_parentesco' => 'Grau de Parentesco',
            'tipo_responsavel_id' => 'Tipo de Responsável'
        ];
    }
}
