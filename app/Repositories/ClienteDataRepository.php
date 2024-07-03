<?php

namespace App\Repositories;

use App\Models\Cliente;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\ClienteData;

class ClienteDataRepository extends BaseRepository
{
    protected $model = ClienteData::class;

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

    public function store(Cliente $cliente, $data)
    {
        try {
            $cliente->datas()->saveMany([
                new $this->model($data)
            ]);

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(ClienteData $clienteData)
    {
        try {
            $clienteData->delete();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

