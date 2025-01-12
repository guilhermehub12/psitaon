<?php

namespace App\Http\Requests\Paciente\Prontuario;

use App\Http\Requests\Paciente\Prontuario\BaseProntuarioRequest;

class UpdateProntuarioRequest extends BaseProntuarioRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'queixa_inicial' => 'required|max:255'
        ];
    }
}
