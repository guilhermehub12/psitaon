<?php

namespace App\Http\Requests\Paciente\Responsavel;

class StoreResponsavelRequest extends BaseResponsavelRequest
{
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
}
