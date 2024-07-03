<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;

use App\Models\Produto;

class ProdutoRepository extends BaseRepository
{
    protected $model = Produto::class;

    public function paginate($paginate = 10, $orderBy = 'created_at', $sort = 'ASC', $filters = [])
    {
        try {
            $query = $this->model->query();

            if (count($filters) > 0) {
            }

            $query->orderBy($orderBy, $sort);

            return $query->paginate($paginate);
        } catch (Exception $e) {
            return [];
        }
    }

    public function store($data)
    {
        try {
            $produto = new $this->model($data);
            $produto->save();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Produto $produto, $data)
    {
        try {
            DB::beginTransaction();

            $produto->fill($data);
            $produto->save();

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

}
