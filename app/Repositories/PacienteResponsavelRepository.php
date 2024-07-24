<?php

namespace App\Repositories;

use Exception;

use App\Models\Paciente;
use App\Models\PacienteResponsavel;
use Illuminate\Support\Facades\DB;

class PacienteResponsavelRepository extends BaseRepository
{
    protected $model = Paciente::class;

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

    public function selectOption()
    {
        try {
            return $this->model
                ->all()
                ->sortBy('nome')
                ->pluck('nome', 'id')
                ->prepend('Escolha a opção', '');
        } catch (Exception $e) {
            return [
                '' => $e->getMessage()
            ];
        }
    }

    public function store($data)
    {
        try {
            $paciente = new $this->model($data);
            $paciente->save();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Paciente $paciente, $data)
    {
        try {
            DB::beginTransaction();

            $paciente->fill($data);
            $paciente->save();

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function destroy(PacienteResponsavel $pacienteResponsavel)
    {
        try {
            $pacienteResponsavel->delete();

            return true;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

}

