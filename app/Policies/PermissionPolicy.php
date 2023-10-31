<?php

namespace App\Policies;


use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Spatie\Permission\Models\Permission;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('permission index')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Permission  $permission
     * @return bool
     */
    public function view(User $user, Permission $permission): bool
    {
        if ($user->can('permission show')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return Response|bool
     */
    public function create(User $user): Response|bool
    {
        if ($user->can('permission create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Permission  $permission
     * @return bool
     */
    public function update(User $user, Permission $permission): bool
    {
        if ($user->can('permission update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Permission  $permission
     * @return bool
     */
    public function delete(User $user, Permission $permission): bool
    {
        if ($user->can('permission delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Permission  $permission
     * @return void
     */
    public function restore(User $user, Permission $permission): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Permission  $permission
     * @return void
     */
    public function forceDelete(User $user, Permission $permission): void
    {
        //
    }
}
