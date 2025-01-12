<?php

namespace App\Http\Requests\Paciente\Agenda;

use App\Models\ModalidadePagamento;

class StoreAgendaRequest extends BaseAgendaRequest
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
            'frequencia_id' => 'required',
            'horario' => 'required|max:255',
            'dia' => 'required|max:255'
        ];
    }
}
