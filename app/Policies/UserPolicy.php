<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
        if ($user->can('user index')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  User  $model
     * @return bool
     */
    public function view(User $user, User $model): bool
    {
        if ($user->can('user show')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        if ($user->can('user create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  User  $model
     * @return bool
     */
    public function update(User $user, User $model): bool
    {
        if ($user->can('user update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  User  $model
     * @return bool
     */
    public function delete(User $user, User $model): bool
    {
        if ($user->can('user delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  User  $model
     * @return void
     */
    public function restore(User $user, User $model): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  User  $model
     * @return void
     */
    public function forceDelete(User $user, User $model): void
    {
        //
    }


    /**
     * Determine whether the user can delete two or more users at a time.
     *
     * @param  User  $user
     * @return bool
     */
    public function destroyMany(User $user): bool
    {
        if ($user->can('user destroy-many')) {
            return true;
        }
        return false;
    }
}
