<?php

namespace App\Repositories;

use App\Models\Produto;
use Exception;

use App\Models\ProdutoModelo;

class ProdutoModeloRepository extends BaseRepository
{
    protected $model = ProdutoModelo::class;

    public function store(Produto $produto, $data)
    {
        try {
            $produto->modelos()->saveMany([
                new $this->model($data)
            ]);

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(ProdutoModelo $produtoModelo)
    {
        try {
            $produtoModelo->delete();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

