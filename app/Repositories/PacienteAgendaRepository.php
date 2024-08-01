<?php

namespace App\Repositories;

use Exception;

use App\Models\Paciente;
use App\Models\PacienteAgenda;
use Illuminate\Support\Facades\DB;

class PacienteAgendaRepository extends BaseRepository
{
    protected $model = PacienteAgenda::class;

    public function paginate($paginate = 10, $orderBy = 'created_at', $sort = 'ASC', $filters = [])
    {
        try {
            // Instantiate the model to call query() method
            $query = (new $this->model)->newQuery();

            if (count($filters) > 0) {
                // Apply filters to the query if any
                foreach ($filters as $key => $value) {
                    $query->where($key, $value);
                }
            }

            $query->orderBy($orderBy, $sort);

            return $query->paginate($paginate);
        } catch (Exception $e) {
            // Return an empty collection or handle the exception as needed
            return [];
        }
    }

    public function selectOption()
    {
        try {
            // Instantiate the model to call all() method
            return (new $this->model)
                ->all()
                ->sortBy('nome')
                ->pluck('nome', 'id')
                ->prepend('Escolha a opção', '');
        } catch (Exception $e) {
            // Return an array with the error message
            return [
                '' => $e->getMessage()
            ];
        }
    }

    public function store(Paciente $paciente, $data)
    {
        try {
            $data['paciente_id'] = $paciente->id;
            // dd($data);
            $pacienteAgenda = new $this->model($data);
            // dd($pacienteAgenda);

            // Salva a instância de PacienteAgenda associada ao Paciente
            $paciente->agendas()->save($pacienteAgenda);

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

    public function destroy(PacienteAgenda $PacienteAgenda)
    {
        try {
            $PacienteAgenda->delete();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
