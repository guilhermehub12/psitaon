<?php

namespace App\Http\Requests\Admin\ProdutoModelo;

use Illuminate\Foundation\Http\FormRequest;

class BaseProdutoModeloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'nome' => 'Nome',
            'descricao_resumida' => 'Descrição Resumida',
            'descricao_completa' => 'Descrição Completa',
            'preco' => 'Preço',
            'observacao' => 'Observação'
        ];
    }
}
