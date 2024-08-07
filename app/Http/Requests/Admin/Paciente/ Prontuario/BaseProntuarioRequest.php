<?php

namespace App\Http\Requests\Admin\Paciente\Prontuario;

use Illuminate\Foundation\Http\FormRequest;

class BaseProntuarioRequest extends FormRequest
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
            'paciente_id' => 'required',
            'queixa_inicial' => 'required|max:255'
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
            'paciente_id' => 'Paciente',
            'queixa_inicial' => 'Queixa Inicial'
        ];
    }
}
