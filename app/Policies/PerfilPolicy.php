<?php

namespace App\Policies;

use App\Perfil;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PerfilPolicy
{
    use HandlesAuthorization;

    /**
     * Este metodo bloqueda todas las vistas un ejemplo
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {

    }

    /**
     * Este metodo bloquea ciertas vistas
     *
     * @param  \App\User  $user
     * @param  \App\Perfil  $perfil
     * @return mixed
     */
    public function view(User $user, Perfil $perfil)
    {
        /**
         * Verifica que solo se muestre la infomacion del
         * usuario autenticado en el formulario de editar perfil
         * y no la de otro usuario-
         */

        return $user->id == $perfil->user_id;
    }

    /**
         * Determine whether the user can create models.
         *
         * @param  \App\User  $user
         * @return mixed
         */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Perfil  $perfil
     * @return mixed
     */
    public function update(User $user, Perfil $perfil)
    {
        // TODO: Validar que el usuario autenticado es el que desea modificar el perfil
        return $user->id === $perfil->user_id;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Perfil  $perfil
     * @return mixed
     */
    public function delete(User $user, Perfil $perfil)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Perfil  $perfil
     * @return mixed
     */
    public function restore(User $user, Perfil $perfil)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Perfil  $perfil
     * @return mixed
     */
    public function forceDelete(User $user, Perfil $perfil)
    {
        //
    }
}
