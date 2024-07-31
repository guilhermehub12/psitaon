<?php

namespace App\Http\Requests\Admin\Paciente;

class StorePacienteRequest extends BasePacienteRequest
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
            'data_nascimento' => 'nullable|date_format:d/m/Y|max:255',
            'genero_id' => 'required',
            'escolaridade_id' => 'required',
            'estado_civil_id' => 'required',
            'profissao' => 'required|max:255',
            'endereco' => 'required|max:255',
            'telefone' => 'nullable|max:255',
            'email' => 'required|email|max:255',
            'nome_pai' => 'required|max:255',
            'nome_mae' => 'required|max:255',
            // 'celular' => 'nullable|max:255',
        ];
    }
}
