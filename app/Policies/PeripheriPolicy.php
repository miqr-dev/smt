<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Peripheri;
use Illuminate\Auth\Access\HandlesAuthorization;

class PeripheriPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_peripheri');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Peripheri  $peripheri
     * @return bool
     */
    public function view(User $user, Peripheri $peripheri): bool
    {
        return $user->can('view_peripheri');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_peripheri');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Peripheri  $peripheri
     * @return bool
     */
    public function update(User $user, Peripheri $peripheri): bool
    {
        return $user->can('update_peripheri');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Peripheri  $peripheri
     * @return bool
     */
    public function delete(User $user, Peripheri $peripheri): bool
    {
        return $user->can('delete_peripheri');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_peripheri');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Peripheri  $peripheri
     * @return bool
     */
    public function forceDelete(User $user, Peripheri $peripheri): bool
    {
        return $user->can('force_delete_peripheri');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_peripheri');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Peripheri  $peripheri
     * @return bool
     */
    public function restore(User $user, Peripheri $peripheri): bool
    {
        return $user->can('restore_peripheri');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_peripheri');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Peripheri  $peripheri
     * @return bool
     */
    public function replicate(User $user, Peripheri $peripheri): bool
    {
        return $user->can('replicate_peripheri');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_peripheri');
    }

}
