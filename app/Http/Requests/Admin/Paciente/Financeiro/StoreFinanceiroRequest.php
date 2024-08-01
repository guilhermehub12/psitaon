<?php

namespace App\Http\Requests\Admin\Paciente\Financeiro;

use App\Models\ModalidadePagamento;

class StoreFinanceiroRequest extends BaseFinanceiroRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'modalidade_pagamento_id' => 'required',
            'frequencia_pagamento_id' => 'nullable',
            'forma_pagamento_id' => 'nullable',
            'status_pagamento_id' => 'nullable',
            'status_presenca_id' => 'nullable',
            'valor_sessao' => 'nullable|max:255'
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param \Illuminate\Validation\Validator $validator
     * @return void
     */
    public function withValidator($validator)
    {
        // Buscar o UUID da modalidade 'Convênio'
        $convenio = ModalidadePagamento::where('nome', 'Particular')->first();

        if ($convenio) {
            $convenioUuid = $convenio->id;

            $validator->sometimes(['frequencia_pagamento_id', 'forma_pagamento_id', 'status_pagamento_id', 'status_presenca_id', 'valor_sessao'], 'required', function ($input) use ($convenioUuid) {
                return $input->modalidade_pagamento_id == $convenioUuid;
            });
        }
    }
}
