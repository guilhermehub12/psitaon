<?php

namespace App\Repositories\Prontuario;

use App\Models\Paciente;
use Exception;

use App\Models\Prontuario\PacienteProntuario;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class PacienteProntuarioRepository extends BaseRepository
{
    protected $model = PacienteProntuario::class;

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
                ->sortBy('codigo')
                ->pluck('nome', 'id')
                ->prepend('Escolha a opção', '');
        } catch (Exception $e) {
            // Return an array with the error message
            return [
                '' => $e->getMessage()
            ];
        }
    }

    public function store(Paciente $paciente ,$data)
    {
        try {
            $$pacienteProntuario = new $this->model($data);
            $$pacienteProntuario->paciente_id = $paciente->id;
            $$pacienteProntuario->save();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(PacienteProntuario $pacienteProntuario, $data)
    {
        try {
            DB::beginTransaction();

            $pacienteProntuario->fill($data);
            $pacienteProntuario->save();

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function destroy(PacienteProntuario $pacienteProntuario)
    {
        try {
            $pacienteProntuario->delete();

            return true;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

}

