<?php

namespace App\Http\Requests\Admin\Paciente\Financeiro;

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

    public function withValidator($validator)
    {
        $validator->sometimes(['frequencia_pagamento_id', 'forma_pagamento_id', 'status_pagamento_id', 'status_presenca_id', 'valor_sessao'], 'required', function ($input) {
            return $input->modalidade_pagamento_id == 'Convênio';
        });
    }
}
