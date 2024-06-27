<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Usuario;
use App\Models\UsuarioPerfil;

class UsuarioRepository extends BaseRepository
{
    protected $model = Usuario::class;

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
            DB::beginTransaction();

            $usuario = new $this->model($data);
            $usuario->senha = Str::random(10);
            $usuario->save();

            $usuario->perfil()->save(
                new UsuarioPerfil(['perfil_id' => $data['perfil_id']])
            );

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function update(Usuario $usuario, $data)
    {
        try {
            DB::beginTransaction();

            $usuario->fill($data);
            $usuario->save();

            $perfil = $usuario->perfil;

            if ($perfil) {
                $usuario->perfil()->update(['perfil_id' => $data['perfil_id']]);
            }

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

}

