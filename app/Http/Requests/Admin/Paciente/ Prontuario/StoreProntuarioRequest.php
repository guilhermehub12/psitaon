<?php

namespace App\Http\Requests\Admin\Paciente\Prontuario;

use App\Models\ModalidadePagamento;

class StoreProntuarioRequest extends BaseProntuarioRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // dd($_REQUEST);
        return [
            'paciente_id' => 'required',
            'queixa_inicial' => 'required|max:255'
        ];
    }
}
