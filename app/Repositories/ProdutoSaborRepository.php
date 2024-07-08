<?php

namespace App\Repositories;

use App\Models\Produto;
use Exception;
use App\Models\ProdutoSabor;

class ProdutoSaborRepository extends BaseRepository
{
    protected $model = ProdutoSabor::class;

    public function store(Produto $produto, $data)
    {
        try {
            $produto->sabores()->saveMany([
                new $this->model($data)
            ]);

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(ProdutoSabor $produtoSabor)
    {
        try {
            $produtoSabor->delete();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

