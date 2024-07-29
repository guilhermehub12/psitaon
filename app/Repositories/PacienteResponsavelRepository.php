<?php

namespace App\Repositories;

use Exception;

use App\Models\Paciente;
use App\Models\PacienteResponsavel;
use Illuminate\Support\Facades\DB;

class PacienteResponsavelRepository extends BaseRepository
{
    protected $model = PacienteResponsavel::class;

    public function store(Paciente $paciente, $data)
    {
        try {
            $pacienteResponsavel = new $this->model($data);
            $pacienteResponsavel->paciente_id = $paciente->id;
            $pacienteResponsavel->save();

            // $paciente->tipos_responsaveis()->saveMany([
            //     new $this->model($data)
            // ]);

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

