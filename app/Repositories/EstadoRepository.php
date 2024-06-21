<?php

namespace App\Repositories;

use Exception;

use App\Models\Estado;

class EstadoRepository extends BaseRepository
{
    protected $model = Estado::class;

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

}

