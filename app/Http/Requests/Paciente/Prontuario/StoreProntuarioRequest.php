<?php

namespace App\Http\Requests\Paciente\Prontuario;

use App\Http\Requests\Paciente\Prontuario\BaseProntuarioRequest;

class StoreProntuarioRequest extends BaseProntuarioRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidatioApp\Http\Requests\Paciente\Prontuarioule|array<mixed>|string>
     */
    public function rules(): array
    {
        // dd($_REQUEST);
        return [
            'queixa_inicial' => 'required|max:255'
        ];
    }
}
