<?php

namespace App\Repositories;

use App\Models\Produto;
use Exception;
use Illuminate\Support\Facades\DB;

use App\Models\ProdutoTamanho;

class ProdutoTamanhoRepository extends BaseRepository
{
    protected $model = ProdutoTamanho::class;

    public function store(Produto $produto, $data)
    {
        try {
            $produto->tamanhos()->saveMany([
                new $this->model($data)
            ]);

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

