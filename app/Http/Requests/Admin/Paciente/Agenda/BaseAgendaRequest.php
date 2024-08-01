<?php

namespace App\Http\Requests\Admin\Paciente\Agenda;

use Illuminate\Foundation\Http\FormRequest;

class BaseAgendaRequest extends FormRequest
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
            'frequencia_id' => 'required',
            'horario' => 'required|max:255',
            'dia' => 'required|max:255'
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
            'frequencia_id' => 'Frequência',
            'horario' => 'Horário',
            'dia' => 'Dia'
        ];
    }
}
