<?php

namespace App\Repositories;

use App\Models\Produto;
use Exception;
use App\Models\ProdutoAdicional;

class ProdutoAdicionalRepository extends BaseRepository
{
    protected $model = ProdutoAdicional::class;

    public function store(Produto $produto, $data)
    {
        try {
            $produto->adicionais()->saveMany([
                new $this->model($data)
            ]);

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(ProdutoAdicional $produtoAdicional)
    {
        try {
            $produtoAdicional->delete();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
