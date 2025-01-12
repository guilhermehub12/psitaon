<?php

namespace App\Http\Requests\Paciente\Financeiro;

use Illuminate\Foundation\Http\FormRequest;

class BaseFinanceiroRequest extends FormRequest
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
            'modalidade_pagamento_id' => 'required',
            'frequencia_pagamento_id' => 'nullable',
            'forma_pagamento_id' => 'nullable',
            'status_pagamento_id' => 'nullable',
            'status_presenca_id' => 'nullable',
            'valor_sessao' => 'nullable|max:255'
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
            'modalidade_pagamento_id' => 'Modalidade de Pagamento',
            'frequencia_pagamento_id' => 'Frequência de Pagamento',
            'forma_pagamento_id' => 'Forma de Pagamento',
            'status_pagamento_id' => 'Status de Pagamento',
            'status_presenca_id' => 'Status de Presença',
            'valor_sessao' => 'Valor da Sessão'
        ];
    }
}
