<?php

namespace App\Http\Requests\Admin\Paciente;

use Illuminate\Foundation\Http\FormRequest;

class BasePacienteRequest extends FormRequest
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
            'data_nascimento' => 'nullable|date_format:d/m/Y|max:255',
            'genero' => 'required|max:255',
            'escolaridade' => 'required|max:255',
            'profissao' => 'required|max:255',
            'estado_civil' => 'required|max:255',
            'endereco' => 'required|max:255',
            'telefone' => 'nullable|max:255',
            'email' => 'required|email|max:255',
            'nome_pai' => 'required|max:255',
            'nome_mae' => 'required|max:255',
            // 'celular' => 'nullable|max:255',
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
            'data_nascimento' => 'Data Nascimento',
            'genero' => 'Gênero',
            'escolaridade' => 'Escolaridade',
            'profissao' => 'Profissão',
            'estado_civil' => 'Estado Civil',
            'endereco' => 'Endereço',
            'telefone' => 'Telefone',
            'email' => 'E-mail',
            'nome_pai' => 'Nome do Pai',
            'nome_mae' => 'Nome da Mãe',
            // 'celular' => 'Celular',
            // 'instagram' => 'Instagram'
        ];
    }
}
