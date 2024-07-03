<?php

namespace App\Http\Requests\Admin\Produto;

use App\Http\Requests\Admin\Produto\BaseProdutoRequest;

class StoreProdutoRequest extends BaseProdutoRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:255'
        ];
    }
}
