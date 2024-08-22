<?php

namespace App\Policies\Prontuario;

use App\Models\Prontuario\PacienteProntuario;
use App\Models\Usuario;
use Exception;
use Illuminate\Auth\Access\HandlesAuthorization;

class PacienteProntuarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Usuario $usuario)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Usuario  $usuario
     * @param  \App\Models\PacienteProntuario  $gestaoRiscoAtividadeEscopo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Usuario $usuario, PacienteProntuario $pacienteProntuario)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Usuario $usuario)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Usuario  $usuario
     * @param  \App\Models\PacienteProntuario  $gestaoRiscoAtividadeEscopo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Usuario $usuario, PacienteProntuario $pacienteProntuario)
    {
        try {
            if (
                $usuario->isAdmin()
            ) {
                return true;
            }

            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Usuario  $usuario
     * @param  \App\Models\PacienteProntuario  $gestaoRiscoAtividadeEscopo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Usuario $usuario, PacienteProntuario $pacienteProntuario)
    {
        try {
            if (
                $usuario->isAdmin()
            ) {
                return true;
            }

            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Usuario  $usuario
     * @param  \App\Models\PacienteProntuario  $gestaoRiscoAtividadeEscopo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Usuario $usuario, PacienteProntuario $pacienteProntuario)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Usuario  $usuario
     * @param  \App\Models\PacienteProntuario  $gestaoRiscoAtividadeEscopo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Usuario $usuario, PacienteProntuario $pacienteProntuario)
    {
        //
    }
}
