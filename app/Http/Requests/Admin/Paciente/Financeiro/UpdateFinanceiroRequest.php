<?php

namespace App\Http\Requests\Admin\Paciente\Financeiro;

class UpdateFinanceiroRequest extends BaseFinanceiroRequest
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
}
