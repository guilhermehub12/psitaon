<?php

namespace App\Http\Requests\Admin\ProdutoSabor;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdutoSaborRequest extends BaseProdutoSaborRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:255',
            'descricao_resumida' => 'required|max:255',
            'descricao_completa' => 'required|max:1000',
            'preco' => 'required',
            'observacao' => 'nullable|max:1000'
        ];
    }
}
