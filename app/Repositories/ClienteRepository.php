<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;

use App\Models\Cliente;

class ClienteRepository extends BaseRepository
{
    protected $model = Cliente::class;

    public function dashboard()
    {
        try {
            $query = $this->model->query();
            $query->select(
                DB::raw('COUNT(*) as total'),
                DB::raw('SUM(CASE WHEN clientes.ativo = true THEN 1 ELSE 0 END) AS ativo'),
                DB::raw('SUM(CASE WHEN clientes.ativo = false THEN 1 ELSE 0 END) AS inativo')
            );

            return $query->get()->first();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

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
            $cliente = new $this->model($data);
            $cliente->save();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Cliente $cliente, $data)
    {
        try {
            DB::beginTransaction();

            $cliente->fill($data);
            $cliente->save();

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

}

