<?php

namespace App\Http\Requests\Admin\ProdutoTamanho;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdutoTamanhoRequest extends BaseProdutoTamanhoRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required',
            'descricao' => 'required'
        ];
    }
}
