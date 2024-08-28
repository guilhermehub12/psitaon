<?php

namespace App\Policies\Prontuario;

use App\Models\Prontuario\PacienteProntuario;
use App\Models\Usuario;
use Illuminate\Auth\Access\Response;
use Exception;
use Illuminate\Auth\Access\HandlesAuthorization;

class PacienteProntuarioPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        return true;
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Usuario $usuario, PacienteProntuario $pacienteProntuario): bool
    {
        return true;
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Usuario $usuario): bool
    {
        return true;
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $usuario, PacienteProntuario $pacienteProntuario): bool
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
     */
    public function delete(Usuario $usuario, PacienteProntuario $pacienteProntuario): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $usuario, PacienteProntuario $pacienteProntuario): bool
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
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, PacienteProntuario $pacienteProntuario): bool
    {
        //
    }
}
